<div class="jumbotron jumbotron-intro jumbotron-fluid text-center text-white bg-blue-darker position-relative jumbotron-achievements d-flex align-items-center">
    <div class="jumbotron-image bg-achievements container"></div>
    <div class="container jumbotron-container">
        <h1 class="text-uppercase jumbotron-title">
            <small class="jumbotron-sup-title text-pink d-block font-weight-bold">Tokenstars</small>
            Achievements
        </h1>
        <div class="row feature-row flex-nowrap mt-5 pt-1">
            @foreach($intros as $intro)
                @if(strlen($intro->name) > 0)
                <div class="col feature-col d-flex">
                    <div class="feature-item w-100 mx-auto">
                        <div class="icon icon-feature-{{$intro->icon_name}} feature-item-icon mb-2">
                            <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#feature-{{$intro->icon_name}}"></use></svg>
                        </div>
                        <h4 class="mb-2 feature-item-title">{{$intro->name}}</h4>
                        <p class="mb-0 feature-item-descr">{{$intro->description}}</p>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>