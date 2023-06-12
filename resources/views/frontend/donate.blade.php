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
        <h2 class="text-center">Donate</h2>
    </div>
    <div class="container mt-3">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur repellendus laboriosam error autem
            doloremque sunt aut! Cumque odit odio soluta minus animi fugit impedit, eius voluptatum, culpa eaque
            aspernatur. Ea!</p>
        <p class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur repellendus laboriosam error autem
            doloremque sunt aut! Cumque odit odio soluta minus animi fugit impedit, eius voluptatum, culpa eaque
            aspernatur. Ea!</p>
    </div>
@endsection
