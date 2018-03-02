<form method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Content</label>
        <input type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
               id="content" placeholder="Content"
               name="content" value="{{$question->content or ''}}">
        @foreach ($errors->get('content') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="name">Position</label>
        <input type="text" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"
               id="position" placeholder="1"
               name="position" value="{{$question->position or ''}}">
        @foreach ($errors->get('position') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
