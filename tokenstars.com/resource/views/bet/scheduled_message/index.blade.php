@extends('bet.base')
@section('content')
    <div class="container">
        <p>
            <a href="{{ route('admin:scheduled-message:create')}}" class="btn btn-light">
                New Scheduled Message
            </a>
        </p>
        <h1>Messages</h1>

        @foreach($messages as $message)
            <div class="panel panel-default" style="padding: 10px">
                <h2>
                    <a href="{{ route('admin:scheduled-message:edit', ['message' => $message->id]) }}">Edit Message {{ $message->id }}</a>
                    @php
                    $statusLabels = [
                    $message::STATUS_DRAFT => 'label-warning',
                    $message::STATUS_ACTIVE => 'label-success',
                    $message::STATUS_RUNNING => 'label-success',
                    $message::STATUS_IDLE => 'label-primary'
                    ];
                    @endphp
                    @if ($message->status == $message::STATUS_RUNNING)
                        <span class="label {{ $statusLabels[$message->status] }}">Running</span> <span>{{ $message->cron_expression }}</span>
                    @else
                        <span class="label {{ $statusLabels[$message->status] }}">{{ ($message->run_at && $message->cron_expression) ? "Run at {$message->run_at}" : title_case($message->status) }}</span> <span>{{ $message->cron_expression }}</span>
                    @endif
                    @php
                    $statusMessages = [
                    $message::STATUS_DRAFT => 'Activate',
                    $message::STATUS_ACTIVE => 'Set idle',
                    $message::STATUS_IDLE => 'Activate',
                    ];
                    @endphp
                    @if ($message->status != $message::STATUS_RUNNING && $message->cron_expression)
                        <form method="post" style="display: inline-block;" onsubmit="return confirm('Are you sure')">
                            {{ csrf_field() }}
                            <input type="hidden" name="message" value="{{$message->id}}">
                            <button type="submit" class="btn btn-link">{{ $statusMessages[$message->status] }}</button>
                        </form>
                    @endif
                </h2>
                <p>{!! nl2br($message->content) !!}</p>
                @if ($message->image)
                    <figure style="padding:10px 0;">
                        <img src="{{ $message->image_url }}" style="width:100%;max-width:450px" />
                        <figcaption>{!! $message->caption !!}</figcaption>
                    </figure>
                @endif
            </div>
        @endforeach
        {{ $messages->links() }}
    </div>
@endsection
