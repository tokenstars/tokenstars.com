<div class="subscribe-success" style="display:none">Please, check your e-mail to confirm subscription.</div>
<form class="{{ $formClass or 'subscribe-form' }} subscribe-form-ajax" method="post" action="{{ route('subscribe') }}"
      onsubmit="ga('send', 'event', 'Subscribe', 'subscribe', '{{ $gaLabel }}');">
    <div class="subscribe-form-block">
        <input type="text" name="email" class="input" placeholder="Email" />
    </div>
    {{ csrf_field() }}

    <div class="subscribe-form-block">
        <input type="submit" value="Subscribe" class="button" />
    </div>
</form>
