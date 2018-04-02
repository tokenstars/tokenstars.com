@extends('brand.app-brand')
@section('title', 'TokenStars Brand')
@section('content')
<div class="card step-card step-card-done text-uppercase text-center" id="done-brand">
    <div class="card-body step-card-body d-flex flex-column justify-content-center mx-auto p-6">
        <h2 class="text-blue-darker">Thank you!</h2>
        <h3 class="text-blue-gray font-weight-normal mb-0">Your cooperation offer has been sent successfully</h3>
        <p class="h4 font-weight-normal mt-5_5 mb-0"><a href="/">Go back</a></p>
    </div>
</div>
<script type="text/javascript">
    window.location = '#done-brand';
</script>
@endsection
