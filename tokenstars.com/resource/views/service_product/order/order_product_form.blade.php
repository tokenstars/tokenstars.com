
        <form action="/order/buy/{{$product->id}}" method="POST" enctype="multipart/form-data" id="edit-user-form">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}" />

            <div class="row">
                <div class="col-12 d-flex" style="margin-top:20px;">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox h5 text-blue-darker">
                            <input name="ch_agree_1" type="checkbox" class="custom-control-input check_agreement" id="agree_1" ngrequired="required">
                            <label class="custom-control-label" for="agree_1">
                                I agree with TokenStars' <a href="https://tokenstars.com/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'terms_of_use', 'footer');">@lang('tokenstars-messages.footer.terms')</a>
                            </label>
                        </div>

                        <div class="custom-control custom-checkbox h5 text-blue-darker">
                            <input name="ch_agree_2" type="checkbox" class="custom-control-input check_agreement" id="agree_2" ngrequired="required">
                            <label class="custom-control-label" for="agree_2">
                                I agree with TokenStars' <a href="https://tokenstars.com/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'privacy_policy', 'footer');">@lang('tokenstars-messages.footer.privacy')</a>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox h5 text-blue-darker">
                            <input name="ch_agree_3" type="checkbox" class="custom-control-input check_agreement" id="agree_3" ngrequired="required">
                            <label class="custom-control-label" for="agree_3">
                                I hereby represent and warrant that I’ve received necessary consents to submit and publish the information specified in the application form.
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox h5 text-blue-darker">
                            <input name="ch_agree_4" type="checkbox" class="custom-control-input check_agreement" id="agree_4" ngrequired="required">
                            <label class="custom-control-label" for="agree_4">
                                I hereby represent and warrant that I'm not citizen of or resident in the USA
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12 if_checked_all">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox h6 text-blue-darker">
                            Address wallet of product: <strong class="font-weight-semibold h5">{{$product->wallet}}</strong>
                        </div>
                    </div>
                </div>
                <div class="col-12 if_checked_all">
                    <div class="form-group text-center">
                        OR
                    </div>
                    <div class="form-group text-center msg text-danger">
                    </div>
                </div>
                <div class="col-12 if_checked_all">
                    <div class="form-group">
                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Transaction hash</label>
                        <input name="tx_hash" id="tx_hash" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="">
                    </div>
                </div>

            </div>
            <div class="mt-5_5 if_checked_all">
                <span class="btn btn-primary btn-lg text-uppercase px-4 mw-120px" id="save_buy">Save</span>
            </div>
        </form>

        <script type="text/javascript">

            $(document).ready(function(){
                $('.if_checked_all').hide();

                $('#save_buy').on('click', function(){
                    //console.log(this);
                    $.ajax({
                        method: "POST",
                        url: "/order/buy/"+$('#product_id').val(),
                        data: 'tx_hash='+$('#tx_hash').val(),
                    }).done(function( msg ) {
                        console.log(msg);
                        $('.msg').html(msg['warning']);
                        if(msg['status'] == true)
                            $('#buy-modal').modal('hide');
                    });
                });

                $('.check_agreement').on('click', function(){
                    if($(this))
                    var checked=true;
                    $('.check_agreement').each(function(){
                        if($(this).prop( "checked") == false){
                            checked = false;
                        }
                    });
                    if(checked){
                        $('.if_checked_all').show();
                    }
                    else{
                        $('.if_checked_all').hide();
                    }
                });
            });
        </script>







