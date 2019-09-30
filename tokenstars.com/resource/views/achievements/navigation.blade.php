
<div id="sticky">
    <div class="sticky-anchor"></div>
<div class="nav-scroller bg-blue-darker rounded mb-4_5 sticky-content" >
    <nav class="nav nav-underline" role="navigation">
        @php
            $first = 1;
        @endphp
        @foreach($ahievementModules as $ahievementModule)
            @if(strlen($ahievementModule->name) > 0)
                @if($first == 1)
                    <!--<a class="nav-link active" data-toggle="pill" href="#ach-{{$ahievementModule->id}}">{{$ahievementModule->name}}</a>-->
                    <a class="nav-link active" href="#ach-{{$ahievementModule->id}}">{{$ahievementModule->name}}</a>
                    @php
                        $first = 0;
                    @endphp
                @else
                    <!--<a class="nav-link" data-toggle="pill" href="#ach-{{$ahievementModule->id}}">{{$ahievementModule->name}}</a>-->
                    <a class="nav-link" href="#ach-{{$ahievementModule->id}}">{{$ahievementModule->name}}</a>
                @endif
            @endif
        @endforeach
    </nav>
</div>