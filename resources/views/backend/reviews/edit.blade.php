@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Review</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('backend.layouts.inc.common.messages')
            <form method="POST" action="{{ route('admin.review.update', $review->id) }}">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 col-md-6 pe-md-5">
                        <div class="row">
                            <label for="" class="col col-form-label">Manager</label>
                            <div class="col-sm-10 form-group">
                                <input type="text" class="form-control @error('manager') is-invalid @enderror" name="manager" required value="{{ old('manager', $review->manager) }}">
                                @error('manager')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ps-md-5">
                        <div class="row">
                            <label for="company" class="col col-form-label">Comapany</label>
                            <div class="col-sm-10 form-group">
                                <input type="company" class="form-control @error('company') is-invalid @enderror" name="company" id="company" required
                                    value="{{ old('company', $review?->company?->name) }}">
                                @error('company')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row gap-md-0 gap-4">
                            <label for="" class="col-sm-3 col-form-label">Group</label>
                            <div class="col-sm-3 form-group">
                                <input type="text" class="form-control @error('group1') is-invalid @enderror" required name="group1" value="{{ old('group1', $review->group1) }}">
                                @error('group1')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group">
                                <input type="text" class="form-control @error('group2') is-invalid @enderror" name="group2" value="{{ old('group2', $review->group2) }}">
                                @error('group2')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group">
                                <input type="text" class="form-control @error('group3') is-invalid @enderror" name="group3" value="{{ old('group3', $review->group3) }}">
                                @error('group3')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row gap-md-0 gap-4">
                            <label for="" class="col-sm-3 col-form-label">Cities</label>
                            <div class="col-sm-3 form-group">
                                <input type="text" class="form-control @error('city1') is-invalid @enderror" required name="city1" value="{{ old('city1', $review->city1) }}">
                                @error('city1')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group">
                                <input type="text" class="form-control" name="city2" value="{{ old('city2', $review->city2) }}">
                            </div>
                            <div class="col-sm-3 form-group">
                                <input type="text" class="form-control" name="city3" value="{{ old('city3', $review->city3) }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 form-group mt-4">
                        <label for="" class="form-label">Response</label>
                        <textarea class="form-control" name="response">{{ old('response', $review->response) }}</textarea>
                    </div>
                    <div class="col-12 form-group mt-4">
                        <label for="" class="form-label">Reviews</label>
                        <textarea class="form-control @error('review') is-invalid @enderror" required name="review">{{ old('review', $review->review) }}</textarea>
                        @error('review')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 form-group mt-4">
                        <label for="" class="form-label">Discussion</label>
                        <textarea class="form-control @error('discussion') is-invalid @enderror" required name="discussion">{{ old('discussion', $review->discussion) }}</textarea>
                        @error('discussion')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row form-group gap-4">
                            <label for="communication" class="col-sm-auto col-form-label">Communication</label>
                            <div class="col form-group">
                                <input type="number" min="0" class="form-control avg-fields @error('communication') is-invalid @enderror" id="communication" name="communication" required
                                    value="{{ old('communication', $review->communication) }}">
                                @error('communication')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="professionalism" class="col-sm-auto col-form-label">professionalism</label>
                            <div class="col form-group">
                                <input type="number" min="0" class="form-control avg-fields @error('professionalism') is-invalid @enderror" id="professionalism" name="professionalism"
                                    required value="{{ old('professionalism', $review->professionalism) }}">
                                @error('professionalism')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="expertise" class="col-sm-auto col-form-label">Expertise</label>
                            <div class="col form-group">
                                <input type="number" min="0" class="form-control avg-fields @error('expertise') is-invalid @enderror" id="expertise" name="expertise" required
                                    value="{{ old('expertise', $review->expertise) }}">
                                @error('expertise')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="overall" class="col-sm-auto col-form-label">Overall</label>
                            <div class="col form-group">
                                <input type="number" name="overall" readonly min="0" class="form-control" id="overall" value="{{ old('overall', $review->overall) }}">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row justify-content-end mt-3">
                    <a href="{{ route('admin.review.index') }}" class="btn btn-default mr-3">Back</a>
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
@push('scripts')
    <script>
        const form = document.querySelector('#review-form');
        const avgFields = document.querySelectorAll('.avg-fields');
        const overall = document.querySelector('#overall');

        const avgFunc = () => {
            let total = 0;
            avgFields.forEach(field => {
                total += Number(field.value);
            });
            overall.value = (total / 3).toFixed(2);
        };

        avgFields?.forEach((field) => {
            field?.addEventListener('input', (e) => {
                let fieldValue = parseInt(e.target.value);
                e.target.value = fieldValue;
                if (isNaN(fieldValue)) {
                    e.target.value = '';
                }
                if (fieldValue < 0) {
                    e.target.value = 0;
                }
                if (fieldValue > 10) {
                    e.target.value = 10;
                }

                avgFunc();
            })
        })
    </script>
@endpush
