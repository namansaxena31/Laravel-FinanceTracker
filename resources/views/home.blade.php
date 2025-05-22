@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Welcome to Finance Tracker</h1>
        <p class="lead text-muted">Track your expenses, analyze yearly trends, and stay on top of your financial goals.</p>
    </div>

    <h2 class="text-center mb-4">This Month's Overview</h2>

    <div class="row justify-content-center">
        <div class="col-md-5 text-center mb-4">
            <h5 class="mb-3">Income vs Expense</h5>
            <canvas id="financeChart" width="150" height="150" style="max-width: 100%; height: auto;"></canvas>
        </div>
        <div class="col-md-5 text-center mb-4">
            <h5 class="mb-3">Category Breakdown</h5>
            <canvas id="categoryChart" width="150" height="150" style="max-width: 100%; height: auto;"></canvas>
        </div>
    </div>
</div>
<script>
    const financeChart = new Chart(document.getElementById('financeChart'), {
        type: 'pie',
        data: {
            labels: ['Income', 'Expense'],
            datasets: [{
                data: {!! json_encode([$income, $expense]) !!},
                backgroundColor: [
                    'rgba(102, 204, 153, 0.7)', // green
                    'rgba(255, 99, 132, 0.7)'    // red
                ],
                borderColor: [
                    'rgba(102, 204, 153, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

     const categoryChart = new Chart(document.getElementById('categoryChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($categories) !!},
            datasets: [{
                label: 'Expenses by Category',
                data: {!! json_encode($categoryTotals) !!},
                backgroundColor: [
                    '#9b59b6', // purple
                    '#f39c12', // yellow
                    '#3498db', // blue
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
