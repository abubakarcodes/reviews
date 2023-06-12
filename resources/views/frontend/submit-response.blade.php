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
        <h2 class="text-center">Submit Response</h2>
    </div>
    <div class="container py-5">
        @include('frontend.layouts.inc.messages')
        <form action="{{ route('submitResponseForm') }}" method="POST" id="response-form" novalidate>
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 pe-md-5">
                    <div class="row">
                        <label for="manager" class="col-sm-2 col-form-label">Manager</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="manager" required>
                            <div class="invalid-feedback">
                                The manager field is required.
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 ps-md-5">
                    <div class="row">
                        <label for="company" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company" id="company" required>
                            <div class="invalid-feedback">
                                The company field is required.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <label for="response" class="form-label">Response</label>
                    <textarea rows="10" class="form-control" name="response" id="response" required></textarea>
                    <div class="invalid-feedback">
                        The response field is required.
                    </div>
                </div>
                <div class="col-12 mt-4 text-center">
                    <button class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
        </form>

    </div>

    <script>
        const form = document.querySelector('#response-form');

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
