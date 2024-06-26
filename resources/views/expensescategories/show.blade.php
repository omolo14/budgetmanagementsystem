@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Expense Categories</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Expense Categories</a></li>
                                <li class="breadcrumb-item active">View</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            
            <h1>Expense Categories Details</h1>

            <div class="card">
                <div class="card-body">
                    <p class="card-text">Name: {{ $expensescategory->name }}</p>
                    <p class="card-text">Description: {{ $expensescategory->description }}</p>
                    {{-- <p class="card-text">Expenses: {{ $expensescategory->expenses_id ? $expensescategory->expense->name : '' }}</p> --}}
                    <h4>Expenses:</h4>
                    <ul>
                        @forelse ($expenses as $expense)
                            <li>{{ $expense->name }}</li>
                        @empty
                            <li>No expenses found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div>
                <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
            </div>
        </div>
    </div>
</div>  
@endsection