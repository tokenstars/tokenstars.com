@extends('scouting.app-card')

@section('content')
    <script>
        graph_count_items = 1;
        count_items = 1;
        var data = [];
    </script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/cropper.css">
    <style>
        img {
            max-width: 100%;
        }

        .btn-icon .icon {
            top: unset;
            left: unset;
        }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase mb-4">
            <li class="breadcrumb-item"><a href="#">Platform</a></li>
            <li class="breadcrumb-item"><a href="{{route('scouting.admin.players')}}">Scouting</a></li>
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
                <form id="regForm" method="POST" action="{{route('scouting.admin.players.create')}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="container">

                        <h3>Avatar</h3>
                        <div id="av">
                            <img src="{{$player->photo}}" width="15%">
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
                            <input type="file" class="sr-only" id="inputImage" name="avatar">
                            <input type="hidden" value="" name="avatarbs64" id="avatarbs64"/>
                            <input type="hidden" value="" name="avatardata" id="avatardata"/>
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                        <span class="fa fa-upload">Select avatar</span>
                    </span>
                        </label>

                        <div id="clone"></div>
                    </div>
                    <br>


                    <div class="row pt-4 mt-1 tabb">
                        <div class="col-12 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="sport_type">Sport type*</label>
                                <select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                        id="sport-type" name="sport_type" ngrequired="required">

                                    @foreach($sport_types as $k=>$sport_type)
                                        <option value="{{$k}}" @if(!empty($player->sport_type) && $player->sport_type == $k){{'selected="selected"'}}@endif>{{$sport_type}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-6 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">First
                                    Name*</label>
                                <input name="first_name"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" value="@if(!empty($player->first_name)){{$player->first_name}}@endif"
                                       placeholder="Player's first name" ngrequired="required">
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Last
                                    Name*</label>
                                <input name="last_name"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" value="@if(!empty($player->last_name)){{$player->last_name}}@endif"
                                       placeholder="Player's last name" ngrequired="required">
                            </div>
                        </div>
                        <div class="col-6 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country of
                                    Residence*</label>
                                <select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                        id="country-id" name="country_id" ngrequired="required">
                                    <option value="">---</option>
                                    @foreach($countries as $k=>$country)
                                        <option value="{{$k}}" @if(!empty($player->country_id) && $player->country_id == $k){{'selected="selected"'}}@endif>{{$country}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">City of
                                    Residence*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" value="@if(!empty($player->city)){{$player->city}}@endif" name="city"
                                       ngrequired="required" placeholder="Add the city of residence">
                            </div>
                        </div>
                        <div class="col-6 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date of
                                    Birth*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" id="date_of_birth" name="date_of_birth" placeholder="mm/dd/yyyy"
                                       data-date-format="MM/DD/YYYY" ngrequired="required"
                                       value="@if(!empty($player->date_of_birth)){{date('m/d/Y', strtotime($player->date_of_birth))}}@endif">
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sex</label>
                                <div class="row py-2">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio h5 text-blue-darker">
                                            <input value="male" name="sex" type="radio" class="custom-control-input"
                                                   id="male" @if(empty($player->sex)){{'checked'}}@elseif(!empty($player->sex) && $player->sex == 1){{'checked'}}@endif>
                                            <label class="custom-control-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio h5 text-blue-darker">
                                            <input value="female" name="sex" type="radio" class="custom-control-input"
                                                   id="female" @if(!empty($player->sex) && $player->sex == 2){{'checked'}}@endif >
                                            <label class="custom-control-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Nationality*</label>
                                <select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                        id="nationality-id" name="nationality" ngrequired="required">
                                    <option value="">---</option>
                                    @foreach($countries as $k=>$country)
                                        <option value="{{$k}}" @if(!empty($player->nationality) && $player->nationality == $k){{'selected="selected"'}}@endif>{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            <div class="row">
                                <div class="col-6 pr-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Weight
                                            (kg)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="number" name="weight" placeholder="54" min="10" max="400"
                                               maxlength="3"
                                               value="@if(!empty($player->weight)){{$player->weight}}@endif">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-6 pl-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Height
                                            (cm)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="number" name="height" placeholder="174" min="45" max="300"
                                               maxlength="3"
                                               value="@if(!empty($player->height)){{$player->height}}@endif">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Bio (700
                                    symbols max.)*</label>
                                <textarea ngrequired="required"
                                          class="form-control form-control-lg font-weight-bold text-blue-darker"
                                          name="description" id="" cols="30" rows="3" maxlength="700"
                                          placeholder="Please type in short bio of the player here">@if(!empty($player->description)){{$player->description}}@endif</textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Facebook</label>
                                <input name="fb_link"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                                       value="@if(!empty($player->fb_link)){{$player->fb_link}}@endif"
                                       placeholder="Add the Facebook link">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Twitter</label>
                                <input name="tw_link"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                                       value="@if(!empty($player->tw_link)){{$player->tw_link}}@endif"
                                       placeholder="Add the Twitter link">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Instagram</label>
                                <input name="ig_link"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                                       value="@if(!empty($player->ig_link)){{$player->ig_link}}@endif"
                                       placeholder="Add the Instagram link">
                                <div class="invalid-feedback"></div>
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
        $(document).ready(function () {

            $('#date_of_birth').datepicker();


            var maxField = 100;
        })

            var filess = [];
            var graphs = [];
            var references = [];
            var current_photos;
            var current_graphs;
            var current_references;

            ;(function ($) {
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

                function uploadFile(file, item) {
                    if (filess.length < 10) {
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

                function findFiles(e, item) {
                    var files = e.originalEvent.dataTransfer.files;

                    $.each(files,
                        function (key, value) {
                            uploadFile(value, item);
                        }
                    );
                }

                function setEvents(item) {
                    $(item).on('drop dragover dragenter dragleave',
                        function (e) {
                            $(this).removeClass(settings.errorClass + ' ' + settings.successClass);
                            e.stopPropagation();
                            e.preventDefault();
                            if (e.type !== 'dragover') {
                                $(this).toggleClass(settings.hoverClass);
                            }
                            if (e.type === 'drop') {
                                findFiles(e, item);
                            }
                        }
                    );
                }

                function setOptions(options) {
                    $.each(options, function (key, val) {
                        settings[key] = val;
                    });
                }

                $.fn.dragAndUpload = function (options) {
                    if (options !== undefined) setOptions(options);
                    this.each(function () {
                        setEvents(this);
                    });
                    return this;
                }
            }(jQuery));

            $(document).ready(
                function () {
                    // Uses default settings
                    $("#upl_photo").dragAndUpload();
                }
            );

            function delPrew(id) {
                $('#preview-id-' + id).remove();
                delete filess[id];
            }

            function delPhoto(id) {
                $('#preview-id-' + id).css('display', 'none');
                $.ajax({
                    url: '/scouting/admin/delPhoto/' + id,
                    type: "GET",
                    done: function (response) {
                        console.log(response);
                    }
                });
            }

            function delSharscope(id) {
                $.ajax({
                    url: '/scouting/admin/delSharscope/' + id,
                    type: "GET",
                    done: function (response) {
                        console.log(response);
                    }
                });
            }

            function delGraphPrew(id) {
                $('#graph-preview-id-' + id).remove();
                delete graphs[id];
            }

            function delGraphPhoto(id) {
                current_graphs--;
                $('#graph-preview-id-' + id).css('display', 'none');
                $.ajax({
                    url: '/scouting/admin/delete_graph/' + id,
                    type: "GET",
                    done: function (response) {
                    }
                });
            }

            function delReferencesPrew(id) {
                $('#references-preview-id-' + id).remove();
                delete references[id];
            }

            function delReferencesPhoto(id) {
                current_references--;
                $('#references-preview-id-' + id).css('display', 'none');
                $.ajax({
                    url: '/scouting/admin/delete_references/' + id,
                    type: "GET",
                    done: function (response) {
                    }
                });
            }

            function readURL(input) {
                if (filess.length < 10) {

                    file = input.files[0];
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
                    input.value = '';

                }
            }

            function readGraphURL(input) {
                //if(graphs.length < 1) {
                file = input.files[0];
                var reader = new FileReader();
                graphs.push(file);
                var preview_ph_o = preview_ph_graph;
                preview_ph_o = preview_ph_o.replace('{id}', graphs.length);
                preview_ph_o = preview_ph_o.replace('{idl}', graphs.length);
                reader.onload = function (e) {
                    preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                    $('#graphs').append(preview_ph_o);
                };
                reader.readAsDataURL(file);
                //  input.value = '';
                // }
            }

            function readReferencesURL(input) {
                if (references.length < 10) {
                    file = input.files[0];
                    var reader = new FileReader();
                    references.push(file);
                    var preview_ph_o = preview_ph_references;
                    preview_ph_o = preview_ph_o.replace('{id}', references.length);
                    preview_ph_o = preview_ph_o.replace('{idl}', references.length);
                    reader.onload = function (e) {
                        preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                        $('#references').append(preview_ph_o);
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

            function uploadF(file) {
                var form = new FormData();
                form.append('photo', file);
                form.append('id', '{{$player->id}}');
                $.ajax({
                    url: '{{route('scouting.admin.uploadPhoto')}}',
                    type: 'POST',
                    data: form,
                    done: function (data) {
                        return true
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
    </script>
@endsection
