@extends('bet.base')
@section('content')
    <div class="container">
        <h1>Quiz Questions</h1>
        @foreach($questions as $question)
            <div class="panel panel-default" style="padding: 10px">
                <span class="label label-info">{{ $question->position }}</span>
                <p>{!! $question->content !!}</p>
                <a href="{{ route('admin:quiz-question:edit', ['question' => $question->id]) }}"><span class="label label-primary">Edit</span></a>
                @if (!empty($question->quiz_answers))
                    <h3>Answers</h3>
                @endif
                @foreach($question->quiz_answers as $answer)
                    <h4>
                        <a href="{{ route('admin:quiz-answer:edit', ['answer' => $answer->id]) }}">
                            {{ $answer->content }}
                        </a>
                        @if($answer->winner)
                            <span class="label label-success" style="margin-left:20px">Winner</span>
                        @else
                        <form method="post" style="display: inline-block; margin-left: 10px" onsubmit="return confirm('Are you sure')">
                            {{ csrf_field() }}
                            <input type="hidden" name="answer" value="{{$answer->id}}">
                            <button type="submit" class="btn btn-link" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
                                Set as Winner
                            </button>
                        </form>
                        @endif
                    </h4>
                @endforeach
                <p>
                    <a href="{{ route('admin:quiz-answer:create') . "?question={$question->id}" }}" class="btn btn-light">
                        New Answer
                    </a>
                </p>
            </div>
        @endforeach
        <p>
            <a href="{{ route('admin:quiz-question:create')}}" class="btn btn-light">
                New Question
            </a>
        </p>
    </div>
@endsection
