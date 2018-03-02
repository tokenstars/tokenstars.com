<form method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Sport Name</label>
        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               id="name" placeholder="Name"
               name="name" value="{{$sport->name or ''}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
