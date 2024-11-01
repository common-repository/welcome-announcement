<?php
/*
Plugin Name: Welcome Announcement
Version: 1.0.1
Plugin URI: http://mbamba.fr/?page_id=93
Description: Display a welcome animation in flash on your website. Uses a cookie to show it only to new visitors. Returning visitors will see it when cookie expires.
Author: JMbamba
Author URI: http://juste.mbamba.fr/
*/

/*  Copyright 2009  JMb

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
*/
/* Next:  1) dynamically load jQuery on page refresh */
/* Next:  2) add more appearance and disappearance effects */
/* Next:  2) get ready for internationalization */


	//creating the admin page
include 'welcome_options.php';
add_action('admin_menu', 'welcome_menu');
add_action('admin_head', 'welcome_menu_resources');

function welcome_menu () {
  add_theme_page ('Welcome Announcement Options', 'Welcome Announcement','administrator', welcome_url().'/welcome_options.php', 'welcome_options_page');
  register_setting ('welcome_options', 'welcome_message_yn', '');// Every parameter is set in 3 places: register setting, update_option, and in the welcome_options.php.
  register_setting ('welcome_options', 'welcome_cookie_name', '');        
  register_setting ('welcome_options', 'welcome_cookie_expiration', '');
  register_setting ('welcome_options', 'welcome_animation_yn', '');
  register_setting ('welcome_options', 'welcome_animation_name', '');
  register_setting ('welcome_options', 'welcome_animation_params', '');
  register_setting ('welcome_options', 'welcome_fade_in_duration', '');
  register_setting ('welcome_options', 'welcome_animation_duration', '');
  register_setting ('welcome_options', 'welcome_fade_out_duration', '');
  register_setting ('welcome_options', 'welcome_animation_bgcolor', '');
  register_setting ('welcome_options', 'welcome_veil_bgcolor', '');
  register_setting ('welcome_options', 'welcome_veil_transparency', '');
  register_setting ('welcome_options', 'welcome_animation_width', '');
  register_setting ('welcome_options', 'welcome_animation_height', '');
  register_setting ('welcome_options', 'welcome_alternate_content', '');
  register_setting ('welcome_options', 'welcome_pseudo_zoom_in', '');
  register_setting ('welcome_options', 'welcome_veil_appear', '');
  register_setting ('welcome_options', 'welcome_veil_disappear', '');
  register_setting ('welcome_options', 'welcome_anim_appear', '');
  register_setting ('welcome_options', 'welcome_anim_disappear', '');
}
function welcome_menu_resources() {?>
<script src="<?php echo welcome_url(); ?>/201a.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo welcome_url(); ?>/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo welcome_url(); ?>/jquery-ui-1.7.2.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo welcome_url(); ?>/jquery-ui-1.7.2.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo welcome_url(); ?>/welcome.css" />
<?php //this gives us rich controls on the admin page.
}
	//end of admin page
	
function welcome_activation() {														// defining default values of the parameters
	//update_option(welcome ['cookie_name'], "testing_welcome");
		update_option('welcome_message_yn', true);									// Is the welcome cookie enabled
		update_option('welcome_cookie_name', "testing_welcome");							// Name of the welcome cookie
		update_option('welcome_cookie_expiration', 10/(60*60*24));					//EXPIRATION of the cookie in DAYS
		update_option('welcome_animation_yn', true);  								//Use the flash file
		update_option('welcome_animation_name', welcome_url()."/welcome_demo.swf");  //name of the animation FILE.
		update_option('welcome_animation_params', "&msg_Text=Welcome to ".get_bloginfo('name'));
		update_option('welcome_fade_in_duration', 2.5);								//DURATION of the fading in phase in SECONDS. The fading out starts after the animation duration. 
		update_option('welcome_animation_duration', 5);								//DURATION of the welcome announcement in SECONDS
		update_option('welcome_fade_out_duration', 3);								//DURATION of the fading out phase in SECONDS. THe fading out starts after the animation duration.
		update_option('welcome_animation_bgcolor', "#CC3300");						// Background color of the announcement. Use standard name or hex color code.
		update_option('welcome_veil_bgcolor', "#CCCCCC");						// Color of the veil. Use standard name or hex color code.
		update_option('welcome_veil_transparency', 0.85);						// Transparency of the veil. A decimal value between 0 and 1.
		update_option('welcome_animation_width', "500");						// Width of the announcement
		update_option('welcome_animation_height', "300");						// Height of the announcement
		update_option('welcome_alternate_content', "<br/><hr/\n><h2> Welcome to ".get_bloginfo('name')."</h2><hr/>\n<br/>\n<p>This is the place to be</p>\n<p>To see the animated announcement, install flash player. You can get flash by clicking on the logo </p><p><a href='http://www.adobe.com/go/getflashplayer'><img src='http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a></p>"); // Message shown when the user is not using flash or no flash file is provided
		update_option('welcome_pseudo_zoom_in', true);						// Use an empty box for the appearance animation of the announcement
		update_option('welcome_veil_appear', "show");						// Veil appearance animation
		update_option('welcome_veil_disappear', "hide");						// Veil disappearance animation
		update_option('welcome_anim_appear', "show");						// Announcement appearance animation
		update_option('welcome_anim_disappear', "hide");						// Announcement disappearance animation
}
register_activation_hook( __FILE__, 'welcome_activation')	;

