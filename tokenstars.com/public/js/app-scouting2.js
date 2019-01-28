var preview_ph = '<div class="img-thumb-wrapper" id="preview-id-{id}">\n' +
'<img class="img-thumb-img" src="{e_result}" alt="" style="max-width: 130px">\n' +
'<span class="icon icon-close-red img-thumb-action" onclick="delPrew({idl})">\n' +
'<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
'</span>\n' +
'</div>';


var preview_ph_graph = '<div class="img-thumb-wrapper" id="graph-preview-id-{id}">\n' +
    '<img class="img-thumb-img" src="{e_result}" alt="" style="max-width: 130px">\n' +
    '<span class="icon icon-close-red img-thumb-action" onclick="delGraphPrew({idl})">\n' +
    '<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
    '</span>\n' +
    '</div>';

var preview_ph_references = '<div class="img-thumb-wrapper" id="references-preview-id-{id}">\n' +
    '<img class="img-thumb-img" src="{e_result}" alt="" style="max-width: 130px">\n' +
    '<span class="icon icon-close-red img-thumb-action" onclick="delReferencesPrew({idl})">\n' +
    '<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
    '</span>\n' +
    '</div>';
var filess = [];
var graphs = [];
var references = [];
var current_photos;
var current_graphs;
var current_references;

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
        if(filess.length < 10) {
            var reader = new FileReader();
            filess.push(file);
            current_photos++;
            var preview_ph_o = preview_ph;
            preview_ph_o = preview_ph_o.replace('{id}', filess.length);
            preview_ph_o = preview_ph_o.replace('{idl}', filess.length);
            reader.onload = function (e) {
                preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                $('#photos').append(preview_ph_o);
            };

            reader.readAsDataURL(file);
        }
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
        $("#upl_photo").dragAndUpload();
       /// $("#upl_graph").dragAndUpload();
    }
);

function delPrew(id)
{
    $('#preview-id-'+id).remove();
    delete filess[id];
}

function delPhoto(id)
{
    current_photos--;
    $('#preview-id-' + id).css('display', 'none');
    $.ajax({
        url: '/scouting/delete_photo/'+id,
        type: "GET",
        done: function(response){
        }
    });
}

function delGraphPrew(id)
{
    $('#graph-preview-id-'+id).remove();
    delete graphs[id];
}

function delGraphPhoto(id)
{
    current_graphs--;
    $('#graph-preview-id-' + id).css('display', 'none');
    $.ajax({
        url: '/scouting/delete_graph/'+id,
        type: "GET",
        done: function(response){
        }
    });
}

function delReferencesPrew(id)
{
    $('#references-preview-id-'+id).remove();
    delete references[id];
}

function delReferencesPhoto(id)
{
    current_references--;
    $('#references-preview-id-' + id).css('display', 'none');
    $.ajax({
        url: '/scouting/delete_references/'+id,
        type: "GET",
        done: function(response){
        }
    });
}

function readURL(input) {
    if(filess.length < 10) {
        file = input.files[0];
        var reader = new FileReader();
        filess.push(file);
        var preview_ph_o = preview_ph;
        preview_ph_o = preview_ph_o.replace('{id}', filess.length);
        preview_ph_o = preview_ph_o.replace('{idl}', filess.length);
        reader.onload = function (e) {
            preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
            $('#photos').append(preview_ph_o);
        };

        reader.readAsDataURL(file);
        input.value = '';
    }
}
function readGraphURL(input, id) {
    //if(graphs.length < 1) {
        file = input.files[0];
        var reader = new FileReader();
        graphs[id] = file;
        var preview_ph_o = preview_ph_graph;
        preview_ph_o = preview_ph_o.replace('{id}', graphs.length);
        preview_ph_o = preview_ph_o.replace('{idl}', graphs.length);
        reader.onload = function (e) {
            preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
            $('#graphs_'+id).append(preview_ph_o);
        };
        reader.readAsDataURL(file);
        input.value = '';
   // }
}

function readReferencesURL(input) {
    if(references.length < 10) {
        file = input.files[0];
        var reader = new FileReader();
        references.push(file);
        var preview_ph_o = preview_ph_references;
        preview_ph_o = preview_ph_o.replace('{id}', references.length);
        preview_ph_o = preview_ph_o.replace('{idl}', references.length);
        reader.onload = function (e) {
            preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
            $('#references').append(preview_ph_o);
        };

        reader.readAsDataURL(file);
        input.value = '';
    }
}