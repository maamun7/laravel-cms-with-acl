@extends('admin.layout.master')
@section('title') Create New Article @stop
@section('page_name')
    Edit Article
    <small></small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{!! route('admin.course') !!}"> Course </a> </li>
    <li class="active"> <a href="{{ url('/admin/course/'.$course->id.'/edit/') }}"> Edit Article </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.course') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        {!! Form::open(['route' =>['admin.course.update',$course->id], 'role' => 'form', 'method' => 'post', 'files'=>true]) !!}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('course_name') ? 'has-error' : '' }}}">
                    <label>Course Name</label>
                    {!! Form::text('course_name', $course->course_name, ['class' => 'form-control','id'=>'course_name','value'=>Input::old('course_name'), 'placeholder' => 'Enter Course Name']) !!}
                    {!! $errors->first('course_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('course_duration') ? 'has-error' : '' }}}">
                    <label>Course Duration</label>
                    {!! Form::text('course_duration', $course->course_duration, ['class' => 'form-control','id'=>'course_duration','value'=>Input::old('course_duration'), 'placeholder' => 'Enter Course Duration']) !!}
                    {!! $errors->first('course_duration', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('sort_order') ? 'has-error' : '' }}}">
                    <label>Sort Order</label>
                    {!! Form::text('sort_order', $course->sort_order, ['class' => 'form-control','id'=>'sort_order','value'=>Input::old('sort_order'), 'placeholder' => 'Enter Sort Order']) !!}
                    {!! $errors->first('sort_order', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('total_lecture') ? 'has-error' : '' }}}">
                    <label>Course Price</label>
                    {!! Form::text('price', $course->price, ['class' => 'form-control','id'=>'price','value'=>Input::old('price'), 'placeholder' => 'Enter Course Price']) !!}
                    {!! $errors->first('price', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('total_lecture') ? 'has-error' : '' }}}">
                    <label>Total Lecture</label>
                    {!! Form::text('total_lecture', $course->total_lecture, ['class' => 'form-control','id'=>'total_lecture','value'=>Input::old('total_lecture'), 'placeholder' => 'Enter Total Lecture']) !!}
                    {!! $errors->first('total_lecture', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('cover_image') ? 'has-error' : '' }}}">
                    <label>Cover Picture</label>
                    {!! Form::file('cover_image', null, ['class' => 'form-control','id'=>'cover_image']) !!}
                    {!! $errors->first('cover_image', '<label class="error_txt_size">:message</label>') !!}
                    <br/>
                    <?php
                    if(file_exists($course->image_path.$course->cover_image)){
                    ?>
                    <img src="{{ url('/uploads/images/course_picture/') }}/{{ $course->cover_image }}" height="70" width="60">
                    <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <div class="">
                        {!! Form::checkbox('is_new', 1, $course->is_new, ['class' => '']) !!}
                        &nbsp; <label>Is New</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('meta_title') ? 'has-error' : '' }}}">
                    <label>Meta Title</label>
                    {!! Form::text('meta_title', $course->meta_title, ['class' => 'form-control','id'=>'meta_title','value'=>Input::old('meta_title'), 'placeholder' => 'Enter Meta Title']) !!}
                    {!! $errors->first('meta_title', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('meta_description') ? 'has-error' : '' }}}">
                    <label>Meta Description</label>
                    {!! Form::textarea('meta_description', $course->meta_description, ['class' => 'form-control','size' => '30x5','value'=>Input::old('meta_description'), 'placeholder' => 'Enter Meta Description']) !!}
                    {!! $errors->first('meta_description', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('meta_keyword') ? 'has-error' : '' }}}">
                    <label>Meta Keyword</label>
                    {!! Form::textarea('meta_keyword', $course->meta_keyword, ['class' => 'form-control','size' => '30x5','value'=>Input::old('meta_keyword'), 'placeholder' => 'Enter Meta Keyword']) !!}
                    {!! $errors->first('meta_keyword', '<label class="error_txt_size">:message</label>') !!}
                </div>
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