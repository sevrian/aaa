<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Auth extends Controller
{
    public function login()
    {
        return view('theme.login');
    }
    public function postlogin(Request $request)
    {
        $this->validate(
            $request,

            ['username' => 'required'],

            ['password' => 'required']

        );

        $user = $request->input('username');
        $pass = $request->input('value');

        $users = DB::table('radcheck')->select('username', 'value')->where('attribute', 'Cleartext-Password')->pluck('username', 'value');



        if ($users->username == $user and $users->value == $pass) {


            return redirect('/dashboard');
        } else {

            return redirect('/');
        }
    }
}
