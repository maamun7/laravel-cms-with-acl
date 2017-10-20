@extends('admin.layout.master')
@section('title') Permission List @stop

@section('page_name')
    Permission Management
	<small>All Permission</small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{{ url('/admin/permission') }}"> Permission </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('/admin/permission/create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Permission
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl.</th>
                    <th>Display Name</th>
                    <th>Name</th>
                    <th>Group Name</th>
                    <th><center> Action </center></th>
                </tr>

                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->display_name }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        @if (count($permission->permission_group))
                            {{ $permission->permission_group->group_name }}
                        @endif
                    </td>
                    <td>
                        <center>
                            <a href="{{ url('/admin/permission/'.$permission->id.'/edit/') }}" class="btn btn-sm btn-success">
                                <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                            </a>
                            <a href="{!! route('admin.permission.delete', array($permission->id)) !!}" class="btn btn-sm btn-danger">
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
                {!! $permissions->render() !!}
            </div>
        </div>
    </div>
@stop