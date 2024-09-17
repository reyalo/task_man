@extends('frontend.master')
@section('title')
Task Manager
@endsection
@section('content')


@if (session('success'))
<div id="flash-message" class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div id="flash-message" class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(function() {
                flashMessage.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        }
    });
</script>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>

{{-- @foreach ($tasks as $task)
<li>{{ $task }}</li>
@endforeach --}}

<!-- Sorting Form -->
<form method="GET" action="{{ route('manageTask') }}">
    <div>
        <label for="sort_by">Sort By:</label>
        <select name="sort_by" id="sort_by">
            <option value="created_at" {{ request('sort_by')==='created_at' ? 'selected' : '' }}>Date Created</option>
            <option value="title" {{ request('sort_by')==='title' ? 'selected' : '' }}>Title</option>
            <option value="status" {{ request('sort_by')==='status' ? 'selected' : '' }}>Status</option>
            <option value="submit_time" {{ request('sort_by')==='submit_time' ? 'selected' : '' }}>Submit Time</option>
        </select>
    </div>
    <div>
        <label for="sort_direction">Direction:</label>
        <select name="sort_direction" id="sort_direction">
            <option value="asc" {{ request('sort_direction')==='asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request('sort_direction')==='desc' ? 'selected' : '' }}>Descending</option>
        </select>
    </div>
    <div>
        <label for="sort_direction">Filter by:</label>
        <select name="status" id="status-filter">
            <option value="">All</option>
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
    </div>
    <button type="submit">Filter & Sort</button>
</form>

<!-----endsort---->






<div class="row-fluid">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            {{-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> --}}
            <table class="table table-striped table-bordered bootstrap-datatable">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Date registered</th>
                        <th>Submit Time</th>
                        {{-- <th>Role</th> --}}
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title}}</td>
                        <td class="center">{{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d, g:i a') }}</td>
                        <td class="center">{{ \Carbon\Carbon::parse($task->submit_time)->format('Y-m-d, g:i a') }}</td>
                        <td class="center">
                            <span class="label {{$task->status=='pending'?'label-warning':''}} {{$task->status=='completed'?'label-success':''}}">{{ $task->status}}</span>

                        </td>
                        {{-- <td class="center">
                            <span class="label label-success">Active</span>
                        </td> --}}
                        <td class="center">
                            <a class="btn btn-success" href="{{ route('showTask',['id'=>$task->id]) }}">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>
                            <a class="btn btn-info" href="{{ route('editTask',['id'=>$task->id]) }}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="{{ route('deleteTask',['id'=>$task->id]) }}">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <!--/span-->
</div>
<!--/row-->

{{-- <script>
    $(document).ready(function() {
            $('#example').DataTable({
                "order": [], // Disable initial sorting
            });
        });
</script> --}}


@endsection
