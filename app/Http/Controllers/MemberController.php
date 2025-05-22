<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function showHome(){
        return view('home');
    }

    public function showAddTransaction(){
        return view('add_transaction');
    }
}
