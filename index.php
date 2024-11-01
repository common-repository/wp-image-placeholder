<?php
/**
 * Plugin Name: WP Image Placeholder
 * Plugin URI: http://www.logomind.nl
 * Description: Places a image placeholder using a shortcode
 * Version: 1.0
 * Author: Buddy Jansen 
 * Author URI: http://www.logomind.nl
 * License: GPLv2
 */

class placeholder {
        
    public function __construct() {
        
        add_shortcode('placeholder', array($this,'add_placeholder'));
        add_action('media_buttons_context', array($this,'add_button'));
        add_action('admin_footer', array($this,'popup'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
        add_action('wp_head', array($this, 'add_styling_frontpage'));
		add_action('admin_head', array($this, 'add_styling_admin'));
    }

    
    public function add_placeholder($atts) {

        extract( shortcode_atts( array(
            'height' => 150,
            'width' => 150,
            'size' => null,
            'align' => "none",
            'style' => "",
        ), $atts ) );

        return "<img src='http://placehold.it/".$width."x".$height."' class='place$align' style='$style;'>";
    }
    
    public function add_button($container_id, $placeholder_button) {
        $placeholder_button =  '<a class="thickbox" href="#TB_inline?width=400&height=900&inlineId=popup_container"><div class="button"><img src="http://logomind.nl/wp-content/uploads/2014/03/placeholder_icon.png" style="position:relative; left:-3px; top:-2px;">Placeholder</div></a>';
        
        return $placeholder_button;
    }
    
    /*
     * Show popup
     */
    public function popup() {
        ?>
        <div id="popup_container" style="display:none;">
            <h2>WP Image Placeholder</h2>
            <p>Our Wordpress image placeholder is very easy to use. Fill in the width and height and click on the button below. It will automaticly place the shortcode to you're content. Now you are ready to go!</p>
            
            <h3>Width & Height</h3><br>
			<hr>
            <div class="popupcenter">Width(px): <br/><input type='text' name='width' id='ip_width'></div>
            <div class="popupcenter">Height(px):<br/> <input type='text' name='height' id='ip_height'></div><br/><br/><br/><br/><br/>
            
            <h3>Paddings</h3><br>
			<hr>
            <div class="popupcenter">Padding Top: <input type='text' name='padding_top' id='padding_top'></div>
            <div class="popupcenter">Padding Right: <input type='text' name='padding_right' id='padding_right'></div>
            <div class="popupcenter">Padding Bottom: <input type='text' name='padding_bottom' id='padding_bottom'></div>
            <div class="popupcenter">Padding Left: <input type='text' name='padding_left' id='padding_left'></div><br/><br/><br/><br/><br/>
            &nbsp;<br>&nbsp;<br>&nbsp;<br>
			<h3>Alignment</h3><br/>
			<hr>
            <div class="popupcenter">Align:<br/>
                <select name="ip_align" id="ip_align">
                    <option value="left">Left</option>
                    <option value="center">Center</option>
                    <option value="right">Right</option>
                </select></div><br/><br/>
               
             
                <div class="popupcenterbutton"><a class='insert-shortcode button' href='javascript:void(0);'>Add Shortcode</a></div>
            
        </div>
        <?php
    }
    
    public function admin_enqueue_scripts() {
        wp_enqueue_script("placeholder", plugins_url("/insert.js", __FILE__));
    }
    
    
    public function add_styling_admin() {
    echo '<style type="text/css">
        .popupcenter { float:left; width:260px; }
        .popupcenterbutton { float:left; width:510px; position:relative; top:10px; }
        #TB_ajaxContent h3 { margin-bottom:0px; margin-top:10px; padding:10px; width:100%; color:#262626; font-size:14px; height:0px; padding:0px !important; }
         </style>';
	}
	
	public function add_styling_front() {
    echo '<style type="text/css">
        .placecenter { margin: 10px auto 10px auto; }
        .placeleft { float:left; }
        .placeright { float:right;}
         </style>';
	}


}
$placeholder = new placeholder();


?>
