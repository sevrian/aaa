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
        $login=false;
        $user = $request->input('username');
        $pass = $request->input('password');

        // $users = DB::table('radcheck')->select('username', 'value')->where('attribute', 'Cleartext-Password')->pluck('username', 'value')->dd();
        $users = DB::table('radcheck')->select('attribute', 'value')->where('username', $user)->get();
        foreach ($users as $value) {
            if($value->attribute=='Cleartext-Password'){
                if($value->value ==$pass) $login=true;
            }
        }
        if ($login) {
            // return redirect('/dashboard');
            echo 'login';
        } else {
            return redirect('/');
        }
    }
}
