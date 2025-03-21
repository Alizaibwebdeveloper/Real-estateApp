<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class QRcodeController extends Controller
{
    public function qrcode_index(){
        $products = ProductModel::all();
        return view('admin.qrcode.index', compact('products'));
    }

    public function qrcode_add(Request $request){

        return view('admin.qrcode.add');
    }

    public function qrcode_store(Request $request){

        $number = mt_rand(1111111111,99999999999);
        $product = new ProductModel();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->product_code = $number;
        $product->save();

        return redirect('/admin/qrcode')->with('success', 'QR Code  added successfully');
    }

    public function qrcode_edit($id){

        $product = ProductModel::find($id);
        return view('admin.qrcode.edit', compact('product'));
    }

    public function qrcode_update(Request $request, $id){
        $product = ProductModel::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        return redirect('/admin/qrcode')->with('success', 'QR Code updated successfully');
    }

    public function qrcode_delete($id){
        ProductModel::destroy($id);
        return redirect('/admin/qrcode')->with('success', 'QR Code deleted successfully');
    }
}
