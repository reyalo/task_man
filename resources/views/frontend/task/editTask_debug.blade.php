@extends('frontend.master')
@section('title')
Edit Task
@endsection
@section('content')


<form action="/task/update/{{ $task->id) }}" method="POST" class="form-horizontal">
    @csrf
    @method('PUT') <!-- Spoof the PUT method -->

    <!-- Form fields go here -->
    <button type="submit">Update Task</button>
</form>



@endsection
