@extends('layouts.master')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center text-primary">Transactions This Month</h2>

    @if($transactions->isEmpty())
        <div class="alert alert-info text-center">No transactions found for this month.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $txn)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($txn->date)->format('d M Y') }}</td>
                        <td>{{ $txn->title }}</td>
                        <td>{{ ucfirst($txn->type) }}</td>
                        <td>{{ ucfirst($txn->category) }}</td>
                        <td class="{{ $txn->type === 'expense' ? 'text-danger' : 'text-success' }}">
                            ₹{{ number_format($txn->amount, 2) }}
                        </td>
                        <td>{{ $txn->description ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection