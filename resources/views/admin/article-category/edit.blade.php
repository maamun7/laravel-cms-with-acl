@extends('admin.layout.master')
@section('title') Permission Group @stop


@section('page_name')
    Permission Group
	<small></small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{!! route('admin.article_categories') !!}"> Article Category </a> </li>
    <li class="active"> <a href="{{ url('/admin/article_categories/'.$category->id.'/edit/') }}"> Edit Permission Group </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.article_categories') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        {!! Form::open(['route' => ['admin.article_category.update',$category->id], 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('category_name') ? 'has-error' : '' }}}">
                    <label>Category Name</label>
                    {!! Form::text('category_name', $category->category_name,['class' => 'form-control','id'=>'category_name','value'=>Input::old('category_name'), 'placeholder' => 'Enter Category Name']) !!}
                    {!! $errors->first('category_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                    <label>Description</label>
                    {!! Form::textarea('description', $category->short_description, ['class' => 'form-control','size' => '30x5','value'=>Input::old('description'), 'placeholder' => 'Enter Category Description']) !!}
                    {!! $errors->first('description', '<label class="error_txt_size">:message</label>') !!}
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