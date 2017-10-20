@extends('admin.layout.master')
@section('title') Role List @stop

@section('page_name')
    Role Management
	<small>All Role</small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{{ url('/admin/role') }}"> Role </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('/admin/role/create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Role
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl.</th>
                    <th>Role Name</th>
                    <th>Created At</th>
                    <th><center> Action </center></th>
                </tr>

                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->role_name }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>
                        <center>
                            <a href="{{ url('/admin/role/'.$role->id.'/edit/') }}" class="btn btn-sm btn-success">
                                <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                            </a>
                            <a href="{!! route('admin.role.delete', array($role->id)) !!}" class="btn btn-sm btn-danger">
                                <i class="glyphicon glyphicon-trash glyphicon-white"></i> Delete
                            </a>
                        </center>
                    </td>
                </tr>
                @endforeach
            </table>
        </div><!-- /.box-body -->

        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $roles->render() !!}
            </div>
        </div>
    </div>
@stop