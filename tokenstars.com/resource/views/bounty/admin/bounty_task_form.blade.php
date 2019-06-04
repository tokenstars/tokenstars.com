@extends('scouting.app-card')

@section('title')
    {{$title}}
@endsection

@section('content')
    <script type="text/javascript" src="/js/main-bounty.js"></script>
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
            <li class="breadcrumb-item"><a href="{{route('bounty.admin.bounty_tasks')}}">Bounty tasks</a></li>
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
                <form id="regForm" method="POST" action="{{route($form_route, $bounty_task->id)}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="bounty_task_id" value="{{$bounty_task->id or ""}}">

                    <div class="container">
                        <h3>Main image task</h3>
                        <div id="av">
                            <img src="{{$bounty_task->icon_w350_h205}}">
                            <br><br>
                        </div>
                        <div class="row" id="crop">
                            <div class="col-9">
                                <!-- <h3>Demo:</h3> -->
                                <div class="img-container">
                                    <img id="image" src="" alt="Picture">
                                </div>
                            </div>
                            <div class="col-3">
                                <!-- <h3>Preview:</h3> -->
                                <div class="docs-preview clearfix">
                                    <div class="img-preview preview-lg"></div>
                                </div>
                            </div>
                        </div>
                        <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                            <input type="file" class="sr-only" id="inputImage" name="main_image">
                            <input type="hidden" value="" name="avatarbs64" id="main_image_bs64" />
                            <input type="hidden" value="" name="avatardata" id="main_image_data" />
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                        <span class="fa fa-upload">Select main image</span>
                    </span>
                        </label>

                        <div id="clone"></div>
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-uppercase text-blue-gray-light font-weight-bold">Images upload*</div>
                            <div class="img-thumb-container" id="photo-container">
                                <span id="photos">
                                    @if(!empty($bounty_task->images) && count($bounty_task->images) > 0)
                                        <script>
                                            var current_photos =  @if(count($bounty_task->images) > 0) {{count($bounty_task->images)}} @else 0 @endif;
                                        </script>
                                        @foreach($bounty_task->images as $image)
                                            <div class="img-thumb-wrapper" id="preview-id-{{$image->id}}">
                                            <img class="img-thumb-img" src="/{{$image->prev_image}}" alt="" style="max-width: 130px">

                                                    <span class="icon icon-close-red img-thumb-action"   onclick="delPhoto({{$image->id}})" >
                                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                                </span>

                                        </div>
                                        @endforeach
                                    @else
                                        <script>
                                            var current_photos = 0;
                                        </script>
                                    @endif
                                </span>
                                <div  id="upl_photo" class="upload-drop-zone-wrapper">

                                    <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center" for="upload-photo">
                                        <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                                    </label>

                                    <input onchange="readURL(this);"  type="file" id="upload-photo" hidden name="photos[]"  accept="image/*" capture>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="name">Title*</label>
                                <input name="name"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" value="@if(!empty($bounty_task->name)){{$bounty_task->name}}@endif"
                                       placeholder="Title" ngrequired="required">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Cost
                                    ($)</label>
                                <input name="cost"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text"
                                       value="@if(!empty($bounty_task->cost_usd)){{$bounty_task->cost_usd}}@endif"
                                       placeholder="250">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Cost in ACE</label>
                                <input name="cost_ACE"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text"
                                       value="@if(!empty($bounty_task->cost_ACE)){{$bounty_task->cost_ACE}}@endif"
                                       placeholder="250">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Cost in TEAM</label>
                                <input name="cost_TEAM"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text"
                                       value="@if(!empty($bounty_task->cost_TEAM)){{$bounty_task->cost_TEAM}}@endif"
                                       placeholder="250">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Maint Token (cost)</label>
                                <select name="cost_main_token"
                                        class="form-control form-control-lg font-weight-bold text-blue-darker">
                                    @foreach($mainTokenCosts as $v=>$token)
                                        <option value="{{$v}}" @if(is_numeric($bounty_task->cost_main_token) && $bounty_task->cost_main_token == $v){{'selected="selected"'}}@endif>{{$token}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!--
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Cost in
                                    tokens</label>
                                <div class="row py-2">
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker">
                                            <input name="token_ace" type="checkbox" class="custom-control-input"
                                                   id="hard"
                                                   @if(!empty($bounty_task->token_ACE) && $bounty_task->token_ACE == 1)checked="checked"@endif >
                                            <label class="custom-control-label" for="hard">
                                                ACE
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row py-2">
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker">
                                            <input name="token_team" type="checkbox" class="custom-control-input"
                                                   id="glass"
                                                   @if(!empty($bounty_task->token_TEAM) && $bounty_task->token_TEAM == 1)checked="checked"@endif >
                                            <label class="custom-control-label" for="glass">
                                                TEAM
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Player</label>
                                <select name="players"
                                        class="form-control form-control-lg font-weight-bold text-blue-darker">
                                    <option value="">---</option>
                                    <!--<option value="0" @if($bounty_task->player_tennis_id == 0){{'selected="selected"'}}@endif >
                                        TokenStars
                                    </option>-->
                                    @foreach($players as $player)
                                        <option value="{{$player->id}}" @if(is_numeric($player->id) && $player->id == $bounty_task->player_tennis_id){{'selected="selected"'}}@endif>{{$player->first_name}} {{$player->last_name}}
                                            ({{$player->id}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Status</label>
                                <select name="status"
                                        class="form-control form-control-lg font-weight-bold text-blue-darker">
                                    <option value="">---</option>
                                    @foreach($statuses as $k=>$status)
                                        <option value="{{$k}}" @if(is_numeric($bounty_task->status) && $bounty_task->status == $k){{'selected="selected"'}}@endif>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Type</label>
                                <select name="type"
                                        class="form-control form-control-lg font-weight-bold text-blue-darker">
                                    @foreach($types as $k=>$type)
                                        <option value="{{$k}}" @if(is_numeric($bounty_task->type) && $bounty_task->type == $k){{'selected="selected"'}}@endif>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Description Short</label>
                                <textarea class="form-control form-control-lg font-weight-bold text-blue-darker"
                                          name="description" id="description" cols="30" rows="3" maxlength="700"
                                          placeholder="">@if(!empty($bounty_task->description)){{$bounty_task->description}}@endif</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Description Full</label>
                                <textarea class="form-control form-control-lg font-weight-bold text-blue-darker"
                                          name="description_full" id="description_full" cols="30" rows="3" maxlength="700"
                                          placeholder="">@if(!empty($bounty_task->description_full)){{$bounty_task->description_full}}@endif</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="name">Youtube video id</label>
                                <input name="video_link" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="@if(!empty($bounty_task->video_link)){{$bounty_task->video_link}}@endif" placeholder="zpOULjyy-n8">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Kind</label>
                                <select name="kind"
                                        class="form-control form-control-lg font-weight-bold text-blue-darker">
                                    @foreach($kinds as $k=>$kind)
                                        <option value="{{$k}}" @if(is_numeric($bounty_task->kind) && $bounty_task->kind == $k){{'selected="selected"'}}@endif>{{$kind}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Qiuantity (for Quantitative task)</label>
                                <input name="quantity"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text"
                                       value="@if(!empty($bounty_task->quantity)){{$bounty_task->quantity}}@endif"
                                       placeholder="10">
                            </div>
                        </div>

                    <div class="col-6 pr-4">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="date_start_">Date start (for Specified datetime task)</label>
                                    <div class='input-group date' id='start_datetimepicker'>
                                        <!--<input id="date_start_" type='text' class="form-control form-control-lg font-weight-bold text-blue-darker" name="date_start" value="@if(!empty($bounty_task->date_begin)){{$bounty_task->date_begin}}@endif"/>-->

                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text" id="date_start" name="date_start" placeholder="mm/dd/yyyy"
                                               data-date-format="MM/DD/YYYY" ngrequired="required"
                                               value="@if(!empty($bounty_task->date_start)){{date('m/d/Y', strtotime($bounty_task->date_start))}}@endif">
                                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                /*$(function () {
                                    $('#start_datetimepicker').datetimepicker();
                                });*/
                            </script>

                            <div class="col-6 pl-4">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date end (for Specified datetime task)</label>
                                    <!--<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="date_end" id="end_date" value="@if(!empty($bounty_task->date_end)){{$bounty_task->date_end}}@endif">-->
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text" id="date_end" name="date_end" placeholder="mm/dd/yyyy"
                                           data-date-format="MM/DD/YYYY" ngrequired="required"
                                           value="@if(!empty($bounty_task->date_end)){{date('m/d/Y', strtotime($bounty_task->date_end))}}@endif">
                                </div>
                            </div>

                    </div>

                    <div class="row">
                        <div class="mt-5 mb-2 d-flex">
                            <input type="submit" class="btn btn-primary btn-lg text-uppercase px-4" value="Save"/>
                        </div>
                    </div>

                </form>
            </div>
        </fieldset>
    </article>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#date_start').datepicker();
            $('#date_end').datepicker();
        })
        $('#description').ckeditor();
        $('#description_full').ckeditor();


        var preview_ph = '<div class="img-thumb-wrapper" id="preview-id-{id}">\n' +
            '<img class="img-thumb-img" src="{e_result}" alt="" style="max-width: 230px">\n' +
            '<span class="icon icon-close-red img-thumb-action" onclick="delPrew({idl})">\n' +
            '<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
            '</span>\n' +
            '</div>';
        var filess = [];

        ; ( function ( $ ) {
            var settings = {
                url: 'URL TO UPLOAD FILE',
                toDo: 'OPTIONAL TODO VARIABLE TO SEND TO UPLOAD FILE',
                hoverClass: 'dragAndUploadActive',
                uploadingClass: 'dragAndUploadUploading',
                errorClass: 'dragAndUploadFailure',
                successClass: 'dragAndUploadSuccess',
                statusField: '#dragAndUploadStatus',
                classChangeDelay: 750,
                maxSize: 5242880
            };

            function uploadFile( file, item ) {
                if(filess.length < 10) {
                    var uploaded = uploadF(file);

                    var reader = new FileReader();
                    filess.push(file);
                    var preview_ph_o = preview_ph;
                    preview_ph_o = preview_ph_o.replace('{id}', filess.length);
                    preview_ph_o = preview_ph_o.replace('{idl}', filess.length);
                    reader.onload = function (e) {
                        preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                        $('#photos').append(preview_ph_o);
                    };
                    reader.readAsDataURL(file);
                }
            }

            function findFiles( e, item ) {
                var files = e.originalEvent.dataTransfer.files;

                $.each( files,
                    function ( key, value ) {
                        uploadFile( value, item );
                    }
                );
            }

            function setEvents( item ) {
                $( item ).on( 'drop dragover dragenter dragleave',
                    function ( e ) {
                        $( this ).removeClass( settings.errorClass + ' ' + settings.successClass );
                        e.stopPropagation();
                        e.preventDefault();
                        if ( e.type !== 'dragover' ) {
                            $( this ).toggleClass( settings.hoverClass );
                        }
                        if ( e.type === 'drop' ) {
                            findFiles( e, item );
                        }
                    }
                );
            }

            function setOptions( options ) {
                $.each( options, function ( key, val ) {
                    settings[key] = val;
                } );
            }

            $.fn.dragAndUpload = function ( options ) {
                if ( options !== undefined ) setOptions( options );
                this.each( function () {
                    setEvents( this );
                } );
                return this;
            }
        }( jQuery ) );

        $( document ).ready(
            function () {
                // Uses default settings
                $("#upl_photo").dragAndUpload();
            }
        );

        function delPrew(id)
        {
            $('#preview-id-'+id).remove();
            delete filess[id];
        }

        function delPhoto(id)
        {
            $('#preview-id-' + id).css('display', 'none');
            $.ajax({
                url: '/bounty/admin/delPhoto/'+id,
                type: "GET",
                done: function(response){
                    console.log(response);
                }
            });
        }

        function readURL(input) {
            if(filess.length < 10) {

                file = input.files[0];
                var uploaded= uploadF(file);

                var reader = new FileReader();
                filess.push(file);
                var preview_ph_o = preview_ph;
                preview_ph_o = preview_ph_o.replace('{id}', filess.length);
                preview_ph_o = preview_ph_o.replace('{idl}', filess.length);
                reader.onload = function (e) {
                    preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                    $('#photos').append(preview_ph_o);
                };

                reader.readAsDataURL(file);
                input.value = '';

            }
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function uploadF(file)
        {
            var form = new FormData();
            form.append('photo',file);
            form.append('id', '{{$bounty_task->id}}');
            $.ajax({
                url: '{{route('bounty.admin.uploadPhoto')}}',
                type: 'POST',
                data: form,
                done:function(data){
                    return true
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }

    </script>
@endsection
