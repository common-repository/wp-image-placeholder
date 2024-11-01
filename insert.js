jQuery(document).ready(function($) {
    jQuery('.insert-shortcode').on('click', function(e) {
        
        var width = jQuery("#ip_width").val();
        var height = jQuery("#ip_height").val();
        var align = jQuery("#ip_align").val();
        var padding_top = jQuery("#padding_top").val();
        var padding_right = jQuery("#padding_right").val();
        var padding_bottom = jQuery("#padding_bottom").val();
        var padding_left = jQuery("#padding_left").val();
        
        var shortcode = "[placeholder width='" + width + "' height='" + height + "' ";
		
		if (padding_top || padding_right || padding_bottom || padding_left) {
		shortcode += "style='padding:";
                
                    if (!padding_top) {
                        shortcode += "0 ";
                    } else{
                        shortcode += + padding_top + "px ";
                    } 

                     if (!padding_right) {
                        shortcode += "0 ";
                    } else{
                        shortcode += + padding_right + "px ";
                    }

                     if (!padding_bottom) {
                        shortcode += "0 ";
                    } else{
                        shortcode += + padding_bottom + "px ";
                    }

                     if (!padding_left) {
                        shortcode += "0 ";
                    } else{
                        shortcode += + padding_left + "px' ";
                    }
                   
		}
		
		shortcode += "align='" + align + "']";
        window.send_to_editor( shortcode );

        e.preventDefault();
        return false;
    });
});
