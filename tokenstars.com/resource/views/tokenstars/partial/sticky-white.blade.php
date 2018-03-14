<style>
	.container {
		width: 100%;
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
		max-width: 960px;
		max-width: 1130px; }

	.container-fluid {
		width: 100%;
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto; }
	.page-wrapper {
		-webkit-box-flex: 1;
		-webkit-flex: 1 1 auto;
		-ms-flex: 1 1 auto;
		flex: 1 1 auto; }
	.top-banner {
		display: block;
		position: relative;
		background-repeat: no-repeat; }
	.top-banner-close.icon,
	.top-banner-close.icon svg {
		width: 1.25rem;
		height: 1.25rem; }
	.top-banner-close.icon {
		position: absolute;
		top: 50%;
		margin-top: -.625rem;
		right: 15px;
		opacity: .9; }
	.top-banner-close.icon:hover {
		opacity: 1; }
	.top-banner, .top-banner-container {
		height: 4.375rem; }
	.top-banner-container {
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-webkit-align-items: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
		position: relative;
		text-align: center; }
	.top-banner-area {
		position: absolute;
		left: 0;
		top: 0;
		right: 0;
		bottom: 0; }
	.top-banner-title {
		font-family: "Exo 2", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
		font-size: 14px;
		font-weight: bold;
		line-height: 1.43;
		display: block;
		color: #060535;
		margin-bottom: 4px;
		text-transform: uppercase; }
	.top-banner-button {
		border-radius: 3px;
		font-family: "Exo 2", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
		font-size: 11px;
		height: 26px;
		line-height: 26px;
		padding-left: 13px;
		padding-right: 13px;
		font-weight: bold;
		display: inline-block;
		z-index: -1;
		background-image: -webkit-gradient(linear, left top, left bottom, from(#3d6bd1), to(#2845b8));
		background-image: linear-gradient(to bottom, #3d6bd1, #2845b8);
		color: #fff; }

	@media only screen and (max-width: 991px) {
		.top-banner-responsive {
			background-image: -webkit-gradient(linear, right top, left top, from(#f4f4f6), to(#e6e6ea));
			background-image: linear-gradient(to left, #f4f4f6, #e6e6ea); } }

	.top-banner-responsive .top-banner-area-desktop {
		display: block; }
	@media only screen and (max-width: 991px) {
		.top-banner-responsive .top-banner-area-desktop {
			display: none; } }

	.top-banner-responsive .top-banner-area-mobile {
		display: none; }
	@media only screen and (max-width: 991px) {
		.top-banner-responsive .top-banner-area-mobile {
			display: block; } }

	.top-banner-main {
		background-image: url(/images/banner-01-desktop.jpg);
		background-position: center;
	}
	@media only screen and (max-width: 991px) {
		.top-banner-main.top-banner-responsive {
			background-image: url(/images/banner-mobile.png) !important; } }

</style>
<!--<div class="page-wrapper">-->
<div class="page-wrapper" style="background-color: white;">

	<a class="top-banner top-banner-main top-banner-responsive js-top-banner" href="/scouting">
		<span class="top-banner-area top-banner-area-desktop">
			<span class="container top-banner-container">
				<span class="icon icon-close-gray-200 top-banner-close clickable js-close">
					<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-gray-200"></use></svg>
				</span>
			</span>
		</span>
		<span class="top-banner-area top-banner-area-mobile">
			<span class="container top-banner-container">
				<span>
					<span class="top-banner-title">New sports talents wanted!</span>
					<span class="top-banner-button">Become a scout</span>
				</span>
				<span class="icon icon-close-secondary top-banner-close clickable js-close">
					<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-secondary"></use></svg>
				</span>
			</span>
		</span>
	</a>
	<div class="section-divider"></div>

</div>
<!--</div>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    $(document).on('click', '.js-top-banner .js-close', function (e) {
        $(this).parents('.js-top-banner').hide();
        return false;
    });
</script>
<!--
<style>
	.sticky {
		background: url('/images/banner-03.jpg') no-repeat;
	}
	.sticky--col-btn {
		margin: 5px 0;
		padding: 0 202px;
	}
</style>
<div class="sticky sticky-prediction j-sticky" >
    <div class="wrap">
        <div class="sticky--wrap">
            <div class="sticky--wrap2">
                <div class="sticky--col-text">
                    <h1 class="sticky--title"></h1>
                </div>

                <div class="sticky--col-btn">
                    <a class="sticky--btn btn btn-regular btn-blue btn-big"
                       href="http://t.me/TokenStars_Predictions_bot"
                       target="_blank">
                        BECOME A SCOUT
                    </a>
                </div>

                <div class="sticky--col-img">
                    <img src="/images/sticky/muzhyk.png" width="125"/>
                </div>
            </div>

            <div class="sticky--col-times" onclick="$('.j-sticky').hide()">
            </div>
        </div>
    </div>
</div>
-->