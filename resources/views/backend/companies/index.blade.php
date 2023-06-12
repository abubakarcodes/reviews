@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Companies</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('backend.layouts.inc.common.messages')
            <form method="POST" action="{{ route('admin.company.store') }}">
                @csrf
                <div class="form-group">
                    <input value="{{ old('name') }}" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" name="name">
                    @if ($errors->has('name'))
                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input value="{{ old('slug') }}" type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" placeholder="slug" name="slug">
                    @if ($errors->has('slug'))
                        <span class="error invalid-feedback">{{ $errors->first('slug') }}</span>
                    @endif
                </div>
                <div class="row justify-content-end mt-3">
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <Table class="table-bordered table" id="myDataTable">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>slug</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->slug }}</td>
                                <td class="d-flex">
                                    <a target="_blank" href="{{ route('company', $company->slug) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admin.company.edit', $company->id) }}" class="btn btn-primary btn-sm ml-2"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ route('admin.company.destroy', $company->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Are You sure To Delete?')" type="submit" class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </Table>
            </div>
        </div>
    </div>
@endsection

