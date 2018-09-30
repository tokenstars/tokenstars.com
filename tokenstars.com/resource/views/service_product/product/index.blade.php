@extends('service_product.product.app')

@php
    $lang = app('translator')->getLocale()
@endphp

@section('content')
    @include('service_product.product.intro')
    <div class="container">
        <div class="py-4_5">
        @include('service_product.product.sections')
        </div>
    </div>
    @include('scouting.footer')
@endsection