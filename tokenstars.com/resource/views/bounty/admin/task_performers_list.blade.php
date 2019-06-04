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
            <li><a href="{{route('bounty.admin.bounty_tasks')}}">Bounty tasks</a></li>
            <li class="active"><a href="{{route('bounty.admin.task_performers')}}">Task performers</a></li>
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taskPerformers as $taskPerformer)
                        <tr>
                            <td>
                                <p>№ {{$taskPerformer->id}}</p>
                                <p>Service: {{$taskPerformer->bounty_task->name}}</p>
                                @if($taskPerformer->user_id)
                                    <p>User:<br>
                                        {{$taskPerformer->user->rUser->first_name}} {{$taskPerformer->user->rUser->last_name}} [{{$taskPerformer->user->id}}]</p>
                                @endif

                            </td>
                            <td>
                                @if($taskPerformer->cost_in_token)
                                    <p>{{number_format($taskPerformer->cost_in_token,0,'',' ')}} {{$taskPerformer->token}}</p>
                                @endif
                                @if($taskPerformer->cost_usd)
                                    <p>approx. ${{$taskPerformer->cost_usd}}</p>
                                @endif
                            </td>
                            <td>
                                <p>{{$statuses[$taskPerformer->status]}}</p>
                            </td>
                            <td>
                                    <!-- кнопку редактирования и кнопка добавить доплату, только родит. оплат-->
                                @if($taskPerformer->status == 0)
                                    <a class="btn btn-outline-primary" href="{{route('bounty.admin.task_performers.assign', $taskPerformer->id)}}">Assign</a>
                                    <a class="btn btn-outline-primary" href="{{route('bounty.admin.task_performers.cancel', $taskPerformer->id)}}">Cancel</a>
                                 @elseif($taskPerformer->status == 1)
                                    <a class="btn btn-outline-primary" href="{{route('bounty.admin.task_performers.finish', $taskPerformer->id)}}">Losing</a>
                                    <a class="btn btn-outline-primary" href="{{route('bounty.admin.task_performers.win', $taskPerformer->id)}}">Winner</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
             <div class="admin">
                <br>
                {{$taskPerformers->links()}}
            </div>
        </div>
    </article>
@endsection
