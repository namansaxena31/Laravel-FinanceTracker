<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Transaction;

class MemberController extends Controller
{
    public function showHome(){
        return view('home');
    }

    public function showAddTransaction(){
        return view('add_transaction');
    }

}
