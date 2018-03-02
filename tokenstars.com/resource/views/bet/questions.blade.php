@extends('bet.base')
@section('content')
    <div class="container">
        <h1>Questions</h1>

        @foreach($questions as $question)
            <div class="panel panel-default" style="padding: 10px">
                <h2>
                    <a href="{{ route('admin:bet-question:edit', ['question' => $question->id]) }}">Edit question {{ $question->id }}</a>
                    @php
                    $statusLabels = [
                    $question::STATUS_DRAFT => 'label-warning',
                    $question::STATUS_ACTIVE => 'label-success',
                    $question::STATUS_CLOSED => 'label-primary'
                    ];
                    @endphp
                    <span class="label {{$statusLabels[$question->status]}}">{{title_case($question->status)}}</span>
                    @if($question->status == $question::STATUS_DRAFT)
                        <form method="post" style="display: inline-block;" onsubmit="return confirm('Are you sure')">
                            {{ csrf_field() }}
                            <input type="hidden" name="question" value="{{$question->id}}">
                            <button type="submit" class="btn btn-link">Publish</button>
                        </form>
                    @endif
                </h2>
                @if ($question->name)
                    <h4>{{ $question->name }}</h4>
                @endif
                @if ($question->starts_at)
                    <h3>Publish UTC time: {{ $question->starts_at->format($question::TIME_FORMAT) }}</h3>
                @endif
                @if ($question->closes_at)
                    <h3>Close UTC time: {{ $question->closes_at->format($question::TIME_FORMAT) }}</h3>
                @endif
                <h3>Bonus amount: {{ $question->bonus_amount }}</h3>
                <p>{!! nl2br($question->description) !!}</p>
                @if ($question->image)
                    <figure style="padding:10px 0;">
                        <img src="{{ $question->image_url }}" style="width:100%;max-width:450px" />
                    </figure>
                @endif
                @if (!empty($question->bet_answers))
                    <h3>Answers</h3>
                @endif
                @foreach($question->bet_answers as $answer)
                    <h4>
                        <span class="label label-info">{{ $answer->coefficient }}</span>
                        <a href="{{ route('admin:bet-answer:edit', ['answer' => $answer->id]) }}">{{ $answer->name }}</a>
                        @if($answer->winner)
                            <span class="label label-success">Winner</span>
                        @endif
                        @if ($question->status == $question::STATUS_ACTIVE)
                        <form method="post" style="display: inline-block; margin-left: 10px" onsubmit="return confirm('Are you sure')">
                            {{ csrf_field() }}
                            <input type="hidden" name="answer" value="{{$answer->id}}">
                            <button type="submit" class="btn btn-link" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
                                @if($answer->winner)
                                    Publish answer
                                @else
                                    Set as Winner
                                @endif
                            </button>
                        </form>
                        @endif
                    </h4>
                @endforeach
                @if ($question->status == $question::STATUS_DRAFT)
                <p>
                    <a href="{{ route('admin:bet-answer:create') . "?question={$question->id}" }}" class="btn btn-light">
                        New Answer
                    </a>
                </p>
                @endif
            </div>
        @endforeach
        {{ $questions->links() }}
    </div>
@endsection
