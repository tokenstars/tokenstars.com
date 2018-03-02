<form method="post">
    {{ csrf_field() }}
    <input type="hidden" name="configure_question_id" value="{{ $answer->configure_question_id }}">
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
    <div class="form-group">
        <label for="status">Type</label>
        <select class="form-control" name="type">
            @foreach($answer::TYPES as $type)
                <option value="{{$type}}" @if($answer->type == $type) selected="selected" @endif>{{$type}}</option>
            @endforeach
        </select>
        @foreach ($errors->get('type') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
