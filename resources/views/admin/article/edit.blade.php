@extends('admin.layout.master')
@section('title') Create New Article @stop
@section('page_name')
    Create New Article
    <small></small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{!! route('admin.articles') !!}"> Article </a> </li>
    <li class="active"> <a href="{{ url('/admin/article/'.$article->id.'/edit/') }}"> Edit Article </a> </li>
@stop

@section('content')
     {{--Add CK Editor--}}
     {!! Html::script('backend/plugins/ckeditor/ckeditor.js') !!}
     {!! Html::script('backend/plugins/ckfinder/ckfinder.js') !!}
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.articles') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        {!! Form::open(['route' => ['admin.article.update',$article->id], 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('article_name') ? 'has-error' : '' }}}">
                    <label>Article Name</label>
                    {!! Form::text('article_name', $article->article_name, ['class' => 'form-control','id'=>'fast_name','value'=>Input::old('article_name'), 'placeholder' => 'Enter article name']) !!}
                    {!! $errors->first('article_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('article_category') ? 'has-error' : '' }}}">
                    <label>Article Category</label>
                    {!! Form::select('article_category', $categories, $article->article_category_id, array('class' => 'form-control', 'value'=>Input::old('article_category'))) !!}
                    {!! $errors->first('article_category', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                    <label>Description</label>
                    {!! Form::textarea('description', $article->description, ['class' => 'form-control ckeditor','size' => '30x5','value'=>Input::old('description'), 'placeholder' => 'Enter article details']) !!}
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
    <div id="fileBrowseUrl" name="{!! route('admin.article.browse_image') !!}">
@stop