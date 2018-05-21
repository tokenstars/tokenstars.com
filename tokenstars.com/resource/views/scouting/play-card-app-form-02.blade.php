<fieldset class="card step-card">
    <header class="card-header step-card-header py-4 px-5">
        <h4 class="step-title text-uppercase mb-0 font-family-alt">
            <span class="step-title-secondary">Step 2 of 7</span>
            <span class="step-title-primary">General Information</span>
        </h4>
    </header>
    <form action="{{route('scouting.create_step2_post')}}" method="post">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body px-5 py-4">
            <div class="row pt-4 mt-1">
                <div class="col-6 pr-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">First Name*</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text"
                               value="{{$first_name or ""}}" name="first_name" placeholder="Players' first name">
                    </div>
                </div>
                <div class="col-6 pl-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Last Name*</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text"
                               value="{{$last_name or ""}}" name="last_name" placeholder="Players' last name">
                    </div>
                </div>
                <div class="col-6 pr-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country of
                            Residence*</label>
                        <select class="custom-select custom-select-lg font-weight-bold text-blue-darker" id="country-id"
                                name="country_id">
                            <option value="-">---</option>
                            @foreach($countries as $c_id => $c_name)
                                <option value="{{$c_id}}"
                                    @isset($country_id)
                                        @if ($country_id == $c_id)
                                            selected="selected"
                                        @endif
                                    @endisset
                                >{{$c_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6 pl-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">City of
                            Residence*</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text"
                               value="{{$city or ""}}" name="city" placeholder="Add the city of residence">
                    </div>
                </div>
                <div class="col-6 pr-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date of
                            Birth*</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="date"
                               value="{{$date_of_birth or ""}}" name="date_of_birth" placeholder="DD.MM.YYYY"
                               data-date-format="DD.MM/YYYY">
                    </div>
                </div>
                <div class="col-6 pl-5">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sex</label>
                        <div class="row py-2">
                            <div class="col-auto">
                                <div class="custom-control custom-radio h5 text-blue-darker">
                                    @if ((isset($sex)  && ($sex == 1 || $sex == '')) || !isset($sex))
                                        <input name="sex" value="1" type="radio" class="custom-control-input" id="male"
                                               checked>
                                    @else
                                        <input name="sex" value="1" type="radio" class="custom-control-input" id="male">
                                    @endif
                                    <label class="custom-control-label" for="male">
                                        Male
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="custom-control custom-radio h5 text-blue-darker">
                                    @if (isset($sex) && $sex == 2)
                                        <input name="sex" value="2" type="radio" class="custom-control-input"
                                               id="female" checked>
                                    @else
                                        <input name="sex" value="2" type="radio" class="custom-control-input"
                                               id="female">
                                    @endif
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
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Nationality*</label>
                        <select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                id="nationality-id" name="nationality">
                                <option value="-">---</option>
                            @foreach($countries as $c_id => $c_name)
                                <option value="{{$c_id}}"
                                        @isset($nationality)
                                        @if ($nationality == $c_id)
                                        selected="selected"
                                        @endif
                                        @endisset
                                >{{$c_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6 pl-5">
                    <div class="row">
                        <div class="col-6 pl-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Weight
                                    (kg)</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="number" value="{{$weight or ""}}" name="weight" placeholder="54" min="10" max="400">
                            </div>
                        </div>
                        <div class="col-6 pl-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Height
                                    (cm)</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="number" value="{{$height or ""}}" name="height" placeholder="174" min="45" max="300">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Bio (300 words
                            max.)*</label>
                        <textarea class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                  name="description" id="description-id" cols="30" rows="3" maxlength="300"
                                  placeholder="Please type in short bio of the player here">{{$description or ""}}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Facebook</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                               value="{{$fb_link or ""}}" name="fb_link" placeholder="Add the Facebook link">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Twitter</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                               value="{{$tw_link or ""}}" name="tw_link" placeholder="Add the Twitter link">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Instagram</label>
                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                               value="{{$ig_link or ""}}" name="ig_link" placeholder="Add the Instagram link">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="text-uppercase text-blue-gray-light font-weight-bold">Photos upload*</div>
                        <div class="text-blue-gray-light mb-2">(please upload 1-2 front face photos and 3-4 photos, made
                            during the game)
                        </div>
                        <div class="img-thumb-container">
                            <!--<div class="img-thumb-wrapper">
                                <img class="img-thumb-img" src="https://via.placeholder.com/130x130" alt="">
                                <span class="icon icon-close-red img-thumb-action">
								<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
							</span>
                            </div>-->
                            <!--<div class="upload-drop-zone-wrapper">
                                <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center"
                                       for="upload-photo">
                                    <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                                </label>-->
                                <!--<input type="file" id="upload-photo" hidden name="photos[]">-->
                                <input type="file" id="upload-photo" name="photos[1]">
                                <input type="file" id="upload-photo" name="photos[2]">
                                <input type="file" id="upload-photo" name="photos[3]">
                                <input type="file" id="upload-photo" name="photos[4]">
                                <input type="file" id="upload-photo" name="photos[5]">
                                <input type="file" id="upload-photo" name="photos[6]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="more_wrapper_media_articles_links more-div">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Links to media
                                articles</label>
                            @if(isset($media_articles_links))
                            @foreach($media_articles_links as $mal_id => $mal_value)
                            <div class="input-group input-group-lg mb-2">
                                <input class="form-control font-weight-bold text-blue-darker " type="url" value="{{$mal_value}}" id=""
                                       name="media_articles_links[{{$mal_id}}]" placeholder="Add media article">
                                <div class="input-group-append">
                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                        <span class="icon icon-close-red icon-md">
                                            <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                             @endforeach
                            @else
                                <div class="input-group input-group-lg mb-2">
                                    <input class="form-control font-weight-bold text-blue-darker " type="url" value="" id=""
                                           name="media_articles_links[]" placeholder="Add media article">
                                    <div class="input-group-append">
                                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                        <span class="icon icon-close-red icon-md">
                                            <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                        </span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add more
                            articles
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-5 mb-2 d-flex">
                <button class="btn btn-outline-secondary btn-lg text-uppercase px-4 mr-4" name='btn_back'>Back</button>
                <button class="btn btn-primary btn-lg text-uppercase px-4" name='btn_next'>Next Step ></button>
                <button class="btn btn-outline-primary btn-lg text-uppercase px-4 ml-auto step-save-button"
                        name='btn_save'>Save
                </button>
            </div>
        </div>
    </form>
</fieldset>
