@extends('achievements.app')

@php
    $lang = app('translator')->getLocale()
@endphp

@section('content')
    @include('achievements.intro')
    <div class="section-divider"></div>
    <div class="container">
        <h2 class="text-uppercase text-blue-gray-light mb-5 pb-1 text-center">{{$title2}}</h2>
        @include('achievements.sections')
        <div class="pb-4"></div>
    </div>
    @include('scouting.footer')
@endsection