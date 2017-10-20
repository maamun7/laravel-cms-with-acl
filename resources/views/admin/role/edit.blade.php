@extends('admin.layout.master')
@section('title') Edit Permission @stop


@section('page_name')
    Edit Permission
	<small></small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li> <a href="{{ url('/admin/permission') }}"> Permission Role </a> </li>
    <li class="active"> <a href="{{ url('/admin/permission/'.$role->id.'/edit/') }}"> Edit Permission Group </a> </li>
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
        {!! Form::open(['route' => ['admin.role.update',$role->id], 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('role_name') ? 'has-error' : '' }}}">
                    <label>Role Name</label>
                    {!! Form::text('role_name', $role->role_name, ['class' => 'form-control','id'=>'role_name','value'=>Input::old('role_name'), 'placeholder' => 'Enter Role Name']) !!}
                    {!! $errors->first('role_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th style="width:20%">Module/Group Name</th>
                        <th style="width:70%;text-align: center">Permission Display Name / Permission Slug</th>
                    </tr>
                    <?php
                    $assigned_perms = explode(",",$role->role_permission->permissions);

                    foreach ($groups as $group) {
                    ?>
                        <tr>
                            <td style="vertical-align: middle;font-weight:bold; text-align: right">
                                <?php echo $group->group_name; ?>
                            </td>
                            <td>
                                <?php
                                if (count($group->permissions)) {
                                ?>
                                    <table class="table table-bordered">
                                    <?php
                                    foreach ($group->permissions as $permission) {
                                    ?>
                                        <tr>
                                            <td style="width:5%;text-align: right">
                                                <?php if(in_array($permission->name, $assigned_perms)){ ?>
                                                    <input name="permission[]" type="checkbox" checked = "checked" value="{{ $permission->name }}">
                                                <?php } else {?>
                                                    <input name="permission[]" type="checkbox" value="{{ $permission->name }}">
                                                <?php }?>
                                            </td>
                                            <td style="width:45%"><?php echo $permission->display_name; ?> </td>
                                            <td style="width:45%"><?php echo $permission->name; ?> </td>
                                        </tr>
                                    <?php } ?>
                                    </table>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
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