@extends('bet.base')
@section('content')
    <div class="container">
        <h1>Configure Questions</h1>
        @foreach($questions as $question)
            <div class="panel panel-default" style="padding: 10px">
                <span class="label label-info">{{ $question->position }}</span>
                <p>{!! $question->content !!}</p>
                <a href="{{ route('admin:configure-question:edit', ['question' => $question->id]) }}"><span class="label label-primary">Edit</span></a>
                @if (!empty($question->configure_answers))
                    <h3>Answers</h3>
                @endif
                @foreach($question->configure_answers as $answer)
                    <h4>
                        <a href="{{ route('admin:configure-answer:edit', ['answer' => $answer->id]) }}">
                            @if ($answer->type == $answer::TYPE_USER_INPUT)
                                <span class="label label-info">User Input</span>
                            @else
                                {{ $answer->content }}
                            @endif
                        </a>
                    </h4>
                @endforeach
                <p>
                    <a href="{{ route('admin:configure-answer:create') . "?question={$question->id}" }}" class="btn btn-light">
                        New Answer
                    </a>
                </p>
            </div>
        @endforeach
        <p>
            <a href="{{ route('admin:configure-question:create')}}" class="btn btn-light">
                New Question
            </a>
        </p>
    </div>
@endsection
