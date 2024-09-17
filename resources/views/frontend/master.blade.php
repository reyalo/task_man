<!DOCTYPE html>
<html lang="en">

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">

    <title>@yield('title')</title>

    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword"
        content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{ asset('') }}css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="{{ asset('') }}css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="{{ asset('') }}css/style-responsive.css" rel="stylesheet">
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext'
        rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href={{ asset('') }}css/ie.css" rel="stylesheet">
	<![endif]-->

    <!--[if IE 9]>
		<link id="ie9style" href={{ asset('') }}css/ie9.css" rel="stylesheet">
	<![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->




</head>

<body>
    <!-- start: Header -->
    @include('frontend.includes.header')
    <!-- end: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="{{ route('home') }}"><i class="icon-bar-chart"></i><span class="hidden-tablet">
                                    Dashboard</span></a></li>
                        {{-- <li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet">
                                    Messages</span></a></li> --}}

                        <li><a href="{{ route('manageTask') }}"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Tasks</span></a>
                        <li><a href="#"><i class="icon-edit"></i><span class="hidden-tablet"> Edit Tasks</span></a>
                        <li><a href="{{ route('addTask') }}"><i class="icon-list-alt"></i><span class="hidden-tablet"> Add Tasks</span></a>
                        </li>
                        <li><a href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI
                                    Features</span></a></li>
                        <li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet">
                                    Widgets</span></a></li>
                        <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                                    class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3
                                </span></a>
                            <ul>
                                <li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet"> Sub Menu 1</span></a></li>
                                <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet"> Sub Menu 2</span></a></li>
                                <li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span
                                            class="hidden-tablet"> Sub Menu 3</span></a></li>
                            </ul>
                        </li>
                        <li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a>
                        </li>
                        <li><a href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet">
                                    Charts</span></a></li>
                        <li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet">
                                    Typography</span></a></li>
                        <li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet">
                                    Gallery</span></a></li>
                        <li><a href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet">
                                    Tables</span></a></li>
                        <li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet">
                                    Calendar</span></a></li>
                        <li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet">
                                    File Manager</span></a></li>
                        <li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a>
                        </li>
                        <li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login
                                    Page</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- end: Main Menu -->

            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
                </div>
            </noscript>

            <!-- start: Content -->
            <div id="content" class="span10">



                @yield('content')

                <!--/row-->



            </div>
            <!--/.fluid-container-->

            <!-- end: Content -->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->

    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <p>Here settings can be configured...</p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div>

    <div class="clearfix"></div>

    <!-----footer----->

    @include('frontend.includes.footer')

    <!-- start: JavaScript-->

    <script src="{{ asset('') }}js/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('') }}js/jquery-migrate-1.0.0.min.js"></script>

    <script src="{{ asset('') }}js/jquery-ui-1.10.0.custom.min.js"></script>

    <script src="{{ asset('') }}js/jquery.ui.touch-punch.js"></script>

    <script src="{{ asset('') }}js/modernizr.js"></script>

    <script src="{{ asset('') }}js/bootstrap.min.js"></script>

    <script src="{{ asset('') }}js/jquery.cookie.js"></script>

    <script src="{{ asset('') }}js/fullcalendar.min.js"></script>

    <script src="{{ asset('') }}js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('') }}js/excanvas.js"></script>
    <script src="{{ asset('') }}js/jquery.flot.js"></script>
    <script src="{{ asset('') }}js/jquery.flot.pie.js"></script>
    <script src="{{ asset('') }}js/jquery.flot.stack.js"></script>
    <script src="{{ asset('') }}js/jquery.flot.resize.min.js"></script>

    <script src="{{ asset('') }}js/jquery.chosen.min.js"></script>

    <script src="{{ asset('') }}js/jquery.uniform.min.js"></script>

    <script src="{{ asset('') }}js/jquery.cleditor.min.js"></script>

    <script src="{{ asset('') }}js/jquery.noty.js"></script>

    <script src="{{ asset('') }}js/jquery.elfinder.min.js"></script>

    <script src="{{ asset('') }}js/jquery.raty.min.js"></script>

    <script src="{{ asset('') }}js/jquery.iphone.toggle.js"></script>

    <script src="{{ asset('') }}js/jquery.uploadify-3.1.min.js"></script>

    <script src="{{ asset('') }}js/jquery.gritter.min.js"></script>

    <script src="{{ asset('') }}js/jquery.imagesloaded.js"></script>

    <script src="{{ asset('') }}js/jquery.masonry.min.js"></script>

    <script src="{{ asset('') }}js/jquery.knob.modified.js"></script>

    <script src="{{ asset('') }}js/jquery.sparkline.min.js"></script>

    <script src="{{ asset('') }}js/counter.js"></script>

    <script src="{{ asset('') }}js/retina.js"></script>

    <script src="{{ asset('') }}js/custom.js"></script>
    <!-- end: JavaScript-->

</body>

</html>
