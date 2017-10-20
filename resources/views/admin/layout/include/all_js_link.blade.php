<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
{!! Html::script('backend/bootstrap/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! Html::script('backend/plugins/morris/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('backend/plugins/sparkline/jquery.sparkline.min.js') !!}
<script src=""></script>
<!-- jvectormap -->
<script src="{!! asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('backend/plugins/knob/jquery.knob.js') !!}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{!! asset('backend/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- datepicker -->
<script src="{!! asset('backend/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<!-- Slimscroll -->
<script src="{!! asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('backend/plugins/fastclick/fastclick.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('backend/dist/js/app.min.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('backend/dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('backend/dist/js/demo.js') !!}"></script>