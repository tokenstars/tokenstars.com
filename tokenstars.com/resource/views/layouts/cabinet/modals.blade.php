<div class="modal modal-feedback fade" id="feedback-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content pt-1 px-5 pb-5">
            <div class="modal-header p-0">
                <button type="button" class="close modal-close-shift" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 class="text-uppercase font-family-alt text-blue-darker mb-5 line-height-normal mt-reduce">Feedback form</h4>
            <form method="POST" action="/cabinet/feedback">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Email</label>
                    <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="email" value="{{ Auth::user()->email  }}" readonly>
                </div>
                <div class="form-group">
                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Text</label>
                    <textarea class="form-control form-control-lg font-weight-bold text-blue-darker" name="text" id="" cols="30" rows="7" placeholder="Hello my name is Alex!"></textarea>
                </div>
                <div class="mt-5" id="feedback-status">
                    <button class="btn btn-primary btn-lg text-uppercase px-4 mw-120px" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal modal-verify-wallet fade" id="verify-wallet-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content pt-1 px-5 pb-5">
            <div class="modal-header p-0">
                <button type="button" class="close modal-close-shift" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 class="text-uppercase font-family-alt text-blue-darker mb-5 line-height-normal mt-reduce">Verify wallet</h4>
            <p class="text-blue-darker font-family-alt line-height-normal mb-4">To verify wallet ownership enter the SIG value as described in the instruction and click "verify"</p>
            <div id="verify-wallet-form"></div>
        </div>
    </div>
</div>
<div class="modal modal-edit-profile fade" id="edit-profile-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content pt-1 px-5 pb-5">
            <div class="modal-header p-0">
                <button type="button" class="close modal-close-shift" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 class="text-uppercase font-family-alt text-blue-darker mb-5 line-height-normal mt-reduce">Edit Profile</h4>
            <div id="edit-profile-content"></div>
        </div>
    </div>
</div>