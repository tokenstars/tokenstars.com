@extends('bet.base')

@section('content')
    <div class="container">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            @foreach($sports as $sport)
                <tr>
                    <td>{{$sport->id}}</td>
                    <td><a href="{{route('admin:bet-sport:edit', ['sport' => $sport->id])}}">{{$sport->name}}</a></td>
                    <td>
                        <a href="{{ route('admin:bet-sport:questions', ['sport' => $sport->id]) }}" class="btn btn-light btn-sm">Edit Questions</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <p>
            <a href="{{ route('admin:bet-sport:create') }}" class="btn btn-light">
                New Sport
            </a>
        </p>

    </div>
@endsection
