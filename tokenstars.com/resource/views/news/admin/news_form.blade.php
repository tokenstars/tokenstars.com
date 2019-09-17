@extends('scouting.app-card')

@section('title')
    {{$title}}
@endsection

@section('content')
    <script type="text/javascript" src="/js/main-news.js"></script>
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
            <li class="breadcrumb-item"><a href="{{route('service_product.admin.services_products')}}">Admin panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.news.index')}}">News</a></li>
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
        <form id="regForm" method="POST" action="{{route($form_route, $news_info->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="hidden" name="id" id="news_info_id" value="{{$news_info->id or ""}}">
                <div class="container">
                    <h3>Image</h3>
                    <div id="av">
                        <img src="{{$news_info->image}}">
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
                        <span class="fa fa-upload">Select image news</span>
                    </span>
                    </label>

                    <div id="clone"></div>
                </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="title">Title*</label>
                        <input name="title" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="@if(!empty($news_info->title)){{$news_info->title}}@endif" placeholder="Title" ngrequired="required">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="date_news">Date of
                            news*</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                               type="text" id="date_news" name="date_news" placeholder="mm/dd/yyyy"
                               data-date-format="MM/DD/YYYY" ngrequired="required"
                               value="@if(!empty($news_info->date_news)){{date('m/d/Y', strtotime($news_info->date_news))}}@endif">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="description">Description*</label>
                        <textarea ngrequired="required"
                                  class="form-control form-control-lg font-weight-bold text-blue-darker"
                                  name="description" id="description" cols="30" rows="3" maxlength="700"
                                  placeholder="Please type in short text news here">@if(!empty($news_info->description)){{$news_info->description}}@endif</textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                               for="">Url</label>
                        <input name="url"
                               class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                               value="@if(!empty($news_info->url)){{$news_info->url}}@endif"
                               placeholder="Add the url link">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Status</label>
                        <select name="status" class="form-control form-control-lg font-weight-bold text-blue-darker">
                            <option value="">---</option>
                            @foreach($statuses as $k=>$status)
                                <option value="{{$k}}" @if(is_numeric($news_info->status) && $news_info->status == $k){{'selected="selected"'}}@endif>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

                <div class="row">
                    <div class="mt-5 mb-2 d-flex">
                        <input type="submit" class="btn btn-primary btn-lg text-uppercase px-4" value="Save" />
                    </div>
                </div>

        </form>
        </div>
    </fieldset>
</article>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#date_news').datepicker();
        })
        $('#description').ckeditor();

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
                url: '/service-product/admin/delPhoto/'+id,
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
            form.append('id', '{{$news_info->id}}');
            $.ajax({
                url: '{{route('service_product.admin.uploadPhoto')}}',
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
