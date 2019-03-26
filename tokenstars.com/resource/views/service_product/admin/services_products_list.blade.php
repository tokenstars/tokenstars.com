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
            <li class="active"><a href="{{route('service_product.admin.services_products')}}">Service-Products</a></li>
            <li><a href="{{route('service_product.admin.orders')}}">Orders</a></li>
            <li><a href="{{route('bounty.admin.bounty_tasks')}}">Bounty tasks</a></li>
            <li><a href="{{route('bounty.admin.task_performers')}}">Task performers</a></li>
            <li><a href="{{route('admin.news.index')}}">News</a></li>
        </ul>
        <div class="tab-pane px-5 py-5_5" id="bio-tab">
            <div class="text-right">
                <a class="btn btn-primary text-uppercase px-4" href="{{route('service_product.admin.create_service')}}">Add Service</a>
                <a class="btn btn-primary text-uppercase px-4" href="{{route('service_product.admin.create_product')}}">&nbsp;&nbsp;&nbsp;Add Product</a>
            </div>
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Info</th>
                        <th>Cost</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services_products as $s_p)
                        <tr>
                            <td>
                                <div id="av">
                                    <img src="{{$s_p->prev_image1}}" width="150">
                                </div>

                                <div>{{$s_p->name}} [{{$s_p->id}}] @if($s_p->type == 2)
                                        (Product)
                                    @else
                                        (Service)
                                    @endif
                                </div>
                                @if($s_p->player_tennis_id == 0)
                                    <div>Tokenstars[0]</div>
                                @elseif($s_p->player_tennis_id > 0)
                                <div>{{$s_p->playerTennis->first_name}} {{$s_p->playerTennis->last_name}}[{{$s_p->playerTennis->id}}]</div>
                                @endif
                            </td>
                            <td>
                                @if($s_p->cost_main_token == 1)
                                    <p>{{number_format($s_p->cost_ACE,0,'',' ')}} ACE</p>
                                @elseif($s_p->cost_main_token == 2)
                                    <p>{{number_format($s_p->cost_TEAM,0,'',' ')}} TEAM</p>
                                @endif
                                @if($s_p->cost_usd)
                                    <p>approx. ${{$s_p->cost_usd}}</p>
                                @endif
                            </td>
                            <td>{{$s_p->quantity}}</td>
                            <td>{{$statuses[$s_p->status]}}</td>
                            <td>
                                @if($s_p->type == 1)
                                    <a href="{{route('service_product.admin.edit_service', $s_p->id)}}">Edit</a>
                                @else
                                    <a href="{{route('service_product.admin.edit_product', $s_p->id)}}">Edit</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
             <div class="admin">
                <br>
                {{$services_products->links()}}
            </div>
        </div>
    </article>
@endsection
