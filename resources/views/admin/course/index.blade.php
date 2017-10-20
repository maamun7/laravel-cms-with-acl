@extends('admin.layout.master')
@section('title') Course List @stop
@section('page_name')
    Course Management
    <small>All Course</small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{!! route('admin.course') !!}"> Course </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.course.new') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Course
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <tr class="info">
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Cover Picture</th>
                    <th>Duration</th>
                    <th>Total Lecture</th>
                    <th><center> Action </center></th>
                </tr>

                @if(count($courses))
                    <?php $i = 0; ?>
                    @foreach($courses as $course)
                    <?php $i++ ?>
                    <tr>
                        <td>{{ $i }}</td>
						<td>{{ $course->course_name }}</td>
						<td>{{ $course->price }}</td>
						<td>
                            <center>
                                <?php
                                    if(file_exists($course->image_path.$course->cover_image)){
                                ?>
                                    <img src="{{ url('/uploads/images/course_picture/') }}/{{ $course->cover_image }}" height="40" width="35">
                                <?php
                                    }
                                ?>
                            </center>
                        </td>
						<td>{{ $course->course_duration }}</td>
						<td>{{ $course->total_lecture }}</td>

						<td>
							<center>
								<a href="{!! route('admin.course.edit', array($course->id)) !!}" class="btn btn-sm btn-success">
									<i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
								</a>
								<a href="{!! route('admin.course.delete', array($course->id)) !!}" class="btn btn-sm btn-danger">
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
                {!! $courses->render() !!}
            </div>
        </div>
    </div>
@stop
