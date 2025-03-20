<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NotificationModel;

class NotificationController extends Controller
{
    public function notification_index(){

        $agentUser = User::get();
        return view('admin.notification.update', compact('agentUser'));
    }

    public function notification_send(Request $request)
    {

        $request->validate([
            'user_id' =>'required',
            'title' =>'required',
           'message' =>'required',
        ]);
        $notification = new NotificationModel();
        $notification->user_id = $request->user_id;
        $notification->title = $request->title;
        $notification->message = $request->message;
        $notification->save();
        $user = User::where('id', '=', $request->user_id)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        if (!empty($user->token)) {
            try {
                $serverKEY = 'YOUR_FIREBASE_SERVER_KEY_HERE';
                $token = $user->token;
                $title = $request->title;
                $message = $request->message;
                $url = 'https://fcm.googleapis.com/fcm/send'; // Fixed missing ':'

                $fields = array(
                    'to' => $token,
                    'notification' => array(
                        'title' => $title,
                        'body' => $message,
                        'click_action' => 'FCM_PLUGIN_ACTIVITY',
                        'sound' => 'default',
                    ),
                );

                $json = json_encode($fields);
                $headers = array(
                    'Authorization: key=' . $serverKEY,
                    'Content-Type: application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                $result = curl_exec($ch);
                curl_close($ch);

                // return response()->json(['message' => 'Notification sent successfully.', 'response' => json_decode($result)], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to send notification.', 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Token not found.'], 400);
        }
        return redirect('admin/notification')->with('success', 'Notification send successfully!!');
    }

}
