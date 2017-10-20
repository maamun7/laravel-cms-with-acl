@extends('admin.layout.master')
@section('title') Create New Lecture @stop
@section('page_name')
    Edit Lecture
    <small></small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{!! route('admin.lecture') !!}"> Lecture </a> </li>
    <li class="active"> <a href="{{ url('/admin/lecture/'.$lecture->id.'/edit/') }}"> Edit Lecture </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.lecture') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        {!! Form::open(['route' =>['admin.lecture.update',$lecture->id], 'role' => 'form', 'method' => 'post', 'files'=>true]) !!}
        <div class="box-body">
            <div class="col-md-12">
				<div class="form-group {{{ $errors->has('course') ? 'has-error' : '' }}}">
                    <label>Select Course</label>
                    {!! Form::select('course', $course, $lecture->course_id, array('class' => 'form-control', 'value'=>Input::old('course'))) !!}
                    {!! $errors->first('course', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('lecture_name') ? 'has-error' : '' }}}">
                    <label>Lecture Name</label>
                    {!! Form::text('lecture_name', $lecture->lecture_name, ['class' => 'form-control','id'=>'lecture_name','value'=>Input::old('lecture_name'), 'placeholder' => 'Enter Lecture Name']) !!}
                    {!! $errors->first('lecture_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-4">  
				<div class="form-group {{{ $errors->has('cover_image') ? 'has-error' : '' }}}">
                    <label>Cover Picture</label>
                    {!! Form::file('cover_image', null, ['class' => 'form-control','id'=>'cover_image']) !!}
                    {!! $errors->first('cover_image', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-8">  					
				<?php
				if(file_exists($lecture->image_path.$lecture->cover_image)){
				?>
				<img src="{{ url('/uploads/images/lecture_picture/') }}/{{ $lecture->cover_image }}" height="70" width="60">
				<?php
				}
				?>
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! Form::submit('Save Changes', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop