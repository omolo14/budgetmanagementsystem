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
                                <li class="breadcrumb-item active">Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h4 class="card-title">Update Expense Details</h4>
                            <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="parent_id">Select Expense:</label>
                                    <select id="parent_id" name="parent_id" class="form-control">
                                        <option value="" @if(!$expense->parent) selected @endif>Select an expense</option>
                                        @foreach($expenses as $expenseId => $expenseName)
                                            <option value="{{ $expenseId }}" @if($expense->parent && $expense->parent->id == $expenseId) selected @endif>{{ $expenseName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="expensescategory_id">Select Expense Category:</label>
                                    <select id="expensescategory_id" name="expensescategory_id" class="form-control">
                                        <option value="">Select the category</option>
                                        @foreach($expensescategories as $expensescategory)
                                            <option value="{{ $expensescategory->id }}" {{ $expense->expensescategory_id == $expensescategory->id ? 'selected' : '' }}>
                                                {{ $expensescategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $expense->name }}" type="text" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="start_date" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $expense->date }}" type="date" name="date" id="date" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <div>
                                        <textarea class="form-control" rows="5" type="text" name="description" id="description" required>{{ $expense->description }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Amount</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $expense->amount }}" type="number" name="amount" id="amount" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Fees</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $expense->fees }}" type="number" name="fees" id="fees" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">File</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="file" id="file">
                                        @if ($expense->file)
                                            <p>Selected file: {{ $expense->file }}</p>
                                        @else
                                            <p>No file selected</p>
                                        @endif
                                    </div>
                                </div>
                                

                                <div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Upcube.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
@endsection
