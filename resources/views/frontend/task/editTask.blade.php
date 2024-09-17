@extends('frontend.master')
@section('title')
Edit Task
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



{{-- @foreach ($tasks as $task)
<li>{{ $task }}</li>
@endforeach --}}

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form action="{{ route('updateTask', $task->id) }}" method="POST" class="form-horizontal">
            {{-- <form action="{{ route('updateTask', 1) }}" method="POST" class="form-horizontal"> --}}
                @csrf
                @method('PUT')


                {{-- <input type="hidden" name="_method" value="PUT"> --}}



                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Title </label>
                        <div class="controls">
                            <input type="text" name="title" value="{{$task->title}}" class="span6 typeahead" id="typeahead"
                                data-provide="typeahead">
                            {{-- <input type="hidden" name="task_id" value="{{$task->id}}" class="span6 typeahead" id="typeahead"
                                data-provide="typeahead"> --}}
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="date01">Submit time</label>
                        <div class="controls">
                            <input type="datetime-local" name="submit_time" class="input-xlarge" id="date01" value="{{$task->submit_time}}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError">Status</label>
                        <div class="controls">
                            <select name="status" id="selectError3" data-rel="chosen">
                                <option value="pending" {{ $task->status=="pending"?'Selected':'' }}>Pending</option>
                                <option value="in_progress" {{ $task->status=="in_progress"?'Selected':'' }}>In Progress</option>
                                <option value="completed" {{ $task->status=="completed"?'Selected':'' }}>Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="btn" value="Save"> Save</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->

<!--/row-->


@endsection
