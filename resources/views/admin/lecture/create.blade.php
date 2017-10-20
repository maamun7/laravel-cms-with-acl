@extends('admin.layout.master')
@section('title') Create New Course @stop
@section('page_name')
    Create New Lecture
    <small></small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{!! route('admin.lecture') !!}"> Lecture </a> </li>
    <li class="active"> <a href="{!! route('admin.lecture.new') !!}"> New Lecture </a> </li>
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
        {!! Form::open(['route' => 'admin.lecture.store', 'role' => 'form', 'method' => 'post', 'files'=>true]) !!}
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('course') ? 'has-error' : '' }}}">
                    <label>Select Course</label>
                    {!! Form::select('course', $course, null, array('class' => 'form-control', 'value'=>Input::old('course'))) !!}
                    {!! $errors->first('course', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('course_name') ? 'has-error' : '' }}}">
                    <label>Lecture Name</label>
                    {!! Form::text('lecture_name', null, ['class' => 'form-control','id'=>'lecture_name','value'=>Input::old('lecture_name'), 'placeholder' => 'Enter Lecture Name']) !!}
                    {!! $errors->first('lecture_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('cover_image') ? 'has-error' : '' }}}">
                    <label>Cover Picture</label>
                    {!! Form::file('cover_image', null, ['class' => 'form-control','id'=>'cover_image']) !!}
                    {!! $errors->first('cover_image', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            {{--<div class="col-md-6">
                <div class="form-group {{{ $errors->has('course_duration') ? 'has-error' : '' }}}">
                    <label>Course Duration</label>
                    {!! Form::text('lecture_duration', null, ['class' => 'form-control','id'=>'lecture_duration','value'=>Input::old('lecture_duration'), 'placeholder' => 'Enter Lecture Duration']) !!}
                    {!! $errors->first('lecture_duration', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>--}}
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop