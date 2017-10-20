@extends('admin.layout.master')
@section('title') Create New Video @stop
@section('page_name')
    Create New Video
    <small></small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{{ url('/admin/video') }}"> Video </a> </li>
    <li class="active"> <a href="{{ url('/admin/video/create') }}"> Create Video </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('/admin/permission') }}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        {!! Form::open(['route' => 'admin.video.store', 'role' => 'form', 'method' => 'post', 'files'=>true]) !!}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('permission_slug') ? 'has-error' : '' }}}">
                    <label>Lecture Title Slug </label>
                    {!! Form::text('lecture_title', null, ['class' => 'form-control','id'=>'lecture_title','value'=>Input::old('lecture_title'), 'placeholder' => 'Enter Lecture Title']) !!}
                    {!! $errors->first('lecture_title', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('display_name') ? 'has-error' : '' }}}">
                    <label>Select Video</label>
                    {!! Form::file('video', null, ['class' => 'form-control','id'=>'video']) !!}
                    {!! $errors->first('video', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop