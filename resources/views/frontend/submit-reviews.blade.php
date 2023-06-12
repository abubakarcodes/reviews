@extends('frontend.layouts.master')
@section('meta-tags')
    @php
        $meta_title = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit';
        $meta_description = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit';
        $h1 = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit';
        $page_url = route('home');
    @endphp
    @include('frontend.layouts.inc.meta-tags')
@endsection
@section('title', $meta_title)
@section('content')
    <h1 class="fw-semibold mt-5 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit</h1>

    <div class="bg-theme mt-5 py-2">
        <h2 class="text-center">Submit Review</h2>
    </div>
    <div class="container py-5">
        @include('frontend.layouts.inc.messages')
        <form action="{{ route('submitReviewForm') }}" method="POST" id="review-form" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-6 my-2">
                    <div class="d-flex align-items-center">
                        <label class="col col-form-label me-2">Manager</label>
                        <div class="w-100">
                            <input type="text" class="form-control" name="manager" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="d-flex align-items-center">
                        <label for="company" class="me-2">Company</label>
                        <div class="w-100">
                            <input type="company" class="form-control" name="company" id="company" required>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="d-flex align-items-center">
                        <label class="me-4">Group</label>
                        <div class="w-100 me-2">
                            <input type="text" class="form-control" required name="group1">
                        </div>
                        <div class="w-100 me-2">
                            <input type="text" class="form-control" name="group2">
                        </div>
                        <div class="w-100">
                            <input type="text" class="form-control" name="group3">
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="d-flex align-items-center">
                        <label for="" class="me-4">Cities</label>
                        <div class="w-100 me-2">
                            <input type="text" class="form-control" required name="city1">
                        </div>
                        <div class="w-100 me-2">
                            <input type="text" class="form-control" name="city2">
                        </div>
                        <div class="w-100">
                            <input type="text" class="form-control" name="city3">
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <label for="" class="form-label">Review</label>
                    <textarea class="form-control" id="" required name="review"></textarea>
                </div>

                <div class="col-12 mt-4">
                    <label for="" class="form-label">Discussion</label>
                    <textarea class="form-control" id="" required name="discussion"></textarea>
                </div>

                <div class="col-12 mt-4">
                    <div class="row gap-4">
                        <label for="communication" class="col-sm-auto col-form-label">Communication</label>
                        <div class="col">
                            <input type="number" min="0" step="1" max="10" class="form-control avg-fields" id="communication" name="communication"  required>
                        </div>

                        <label for="professionalism" class="col-sm-auto col-form-label">Professionalism</label>
                        <div class="col">
                            <input type="number" min="0" step="1" max="10" class="form-control avg-fields" id="professionalism" name="professionalism"  required>
                        </div>

                        <label for="expertise" class="col-sm-auto col-form-label">Expertise</label>
                        <div class="col">
                            <input type="number" min="0" step="1" max="10" class="form-control avg-fields" id="expertise" name="expertise"  required>
                        </div>

                        <label for="overall" class="col-sm-auto col-form-label">Overall</label>
                        <div class="col">
                            <input type="number" min="0" max="10" name="overall" readonly min="0" class="form-control" id="overall">
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5 text-center">
                    <button class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
        </form>
        <p class="my-2 py-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus magnam placeat consequuntur deserunt dolorem provident, nulla pariatur sequi velit ea nemo
            voluptatibus assumenda cumque sunt dicta fuga praesentium veniam amet?</p>
    </div>

    <script>
        const form = document.querySelector('#review-form');
        const avgFields = document.querySelectorAll('.avg-fields');
        const overall = document.querySelector('#overall');



        const avgFunc = () => {
            let total = 0;
            avgFields.forEach(field => {
                total += Number(field.value);
            });
            overall.value = (total / 3).toFixed(1);
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


        // Loop over them and prevent submission
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false);
    </script>
@endsection
