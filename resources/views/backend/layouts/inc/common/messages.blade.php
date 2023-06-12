@if(Session::has("success"))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p><i class="fa fa-check"></i> Alert! {{ Session::get('success') }}</p>

</div>
@endif
@if(Session::has("error"))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p><i class="fa fa-close"></i> Error! {{ Session::get('error') }}</p>

</div>
@endif
@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p><i class="fa fa-close"></i> Error! {{ $error }}</p>

</div>
@endforeach
@endif
