@extends('scouting.app-alt')

@section('content')
    <div class="container">
        <div class="mt-5"></div>
        @include('scouting.play-card-header')
        <div class="card step-card step-card-done font-family-alt text-uppercase text-center">
            <div class="card-body step-card-body d-flex flex-column justify-content-center mx-auto p-6">
                <h2 class="text-blue-darker">Thank you!</h2>
                <h3 class="text-blue-gray font-weight-normal mb-0">New player Application has been created</h3>
                <p class="h4 font-weight-normal mt-5_5 mb-0"><a href="{{route('scouting.index')}}">Go back to scouting module</a></p>
            </div>
        </div>
        <div class="mt-5_5"></div>
    </div>
@endsection