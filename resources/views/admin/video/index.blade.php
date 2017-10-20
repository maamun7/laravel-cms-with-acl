@extends('admin.layout.master')
@section('title') Video List @stop

@section('page_name')
    Video Management
	<small>All Video</small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{{ url('/admin/permission') }}"> Video </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('/admin/video/create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Video
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Group Name</th>
                    <th><center> Action </center></th>
                </tr>

                @foreach($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->lecture_title }}</td>

                    <td>
                        <center>
                            <a href="{{ url('/admin/permission/'.$video->id.'/edit/') }}" class="btn btn-sm btn-success">
                                <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                            </a>
                            <a href="{!! route('admin.permission.delete', array($video->id)) !!}" class="btn btn-sm btn-danger">
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
                {!! $videos->render() !!}
            </div>
        </div>
    </div>
@stop