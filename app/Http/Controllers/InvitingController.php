<?php

namespace App\Http\Controllers;

use App\Mail\Send;
use App\Models\User;
use App\Services\GeneratePassword;
use Illuminate\Http\Request;

class InvitingController extends Controller
{
    public function show()
    {
        return view('frontend.forms.inviteform');
    }

    public function invite(Request $request)
    {
        $gen_pas = new GeneratePassword();
        $pass= $gen_pas->gen_password();

        $request->validate([
            'email' => 'required',
            'name' => 'required|string|max:255',
        ]);
        $user = new User();
        $user->surname = $request->name;
        $user->login = $request->name;
        $user->email = $request->email;

        $user->password = $pass;

        $user->role_id = 2;
        $user->activity_id = 1;
        //$user->save();
        $send = new Send();
        $send->send($request->email, $pass);

        return redirect()->back()->with('status', 'answer-saved');
    }
}
