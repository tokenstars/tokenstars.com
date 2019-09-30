@extends('achievements.app_new')

@php
    $lang = app('translator')->getLocale()
@endphp

@section('content')
    @include('achievements.intro_new')
    <div class="section-divider"></div>
    <div class="container">
        @include('achievements.navigation')
        <!--<h2 class="text-uppercase text-pink mb-0 pb-1 text-center font-weight-bold">{{$title2}}</h2>-->
        @include('achievements.result_list')
    </div>
    @include('scouting.footer')
@endsection