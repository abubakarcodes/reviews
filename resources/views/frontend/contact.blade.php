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
        <h2 class="text-center">Contact</h2>
    </div>
    <div class="container py-5">
        @include('frontend.layouts.inc.messages')
        <form class="form-contact contact_form" action="{{ route('contactUsForm') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mt-3">
                        <div class="d-flex align-items-center">
                            <label for="name" class="me-3">Name</label>
                            <div class="w-100">
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter your name'">
                                <small class="error invalid-feedback">{{ $errors->first('name') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mt-3">
                        <div class="d-flex align-items-center">
                            <label for="email" class="me-3">Email</label>
                            <div class="w-100">
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email address'">
                                <small class="error invalid-feedback">{{ $errors->first('email') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mt-3">
                        <label for="message" class="mb-2">Message</label>
                        <textarea class="form-control w-100 {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter Message'"></textarea>
                        <small class="error invalid-feedback">{{ $errors->first('message') }}</small>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
    </div>
@endsection
