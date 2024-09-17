@extends('frontend.master')
@section('title')
Show Single Task
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
            <form  class="form-horizontal">


                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Title </label>
                        <div class="controls">
                            <input type="text" value="{{$task->title}}" disabled  class="span6 typeahead" id="typeahead"
                                data-provide="typeahead">



                        </div>
                    </div>


                    {{-- <div class="control-group">
                        <label class="control-label" for="date01">Date input</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge datepicker" id="date01" value="02/16/24">
                        </div>
                    </div> --}}

                    <div class="control-group">
                        <label class="control-label" for="selectError">Status</label>
                        <div class="controls">
                            {{-- {{ $task->status }} --}}
                            <select name="status" id="selectError3" >
                                <option >{{ $task->status }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a class="btn btn-info" href="{{ route('editTask',['id'=>$task->id]) }}">
                            Task Edit <i class="halflings-icon white edit"></i>
                        </a>
                        {{-- <button onclick="{{ route('editTask',['id'=>$task->id]) }}" class="btn btn-primary" name="btn" value="Save"> Edit Task</button> --}}
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
