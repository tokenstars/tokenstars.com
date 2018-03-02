@extends('emails.layout')
@section('content')
        <tr>
            <td>
                <p>New feedback from {{$feedback->email}}</p>
                <p> {{$feedback->created_at}}</p>
            </td>
        </tr>
    <tr>
        <td>
            <p>
                {{$feedback->text}}
            </p>
        </td>
    </tr>
@endsection
