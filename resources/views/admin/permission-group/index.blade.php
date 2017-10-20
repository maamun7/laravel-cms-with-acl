@extends('admin.layout.master')
@section('title') Permission Group List @stop


@section('page_name')
    Permission Group Management
	<small>All Groups</small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{{ url('/admin/permission-group') }}"> Permission Group </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('/admin/permission-group/create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Permission Group
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th><center> Action </center></th>
                </tr>

                @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->group_name }}</td>
                    <td>{{ $group->created_at }}</td>
                    <td>
                        <center>
                            <a href="{{ url('/admin/permission-group/'.$group->id.'/edit/') }}" class="btn btn-sm btn-success">
                                <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                            </a>
                            <a href="{!! route('admin.permission-group.delete', array($group->id)) !!}" class="btn btn-sm btn-danger">
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
                {!! $groups->render() !!}
            </div>
        </div>
    </div>
@stop