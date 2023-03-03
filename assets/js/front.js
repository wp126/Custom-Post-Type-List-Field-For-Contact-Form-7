jQuery( document ).ready(function() {

    var forms = document.getElementsByTagName('form');

    for (var i = 0; i < forms.length; i++) {

        jQuery('select.wpcf7-posts', forms[i]).each(function() {
            var post_placeholder = jQuery(this).attr('placeholder');
            var post_allow_clear = (jQuery(this).attr('allow-clear_post') == 'true') ? true : false;
            var post_search_box = (jQuery(this).attr('search-box_post') == 'true') ? 2 : Infinity;
            jQuery(this).select2({
                placeholder : post_placeholder,
                allowClear : post_allow_clear,
                minimumResultsForSearch : post_search_box,
                templateResult: cptlfcf7_formatOptions
            });
        });
    }   
});

function cptlfcf7_formatOptions (state) {
    if (!state.id) { return state.text; }
    var imageformat = jQuery(state.element).data('image');
    var width = jQuery(state.element).data('width');
    var metas = jQuery(state.element).data('meta');
    if(metas){
        var meta = jQuery(state.element).data('meta').split('|');
    } else {
        var meta = '';
    }
    var meta_data = '';
    if(imageformat != undefined) {
            thumbnail = "<img style='width:" + width + "px; display: inline-block;' src='" + imageformat + "''  />";
    } else {
        thumbnail = '';
    }
    var descriptiondata = jQuery(state.element).data('content');
    var types = jQuery(state.element).data('types');
    if(types == 'product'){
    	 if(descriptiondata === undefined){
            	description = '';
            } else {
            	description = descriptiondata; 
          }	
    } else {
         if(descriptiondata === undefined){
            	description = '';
            } else {
            	description = descriptiondata; 
          }	
    }
    if(meta != undefined){
        if(meta.length > 0) {
            meta_data = "<div class='cptlfcf7_meta_data'><ul>";

            jQuery.each(meta, function( index, value ) {
                if(value != ''){
                    meta_data += "<li>" + value + "</li>";
                }
            });

            meta_data += "</ul></div>";
        }
    }

    var $state = jQuery(
    '<div class="cptlfcf7_main"><div class="cptlfcf7_left_box">' + thumbnail + '</div><div class="cptlfcf7_right_box"><div class="cptlfcf7_title" >' + state.text + '</div><div class="cptlfcf7_description" >' + description + '</div>' + meta_data + '</div></div>'
    );
    return $state;
}