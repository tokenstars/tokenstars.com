@foreach($products as $product)
    <div class="commerce-item text-blue-darker py-4_5">
        <div class="row">
            <div class="col col-3 commerce-item-col-slider">
                <div class="commerce-item__image-wrap" data-module="commerce-slider">
                    <div class="swiper-container commerce-slider-container js-swiper-container bg-white shadow">
                        <div class="swiper-wrapper commerce-slider-wrapper align-items-center">
                            <div class="swiper-slide commerce-slider-slide d-flex align-items-center justify-content-center p-2">
                                <img class="commerce-slider-slide-image img-fluid" src="{{$product->main_image}}">
                            </div>

                            @foreach($product->images as $image)
                            <div class="swiper-slide commerce-slider-slide d-flex align-items-center justify-content-center p-2">
                                <img class="commerce-slider-slide-image img-fluid" src="{{$image->image}}" alt="" width="230" height="230">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-pagination commerce-slider-pagination js-swiper-pagination text-center position-relative"></div>
                </div>
            </div>
            <div class="col col-6 commerce-item-col-primary">
                <h3 class="mb-3">{{$product->name}}</h3>
                <div class="media mb-3">
                    @if($product->playerTennis->photo <> 'https://via.placeholder.com/402x450')
                        <img class="rounded-circle mr-2" src="..{{$product->playerTennis->photo}}" alt="" width="30" height="30">
                   @endif
                    <div class="media-body">
                        <h4 class="h5 mb-0 font-weight-normal text-uppercase">
                            @if($product->player_tennis_id == 0)
                                Tokenstars
                            @elseif($product->player_tennis_id > 0)
                                {{$product->playerTennis->first_name}} {{$product->playerTennis->last_name}}
                            @endif
                        </h4>
                    </div>
                </div>
                <h4 class="h5 font-weight-normal text-secondary text-uppercase mb-1">Specification</h4>
                <ul class="list-inline typo-xl mb-4">
                    <li class="list-inline-item">Size: <strong class="font-weight-semibold">M</strong></li>
                    <li class="list-inline-item">Material: <strong class="font-weight-semibold">Cotton</strong></li>
                </ul>
                <h4 class="h5 font-weight-normal text-secondary text-uppercase mb-1">Description</h4>
                <div class="dotdotdot dotdotdot_commerce-item-text" data-module="dotdotdot" data-ellipsis="" data-height="93">
                    <div class="dotdotdot__text">
                        {{$product->description}}
                    </div>
                    <button class="btn btn-link js-toggle dotdotdot__toggle dotdotdot__toggle_show p-0">
                        <span>See Full</span>
                        <span>Hide</span>
                    </button>
                </div>
            </div>
            <div class="col col-3 commerce-item-col-secondary ml-auto">
                <h4 class="h5 font-weight-normal mb-0 text-uppercase">Price:</h4>
                <p class="mb-3 h3 font-weight-bold text-pink text-uppercase text-after-or">${{$product->cost_usd}}</p>
                <ul class="list-unstyled mb-2 text-blue-darker font-weight-semibold typo-lg">
                    @if($product->token_ACE)
                        <li class="text-nowrap">{{ number_format(($product->cost_usd * $rate->usd_ACE), 0, ',', '  ') }} <span class="text-ace">ACE</span></li>
                    @endif
                    @if($product->token_TEAM)
                            <li class="text-nowrap">{{ number_format(($product->cost_usd * $rate->usd_TEAM), 0, ',', '  ') }} <span class="text-team">TEAM</span></li>
                    @endif
                </ul>
                @auth
                    <a class="btn btn-primary font-weight-bold btn-lg btn-block text-uppercase buy-btn" href="#buy-modal" data-toggle="modal" data-productid="{{$product->id}}">Buy</a>
                @else
                    <a class="btn btn-primary font-weight-bold btn-lg btn-block text-uppercase" href="#information" data-toggle="modal">Buy</a>
                @endauth
            </div>
        </div>
    </div>
@endforeach