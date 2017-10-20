@extends('admin.layout.master')
@section('title') Create New Permission @stop
@section('page_name')
    Create New Permission
    <small></small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{{ url('/admin/permission') }}"> Permission </a> </li>
    <li class="active"> <a href="{{ url('/admin/permission/create') }}"> Create Permission </a> </li>
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
        {!! Form::open(['route' => 'admin.role.store', 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('role_name') ? 'has-error' : '' }}}">
                    <label>Role Name</label>
                    {!! Form::text('role_name', null, ['class' => 'form-control','id'=>'role_name','value'=>Input::old('role_name'), 'placeholder' => 'Enter Role Name']) !!}
                    {!! $errors->first('role_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:20%">Module/Group Name</th>
                        <th style="width:70%;text-align: center">Permission Display Name / Permission Slug</th>
                    </tr>

                    @foreach($groups as $group)
                        <tr>
                            <td style="vertical-align: middle;font-weight:bold; text-align: right">
                                {{ $group->group_name }}
                            </td>
                            <td>

                                @if (count($group->permissions))
                                    <table class="table table-bordered">
                                        @foreach($group->permissions as $permission)
                                        <tr>
                                            <td style="width:5%;text-align: right">
                                                <input name="permission[]" type="checkbox" value="{{ $permission->name }}">
                                            </td>
                                            <td style="width:45%">{{ $permission->display_name }} </td>
                                            <td style="width:45%">{{ $permission->name }} </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
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