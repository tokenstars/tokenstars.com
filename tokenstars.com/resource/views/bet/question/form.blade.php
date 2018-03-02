<form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="bet_sport_id" value="{{ $question->bet_sport_id }}">
    <div class="form-group">
        <label for="name">Name (Max 100 characters)</label>
        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
        id="name" placeholder="Name"
        name="name" @if($question->name) value="{{ $question->name }}" @endif />
        @foreach ($errors->get('name') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="description">Text (Max 1000 characters)</label>
        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                  id="descrption" placeholder="Description"
                  name="description" rows="3">{!! $question->description !!}</textarea>
        @foreach ($errors->get('description') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="image">Image (Max 5M)</label>
        <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
               id="image" name="image">
        @foreach ($errors->get('image') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    @if ($question->image)
        <div class="form-group">
            <a href="{{ route('admin:bet-question:delete-image', ['question' => $question->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure')">DELETE IMAGE</a>
            <figure style="padding:10px 0;">
                <img src="{{ $question->image_url }}" style="width:100%;max-width:450px" />
            </figure>
        </div>
    @endif
    <div class="form-group">
        <label for="starts_at">Publish UTC time</label>
        <div class='input-group date datetimepicker-bet'>
            <input type='text' class="form-control" name="starts_at"
                   id="starts_at" value="{{ $question->starts_at ? $question->starts_at->format('d.m.Y H:i') : '' }}"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        @foreach ($errors->get('starts_at') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="closes_at">Close UTC time</label>
        <div class='input-group date datetimepicker-bet'>
            <input type='text' class="form-control" name="closes_at"
                   id="closes_at"
                   value="{{ $question->closes_at ? $question->closes_at->format('d.m.Y H:i') : '' }}" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        @foreach ($errors->get('closes_at') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="bonus_amount">Bonus amount</label>
        <input type="text" class="form-control{{ $errors->has('bonus_amount') ? ' is-invalid' : '' }}"
        id="bonus_amount" placeholder="0"
        name="bonus_amount" value="{{ $question->bonus_amount ? $question->bonus_amount : 0 }}" />
        @foreach ($errors->get('bonus_amount') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="reply_columns">Reply buttons in row (number of columns)</label>
        <input type="text" class="form-control{{ $errors->has('reply_columns') ? ' is-invalid' : '' }}"
        id="reply_columns" placeholder="2"
        name="reply_columns" value="{{ $question->reply_columns ? $question->reply_columns : 2 }}" />
        @foreach ($errors->get('bonus_amount') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    {{--<div class="form-group">--}}
        {{--<label for="status">Status</label>--}}
        {{--<select class="form-control" name="status">--}}
            {{--@foreach($question::STATUSES as $status)--}}
                {{--<option value="{{$status}}" @if($question->status == $status) selected="selected" @endif>{{$status}}</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
        {{--@foreach ($errors->get('status') as $message)--}}
            {{--<div class="invalid-feedback">--}}
                {{--{{ $message }}--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
