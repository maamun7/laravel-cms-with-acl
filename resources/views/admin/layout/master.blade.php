<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('author', 'Mamun Ahmed')">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        @yield('meta')
		
		@include('admin.layout.include.all_css_link')
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<!-- Header -->
			<header class="main-header">
				<!-- Logo -->
				<a href="{{ url('/admin') }}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>A</b>LT</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Admin</b>LTE</span>
				</a>
				@include('admin.layout.include.top_nav')
			</header>
			
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				@include('admin.layout.include.left_sidebar')
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
			
				<!-- Content Header (Page header) -->
				<section class="content-header">

					<h1>						
						@section('page_name')
							//Page name will come here
						@show
					</h1>
					<ol class="breadcrumb">
                        @section('breadcrumbs')
                            {{--//Breadcrumb will come here--}}
                        @show
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
                    <!--Flash Message-->
                     @include('admin.layout.include.flash')
                    <!--Content-->
					@yield('content')
				</section> <!-- /.content -->
		
			</div><!-- /.content-wrapper -->
			<footer class="main-footer">
				@include('admin.layout.include.footer')
			</footer>
		</div><!-- ./wrapper -->
		<!-- Right sidebar for changing settings -->
		@include('admin.layout.include.right_sidebar')
		<!-- All JS Links -->
		@include('admin.layout.include.all_js_link')
		
	</body>
</html>
