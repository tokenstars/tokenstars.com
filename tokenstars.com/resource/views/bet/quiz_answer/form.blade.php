<form method="post">
    {{ csrf_field() }}
    <input type="hidden" name="quiz_question_id" value="{{ $answer->quiz_question_id }}">
    <div class="form-group">
        <label for="content">Content</label>
        <input type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
               id="content" placeholder="Content"
               name="content" value="{{$answer->content or ''}}">
        @foreach ($errors->get('content') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
