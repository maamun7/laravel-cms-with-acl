@extends('admin.layout.master')
@section('title') Article List @stop
@section('page_name')
    Article Management
    <small>All Article</small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{!! route('admin.articles') !!}"> Article </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.article.new') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Article
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <tr class="info">
                    <th>Sl.</th>
                    <th>Title</th>
                    <th>Category Name</th>
                    <th><center> Action </center></th>
                </tr>

                @if(count($articles))
                    <?php $i = 0; ?>
                    @foreach($articles as $article)
                    <?php $i++ ?>
                    <tr>
                        <td>{{ $i }}</td>
						<td>{{ $article->article_name }}</td>
						<td>
							@if (count($article->article_category))
								{{ $article->article_category->category_name }}
							@endif
						</td>
						<td>
							<center>
								<a href="{{ url('/admin/article/'.$article->id.'/edit/') }}" class="btn btn-sm btn-success">
									<i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
								</a>
								<a href="{!! route('admin.article.delete', array($article->id)) !!}" class="btn btn-sm btn-danger">
									<i class="glyphicon glyphicon-trash glyphicon-white"></i> Delete
								</a>
							</center>
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
                {!! $articles->render() !!}
            </div>
        </div>
    </div>
@stop