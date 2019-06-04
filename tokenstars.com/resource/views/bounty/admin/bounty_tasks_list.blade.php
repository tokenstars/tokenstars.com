@extends('scouting.app-card')
@section('title')
{{$title}}
@endsection

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
        #services-products .nav-tabs li{
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
    <div class="d-flex flex-nowrap mb-4">
        <h1 class="h3_25 text-blue-darker text-uppercase mb-0">{{$title}}</h1>
        <div class="align-self-end ml-auto">
            <div class="h4 mb-0 font-weight-normal">

            </div>
        </div>
    </div>

    <article id="services-products" class="card player-card">
        <ul class="nav nav-tabs">
            <li><a href="{{route('service_product.admin.services_products')}}">Service-Products</a></li>
            <li><a href="{{route('service_product.admin.orders')}}">Orders</a></li>
            <li class="active"><a href="{{route('bounty.admin.bounty_tasks')}}">Bounty tasks</a></li>
            <li><a href="{{route('bounty.admin.task_performers')}}">Task performers</a></li>
        </ul>
        <div class="tab-pane px-5 py-5_5" id="bio-tab">
            <div class="text-right">
                <a class="btn btn-primary text-uppercase px-4" href="{{route('bounty.admin.create_bounty_task')}}">Add Bounty task</a>
            </div>
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Info</th>
                        <th>Cost</th>
                        <th>Kind</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bounty_tasks as $b_t)
                        <tr>
                            <td>
                                <div>{{$b_t->name}} [{{$b_t->id}}]</div>
                                @if($b_t->player_tennis_id == 0)
                                    <div>Tokenstars[0]</div>
                                @elseif($b_t->player_tennis_id > 0)
                                <div>{{$b_t->playerTennis->first_name}} {{$b_t->playerTennis->last_name}}[{{$b_t->playerTennis->id}}]</div>
                                 <!--<div>{{$types[$b_t->type]}}</div>-->
                                @endif
                            </td>
                            <td>
                                @if($b_t->cost_main_token == 1)
                                    <p>{{number_format($b_t->cost_ACE,0,'',' ')}} ACE</p>
                                @elseif($b_t->cost_main_token == 2)
                                    <p>{{number_format($b_t->cost_TEAM,0,'',' ')}} TEAM</p>
                                @endif
                                @if($b_t->cost_usd)
                                    <p>approx. ${{$b_t->cost_usd}}</p>
                                @endif
                            </td>
                            <td>
                                <div>{{$kinds[$b_t->kind]}}</div>
                                @if($b_t->quantity > 0 && $b_t->kind == 1)
                                    <div>quantity: {{$b_t->quantity}}</div>
                                @endif
                                @if($b_t->kind == 4)
                                    <div>date start: {{date('d.m.Y', strtotime($b_t->date_start))}}</div>
                                    <div>date end: {{date('d.m.Y', strtotime($b_t->date_end))}}</div>
                                @endif
                            </td>
                            <td>{{$statuses[$b_t->status]}}</td>
                            <td>
                                <a href="{{route('bounty.admin.edit_bounty_task', $b_t->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
             <div class="admin">
                <br>
                {{$bounty_tasks->links()}}
            </div>
        </div>
    </article>
@endsection
