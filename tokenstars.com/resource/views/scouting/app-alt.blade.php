<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/css/app-scouting.css">
      @include('scouting.app-icons')
	</head>
	<body class="page-body bg-light">
		 @include('layouts.cabinet.header')
		<div class="page-wrapper">
            @yield('content')
		</div>

			<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			<script src="/js/app-scouting.js"></script>
		 	<script src="/js/app-scouting2.js"></script>
		 	<script src="/js/dist/min/jquery.inputmask.bundle.min.js"></script>
		 <script>
             $(document).ready(function(){
                 //$("input[name='date_of_birth']").inputmask("99/99/9999",{ "placeholder": "dd/mm/yyyy" });
                 /*$("input[name='date_of_birth']").datepicker({
					 dateFormat: 'dd.mm.yy',
					 changeMonth: true,
                     changeYear: true
				 });*/
                 /*$("input[name='fb_link']").inputmask({
					 regex:"(?:https?:\/\/)?(?:www\.)?facebook\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)"
				 });*/
                 var maxField = 10;
                 var more_articles_links_HTML = '<div class="input-group input-group-lg mb-2">\n' +
                     '\t\t\t\t\t  <input class="form-control font-weight-bold text-blue-darker " type="url" value="" id="" name="media_articles_links[]" placeholder="Add media article">\n' +
                     '\t\t\t\t\t  <div class="input-group-append">\n' +
                     '\t\t\t\t\t\t<button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                     '\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                     '\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                     '\t\t\t\t\t        </span>\n' +
                     '\t\t\t\t\t    </button>\n' +
                     '\t\t\t\t\t  </div>\n' +
                     '\t\t\t\t\t</div>';
                 var video_links_HTML = '<div class="input-group input-group-lg mb-2">\n' +
                     '\t\t\t\t\t  <input class="form-control font-weight-bold text-blue-darker " type="url" value="" id="" name="video_links[]" placeholder="Links to video">\n' +
                     '\t\t\t\t\t  <div class="input-group-append">\n' +
                     '\t\t\t\t\t\t<button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                     '\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                     '\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                     '\t\t\t\t\t        </span>\n' +
                     '\t\t\t\t\t    </button>\n' +
                     '\t\t\t\t\t  </div>\n' +
                     '\t\t\t\t\t</div>';
                 var element_classes = {
                     'more_wrapper_media_articles_links':{
                         'element_name': 'media_articles_links',
                         'element_HTML': more_articles_links_HTML,
                         'count': 1,
                     },
                     'more_wrapper_titles_singles':{
                         'element_name': 'titles_singles',
                         'element_HTML': '',
                         'count': 1,
                     },
                     'more_wrapper_titles_doubles':{
                         'element_name': 'titles_doubles',
                         'element_HTML': '',
                         'count': 1,
                     },
                     'more_wrapper_final_singles':{
                         'element_name': 'final_singles',
                         'element_HTML': '',
                         'count': 1,
                     },
                     'more_wrapper_final_doubles':{
                         'element_name': 'final_doubles',
                         'element_HTML': '',
                         'count': 1,
                     },
                     'more_wrapper_video_links':{
                         'element_name': 'video_links',
                         'element_HTML': video_links_HTML,
                         'count': 1,
                     },
                 };
                 var titles_final_arr = [
                     'titles_singles',
                     'titles_doubles',
                     'final_singles',
                     'final_doubles',
                 ];
                 //fill html for step 3 fields
                 for(i=0; i < titles_final_arr.length; i++){
                     element_classes['more_wrapper_'+titles_final_arr[i]]['element_HTML'] = '<div class="input-group input-group-lg mb-2">\n' +
                         '\t\t\t\t\t  <input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$final_doubles[1] or ""}}" name="'+titles_final_arr[i]+'[]" placeholder="Add the details: Month, Year, Tournament, Location" id="final-double-1">\n' +
                         '\t\t\t\t\t  <div class="input-group-append">\n' +
                         '\t\t\t\t\t\t<button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                         '\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                         '\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                         '\t\t\t\t\t        </span>\n' +
                         '\t\t\t\t\t    </button>\n' +
                         '\t\t\t\t\t  </div>\n' +
                         '\t\t\t\t\t</div>';
                 }
                 for(i in element_classes){
                     if($("input[name='"+element_classes[i]['element_name']+"[]']").length ){
                         element_classes[i]['count'] = $("input[name='"+element_classes[i]['element_name']+"[]']").length;
                     }
                 }
                 $('.add-more-btn').click(function(e){
                     e.preventDefault();
                     wrapper = $(this).siblings('div').first();
                     wrapper_class = $(wrapper).attr('class').split(" ")[0];
                     if(element_classes[wrapper_class]['count'] < maxField){
                         element_classes[wrapper_class]['count']++; //Increment field counter
                         $("."+wrapper_class).append(element_classes[wrapper_class]['element_HTML']); //Add field html
                     }
                 });
                 $(".more-div").on('click', '.delete-more-btn', function(e){
                     e.preventDefault();
                     wrapper_class =$(this).parent('div').parent('div').parent('div').attr('class').split(" ")[0];
                     $(this).parent('div').parent('div').remove(); //Remove field html
                     element_classes[wrapper_class]['count']--;
                 });
                 function checkParamsStep2() {
                     first_name = $("input[name='first_name']").val();
                     last_name = $("input[name='last_name']").val();
                     country = $("select[name='country_id'] option:selected").length;
                     city = $("input[name='city']").val();
                     date_of_birth = $("input[name='date_of_birth']").val();
                     nationality = $("select[name='nationality'] option:selected").length;
                     bio = $("textarea[name='description']").val();
                     if(first_name.length != 0 && last_name.length != 0 && country.length != 0 && city.length != 0 && date_of_birth.length != 0 && nationality.length != 0  && bio.length != 0) {
                         $("button[name='btn_next']").removeAttr('disabled');
                         $("button[name='btn_save']").removeAttr('disabled');
                     } else {
                         $("button[name='btn_next']").attr('disabled', 'disabled');
                         $("button[name='btn_save']").attr('disabled', 'disabled');
                     }
                 }
                 function checkParamsStep3() {
                     itf_profile = $("input[name='itf_profile']").val();
                     if(itf_profile.length != 0) {
                         $("button[name='btn_next']").removeAttr('disabled');
                         $("button[name='btn_save']").removeAttr('disabled');
                     } else {
                         $("button[name='btn_next']").attr('disabled', 'disabled');
                         $("button[name='btn_save']").attr('disabled', 'disabled');
                     }
                 }

                 // Step 2 validate requerd fields
                 if( $("input[name='first_name']").length > 0){
                     $("input[name='first_name']").on('keydown keypress keyup focusout focus paste',function (event) {
                         checkParamsStep2();
                     });
                     $("input[name='last_name']").on('keydown keypress keyup focusout focus paste',function (event) {
                         checkParamsStep2();
                     });
                     $("select[name='country_id']").on('change focusout focus',function (event) {
                         checkParamsStep2();
                     });
                     $("input[name='city']").on('keydown keypress keyup focusout focus paste',function (event) {
                         checkParamsStep2();
                     });
                     $("input[name='date_of_birth']").on('change blur keydown keypress keyup focusout focus paste',function (event) {
                         checkParamsStep2();
                     });
                     $("select[name='nationality']").on('change focusout focus',function (event) {
                         checkParamsStep2();
                     });
                     $("textarea[name='description']").on('change input propertychange keydown keypress keyup focusout focus paste',function (event) {
                         checkParamsStep2();
                     });
                     checkParamsStep2();
                     $("button[name='btn_back']").click(function(e) {
                             checkSocialLinks(e);
                         }
                     );
                     $("button[name='btn_next']").click(function(e) {
                             checkSocialLinks(e);
                         }
                     );
                     $("button[name='btn_save']").click(function(e) {
                             checkSocialLinks(e);
                         }
                     );
                 }
                 // Step 3
                 //itf_profile
                 // $("input[name='date_of_birth']").inputmask("99/99/9999",{ "placeholder": "dd/mm/yyyy" });
                 $("input[name='win_loss_cys']").inputmask("9{1,4} - 9{1,4}");
                 $("input[name='win_loss_at']").inputmask("9{1,4} - 9{1,4}");
                 $("input[name='weight']").inputmask("9{1,3} - 9{1,3}");
                 $("input[name='height']").inputmask("9{1,3} - 9{1,3}");
                 $("input[name='date_of_birth']").inputmask("99.99.9999",{ "placeholder": "dd.mm.yyyy" });
                 /*if( $("input[name='itf_profile']").length > 0){
                     $("input[name='win_loss_cys']").inputmask("9{1,4} - 9{1,4}");
                     $("input[name='win_loss_at']").inputmask("9{1,4} - 9{1,4}");
                     $("input[name='itf_profile']").on('keydown keypress keyup focusout focus paste',function (event) {
                         checkParamsStep3();
                     });
                     checkParamsStep3();
                 }*/

             });
		 </script>

  </body>
</html>
