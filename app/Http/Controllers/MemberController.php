<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Member;
use App\Models\Transaction;

class MemberController extends Controller
{
    public function showHome(){
        $memberId = session('member_id');

        $transactions = Transaction::where('member_id', $memberId)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->get();

        $income = $transactions->where('type', 'income')->sum('amount');
        $expense = $transactions->where('type', 'expense')->sum('amount');

        $monthlyExpenses = Transaction::where('member_id', $memberId)
            ->where('type', 'expense')
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->selectRaw('category, SUM(amount) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        $categories = $monthlyExpenses->keys();
        $categoryTotals = $monthlyExpenses->values();

        return view('home', compact('income', 'expense','categories','categoryTotals'));
    }

    public function showAddTransaction(){
        return view('add_transaction');
    }

}
