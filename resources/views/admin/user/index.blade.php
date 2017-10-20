@extends('admin.layout.master')
@section('title') Use List @stop


@section('page_name')
	User Management
	<small>All Users</small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> {!! link_to_route('admin.users', 'User Management') !!} </li>
@stop

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.user.new') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New User
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <tr class="info">
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Role</th>
                    <th>System?</th>
                    <th><center> Action </center></th>
                </tr>
                @if(count($users))
                    <?php $i = 0; ?>
                    @foreach($users as $user)
                        <?php $i++ ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                            @if (count($user->roles))
                                @foreach($user->roles as $role)
                                    {!! $role->role_name !!}<br/>
                                @endforeach
                            @else
                                <span class="badge bg-red"> Default User </span>
                            @endif
                        </td>
                        <td>
                            @if($user->is_system_user == 1)
                                <span class="badge bg-green"> Yes </span>
                            @else
                                <span class="badge bg-yellow"> No </span>
                            @endif
                        <td>
                            <center>
                                <a href="{!! route('admin.user.edit',array($user->id)) !!}" class="btn btn-xs btn-success">
                                    <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                                </a>
                                <a href="{!! route('admin.user.delete', array($user->id)) !!}" class="btn btn-xs btn-danger">
                                    <i class="glyphicon glyphicon-trash glyphicon-white"></i> Delete
                                </a>
                            </center>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center text-danger">{{ "No data found" }}</td>
                        </tr>
                    @endif
            </table>
        </div><!-- /.box-body -->

        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@stop