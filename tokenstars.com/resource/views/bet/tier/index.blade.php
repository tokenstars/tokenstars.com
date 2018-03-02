@extends('bet.base')

@section('content')
    <div class="container">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Tokens Required</th>
                <th scope="col">Bonus</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            @foreach($tiers as $tier)
                <tr>
                    <td><a href="{{ route('admin:tier:edit', ['tier' => $tier->id]) }}">{{$tier->title}}</a></td>
                    <td>{{ number_format($tier->tokens_required, 0) }}</td>
                    <td>{{ $tier->bonus }}%</td>
                    <td><span class="label {{ $statusLabels[$tier->status] }}">{{ strtoupper($tier->status) }}</span></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        <p>
            <a href="{{ route('admin:tier:create') }}" class="btn btn-light">
                New Tier
            </a>
        </p>
    </div>
@endsection
