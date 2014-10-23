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

<?php get_header();

$tr_disqus_title = of_get_option('tr-disqus-title', 'Disqus');
$tr_facebook_title = of_get_option('tr-facebook-title', 'Facebook');

$vc_set_lang = of_get_option('vc-set-lang', 'en' );
$vc_slide_next = of_get_option('vc-slide-next', 'next' );
$vc_slide_prev = of_get_option('vc-slide-prev', 'previous');
$vc_share_tw = of_get_option('vc-share-tw', 'tweet');
$vc_share_fb = of_get_option('vc-share-fb', 'share');
$vc_open_img = of_get_option('vc-open-img', 'show picture');
$vc_close = of_get_option('vc-close', 'close');
$vc_scroll_back = of_get_option('vc-scroll-back', 'scroll back');
$vc_scroll_down = of_get_option('vc-scroll-down', 'scroll down');
$vc_scroll_up = of_get_option('vc-scroll-up', 'scroll up');
$vc_home_page = of_get_option('vc-home-page', 'home page');
$vc_search_for = of_get_option('vc-search-for', 'search for');
$vc_open_post = of_get_option('vc-open-post', 'open');
$vc_more_cat = of_get_option('vc-more-cat', 'more from same category');
$vc_read_comm = of_get_option('vc-read-comm', 'show comments');
?>
<script>  
jQuery(document).ready(function($){
	if (!annyang) {
		$('#tt-voice-c').css("display","none");
	}
	<?php if(of_get_option('active-voicecontrol', '1' ) !='1'){ ?> 
			$('#tt-voice-c').css("display","none");
	<?php }?>
	'use strict';
	var themes,
		selectedThemeIndex,
		instructionsTimeout,
		deck;
	window.scrollinit = function(){
		deck = bespoke.from('article');
		initThemeSwitching();
	};
	scrollinit();
	<?php if(of_get_option('active-voicecontrol', '1' ) =='1'){ ?> 
			if (annyang) {
				//share on twitter 
				//==================================================
				var commands = {
					
					
					'<?php echo $vc_scroll_down;?>': function() {
						 jQuery('#main .bespoke-active .cscrol').animate({
							scrollTop: $('#main .bespoke-active .cscrol').scrollTop() + 200
						}, 'slow');
					},
					'<?php echo $vc_scroll_up;?>': function() {
						 jQuery('#main .bespoke-active .cscrol').animate({
							scrollTop: $('#main .bespoke-active .cscrol').scrollTop() - 200
						}, 'slow');
					},
					'<?php echo $vc_share_tw;?>': function() {	
						 window.open($(".bespoke-active a.share-three").attr("rel"),'_blank', 'width=550,height=420');
					},
					//share on facebook
					//==================================================
					'<?php echo $vc_share_fb;?>': function() {
							 window.open($(".bespoke-active a.share-two").attr("rel"),'_blank', 'width=600,height=400');
					},
					//open big image
					//==================================================
					'<?php echo $vc_open_img;?>': function() {
						if($(".bespoke-active a.voice-bigimage").attr("href")){
						$().prettyPhoto()
						  api_images = [$(".bespoke-active a.voice-bigimage").attr("href")];
						  $.prettyPhoto.open(api_images);
						}
					},
					//close big image
					//==================================================
					'<?php echo $vc_close;?>': function() {
						$.prettyPhoto.close();
					},
					//next slide
					//==================================================
					'<?php echo $vc_slide_next;?>': function() {
					  deck.next();
					},
					//previous slide
					//==================================================
					'<?php echo $vc_slide_prev;?>': function() {
					  deck.prev();
					},
					//go to the beginning of the timeline
					//==================================================
					'<?php echo $vc_scroll_back;?>': function() {
					  deck.slide(0);
					},
					//go to homepage
					//==================================================
					'<?php echo $vc_home_page;?>': function() {
						 window.open("<?php echo home_url(); ?>","_self");
					},
					//search
					//==================================================
					'<?php echo $vc_search_for;?> *search':function(tag) {
						window.open("<?php echo home_url()."?s="; ?>"+tag,"_self");
					},
					//open post
					//==================================================
					'<?php echo $vc_open_post;?>': function(){
						var storyId = $('.bespoke-active a.read-more-init').attr('href');
						selectactive(storyId);
					},
					//more from this category
					//==================================================
					'<?php echo $vc_more_cat;?>': function(){
						if($('.bespoke-active a.voice-morefromthis').attr('href')){
						var storyId = $('.bespoke-active a.voice-morefromthis').attr('href');
						selectactive(storyId);
						}
					},
					//read comments
					//==================================================
					'<?php echo $vc_read_comm;?>': function(){
						if( $('#firsts').hasClass('bespoke-active') ){
							deck.slide(1);
						}
					}
				};
				//languige of the voice control listener
				//==================================================
				annyang.setLanguage('<?php echo $vc_set_lang;?>');
				annyang.init(commands);
				annyang.debug();				
						
				//enable / disable voice control (using cookie)		
				//==================================================			
				var isone = ''
				$(function() {
					$("#tt-voice-c").click(function() {
						if (readCookie("voiceon") == 'on') {
							$('#vocie-control').removeClass('icon-microphone').addClass('icon-microphone-off');
							isone='off';
							 annyang.abort();
						}
						if (readCookie("voiceon") == 'off') {
							$('#vocie-control').removeClass('icon-microphone-off').addClass('icon-microphone');
							annyang.start();
							isone='on';
						}
						createCookie("voiceon",isone);
						return false;
					});
					
					if( readCookie("voiceon") == null ){
						 Opentip.tips[0].show(); 
					}
					if (readCookie("voiceon") == 'on') {
						 annyang.start();
						 $('#vocie-control').removeClass('icon-microphone-off').addClass('icon-microphone');
						isone='on';
					}
					else if(readCookie("voiceon") == 'off' || readCookie("voiceon") == null ){
						$('#vocie-control').removeClass('icon-microphone').addClass('icon-microphone-off');
						annyang.abort();
						isone='off';
						
					}
					createCookie("voiceon",isone);
				});
				function createCookie(name,value,days) {
					if (days) {
						var date = new Date();
						date.setTime(date.getTime()+(days*24*60*60*1000));
						var expires = "; expires="+date.toGMTString();
					}
					else var expires = "";
					document.cookie = name+"="+value+expires+"; path=/";
				}
				function readCookie(name) {
					var nameEQ = name + "=";
					var ca = document.cookie.split(';');
					for(var i=0;i < ca.length;i++) {
						var c = ca[i];
						while (c.charAt(0)==' ') c = c.substring(1,c.length);
						if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
					}
					return null;
				}
				function eraseCookie(name) {
					createCookie(name,"",-1);
				}
			}
<?php }?>
	function initThemeSwitching() {
		selectedThemeIndex = 0;
		initKeys();
		initSlideGestures();
		initButtons();
		initClickInactive();
		deck.slide(0);
		var hash = window.location.hash;
		if(hash === "#comments"){
			setTimeout( function(){
			$('article').css('overflow', 'hidden');
			deck.next()}, 800);  
		}
	}
	//Keyboard navigation
	//==================================================
	function initKeys(e) {
		var start = 0;
		if (/Firefox/.test(navigator.userAgent)) {
			document.addEventListener('keydown', function(e) {
				if (e.which >= 37 && e.which <= 40) {
					e.preventDefault();
				}
			});
		}
		window.gokb = function(e) {
			if(window.bopen === 1){
				hideInstructions();	
				window.bopen = 2;
			}
			var key = e.which;
			if(key === 38){
				deck.prev();
			}
			if(key === 40){
				deck.next();
			}
			if(start === 0 && key === 38 || key === 40 ){
				if( $('.cscrol').is(':animated') ) {
					start = 0;
				}else{
					$('.cscrol').animate({
							scrollTop: 0
						}, 'slow', function(){ 
						if( $('#firsts').hasClass('bespoke-active') ){
								var start = 0;
							$('article').css('overflow', 'visible');
						}else{
						
							$('article').css('overflow', 'hidden');
						}
						start = 1;
					});
				}
			}
		}
		document.addEventListener('keydown', gokb);
	}
	function extractDelta(e) {
		if (e.wheelDelta) {
			return e.wheelDelta;
		}
		if (e.originalEvent.detail) {
			return e.originalEvent.detail* -40;
		}
		if (e.originalEvent && e.originalEvent.wheelDelta) {
			return e.originalEvent.wheelDelta;
		}
	}
	//Mouse wheel navigation
	//==================================================
	window.gomouse = function gomousewheel(){
		$("#main").unbind("mousewheel DOMMouseScroll");
		var el = $('.bespoke-inactive');
		if(el.length === 0){
			return;
		}
		var bounce = '<?php echo of_get_option('comments-bounce', 'on' ); ?>';
		var start = 0;
		$('#main').bind('mousewheel DOMMouseScroll', function(e){
			if( $('#firsts').hasClass('bespoke-active') ){
				if($('.cscrol').scrollTop() + $('.cscrol').innerHeight() >= $('.cscrol')[0].scrollHeight -10 && bounce == 'on' ){
					if(extractDelta(e) < 0) {
						$("#main").unbind("mousewheel DOMMouseScroll");
						nextp();
					}	
				}
			}else{
				if(extractDelta(e) > 0) {
					$("#main").unbind("mousewheel DOMMouseScroll");
					setTimeout( prevp, 200);
				}
				if(extractDelta(e) < 0) {
					$("#main").unbind("mousewheel DOMMouseScroll");
					setTimeout( nextp, 200); 
				}
			}
		});
		function prevp(){
			$("#main").unbind("mousewheel DOMMouseScroll");
			deck.prev();
			setTimeout( gomousewheel, 200);	  
		}
		function nextp(){
			$("#main").unbind("mousewheel DOMMouseScroll");
			deck.next();
			setTimeout( gomousewheel, 200);
		}
	}
	window.gomouse();
	$(".iscomm").mouseover(function() {
		setTimeout(dada, 20);
		}).mouseout(function(){
			setTimeout(nene, 20)
		}
	);
	$(".iscomm").mouseenter(function() {
		setTimeout(dada, 20);
		}).mouseleave(function(){
			setTimeout(nene, 20)
		}
	);
	$(".fb-holder").mouseover(function() {
		setTimeout(dada, 20);
		}).mouseout(function(){
			setTimeout(nene, 20)
		}
	);
	$(".fb-holder").mouseenter(function() {
		setTimeout(dada, 20);
		}).mouseleave(function(){
			setTimeout(nene, 20)
		}
	);
	function dada(){
		$("#main").unbind("mousewheel DOMMouseScroll")
	}
	function nene(){
		$("#main").unbind("mousewheel DOMMouseScroll");
		window.gomouse();
	}
	//Navigation for touch devices
	//==================================================
	function initSlideGestures() {
		var start = 0;
		var main = document.getElementById('main'),
			startPosition,
			delta,
			singleTouch = function(fn, preventDefault) {
				start = 0;
				return function(e) {
					if (preventDefault) {
						//e.preventDefault();
					}
					e.touches.length === 1 && fn(e.touches[0].pageX);
				};
			},
			touchstart = singleTouch(function(position) {
				startPosition = position;
				delta = 0;
			}),

			touchmove = singleTouch(function(position) {
				delta = position - startPosition;
				
			}, true),

			touchend = function() { 
				start = 0;
				var bounce = '<?php echo of_get_option('comments-bounce', 'on' ); ?>';
				if( $('#firsts').hasClass('bespoke-active') ){
					if($('.cscrol').scrollTop() + $('.cscrol').innerHeight() >= $('.cscrol')[0].scrollHeight -20 /*&& bounce == 'on'*/){
						jQuery('.cscrol').animate({
							scrollTop: 0
						}, 'slow', function(){
							if( $('#firsts').hasClass('bespoke-active') ){
								//$('article').css('overflow', 'visible');
							}else{
							//	$('article').css('overflow', 'hidden');
							}
							if(start == 0 ){
								deck.next();
								start = 1;
							}	
						});
					}		
				}
				if(Math.abs(delta) < 100) {
					return;
				}
				jQuery('.cscrol').animate({
					scrollTop: 1
				}, 'slow', function(){
					if( $('#firsts').hasClass('bespoke-active') ){
						//$('article').css('overflow', 'visible');
					}else{
						//$('article').css('overflow', 'hidden');
					}
					if(start === 0 ){ 
						delta > 0 ? deck.prev() : deck.next();
						start = 1;
					}	
				});
				
			};
			var viewportWidth = $('body').innerWidth();
			if (viewportWidth > 530) {
				main.addEventListener('touchstart', touchstart);
				main.addEventListener('touchmove', touchmove);
				main.addEventListener('touchend', touchend);
			 }
	}
	//Small bottom navigation
	//==================================================
	function initButtons() {
		document.getElementById('backb-arrow').addEventListener('click', gobegin);
		document.getElementById('next-arrow').addEventListener('click', gonext);
		document.getElementById('prev-arrow').addEventListener('click', goprev);
	}
	function gobegin(){
		deck.slide(0)
		if( $('#firsts').hasClass('bespoke-active') ){
			$('article').css('overflow', 'visible');
		}else{
			$('article').css('overflow', 'hidden');
		}
	}
	function goprev(){
		deck.prev();
		if( $('#firsts').hasClass('bespoke-active') ){
			$('article').css('overflow', 'visible');
		}else{
			$('article').css('overflow', 'hidden');
		}
	}
	function gonext(){
		deck.next();
		var start = 0
		if( $('.cscrol').is(':animated') ) {
			start = 1 
		}else{
			$('.cscrol').animate({
				scrollTop: 0
			}, 'slow', function(){ 
				if( $('#firsts').hasClass('bespoke-active') ){
					$('article').css('overflow', 'visible');
				}else{
					$('article').css('overflow', 'hidden');
				}	
			});
		};
	};
	function isTouch() {
		return !!('ontouchstart' in window) || navigator.msMaxTouchPoints;
	}

	function modulo(num, n) {
		return ((num % n) + n) % n;
	}
	//Mouse click navigation
	//==================================================
	
	function initClickInactive(){
		var hasBeenClicked = false;
		var n = $("section").length;
		$('#linkclick').click(function(){
			hasBeenClicked = true;
		});
		$('section').click(function() {
			if(hasBeenClicked) {
				jQuery('.cscrol').animate({
					scrollTop: 0
				}, 'slow', function(){ 
					if( $('#firsts').hasClass('bespoke-active') ){
						$('article').css('overflow', 'visible');
					}else{
						$('article').css('overflow', 'hidden');
					}
						deck.slide(1);
						hasBeenClicked = false;				
				});	
					
			}else{
				var page = $(this).attr('rel');
				
				if( $(this).hasClass('bespoke-inactive') ){
					jQuery('.cscrol').animate({
						scrollTop: 0
					}, 'slow', function(){ 
						if( $('#firsts').hasClass('bespoke-active') ){
							$('article').css('overflow', 'visible');
						}else{
						
							$('article').css('overflow', 'hidden');
						}
							deck.slide(page);
							hasBeenClicked = false;			
					});
				}
			}
		});
	}
	
	//Animate post on  click
	//==================================================
	var contentholder = document.getElementsByClassName("bespoke-active");
	var allholder = document.getElementsByClassName("bespoke-parent");
	function animate(){
		'use strict';
		$('a.read-more-init').click(function () {
			var storyId = $(this).attr('href');
			selectactive(storyId);
			return false;
		});   
		function selectactive(storyId){
			allholder[0].style.opacity -= 0.1;
			document.body.style.opacity -= 0.1;
			move(contentholder[0])
				.scale(6)
				.duration('0.4s')
				.end(function(){
					window.open(storyId, '_self');
			});
		}
	} <?php  
	if(of_get_option('post-fx') == "on" ){ ?>
		animate();
	<?php }; ?>
});
</script><?php
global $fbcomm, $ab_tf_post_showfbcomments;
?>
<div class="timelinepath"></div>
<div id="main" <?php post_class(); ?>><?php 
	//BEGIN LOOP
	//=====================================================?> 
	<article class="single-post"><?php
		if(have_posts()) : ?><?php while(have_posts()) : the_post(); 
		$id = get_the_ID();
		$post_meta_data = get_post_custom($post->ID);
		include('functions/post-settings.php');?>
        
        <section rel="0" id='firsts' class="center-content <?php echo $ab_tf_post_color; ?>"><?php
			//JAVASCRIPT FOR FLEX SLIDER AND BACKGROUND
			//=====================================================
			if($ab_tf_post_bgimage != ''){
				$srcf = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full', true );
				$srcsliderfa = wp_get_attachment_image_src( $ab_tf_post_bgimage, 'full', true );?>
				<script>
				jQuery( document ).ready( function($){
					window.hasownbg = 1;
					jQuery.vegas('stop');
					jQuery.vegas({
							src:'<?php echo  $srcsliderfa[0]; ?>', 
							fade:2000, 
							valign:'<?php echo of_get_option('background-valign-1'); ?>', 
							align:'<?php echo of_get_option('background-halign-1'); ?>' 
					
					})('overlay', {
					  src:'<?php echo get_template_directory_uri(); ?>/images/overlays/<?php echo of_get_option('background-overlays', 'no entry' ); ?>.png'
					});
				})
				</script><?php 
			}; 
			
			if($custom_repeatable[0] != ''){?>
				<script>
                    jQuery( document ).ready( function($){
                        
                        $(window).bind("load", function() {				 					 
                            $('#flexslider-<?php echo $id;?>').flexslider({
                                animation: "<?php echo $ab_tf_post_img_effect; ?>",
                                direction: "<?php echo $ab_tf_post_img_sdirection; ?>",
                                slideshow: <?php echo $ab_tf_post_img_slideshow; ?>,
                                smoothHeight: true,
                            });
                        })
                    });
                </script><?php
			};
			//BODY
			//=====================================================?>
			<div class="ss-stand-alone <?php echo $ab_tf_post_color;?>">
				<div class="ss-full <?php if($ab_tf_post_showcategory == "hide" && $ab_tf_post_showsoc == "hide"){ ?>tt-nopadding<?php };?>">    
					<div class="nano mnano">
						<div class="tt-content-bg <?php if($ab_tf_show_sidebar == 'sbleft'){ ?>sblefton empty-right<?php }else if($ab_tf_show_sidebar == 'sbright'){?>sblefton empty-left<?php }else {?> fullw<?php };?>"></div>
    					<div class="cscrol content">
                        	<div id='tt-h-one' class="ss-row  <?php if($ab_tf_show_sidebar == 'sbleft'){ ?>sblefton empty-right<?php }else if($ab_tf_show_sidebar == 'sbright'){?>sblefton empty-left<?php } ?>"><?php
							if(has_post_thumbnail() && $ab_tf_post_show_featured != 'hide') {
								$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,305, ), true );
								$srcf = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full', true );
								if($custom_repeatable[0] != ''){?>
									<div id="flexslider-<?php echo $id;?>" class="flexslider">
										<ul class="slides">
											<li> 
												<div class="hover-effect h-style <?php if ($ab_tf_post_embed_video_yt !='' || $ab_tf_post_embed_video_vm !='') {?>embedvideoh<?php }; ?>"><?php 
													if ($ab_tf_post_embed_video_yt !='') {?>
																<iframe class="embedvideo"  width="100%" height="340px" src="//www.youtube.com/embed/<?php echo $ab_tf_post_embed_video_yt;?>?html5=1" frameborder="0" allowfullscreen></iframe><?php
													}else if ($ab_tf_post_embed_video_vm !=''){?>
																<iframe src="//player.vimeo.com/video/<?php echo $ab_tf_post_embed_video_vm;?>?title=0&amp;byline=0&amp;portrait=0"  width="100%" height="340px" class="embedvideo" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><?php
													}else{?>
														<a href="<?php echo $srcf[0]; ?>" rel="prettyPhotoImages[<?php echo $id; ?>]"><img src="<?php echo $src[0]; ?>" class="clean-img"/> 
															<div class="mask"><i class="icon-search"></i>
																<span class="img-rollover"></span>
															</div>
														</a><?php 
													}?>
												</div>
											</li> <?php
											foreach ($custom_repeatable as $string) {
												$srcslider = wp_get_attachment_image_src( $string, array( 720,405, ), true );
												$srcsliderf = wp_get_attachment_image_src( $string, 'full', true );?>
												<li>
													<div class="hover-effect h-style">
														<a href="<?php echo $srcsliderf[0]; ?>" rel="prettyPhotoImages[<?php echo $id; ?>]"><img src="<?php echo $srcslider[0]; ?>" class="clean-img"/> 
															<div class="mask"><i class="icon-search"></i>
																<span class="img-rollover"></span>
															</div>
														</a>
													</div>
												</li> <?php 
											};?>
										</ul>
									</div> <?php
								}else{?>
									<div class="hover-effect h-style <?php if ($ab_tf_post_embed_video_yt !='' || $ab_tf_post_embed_video_vm !='') {?>embedvideoh<?php }; ?>"><?php 
										if ($ab_tf_post_embed_video_yt !='') {?>
											<iframe class="embedvideo" width="100%" height="340px" src="//www.youtube.com/embed/<?php echo $ab_tf_post_embed_video_yt;?>?html5=1" frameborder="0" allowfullscreen></iframe><?php
										}else if ($ab_tf_post_embed_video_vm !=''){?>
											<iframe src="//player.vimeo.com/video/<?php echo $ab_tf_post_embed_video_vm;?>?title=0&amp;byline=0&amp;portrait=0" width="100%" height="340px" class="embedvideo" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><?php
										}else{;?>
											<a href="<?php echo $srcf[0]; ?>" rel="prettyPhotoImages[<?php echo $id; ?>]"><img src="<?php echo $src[0]; ?>" class="clean-img"/>
												<div class="mask"><i class="icon-search"></i>
													<span class="img-rollover"></span>
												</div>
											</a><?php
										};?>
									</div><?php 
								};
							};
							if(apply_filters( 'the_content', get_the_content()) !='' || $ab_tf_post_showtitle == 'hide' ){?>
								<div class="container-border zindex-up">
									<div class="gray-container <?php if($ab_tf_post_showcategory == "hide" && $ab_tf_post_showsoc == "hide"){ ?>gcnopadding<?php }?> <?php if(!has_post_thumbnail() && $ab_tf_post_showdate == "show" && $ab_tf_post_embed_video_yt == '' && $ab_tf_post_embed_video_vm =='') {?> addpaddingmore<?php }?>"> <?php 
										if(apply_filters ('the_title', get_the_title()) !=''  ) {
											if($ab_tf_post_showtitle != 'hide'){?>                         	
												<h1 class="content-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><?php
											};
										};
										the_content();
										wp_link_pages(); 
										the_tags('<ol class="tags"><li>', '</li><li>', '</li> </ol>');?>
									  
									</div>
								</div>
							</div><?php
						};
						if($ab_tf_show_sidebar == 'sbleft'){?>
							<div id='tt-h-two' class="sbleft">
							  <?php dynamic_sidebar ('blog-sidebar'); ?>
							</div><?php
						}else if($ab_tf_show_sidebar == 'sbright'){?>
							<div id='tt-h-two' class="sbright">
							  <?php dynamic_sidebar ('blog-sidebar'); ?>   
							</div><?php
						};?>
					</div>
				</div> <?php
				if($ab_tf_post_showcategory != "hide" || $ab_tf_post_showsoc != "hide"){ ?>
					<div class="icon-soc-container">
						<div class="share-btns"><?php
							if($ab_tf_post_showcategory != "hide"){?>
								<div class="empty-left time-holder"><a href="#"><i class="icon-user icon-large"></i> <?php  the_author(); ?> </a></div><?php 
								if ( comments_open()){?>
									<div class="empty-left user-holder">
                                    	<a  href="<?php comments_link(); ?>" id='linkclick'><i class="icon-comments icon-large"></i> <?php comments_number( '0', '1', '%' ); ?></a>
									</div><?php 
								};
								if( function_exists('dot_irecommendthis') ) {?> 
									 <div class="empty-left comm-holder"> <?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?></div><?php 
								}; 
							}
							?>	
                             <a class="read-more-initt navposts " href="javascript:history.back()" >
                          	<div class="empty-right time-holder closenav no-border" data-ot='back'  data-ot-fixed="flase"  data-ot-background="rgba(0,0,0,0.7)" data-ot-border-color="rgba(0,0,0,0.8)" data-ot-auto-offset="true" data-ot-stem-length="12" data-ot-offset="[ 6, -6 ]" data-ot-tip-joint="bottom center" data-ot-target="true" data-ot-border-radius="0">
                            <i class="icon-angle-right icon-large"></i><i class="icon-angle-left icon-large"></i>
							</div>
						</a>
						</div>   
					</div><?php
				};?>
				</div>   
			</div>
			<div class="timedate">
				<div class="tt-day"><?php echo get_the_date('d'); ?></div>
                <div class="tt-month"><?php echo get_the_date('M'); ?></div>
                <div class="tt-year" style=" "><?php echo get_the_date('Y'); ?></div>
				<div class="share-box">
					<a class="share-btna share-two" rel="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>', '_blank', 'width=600,height=400');void(0);"><i class="icon-facebook"></i></a>
					  <a class="share-btna share-three" rel="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title();?>" href="javascript:window.open('https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title();?>', '_blank', 'width=550,height=420');void(0);"><i class="icon-twitter"></i></a>
                </div>
                
            </div>
            <div class="timedateafter"></div>
            <div class="tt-arrow-side<?php if($ab_tf_post_color != 'gglass gdarck' && $ab_tf_post_color != 'gglass' && $ab_tf_post_showcategory != "hide" || $ab_tf_post_color != 'gglass gdarck' && $ab_tf_post_color != 'gglass' && $ab_tf_post_showsoc != "hide" ){?> iswhite<?php }; ?>">
            </div>
            <div class="tt-arrow-dot blink"></div>
            <div class="reslines"></div> 
		</section><?php  
		if($ab_tf_post_showdscomments == 'on' ){?> 
                <section id="section-1" class="center-content disquis_h">
					<div class="ss-full ss-row fb-holder ss-stand-alone">
						<div class="container-border">
							<div class="gray-container <?php global $ab_tf_post_color; echo $ab_tf_post_color;?>">
                             	<h3 class="content-title comm-title"><?php echo $tr_disqus_title;?></h3> 
								<div class="nano">
									<div class="cscrol content">
                             			<div id="disqus_thread"><p></p></div>
									</div>
                                </div>
                                <div class="icon-soc-container">
						   			<div class="share-btns"></div>   
								</div>
							</div> 
						</div> 
					</div> 
                    <div class="<?php echo $ab_tf_post_color; ?>">
                        <div class="timedate">
                            <div class="tt-day"><i class="icon-comments icon-large"></i></div>
                            <div class="tt-month"></div>
                            <div class="tt-year"><a href='<?php the_permalink();?>#disqus_thread'></a></div>
                        </div>
                        <div class="timedateafter"></div>
                        <div class="tt-arrow-side"></div>
                        <div class="tt-arrow-dot blink"></div>
                    </div>
					<div class="reslines"></div>
               </section><?php
            };
			if($ab_tf_post_showfbcomments == 'on' ){
				global $fbcomm;
				$fbcomm = 2;?> 
                <section id="section-2" class="center-content">
					<div class="ss-full ss-row fb-holder ss-stand-alone">
						<div class="container-border">
							<div class="gray-container <?php global $ab_tf_post_color; echo $ab_tf_post_color;?>">
								<h3 class="content-title comm-title"><?php echo $tr_facebook_title;?></h3> 
								<div class="nano">
									<div class="cscrol content">
                                    	<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="2" data-height="250" data-width="470" <?php if($ab_tf_post_color != 'gglass'){ ?> data-colorscheme="dark" <?php }; ?>>
                                        </div>
									</div>
                                </div>
                                <div class="icon-soc-container">
									<div class="share-btns"></div>   
								</div>
							</div> 
						</div> 
					</div>
					<div class="<?php echo $ab_tf_post_color; ?>">
						<div class="timedate">
							<div class="tt-day"><i class="icon-comments icon-large"></i></div>
							<div class="tt-month"></div>
							<div class="tt-year"><fb:comments-count href=<?php the_permalink(); ?>></fb:comments-count></div>
						</div> 
						<div class="timedateafter"></div>
						<div class="tt-arrow-side"></div>
						<div class="tt-arrow-dot blink"></div>
					</div>
					<div class="reslines"></div>
				</section><?php 
			};
			comments_template();?>
		<?php endwhile; ?>
        <?php endif;  wp_reset_query();?>
	</article>
</div>
<script>
jQuery(document).ready(function ($) {
	//Custom scroll
	//==================================================
	scrollrefresh = function(){
		$(".nano").nanoScroller({ alwaysVisible: true, iOSNativeScrolling: true});	
	}
	$(".nano").nanoScroller({ alwaysVisible: true, iOSNativeScrolling: true});
	$('.slider').addClass("<?php global $ab_tf_post_color; echo $ab_tf_post_color;?>");
	setInterval("scrollrefresh()",250);
});
</script>
<?php get_sidebar(); ?>	
<?php get_footer(); ?>

