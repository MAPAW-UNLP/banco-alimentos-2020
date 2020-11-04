<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RestartPassword;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Models\User;
use Hash;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function resetPass(Request $request){
        $to = $request->email;
        $user = User::where('email','=',$to)->first();
        $newPass = Str::random(6);
        $user['password']=$newPass;
        $datos['pass'] = $newPass;
        User::find($user['id'])->update(['password' => Hash::make($newPass)]);
        $obj = new RestartPassword();
        Mail::to($to)->send($obj->parametro($datos));
        return view('emails.index');
    }
}

