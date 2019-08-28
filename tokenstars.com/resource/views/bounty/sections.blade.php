<div class="row task-row pb-6">
    @foreach($bounty_tasks as $bt)
    <div class="col-4 task-col d-flex">
        <div class="card task-item my-3 hoverable position-relative mx-auto w-100">
            <div class="task-item-img-wrapper d-inline-block position-relative">
                <img class="card-img-top task-item-img" src="/images/task-bg.jpg" alt="" width="350" height="205">
                <div class="icon icon-{{$type_icons[$bt->type]}} task-item-icon position-absolute m-auto text-white" style="width: 100%; height: 100%;">
                    <!--<svg viewBox="0 0 1 1"><use xlink:href='images/icons.svg#{{$type_icons[$bt->type]}}'></use></svg>-->
                    <img src="{{$bt->icon_w350_h205}}" alt="">
                </div>
            </div>
            <div class="card-body d-flex flex-column">
                <div class="media">
                    <div class="media-body">
                        <h4 class="card-title task-item-title d-flex flex-column mb-1">
                            <a href="/scouting/card/{{$bt->playerTennis->id}}/" >
                                <small class="task-item-sup-title font-weight-bold text-pink text-uppercase">Player Info {{$bt->playerTennis->first_name}} {{$bt->playerTennis->last_name}}</small>
                            </a>
                            {{$bt->name}}
                        </h4>
                    </div>
                    <a href="/scouting/card/{{$bt->playerTennis->id}}/" >
                        <img class="rounded-circle ml-1" src="{{$bt->playerTennis->photo}}" alt="" width="50" height="50">
                    </a>
                    <!--<div class="mx-4 service-item-secondary-token text-right">
                        <div class="h5 text-pink mb-0">
                            @if($bt->cost_main_token == 1)
                                {{number_format($bt->cost_ACE,0,'',' ').' ACE'}}
                            @else
                                {{number_format($bt->cost_TEAM,0,'',' ').' TEAM'}}
                            @endif
                        </div>
                        <ul class="list-inline mb-0 text-blue-darker font-weight-semibold list-inline-sep justify-content-end">
                            <li class="list-inline-item text-nowrap">approx. ${{$bt->cost_usd }}
                            </li>
                        </ul>
                    </div>-->
                </div>
                <p class="card-text task-item-descr">
                    {!!$bt->description!!}
                </p>
                <div class="spacer"></div>
                <div>
                    <a class="btn btn-outline-primary px-4 text-uppercase w-100px fill-area-link" href="/scouting/card/{{$bt->playerTennis->id}}/?active_tab=promotion-tab&active_task={{$bt->id}}#collapse-item-bounty-task-{{$bt->id}}">@if($bt->status == 1)Apply @else Finished @endif</a>
                    @if(isset($specifiedDatetimeBountyTasks[$bt->id]))

                    <div class="list-item__secondary-time d-flex flex-column pl-4" style="float:right; position:relative; top:-10px;">
                        <span class="typo-lg mb-0_5 text-uppercase text-status text-status-{{$specifiedDatetimeBountyTasks[$bt->id][0]}} text-status-shift">{{$specifiedDatetimeBountyTasks[$bt->id][1]}}</span>
                        <span class="h4 mb-0">{{$specifiedDatetimeBountyTasks[$bt->id][2]}}</span>
                    </div>
                    @endif

                    <!--<div class="list-item__secondary-time d-flex flex-column pl-4">
                        <span class="typo-lg mb-0_5 text-uppercase text-status text-status-success text-status-shift">Finished </span>
                        <span class="h4 mb-0"></span>
                    </div>

                    <div class="list-item__secondary-time d-flex flex-column pl-4">
                        <span class="typo-lg mb-0_5 text-uppercase text-status text-status-progress text-status-shift">In progress </span>
                        <span class="h4 mb-0">5d 11h 0m</span>
                    </div>

                    <div class="list-item__secondary-time d-flex flex-column pl-4">
                        <span class="typo-lg mb-0_5 text-uppercase text-status text-status-soon text-status-shift">Coming soon</span>
                        <span class="h4 mb-0">
                                </span>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>