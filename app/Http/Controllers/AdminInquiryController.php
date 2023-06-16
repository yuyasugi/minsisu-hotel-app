<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminInquiryController extends BaseController
{
    public function admin_inquiry(){

        $Inquiries = Inquiry::get();
        // dd( $Inpuiries);

        return view('admin_inquiry.index',compact('Inquiries'));
    }

    public function admin_inquiry_update(Request $request){

        $posts = $request->all();
        // dd($posts);

        $Inquiry = Inquiry::where('id', '=', $posts['id'])->first();
        // dd($Inquiry->type);

        if($Inquiry->type === 0){
            Inquiry::where('id', $posts['id'])->update(['type' => 1]);
        } else {
            Inquiry::where('id', $posts['id'])->update(['type' => 0]);
        }

        return redirect()->route('admin_inquiry');
    }

    public function admin_inquiry_detail($id){

        $Inquiry = Inquiry::where('id', '=', $id)->get();
//    dd($Inpuiry);

        return view('admin_inquiry.detail',compact('Inquiry'));
    }
}
