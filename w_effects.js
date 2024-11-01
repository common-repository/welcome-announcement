/* 
Appearance effects. 
Before an appearance effect, an element should be hidden by css property display:none 
and already positionned to where it should appear. This works for absolutely positionned elements (css property position to absolute or fixed).
The job of the appearance effect is to set the element on screen (css property display:block) at the actual location with an entry effect.
The flow is: 1st save final position, 2nd set starting position and display at the starting position, 4th play the animation to the final position
*/
function w_show(element, duration) {//Expand from top left
	jQuery(element).show(duration);
}
function w_stage(element, duration) {//instantlyappear
	jQuery(element).css('display','block');
}
function w_fadeIn(element, duration) {
	var w_final_opacity = jQuery(element).css('opacity');
	jQuery(element).css({ opacity:0, display:'block' }) .fadeTo(duration, w_final_opacity);	
}
function w_slideFromLeft(element, duration) {
	var w_final = {left:jQuery(element).css('left'),opacity:jQuery(element).css('opacity')};
	jQuery(element).css({ left:0,opacity:0, display:'block' }) .animate(w_final,duration, "linear");	
}
function w_slideFromRight(element, duration) {
	var w_final = {left:jQuery(element).css('left'),opacity:jQuery(element).css('opacity')};
	jQuery(element).css({ left:'100%',opacity:0, display:'block' }) .animate(w_final,duration, "linear");	
}
function w_slideFromTop(element, duration) {
	var w_final = {top:jQuery(element).css('top'),opacity:jQuery(element).css('opacity')};
	jQuery(element).css({ top:0,opacity:0, display:'block' }) .animate(w_final,duration, "linear");	
}
function w_slideFromBottom(element, duration) {
	var w_final = {top:jQuery(element).css('top'),opacity:jQuery(element).css('opacity')};
	jQuery(element).css({ top:'100%',opacity:0, display:'block' }) .animate(w_final,duration, "linear");	
}
function w_zoomIn(element, duration) { //we zoom from the center of the screen. Doesn't run smoothly. Work on the easings
	var w_final = {top:jQuery(element).css('top'),
				   left:jQuery(element).css('left'),
				   width:jQuery(element).css('width'),
				   height:jQuery(element).css('height'),
				   opacity:jQuery(element).css('opacity')
				   };
	jQuery(element).css({ top:screen.availHeight/2,
						  left:screen.availWidth/2,
						  width:0,
						  height:0,
						  opacity:0, 
						  display:'block' 
					    }) .animate(w_final,duration, "linear");
		
}

function w_shrinkIn(element, duration) { 
	var w_final = {top:jQuery(element).css('top'),
				   left:jQuery(element).css('left'),
				   width:jQuery(element).css('width'),
				   height:jQuery(element).css('height'),
				   opacity:jQuery(element).css('opacity')
				   };
	jQuery(element).css({ top:-0.15*screen.availHeight/2,
				   		  left:-0.15*screen.availWidth/2,
						  width:1.3*screen.availWidth,
						  height:1.3*screen.availHeight,
						  opacity:0, 
						  display:'block' 
					    }) .animate(w_final,duration, "easeOutBounce");
		
}

/*==============================================*/
/*
Disappearance effects.
The job is to take a currently visible element off the screen. At the end, the object should have the css property display set to hidden.
*/

function w_hide(element, duration) {//shrink to top left
	jQuery(element).hide(duration);
}
function w_offstage(element, duration) {//instantly disappear
	jQuery(element).css('display','none');
}

function w_fadeOut(element, duration) {
	jQuery(element).fadeOut(duration);
}

function w_slideToRight(element, duration) {
	jQuery(element).animate ({ left:'100%', opacity:0 }, duration, "linear", function(){jQuery(element).css('display', 'none');});
}
function w_slideToLeft(element, duration) {
	//jQuery(element).animate ({ left:'-100%', opacity:0 }, duration, "linear", function(){jQuery(element).css('display', 'none');});
	jQuery(element).animate ({ left:-screen.availWidth, opacity:0 }, duration, "linear", function(){jQuery(element).css('display', 'none')});
}
function w_slideToBottom(element, duration) {
	jQuery(element).animate ({ top:'100%', opacity:0 }, duration, "linear", function(){jQuery(element).css('display', 'none')});	
}
function w_slideToTop(element, duration) {
	jQuery(element).animate ({ top:-screen.availHeight, opacity:0 }, duration, "linear", function(){jQuery(element).css('display', 'none')});	
}
function w_zoomToInfinite(element, duration) { //we zoom out of the borders of the screen
	w_magnify= (1.3*jQuery(document).height())/jQuery(element).height();
	var w_final = {top:-0.15*screen.availHeight,
				   left:-0.15*screen.availWidth,
				   width:1.3*screen.availWidth,
				   height:1.3*screen.availHeight,
				   fontSize: parseInt(jQuery(element).css('fontSize'))*w_magnify,
				   opacity:0
				   };
	jQuery(element).animate(w_final,duration, "linear", function(){jQuery(element).css('display', 'none')});
}
function w_shrinkToZero(element, duration) { 
	var w_final = {top:screen.availHeight/2,
				   left:screen.availWidth/2,
				   width:0,
				   height:0,
				   fontSize: 0,
				   opacity:0
				   };
	jQuery(element).animate(w_final,duration, "linear", function(){jQuery(element).css('display', 'none')});
}

