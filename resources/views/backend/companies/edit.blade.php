@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Company</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('backend.layouts.inc.common.messages')
            <form method="POST" action="{{ route('admin.company.update', $company->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <input value="{{ old('name', $company->name) }}" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" name="name">
                    @if ($errors->has('name'))
                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input value="{{ old('slug', $company->slug) }}" type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" placeholder="slug" name="slug">
                    @if ($errors->has('slug'))
                        <span class="error invalid-feedback">{{ $errors->first('slug') }}</span>
                    @endif

                </div>
                <div class="row justify-content-end mt-3">
                    <a href="{{ route('admin.company.index') }}" class="btn btn-default mr-2"><i class="fas fa-times"></i>
                        Close</a>
                    <button class="btn btn-primary"><i class="fas fa-refresh"></i> Update</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
@stop
