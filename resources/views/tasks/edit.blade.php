@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tasks</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
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
                            <h4 class="card-title">Update Task Details</h4>
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')       
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Project</label>
                                    <div class="col-sm-10">
                                        <select name="project_id" id="project_id" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled>Select Project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                                                    {{ $project->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $task->name }}" type="text" name="name" id="name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <div>
                                        <textarea class="form-control" rows="5" type="text" name="description" id="description" required>{{ $task->description }}"</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="start_date" class="col-sm-2 col-form-label"> Start Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $task->start_date }}" type="date" name="start_date" id="start_date" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"  value="{{ $task->end_date }}" type="date" name="end_date" id="end_date" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Project Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="In Progress" @if($task->status === 'In Progress') selected @endif>In Progress</option>
                                            <option value="Completed" @if($task->status === 'Completed') selected @endif>Completed</option>
                                            <option value="Pending" @if($task->status === 'Pending') selected @endif>Pending</option>
                                        </select>
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
