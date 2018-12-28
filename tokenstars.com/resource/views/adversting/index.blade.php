@extends('adversting.app-adv')
@section('title', 'TokenStars Advertising')
@section('content')
    <div class="row justify-content-center">
        <div class="col-11">


            <form class="card card-primary" method="POST">
                {!! csrf_field() !!}
                <div class="card-body px-5 pt-2 pb-5_5">
                    <h4 class="mt-4 mb-3 text-blue-darker text-uppercase">Brand Details</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Brand Name*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="" placeholder="My brand" required="required" name="brand_name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Brand/Product link*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="" placeholder="http://" required="required" name="brand_link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Product description*</label>
                                <textarea maxlength="1500" class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="product_description" id="" cols="30" rows="4" required="required" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 134px;"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Product category*</label>
                                <select class="custom-select custom-select-lg font-weight-bold" id="" name="product_category">
                                    <option value="Sports equipment/apparel">Sports equipment/apparel</option>
                                    <option value="Consumer goods">Consumer goods</option>
                                    <option value="Beauty products/Cosmetics">Beauty products/Cosmetics</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Education">Education</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Services">Services</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4 mb-3 text-blue-darker text-uppercase">Campaign Details</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Main objective</label>

                                <select class="custom-select custom-select-lg font-weight-bold" id="" name="main_objective">
                                    <option value="Reach">Reach</option>
                                    <option value="Engagement">Engagement</option>
                                    <option value="Product News">Product News</option>
                                    <option value="PR">PR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sports</label>
                                <input maxlength="150" max="150" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="" placeholder="Tennis" name="sports">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">TokenStars Influencer</label>
                                <input maxlength="150" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="" placeholder="Influencer" name="tokenstars_influencer">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Campaign name</label>
                                <input maxlength="150" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="" placeholder="Name" name="campaign_name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Campaign description*</label>
                                <textarea maxlength="1500" class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="campaign_description" id="" cols="30" rows="4" required="required" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 134px;"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Campaign link</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="" placeholder="http://" name="campaign_link">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Social Media</label>
                                <div class="row py-2">
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker font-weight-bold">
                                            <input name="social[facebook]" type="checkbox" class="custom-control-input" id="facebook" checked="checked">
                                            <label class="custom-control-label" for="facebook">
                                                Facebook
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker font-weight-bold">
                                            <input name="social[instagram]" type="checkbox" class="custom-control-input" id="instagram">
                                            <label class="custom-control-label" for="instagram">
                                                Instagram
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker font-weight-bold">
                                            <input name="social[twitter]" type="checkbox" class="custom-control-input" id="twitter">
                                            <label class="custom-control-label" for="twitter">
                                                Twitter
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker font-weight-bold">
                                            <input name="social[youtube]" type="checkbox" class="custom-control-input" id="youtube">
                                            <label class="custom-control-label" for="youtube">
                                                Youtube
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Content type*</label>
                                <select class="custom-select custom-select-lg font-weight-bold" id="" name="content_type">
                                    <option value="">Review</option>
                                    <option value="">Product News</option>
                                    <option value="" selected="">Endorsement</option>
                                    <option value="">Guide</option>
                                    <option value="">Sponsorship</option>
                                    <option value="">Unboxing</option>
                                    <option value="">Interview</option>
                                    <option value="">Product Placement</option>
                                    <option value="">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Campaign dates*</label>
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control font-weight-bold text-blue-darker" placeholder="01/01/2019" required="required" id="date1" name="campaign_dates1">
                                    <div class="input-group-append">
                                        <span class="input-group-text text-blue-darker font-weight-bold bg-white border-0" id="">—</span>
                                    </div>
                                    <input type="text" class="form-control font-weight-bold text-blue-darker" placeholder="01/01/2019" required="required" id="date2" name="campaign_dates2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <script>
                        $('#date1').datepicker({
                            changeMonth:true,
                            changeYear:true,
                            yearRange: '2019:2050',
                        });
                        $('#date2').datepicker({
                            changeMonth:true,
                            changeYear:true,
                            yearRange: '2019:2050',
                        });
                    </script>
                    <h5 class="mt-4 mb-3 text-blue-darker text-uppercase">Target audience</h5>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sex</label>
                                <div class="row py-2">
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker font-weight-bold">
                                            <input name="male" type="checkbox" class="custom-control-input" id="male" checked="checked">
                                            <label class="custom-control-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-checkbox h5 text-blue-darker font-weight-bold">
                                            <input name="female" type="checkbox" class="custom-control-input" id="female">
                                            <label class="custom-control-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Age*</label>
                                <div class="input-group input-group-lg">
                                    <select class="custom-select custom-select-lg font-weight-bold" id="" name="age1" required="required">
                                        @for($i=16; $i < 70; $i++)
                                        <option value="{{$i}}" selected="">{{$i}}</option>
                                            @endfor
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text text-blue-darker font-weight-bold bg-white border-0" id="">—</span>
                                    </div>
                                    <select class="custom-select custom-select-lg font-weight-bold" id="" name="age2" required="required">
                                        @for($i=16; $i < 70; $i++)
                                            <option value="{{$i}}" selected="">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country*</label>
                                <select class="custom-select custom-select-lg font-weight-bold" id="" name="country" required="required">
                                    @foreach($countries as $k => $country)
                                        <option value="{{$country}}">{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Language*</label>
                                <select multiple class="custom-select custom-select-lg font-weight-bold" id="" name="language[]" required="required">
                                    <option value="Spanish" selected="">Spanish</option>
                                    <option value="English" selected="">English</option>
                                    <option value="Russian" selected="">Russian</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Other (please specify)</label>
                                <textarea maxlength="1500" class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="other" id="" cols="30" rows="4" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 134px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4 mb-3 text-blue-darker text-uppercase">Campaign In Numbers</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Reach (views, followers)</label>
                                <textarea maxlength="1500" class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="reach" id="" cols="30" rows="3" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 107px;"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row gutters-small">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Engagement</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" name="engagement" type="number" value="" placeholder="100">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Subscribers</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" name="subscribers" type="number" value="" placeholder="1000000">
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">№ of posts per reach</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker" name="posts" type="number" value="" placeholder="10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Other details</label>
                                <textarea class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="other_details" id="" cols="30" rows="3" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 107px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-3 mb-1 text-blue-darker text-uppercase">Budget*</h4>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" name="budget" type="number" value="" placeholder="100" required="required">
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4 mb-3 text-blue-darker text-uppercase">Contact Details</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Name*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" name="contact_name" type="text" value="" placeholder="Name" required="required">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Email*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" name="contact_email" type="text" value="" placeholder="Email" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{env('NOCAPTCHA_SITEKEY')}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5_5 d-flex">
                        <button class="btn btn-primary btn-lg text-uppercase px-4 font-weight-bold mx-auto btn-width-250px" type="submit">Submit The Form</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
