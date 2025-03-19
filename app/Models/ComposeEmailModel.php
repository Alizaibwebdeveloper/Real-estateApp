<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComposeEmailModel extends Model
{
    use HasFactory;

    protected $table = "compose_email";

    public static function getAgentrecord($user_id){

        return self::select('compose_email.*')
        ->where('compose_email.user_id','=',$user_id)
        ->get();
    }
}
