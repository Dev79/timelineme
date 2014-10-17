<?php
/*
* Theme Name: Time Line Me - Timeline WordPress Theme
* Theme Author: Bethel Goka / #.com
*
* Description: Time Line Me Wordpress Theme is a next generation 
* website, developed both on the edge of technology and design. 
* The built-in voice control makes it both revolutionary and at the same time super intuitive to use. 
*
* Version: 1.2 
*/
?>


<?php
$ab_tf_body_typography = of_get_option('body_typography');
$ab_tf_title_typography = of_get_option('title_typography');
$ab_tf_button_typography = of_get_option('button_typography');
$ab_tf_menu_typography = of_get_option('menu_typography');
$ab_tf_body_color_scheme = of_get_option('body-color-scheme', 'turquoise');
if($ab_tf_body_color_scheme == 'turquoise'){
	$color = '#52ccb3';
	$bacgroundcolor = '#247967';
	$bacgroundcolora = '82,204,179';
}elseif($ab_tf_body_color_scheme == 'greensea'){
	$color = '#4eb7a3';
	$bacgroundcolor = '#157260';
	$bacgroundcolora = '78,183,163';
}elseif($ab_tf_body_color_scheme == 'emerald'){
	$color = '#5fd892';
	$bacgroundcolor = '#28a45c';
	$bacgroundcolora = '95,216,146';
}elseif($ab_tf_body_color_scheme == 'nephritis'){
	$color = '#4fb77c';
	$bacgroundcolor = '#25804c';
	$bacgroundcolora = '79, 183, 124';
}elseif($ab_tf_body_color_scheme == 'peterriver'){
	$color = '#65b1e4';
	$bacgroundcolor = '#367aa6';
	$bacgroundcolora = '101,177,299';
	
}elseif($ab_tf_body_color_scheme == 'belizehole'){
	$color = '#5d9ec9';
	$bacgroundcolor = '#256690';
	$bacgroundcolora = '93,158,201';
}elseif($ab_tf_body_color_scheme == 'amethyst'){
	$color = '#b281c7';
	$bacgroundcolor = '#814999';
	$bacgroundcolora = '178,129,199';
}elseif($ab_tf_body_color_scheme == 'wisteria'){
	$color = '#a871c1';
	$bacgroundcolor = '#814999';
	$bacgroundcolora = '168,113,193';
}elseif($ab_tf_body_color_scheme == 'wetasphalt'){
	$color = '#657585';
	$bacgroundcolor = '#394b5d';
	$bacgroundcolora = '101,117,133';
}elseif($ab_tf_body_color_scheme == 'midnightblue'){
	$color = '#566576';
	$bacgroundcolor = '#1b3046';
	$bacgroundcolora = '86,101,108';
}elseif($ab_tf_body_color_scheme == 'sunflower'){
	$color = '#f4d248';
	$bacgroundcolor = '#a3860f';
	$bacgroundcolora = '244,210,72';
}elseif($ab_tf_body_color_scheme == 'orange'){
	$color = '#f6b44a';
	$bacgroundcolor = '#cd6f00';
	$bacgroundcolora = '246,180,74';
}elseif($ab_tf_body_color_scheme == 'carrot'){
	$color = '#ec9e57';
	$bacgroundcolor = '#d56f12';
	$bacgroundcolora = '236,158,87';
}elseif($ab_tf_body_color_scheme == 'pumpkin'){
	$color = '#dd7d3d';
	$bacgroundcolor = '#a84908';
	$bacgroundcolora = '221,125,60';
}elseif($ab_tf_body_color_scheme == 'alizarin'){
	$color = '#ee776b';
	$bacgroundcolor = '#b83f33';
	$bacgroundcolora = '238,119,107';
}elseif($ab_tf_body_color_scheme == 'pomegranate'){
	$color = '#d0685e';
	$bacgroundcolor = '#8b2a21';
	$bacgroundcolora = '208,104,94';
}elseif($ab_tf_body_color_scheme == 'concrete'){
	$color = '#aebbbb';
	$bacgroundcolor = '#697878';
	$bacgroundcolora = '174,187,187';
}elseif($ab_tf_body_color_scheme == 'asbestos'){
	$color = '#96a2a2';
	$bacgroundcolor = '#717d7d';
	$bacgroundcolora = '150,162,162';
}
?> 
<style>

body, input, #comment{
	font-family:<?php echo $ab_tf_body_typography['face'];?>, Geneva, sans-serif; 
	font-size:<?php echo $ab_tf_body_typography['size'];?>;
}
.dl-menuwrapper li a{
	font-family:<?php echo $ab_tf_menu_typography['face'];?>, Geneva, sans-serif; 
	font-size:<?php echo $ab_tf_menu_typography['size'];?>;
}
.nav-header{
	font-family:<?php echo $ab_tf_menu_typography['face'];?>, Geneva, sans-serif; 
}
.icon-soc-container a, .woocommerce .icon-soc-container{
	 font-family:<?php echo $ab_tf_body_typography['face'];?>, Geneva, sans-serif; 
}
a {
	font-family:<?php echo $ab_tf_body_typography['face'];?>, Geneva, sans-serif; 
	color:<?php echo $color;?>;
}
.gglass .hover-effect a, .gglass .hover-effect a:hover   {
	color:<?php echo $color;?>!important;
}
.content-title, .content-title a, .comment-reply-title, .h-style h2,  h2.wpb_heading {
	font-weight:<?php echo $ab_tf_title_typography['style'];?>!important;
	font-family:<?php echo $ab_tf_title_typography['face'];?>, Geneva, sans-serif!important; 
	font-size:<?php echo $ab_tf_title_typography['size'];?>;
}
.gglass .share-action, .gglass .sbleft .gray-container a, .gglass .sbright .gray-container a, .gglass .widget_calendar #wp-calendar th, .gglass .content-title, .gglass .content-title a ,.gglass #reply-title, .gglass .relatedcontent a, .iscomm .gglass a, .gglass .addcomm a{
	color:<?php echo $color;?>;
}
.gglass.slider{
	background-color:rgba(<?php echo $bacgroundcolora;?>, 0.8)!important;
}
.gglass .tt-arrow-dot{
	background-color:rgba(<?php echo $bacgroundcolora;?>, 0.2)!important;
}
.gglass .tt-arrow-dot:before{
	background-color:rgba(<?php echo $bacgroundcolora;?>, 1)!important;
}
.gglass .tt-arrow-dot:after{
	background-color:rgba(<?php echo $bacgroundcolora;?>, 0.1)!important;

}
.wpb_wrapper h2.post-title a{
	font-weight:<?php echo $ab_tf_title_typography['style'];?>!important;
	font-family:<?php echo $ab_tf_title_typography['face'];?>, Geneva, sans-serif!important; 
}
.flex-direction-nav .flex-next, .flex-direction-nav .flex-prev, .navcal-p .widget_shopping_cart .button {
	color:<?php echo of_get_option('color_button_text');?>!important;
}
.wpb_button, a.fland-button {
	font-family:<?php echo $ab_tf_button_typography['face'];?>, Geneva, sans-serif!important; 
	font-size:<?php echo $ab_tf_button_typography['size'];?>!important;
	color:<?php echo $ab_tf_button_typography['color'];?>!important;
}
.pagination a:hover, .pagination .current, .dl-menuwrapper button, .navkey:hover, .date-time:hover{
	background-color:rgba(<?php echo $bacgroundcolora;?>, 0.8)!important;
}
.dl-menuwrapper button, .gglass .timedate{
	background-color:rgba(<?php echo $bacgroundcolora;?>, 1)!important;
}
.dl-menuwrapper button:hover{
	background-color:<?php echo $bacgroundcolor;?>!important;
}
.nav-header, .dl-menuwrapper li.dl-back > a{
	background: rgba(<?php echo $bacgroundcolora;?>,0.1);
	background:-moz-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%); 
	background:-webkit-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%) ; 
	background:-o-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:-ms-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
}
.no-touch .dl-menuwrapper li a:hover {
	background: rgba(<?php echo $bacgroundcolora;?>,0.1);
	background:-moz-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%); 
	background:-webkit-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:-o-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%); 
	background:-ms-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.9) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
}
.menu-header-search{
	background: rgba(<?php echo $bacgroundcolora;?>,0.1);
	background:-moz-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.3) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%); 
	background:-webkit-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.3) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%) ; 
	background:-o-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.3) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:-ms-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.3) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.3) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	
}
.dl-menuwrapper li.dl-back > a:hover{
	background: rgba(<?php echo $bacgroundcolora;?>,0.1);
	background:-moz-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%); 
	background:-webkit-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%) ; 
	background:-o-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:-ms-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
}
.dl-menuwrapper .selected-nav:after, .dl-menuwrapper .current-menu-item:after, .dl-menuwrapper .current-menu-parent:after{
	background: rgba(<?php echo $bacgroundcolora;?>,0.1);
	background:-moz-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%); 
	background:-webkit-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%) ; 
	background:-o-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:-ms-linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
	background:linear-gradient(left, rgba(<?php echo $bacgroundcolora;?>,0.0) 0%,rgba(<?php echo $bacgroundcolora;?>,0.5) 50%, rgba(<?php echo $bacgroundcolora;?>,0.0) 100%);
}
 .flex-direction-nav .flex-next, .flex-direction-nav .flex-prev, .hover-effect .icon-search, .h-style .mask, .h-style h2, .h-style p, .h-style a.info   { 
	-webkit-transition: all <?php echo of_get_option('rollover-duration', '1' ); ?>s ease;
	-moz-transition: all <?php echo of_get_option('rollover-duration', '1' ); ?>s ease; 
	-o-transition: all <?php echo of_get_option('rollover-duration', '1' ); ?>s ease; 
	-ms-transition: all <?php echo of_get_option('rollover-duration', '1' ); ?>s ease; 
	transition: all <?php echo of_get_option('rollover-duration', '1' ); ?>s ease;
}
.flex-direction-nav .flex-next:hover, .flex-direction-nav .flex-prev:hover {
	-webkit-transition: all <?php echo of_get_option('rollout-duration', '1' ); ?>s ease;
	-moz-transition: all <?php echo of_get_option('rollout-duration', '1' ); ?>s ease; 
	-o-transition: all <?php echo of_get_option('rollout-duration', '1' ); ?>s ease; 
	-ms-transition: all <?php echo of_get_option('rollout-duration', '1' ); ?>s ease; 
	transition: all <?php echo of_get_option('rollout-duration', '1' ); ?>s ease;
}
 
