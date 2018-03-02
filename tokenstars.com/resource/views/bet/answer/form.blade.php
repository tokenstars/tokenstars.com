<form method="post">
    {{ csrf_field() }}
    <input type="hidden" name="bet_question_id" value="{{ $answer->bet_question_id }}">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               id="name" placeholder="Name"
               name="name" value="{{$answer->name or ''}}">
        @foreach ($errors->get('name') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="coefficient">Coefficient</label>
        <input type="text" class="form-control{{ $errors->has('coefficient') ? ' is-invalid' : '' }}"
               id="coefficient" placeholder="5"
               name="coefficient" value="{{$answer->coefficient or 1}}">
        @foreach ($errors->get('coefficient') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
