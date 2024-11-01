<?php
function welcome_appear_fx($name) {
	//Appearance effects Manifesto
	$w_appear_fxs['show']=array('name'=>'show','desc'=>'Expand from the top left corner');
	$w_appear_fxs['stage']=array('name'=>'stage','desc'=>'Instantly appear');
	$w_appear_fxs['fadeIn']=array('name'=>'fadeIn','desc'=>'Fade In progressively');
	$w_appear_fxs['slideFromLeft']=array('name'=>'slideFromLeft','desc'=>'slideFromLeft');
	$w_appear_fxs['slideFromRight']=array('name'=>'slideFromRight','desc'=>'slideFromRight');
	$w_appear_fxs['slideFromTop']=array('name'=>'slideFromTop','desc'=>'slideFromTop');
	$w_appear_fxs['slideFromBottom']=array('name'=>'slideFromBottom','desc'=>'slideFromBottom');
	$w_appear_fxs['zoomIn']=array('name'=>'zoomIn','desc'=>'zoomIn');
	$w_appear_fxs['shrinkIn']=array('name'=>'shrinkIn','desc'=>'shrinkIn');
	//End of Manifesto
	foreach ($w_appear_fxs as $w_fx) {
		$w_selected = (get_option($name)==$w_fx['name'])? "selected" : "" ;
		echo '<option value="'.$w_fx['name'].'" '.$w_selected.'>'.$w_fx['desc'].'</option>';
	}
}

function welcome_disappear_fx($name) {
	//DisAppearance effects Manifesto
	$w_disappear_fxs['hide']=array('name'=>'hide','desc'=>'hide');
	$w_disappear_fxs['offstage']=array('name'=>'offstage','desc'=>'offstage');
	$w_disappear_fxs['fadeOut']=array('name'=>'fadeOut','desc'=>'fadeOut');
	$w_disappear_fxs['slideToRight']=array('name'=>'slideToRight','desc'=>'slideToRight');
	$w_disappear_fxs['slideToLeft']=array('name'=>'slideToLeft','desc'=>'slideToLeft');
	$w_disappear_fxs['slideToBottom']=array('name'=>'slideToBottom','desc'=>'slideToBottom');
	$w_disappear_fxs['slideToTop']=array('name'=>'slideToTop','desc'=>'slideToTop');
	$w_disappear_fxs['zoomToInfinite']=array('name'=>'zoomToInfinite','desc'=>'zoomToInfinite');
	$w_disappear_fxs['shrinkToZero']=array('name'=>'shrinkToZero','desc'=>'shrinkToZero');
	$w_disappear_fxs['explode']=array('name'=>'explode','desc'=>'explode');
	//End of Manifesto
	foreach ($w_disappear_fxs as $w_fx) {
		$w_selected = (get_option($name)==$w_fx['name'])? "selected" : "" ;
		echo '<option value="'.$w_fx['name'].'" '.$w_selected.'>'.$w_fx['desc'].'</option>';
	}
}

function welcome_options_page () { 
 
	if ( 'true' == $_GET['updated'] ) {
	?>
	<div class="updated"><p><strong><?php _e('Options saved.'); ?></strong></p></div>
	<?php }
?>

<!--start-->
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { 
						new nicEditor({fullPanel : true}).panelInstance('w_alt_content');
						});
</script>

<!--end-->
<SCRIPT type=text/javascript>
	jQuery(function() {
		jQuery("#tabs").tabs();
	});
