@extends('admin.layout.master')
@section('title') Permission Group @stop


@section('page_name')
    Permission Group
	<small></small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{{ url('/admin/permission-group') }}"> Permission Group </a> </li>
    <li class="active"> <a href="{{ url('/admin/permission-group/'.$group->id.'/edit/') }}"> Edit Permission Group </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('/admin/permission-group') }}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        {!! Form::open(['route' => ['admin.permission-group.update',$group->id], 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('group_name') ? 'has-error' : '' }}}">
                    <label>Permission Group Name</label>
                    {!! Form::text('group_name', $group->group_name, ['class' => 'form-control','id'=>'fast_name','value'=>Input::old('group_name'), 'placeholder' => 'Enter Group Name']) !!}
                    {!! $errors->first('group_name', '<label class="error_txt_size">:message</label>') !!}
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