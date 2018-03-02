<form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="content">Text</label>
        <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                  id="content" placeholder="Content"
                  name="content" rows="3">{!! $message->content !!}</textarea>
        @foreach ($errors->get('content') as $message)
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
    @if ($message->image)
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
                  name="caption" value="{{ $message->caption }}" />
        @foreach ($errors->get('caption') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="telegram_ids">Telegram User ids</label>
        <input type="text" class="form-control{{ $errors->has('telegram_ids') ? ' is-invalid' : '' }}"
                  id="telegram_ids"
                  name="telegram_ids" value="{{ $message->telegram_ids }}" />
        @foreach ($errors->get('telegram_ids') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
