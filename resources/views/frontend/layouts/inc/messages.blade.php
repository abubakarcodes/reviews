@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <p> Alert! {{ Session::get('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <p> Error! {{ Session::get('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <p> Error! {{ $error }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
