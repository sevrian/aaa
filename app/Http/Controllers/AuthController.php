<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
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
        $login = false;
        $user = $request->input('username');
        $pass = $request->input('password');

        // $users = DB::table('radcheck')->select('username', 'value')->where('attribute', 'Cleartext-Password')->pluck('username', 'value')->dd();
        $users = DB::table('radcheck')->select('attribute', 'value')->where('username', $user)->get();
        foreach ($users as $value) {
            if ($value->attribute == 'Cleartext-Password') {
                if ($value->value == $pass) $login = true;
            }
        }
        if ($login) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }
    public function ubahpass()
    {
        return  view('client.ubahpass2');
    }
    public function updatePassword(Request $request)
    {
        $this->validate(
            $request,

            ['username' => 'required'],

            ['oldpassword' => 'required'],



        );

        $update = false;
        $user = $request->input('username');
        $oldpass = $request->input('oldpassword');

        $users = DB::table('radcheck')->select('attribute', 'value')->where('username', $user)->get();
        foreach ($users as $value) {
            if ($value->attribute == 'Cleartext-Password') {
                $update = DB::table('radcheck')
                    ->where('username', $user)
                    ->where('attribute', 'Cleartext-Password')
                    ->update(['value' => $oldpass]);
            }
        }
        if ($update) {

            return redirect::to('https://poltekkesjogja.ac.id/');
        } else {
            return  view('client.ubahpass2');
        }
    }
}
