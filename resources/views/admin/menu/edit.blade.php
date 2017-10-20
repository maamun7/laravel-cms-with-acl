@extends('admin.layout.master')
@section('title') Edit Menu @stop

@section('page_name')
	Edit Menu
	<small></small>
@stop

@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> {!! link_to_route('admin.menus', 'Menu Management') !!} </li>
    <li class="active"> <a href="{{ url('/admin/menu/'.$menu->id.'/edit/') }}"> Menu Edit </a> </li>
@stop

@section('content')
    {{--Dynamic Model--}}
    <div id="dynamicModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="frmAddProject"></div>
        </div>
    </div>
    {{--Dynamic Model End--}}
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.menus') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        {!! Form::open(['route' => ['admin.menu.update',$menu->id], 'role' => 'form', 'method' => 'post']) !!}
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                    <label>Title</label>
                    {!! Form::text('title',$menu->title, ['class' => 'form-control','id'=>'title','value'=>Input::old('title'), 'placeholder' => 'Enter Menu Title']) !!}
                    {!! $errors->first('title', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('menu_type') ? 'has-error' : '' }}}">
                    <label>Menu Type</label>
                    {!! Form::select('menu_type', array('' => 'Select Menu Type','top_menu' => 'Top Menu', 'footer_menu' => 'Footer Menu'),$menu->menu_type,array('class' => 'form-control', 'value'=>Input::old('menu_type'))) !!}
                    {!! $errors->first('menu_type', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('content_type') ? 'has-error' : '' }}}">
                    <label>Content Type</label>
                    <div class="input-group">
                        {!! Form::text('content_type',$menu->content_type, ['class' => 'form-control','id'=>'content_type','readonly','value'=>Input::old('content_type'), 'placeholder' => 'Select Content Type']) !!}
                        {!! $errors->first('content_type', '<label class="error_txt_size">:message</label>') !!}
                        <div class="input-group-btn">
                            <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#myModal">Select</button>
                        </div>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                    <label>Order</label>
                    {!! Form::text('order',$menu->ordering, ['class' => 'form-control','id'=>'order','value'=>Input::old('order'), 'placeholder' => 'Enter Order']) !!}
                    {!! $errors->first('order', '<label class="error_txt_size">:message</label>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{{ $errors->has('alias') ? 'has-error' : '' }}}">
                    <label>Title Alias</label>
                    {!! Form::text('alias',$menu->alias, ['class' => 'form-control','id'=>'alias','value'=>Input::old('alias'), 'placeholder' => 'Enter Title Alias']) !!}
                    {!! $errors->first('alias', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('parent_id') ? 'has-error' : '' }}}">
                    <label>Parent Item </label>
                    {!! Form::select('parent_id', $menus, $menu->parent_id, array('class' => 'form-control', 'value'=>Input::old('parent_id'))) !!}
                    {!! $errors->first('parent_id', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group" id="SelectContentType">
                    @if($menu->content_type != 'External Link')
                        <label>Select {!! $menu->content_type !!}</label>
                        <div class='input-group'>
                            <input type='text' name='content' class='form-control' id='content' readonly>
                            <div class='input-group-btn'>
                                @if($menu->content_type == 'Article Category')
                                    <button class='btn btn-warning btn-flat' type='button' data-toggle='modal' data-target='#dynamicModal' href="{!! route('admin.menu.showCategoryList') !!}">Select</button>
                                @elseif($menu->content_type == 'Single Article')
                                    <button class='btn btn-warning btn-flat' type='button' data-toggle='modal' data-target='#dynamicModal' href="{!! route('admin.menu.showArticleList') !!}">Select</button>
                                @endif
                            </div>
                            <input type='hidden' name='content_id' value="{!! $menu->content_id !!}">
                        </div>
                    @endif
                </div>
                <div class="form-group {{{ $errors->has('link') ? 'has-error' : '' }}}">
                    <label>Link</label>
                    {!! Form::text('link',$menu->link, ['class' => 'form-control','readonly','id'=>'link','value'=>Input::old('link'), 'placeholder' => 'Enter Menu Link']) !!}
                    {!! $errors->first('link', '<label class="error_txt_size">:message</label>') !!}
                </div>
                <div class="form-group {{{ $errors->has('published') ? 'has-error' : '' }}}">
                    <label>Published Status</label>
                    {!! Form::select('published', array('1' => 'Published', '0' => 'Unpublished'),$menu->published,array('class' => 'form-control', 'value'=>Input::old('published'))) !!}
                    {!! $errors->first('published', '<label class="error_txt_size">:message</label>') !!}
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


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select a menu item type</h4>
                </div>
                <div class="modal-body">
                    <style>
                        table span:hover{color:#0000ff;text-decoration: underline;cursor: hand}
                    </style>
                    <table class="table table-bordered  table-condensed  text-center">
                        <tr class="info">
                            <th>Article</th>
                            <th>System Link</th>
                            <th>Module</th>
                        </tr>
                        <tr>
                            <td>
                                <span class="click-item" name="Single Article" data-dismiss="modal">Single Article</span>
                            </td>
                            <td>
                                <span class="click-item" name="External Link" data-dismiss="modal">External Link</span>
                            </td>
                            <td>
                                <span class="click-item" name="Module" data-dismiss="modal">Module</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="click-item" name="Article Category" data-dismiss="modal" >Article Category </span>
                            </td>
                            <td> &nbsp; </td>
                            <td> &nbsp; </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
            jQuery('.click-item').click(function(){
                var clickItems = $(this).attr("name");
                switch(clickItems)
                {
                    case "Single Article":
                        $('input[name="content_type"]').val(clickItems);
                        $('input[name="link"]').val('content');
                        $('input[name="link"]').attr("readonly",true);
                        var htmlString = "<label>Select "+ clickItems +"</label>"
                                +"<div class='input-group'>"
                                +"<input type='text' name='content' class='form-control' id='content' readonly>"
                                +"<div class='input-group-btn'>"
                                +"<button class='btn btn-warning btn-flat' type='button' data-toggle='modal' data-target='#dynamicModal' href='"+ "{!! route('admin.menu.showArticleList') !!}" +"'>Select</button>"
                                +"</div>"
                                +"<input type='hidden' name='content_id'>"
                                +"</div>";
                        $('#SelectContentType').html(htmlString);
                        $('input[name="content"]').focus();
                        break;
                    case "Article Category":
                        $('input[name="content_type"]').val(clickItems);
                        $('input[name="link"]').val('category');
                        $('input[name="link"]').attr("readonly",true);
                        var htmlString = "<label>Select "+ clickItems +"</label>"
                                +"<div class='input-group'>"
                                +"<input type='text' name='content' class='form-control' id='content' readonly>"
                                +"<div class='input-group-btn'>"
                                +"<button class='btn btn-warning btn-flat' type='button' data-toggle='modal' data-target='#dynamicModal' href='"+ "{!! route('admin.menu.showCategoryList') !!}" +"'>Select</button>"
                                +"</div>"
                                +"<input type='hidden' name='content_id'>"
                                +"</div>";
                        $('#SelectContentType').html(htmlString);
                        $('input[name="content"]').focus();
                        break;
                    case "External Link":
                        $('input[name="content_type"]').val(clickItems);
                        var htmlString = "";
                        $('#SelectContentType').html(htmlString);
                        $('input[name="link"]').val('');
                        $('input[name="link"]').attr("readonly",false);
                        $('input[name="link"]').focus();
                        break;
                    case "Module":
                        $('input[name="link"]').val('');
                        break;
                }
                //alert(clickItems);
            });
        });
    </script>
@stop