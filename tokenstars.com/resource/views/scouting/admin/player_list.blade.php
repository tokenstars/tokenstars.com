@extends('scouting.app-card')

@section('content')
    <style>
        .admin ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        .admin ul.pagination li {display: inline;}

        .admin ul.pagination li a, .admin span {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        .admin ul.pagination li.active span {
            background-color: #eee;
            color: black;
            border: 1px solid #ddd;
        }

        .admin ul.pagination li a:hover:not(.active) {background-color: #ddd;}
    </style>
    <article class="card player-card">

        <div class="tab-pane px-5 py-5_5" id="bio-tab">
            <div class="text-right">
                <a class="btn btn-primary text-uppercase px-4" href="{{route('scouting.admin.players.create')}}">Add player</a>
            </div>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>Sport</th>
                        <th>Status</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>{{$player->id}}</td>
                            <td>{{$player->first_name}}</td>
                            <td>{{$player->last_name}}</td>
                            <td>{{$player->city}}</td>
                            <td>{{$sport_types[$player->sport_type]}}</td>
                            <td>{{$statuses[$player->status]}}</td>

                            <td>
                                <a href="{{route('scouting.admin.players.id', $player->id)}}">Edit player</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="admin">
                <br>
                {{$players->links()}}
            </div>
        </div>
    </article>
@endsection
