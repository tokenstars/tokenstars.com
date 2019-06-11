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
            <li class="active"><a href="{{route('service_product.admin.orders')}}">Orders</a></li>
            <li><a href="{{route('bounty.admin.bounty_tasks')}}">Bounty tasks</a></li>
            <li><a href="{{route('bounty.admin.task_performers')}}">Task performers</a></li>
        </ul>
        <div class="tab-pane px-5 py-5_5" id="bio-tab">
            <!--<div class="text-right">
                <a class="btn btn-primary text-uppercase px-4" href="{{route('service_product.admin.create_service')}}">Add Service</a>
                <a class="btn btn-primary text-uppercase px-4" href="{{route('service_product.admin.create_product')}}">&nbsp;&nbsp;&nbsp;Add Product</a>
            </div>-->
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Info</th>
                        <th>Cost</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <p>№ {{$order->id}}</p>
                                @if($order->service_product_id)
                                  @if($order->service_product->type == 1)
                                    <p>Service: {{$order->service_product->name}}</p>
                                  @else
                                    <p>Product: {{$order->service_product->name}}</p>
                                  @endif
                                @endif
                            </td>
                            <td>
                                @if($order->cost_usd)
                                    <p>${{$order->cost_usd}}</p>
                                @endif
                            </td>
                            <td>
                                @if($order->user_id)
                                    <p>User:<br>
                                    {{$order->user->rUser->first_name}} {{$order->user->rUser->last_name}} [{{$order->user->id}}]</p>
                                @endif
                                @if($order->user_wallet)
                                    <p>User wallet:</p>
                                    <p>{{$order->user_wallet}}</p>
                                @endif
                                @if($order->tx_hash)
                                    <p>Tx hash:<br>
                                    <a href="https://etherscan.io/tx/{{$order->tx_hash}}">{{str_limit($order->tx_hash, $limit = 20, $end = '...')}}</a></p>
                                @endif
                            </td>
                            <td>{{$statuses[$order->status]}}</td>
                            <td>
                                    <!-- кнопку редактирования и кнопка добавить доплату, только родит. оплат-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
             <div class="admin">
                <br>
                {{$orders->links()}}
            </div>
        </div>
    </article>
@endsection
