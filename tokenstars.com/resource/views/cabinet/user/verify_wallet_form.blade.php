<form id="wallet-modal-id" action="/dashboard/wallet/verify" method="POST" enctype="multipart/form-data"> <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" /><input type="hidden" name="_wallet" value="{{ $wallet->id }}" />
                <div class="form-group">
                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Email</label>
                    <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$user->email}}" readonly name="email">
                </div>
                <div class="form-group">
                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Wallet "My wallet 2"</label>
                    <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$wallet->address}}" readonly name="wallet">
                </div>
                <div class="form-group">
                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sig</label>
                    <input id="sig-c" class="form-control form-control-lg font-weight-bold text-blue-darker @if($wallet->code != '' && $wallet->verifiable == 0)is-invalid @endif" type="text" required value="{{$wallet->code}}" name="sig" placeholder="0x290aa619d5e054c3de8b5f48e2a88e0ce410b2aea2ad3deb5c2ea7e270a10f3d27c85801ad48445a37fc27eecc86bbec92748af5fde22159a8bbe923278ec43a1b">
                    <div class="invalid-feedback" id="sig_err">@if($wallet->code != '' && $wallet->verifiable == 0) Invalid signature @endif</div>
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary btn-lg text-uppercase px-4 mw-120px" type="submit">Verify wallet ownership</button>
                </div>
            </form>

<script type="text/javascript">
    $('#wallet-modal-id').on('submit', function(){
        var sig = $('#sig-c');
        if(sig.val() != ''  && sig.val().slice(0, 2) == '0x') {
            sig.removeClass('is-invalid');
            $('#sig_err').html('')
            return true;
        }
        else {
            sig.addClass('is-invalid');
            $('#sig_err').html('Invalid signature');
            return false;
        }
    })
</script>