function welcome_url() {
  return trailingslashit(get_settings('siteurl')) . 'wp-content/plugins/welcome';
}

function welcome_anims() { ?>
<link rel="stylesheet" type="text/css" href="<?php echo welcome_url(); ?>/welcome.css" />
<?php if (get_option('welcome_animation_yn')) { ?>
<script type="text/javascript" src="<?php echo welcome_url(); ?>/swfobject.js"></script>  
<script type="text/javascript">
		var flashvars = {};
		flashvars.them = " <?php echo get_option('welcome_animation_params'); ?>";
		var params = {};
		params.play = "false";
		params.menu = "false";
		params.quality = "high";
		params.allowScriptAccess = "always";
		params.bgcolor="<?php echo get_option('welcome_animation_bgcolor'); ?>";
		var attributes = {};
		attributes.id = "announcement";
		attributes.name = "announcement";
		swfobject.embedSWF("<?php echo get_option('welcome_animation_name'); ?>?r=<?php echo rand(0,999) ;?>", "HTML_announcement", "<?php echo get_option('welcome_animation_width'); ?>px", "<?php echo get_option('welcome_animation_height'); ?>px", "6.0.0", false, flashvars, params, attributes);
</script>
<?php }
?>
<script type="text/javascript" src="<?php echo welcome_url(); ?>/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo welcome_url(); ?>/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo welcome_url(); ?>/w_effects.js"></script>
<script type="text/javascript">
//contains the draft code for the welcome announcement animations

function w_center (element) {
	//this function centers a fixed or absolute positionned element on the screen	
	if (jQuery(element).css('position')=='absolute' || jQuery(element).css('position')=='fixed') {
		w_width = jQuery(element).width();
		w_height = jQuery(element).height();
		jQuery(element).css('left', Math.max( 0, (screen.availWidth - w_width)/2) +"px");
		jQuery(element).css('top', Math.max( 0, (screen.availHeight - w_height)/2) +"px");
	}
}

function w_play_flash(id) { 			
		//this function plays a flash announcement which is already visible on screen
			var movie_ready=false;
			while (movie_ready=="false"){
				if (document.getElementById(id).PercentLoaded() == 100) {movie_ready="true"; }  //what if the swf never finishes loading? anny idea?
			}
			document.getElementById(id).Play();  
}

function w_anims() {
	//identify which announcement is shown
	var w_announce = (document.getElementById('announcement')) ? "#announcement" : "#HTML_announcement";	
	var w_pseudo_element = (<?php echo (get_option('welcome_pseudo_zoom_in')!="") ? "true": "false" ; ?>) ? "#welcome_container" : "" ;
	//set veil and announcement opacity
	jQuery("#welcome_veil").css('opacity', 0.85);
	jQuery(w_announce).css('opacity',1);
	jQuery(w_pseudo_element).css('opacity',1);
	//position the elements to their final position whilst they are still undisplayed. At their creation, they should be set with the right dimensions
		w_center("#welcome_veil");
		w_center(w_announce);
		w_center(w_pseudo_element);
		if (w_pseudo_element != "") {
			jQuery(w_announce).css('left',jQuery(w_pseudo_element).css('left')); //fixes a positionning bug of objects in FF 3.0, bug not present in IE6..8
			jQuery(w_announce).css('top',jQuery(w_pseudo_element).css('top')); //fixes a positionning bug of objects in FF 3.0
		}

	//make the elements appear
	{//show the veil
		//this function shows on screen elements hidden by the property display set to none
		var pseudo_element="" ; var element = "#welcome_veil";
		var elt_to_animate = (pseudo_element != "") ? pseudo_element : element ;
		w_<?php echo get_option('welcome_veil_appear'); ?>(elt_to_animate,<?php echo get_option('welcome_fade_in_duration')*1000 ; ?>);
		//hide the pseudo_element if we used it
		if (pseudo_element!="") { 
			setTimeout ( function(){
				jQuery(pseudo_element).css('display','none');
				jQuery(element).css('display','block');
						}, <?php echo get_option('welcome_fade_in_duration')*1000 ; ?>);
		}
	}
	{//show the announcement
		//this function shows on screen elements hidden by the property display set to none
		var pseudo_element=w_pseudo_element ; var element = w_announce;
		var elt_to_animate = (pseudo_element != "") ? pseudo_element : element ;
		w_<?php echo get_option('welcome_anim_appear'); ?>(elt_to_animate,<?php echo get_option('welcome_fade_in_duration')*1000-10 ; ?>);
		//hide the pseudo_element if we used it
		if (pseudo_element!="") { 
			setTimeout ( function(){
				jQuery(element).css('display','block');
				jQuery(pseudo_element).css('display','none');
						}, <?php echo get_option('welcome_fade_in_duration')*1000 ; ?>);
		}
	}
	//if flash announcement, play it
	if (w_announce == "#announcement") {
		setTimeout ( function() {
					w_play_flash("announcement");
							  }, <?php echo get_option('welcome_fade_in_duration')*1000+1 ; ?>);
		}
	
	//make the elements disappear
	setTimeout ( function() {
		{//veil disappearance
			//this function hides from the screen elements with the property display set to none
			var pseudo_element = ""; var element = "#welcome_veil";
			var elt_to_animate = (pseudo_element != "") ? pseudo_element : element ;
			//hide the element if we use the pseudo_element
			if (pseudo_element!="") { 
					jQuery(pseudo_element).css('display','block');
					jQuery(element).css('display','none');
			}
			//execute the disappearance animation
			w_<?php echo get_option('welcome_veil_disappear'); ?>(elt_to_animate, <?php echo get_option('welcome_fade_out_duration')*1000 ; ?>);
		}
		{//announcement disappearance
			//this function hides from the screen elements with the property display set to none
			var pseudo_element = w_pseudo_element; var element = w_announce;
			var elt_to_animate = (pseudo_element != "") ? pseudo_element : element ;
			//hide the element if we use the pseudo_element
			if (pseudo_element!="") { 
					jQuery(pseudo_element).css('display','block');
					jQuery(element).css('display','none');
			}
			//execute the disappearance animation
			w_<?php echo get_option('welcome_anim_disappear'); ?>(elt_to_animate, <?php echo get_option('welcome_fade_out_duration')*1000 ; ?>);
		}				  
						  }, <?php echo (get_option('welcome_fade_in_duration')+get_option('welcome_animation_duration'))*1000 ; ?>);
	
	
	//That should be it!
}

function w_remove(){
	<?php if (get_option('welcome_animation_yn')) { ?>
	swfobject.removeSWF("announcement");
	<?php } ?>
}
if (typeof jQuery != 'undefined') { 	
			jQuery.noConflict();
			jQuery(window).load(function(){ //instead of jQuery(document).ready snippet, we use this in order to wait for the flash content to be ready beafore playing the anims.
						 w_anims();
					});
	} 
</script>

<?php }



