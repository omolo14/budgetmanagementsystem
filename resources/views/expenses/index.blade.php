@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Expenses</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Expenses</a></li>
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <a class="btn btn-primary mb-3" href="{{ route('expenses.create') }}">Add New Expense </a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('expenses.index') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Filter by Date</label>
                                    <input type="date" name="filter_date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <br/>
                                    <button type="submit" class="btn btn-secondary">Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Expense</th>
                                        <th>Expense Category</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Fees</th>
                                        <th>File</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $index => $expense)
                                        <tr>
                                            <td>{{ $index +=1}}</td>
                                            <td>
                                                @if ($expense->parent)
                                                    {{ $expense->parent->name }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $expense->expensescategory_id ? $expense->expensescategory->name : 'N/A' }}</td>
                                            <td>{{ $expense->name }}</td>
                                            <td>{{ $expense->date }}</td>
                                            <td>{{ $expense->description }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->fees }}</td>
                                            <td>{{ $expense->file ? $expense->file : 'N/A' }}</td>
                                            <td>
                                                <a class="btn btn-primary upcube-btn" href="{{ route('expenses.show', $expense->id ) }}">View</a>
                                                <a class="btn btn-secondary upcube-btn" href="{{ route('expenses.edit', $expense->id ) }}">Edit</a>
                                                <form action="{{ route('expenses.destroy', $expense->id ) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger upcube-btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection