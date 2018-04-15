
        <form action="/dashboard/profile/edit" method="POST" enctype="multipart/form-data" id="edit-user-form">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

            <div class="row">
                <div class="col-6 pr-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">First Name</label>
                        <input autocomplete="off" name="first_name" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$user->first_name}}">
                    </div>
                </div>
                <div class="col-6 pl-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Last Name</label>
                        <input autocomplete="off" name="last_name" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$user->last_name}}">
                    </div>
                </div>
                <div class="col-6 pr-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Email</label>
                        <input autocomplete="off" name="email" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$user->email}}" readonly>
                    </div>
                </div>
                <div class="col-6 pl-5">
                    <!--<div class="form-group">
                        <div class="text-uppercase text-blue-gray-light font-weight-bold">Photo upload</div>
                        <div class="img-thumb-wrapper">
                            <img class="img-thumb-img" src="https://via.placeholder.com/130x130" alt="">
                            <span class="icon icon-close-red img-thumb-action">
                  <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                </span>
                        </div>
                    </div>
-->
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold"></label>
                        <label style="cursor: pointer; padding-top: 16px;margin-top: 4px; border-radius: 0px; " class="form-control form-control-lg btn btn-outline-primary text-uppercase font-weight-bold" for="photo-user" id="photo-upl">Click here to upload a photo</label>

                        <div class="upload-drop-zone-wrapper" style="display: none">
                            <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center" for="photo-user">
                                <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                            </label>
                            <input autocomplete="off" type="file" id="photo-user" hidden name="photo">
                        </div>

                    </div>
                </div>
                <div class="col-4 pr-2">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Facebook</label>
                        <input autocomplete="off" name="facebook_url" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$user->facebook_url}}">
                        <div class="invalid-feedback" id="fb_inc"></div>
                    </div>
                </div>
                <div class="col-4 px-2">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Twitter</label>
                        <input autocomplete="off" name="twitter_url" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$user->twitter_url}}">
                        <div class="invalid-feedback" id="tw_inc"></div>
                    </div>
                </div>
                <div class="col-4 pl-2">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Instagram</label>
                        <input autocomplete="off" name="instagram_url" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$user->instagram_url}}">
                        <div class="invalid-feedback" id="ins_inc"></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">About</label>
                        <textarea class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="about" id="" cols="30" rows="3" maxlength="300" placeholder="">{{$user->about}}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row" id="wallet_headers" @if(count($wallets) == 0) style="display: none" @endif>
                        <div class="col-3">
                            <div class="text-uppercase text-blue-gray-light font-weight-bold">Wallet Name</div>
                        </div>
                        <div class="col-9">
                            <div class="text-uppercase text-blue-gray-light font-weight-bold">Wallet Number</div>
                        </div>
                    </div>

                    <div id="wallets_block">
                    @foreach($wallets as $wallet)

                    <div class="row mb-2" id="ids-{{$wallet->id}}">
                        <input type="hidden" name="Wallets[id][]" value="{{$wallet->id}}">
                        <div class="col-3 pr-1">
                            <input autocomplete="off" name="Wallets[wallet_name][]" class="form-control form-control-lg font-weight-bold text-blue-darker" value="@if(!empty($wallet->name))  {{$wallet->name}} @endif" id="">
                        </div>
                        <div class="col-9 pl-1">
                            @if(!empty($wallet->verifiable) && $wallet->verifiable == 1)
                            <div class="input-group input-group-lg mb-0">
                                <input autocomplete="off" name="Wallets[wallet][]" class="form-control font-weight-bold text-blue-darker" value="{{$wallet->address}}" id="" readonly>

                                <div class="input-group-append">
                                    <button class="btn btn-lg btn-success font-family-alt font-weight-bold text-uppercase rounded-0 opacity-1" disabled>
                      <span class="icon icon-check icon-sm mr-1">
                        <svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#check"></use></svg>
                      </span>
                                        <span class="typo-lg">Verified</span>
                                    </button>
                                </div>
                                <div class="input-group-append">
                                    <span class="btn btn-white btn-icon btn-lg rounded-0" onclick="del({{$wallet->id}})">
                      <span class="icon icon-close-red icon-md">
                        <svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#close-red"></use></svg>
                      </span>
                                    </span>
                                </div>
                            </div>
                            @else
                                <div class="btn-group w-100 custom-input-wrapper mb-0">
                                    <input autocomplete="off" name="Wallets[wallet][]" type="text" class="form-control form-control-lg font-weight-bold text-blue-darker custom-input" placeholder="{{$wallet->address}}" value="{{$wallet->address}}" id="">
                                    <span class="btn btn-white btn-icon btn-lg rounded-0 position-absolute custom-input-action" onclick="del({{$wallet->id}})">
                    <span class="icon icon-close-red icon-md">
                      <svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#close-red"></use></svg>
                    </span>
                                    </span>
