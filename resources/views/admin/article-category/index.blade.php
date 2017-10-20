@extends('admin.layout.master')
@section('title') Article Category List @stop

@section('page_name')
    Article Category Management
	<small>All Article Categories</small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{!! route('admin.article_categories') !!}"> Article Category </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.article_category.new') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Article Category
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <tr class="info">
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th class="text-center">Action</th>
                </tr>
                @if(count($categories))
                    <?php $i = 0; ?>
                    @foreach($categories as $category)
                    <?php $i++ ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ url('/admin/article_category/'.$category->id.'/edit/') }}" class="btn btn-sm btn-success">
                                <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                            </a>
                            <a href="{!! route('admin.article_category.delete', array($category->id)) !!}" class="btn btn-sm btn-danger">
                                <i class="glyphicon glyphicon-trash glyphicon-white"></i> Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center text-danger">{{ "No data found" }}</td>
                    </tr>
                @endif
            </table>
        </div><!-- /.box-body -->

        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $categories->render() !!}
            </div>
        </div>
    </div>
@stop