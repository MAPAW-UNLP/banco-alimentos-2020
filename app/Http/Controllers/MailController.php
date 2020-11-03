<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RestartPassword;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Models\User;

class MailController extends Controller
{
    public function resetPass(Request $request){
        $to = $request->email;

            $user = User::where('email','=',$to)->first();
        
      
           
        
        $newPass="resetpass";
        $user['password']=$newPass;
        $datos['pass'] = $newPass;
        User::where('email','=',$to)->update($user->toArray());
        Mail::to($to)->send(new RestartPassword());
        //return response()->json($datos);
        return view('emails.index',compact('datos',$datos));
    }
}

