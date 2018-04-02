@extends('brand.app-brand')
@section('title', 'TokenStars Brand')
@section('content')
    <div class="container">
        <h2 class="text-uppercase text-blue-gray-light mb-5 pb-1 text-center">Brand Form</h2>
        <div class="row">
            <div class="col-6 pr-5">
                <h3 class="text-uppercase text-blue-gray-light">Cooperation Conditions and Benefits</h3>
                <p class="typo-lg mb-0">Please complete the form accurately and provide additional details to allow us make a tailored offer for the brand. If the proposal from you ends up in the successful contract with TokenStars talent, you will earn 10% of the deal (paid in ACE or TEAM tokens) and benefit from project development.</p>
            </div>
            <div class="col-6 pl-5">
                <form action="{{route('brand.index')}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Promoters' Details</label>
                        <input class="form-control form-control-lg font-weight-bold" type="text" maxlength="255" value="" name="promo_details">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Promoters' Name*</label>
                        <input class="form-control form-control-lg font-weight-bold" type="text" maxlength="255" value="" name="promo_name">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Promoters' E-mail*</label>
                        <input class="form-control form-control-lg font-weight-bold" type="email" maxlength="255" value="" name="promo_email">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Brand details</label>
                        <input class="form-control form-control-lg font-weight-bold" type="text" maxlength="255" value="" name="brand_details">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Brand*</label>
                        <input class="form-control form-control-lg font-weight-bold" type="text" maxlength="255" value="" name="brand">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Contact Name (Brand)*</label>
                        <input class="form-control form-control-lg font-weight-bold" type="text" maxlength="255" value="" name="contact_name_brand">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Email (Brand)*</label>
                        <input class="form-control form-control-lg font-weight-bold" type="email" maxlength="255" value="" name="email_brand">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Phone</label>
                        <input class="form-control form-control-lg font-weight-bold" type="text" maxlength="255" value="" name="phone">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country</label>
                        <select class="custom-select custom-select-lg font-weight-bold" id="" name="country">
                            <option value="">---</option>
                            @foreach($countries as $k => $country)
                                <option value="{{$country}}">{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Area of sponsorship*</label>
                        <select class="custom-select custom-select-lg font-weight-bold" id="" name="area_of_sponsor">
                            <option value="Sports - Tennis">Sports - Tennis</option>
                            <option value="Sports - Hockey">Sports - Hockey</option>
                            <option value="Sports - Football (Soccer)">Sports - Football (Soccer)</option>
                            <option value="Sports - Basketball">Sports - Basketball</option>
                            <option value="Sports - Poker">Sports - Poker</option>
                            <option value="eSports">eSports</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Desired endorsement format (if known)</label>
                        <select class="custom-select custom-select-lg font-weight-bold" id="" name="desired_format">
                            <option value="Brand representation">Brand representation</option>
                            <option value="Influencer Endorsement">Influencer Endorsement</option>
                            <option value="Social Media / Online">Social Media / Online</option>
                            <option value="Events">Events</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Name of the Athlete (optional)</label>
                        <input class="form-control form-control-lg font-weight-bold" type="text" value="" maxlength="255" name="name_of_athlete">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Information about the sponsorship</label>
                        <textarea class="form-control form-control-lg font-weight-bold" id="" cols="30" rows="5" maxlength="2000" name="info_about"></textarea>
                    </div>

                    <button class="btn btn-primary btn-lg text-uppercase font-weight-bold px-5" type="submit">
                        Send
                    </button>
                </form>
            </div>
        </div>
        <div class="section-divider"></div>
    </div>



@endsection
