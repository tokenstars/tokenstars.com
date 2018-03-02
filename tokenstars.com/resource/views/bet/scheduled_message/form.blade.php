@php
if (!isset($weekdays)) {
    $weekdays = \App\Models\Telegram\ScheduledMessage::WEEKDAYS;
}
@endphp
<form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        @foreach($weekdays as $weekday)
            <label for="{{ $weekday }}">{{ $weekday }}</label>
            <input id="{{ $weekday }}" type="checkbox" name="{{ $weekday }}" @if ($message && $message->checkWeekday($weekday)) checked  @endif />
        @endforeach
    </div>
    <div class="form-group">
        <label for="time">Time</label>
        <input type="time" name="time" id="time" @if ($message) value="{{ $message->run_time }}" @endif />
        @foreach ($errors->get('time') as $error_message)
            <div class="invalid-feedback">
                {{ $error_message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="content">Text</label>
        <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                  id="content" placeholder="Content"
                  name="content" rows="3">@if ($message) {!! $message->content !!} @endif</textarea>
        @foreach ($errors->get('content') as $error_message)
            <div class="invalid-feedback">
                {{ $error_message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="image">Image (Max 5M)</label>
        <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
               id="image" name="image">
        @foreach ($errors->get('image') as $error_message)
            <div class="invalid-feedback">
                {{ $error_message }}
            </div>
        @endforeach
    </div>
    @if ($message && $message->image)
        <div class="form-group">
            <a href="{{ route('admin:telegram-message:delete-image', ['message' => $message->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure')">DELETE IMAGE</a>
            <figure style="padding:10px 0;">
                <img src="{{ $message->image_url }}" style="width:100%;max-width:450px" />
            </figure>
        </div>
    @endif
    <div class="form-group">
        <label for="caption">Image Caption</label>
        <input type="text" class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}"
                  id="caption" placeholder="Caption"
                  name="caption" @if ($message) value="{{ $message->caption }}" @endif />
        @foreach ($errors->get('caption') as $error_message)
            <div class="invalid-feedback">
                {{ $error_message }}
            </div>
        @endforeach
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
