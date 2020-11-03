<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RestartPassword;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function resetPass(Request $request){
        $to = $request->email;
        Mail::to($to)->send(new RestartPassword());
        return view('emails.index');
    }
}

