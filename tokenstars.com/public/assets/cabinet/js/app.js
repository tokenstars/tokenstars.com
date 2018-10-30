$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#collapse-token-button-show').on('click',function(){
        $('#collapse-token-button-hide').attr('class', 'btn btn-outline-primary font-family-alt text-uppercase font-weight-semibold collapsed user-card-show-details-btn');
    })

    $('#collapse-token-button-hide').on('click',function(){
        $('#collapse-token-button-hide').attr('class', 'btn btn-outline-primary font-family-alt text-uppercase font-weight-semibold user-card-show-details-btn');
        $('#collapse-token-button-show').attr('class', 'btn btn-outline-primary font-family-alt text-uppercase font-weight-semibold collapsed user-card-show-details-btn');
        $('#collapse-token').attr('class', 'collapse')
    })


    $('#edit-profile').on('click', function(){
        $.ajax({
            method: "GET",
            url: "/dashboard/profile/edit",
        }).done(function( msg ) {
            $('#edit-profile-content').html(msg);
        });
    });

    $('#checkbox-02').on('click', function(){
        $.ajax({
            method: "POST",
            url: "/dashboard/profile/fan_role",
        }).done(function( msg ) {

        });
    })

    $('#checkbox-03').on('click', function(){
        $.ajax({
            method: "POST",
            url: "/dashboard/profile/scout_role",
        }).done(function( msg ) {

        });
    })

    $('button.btn-verify-wallet').on('click', function(){
        wallet_id = $(this).data('wallet');
        console.log($(this));
        $.ajax({
            method: "GET",
            url: "/dashboard/wallet/verify_form/"+wallet_id,
        }).done(function( msg ) {
            $('#verify-wallet-form').html(msg);
        });
    });

    $('#photo-02, #photo-03, #photo-04, #photo-05').change(function(){

        file = this.files[0];
        var type = $(this).attr('name');
        var form = new FormData();
        form.append('doc', file);
        form.append('type', type);

        $.ajax({
            url: '/dashboard/profile/documents_upload',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data : form,
            done: function(response){

            }
        });
        window.location.reload();
    });
    $('#feedback-modal form').on('submit', function(){

        $.ajax({
            url: '/dashboard/feedback',
            type: "POST",
            data : $(this).serialize(),
            success: function(response){
                if(response.trim() == 'ok') {
                    $('#feedback-status').html('<div style="color:#5bd564; text-align: center">Thanks! Your message has been sent.</div>');
                }
            }
        });

        return false;
    })

    for(var i = 1; i < 4; i++)
    {
        var img_p = $('#img_ph_'+i);
        var src = img_p.attr('src');

        if(src)
        {
            $.ajax({
                method: "GET",
                url: "/dashboard/doc_view/"+i,
            }).done(function( msg ){
                var json = JSON.parse(msg);
                $('#img_ph_'+json.type).attr('src', json.data)
            });
        }
    }
});



(function () {
    const _Drop = Drop.createContext({
        classPrefix: 'drop',
    });

    const setup = function () {
        return $('.js-drop').each(function () {
            const $dropwrap = $(this);
            const theme = $dropwrap.data('theme');
            const position = $dropwrap.data('position');
            const openOn = $dropwrap.data('open-on') || '';
            const $target = $dropwrap.find('.drop-target');
            $target.addClass(theme);
            const content = $dropwrap.find('.drop-content').html();

            const drop = new _Drop({
                target: $target[0],
                classes: theme,
                position,
                constrainToWindow: false,
                constrainToScrollParent: false,
                openOn,
                content,
                hoverOpenDelay: 500,
                // remove: true
            });

            $(this)[0].drop = drop;

            return drop;
        });
    };

    const init = function () {
        return setup();
    };

    init();
}).call(this);

; ( function ( $ ) {
    var settings = {
        url: 'URL TO UPLOAD FILE',
        toDo: 'OPTIONAL TODO VARIABLE TO SEND TO UPLOAD FILE',
        hoverClass: 'dragAndUploadActive',
        uploadingClass: 'dragAndUploadUploading',
        errorClass: 'dragAndUploadFailure',
        successClass: 'dragAndUploadSuccess',
        statusField: '#dragAndUploadStatus',
        classChangeDelay: 750,
        maxSize: 5242880
    };

    function uploadFile( file, item ) {
        //file = this.files[0];
        //console.log(file)
        var type = item.getElementsByTagName("input")[0].getAttribute('name')
        var form = new FormData();
        form.append('doc', file);
        form.append('type', type);

        $.ajax({
            url: '/dashboard/profile/documents_upload',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data : form,
            done: function(response){

            }
        });
        window.location.reload();
    }

    function findFiles( e, item ) {
        var files = e.originalEvent.dataTransfer.files;

        $.each( files,
            function ( key, value ) {
                uploadFile( value, item );
            }
        );
    }

    function setEvents( item ) {
        $( item ).on( 'drop dragover dragenter dragleave',
            function ( e ) {
                $( this ).removeClass( settings.errorClass + ' ' + settings.successClass );
                e.stopPropagation();
                e.preventDefault();
                if ( e.type !== 'dragover' ) {
                    $( this ).toggleClass( settings.hoverClass );
                }
                if ( e.type === 'drop' ) {
                    findFiles( e, item );
                }
            }
        );
    }

    function setOptions( options ) {
        $.each( options, function ( key, val ) {
            settings[key] = val;
        } );
    }

    $.fn.dragAndUpload = function ( options ) {
        if ( options !== undefined ) setOptions( options );
        this.each( function () {
            setEvents( this );
        } );
        return this;
    }
}( jQuery ) );

$( document ).ready(
    function () {
        // Uses default settings
        $("#ph-1, #ph-2, #ph-3").dragAndUpload();
    }
);