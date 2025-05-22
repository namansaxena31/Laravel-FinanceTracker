<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Member;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function addTransaction(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        // Create transaction
        $transaction = Transaction::create([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'amount' => $validated['amount'],
            'date' => $validated['date'],
            'description' => $validated['description'] ?? null,
            'member_id' => session('member_id'), 
        ]);

        return redirect()->back()->with('success', 'Transaction added successfully!');
    }

    public function listTransactions(){
        $memberId = session('member_id'); // Assuming user is logged in and session holds their ID

        $transactions = Transaction::where('member_id', $memberId)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->orderBy('date', 'desc')
            ->get();

        return view('all_transactions', compact('transactions'));
    }
}
