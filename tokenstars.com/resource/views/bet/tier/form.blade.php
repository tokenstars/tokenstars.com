<form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title (Max 100 characters)</label>
        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
        id="title" placeholder="Title"
        name="title" @if(isset($tier) && $tier->title) value="{{ $tier->title }}" @endif />
        @foreach ($errors->get('title') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="tokens_required">Tokens required</label>
        <input type="text" class="form-control{{ $errors->has('tokens_required') ? ' is-invalid' : '' }}"
        id="tokens_required" placeholder="0"
        name="tokens_required" value="{{ (isset($tier) && $tier->tokens_required) ? $tier->tokens_required : 0 }}" />
        @foreach ($errors->get('tokens_required') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="bonus">Bonus</label>
        <input type="text" class="form-control{{ $errors->has('bonus') ? ' is-invalid' : '' }}"
        id="bonus" placeholder="0"
        name="bonus" value="{{ (isset($tier) && $tier->bonus) ? $tier->bonus : 0 }}" />
        @foreach ($errors->get('bonus') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            @foreach(\App\Models\Tier::STATUSES as $status)
                <option value="{{$status}}" @if(isset($tier) && $tier->status == $status) selected="selected" @endif>{{$status}}</option>
            @endforeach
        </select>
        @foreach ($errors->get('status') as $message)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@if (isset($tier) && ! is_null($tier->id))
    <div class="form-group">
        <form method="post" action="{{ route('admin:tier:delete', ['tier' => $tier->id]) }}" style="display:inline-block;" onsubmit="return confirm('Are you sure')">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">DELETE TIER</button>
        </form>
    </div>
@endif
