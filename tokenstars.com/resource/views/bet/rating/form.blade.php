@extends('bet.base')
@section('content')
    <div class="container">
        <h3>Upload csv file in format <code>telegram_id,rating</code> to update telegram user ratings</h3>
        @if(session('updates'))
            <div class="alert alert-success">
                Successfully updated {{session('updates')}} users
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="users_csv">CSV (Max 5M)</label>
                <input type="file" class="form-control"
                       id="users_csv" name="users_csv">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
