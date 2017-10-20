@if(Session::has('flashMessageSuccess'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" >&times;</button>
        {{ Session::get('flashMessageSuccess') }}
    </div>
@endif

@if(Session::has('flashMessageAlert'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert" >&times;</button>
        {{ Session::get('flashMessageAlert') }}
    </div>
@endif

@if(Session::has('flashMessageWarning'))
    <div class="alert alert-warning">
        <button class="close" data-dismiss="alert" >&times;</button>
        {{ Session::get('flashMessageWarning') }}
    </div>
@endif



<script>
    $('div.alert').not('.alert-important').delay(7000).slideUp(300);
</script>