@extends('bet.base')
@section('content')
    <div class="container">
        <p>
            <a href="{{ route('admin:telegram-message:create')}}" class="btn btn-light">
                New Message
            </a>
        </p>
        <h1>Messages</h1>

        @foreach($messages as $message)
            <div class="panel panel-default" style="padding: 10px">
                <h2>
                    <a href="{{ route('admin:telegram-message:edit', ['message' => $message->id]) }}">Edit Message {{ $message->id }}</a>
                    @if (!is_null($message->published_at))
                        <span class="label label-primary">Published at {{$message->published_at}}</span>
                    @else
                        <form method="post" style="display: inline-block;" onsubmit="return confirm('Are you sure')">
                            {{ csrf_field() }}
                            <input type="hidden" name="message" value="{{$message->id}}">
                            <button type="submit" class="btn btn-link">Publish</button>
                        </form>
                    @endif
                </h2>
                @if ($message->telegram_ids)
                    <p>
                        For: {{ $message->telegram_users_list }}
                    </p>
                @endif
                <p>{!! nl2br($message->content) !!}</p>
                @if ($message->image)
                    <figure style="padding:10px 0;">
                        <img src="{{ $message->image_url }}" style="width:100%;max-width:450px" />
                        <figcaption>{!! $message->caption !!}</figcaption>
                    </figure>
                @endif
            </div>
        @endforeach
    </div>
@endsection
