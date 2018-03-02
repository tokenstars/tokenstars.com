@extends('bet.base')
@section('content')
    <div class="container">
        <h3>Upload csv file in format <code>telegram_id,bonus_amount</code> to add bot tokens to telegram users</h3>
        @if(session('inserts'))
            <div class="alert alert-success">
                 {{session('inserts')}}
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="bet_bonus_csv">CSV (Max 5M)</label>
                <input type="file" class="form-control"
                       id="bet_bonus_csv" name="bet_bonus_csv">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
