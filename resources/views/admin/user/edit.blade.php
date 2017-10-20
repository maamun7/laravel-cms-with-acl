@extends('admin.layout.master')
@section('title') Edit User @stop


@section('page_name')
	Edit User
	<small></small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> {!! link_to_route('admin.users', 'User Management') !!} </li>
    <li class="active"> {!! link_to_route('admin.user.new', 'New User') !!} </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.users') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        {!! Form::open(['route' => ['admin.user.update',$user->id], 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
                    <label>First Name</label>
                    {!! Form::text('first_name', $user->first_name, ['class' => 'form-control','id'=>'fast_name','value'=>Input::old('fast_name'), 'placeholder' => 'Enter First Name']) !!}
                    {!! $errors->first('first_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label>Email</label>
                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'id'=>'email','value'=>Input::old('email'), 'placeholder' => 'Enter Email']) !!}
                    {!! $errors->first('email', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
                    <label>Password</label>
                    {!! Form::password('password', ['class' => 'form-control', 'id'=>'password', 'placeholder' => 'Enter Password']) !!}
                    {!! $errors->first('password', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('user_type') ? 'has-error' : '' }}}">
                    <label>User Type</label>
                    {!! Form::select('user_type', array('' => 'Select User Type','0' => 'Default User', '1' => 'System User'),$user->user_type,array('class' => 'form-control', 'value'=>Input::old('user_type'))) !!}
                    {!! $errors->first('user_type', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    <label>Last Name</label>
                    {!! Form::text('last_name',$user->last_name, ['class' => 'form-control', 'id'=>'last_name','value'=>Input::old('last_name'), 'placeholder' => 'Enter Last Name']) !!}
                    {!! $errors->first('last_name', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('mobile') ? 'has-error' : '' }}}">
                    <label>Mobile</label>
                    {!! Form::text('mobile', $user->mobile, ['class' => 'form-control', 'id'=>'mobile','value'=>Input::old('mobile'), 'placeholder' => 'Enter Mobile']) !!}
                    {!! $errors->first('mobile', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('confirm_pass') ? 'has-error' : '' }}}">
                    <label>Confirm Password</label>
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Re-type Password']) !!}
                    {!! $errors->first('password_confirmation', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('user_role') ? 'has-error' : '' }}}">
                    <label>User Role</label>
                    <?php
                        $role_id ='';
                        if (count($user->roles) > 0 ){
                            $role_id = $user->roles->toArray()[0]['id'];
                        }
                    ?>
                    {!! Form::select('user_role', $roles, $role_id, array('class' => 'form-control', 'value'=>Input::old('user_role'))) !!}

                    {!! $errors->first('user_role', '<label class="error_txt_size">:message</label>') !!}
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