<!--
                                    <button class="btn btn-md btn-primary font-weight-bold text-uppercase custom-input-action position-absolute rounded" data-toggle="modal" data-target="#verify-modal">
                                        Verify
                                    </button>-->

                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    </div>
                    <div class="mb-2">
                        <span class="btn btn-outline-primary text-uppercase font-weight-bold" id="add_wallet">+ add wallet</span>
                    </div>
                </div>
            </div>
            <div class="mt-5_5">
                <button class="btn btn-primary btn-lg text-uppercase px-4 mw-120px" type="submit">Save</button>
            </div>
        </form>

<script type="text/javascript">
    $('#add_wallet').on('click',function(){
        $('#wallet_headers').css('display', 'flex')
        var rand = Math.floor(Math.random()*10000);
        var data = '<div class="row mb-2" id="id-'+rand+'">\n' +
            '    <div class="col-3 pr-1">\n' +
            '        <input autocomplete="off" name="Wallets[wallet_name][]" class="form-control form-control-lg font-weight-bold text-blue-darker" value="" id="">\n' +
            '    </div>\n' +
            '    <div class="col-9 pl-1">\n' +
            '            <div class="btn-group w-100 custom-input-wrapper mb-0">\n' +
            '                <input autocomplete="off" name="Wallets[wallet][]" type="text" class="form-control form-control-lg font-weight-bold text-blue-darker custom-input" placeholder="0x000000000000000000000000000000000000" value="" id="">\n' +
            '                <span class="btn btn-white btn-icon btn-lg rounded-0 position-absolute custom-input-action" onclick="deleteBlock('+rand+')">\n' +
            '                    <span class="icon icon-close-red icon-md">\n' +
            '                      <svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#close-red"></use></svg>\n' +
            '                    </span>\n' +
            '                </span>\n' +
            '                <!--<button class="btn btn-md btn-primary font-weight-bold text-uppercase custom-input-action position-absolute rounded" data-toggle="modal" data-target="#verify-modal">\n' +
            '                    Verify\n' +
            '                </button>-->\n' +
            '            </div>\n' +
            '    </div>\n' +
            '</div>';
        $('#wallets_block').append(data);
    });

    $('#photo-user').on('change', function(){
        $('#photo-upl').removeClass('btn-outline-primary');
        $('#photo-upl').addClass('btn-outline-success');
    })


    $('#edit-user-form').on('submit', function(){

        var fb = $("#edit-user-form input[name='facebook_url']");
        var tw = $("#edit-user-form input[name='twitter_url']");
        var ins = $("#edit-user-form input[name='instagram_url']");
        var fbcheck = false;
        var twcheck = false;
        var inscheck = false;

        if(fb.val() == '' || fb.val().match(/(?:https?:\/\/)?(?:www\.)?facebook\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/i)) {
            fbcheck = true;
            fb.removeClass('is-invalid');
            $('#fb_inc').html('')
        }
        else {
            fb.addClass('is-invalid');
            $('#fb_inc').html('incorrect URL')
            fbcheck = false;
        }

        if(tw.val() == '' || tw.val().match(/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/i)) {
            twcheck = true;
            tw.removeClass('is-invalid');
            $('#tw_inc').html('')
        }
        else {
            tw.addClass('is-invalid');
            $('#tw_inc').html('incorrect URL')
            twcheck = false;
        }

        if(ins.val() == '' || ins.val().match(/(?:https?:\/\/)?(?:www\.)?instagram\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/i)) {
            inscheck = true;
            ins.removeClass('is-invalid');
            $('#ins_inc').html('')
        }
        else {
            ins.addClass('is-invalid');
            $('#ins_inc').html('incorrect URL')
            inscheck = false;
        }


        if(fbcheck == false || twcheck == false || inscheck == false)
            return false;
        else
            return true;
    })
    function deleteBlock(rand)
    {
        $('#id-' + rand).remove();
        if($('#wallets_block').html().trim() == '')
        {
            $('#wallet_headers').css('display', 'none')
        }
        return false;
    }

    function del(id)
    {
        $.ajax({
            method: "POST",
            url: "/dashboard/profile/delete",
            data: { id: id, '_token': "{{csrf_token()}}"}
        }).done(function( msg ) {
            if(msg.trim() == 'ok') {
                $('#ids-' + id).remove();
                if($('#wallets_block').html().trim() == '')
                {
                    $('#wallet_headers').css('display', 'none')
                }
            }
        });
    }


</script>








