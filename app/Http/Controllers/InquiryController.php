<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\GuestSendMail;
use App\Mail\AdminSendMail;
use Illuminate\Support\Facades\Mail;

class InquiryController extends BaseController
{
    public function index(){
        return view('inquiry.index');
    }

    public function confirm(Request $request){

        $inquiry = $request->all();
        // dd($inquiry);

        if(!$inquiry){
            return redirect()->route('inquiry.index');
        }
        $request->validate([
            'name' => 'required',
             'email' => 'required',
             'phone_number' => 'required',
             'content' => 'required'
         ]);

        return view('inquiry.confirm',compact('inquiry'));
    }

    public function store(Request $request){

        $inquirys = $request->all();
        //  dd($inquirys);

        Inquiry::insert(['name' => $inquirys['name'], 'email' => $inquirys['email'], 'phone_number' => $inquirys['phone_number'], 'content' => $inquirys['content']]);

        Mail::to($inquirys['email'])->send(new GuestSendMail($inquirys));
        Mail::to('y.sugimot357@gmail.com')->send(new AdminSendMail($inquirys));

        $request->session()->regenerateToken();

        return view('inquiry.thanks');
    }
}