function welcome_html() { 
$alternate_content="<h2> Welcome to ".get_bloginfo('name')."</h2><br/><p>This is the place to be<p><p>Pour voir l'annonce en vidéo, installez flash en cliquant sur <a href='http://www.adobe.com/go/getflashplayer'>
					<img src='http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' />";?>
<!-- <?php echo (int)get_option('welcome_cookie_expiration'); ?> -->
	<div id="welcome_veil" style="background-color:<?php echo get_option('welcome_veil_bgcolor') ; ?>;width:1300px;height:800px;">
	</div>
	<div id="welcome_container" style="background-color:<?php echo get_option('welcome_animation_bgcolor'); ?>; width:<?php echo get_option('welcome_animation_width'); ?>px; height:<?php echo get_option('welcome_animation_height'); ?>px";>
	</div>		
	<div id="HTML_announcement" style="background-color:<?php echo get_option('welcome_animation_bgcolor'); ?>; width:<?php echo get_option('welcome_animation_width'); ?>px; height:<?php echo get_option('welcome_animation_height'); ?>px";>
		<?php echo get_option('welcome_alternate_content'); ?>
	</div>		



<?php 
	}

	if (!isset($_COOKIE[get_option('welcome_cookie_name')]) && get_option('welcome_message_yn')) {
		$w_expire=(int)get_option('welcome_cookie_expiration')*60*60*24;
		setcookie(get_option('welcome_cookie_name'), get_option('welcome_cookie_expiration'),time()+$w_expire);
		add_action('wp_head', 'welcome_anims');
		add_action('wp_footer', 'welcome_html');
	}

?>