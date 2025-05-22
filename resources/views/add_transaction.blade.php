@extends('layouts.master')

@section('title', 'Add Transaction')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg w-100 rounded-20" style="max-width: 500px;color: rgba(0, 0, 0, 0.6);opacity:0.9;">
        <div class="card-header text-white" style="background-color: #6f42c1;">
            <h4 class="mb-0">Add New Transaction</h4>
        </div>
        <div class="card-body bg-light">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Transaction Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select class="form-select" name="type" required>
                        <option value="" disabled selected>Select type</option>
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Transaction Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optional)</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <button type="submit" class="btn w-100 text-white" style="background-color: #6f42c1;">Add Transaction</button>
            </form>
        </div>
    </div>
</div>
@endsection
