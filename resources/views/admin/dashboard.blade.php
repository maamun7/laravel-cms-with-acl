@extends('admin.layout.master')
@section('title') Admin Dashboard @stop

@section('page_name')
	Dashboard
	<small>Control panel</small>
@stop

@section ('breadcrumbs')
    <li class="active"> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
@stop

@section('content')
    <p>This is my body content.</p>

   {{ get_logged_user_email() }}








@stop