</style>
<script>
//Chnaging rgb to hex
//==================================================
  var hex2Rgb = function(hex){
  var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})|([a-f\d]{1})([a-f\d]{1})([a-f\d]{1})$/i.exec(hex);
  return result ? {        
    r: parseInt(hex.length <= 4 ? result[4]+result[4] : result[1], 16),
    g: parseInt(hex.length <= 4 ? result[5]+result[5] : result[2], 16),
    b: parseInt(hex.length <= 4 ? result[6]+result[6] : result[3], 16),
    toString: function() {
      var arr = [];
      arr.push(this.r);
      arr.push(this.g);
      arr.push(this.b);
      return "rgba(" + arr.join(",") + ",0.9)";
    }
  } : null;
};
//Chnaging color of the timetravel path
//==================================================
jQuery(document).ready(function($){
	var thecolor = hex2Rgb("<?php  echo of_get_option('color_gl', '#000000');?>");
	jQuery("head").append("<style>.timelinepath:before{background: "+thecolor+"; background: -moz-linear-gradient(top,  rgba(0, 0, 0, 0.0) 0%, "+thecolor+" 100%); background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0, 0, 0, 0.0)), color-stop(100%,"+thecolor+")); background: -webkit-linear-gradient(top,  rgba(0, 0, 0, 0.0) 20%,"+thecolor+" 100%); background: -o-linear-gradient(top,  rgba(0, 0, 0, 0.0) 0%,"+thecolor+" 100%); background: -ms-linear-gradient(top,  rgba(0, 0, 0, 0.0) 0%,"+thecolor+" 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='rgba(0, 0, 0, 0.0)', endColorstr='"+thecolor+"',GradientType=0 );}</<style>");
})
</script>
<?php
if(of_get_option('active-backgroud-yt', '0' ) == '1'){?>
		<script>
		//Youtube API
		//==================================================
        jQuery( document ).ready( function($){
             $('#ytbgvideo').tubular({videoId: '<?php echo of_get_option('yt-bg-id', 'ab0TSkLe-E0' ); ?>', mute: <?php echo of_get_option('yt-bg-mute', 'true' ); ?> , start: '<?php echo of_get_option('yt-bg-start', '0' ); ?>', repeat:<?php echo of_get_option('yt-bg-repeat', 'true' ); ?>, teaser: <?php echo of_get_option('yt-bg-type', 'false' ); ?>}); 
        });
        </script><?php 
	
}?>
<?php 
global $ab_tf_post_showfbcomments, $ab_tf_post_showdscomments;
if($ab_tf_post_showdscomments == 'on' && is_single() || $ab_tf_post_showdscomments == 'on' && is_page() ){?> 
	<script>
		//Disqus API
		//==================================================
		jQuery(document).ready(function ($) {
			var disqus_shortname = '<?php echo of_get_option('disqus-id', '' ); ?>'; // required: replace example with your forum shortname
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();	
		});
		var disqus_shortname = '<?php echo of_get_option('disqus-id', '' ); ?>'; // required: replace example with your forum shortname
		(function () {
			var s = document.createElement('script'); s.async = true;
			s.type = 'text/javascript';
			s.src = '//' + disqus_shortname + '.disqus.com/count.js';
			(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		}());
	</script>
<?php };?>
<script>
jQuery(document).ready(function($){
	//Menu init
	//==================================================
	$( '#dl-menu' ).dlmenu({
		animationClasses : { classin : 'dl-animate-in-3', classout : 'dl-animate-out-3' }
	});
	//Add sound on menu and share buttons
	//==================================================
	$(".menu-item").each(function(i) {
		if (i != 0) { 
		var audio = document.getElementsByTagName("audio")[0];
		  $('#beep-two')
			.clone()
			.attr("id", "beep-two" + i)
			.appendTo($(this).parent().parent()); 
		}
		$(this).data("beeper", i);
		}).mouseenter(function() {
			$("#beep-two" + $(this).data("beeper"))[0].play();
			$("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
	});
	$(".timedate").each(function(i) {
    if (i != 0) { 
		var audio = document.getElementsByTagName("audio")[0];
		$('#beep-two')
			.clone()
			.attr("id", "beep-two" + i)
			.appendTo($(this).parent()); 
		}
		$(this).data("beeper", i);
	  }).mouseenter(function() {
			$("#beep-two" + $(this).data("beeper"))[0].play();
			$("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
	});
	$(".dl-menuwrapper button").each(function(i) {
    if (i != 0) { 
		var audio = document.getElementsByTagName("audio")[0];
		$('#beep-two')
			.clone()
			.attr("id", "beep-two" + i)
			.appendTo($(this).parent()); 
		}
		$(this).data("beeper", i);
	  }).mouseenter(function() {
			$("#beep-two" + $(this).data("beeper"))[0].play();
			$("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
	});
	$(".navkey").each(function(i) {
    if (i != 0) { 
		var audio = document.getElementsByTagName("audio")[0];
		$('#beep-two')
			.clone()
			.attr("id", "beep-two" + i)
			.appendTo($(this).parent()); 
		}
		$(this).data("beeper", i);
	  }).mouseenter(function() {
			$("#beep-two" + $(this).data("beeper"))[0].play();
			$("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
	});
	$(".date-time").each(function(i) {
    if (i != 0) { 
		var audio = document.getElementsByTagName("audio")[0];
		$('#beep-two')
			.clone()
			.attr("id", "beep-two" + i)
			.appendTo($(this).parent()); 
		}
		$(this).data("beeper", i);
	  }).mouseenter(function() {
			$("#beep-two" + $(this).data("beeper"))[0].play();
			$("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
	});
	
	
		
	
	$("#beep-two").attr("id", "beep-two0");
	//Share buttons
	//==================================================
	$( ".share-box" ).hover(
		function() {
			$(".bespoke-active").addClass('openshare');
			$(this).toggleClass('open');

		}, function() {
			$(".bespoke-slide").removeClass('openshare');
			$(this).removeClass( "open" ).delay( 1800 );
		}
	);
	//Show / hide loading and elements
	//==================================================
	jQuery('.inifiniteLoaderP').removeClass('fadeOutDown').addClass("fadeInUp");
	jQuery('.inifiniteLoaderP').removeClass('fadeInUp').addClass("fadeOutDown");
		setTimeout(function(){
		jQuery('.tt-voice-c').removeClass('fadeOutDown').addClass("fadeInUp");
	},200);
	setTimeout(function(){
		jQuery('.logo').removeClass('fadeOutDown').addClass("fadeInUp");
	},1400);
	setTimeout(function(){
		jQuery('.tt-bottom-nav').removeClass('fadeOutDown').addClass("fadeInUp");
	},400);
	setTimeout(function(){
		jQuery('.copyrholder').removeClass('fadeOutDown').addClass("fadeInUp");
	},1200);
	setTimeout(function(){
		jQuery('.date-time').removeClass('fadeOutDown').addClass("fadeInUp");
	},600);
	setTimeout(function(){
		jQuery('.numpostinfi').removeClass('fadeOutDown').addClass("fadeInUp");
	},800);
	setTimeout(function(){
		jQuery('.breadcrumbs').removeClass('fadeOutDown').addClass("fadeInUpt");
	},800);
	setTimeout(function(){
		jQuery('.dl-menuwrapper').removeClass('fadeOutDown').addClass("fadeInUp");
	},1000);
	setTimeout(function(){
		jQuery('.p-position').removeClass('fadeOutDown').addClass("fadeInUp");
	},1200);
	
	//For touch devices
	//==================================================
	$('a').live('touchend', function(e) {
		var el = $(this);
		var link = el.attr('href');
	});
	//pretty Photo settings( ! Don't change )
	//==================================================
	$("a[rel^='prettyPhoto']").prettyPhoto({theme: 'dark_square', allow_resize: false,});
	$("a[rel^='prettyPhotoImages']").prettyPhoto({theme: 'dark_square',allow_resize: true});	
	//Image hover animation
	//==================================================
	'strict mode';
	if(Modernizr.csstransforms3d !== false){
		var imgholder = document.getElementsByClassName("hover-effect");
		for(var i = 0, j=imgholder.length; i<j; i++){
			imgholder[i].addEventListener("mouseover", function(){
				var imgtoanimate = this.getElementsByTagName("img")[0];
				if(imgtoanimate){						   
				move(imgtoanimate)
				.rotate(<?php echo of_get_option('rollover-rotate', '10' ); ?>)
				.scale(<?php echo of_get_option('rollover-scale', '2' ); ?>)
				.duration('<?php echo of_get_option('rollover-duration', '1' ); ?>s')
				.end();
				}
			});
			imgholder[i].addEventListener("mouseout", function(){
				var imgtoanimate = this.getElementsByTagName("img")[0];	
				if(imgtoanimate){							   
				move(imgtoanimate)
				.rotate(<?php echo of_get_option('rollout-rotate', '0' ); ?>)
				.scale(<?php echo of_get_option('rollout-scale', '1' ); ?>)
				.duration('<?php echo of_get_option('rollout-duration', '1' ); ?>s')
				.end();
				}
			});
		}
 	}
	//Menu search ico
	//==================================================
	$('#s').data('holder',$('#s').attr('placeholder'));
	//$("body").click(function() {
	$('#s').focusin(function(){
		$("#searchform").addClass("hidesico");
		$(this).attr('placeholder','');
	});
	$('#s').focusout(function(){
		if(!$(this).val() || $(this).val()!=''  ){
			$("#searchform").removeClass("hidesico");
		}
		$(this).attr('placeholder',$(this).data('holder'));
	});

	//Video background
	//==================================================
	<?php if( of_get_option('active-backgroud-video', 'no entry' ) == '1'){ ?> 
		'strict mode';
		var screenIndex = 1,
			numScreens = $('.screen').length,
			isTransitioning = false,
			transitionDur = 1000,
			BV,
			videoPlayer,
			isTouch = Modernizr.touch,
			$bigImage = $('.big-image'),
			$window = $(window);
		if (!isTouch) {
			BV = new $.BigVideo({forceAutoplay:isTouch});
			BV.init();
			showVideo();
			BV.getPlayer().addEvent('loadeddata', function() {
				onVideoLoaded();
			});
		}
		function showVideo() {
			BV.show($('#screen-'+screenIndex).attr('data-video'),{ambient:true});
		}
		function onVideoLoaded() {
			$('#screen-'+screenIndex).find('.big-image').transit({'opacity':0},500);
		}
		function onTransitionComplete() {
			isTransitioning = false;
			if (!isTouch) {
				$('#big-video-wrap').css('left',0);
				showVideo();
			}
		}
		function adjustImagePositioning() {
			$bigImage.each(function(){
				var $img = $(this),
					img = new Image();
				img.src = $img.attr('src');
		
				var windowWidth = $window.width(),
					windowHeight = $window.height(),
					r_w = windowHeight / windowWidth,
					i_w = img.width,
					i_h = img.height,
					r_i = i_h / i_w,
					new_w, new_h, new_left, new_top;
		
				if( r_w > r_i ) {
					new_h   = windowHeight;
					new_w   = windowHeight / r_i;
				}
				else {
					new_h   = windowWidth * r_i;
					new_w   = windowWidth;
				}
		
				$img.css({
					width   : new_w,
					height  : new_h,
					left    : ( windowWidth - new_w ) / 2,
					top     : ( windowHeight - new_h ) / 2
				});
		
			});
		
		}
	<?php }?>
	

	//Clock settings
	//==================================================
	function update(widget_id, time_format, date_format) {
		var months = new Array("<?php echo of_get_option('tr-months-jan', 'January' );?>", "<?php echo of_get_option('tr-months-feb', 'February' );?>", "<?php echo of_get_option('tr-months-mar', 'March' );?>", "<?php echo of_get_option('tr-months-apr', 'April' );?>", "<?php echo of_get_option('tr-months-may', 'May' );?>", "<?php echo of_get_option('tr-months-jun', 'June' );?>", "<?php echo of_get_option('tr-months-jul', 'July' );?>", "<?php echo of_get_option('tr-months-aug', 'August' );?>", "<?php echo of_get_option('tr-months-sep', 'September' );?>", "<?php echo of_get_option('tr-months-oct', 'October' );?>", "<?php echo of_get_option('tr-months-nov', 'November' );?>", "<?php echo of_get_option('tr-months-dec', 'December' );?>"),
		ampm = " AM",
		now = new Date(),
		hours = now.getHours(),
		minutes = now.getMinutes(),
		seconds = now.getSeconds(),
		$date = jQuery("#" + widget_id + " .tt-b-date"),
		$day = jQuery("#" + widget_id + " .tt-b-day"),
		$month = jQuery("#" + widget_id + " .tt-b-month"),
		$time = jQuery("#" + widget_id + " .tt-b-time");
		$ampa = jQuery("#" + widget_id + " .tt-b-amp");
	
		if (date_format != "none") {
		var currentTime = new Date(),
			year = currentTime.getFullYear(),
			month = currentTime.getMonth(),
			day = currentTime.getDate();
			
		if (date_format == "long") {
			$date.text(months[month] + " " + day + ", " + year);
		}
		else if (date_format == "medium") {
			$day.text(day);
			$month.text(months[month].substring(0, 3));
			$date.text(year);
		}
		else if (date_format == "short") {
			$date.text((month + 1) + "/" + day + "/" + year);
		}
		else if (date_format == "european") {
			$date.text(day + "/" + (month + 1) + "/" + year);
		}
		}	
		if (time_format != "none") {
		if (hours >= 12) {
			ampm = " PM";
		}
			
		if (minutes <= 9) {
			minutes = "0" + minutes;
		}
		   
		if (seconds <= 9) {
			seconds = "0" + seconds;
		}
			
		if ((time_format == "12-hour") || (time_format == "12-hour-seconds")) {
			if (hours > 12) {
			hours = hours - 12;
			}
			
			if (hours == 0) {
			hours = 12;
			}
			
			if (time_format == "12-hour-seconds") {
			$time.text(hours + ":" + minutes + ":" + seconds);
			$ampa.text(ampm);
			}
			else {
			$time.text(hours + ":" + minutes);
			$ampa.text(ampm);
			
			}
		}
		else if (time_format == "24-hour-seconds") {
			$time.text(hours + ":" + minutes  + ":" + seconds);
		}
		else {
			$time.text(hours + ":" + minutes);
		}
		}
		if ((date_format != "none") || (time_format != "none")) {
		setTimeout(function() {
			update(widget_id, time_format, date_format);
		}, 1000);
		}
	}
	update('footer-time', '<?php echo of_get_option('clock-style', '12-hour' );?>', 'medium');
});
		 

</script>

<?php if(of_get_option('yt-bg-cotrols') == "on"  && of_get_option('active-backgroud-yt') == 1 ){?>
<script>
//Youtube controls
//==================================================
jQuery(document).ready(function($){
	document.getElementById('hide-content').addEventListener('click', hidecontent);
	var iscontenthiden = 0;
	function hidecontent(){
		if(iscontenthiden == 0 ){
			$('.timelinepath').delay(300).addClass('addopahide').delay(300).removeClass('remopa');
			$('#main').delay(300).addClass('addopahide').delay(300).removeClass('remopa');
			iscontenthiden = 1;
		}else{
			$('.timelinepath').delay(300).addClass('remopa').delay(300).removeClass('addopahide');
			$('#main').delay(300).addClass('remopa').delay(300).removeClass('addopahide');
			iscontenthiden = 0;
		}
	}
});
</script>       
<div class="bottom-video-nav <?php if(of_get_option('active-dglass') == 1){?>dglassstyle<?php }?>">
	<div>
    	<i id="hide-content" class="icon-resize-full navkey"></i> 
    	<i class="icon-pause navkey tubular-pause"></i> 
        <i class="icon-play navkey tubular-play"></i> 
        <i class="icon-volume-up navkey tubular-mute"></i></div>
</div><?php 
}?>

<?php	if( of_get_option('active-background', 'no entry' ) == '1'){ ?>   
<script>	
<?php if(!of_get_option('background-img-2') && !of_get_option('background-img-3') && !of_get_option('background-img-4') && !of_get_option('background-img-5')){?>
		//Background image
		//==================================================
		jQuery(document).ready(function($){
			'strict mode';
		if(window.hasownbg != 1){
		jQuery.vegas('stop');
			jQuery.vegas({
					src:'<?php echo of_get_option('background-img-1'); ?>', 
					fade:<?php echo of_get_option('background-fade-1'); ?>, 
					valign:'<?php echo of_get_option('background-valign-1'); ?>', 
					align:'<?php echo of_get_option('background-halign-1'); ?>' 
			
			})('overlay', {
			  src:'<?php echo get_template_directory_uri()?>/images/overlays/<?php echo of_get_option('background-overlays', 'no entry' ); ?>.png',
			});
		}
		});<?php 
	}else{?>
		jQuery(document).ready(function($){
			'strict mode';
			if(window.hasownbg != 1){
			jQuery.vegas('stop');
			jQuery.vegas('slideshow', {
			delay:<?php echo of_get_option('background-slideshow'); ?>,
			backgrounds:[
				 <?php if(of_get_option('background-img-1')){?>
					{ src:'<?php echo of_get_option('background-img-1'); ?>', fade:<?php echo of_get_option('background-fade-1'); ?>, valign:'<?php echo of_get_option('background-valign-1'); ?>', align:'<?php echo of_get_option('background-halign-1'); ?>' }
				 <?php } ?>
				 
				 <?php if(of_get_option('background-img-2')){?>
					,{ src:'<?php echo of_get_option('background-img-2'); ?>', fade:<?php echo of_get_option('background-fade-2'); ?>, valign:'<?php echo of_get_option('background-valign-2'); ?>', align:'<?php echo of_get_option('background-halign-2'); ?>' }
				 <?php } ?>
				 
				  <?php if(of_get_option('background-img-3')){?>
					,{ src:'<?php echo of_get_option('background-img-3'); ?>', fade:<?php echo of_get_option('background-fade-3'); ?>, valign:'<?php echo of_get_option('background-valign-3'); ?>', align:'<?php echo of_get_option('background-halign-3'); ?>' }
				 <?php } ?>
				 
				  <?php if(of_get_option('background-img-4')){?>
					,{ src:'<?php echo of_get_option('background-img-4'); ?>', fade:<?php echo of_get_option('background-fade-4'); ?>, valign:'<?php echo of_get_option('background-valign-4'); ?>', align:'<?php echo of_get_option('background-halign-4'); ?>' },
				 <?php } ?>
				 
				  <?php if(of_get_option('background-img-5')){?>
					,{ src:'<?php echo of_get_option('background-img-5'); ?>', fade:<?php echo of_get_option('background-fade-5'); ?>, valign:'<?php echo of_get_option('background-valign-5'); ?>', align:'<?php echo of_get_option('background-halign-5'); ?>' }
				 <?php } ?>
			  ]
			})('overlay', {
			  src:'<?php echo get_template_directory_uri(); ?>/images/overlays/<?php echo of_get_option('background-overlays', 'no entry' ); ?>.png'
			});
			}
		});
	<?php }; ?>
	</script>
<?php };?>

<?php if ( comments_open()){?>
<script>
//Ajax comments
//==================================================
jQuery(document).ready(function($){
	var commentform=$('#commentform');
	commentform.prepend('<div id="comment-status" ></div>');
	var statusdiv=$('#comment-status');
	 
	commentform.submit(function(){
		var formdata=commentform.serialize();
		statusdiv.html('<p><?php echo of_get_option('tr-comm-process', 'Processing...' );?></p>');
		var formurl=commentform.attr('action');
		$.ajax({
			type: 'post',
			url: formurl,
			data: formdata,
			error: function(XMLHttpRequest, textStatus, errorThrown){
			statusdiv.html('<p><?php echo of_get_option('tr-comm-error', 'You might have left one of the fields blank, or be posting too quickly' );?></p>');
			},
			success: function(data, textStatus){
				if(data=="success"){
				statusdiv.html('<p><?php echo of_get_option('tr-comm-thanks', 'Thanks for your comment. We appreciate your response.' );?></p>');
				}else{
				statusdiv.html('<p><?php echo of_get_option('tr-comm-thanks', 'Thanks for your comment. We appreciate your response.' );?></p>');
				commentform.find('textarea[name=comment]').val('');
				}
			}
		});
	return false;
	});
});
</script>	
<?php }?>
<script>
(function(moduleName, window, document) {
	var from = function(selector, selectedPlugins) {
		
			var parent = document.querySelector(selector),
				slides = [].slice.call(parent.children, 0),
				activeSlide = slides[0],
				deckListeners = {},
				relnum = 0,
				

				activate = function(index, customData) {
					if (!slides[index]) {
						return;
					}
					fire(deckListeners, 'deactivate', createEventData(activeSlide, customData));

					activeSlide = slides[index];

					slides.map(deactivate);

					fire(deckListeners, 'activate', createEventData(activeSlide, customData));				
					addClass(activeSlide, 'active');
					removeClass(activeSlide, 'inactive');
					if ( jQuery.browser.msie && jQuery.browser.version == '9.0' ) { 
					jQuery( ".classictilt section.bespoke-before-3" ).animate({ "bottom": "2800px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-before-2" ).animate({ "bottom": "1600px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-before-1" ).animate({ "bottom": "800px" }, 300, "linear" );
					//jQuery('.single-post section.bespoke-before-2').fadeTo(200, 0);
					
					
					
					jQuery( ".classictilt section.bespoke-active" ).animate({ "bottom": "23%" }, 300, "linear", function(){
					jQuery( ".single-post section.bespoke-active" ).css("visibility","visible" )} );
					jQuery( ".classictilt section.bespoke-after-1" ).animate({ "bottom": "-950px" },300, "linear", function(){
					jQuery( ".single-post  section.bespoke-after-1" ).css("visibility","hidden" )
					});
					jQuery( ".classictilt section.bespoke-after-2" ).animate({ "bottom": "-1700px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-after-3" ).animate({ "bottom": "-1700px" }, 300, "linear" );
					}
				},

				deactivate = function(slide, index) {
					
					var offset = index - slides.indexOf(activeSlide),
						offsetClass = offset > 0 ? 'after' : 'before';

					['before(-\\d+)?', 'after(-\\d+)?', 'active', 'inactive'].map(removeClass.bind(null, slide));
					slide !== activeSlide &&
						['inactive', offsetClass, offsetClass + '-' + Math.abs(offset)].map(addClass.bind(null, slide));
			
				
						
				},

				slide = function(index, customData) {
					fire(deckListeners, 'slide', createEventData(slides[index], customData)) && activate(index, customData);
				},

				next = function(customData) {
					var nextSlideIndex = slides.indexOf(activeSlide) + 1;
					
					fire(deckListeners, 'next', createEventData(activeSlide, customData)) && activate(nextSlideIndex, customData);
					if ( jQuery.browser.msie && jQuery.browser.version == '9.0' ) { 
					jQuery( ".classictilt section.bespoke-before-3" ).animate({ "bottom": "2800px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-before-2" ).animate({ "bottom": "1600px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-before-1" ).animate({ "bottom": "800px" }, 300, "linear" );
			
					
					jQuery( ".single-post section.bespoke-active" ).css("visibility","visible" )
					jQuery( ".classictilt section.bespoke-active" ).animate({ "bottom": "23%" }, 300, "linear", function(){} );
					jQuery( ".classictilt section.bespoke-after" ).animate({ "bottom": "-950px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-after-1" ).animate({ "bottom": "-950px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-after-2" ).animate({ "bottom": "-1700px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-after-3" ).animate({ "bottom": "-1700px" }, 300, "linear" );
					}
					<?php if(!is_single() && !is_page()){?>
					 window.location.hash = '!slide-'+jQuery( "section.bespoke-active" ).attr("rel");
					 <?php };?>
					// window.location.hash = 'post-'+jQuery( "section.bespoke-active" ).find(".content-title").text();
					 

				},

				prev = function(customData) {
					var prevSlideIndex = slides.indexOf(activeSlide) - 1;

					fire(deckListeners, 'prev', createEventData(activeSlide, customData)) && activate(prevSlideIndex, customData);
					if ( jQuery.browser.msie && jQuery.browser.version == '9.0' ) { 
					jQuery( ".classictilt section.bespoke-before-3" ).animate({ "bottom": "2800px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-before-2" ).animate({ "bottom": "1600px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-before-1" ).animate({ "bottom": "800px" }, 300, "linear" );
					
					/*jQuery('.single-post section.bespoke-before-1').fadeTo(200, 1);
					jQuery('.single-post section.bespoke-before-2').fadeTo(200, 1);*/
					jQuery( ".classictilt section.bespoke-active" ).animate({ "bottom": "23%" }, 300, "linear", function(){
					jQuery( ".single-post section.bespoke-active" ).css("visibility","visible" )} );
					jQuery( ".classictilt section.bespoke-after" ).animate({ "bottom": "-950px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-after-1" ).animate({ "bottom": "-950px" },300, "linear", function(){
					jQuery( ".single-post  section.bespoke-after-1" ).css("visibility","hidden" )
					});
					
					jQuery( ".classictilt section.bespoke-after-2" ).animate({ "bottom": "-1700px" },300, "linear" );
					jQuery( ".classictilt section.bespoke-after-3" ).animate({ "bottom": "-1700px" }, 300, "linear" );
					}
					<?php if(!is_single() && !is_page()){?>
					 window.location.hash = '!slide-'+jQuery( "section.bespoke-active" ).attr("rel");
					 <?php };?>
					//window.location.hash = jQuery( "section.bespoke-active" ).attr("rel");

				},

				createEventData = function(slide, eventData) {
					eventData = eventData || {};
					eventData.index = slides.indexOf(slide);
					eventData.slide = slide;
					return eventData;
				},

				deck = {
					on: on.bind(null, deckListeners),
					off: off.bind(null, deckListeners),
					fire: fire.bind(null, deckListeners),
					slide: slide,
					next: next,
					prev: prev,
					parent: parent,
					slides: slides
				};
			
			addClass(parent, 'parent');
			
			slides.map(function(slide) {
				
				addClass(slide, 'slide');
				jQuery(slide).attr('rel', relnum);
				relnum++;
			});

			Object.keys(selectedPlugins || {}).map(function(pluginName) {
				var config = selectedPlugins[pluginName];
				config && plugins[pluginName](deck, config === true ? {} : config);
				
			});

			activate(0);

			decks.push(deck);

			return deck;
		},

		decks = [],

		bespokeListeners = {},

		on = function(listeners, eventName, callback) {
			(listeners[eventName] || (listeners[eventName] = [])).push(callback);
		},

		off = function(listeners, eventName, callback) {
			listeners[eventName] = (listeners[eventName] || []).filter(function(listener) {
				return listener !== callback;
			});
		},

		fire = function(listeners, eventName, eventData) {
			return (listeners[eventName] || [])
				.concat((listeners !== bespokeListeners && bespokeListeners[eventName]) || [])
				.reduce(function(notCancelled, callback) {
					return notCancelled && callback(eventData) !== false;
				}, true);
		},

		addClass = function(el, cls) {
			el.classList.add(moduleName + '-' + cls);
		},

		removeClass = function(el, cls) {
			el.className = el.className
				.replace(new RegExp(moduleName + '-' + cls +'(\\s|$)', 'g'), ' ')
				.replace(/^\s+|\s+$/g, '');
		},

		callOnAllInstances = function(method) {
			return function(arg) {
				decks.map(function(deck) {
					deck[method].call(null, arg);
				});
			};
		},

		bindPlugin = function(pluginName) {
			return {
				from: function(selector, selectedPlugins) {
					(selectedPlugins = selectedPlugins || {})[pluginName] = true;
					return from(selector, selectedPlugins);
				}
			};
		},

		makePluginForAxis = function(axis) {
			return function(deck) {
				var startPosition,
					delta;

				document.addEventListener('keydown', function(e) {
					var key = e.which;

					if (axis === 'X') {
						key === 37 && deck.prev();
						(key === 32 || key === 39) && deck.next();
					} else {
						key === 38 && deck.prev();
						(key === 32 || key === 40) && deck.next();
					}
				});

				deck.parent.addEventListener('touchstart', function(e) {
					if (e.touches.length) {
						startPosition = e.touches[0]['page' + axis];
						delta = 0;
					}
				});

				deck.parent.addEventListener('touchmove', function(e) {
					if (e.touches.length) {
						e.preventDefault();
						delta = e.touches[0]['page' + axis] - startPosition;
					}
				});

				deck.parent.addEventListener('touchend', function() {
					Math.abs(delta) > 50 && (delta > 0 ? deck.prev() : deck.next());
				});
			};
		},

		plugins = {
			horizontal: makePluginForAxis('X'),
			vertical: makePluginForAxis('Y')
		};

	window[moduleName] = {
		from: from,
		slide: callOnAllInstances('slide'),
		next: callOnAllInstances('next'),
		prev: callOnAllInstances('prev'),
		horizontal: bindPlugin('horizontal'),
		vertical: bindPlugin('vertical'),
		on: on.bind(null, bespokeListeners),
		off: off.bind(null, bespokeListeners),
		plugins: plugins
	};

}('bespoke', this, document));
</script>




