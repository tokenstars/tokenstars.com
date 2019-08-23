@foreach($player_services as $ps_id => $ps)
    <div class="media mb-3 align-items-center">
        @if($ps['photo'] <> 'https://via.placeholder.com/402x450')
        <img class="mr-3 rounded-circle" src="..{{$ps['photo']}}" alt="" width="50" height="50">
        @endif
        <div class="media-body text-truncate">
            <h3 class="text-uppercase text-blue-gray-light mb-0 text-truncate">{{$ps['first_name']}} {{$ps['last_name']}}</h3>
        </div>
    </div>

    <div class="list-unstyled service-list mb-0 bg-white shadow">
        @foreach($ps['services'] as $service)
        <div class="service-item media align-items-stretch position-relative">
            <div class="service-item-icon-wrapper position-relative">
                <div class="icon icon-{{$kinds_service[$service->kind]}} service-item-icon position-absolute m-auto text-blue-darker">
                    <!--<svg viewBox="0 0 1 1"><use xlink:href='images/icons.svg#{{$kinds_service[$service->kind]}}'></use></svg>-->
                        <img src="{{$service->prev_image2}}" alt="" height="56px">
                </div>
            </div>
            <div class="media-body service-item-body py-4">
                <h4 class="service-item-title mb-1 text-blue-darker font-weight-bold">
                    {{$service->name}}
                </h4>
                <p class="service-item-descr mb-0 text-blue-darker">
                    {!! $service->description!!}
                </p>
            </div>
            <div class="mx-5 align-self-center py-4 d-flex flex-nowrap align-items-center service-item-secondary">
                <div class="mx-4 service-item-secondary-token text-right">
                    <div class="h5 text-pink mb-0">
                        @if($service->cost_main_token == 1)
                            {{number_format($service->cost_ACE,0,'',' ').' ACE'}}
                        @else
                            {{number_format($service->cost_TEAM,0,'',' ').' TEAM'}}
                        @endif
                    </div>
                    <ul class="list-inline mb-0 text-blue-darker font-weight-semibold list-inline-sep justify-content-end">
                        @if($service->cost_usd)
                            <li class="list-inline-item text-nowrap">approx. ${{$service->cost_usd }}</li>
                        @endif
                    </ul>
                </div>
                <!--<a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px collapsed fill-area-link" href="{{route('scouting.player_card_view',$ps_id)}}">Join</a>-->
                <button class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px collapsed fill-area-link" data-toggle="collapse" data-target="#collapse-item-{{$service->id}}">@if($service->status == 1)Join @else Archive @endif</button>
            </div>
        </div>
            <div class="collapse service-item-collapse py-4_5 px-5" id="collapse-item-{{$service->id}}">
                <div class="row">

                    <div class="col-@if($service->video_link || $service->images){{8}}@else{{12}}@endif">
                        <h5 class="text-blue-darker font-weight-bold">Description</h5>
                        <p class="mb-0 text-blue-darker">{!!$service->description_full!!}</p>
                        <div class="mt-4">
                            <!--<button class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px" data-toggle="modal" data-target="#">Join</button>-->
                            @if($service->status == 1)
                                @auth
                                    <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px buy-btn" href="#buy-modal" data-toggle="modal" data-productid="{{$service->id}}">Join</a>
                                @else
                                    <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px" href="#information" data-toggle="modal">Join</a>
                                @endauth
                            @endif
                        </div>
                    </div>

                    @if($service->video_link || ($service->images && count($service->images) > 0))
                        <div class="col-4">
                            @if($service->video_link)
                                <h5 class="text-blue-darker font-weight-bold">Video</h5>
                                <div class="embed-responsive service-item-embed embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$service->video_link}}?rel=0" allowfullscreen></iframe>
                                </div>
                            @endif

                            @if($service->images && count($service->images) > 0)
                                <h5 class="text-blue-darker font-weight-bold">Images</h5>
                                <div class="commerce-item__image-wrap" data-module="commerce-slider">
                                    <div class="swiper-container commerce-slider-container js-swiper-container bg-white shadow">
                                        <div class="swiper-wrapper commerce-slider-wrapper align-items-center">
                                            @foreach($service->images as $image)
                                                <div class="swiper-slide commerce-slider-slide d-flex align-items-center justify-content-center p-2">
                                                    <img class="commerce-slider-slide-image img-fluid"
                                                         src="/{{$image->image}}" alt="" width="230"
                                                         height="230">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swiper-pagination commerce-slider-pagination js-swiper-pagination text-center position-relative"></div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>


            </div>
        @endforeach
    </div>
    <div class="section-divider-2"></div>

@endforeach