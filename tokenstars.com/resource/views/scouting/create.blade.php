@extends('scouting.app-alt')

@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        .tabb {
            display:none;
        }
    </style>
    <div class="container">
        <div class="mt-5"></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase font-family-alt mb-4">
                <li class="breadcrumb-item"><a href="#">Platform</a></li>
                <li class="breadcrumb-item"><a href="{{route('scouting.index')}}">Scouting</a></li>
                <li class="breadcrumb-item active" aria-current="page">New player application</li>
            </ol>
        </nav>
        <h1 class="h3_25 font-family-alt text-blue-darker text-uppercase mb-4">New Player Application</h1>

        <!-- Step 1 -->
        <fieldset class="card step-card" id="form_f">
            <form id="regForm" method="POST" action="{{route('scouting.create')}}">
                {{ csrf_field() }}

                <input type="hidden" name="id" id="player_id" value="{{$player->id or ""}}">

            <header class="card-header step-card-header py-4 px-5">
                <h4 class="step-title text-uppercase mb-0 font-family-alt">
                    <span class="step-title-secondary" id="sec">Step 1 of 7</span>
                    <span class="step-title-primary" id="prm">Choose Sport</span>
                </h4>
            </header>


            <div class="card-body px-5 py-4">
                <div class="row tabb">
                    <div class="col-4 d-flex">
                        <div class="card card-radio w-100 p-4 text-center text-blue-darker rounded">
                            <h4 class="custom-control custom-radio text-uppercase font-family-alt mb-4 font-weight-semibold d-inline-flex mx-auto">
                                <input name="sport_type" value="1" type="radio" class="custom-control-input card-radio-input" id="radio-01" @if(empty($player->sport_type) || $player->sport_type == 1){{'checked '}}@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                <span class="custom-control-label card-radio-label">
					    Tennis (ACE)
					  </span>
                            </h4>
                            <label class="fill-area-link" for="radio-01">
						<span class="icon icon-tennis icon-xxl mx-auto">
							<svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#tennis'></use></svg>
						</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-4 d-flex active">
                        <div class="card card-radio w-100 p-4 text-center rounded js-btn active">
                            <h4 class="custom-control custom-radio text-uppercase mb-4 font-weight-semibold d-inline-flex mx-auto">
                                <input type="radio" name="sport_type" value="2" class="custom-control-input card-radio-input" id="radio-02" @if(!empty($player->sport_type) && $player->sport_type == 2){{'checked '}}@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                <span class="custom-control-label card-radio-label">
					    Poker (TEAM)
					  </span>
                            </h4>
                            <div class="spacer"></div>
                            <label class="fill-area-link" for="radio-02">
						<span class="icon icon-poker icon-xxl mx-auto">
							<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#poker"></use></svg>
						</span>
                            </label>
                            <div class="spacer"></div>
                        </div>
                    </div>
                    <div class="col-4 d-flex">
                        <div class="card card-radio w-100 p-4 text-center text-blue-darker disabled rounded">
                            <h4 class="custom-control custom-radio text-uppercase font-family-alt mb-4 font-weight-semibold d-inline-flex mx-auto">
                                <input type="radio" class="custom-control-input card-radio-input" id="radio-02" disabled>
                                <span class="custom-control-label card-radio-label">
					    Hockey (TEAM)
					  </span>
                            </h4>
                            <div class="spacer"></div>
                            <label class="fill-area-link" for="radio-02">
                                <span class="h2 font-weight-semibold font-family-alt text-uppercase mb-4 d-block">Soon</span>
                            </label>
                            <div class="spacer"></div>
                        </div>
                    </div>

                    @if (empty($player->id))
                    <div class="col-12 d-flex" style="margin-top:20px;">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_1" type="checkbox" class="custom-control-input" id="agree_1" ngrequired="required">
                                <label class="custom-control-label" for="agree_1">
                                    I agree with TokenStars' <a href="https://tokenstars.com/pdfs/Terms_of_Use.pdf" rel="noreferer, ,noopener" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'terms_of_use', 'footer');">@lang('tokenstars-messages.footer.terms')</a>
                                </label>
                            </div>

                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_2" type="checkbox" class="custom-control-input" id="agree_2" ngrequired="required">
                                <label class="custom-control-label" for="agree_2">
                                    I agree with TokenStars' <a href="https://tokenstars.com/pdfs/Privacy_Policy.pdf" rel="noreferer, ,noopener" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'privacy_policy', 'footer');">@lang('tokenstars-messages.footer.privacy')</a>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_3" type="checkbox" class="custom-control-input" id="agree_3" ngrequired="required">
                                <label class="custom-control-label" for="agree_3">
                                    I hereby represent and warrant that I’ve received necessary consents to submit and publish the information specified in the application form.
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_4" type="checkbox" class="custom-control-input" id="agree_4" ngrequired="required">
                                <label class="custom-control-label" for="agree_4">
                                    I hereby represent and warrant that I'm not citizen of or resident in the USA
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-12 d-flex" style="">
                        <small>To submit a player please use latest version of Google Chrome, Mozilla Firefox or Opera browsers.</small>
                    </div>
                </div>



                <div id="form_type">
                    @if(empty($player->sport_type) || $player->sport_type == 1)
                        <script>
                            sport_type = 1;
                        </script>
                        @include('scouting.forms.tennis')
                    @elseif(!empty($player->sport_type) && $player->sport_type == 2)
                        <script>
                            sport_type = 2;
                        </script>
                        @include('scouting.forms.poker')
                    @endif

                </div>



                <div class="mt-5 mb-2 d-flex">
                    <span id="prevBtn" onclick="nextPrev(-1)" class="btn btn-outline-secondary btn-lg text-uppercase px-4 mr-4">Back</span>
                    <span id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary btn-lg text-uppercase px-4">Next Step ></span>
                    @if (empty($player->id) || $player->status == 1)
                        <span class="btn btn-outline-primary btn-lg text-uppercase px-4 ml-auto step-save-button" onclick="draft()" id="step-save">Save</span>
                    @endif
                </div>
                <div id="progressBar" style="text-align: right; display: none"><progress id="progress" style="height: 6px" value="0"></progress> <span style="font-size: 10px" id="display"></span></div>
            </div>
            </form>
        </fieldset>
        <div class="card step-card step-card-done font-family-alt text-uppercase text-center" id="thnx" style="display: none;">
            <div class="card-body step-card-body d-flex flex-column justify-content-center mx-auto p-6">
                <p class="h4 font-weight-normal mt-5_5 mb-0"><img src="/images/25.gif" width="64px"></p>
                <p class="h4 font-weight-normal mt-5_5 mb-0">Please wait...</p>
                <p class="h4 font-weight-normal mt-5_5 mb-0"><progress id="progressEnd" style="height: 6px" value="0"></progress></p>
                <p class="h4 font-weight-normal mt-5_5 mb-0"><span style="font-size: 10px" id="displayEnd"></span></p>
            </div>
        </div>
        <!-- end step 1 -->


        <script type="text/javascript">
            var currentTab = 0; // Current tab is set to be the first tab (0)
            var oReq = new XMLHttpRequest();
            var progressBar = document.getElementById("progress"),
                display = document.getElementById("display"),
                progressBarDiv = document.getElementById('progressBar');

            var progressBarEnd = document.getElementById("progressEnd"),
                displayEnd = document.getElementById("displayEnd"),
                progressBarDivEnd = document.getElementById('progressBarEnd');

            showTab(currentTab); // Display the current tab
            var id = '@if(!empty($player->id)){{$player->id}}@endif';
            var id_status = '@if(!empty($player->status)){{$player->status}}@endif';
            var filess = [];
            var graphs = [];
            var references = [];

            var readyState = false;
            $('#date_of_birth').datepicker({
                changeMonth:true,
                changeYear:true,
                yearRange: '1970:2018',
            });
           // $( "#date_of_birth" ).datepicker( "option", "dateFormat",  );

            function draft()
            {
                progressBarDiv.style.display = 'block';
                var form = document.getElementById('regForm');
                var newForm = new FormData(form);
                var player_id = '@if(!empty($player->id)){{$player->id}}@endif';
                var player_id_status = '@if(!empty($player->status)){{$player->status}}@endif';

                if (!validateForm()) return false;

                if(filess.length > 0)
                {
                    for(fid=0; fid < filess.length; fid++)
                    {
                        newForm.append('photos[]',filess[fid]);
                    }
                }

                if(graphs.length > 0)
                {
                    for(fid=0; fid < graphs.length; fid++)
                    {
                        newForm.append('screen_names['+fid+'][graphs]',graphs[fid]);
                    }
                }

                if(references.length > 0)
                {
                    for(fid=0; fid < references.length; fid++)
                    {
                        newForm.append('references[]',references[fid]);
                    }
                }
                newForm.append('id', id);
                newForm.append('draft', 1);

                //if(player_id == '' || (player_id != '' && player_id_status == '1')){

                    readyState = true;
                    oReq.open("POST", "/scouting/create", true);
                    oReq.onloadstart = function(e) {
                        var btn = document.getElementById('step-save');
                        btn.innerHTML = 'Saving...';
                        document.getElementById('step-save').onclick = function() {  };
                        //document.getElementById(id+"Button").onclick = function() { HideError(id); }
                    };
                    oReq.onload = function(oEvent) {
                        if (oReq.status == 200) {
                            ids = oReq.response.trim();
                            id = ids;
                            document.getElementById('player_id').value = id;
                            filess = [];
                            graphs = [];
                            references = [];
                        }
                        readyState = false;
                        var btn = document.getElementById('step-save');
                        btn.innerHTML = 'Saved';
                        setTimeout(function(){
                            btn.innerHTML = 'Save';
                            document.getElementById('step-save').onclick = draft;
                            progressBarDiv.style.display = 'none';
                        },500)
                    };

                    if (oReq.upload) {
                        oReq.upload.onprogress = function(e) {
                            if (e.lengthComputable) {
                                progressBar.max = e.total;
                                progressBar.value = e.loaded;
                                display.innerText = Math.floor((e.loaded / e.total) * 100) + '%';
                            }
                        }
                        oReq.upload.onloadstart = function(e) {
                            progressBar.value = 0;
                            display.innerText = '0%';
                        }
                        oReq.upload.onloadend = function(e) {
                            progressBar.value = e.loaded;
                        }
                    }

                    oReq.send(newForm);
                //}
                return false;
            }

            function checkSocialLinks() {
                var fb = $("input[name='fb_link']");
                var tw = $("input[name='tw_link']");
                var ig = $("input[name='ig_link']");
                var fb_check = false;
                var tw_check = false;
                var ig_check = false;
                //return false;
                if(fb.val() == '' || fb.val().match(/(?:https?:\/\/)?(?:www\.)?facebook\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/i)) {
                    fb_check = true;
                    fb.removeClass('is-invalid');
                    fb.siblings('div.invalid-feedback').first().html('');
                    //console.log(fb);
                }
                else {
                    fb_check = false;
                    fb.addClass('is-invalid');
                    fb.siblings('div.invalid-feedback').first().html('This is not a Facebook URL');
                }
                if(tw.val()== '' || tw.val().match(/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/i)) {
                    tw_check = true;
                    tw.removeClass('is-invalid');
                    tw.siblings('div.invalid-feedback').first().html('');
                }
                else {
                    tw_check = false;
                    tw.addClass('is-invalid');
                    tw.siblings('div.invalid-feedback').first().html('This is not a Twitter URL');
                }
                if(ig.val()== '' || ig.val().match(/(?:https?:\/\/)?(?:www\.)?instagram\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/i)) {
                    ig_check = true;
                    ig.removeClass('is-invalid');
                    ig.siblings('div.invalid-feedback').first().html('');
                }
                else {
                    ig_check = false;
                    ig.addClass('is-invalid');
                    ig.siblings('div.invalid-feedback').first().html('This is not a Instagram URL');
                }
                if(!ig_check || !tw_check || !ig_check){
                    //e.preventDefault();
                    return false;
                }
                else
                    return true;
            }
            function isValidDate(dateString)
            {

                // First check for the pattern
                if(!/^\d{1,2}\.\d{1,2}\.\d{4}$/.test(dateString))
                    return false;
return true
                // Parse the date parts to integers
                parts = dateString.split(".");
                day = parseInt(parts[0], 10);
                month = parseInt(parts[1], 10);
                year = parseInt(parts[2], 10);

                var currentTime = new Date();
                var currentYear = currentTime.getFullYear();
/*
console.log(year + ' - '+currentYear + ' --- ' + month)
                // Check the ranges of month and year
                if(year < 1950 || year >= currentYear || month == 0 || month > 12)
                    return false;
*/
                monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

                // Adjust for leap years
                if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
                    monthLength[1] = 29;

                // Check the range of the day
                return day > 0 && day <= monthLength[month - 1];
            };
            function showTab(n) {
                // This function will display the specified tab of the form ...
                var x = document.getElementsByClassName("tabb");
                x[n].style.display = "flex";
                if(sport_type == 1) {
                    var sec_title = ['Step 1 of 7', 'Step 2 of 7', 'Step 3 of 7', 'Step 4 of 7', 'Step 5 of 7', 'Step 6 of 7', 'Step 7 of 7'];
                    var prm_title = ['Choose Sport', 'General Information', 'Tennis Stats', 'Playing and training Details', 'Next Season Goals', 'Personal Info', 'Players` contact info'];
                }
                else if(sport_type == 2) {
                    var sec_title = ['Step 1 of 6', 'Step 2 of 6', 'Step 3 of 6', 'Step 4 of 6', 'Step 5 of 6', 'Step 6 of 6'];
                    var prm_title = ['Choose Sport', 'General Information', 'POKER STATS', 'ADDITIONAL INFO', 'PERSONAL INFO', 'CONTACT INFO'];
                }


                var sec_title_elm = document.getElementById('sec');
                var prm_title_elm = document.getElementById('prm');

                var player_id = '@if(!empty($player->id)){{$player->id}}@endif';
                var player_id_status = '@if(!empty($player->status)){{$player->status}}@endif';

                sec_title_elm.innerHTML = sec_title[n];
                prm_title_elm.innerHTML = prm_title[n];
                // ... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                    document.getElementById("step-save").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                    document.getElementById("step-save").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit application";
                    if(player_id != '' && player_id_status != '1'){
                        document.getElementById("nextBtn").style.display = "none";
                    }
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                    if(player_id != '' && player_id_status != '1'){
                        document.getElementById("nextBtn").style.display = "block";
                    }
                }
            }

            function nextPrev(n) {
                if(readyState == true) return false;
                draft();
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tabb");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Increase or decrease the current tab by 1:
                x[currentTab].style.display = "none";
                currentTab = currentTab + n;

                // if you have reached the end of the form... :
                if (currentTab >= x.length) {
                    var form = document.getElementById('regForm');
                    var newForm = new FormData(form);

                    if(filess.length > 0)
                    {
                        for(fid=0; fid < filess.length; fid++)
                        {
                            newForm.append('photos[]',filess[fid]);
                        }
                    }

                    if(graphs.length > 0)
                    {
                        for(fid=0; fid < graphs.length; fid++)
                        {
                            newForm.append('graphs[]',graphs[fid]);
                        }
                    }
                    if(references.length > 0)
                    {
                        for(fid=0; fid < references.length; fid++)
                        {
                            newForm.append('references[]',references[fid]);
                        }
                    }
                    var formf = document.getElementById('form_f');
                    var thnx = document.getElementById('thnx');
                    formf.style.display = 'none';
                    thnx.style.display = 'block';


                    oReq.open("POST", "/scouting/create", true);
                    oReq.onload = function(oEvent) {
                        if (oReq.status == 200) {
                            var thnxx = "<div class=\"card-body step-card-body d-flex flex-column justify-content-center mx-auto p-6\">\n" +
                                "                <h2 class=\"text-blue-darker\">Thank you!</h2>\n" +
                                "                <h3 class=\"text-blue-gray font-weight-normal mb-0\">New player Application has been created</h3>\n" +
                                "                <p class=\"h4 font-weight-normal mt-5_5 mb-0\"><a href=\"{{route('scouting.index')}}\">Go back to scouting module</a></p>\n" +
                                "            </div>";
                                $('#thnx').html(thnxx)

                        }
                    };

                    if (oReq.upload) {
                        oReq.upload.onprogress = function(e) {
                            if (e.lengthComputable) {
                                progressBarEnd.max = e.total;
                                progressBarEnd.value = e.loaded;
                                displayEnd.innerText = Math.floor((e.loaded / e.total) * 100) + '%';
                            }
                        }
                        oReq.upload.onloadstart = function(e) {
                            progressBarEnd.value = 0;
                            displayEnd.innerText = '0%';
                        }
                        oReq.upload.onloadend = function(e) {
                            progressBarEnd.value = e.loaded;
                        }
                    }

                    oReq.send(newForm);

                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function ValidURL(str) {
                var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;

                var pattern = new RegExp(expression);
                if(!pattern.test(str)) {
                    return false;
                } else {
                    return true;
                }
            }

            function validateForm() {
                //return true;
                // This function deals with validation of the form fields

                var x, y, i, valid = true;
                var soc_url_valid = false;
                var date_birth = false
                var length_valid = true;
                x = document.getElementsByClassName("tabb");
                y = x[currentTab].getElementsByTagName("input");
                numbers = x[currentTab].querySelectorAll("input[type='number']");
                photo_container =  document.getElementById('photo-container');
                photos = document.getElementById('photos').getElementsByTagName("img-thumb-wrapper");

                graph_container =  document.getElementById('graph-container');
              //  graphs = document.getElementById('graphs').getElementsByTagName("img-thumb-wrapper");

                var select = x[currentTab].getElementsByTagName("select");
                textarea = x[currentTab].getElementsByTagName("textarea");
                // A loop that checks every input fie
                // ld in the current tab:
                for (i = 0; i < y.length; i++) {

                    is_required = y[i].getAttribute('ngrequired');
                    // If a field is empty...
                    if(is_required=='required') {
                        if(y[i].type == "text" || y[i].type == "url"){
                            if (y[i].value == "") {
                                // add an "invalid" class to the field:
                                y[i].classList.add('is-invalid');
                                // and set the current valid status to false:
                                valid = false;
                            }
                            else {
                                if(y[i].value.length > 191)
                                {
                                    y[i].classList.add('is-invalid');
                                    valid = false;
                                }
                                else
                                    y[i].classList.remove('is-invalid');

                                if(y[i].name == 'date_of_birth' && !isValidDate(y[i].value)){
                                    y[i].classList.add('is-invalid');
                                    // and set the current valid status to false:
                                    valid = false;
                                }
                                else if(y[i].name == 'date_of_birth' && isValidDate(y[i].value)){
                                 //   console.log(isValidDate(y[i].value));
                                    y[i].classList.remove('is-invalid');
                                }

                                if(y[i].name == 'itf_profile')
                                {
                                   // console.log(ValidURL(y[i].value));
                                    if(!ValidURL(y[i].value))
                                    {
                                        y[i].classList.add('is-invalid');
                                        valid = false;
                                    }
                                    else
                                    {
                                        y[i].classList.remove('is-invalid');
                                    }
                                }
                            }
                        }
                        else{
                            if(y[i].type == "checkbox"){
                                if (y[i].checked == false) {
                                    // add an "invalid" class to the field:
                                    y[i].classList.add('is-invalid');
                                    // and set the current valid status to false:
                                    valid = false;
                                }
                                else {
                                    y[i].classList.remove('is-invalid');
                                }
                            }
                            else{
                                y[i].classList.remove('is-invalid');
                            }
                        }

                    }
                    else
                    {
                        if(y[i].value.length > 191)
                        {
                            y[i].classList.add('is-invalid');
                            valid = false;
                        }
                        else
                        {
                            y[i].classList.remove('is-invalid');
                        }


                        if(y[i].type == "number" && y[i].value != '')
                        {
                            if(y[i].value.length > 5 || y[i].value < 0)
                            {
                                y[i].classList.add('is-invalid');
                                valid = false;
                            }
                            else
                            {
                                y[i].classList.remove('is-invalid');
                            }
                        }
                        if(y[i].type == "url" && y[i].value != '')
                        {
                            if(y[i].name == 'other_ranking_profiles')
                            {
                                if(!ValidURL(y[i].value))
                                {
                                    y[i].classList.add('is-invalid');
                                    valid = false;
                                }
                                else
                                {
                                    y[i].classList.remove('is-invalid');
                                }
                            }

                        }
                    }
                }

                for (i = 0; i < select.length; i++) {
                    is_required = select[i].getAttribute('ngrequired');
                    // If a field is empty...
                    if(is_required=='required') {
                        if (select[i].value == "") {
                            select[i].classList.add('is-invalid');
                            // and set the current valid status to false:
                            valid = false;
                            if(i == 1){
                              //  console.log(select[i-1].className);
                            }
                        }
                        else {
                            select[i].classList.remove('is-invalid');
                        }
                    }
                }

                for (i = 0; i < textarea.length; i++) {
                    is_required = textarea[i].getAttribute('ngrequired');
                    // If a field is empty...
                    if(is_required=='required') {
                        //onsole.log(textarea[i].value);
                        if (textarea[i].value == "") {
                            // add an "invalid" class to the field:
                            textarea[i].classList.add('is-invalid');
                            // and set the current valid status to false:
                            valid = false;
                        }
                        else {
                            if(textarea[i].value.length > 700)
                            {
                                textarea[i].classList.add('is-invalid');
                                // and set the current valid status to false:
                                valid = false;
                            }
                            else
                            {
                                textarea[i].classList.remove('is-invalid');
                            }

                        }
                    }
                    else
                    {
                        if(textarea[i].value != '' && textarea[i].value.length > 700)
                        {
                            textarea[i].classList.add('is-invalid');
                            // and set the current valid status to false:
                            valid = false;
                        }
                        else
                        {
                            textarea[i].classList.remove('is-invalid');
                        }
                    }
                }

                // validate numbers range
                for (i = 0; i < numbers.length; i++) {
                    min = numbers[i].getAttribute("min");
                    max = numbers[i].getAttribute("max");
                    maxlength = numbers[i].getAttribute("maxlength");
                    val = numbers[i].value;
                    //console.log("min "+min);
                   // console.log("max "+max);
                  //  console.log("maxlength "+maxlength);
                   // console.log("val "+ val);

                    if(numbers[i].value.length > 0 && min && max && maxlength){
                     //   console.log("here");
                        if(Number(val) < Number(min) || Number(val) > Number(max)){
                            if(val <= min){
                            //    console.log(val+  " <= " + min);
                            }
                            if(val >= max){
                            //    console.log(val+  " >= " + max);
                            }
                          //  console.log("here 2");
                            numbers[i].classList.add('is-invalid');
                            valid = false;
                            break
                        }
                        else{
                            numbers[i].classList.remove('is-invalid');
                            valid = true;
                        }
                    }

                   // console.log(numbers[i]);
                }

                // check photos
                /*if(currentTab == 1){
                    console.log(currentTab);
                    console.log("current_photos = " +current_photos.toString());
                    console.log(window);
                    console.log(photos.length);
                    console.log(current_photos);
                    if(photos.length == 0){
                        photo_container.className += " is-invalid";
                        valid = false;
                    }
                    else{
                        photo_container.classList.remove('is-invalid');
                    }

                }*/
                // Validate social links
                if(currentTab > 0)
                soc_url_valid = checkSocialLinks();
                else
                    soc_url_valid = true;
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    //document.getElementsByClassName("step")[currentTab].className += " finish";
                }


                if(valid  && soc_url_valid && length_valid){
                  return true;
                }
                //return valid; // return the valid status
                return false; // return the valid status
            }
        </script>


        <div class="mt-5_5"></div>
    </div>
@endsection
