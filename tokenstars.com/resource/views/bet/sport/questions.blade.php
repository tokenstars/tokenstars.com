@extends('bet.base')
@section('content')
    <div class="container">
        <h1>{{ $sport->name }} questions</h1>

        @foreach($sport->bet_questions as $question)
            <h2>
                <a href="{{ route('admin:bet-question:edit', ['question' => $question->id]) }}">{{ $question->name }}</a>
                @php
                $statusLabels = [
                $question::STATUS_DRAFT => 'label-warning',
                $question::STATUS_ACTIVE => 'label-success',
                $question::STATUS_CLOSED => 'label-primary'
                ];
                @endphp
                <span class="label {{$statusLabels[$question->status]}}">{{title_case($question->status)}}</span>
                @if($question->status == $question::STATUS_DRAFT)
                    <form method="post" style="display: inline-block;">
                        {{ csrf_field() }}
                        <input type="hidden" name="question" value="{{$question->id}}">
                        <button type="submit" class="btn btn-link">Publish</button>
                    </form>
                @endif
            </h2>
            <p>{!! $question->description !!}</p>
            @if (!empty($question->bet_answers))
                <h3>Answers</h3>
            @endif
            @foreach($question->bet_answers as $answer)
                <h4>
                    <span class="label label-info">{{ $answer->coefficient }}</span>
                    <a href="{{ route('admin:bet-answer:edit', ['answer' => $answer->id]) }}">{{ $answer->name }}</a>
                    @if($answer->winner)
                        <span class="label label-success">Winner</span>
                    @else
                        <form method="post" style="display: inline-block; margin-left: 10px">
                            {{ csrf_field() }}
                            <input type="hidden" name="answer" value="{{$answer->id}}">
                            <button type="submit" class="btn btn-link">Set as Winner</button>
                        </form>
                    @endif
                </h4>
            @endforeach
            <p>
                <a href="{{ route('admin:bet-answer:create') . "?question={$question->id}" }}" class="btn btn-light">
                    New Answer
                </a>
            </p>
        @endforeach
        <p>
            <a href="{{ route('admin:bet-question:create') . "?sport={$sport->id}" }}" class="btn btn-light">
                New Question
            </a>
        </p>
    </div>
@endsection