function w_explode(element, duration){//we zoom out of the borders of the screen//Doesn't work well when border width not set explicitly in px.
	var w_percent=0.1; //initial % of width/height covered by each blank space
	var w_magnify=1.3;    //magnification factor
	var duration=1500;  //duration of the explosion
	
	var w_curr_elt={top: parseInt(jQuery(element).css('top')),
					left: parseInt(jQuery(element).css('left')),
					height: jQuery(element).height(),
					width: jQuery(element).width(),
					zIndex: jQuery(element).css('zIndex')};
					
	
	var w_final_elt={height: w_curr_elt.height*w_magnify,
				 	 width: w_curr_elt.width*w_magnify,
				 	 top: w_curr_elt.top - w_curr_elt.height*(w_magnify-1)/2,
					 left: w_curr_elt.left - w_curr_elt.width*(w_magnify-1)/2,
					 fontSize: parseInt(jQuery(element).css('fontSize'))*w_magnify
					 };
	
	var w_pce={height: w_curr_elt.height*(1-2*w_percent)/3,
			   width: w_curr_elt.width*(1-2*w_percent)/3};
	var w_v_borders= isNaN(parseInt(jQuery(element).css('borderLeftWidth')))?0:parseInt(jQuery(element).css('borderLeftWidth'))
					+isNaN(parseInt(jQuery(element).css('borderRigthWidth')))?0:parseInt(jQuery(element).css('borderRigthWidth'));
	
	var w_h_borders= isNaN(parseInt(jQuery(element).css('borderTopWidth')))?0:parseInt(jQuery(element).css('borderTopWidth'))
					+isNaN(parseInt(jQuery(element).css('borderBottomWidth')))?0:parseInt(jQuery(element).css('borderBottomWidth'));
	
	var w_init_h1={height: (w_curr_elt.height-3*w_pce.height)/2,
				   width: w_curr_elt.width+w_v_borders+4,
				   top: w_curr_elt.top +w_pce.height,
				   left: w_curr_elt.left-2,
				   zIndex: w_curr_elt.zIndex};	
	var w_final_h1={height: (w_final_elt.height-3*w_pce.height)/2,
					width: w_final_elt.width+w_v_borders+4,
					top: w_final_elt.top +w_pce.height,
					left: w_final_elt.left-2
					};
	var w_init_h2={height: (w_curr_elt.height-3*w_pce.height)/2,
				   width: w_curr_elt.width+w_v_borders+4,
				   top: w_init_h1.top +w_init_h1.height+w_pce.height,
				   left: w_curr_elt.left-2,
				   zIndex: w_curr_elt.zIndex};
	var w_final_h2={height: (w_final_elt.height-3*w_pce.height)/2,
					width: w_final_elt.width+w_v_borders+4,
					top: w_final_h1.top +w_final_h1.height+w_pce.height,
					left: w_final_elt.left-2
					};

	var w_init_v1={width: ((w_curr_elt.width-3*w_pce.width)/2),
				   height: (w_curr_elt.height+w_h_borders+4),
				   left: (w_curr_elt.left +w_pce.width),
				   top: (w_curr_elt.top-2),
				   zIndex: w_curr_elt.zIndex};	
	var w_final_v1={width: (w_final_elt.width-3*w_pce.width)/2,
					height: w_final_elt.height+w_h_borders+4,
					left: w_final_elt.left +w_pce.width,
					top: w_final_elt.top-2
					};
	var w_init_v2={width: (w_curr_elt.width-3*w_pce.width)/2,
				   height: w_curr_elt.height+w_h_borders+4,
				   left: w_init_v1.left +w_init_v1.width +w_pce.width,
				   top: w_curr_elt.top-2,
				   zIndex: w_curr_elt.zIndex};	
	var w_final_v2={width: (w_final_elt.width-3*w_pce.width)/2,
					height: w_final_elt.height+w_h_borders+4,
					left: w_final_v1.left +w_final_v1.width +w_pce.width,
					top: w_final_elt.top-2
					};

	jQuery("body").append('<div id="w_exp_h1" style="position:fixed;background-color:white;">&nbsp;</div>'); jQuery("#w_exp_h1").css(w_init_h1);
	jQuery("body").append('<div id="w_exp_h2" style="position:fixed;background-color:white;">&nbsp;</div>'); jQuery("#w_exp_h2").css(w_init_h2);
	jQuery("body").append('<div id="w_exp_v1" style="position:fixed;background-color:white;">&nbsp;</div>'); jQuery("#w_exp_v1").css(w_init_v1);
	jQuery("body").append('<div id="w_exp_v2" style="position:fixed;background-color:white;">&nbsp;</div>'); jQuery("#w_exp_v2").css(w_init_v2);
	
	jQuery(element).animate(w_final_elt,duration,"easeInBounce", function(){jQuery(element).css('display', 'none')});
	jQuery("#w_exp_h1").animate(w_final_h1,duration,"easeInBounce", function(){jQuery("#w_exp_h1").css('display', 'none')});
	jQuery("#w_exp_h2").animate(w_final_h2,duration,"easeInBounce", function(){jQuery("#w_exp_h2").css('display', 'none')});
	jQuery("#w_exp_v1").animate(w_final_v1,duration,"easeInBounce", function(){jQuery("#w_exp_v1").css('display', 'none')});
	jQuery("#w_exp_v2").animate(w_final_v2,duration,"easeInBounce", function(){jQuery("#w_exp_v2").css('display', 'none')});
	
}
