@extends('admin.layout.master')
@section('title') Course List @stop
@section('page_name')
    Lecture Management
    <small>All Lecture</small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{!! route('admin.lecture') !!}"> Lecture </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.lecture.new') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Lecture
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <tr class="info">
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Course Name</th>
                    <th>Cover Picture</th>
                    <th>Duration</th>
                    <th>File Size</th>
                    <th>Resolution</th>
                    <th><center> Video </center></th>
                    <th><center> Action </center></th>
                </tr>

                @if(count($lectures))
                    <?php $i = 0; ?>
                    @foreach($lectures as $lecture)
                    <?php $i++ ?>
                    <tr>
                        <td>{{ $i }}</td>
						<td>{{ $lecture->lecture_name }}</td>
						<td>
                            @if (count($lecture->course))
                                {{ $lecture->course->course_name }}
                            @endif
                        </td>
						<td>
                            <center>
                                <?php
                                    if(file_exists($lecture->image_path.$lecture->cover_image)){
                                ?>
                                    <img src="{{ url('/uploads/images/lecture_picture/') }}/{{ $lecture->cover_image }}" height="40" width="35">
                                <?php
                                    }
                                ?>
                            </center>
                        </td>
						<td>{{ $lecture->video_duration }}</td>
						<td>{{ $lecture->video_size }}</td>
						<td>{{ $lecture->video_resolution }}</td>
						<td>
                            <center>
                                <a href="{!! route('admin.lecture.video_upload', array($lecture->id)) !!}" class="btn btn-sm btn-success">
                                    <i class="glyphicon glyphicon-upload glyphicon-white"></i> <?php if($lecture->video_file == ""){?> {{"Upload"}} <?php }else{ ?> {{"Change"}} <?php } ?>
                                </a>
                            </center>
                        </td>

						<td>
                            <center>
                                <a href="{!! route('admin.lecture.edit', array($lecture->id)) !!}" class="btn btn-sm btn-success">
                                    <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                                </a>
                                <a href="{!! route('admin.lecture.delete', array($lecture->id)) !!}" class="btn btn-sm btn-danger">
                                    <i class="glyphicon glyphicon-trash glyphicon-white"></i> Delete
                                </a>
                            </center>
						</td>
					</tr>
					@endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center text-danger">{{ "No data found" }}</td>
                    </tr>
                @endif
            </table>
        </div><!-- /.box-body -->

        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $lectures->render() !!}
            </div>
        </div>
    </div>
@stop
