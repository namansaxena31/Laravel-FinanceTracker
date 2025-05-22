<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;

class LoginController extends Controller
{
    public function loginPage(){
        return view('loginPage');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $member = Member::where('email',$email)->firstorFail();

        if($member->password == $password){
            session(['member_id' => $member->id]);
            session(['member_logged_in' => true]);
            return redirect()->route('member_home')->with('success','Successfully logged in');
        }
        else{
            return redirect()->route('loginPage')->with('error','Incorrect Credentials');
        }
    }

    public function logout(){

        session()->flush();
        return redirect()->route('loginPage');

    }

    public function registerPage(){
        return view('registerPage');
    }

    public function register(Request $request){
        $member = Member::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>  md5($request->input('password')), 
            'balance' => 0,
        ]);

        return redirect()->route('loginPage');
    }
}
