@extends('backend.layouts.master')
@section('content')
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ App\Models\Company::count() }}</h3>
                        <p>Companies</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <a href="{{ route('admin.company.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ App\Models\Review::count() }}</h3>

                        <p>Reviews</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <a href="{{ route('admin.review.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- /.content-wrapper -->
@endsection
