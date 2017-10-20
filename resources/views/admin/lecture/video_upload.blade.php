@extends('admin.layout.master')
@section('title') Create New Course @stop
@section('page_name')
    Create New Lecture
    <small></small>
@stop
@section ('breadcrumbs')
    <li> <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"> <a href="{!! route('admin.lecture') !!}"> Lecture </a> </li>
    <li class="active"> <a href="{!! route('admin.lecture.new') !!}"> New Lecture </a> </li>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.lecture') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
        </div><!-- /.box-header -->
        <script src="{!! asset('backend/dist/js/jquery.form.min.js') !!}"></script>
        <div class="box-body">
            <div class="col-md-4">
                <div id="loader-icon" style="display:none;">
                    <img src="{{ url('/backend/dist/img/') }}/loader_icon.gif">
                </div>
            </div>
            <div class="col-md-6">
                <div class="cancel_upload"> <span> &times; </span> Cancel </div>

                <div id="progress">
                    <div id="bar"></div>
                    <div id="percent">0%</div>
                </div>
                <div id="message"> </div>

                {!! Form::open(['role' => 'form', 'method' => 'post', 'id' => 'VideoUploadForm','name' => 'uploadForm', 'files'=>true]) !!}
                    <div class="form-group {{{ $errors->has('cover_image') ? 'has-error' : '' }}}">
                        <label>Lecture Video</label>
                        {!! Form::file('video', ['id' => 'videoUpload','class' => 'videoUploadView']) !!}
                        {!! $errors->first('video', '<label class="error_txt_size">:message</label>') !!}
                    </div>
                    <div class="form-group">
                        <div class="error_message" style="display: none"></div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-2">
                <div id="targetLayer"></div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#videoUpload').on("change", function () {
            $('.error_message').hide();
            var XHR = new window.XMLHttpRequest();
            var options = {
                type: "post",
                url: "{!! route('admin.lecture.upload_progress', array($lecture->id)) !!}",
                beforeSend: function () {
                    $('#loader-icon').show();
                    $("#progress").show();
                    $(".cancel_upload").show();
                    //clear everything
                    $("#bar").width('0%');
                    $("#message").html("");
                    $("#percent").html("0%");
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    $("#bar").width(percentComplete + '%');
                    $("#percent").html(percentComplete + '%');
                },
                success: function () {
                    $("#bar").width('100%');
                    $("#percent").html('100%');
                    $("#message").html("<font color='green'>" + "Successfully Upload" + "</font>");
                },
                complete: function (response) {
                    $('#loader-icon').hide();
                    $(".cancel_upload ").hide();
                },
                error: function (data) {
                    var r = jQuery.parseJSON(data.responseText);
                    //console.log(r.video);
                    $('.error_message').html(r.video);
                    $('.error_message').show();
                    $('#progress').hide();
                    $(".cancel_upload ").hide();
                },
                resetForm: true
            };


            var submitForm = $("#VideoUploadForm").ajaxSubmit(options);
            var xhr = submitForm.data('jqxhr');
            $('.cancel_upload').click(function() {
                if(xhr) {
                    //Hide all showing icon
                    $("#progress").hide();
                    $('#loader-icon').hide();
                    $(".cancel_upload ").hide();
                    //Reset form
                    $("#VideoUploadForm").get(0).reset();
                    //Cancel upload
                    xhr.abort();
                    //Show msg Cancel Upload
                    $('.error_message').html("Cancel Upload !");
                    $('.error_message').show();
                }
            });

        });
    </script>
@stop