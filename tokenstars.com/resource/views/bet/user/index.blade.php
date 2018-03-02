@extends('bet.base')

@section('content')
    <div class="container" style="width:100%">
        <table class="table table-sm">
            <thead>
                <tr>
                @foreach($ref_stat as $name => $value)
                    <th scope="col">{{ $name }} (with email & erc20)</th>
                @endforeach
                </tr>
            </thead>
            <tr>
                @foreach($ref_stat as $name => $value)
                    <td scope="col">{{ $value['all'] }} ({{ $value['confirmed'] }})</td>
                @endforeach
            </tr>
        </table>
        <form method="get" style="width:300px;margin-bottom:10px">
            @if (request()->has('sort_key'))
                <input type="hidden" name="sort_key" value="{{ request()->get('sort_key') }}" />
            @endif
            @if (request()->has('sort_order'))
                <input type="hidden" name="sort_order" value="{{ request()->get('sort_order') }}" />
            @endif
            @foreach($filter_columns as $key => $column)
                <div class="form-group">
                    <label for="{{ $key }}">{{ $column['title'] }}</label>
                    <input type="text" class="form-control"
                           id="{{ $key }}"
                           name="{{ $key }}" @if(array_key_exists('value', $column) && $column['value']) value="{{ $column['value'] }}" @endif />
                </div>
            @endforeach
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </form>

        {{-- <a class="btn btn-primary" href="{{ url()->current() }}">No Filter</a>--}}
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Chat ID</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Balance</th>
                @foreach($sort_columns as $key => $column)
                    <th scope="col">
                        <a class="btn btn-sm {{ $column['btn_class'] }}" href="{{ $column['url'] }}">
                            {{ $column['title'] }} <span class="glyphicon {{ $column['glyphicon'] }}"></span>
                        </a>
                    </th>
                @endforeach
            </tr>
            </thead>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->telegram_id}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{route('admin:csv:bet-user', ['user' => $user->id])}}" target="_blank">{{$user->username}}</a></td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{long_number_format($user->balance)}}</td>
                    @foreach($sort_columns as $key => $column)
                        <td>{{long_number_format($user->$key)}}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        {{ $users->links() }}
    </div>
@endsection