</SCRIPT>
  <h2>Welcome Announcement Options</h2>
  <p> Go through the sections to modify the different settings. </p>
  <br />

  <div class="w_form_wrap">
  <form method="post" action="options.php">
  
    <input type="submit" class="button-primary"
    value="<?php _e('Save Changes') ?>" />

  <p>Enable the Welcome announcement? <input  type="checkbox" size=40 name="welcome_message_yn"
     value="1" <?php echo (get_option('welcome_message_yn'))?"checked" :"" ;?>/></p>


  <div id="tabs">
  		<ul>
         <li><a href="#w_content">Announcement Content</a></li>
         <li><a href="#w_style">Announcement Style</a></li>
         <li><a href="#w_flow">Animation Flow</a></li>
         <li><a href="#w_veil">Veil Style</a></li>
         <li><a href="#w_cookie">Cookie</a></li>
        </ul>

    <div id="colorpicker201" class="colorpicker201"></div>
  <div id="w_cookie" class="block"> 

  <div class="field">
  <div class="label">Welcome cookie name</div>
  <input class="entry" type="text" size=40 name="welcome_cookie_name"
    value="<?php
      echo get_option('welcome_cookie_name'); ?>" />
  <div class="legend">Name of the welcome cookie. Reset this name if you want all your visitors to view your new animation.</div>
  </div>
  
  <div class="field">
  <div class="label">Welcome cookie duration</div>
  <input class="entry" type="text" size=40 name="welcome_cookie_expiration"
    value="<?php
      echo get_option('welcome_cookie_expiration'); ?>" /></td>
  <div class="legend">EXPIRATION of the cookie in DAYS. After this lapse, returning visitors will see the animation again.</div>
  </div>
  </div>

  <div id="w_content" class="block"> 

  <div class="field">
  <div class="label">Use Flash animation </div>
  <div class="entry"><input  type="checkbox" size=40 name="welcome_animation_yn"
     value="1" <?php echo (get_option('welcome_animation_yn'))?"checked" :"" ;?>/>
  </div>
  <div class="legend">Check this box if you want to use a flash animation. Otherwise, the announcement will show the alternate content (see below).</div>
  </div>
  
  <div class="field">
  <div class="label">Animation SWF file </div>
  <input class="entry" type="text" size=76 name="welcome_animation_name"
    value="<?php
      echo get_option('welcome_animation_name'); ?>" />
  <div class="legend">Name of the animation FILE. Type the full URL</div>
  </div>
  <div class = "field"><hr/></div>
  <div class="field">
  <div class="label">Animation parameters </div>
  <p>If you use parameters in your swf file, type here the content of the FlashVars parameter. You can modify the message of the default animation here. To modify the message of the default animation, write your message after the sign =. Eg: type <i>msg_Text=You've reached the right spot</i></p>
  <span style="background-color:white"><textarea id="w_anim_params" rows="3" cols="65" name="welcome_animation_params"><?php
      echo get_option('welcome_animation_params'); ?></textarea></span>
  </div>
  <div class = "field"><hr/></div>
  <div class="field">
  <div class="label">Alternate content </div>
  <p>Message shown when a animation is not provided or the visitor hasn't installed flash in his/her browser.</p>
  <span style="background-color:white"><textarea id="w_alt_content" rows="7" cols="65" name="welcome_alternate_content"><?php
      echo get_option('welcome_alternate_content'); ?></textarea></span>

  </div> 
  </div>

 
  <div id="w_style" class="block">

  <div class="field">
  <div class="label">Announcement width </div>
  <input class="entry" type="text" size=40 name="welcome_animation_width"
    value="<?php
      echo get_option('welcome_animation_width'); ?>" />
  <div class="legend">Width of the announcement in pixels. You can type <i>500</i> for a width of  of 500 pixels</div>
  </div> 
  
  <div class="field"> 
  <div class="label">Announcement width </div>
  <input class="entry" type="text" size=40 name="welcome_animation_height"
    value="<?php
      echo get_option('welcome_animation_height'); ?>" />
  <div class="legend">Height of the announcement in pixels. You can type <i>500</i> for an height of  of 500 pixels </div>
  </div> 
  
  <div class="field">
  <div class="label">Announcement Background Color </div>
  <input class="entry" type="text" size=40 name="welcome_animation_bgcolor" id="color_animation" onclick="showColorGrid2('color_animation','none');"
    value="<?php
      echo get_option('welcome_animation_bgcolor'); ?>" />
  <div class="legend">Background color of the animation. Use standard name or hex color code.  Click in the text zone to select the color you want.</div>
  </div> 
  </div>

  <div id="w_veil" class="block">
  
  <div class="field">
  <div class="label">Veil color </div>
  <input class="entry" type="text" size=40 name="welcome_veil_bgcolor" id="color_veil" onclick="showColorGrid2('color_veil','none');"
    value="<?php
      echo get_option('welcome_veil_bgcolor'); ?>" />
  <div class="legend">Color of the veil. Use standard name or hex color code.  Click in the text zone to select the color you want.</div>
  </div>

  <div class="field"> 
  <div class="label">Veil transparency </div>
  <input class="entry" type="text" size=40 name="welcome_veil_transparency"
    value="<?php
      echo get_option('welcome_veil_transparency'); ?>" />
  <div class="legend">Opacity of the veil. A decimal value between 0 and 1. Default is 0.85</div>
  </div>
  </div>
   
  <div id="w_flow" class="block">

  <div class="field">
  <div class="label">Appearance phase </div>
  <input class="entry" type="text" size=40 name="welcome_fade_in_duration"
    value="<?php
      echo get_option('welcome_fade_in_duration'); ?>" />
  <div class="legend">DURATION of the fading in phase in SECONDS.</div>
  </div>
  
  <div class="field">
  <div class="label">Announcement appearance </div>
  <select class="entry" name="welcome_anim_appear">
  	<?php welcome_appear_fx("welcome_anim_appear"); ?>
  </select>
  <div class="legend">Announcement appearance animation</div>
  </div>
    
  <div class="field">
  <div class="label">Veil appearance </div>
  <select class="entry" name="welcome_veil_appear">
        <?php welcome_appear_fx("welcome_veil_appear"); ?>
      </select>
  <div class="legend">Veil appearance animation</div>
  </div>
  <div class="field"><hr /></div>
  <div class="field">
  <div class="label">Main Animation phase </div>
  <input class="entry" type="text" size=40 name="welcome_animation_duration"
    value="<?php
      echo get_option('welcome_animation_duration'); ?>" />
  <div class="legend">DURATION of the welcome animation in SECONDS. </div>
  </div>
  <div class="field"><hr /></div>
  <div class="field">
  <div class="label">Disappearance phase </div>
  <input class="entry" type="text" size=40 name="welcome_fade_out_duration"
    value="<?php
      echo get_option('welcome_fade_out_duration'); ?>" />
  <div class="legend">DURATION of the fading out phase in SECONDS. THe fading out starts after the animation duration. </div>
  </div>

  <div class="field">
  <div class="label">Announcement disappearance </div>
  <select class="entry" name="welcome_anim_disappear">
		<?php welcome_disappear_fx("welcome_anim_disappear"); ?>
  </select>
  <div class="legend">Announcement disappearance animation</div>
  </div>
 
  <div class="field">
  <div class="label">Veil disappearance </div>
  <select class="entry" name="welcome_veil_disappear">
		<?php welcome_disappear_fx("welcome_veil_disappear"); ?>
  </select>
  <div class="legend">Veil disappearance animation</div>
  </div>
  
  <div class="field"><hr /></div>
  
  <div class="field">
  <div class="label">Pseudo Box </div>
  <div class="entry">
  <input type="checkbox" size=40 name="welcome_pseudo_zoom_in"
     value="1" <?php echo (get_option('welcome_pseudo_zoom_in'))?"checked" :"" ;?>/>
  </div>
  <div class="legend">Use an empty box for the appearance and disappearance animations of the announcement. Instead of animating the announcement itself, the plugin animates an empty box before or after playing the actual announcement. We recommend you use this function if you are using an animated announcement. It helps to avoid bugs in Firefox. This is extremely important if you want all your visitors to view the animation.</div>
  </div>
  
  </div>
  </div>

  <?php settings_fields('welcome_options'); ?>
  <p class="submit">
  <input type="submit" class="button-primary"
    value="<?php _e('Save Changes') ?>" />
  </p>
  </form>
  <p>You like it, or there is a bug, or you have suggestion, or maybe a donation? Tell us at the plugin page <a href="http://mbamba.fr/?page_id=60" title="welcome announcement plugin page">here</a></p>
  </div>


  <?php
  }
  ?>