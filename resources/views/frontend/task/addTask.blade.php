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
            <form action="{{ route('storeTask') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Title </label>
                        <div class="controls">
                            <input type="text" name="title" class="span6 typeahead" id="typeahead" data-provide="typeahead">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="date01">Submit time</label>
                        <div class="controls">
                            <input type="datetime-local" name="submit_time" class="input-xlarge" id="date01" required value="02/16/24">
                        </div>
                    </div>

                    {{-- <div>
                        <label for="submit_time">Submit Time:</label>
                        <input type="datetime-local" id="submit_time" name="submit_time" required>
                    </div> --}}

                    <div class="control-group">
                        <label class="control-label" for="selectError">Status</label>
                        <div class="controls">
                            <select name="status" id="selectError3" data-rel="chosen">
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="btn" value="Save"> Save</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

            <!-- JavaScript to Convert Date to ISO 8601 -->
            <script>
                document.getElementById('task-form').addEventListener('submit', function(event) {
                        var input = document.getElementById('submit_time');
                        var date = new Date(input.value);
                        var isoDate = date.toISOString();
                        input.value = isoDate; // Set ISO 8601 formatted date
                    });
            </script>

        </div>
    </div>
    <!--/span-->

</div>
<!--/row-->

<!--/row-->


@endsection
