@extends('admin.layout.master')
@section('title') Menu List @stop

@section('page_name')
	Menu Management
	<small>All Menus</small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> {!! link_to_route('admin.menus', 'Menu Management') !!} </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.menu.new') !!}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New User
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th>Sl.</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Order</th>
                        <th>Content Type</th>
                        <th>Content Link</th>
                        <th>Content ID</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="menu-pages" data-token="{{ csrf_token() }}">
                    @if(count($menus))
                        <?php $i = 0; ?>
                        @foreach($menus as $menu)
                        <?php $i ++; ?>
                        <tr class="item" id="item_{{ $menu->id }}">
                            <td>{{ $i }}</td>
                            <td>{{str_repeat('|&#x21d2; ',$menu->level)}} {{ $menu->title }}</td>
                            <td>{{ $menu->menu_type }}</td>
                            <td>{{ $menu->ordering }}</td>
                            <td>{{ $menu->content_type }}</td>
                            <td>{{ $menu->link }}</td>
                            <td>{{ $menu->content_id }}</td>
                            <td class="text-center">
                                <a href="{!! route('admin.menu.edit',array($menu->id)) !!}" class="btn btn-sm btn-success">
                                    <i class="glyphicon glyphicon-edit glyphicon-white"></i> Edit
                                </a>
                                <a href="{!! route('admin.menu.delete', array($menu->id)) !!}" class="btn btn-sm btn-danger">
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
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" class="text-center text-danger"> {{"Drag and drop to re-order"}}</td>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <div class="pull-right">
                {{--{!! $menus->render() !!}--}}
            </div>
        </div>

        <script language="javascript">
            // Menu Re-ordering
            $(document).ready(function(){
                //$("#menu-pages").sortable({
                $("#menu-pages").sortable().bind('sortupdate', function(e, ui) {
                    /*update: function(event, ui) {
                        //$.post("{!! route('admin.menu.update_ordering') !!}",{type: "orderItems", pages:$('#menu-pages').sortable('serialize') } );
                        //location.reload();

                        *//*var order = $(this).sortable('serialize');
                        console.log(order);
                        $.post("{!! route('admin.menu.update_ordering') !!}", { order: order });*//*
                    }*/
                    $.ajax({
                        type: "POST",
                        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                        url: "{!! route('admin.menu.update_ordering') !!}",
                        dataType: "json",
                        data: {items:$(this).sortable('serialize')},
                        success: function(order){
                            console.log(order)
                        },
                        error: function () {
                           // alert("error");
                        }
                    });
                });
            });
        </script>
    </div>
@stop