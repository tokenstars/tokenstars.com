@foreach($ahievementModules as $ahievementModule)
    @if(strlen($ahievementModule->name) > 0)
        <section>
            <h3 class="text-uppercase mb-0 text-blue-gray-light">{{$ahievementModule->name}}</h3>
            <div class="row case-row pb-4">

                @foreach($ahievementModule->achievements()->orderBy('weight')->orderBy('name')->get() as $achievement)
                    @if(strlen($achievement->name) > 0)
                        <div class="col col-4 case-col d-flex">
                            <div class="case-item media my-4 position-relative">
                                @if($achievement->image)
                                    <img class="mr-4 case-item-image" src="{{$achievement->image}}" alt="" width="120" height="160">
                                @else
                                    <img class="mr-4 case-item-image" src="../images/pdf-doc.svg" alt="" width="120" height="160">
                                @endif
                                <div class="media-body">
                                    <h4 class="mb-3 case-item-title"><a class="fill-area-link"
                                                                        href="{{$achievement->link}}" target="_blank">{{$achievement->name}}</a></h4>
                                    <ul class="list-unstyled list-base mb-0 case-item-list list-base-shift">
                                        @for ($i = 1; $i < 11; $i++)
                                            @php $item = 'item_'.$i; @endphp
                                            @if(strlen($achievement->$item) > 0)
                                                <li class="my-2">{{$achievement->$item}}</li>
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endif
@endforeach
