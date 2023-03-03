jQuery( document ).ready(function() {

	//Product Control

	jQuery('body').on('change', 'input[type=radio][name=post_type]', function() {
		if (this.value == 'post') {
	    	jQuery("#hide_filter_cat_box").show();
    } else {	
    	jQuery("select#filter_post_options option[value='']").attr("selected", "selected");
    	jQuery("tr#hide_post_cat_box [name=post_category]").removeAttr("checked");
	    jQuery("tr#hide_post_tags_box [name=post_tag]").removeAttr("checked");
    	jQuery("#hide_filter_cat_box").hide();
    	jQuery('#hide_post_tags_box').hide();
	    jQuery('#hide_post_cat_box').hide();
	    setInterval(function(){ jQuery("select#filter_post_options").trigger('change'); }, 1000);
    }
	});

	//Post Control
	jQuery('body').on('change', 'select#filter_post_options', function() {
    var filter_post_options =  this.value;
    if(this.value == 'category'){
	  	jQuery('#hide_post_cat_box').show();
	  	jQuery('#hide_post_tags_box').hide();
	  	jQuery("tr#hide_post_tags_box [name=post_tag]").removeAttr("checked");
	  } else if(this.value == 'tags'){
	  	jQuery('#hide_post_tags_box').show();
	  	jQuery('#hide_post_cat_box').hide();
	  	jQuery("tr#hide_post_cat_box [name=post_category]").removeAttr("checked");
	  } else {
	  	jQuery('#hide_post_tags_box').hide();
	  	jQuery('#hide_post_cat_box').hide();
	  	jQuery("tr#hide_post_cat_box [name=post_category]").removeAttr("checked");
	  	jQuery("tr#hide_post_cat_box [name=post_tag]").prop('checked', false);
	  }
	});
});