@extends('admin.layout.master')
@section('title') Edit Permission @stop


@section('page_name')
    Edit Permission
	<small></small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{{ url('/admin/permission') }}"> Permission Group </a> </li>
    <li class="active"> <a href="{{ url('/admin/permission/'.$permission->id.'/edit/') }}"> Edit Permission Group </a> </li>
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
        {!! Form::open(['route' => ['admin.permission.update',$permission->id], 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('permission_slug') ? 'has-error' : '' }}}">
                    <label>Permission Slug</label>
                    {!! Form::text('permission_slug',$permission->name, ['class' => 'form-control','id'=>'permission_slug','value'=>Input::old('permission_slug'), 'placeholder' => 'Enter Permission Slug']) !!}
                    {!! $errors->first('permission_slug', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('display_name') ? 'has-error' : '' }}}">
                    <label>Display Name</label>
                    {!! Form::text('display_name',$permission->display_name, ['class' => 'form-control','id'=>'fast_name','value'=>Input::old('display_name'), 'placeholder' => 'Enter Display Name']) !!}
                    {!! $errors->first('display_name', '<label class="error_txt_size">:message</label>') !!}
                </div>

                <div class="form-group {{{ $errors->has('permission_group') ? 'has-error' : '' }}}">
                    <label>Permission Group</label>
                    {!! Form::select('permission_group', $groups, $permission->permission_group_id, array('class' => 'form-control', 'value'=>Input::old('permission_group'))) !!}
                    {!! $errors->first('permission_group', '<label class="error_txt_size">:message</label>') !!}
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