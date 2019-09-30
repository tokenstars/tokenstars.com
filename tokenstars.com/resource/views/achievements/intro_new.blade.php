<div class="jumbotron jumbotron-intro jumbotron-fluid text-center text-white bg-blue-darker position-relative jumbotron-achievements d-flex align-items-center mb-0 border-top jumbotron-main py-5_5">
    <div class="jumbotron-image bg-achievements container"></div>
    <div class="container jumbotron-container">
    <!--<a href="{{route('achievements.indexNew')}}" rel="noreferer, ,noopener" target="_blank">-->
        <h1 class="h3_5 text-uppercase jumbotron-title line-height-1 mb-0">
            Achievements
        </h1>
        <!--</a>-->
        <div class="row feature-row justify-content-center">
            @foreach($intros as $intro)
                @if(strlen($intro->name) > 0)
                    <div class="col-6 col-lg feature-col d-flex flex-lg-nowrap">
                        <div class="feature-item w-100 mx-auto my-3 feature-item-main">
                            <a href="{{route('achievements.indexNew')}}" rel="noreferer, ,noopener" target="_blank">
                                <div class="icon icon-{{$intro->icon_name}} feature-item-icon mb-2">
                                    @if ($intro->icon_name == 'voting')
                                        <img src="/images/icon-voting.png" alt="tokenstars voting" width="70" height="70">
                                    @else
                                        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#feature-{{$intro->icon_name}}"></use></svg>
                                    @endif
                                </div>
                            </a>
                            <h4 class="mb-2 feature-item-title line-height-1"><a href="{{route('achievements.indexNew')}}" rel="noreferer, ,noopener" target="_blank" style="color:white;">{{$intro->name}}</a></h4>
                            <p class="mb-0 feature-item-descr">{!! $intro->description !!}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>