@auth
    <div class="modal modal-edit-profile fade" id="buy-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content pt-1 px-5 pb-5">
                <div class="modal-header p-0">
                    <button type="button" class="close modal-close-shift" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h4 class="text-uppercase font-family-alt text-blue-darker mb-5 line-height-normal mt-reduce">Buy</h4>
                <div id="edit-buy-content"></div>
            </div>
        </div>
    </div>
@else
    <div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">For authorized users only!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Please <a class="font-weight-bold" href="{{route('login')}}">login</a> or <a class="font-weight-bold" href="{{route('register')}}">create an account</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endauth
