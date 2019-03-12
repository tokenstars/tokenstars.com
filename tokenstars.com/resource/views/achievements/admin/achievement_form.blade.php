@extends('scouting.app-card')

@section('title')
    {{$title}}
@endsection

@section('content')
    <script type="text/javascript" src="/js/main-e-commerce.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <link rel="stylesheet" href="/css/cropper.css">
    <style>
        img {
            max-width: 100%;
        }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase mb-4">
            <li class="breadcrumb-item"><a href="#">Platform</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
        </ol>
    </nav>
    <div class="d-flex flex-nowrap mb-4">
        <h1 class="h3_25 text-blue-darker text-uppercase mb-0">{{$title}}</h1>
        <div class="align-self-end ml-auto">
            <div class="h4 mb-0 font-weight-normal">

            </div>
        </div>
    </div>
    <article class="card player-card">
        <fieldset class="card step-card" id="form_f">
            <div class="card-body px-5 py-4">
                <form id="regForm" method="POST" action="{{route('admin.achievement.index')}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-uppercase text-blue-gray-light font-weight-bold">Intro blocks</h4>
                        </div>
                        @php $bg = 0; @endphp
                        @foreach($intros as $intro)

                            <div class="col-6 border @if($bg) @php $bg = 0; @endphp bg-light @else @php $bg = 1; @endphp bg_white @endif">

                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                           for="name_intro_{{$intro->id}}">name</label>
                                    <input name="name_intro_{{$intro->id}}"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text" value="@if(!empty($intro->name)){{$intro->name}}@endif">
                                    <input value="{{$intro->id}}" name="intro_blocks[]" type="hidden" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                           for="icon_name_intro_{{$intro->id}}">icon name</label>
                                    <input name="icon_name_intro_{{$intro->id}}"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text" readonly="readonly"
                                           value="@if(!empty($intro->icon_name)){{$intro->icon_name}}@endif">
                                </div>

                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                           for="description_intro_{{$intro->id}}">Description</label>
                                    <textarea class="form-control form-control-lg font-weight-bold text-blue-darker description-editor"
                                              name="description_intro_{{$intro->id}}" id="" cols="30" rows="3"
                                              maxlength="700"
                                              placeholder="">@if(!empty($intro->description)){{$intro->description}}@endif</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                           for="weight_intro_{{$intro->id}}">weight</label>
                                    <input name="weight_intro_{{$intro->id}}"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text" value="@if(!empty($intro->weight)){{$intro->weight}}@endif">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="mt-5 mb-2 d-flex">
                            <input type="submit" class="btn btn-primary btn-lg text-uppercase px-4" value="Save"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-uppercase text-blue-gray-light font-weight-bold">Content blocks</h4>
                        </div>
                    </div>
                    @php $bg = 0; @endphp
                    @php $bg_color = 'bg-light'; @endphp
                    @php $cb_count = 0; @endphp
                    @foreach($ahievementModules as $ahievementModule)
                        @php $cb_count++; @endphp
                        @if($bg)
                            @php
                                $bg = 0;
                                $bg_color = 'bg-light';
                            @endphp
                        @else
                            @php
                                $bg = 1;
                                $bg_color = 'bg-wight';
                            @endphp
                        @endif

                        <div class="row border {{$bg_color}}">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                           for="name_module_{{$ahievementModule->id}}">name content block № {{$cb_count}}</label>
                                    <input name="name_module_{{$ahievementModule->id}}"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($ahievementModule->name)){{$ahievementModule->name}}@endif">
                                    <input value="{{$ahievementModule->id}}" name="module_blocks[]" type="hidden"
                                           placeholder="">
                                </div>
                            </div>
                           

                            @php $bg_ = 0; @endphp
                            @php $j = 0; @endphp
                            @foreach($ahievementModule->achievements()->orderBy('weight')->orderBy('name')->get() as $achievement)
                                <div class="col-4 border @if($bg_) @php $bg_ = 0; @endphp bg-light @else @php $bg_ = 1; @endphp bg_white @endif">
                                    @php $j++; @endphp
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                               for="name_achievement_{{$achievement->id}}">name achievement
                                            №{{$j}}</label>
                                        <input name="name_achievement_{{$achievement->id}}"
                                               class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($achievement->name)){{$achievement->name}}@endif">
                                        <input value="{{$achievement->id}}" name="achievements[]" type="hidden"
                                               placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                               for="file_achievement_{{$achievement->id}}">file achievement
                                            №{{$j}}</label>
                                        @if(!empty($achievement->link))
                                            <div class="text-blue-gray-light mb-2">
                                                <a href="{{$achievement->link}}">added file</a>
                                            </div>
                                        @endif
                                        <input name="file_achievement_{{$achievement->id}}"
                                               class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="file">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                               for="image_achievement_{{$achievement->id}}">image achievement
                                            №{{$j}}</label>
                                        <div>120px x 160px</div>
                                        @if(!empty($achievement->image))
                                            <div class="text-blue-gray-light mb-2">
                                                <img class="mr-4 case-item-image" src="{{$achievement->image}}" alt="" width="120" height="160">
                                            </div>
                                        @endif
                                        <input name="image_achievement_{{$achievement->id}}"
                                               class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="file">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                               for="weight_achievement_{{$achievement->id}}">weight</label>
                                        <input name="weight_achievement_{{$achievement->id}}"
                                               class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($achievement->weight)){{$achievement->weight}}@endif">
                                    </div>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="item_{{$achievement->id}}_{{$i}}">item {{$i}}</label>
                                            <input name="item_{{$achievement->id}}_{{$i}}"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@php $item = 'item_'.$i; @endphp @if(!empty($achievement->$item)){{$achievement->$item}}@endif">
                                        </div>
                                    @endfor
                                </div>
                            @endforeach <div class="col-6">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                           for="weight_module_{{$ahievementModule->id}}">weight</label>
                                    <input name="weight_module_{{$ahievementModule->id}}"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($ahievementModule->weight)){{$ahievementModule->weight}}@endif">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="mt-5 mb-2 d-flex">
                                <input type="submit" class="btn btn-primary btn-lg text-uppercase px-4" value="Save"/>
                            </div>
                        </div>
                    @endforeach

                </form>
            </div>
        </fieldset>
    </article>
    <script type="text/javascript">
        $('.description-editor').ckeditor();
    </script>
@endsection
