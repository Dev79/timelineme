<?php
/*
* Theme Name: Time Line Me - Timeline WordPress Theme
* Theme Author: Bethel Goka / #.com
*
* Description: Time Line Me Wordpress Theme is a next generation 
* website, for non-linear digital story telling. 
*
* Version: 1.2 
*/
?>
<?php get_header();

$tr_readmore = of_get_option('tr-readmore', 'Read more');
$tr_searchtitle = of_get_option('tr-searchtitle', 'Nothing Found');
$tr_searchsubtitle = of_get_option('tr-searchsubtitle', 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.');
$tr_home_info = of_get_option('tr-home-info', 'posts at home page');
$tr_search_info = of_get_option('tr-search-info', 'results found');
$tr_archive_info = of_get_option('tr-archive-info', 'posts in archive');
$tr_search_rpw = of_get_option('tr-search-rpw', 'Recent Posts');
$tr_search_apw = of_get_option('tr-search-aw', 'Archive');
$tr_search_tw = of_get_option('tr-search-tw', 'Tags');

$vc_set_lang = of_get_option('vc-set-lang', 'en' );
$vc_slide_next = of_get_option('vc-slide-next', 'next' );
$vc_slide_prev = of_get_option('vc-slide-prev', 'previous');
$vc_share_tw = of_get_option('vc-share-tw', 'tweet');
$vc_share_fb = of_get_option('vc-share-fb', 'share');
$vc_open_img = of_get_option('vc-open-img', 'show picture');
$vc_close = of_get_option('vc-close', 'close');
$vc_scroll_back = of_get_option('vc-scroll-back', 'scroll back');
$vc_home_page = of_get_option('vc-home-page', 'home page');
$vc_search_for = of_get_option('vc-search-for', 'search for');
$vc_open_post = of_get_option('vc-open-post', 'open');
$vc_more_cat = of_get_option('vc-more-cat', 'more from same category');
$vc_read_comm = of_get_option('vc-read-comm', 'show comments');
?>
<script>
jQuery(document).ready(function($){
	//checkn for voice recognition
	//==================================================
	if (!annyang) {
		$('#tt-voice-c').css("display","none");
		$('.tt-bottom-nav').css("border","none");
		
	}
	<?php if(of_get_option('active-voicecontrol', '1' ) !='1'){ ?> 
			$('#tt-voice-c').css("display","none");
			$('.tt-bottom-nav').css("border","none");
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
	
	setTimeout(scrollinit,1000);
	function initThemeSwitching() {
		themes = [
			'classictilt'
		];
		selectedThemeIndex = 0;
		if(window.lastslide !==''){
			deck.slide(window.lastslide-1);
		}else{
			deck.slide(0);
		}
		if(window.openfirst !== 1){
			window.gokb='';
			<?php if(of_get_option('active-voicecontrol', '1' ) =='1'){ ?> 
			if (annyang) {
				//tweet
				//==================================================
				var commands = {
					'<?php echo $vc_share_tw;?>': function() {	
						 window.open($(".bespoke-active a.share-three").attr("rel"),'_blank', 'width=550,height=420');
					},
					//share-facebook
					//==================================================
					'<?php echo $vc_share_fb;?>': function() {
							 window.open($(".bespoke-active a.share-two").attr("rel"),'_blank', 'width=600,height=400');
					},
					//open big img
					//==================================================
					'<?php echo $vc_open_img;?>': function() {
						if($(".bespoke-active a.voice-bigimage").attr("href")){
						$().prettyPhoto()
						  api_images = [$(".bespoke-active a.voice-bigimage").attr("href")];
						  $.prettyPhoto.open(api_images);
						}
					},
					//close big img
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
					//go to begining of the timeline
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
						if($('.bespoke-active a.voice-readcomments').attr('href')){
						var storyId = $('.bespoke-active a.voice-readcomments').attr('href');
						selectactive(storyId);
						}
					}
				};
				//language of the voice control listener
				//==================================================
				annyang.setLanguage('<?php echo $vc_set_lang;?>');
				annyang.init(commands);
				annyang.debug();				
						
				//enable / disable voice control using cookie		
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
			var nmax = $("section").length -1;
			window.openfirst = 1
			window.gomouse();		
			deck.slide(<?php if( of_get_option('select-first-post') != '' && of_get_option('select-first-post') != 'max'){echo of_get_option('select-first-post');}else if(of_get_option('select-first-post') == 'max'){?> nmax <?php }else{ echo '0';};?>);
		}
		window.dom='fl';
		
		initInstructions();
		initKeys();
		initButtons();
		initSlideGestures();
		initClickInactive();
		loopreset();
		

  
		var hash = window.location.hash;
		var findme = "!slide-";
		var n = $("section").length;
		yourString = hash.replace ( /[^\d.]/g, '' );
		if(yourString && hash.indexOf(findme) > -1){
			
			if(n <= yourString){
				document.removeEventListener('keydown', gokb);
				setTimeout( function(){
				window.initajax()},10)
				
			}
			deck.slide(yourString)
			/*setTimeout( function(){
			$('article').css('overflow', 'hidden');
			deck.slide(yourString)},10);  */
		}
		
		<?php if(of_get_option('post-autorotate', 'off' ) =='on'){ ?> 
			initAutoSlide();
		<?php }?>
		
		var whichtehem = "<?php if( of_get_option('scroll-effect') != ''){echo of_get_option('scroll-effect');}else{ echo '0';};?>";
	}
	//Display welcome bubble use cookie to show only once
	//==================================================
	function initInstructions() {
		if (isTouch()) {
			$('body').addClass('forios');
		}
		function setCookie(c_name,value,exdays){
			var exdate=new Date();
			exdate.setDate(exdate.getDate() + exdays);
			var c_value=escape(value) + ((exdays===null) ? "" : "; expires="+exdate.toUTCString());
			document.cookie=c_name + "=" + c_value;
		}	
		function getCookie(c_name){
			var c_value = document.cookie;
			var c_start = c_value.indexOf(" " + c_name + "=");
			if (c_start === -1){
				c_start = c_value.indexOf(c_name + "=");
			}
			if (c_start === -1){
				c_value = null;
			}else{
				c_start = c_value.indexOf("=", c_start) + 1;
				var c_end = c_value.indexOf(";", c_start);
				if (c_end === -1){
					c_end = c_value.length;
				}
				c_value = unescape(c_value.substring(c_start,c_end));
			}
			return c_value;
		}
		function checkCookie(){
			window.bopen = 2;
			var bubleopen = Number(getCookie("welcomemsg"));
			if(bubleopen !== 1){
			
				$( document ).ready( 
				function() {
					window.bopen = 1;
					$("#ss-container").unbind("mousewheel DOMMouseScroll");
					
					showInstructions()
					instructionsTimeout=setTimeout(showInstructions, 2000);
				}
				
				
				 )

			}
		}	<?php if(of_get_option('wellcome-msg', '1' ) =='1'){ 
		if(of_get_option('yt-bg-type') != 'true' ){?>
		checkCookie();
		<?php } ?>
		
		setCookie('welcomemsg','1', 1);	
		<?php };?>
	}
	//Small bottom nav or menu
	//==================================================
	function initButtons() {
		document.getElementById('next-arrow').addEventListener('click', gonext);
		document.getElementById('prev-arrow').addEventListener('click',goprev);

	}
	function gonext(){
		window.clearInterval(autorotateposts);
		deck.next();
		var n = $("section").length;
		$('section').each(function(){
			if( $(this).hasClass('bespoke-active') && Number($(this).attr('rel'))+1 ===n){
				<?php if(of_get_option('def-pagination-display') != "pagination"){?>
				if(window.initajax() !== false){
					document.removeEventListener('keydown', gokb);
					document.getElementById('next-arrow').removeEventListener('click', gonext);
				}
				<?php };?>
			}
		});
	}
	function goprev(){
		window.clearInterval(autorotateposts);
		deck.prev();
		var n = $("section").length;
		$('section').each(function(){
			if( $(this).hasClass('bespoke-active') && Number($(this).attr('rel'))+1 ===n){
				<?php if(of_get_option('def-pagination-display') != "pagination"){?>
				if(window.initajax() !== false){
					document.removeEventListener('keydown', gokb);
					document.getElementById('next-arrow').removeEventListener('click', gonext);
				}
				<?php };?>
			}
		});
	}
	//Keyboard nav
	//==================================================
	function initKeys(e) {
		
		//document.removeEventListener('keydown', gokb);
		document.getElementById('next-arrow').removeEventListener('click', gonext);
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
			if(key === 13 ){
				window.issearch = 0;
				$("#searchform").submit(function(e){ window.issearch = 1;});
				if($('.bespoke-active a.read-more-init').attr('href')){
					$("#ss-container").unbind("mousewheel DOMMouseScroll");
					var storyId = $('.bespoke-active a.read-more-init').attr('href');
					selectactive(storyId);
					$("#ss-container").unbind("mousewheel DOMMouseScroll");
				}
			}
			if(key === 38){
				window.clearInterval(autorotateposts);
				deck.prev();
			}
			if(key === 40 ){
				window.clearInterval(autorotateposts);
				deck.next();
			}
			var n = $("section").length;
			$('section').each(function(){
				if( $(this).hasClass('bespoke-active') && Number($(this).attr('rel'))+1 ===n){
					<?php if(of_get_option('def-pagination-display') != "pagination"){?>
					
						if(window.initajax() !== false){
							document.removeEventListener('keydown', gokb);
						}
					<?php }; ?>
					}
				});
			};
		document.addEventListener('keydown', gokb);
	}
	//Animate post on read more click- this is where we want to work on 4vR, CHNG: Opacity & Duration
	//////////////////////////
	function selectactive(storyId){
		var contentholder = document.getElementsByClassName("bespoke-active")[0];
		var allholder = document.getElementsByClassName("bespoke-parent")[0];
		<?php
		if(of_get_option('post-fx') == "on" ){ ?>
			allholder.style.opacity -= 0.1;
			document.body.style.opacity -= 0.1;
			move(contentholder)
				.scale(6)
				.duration('0.4s')
				.end(function(){
					if(window.issearch != 1){
						window.open(storyId, '_self');
					}
				});<?php
		}else{?>
			window.open(storyId, '_self');<?php
		}?>
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
		var n = $("section").length;
		$('section').each(function(){
			/*if($(this).hasClass('bespoke-active') && $('div', this ).hasClass('right-content')) {
				$('body').removeClass('go-left');
				$('body').addClass('go-right');
			}else if($(this).hasClass('bespoke-active') && $('div', this ).hasClass('left-content')) {
				$('body').removeClass('go-right');
				$('body').addClass('go-left');
			}else if($(this).hasClass('bespoke-active') && $('div', this ).hasClass('center-content')) {
				$('body').removeClass('go-right');
				$('body').removeClass('go-left');
				}
				*/
			if( $(this).hasClass('bespoke-active') && Number($(this).attr('rel'))+1 ===n && jQuery(document).width() > 530){
				<?php if(of_get_option('def-pagination-display', 'pagination') != "pagination"){?>
				if(window.initajax() === false){
					document.addEventListener('keydown', gokb);
				}else{
					$("#ss-container").unbind("mousewheel DOMMouseScroll");
					document.removeEventListener('keydown', gokb);
				}
				<?php }; ?>
			}
		});
		if(jQuery(document).width() < 530){
			if(jQuery(window).scrollTop() > jQuery(document).height() - jQuery(window).height()-150){
				<?php if(of_get_option('def-pagination-display', 'pagination') != "pagination"){?>
				if(window.initajax() === false){
					document.addEventListener('keydown', gokb);
				}else{
					$("#ss-container").unbind("mousewheel DOMMouseScroll");
					document.removeEventListener('keydown', gokb);
				}
				<?php };?>
			}
		}
		$('#ss-container').bind('mousewheel DOMMouseScroll', function(e){
			if(extractDelta(e) > 0) {
			$("#ss-container").unbind("mousewheel DOMMouseScroll");
				setTimeout(prevp, 200); 
			}
			if(extractDelta(e) < 0) {
			$("#ss-container").unbind("mousewheel DOMMouseScroll");
				setTimeout(nextp, 200);
			}
		});
		function prevp(){
			window.clearInterval(autorotateposts);
			deck.prev();
			setTimeout( gomousewheel, 200);  
		}
		function nextp(){
			window.clearInterval(autorotateposts);
			deck.next();
			setTimeout( gomousewheel, 200);  
		}
	};
	if(window.openfirst === 1){
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
				return function(e) {
					if(e.touches.length === 1){
						fn(e.touches[0].pageY);
					}
				};
			},
			touchstart = singleTouch(function(position) {
				startPosition = position;
				delta = 0;
					start = 0;
					main.addEventListener('touchend', touchend); 
			}),

			touchmove = singleTouch(function(position) {
				delta = position - startPosition;
			}, true),
			
			touchend = function() {		
			if(jQuery(document).width() < 530){
					if(jQuery(window).scrollTop() > jQuery(document).height() - jQuery(window).height()-130){
						<?php if(of_get_option('def-pagination-display') != "pagination"){?>
						if(window.initajax() === false){
							main.addEventListener('touchstart', touchstart);
							main.addEventListener('touchmove', touchmove);
							main.addEventListener('touchend', touchend);
						}else{
							main.removeEventListener('touchstart', touchstart);
							main.removeEventListener('touchmove', touchmove);
							main.removeEventListener('touchend', touchend);
						}
						<?php }; ?>
					}
				}	
				if (Math.abs(delta) < 50) {
					return;
				}
				if(delta > 0){
					window.clearInterval(autorotateposts);
					deck.prev();
				}else{
					window.clearInterval(autorotateposts);
					deck.next();
				}
				var n = $("section").length;
				$('section').each(function(){
					if( $(this).hasClass('bespoke-active') && Number($(this).attr('rel'))+1 ===n && jQuery(document).width() > 530){
						<?php if(of_get_option('def-pagination-display') != "pagination"){?>
						if(window.initajax() === false){
							main.addEventListener('touchstart', touchstart);
							main.addEventListener('touchmove', touchmove);
							main.addEventListener('touchend', touchend);
						}else{
							main.removeEventListener('touchstart', touchstart);
							main.removeEventListener('touchmove', touchmove);
							main.removeEventListener('touchend', touchend);
						}
						<?php }; ?>
					}
				});
				
			};
		window.remvoetuch = function(){
			main.removeEventListener('touchstart', touchstart);
			main.removeEventListener('touchmove', touchmove);
			main.removeEventListener('touchend', touchend);
		};
		window.addtuch = function(){
			main.addEventListener('touchstart', touchstart);
			main.addEventListener('touchmove', touchmove);
			main.addEventListener('touchend', touchend);
		};
		window.addtuch();
	}
	//Show hide wellcome bubble
	//==================================================
	function showInstructions() {
		$('#ss-container').addClass('addblur');
		$('#footer').addClass('addblur');
		$('#dl-menu').addClass('addblur');
		$('.right-bottom-nav').addClass('addblur');
		$('.opentip-container').addClass('addblur');
		$('.addbg').addClass('addbgv');
		$('.addbg').click(function() {
			if(window.bopen === 1){
				hideInstructions();	
				window.bopen = 2;
			}
			$(this).unbind("click");
		});
		document.querySelectorAll('header .welcome-b')[0].className = 'welcome-b visible animated fadeInUp';
	}
	function hideInstructions() {
		window.gomouse();
		$('#ss-container').removeClass('addblur');
		$('#footer').removeClass('addblur');
		$('#dl-menu').removeClass('addblur');
		$('.right-bottom-nav').removeClass('addblur');
		$('.opentip-container').removeClass('addblur');
		$('.addbg').removeClass('addbgv');
		clearTimeout(instructionsTimeout);
		document.querySelectorAll('header .welcome-b')[0].className = 'welcome-b';
	}

	function isTouch() {
		return !!('ontouchstart' in window) || navigator.msMaxTouchPoints;
	}

	function modulo(num, n) {
		return ((num % n) + n) % n;
	}
	//Mouse click navigation
	//==================================================
	function initClickInactive(){
		$(".tt-cn-style").unbind("click");
		var main = document.getElementById('main');
		var n = $("section").length;
		window.lastslide = n;
		$('.tt-cn-style').click(function() {
			//alert('111');
			window.clearInterval(autorotateposts);
			var page = $(this).parent().attr('rel');
			var count = Number(page)+1;
			if( $(this).parent().hasClass('bespoke-inactive') ){
			
				if(count === n){
					<?php if(of_get_option('def-pagination-display') != "pagination"){?>
					if(window.initajax() === false){
						document.addEventListener('keydown', gokb);
						window.remvoetuch();
						initSlideGestures();
					}else{
						document.removeEventListener('keydown', gokb);
						window.remvoetuch();
					}
					<?php }; ?>
				}
			deck.slide(page);
			}
		});
	}
	function loopreset(){
		$('a').live('touchend', function(e) {
			var el = $(this);
			var link = el.attr('href');
		});
		//pretty Photo settings( ! Don't change )
		//==================================================
	
		$("a[rel^='prettyPhotoImages']").prettyPhoto({theme: 'dark_square',allow_resize: false});
	
		$("a[rel^='prettyPhotoImages']").prettyPhoto({theme: 'dark_square',allow_resize: true});
	
		//Animate post on read more click
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
				$("#ss-container").unbind("mousewheel DOMMouseScroll");
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
	
	$( ".share-box" ).hover(function() {
		$(".bespoke-active").addClass('openshare');
		$(this).addClass('open');
	
		}, function() {
		$(".bespoke-slide").removeClass('openshare');
		$(this).removeClass( "open" ).delay( 1800 );
	})
	$(".timedate")
	  .each(function(i) {
		if (i != 0) { 
		var audio = document.getElementsByTagName("audio")[0];
		  $('#beep-two')
			.clone()
			.attr("id", "beep-two" + i)
			.appendTo($(this).parent()); 
		}
		$(this).data("beeper", i);
	  })
	  .mouseenter(function() {
		$("#beep-two" + $(this).data("beeper"))[0].play();
		$("#beep-two" + $(this).data("beeper"))[0].volume = 0.4;
	  });			 
	}
	//Animate post on read more click
	//==================================================
	var contentholder = document.getElementsByClassName("bespoke-active");
	var allholder = document.getElementsByClassName("bespoke-parent");
	function animate(){
		$('a.read-more-init').click(function () {
			var storyId = $(this).attr('href');
			selectactive(storyId);
			return false;
		});   
		function selectactive(storyId){
			$("#ss-container").unbind("mousewheel DOMMouseScroll");
			document.removeEventListener('keydown', gokb);
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
	var autorotateposts 
	function initAutoSlide(){
		 autorotateposts = setInterval( deck.next , <?php echo of_get_option('post-autorotate-delay', '3000' );?> ); 
	 }
});
</script>
<div class="timelinepath"></div>
<div id="main" <?php post_class(); ?>><?php
	//SORT ONLY STICKY ON HOME PAGE
	//=====================================================
	if(!is_archive() && !is_search()){
		global $wpqueryvarsSerialized;
		if ( is_home()  ){
			if(of_get_option('order-posts') == "ll" ){
				$order_posts = 'ASC';//4vR
			}else{
				$order_posts = 'DESC';
			}
			if(of_get_option('sticky-posts') == 'show_sticky'){
				$sticky = get_option( 'sticky_posts' );
				rsort( $sticky );
				query_posts( array( 'post__in' => $sticky, 'order' => $order_posts,  'ignore_sticky_posts' => 1, 'paged' => $paged ) ); 
			}else{
				query_posts( array( 'order' => $order_posts, 'paged' => $paged) ); 
			}
			 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			}
		};
		if(is_archive()){
			if(of_get_option('order-posts') == "ll" ){
			global $query_string;
				query_posts( $query_string . '&order=ASC' );//4vR
			}
		}
	//BEGIN LOOP
	//=====================================================?> 
	<article id="articlehold"><?php
		if(have_posts()) : while ( have_posts() ) : the_post();
			//DONT SHOW PAGES IN SEARCH RESULT
			//=====================================================
			//if (is_search() && ($post->post_type=='page')) continue;
			$id = get_the_ID();
			$post_meta_data = get_post_custom($post->ID);
			
			include('functions/post-settings.php');?>	
            <?php if(of_get_option('active-dglass') == 1){
				 $ab_tf_post_color = 'gglass gdarck';
			}?>

			<section class="<?php echo $ab_tf_post_color; ?>">
				<div class="tt-cn-style <?php if($ab_tf_post_content_position == "right"){?> right-content <?php }elseif($ab_tf_post_content_position == "left"){?> left-content<?php }elseif($ab_tf_post_content_position == "center"){?> center-content <?php }; if($ab_tf_post_content_width == "boxed" && $ab_tf_row_style != "circle"){?> nonfull<?php }; if($ab_tf_row_style == "circle"){?> is-circle <?php }?> <?php if($ab_tf_post_showcategory == "hide" && $ab_tf_post_showsoc == "hide" || $ab_tf_row_style == "circle"){ ?>gcnopadding<?php }?>"><?php
					//JAVASCRIPT FOR FLEX SLIDER AND FADE IN
					//=====================================================?>
					<?php
					do_shortcode( get_the_content() );
					
					//ROW BODY
					//=====================================================?>
					<?php if($custom_repeatable[0] != ''){?>
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
					if($ab_tf_row_style == "circle"){
						$exceptnum = of_get_option('max-excerpt-circle', '225');?>		
						<div class="circle-img go-anim <?php echo $ab_tf_post_color;?>" >
							<div class="c-size-big">
								<div class="circle-img-c " ><?php 
									if ( has_post_thumbnail() || $ab_tf_post_embed_video_yt !='' || $ab_tf_post_embed_video_vm !='') {  
										$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 380,380, ), true );
										if($custom_repeatable[0] != ''){?>
											<div id="flexslider-<?php echo $id;?>" class="flexslider" >
												<ul class="slides">
													<!--[if IE]><div style="width:240px; min-width:240px;"></div> <![endif]-->
													<li> <?php
														if($ab_tf_row_style == "circle"){ ?>
															<ul class="ch-grid">
																<li>
																	<div class="ch-item" style="background-image: url(<?php echo $src[0]; ?>);">
                                                                    	<div class="ch-info-wrap">
																			<div class="ch-info">
																				<div class="ch-info-front" style="background-image: url(<?php echo $src[0]; ?>);"></div>
																				<div class="ch-info-back"><?php 
																					if(apply_filters ('the_title', get_the_title()) !='') {
																						if($ab_tf_post_showtitle != 'hide'){?>
																							<h3 class="content-title"><a class="read-more-init" id="<?php echo $id;?>"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> <?php 
																						};
																					};?>
																					<p><?php
																						if($ab_tf_post_excerpt != 'off'){
																							$linktofull = '... <a href="'.get_permalink().'" class="read-more-init"><strong>'.$tr_readmore.'</strong> <i class="icon-long-arrow-right"></i></a>';
																							if(get_the_excerpt() !=""){
																								echo substr( get_the_excerpt(),0,$exceptnum).$linktofull;
																							} 
																						}else{
																							the_content($tr_readmore);
																						}
																						if($ab_tf_post_showcategory != "hide"){?>
																							<div class="circle-info"><?php
																							   $category = get_the_category();?>
																								<span class="empty-left time-holder "> <a class="read-more-init voice-morefromthis" href="<?php echo get_category_link( $category[0]->term_id );?>"><i class="icon-tag icon-large"></i> <?php echo $category[0]->cat_name;?></a>
																								</span>
																								 <?php if ( comments_open()){?>
																								<span class="empty-left user-holder"> <a  href="<?php comments_link(); ?>"  class="read-more-init voice-readcomments"><i class="icon-comments icon-large"></i> <?php comments_number( '0', '1', '%' ); ?></a>
																								</span>
																								<?php };?>
																							 
																								<?php if( function_exists('dot_irecommendthis') ) {?> 
																								 <span class="empty-left comm-holder"> <?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?></span><?php };?> 
																							</div><?php
																						};?>										
																					</p>
																				</div>	
																			</div>
																		</div>
																	</div>
																</li>
															</ul><?php
														};?>
													</li> <?php
													foreach ($custom_repeatable as $string) {
														$srcslider = wp_get_attachment_image_src( $string, array( 380,380, ), true );?>												
														<li><?php
															if($ab_tf_row_style == "circle"){ ?>
																<ul class="ch-grid">
																	<li>
																		<div class="ch-item" style="background-image: url(<?php echo $srcslider[0]; ?>);">				
																			<div class="ch-info-wrap">
																				<div class="ch-info">
																					<div class="ch-info-front" style="background-image: url(<?php echo $srcslider[0]; ?>);"></div>
																					<div class="ch-info-back"><?php 
																						if(apply_filters ('the_title', get_the_title()) !='') {
																							if($ab_tf_post_showtitle != 'hide'){?>
																								<h3 class="content-title"><a class="read-more-init" id="<?php echo $id;?>"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> <?php 
																							};
																						};?>
																						<p><?php
																							if($ab_tf_post_excerpt != 'off'){
																								$linktofull = '... <a href="'.get_permalink().'" class="read-more-init"><strong>'.$tr_readmore.'</strong> <i class="icon-long-arrow-right"></i></a>';
																								if(get_the_excerpt() !=""){
																									echo substr( get_the_excerpt(),0,$exceptnum).$linktofull;
																								} 
																							}else{
																								the_content($tr_readmore);
																							} 
																							if($ab_tf_post_showcategory != "hide"){?>
																								<div class="circle-info"><?php
																								   $category = get_the_category();?>
																									<span class="empty-left time-holder "> <a class="read-more-init voice-morefromthis" href="<?php echo get_category_link( $category[0]->term_id );?>"><i class="icon-tag icon-large"></i> <?php echo $category[0]->cat_name;?></a>
																									</span>
																									<?php if ( comments_open()){?>
																									<span class="empty-left user-holder"> <a  href="<?php comments_link(); ?>"  class="read-more-init voice-readcomments"><i class="icon-comments icon-large"></i> <?php comments_number( '0', '1', '%' ); ?></a>
																									</span>
																									<?php };?>
																									<?php if( function_exists('dot_irecommendthis') ) {?> 
																									 <span class="empty-left comm-holder"> <?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?></span><?php };?> 
																								</div><?php
																							};?>										
																						</p>
																					</div>		
																				</div>
																			</div>
																		</div>
																	</li>
																</ul><?php
															};?>
														</li> <?php 
													};?>
												</ul>
											</div> <?php
										}else{
											if($ab_tf_row_style == "circle"){ ?>
												<ul class="ch-grid">
													<li>
														<div class="ch-item" style="background-image: url(<?php echo $src[0]; ?>);">
																			
															<div class="ch-info-wrap">
															
																<div class="ch-info">
																
																	<div class="ch-info-front" style="background-image: url(<?php echo $src[0]; ?>);"></div>
																	<div class="ch-info-back"><?php 
																		if(apply_filters ('the_title', get_the_title()) !='') {
																			if($ab_tf_post_showtitle != 'hide'){?>
																				<h3 class="content-title"><a class="read-more-init" id="<?php echo $id;?>"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> <?php 
																			};
																		};?>
																		<p><?php
																			if($ab_tf_post_excerpt != 'off'){
																				$linktofull = '... <a href="'.get_permalink().'" class="read-more-init"><strong>'.$tr_readmore.'</strong> <i class="icon-long-arrow-right"></i> </a>';
																				if(get_the_excerpt() !=""){
																					echo substr( get_the_excerpt(),0,$exceptnum).$linktofull;
																				} 
																			}else{
																				the_content($tr_readmore);
																			}
																			if($ab_tf_post_showcategory != "hide"){?>
																				<div class="circle-info"><?php
																				   $category = get_the_category();?>
																					<span class="empty-left time-holder "> <a class="read-more-init voice-morefromthis" href="<?php echo get_category_link( $category[0]->term_id );?>"><i class="icon-tag icon-large"></i> <?php echo $category[0]->cat_name;?></a>
																					</span> 
																					<?php if ( comments_open()){?>
																					<span class="empty-left user-holder"> <a  href="<?php comments_link(); ?>"  class="read-more-init voice-readcomments"><i class="icon-comments icon-large"></i> <?php comments_number( '0', '1', '%' ); ?></a>
																					</span>
																					<?php };?>
																					<?php if( function_exists('dot_irecommendthis') ) {?> 
																					 <span class="empty-left comm-holder"> <?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?></span><?php };?> 
																				</div><?php
																			};?>										
																		</p>
																	</div>	
																</div>
															</div>
														</div>
													</li>
												</ul><?php
											};
										};	
									};?>
								</div>
							</div>
						</div><?php 
					}else{
						$exceptnum = of_get_option('max-excerpt-square','225');?> 
						<div class="<?php echo $ab_tf_post_color;?> ss-row go-anim <?php if($ab_tf_post_showcategory != "hide" || $ab_tf_post_showsoc != "hide"){ ?> infoison<?php }else{?> infoisoff <?php }; if(apply_filters( 'the_content', get_the_content()) == ''){?>no-content<?php }?>">
							<div class="ss-full">
								<?php if(apply_filters( 'the_content', get_the_content()) == ''){?>
									<a class="read-more-init hidelink" id="<?php echo $id;?>"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php };
								if(has_post_thumbnail() || $ab_tf_post_embed_video_yt !='' || $ab_tf_post_embed_video_vm !='') {	
									if(apply_filters( 'the_content', get_the_content()) == ''){
										$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 550,550, ), true );
									}else{
										$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 550,550, ), true );
									}
									$srcf = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', true );
									if($custom_repeatable[0] != ''){?>
										<div id="flexslider-<?php echo $id;?>" class="flexslider" >
											<ul class="slides">
												<li>
													<div class="hover-effect h-style"><?php 
														if($ab_tf_img_title && $ab_tf_post_embed_video_yt =='' && $ab_tf_post_embed_video_vm =='' || $ab_tf_img_content && $ab_tf_post_embed_video_yt =='' && $ab_tf_post_embed_video_vm ==''){  ?>
															<img src="<?php echo $src[0]; ?>" class="clean-img"/> 
															<div class="mask"><?php 
																if($ab_tf_img_title){ ?>
																	<h2><?php echo $ab_tf_img_title; ?></h2><?php  
																}; ?>
																<p><?php echo $ab_tf_img_content; ?></p><?php  
																if($ab_tf_img_link){ ?>
																	<a href="<?php echo $ab_tf_img_link; ?>" class="info" > <span class="button wpb_defbtn"><?php echo $ab_tf_img_buttontitle; ?></span></a><?php
																}; ?>
															</div><?php 
														}else{ 
															if ($ab_tf_post_embed_video_yt !='') {?>
																<iframe id="embedvideo" width="100%" height="190px" src="//www.youtube.com/embed/<?php echo $ab_tf_post_embed_video_yt;?>?html5=1" frameborder="0" allowfullscreen></iframe><?php
															}else if ($ab_tf_post_embed_video_vm !=''){?>
																<iframe src="//player.vimeo.com/video/<?php echo $ab_tf_post_embed_video_vm;?>?title=0&amp;byline=0&amp;portrait=0" width="100%" height="190px" id="embedvideo" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><?php
															}else if($ab_tf_post_img_link =='link'){?>
																<a class="read-more-init" href="<?php the_permalink(); ?>">
																	<img src="<?php echo $src[0]; ?>" class="clean-img"/> 
																		<div class="mask"><i class="icon-link"></i>
																			<span class="img-rollover"></span>
																		</div>
																</a><?php
															}else if($ab_tf_post_img_link =='image'){?>
																<a href="<?php echo $srcf[0]; ?>" rel="prettyPhotoImages[<?php echo $id; ?>]">
																	<img src="<?php echo $src[0]; ?>" class="clean-img"/> 
																	<div class="mask"><i class="icon-search"></i>
																		<span class="img-rollover"></span>
																	</div>
																</a><?php 
															}else if($ab_tf_post_img_link =='disable'){?>
																	<img src="<?php echo $src[0]; ?>" class="clean-img"/><?php 
															}
														};?>
													</div>
												</li> <?php
												foreach ($custom_repeatable as $string) {
													if(apply_filters( 'the_content', get_the_content()) == ''){
														$srcslider = wp_get_attachment_image_src( $string, array( 550,550, ), true );
													}else{
														$srcslider = wp_get_attachment_image_src( $string, array( 550,550, ), true );
													}
													$srcsliderf = wp_get_attachment_image_src( $string, 'full', true );
													?>
													<li>
														<div class="hover-effect h-style"><?php 
															if($ab_tf_img_title && $ab_tf_post_embed_video_yt =='' && $ab_tf_post_embed_video_vm =='' || $ab_tf_img_content && $ab_tf_post_embed_video_yt =='' && $ab_tf_post_embed_video_vm ==''){  ?>
															<img src="<?php echo $srcslider[0]; ?>" class="clean-img"/> 
															<div class="mask"><?php 
																if($ab_tf_img_title){ ?>
																	<h2><?php echo $ab_tf_img_title; ?></h2><?php  
																}; ?>
																<p><?php echo $ab_tf_img_content; ?></p><?php  
																if($ab_tf_img_link){ ?>
																	<a href="<?php echo $ab_tf_img_link; ?>" class="info" > <span class="button wpb_defbtn"><?php echo $ab_tf_img_buttontitle; ?></span></a><?php
																}; ?>
															</div><?php 
														}else{ 
															 if($ab_tf_post_img_link =='link'){?>
																<a class="read-more-init" href="<?php the_permalink(); ?>">
																	<img src="<?php echo $srcslider[0]; ?>" class="clean-img"/> 
																		<div class="mask"><i class="icon-link"></i>
																			<span class="img-rollover"></span>
																		</div>
																</a><?php
															}else if($ab_tf_post_img_link =='image'){?>
																<a href="<?php echo $srcsliderf[0]; ?>" rel="prettyPhotoImages[<?php echo $id; ?>]">
																	<img src="<?php echo $srcslider[0]; ?>" class="clean-img"/> 
																	<div class="mask"><i class="icon-search"></i>
																		<span class="img-rollover"></span>
																	</div>
																</a><?php 
															}else if($ab_tf_post_img_link =='disable'){?>
																	<img src="<?php echo $srcslider[0]; ?>" class="clean-img"/><?php 
															}
														};?>
														</div>
													</li> <?php 
												};?>
											</ul>
										</div> <?php
									}else{?>
										<div class="hover-effect h-style"><?php 
											if($ab_tf_img_title && $ab_tf_post_embed_video_yt =='' && $ab_tf_post_embed_video_vm =='' || $ab_tf_img_content && $ab_tf_post_embed_video_yt =='' && $ab_tf_post_embed_video_vm ==''){  ?>
												<img src="<?php echo $src[0]; ?>" class="clean-img"/> 
												<div class="mask"><?php 
													if($ab_tf_img_title){ ?>
														<h2><?php echo $ab_tf_img_title; ?></h2><?php  
													}; ?>
													<p><?php echo $ab_tf_img_content; ?></p><?php  
													if($ab_tf_img_link){ ?>
														<a href="<?php echo $ab_tf_img_link; ?>" class="info" > <span class="button wpb_defbtn"><?php echo $ab_tf_img_buttontitle; ?></span></a><?php
													}; ?>
												</div><?php 
											}else{ 
												if ($ab_tf_post_embed_video_yt !='') {?>
													<iframe id="embedvideo" width="100%" height="190px" src="//www.youtube.com/embed/<?php echo $ab_tf_post_embed_video_yt;?>?html5=1" frameborder="0" allowfullscreen></iframe><?php
												}else if ($ab_tf_post_embed_video_vm !=''){?>
													<iframe src="//player.vimeo.com/video/<?php echo $ab_tf_post_embed_video_vm;?>?title=0&amp;byline=0&amp;portrait=0" width="100%" height="190px" id="embedvideo" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe><?php
												}else if($ab_tf_post_img_link =='link'){?>
													<a class="read-more-init" href="<?php the_permalink(); ?>">
														<img src="<?php echo $src[0]; ?>" class="clean-img"/> 
															<div class="mask"><i class="icon-link"></i>
																<span class="img-rollover"></span>
															</div>
													</a><?php
												}else if($ab_tf_post_img_link =='image'){ ?>
													<a class="voice-bigimage"  href="<?php echo $srcf[0]; ?>"  alt="<?php if (isset($attachment->post_title)){echo $attachment->post_title;} ?>" rel="prettyPhotoImages[<?php echo $id; ?>]">
														<img src="<?php echo $src[0]; ?>" class="clean-img"/> 
														<div class="mask"><i class="icon-search"></i>
															<span class="img-rollover"></span>
														</div>
													</a><?php 
												}else if($ab_tf_post_img_link =='disable'){?>
														<img src="<?php echo $src[0]; ?>" class="clean-img"/><?php 
												}
											};?>
										</div><?php 
									};
								}
								if(apply_filters( 'the_content', get_the_content()) != '' || $ab_tf_post_showtitle == 'hide' && has_post_thumbnail()){ ?>
									<div class="container-border">
										<div class="gray-container <?php if($ab_tf_post_showcategory == "hide" && $ab_tf_post_showsoc == "hide"){ ?>gcnopadding<?php }?>">
											<div class="containera <?php if(!has_post_thumbnail() && $ab_tf_post_showdate == "show" && $ab_tf_post_embed_video_yt == '' && $ab_tf_post_embed_video_vm =='') {?> addpadding<?php }?>"><?php
												if(apply_filters ('the_title', get_the_title()) !='') {
													if($ab_tf_post_showtitle != 'hide'){?>
															<h3 class="content-title"><a class="read-more-init" id="<?php echo $id;?>"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> <?php
													};
												};
												if($ab_tf_post_excerpt != 'off'){
												$linktofull = '...<a href="'.get_permalink().'" class="read-more-init"> <strong>'.$tr_readmore.'</strong> <i class="icon-long-arrow-right"></i> </a>';?>
												<div class="hideifneed"><?php
													if(get_the_excerpt() !="" && get_the_excerpt() !=" "){
														echo substr( get_the_excerpt(),0,$exceptnum).$linktofull;
													}?>
												</div><?php
												}else{
													 the_content($tr_readmore);
												}
												
												if($ab_tf_post_showcategory != "hide" || $ab_tf_post_showsoc != "hide"){ ?>
													<div class="icon-soc-container">
														<div class="share-btns"><?php
														if($ab_tf_post_showcategory != "hide"){	
														if($post->post_type=='post'){				
															$category = get_the_category();?>
															<div class="empty-left time-holder "> <a class="read-more-init voice-morefromthis" href="<?php echo get_category_link( $category[0]->term_id );?>"><i class="icon-tag"></i> <?php echo $category[0]->cat_name;?></a>
															</div>
															<?php }; if ( comments_open()){?>
																<div class="empty-left user-holder"> <a  href="<?php comments_link(); ?>"  class="read-more-init voice-readcomments"><i class="icon-comments"></i> <?php comments_number( '0', '1', '%' ); ?></a>
																</div>
																<?php };?>
															
															<?php if( function_exists('dot_irecommendthis') ) {?> 
															 <div class="empty-left comm-holder"> <?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?></div><?php };?>
															<?php 
														}
															?>
														</div>   
													</div><?php
												};?>
											</div>
										</div>
									</div><?php
								}; ?>
							</div>
						</div><?php 
					};?>
					<div>
						<div class="timedate">
							<div class="tt-day"><?php echo get_the_date('d'); ?></div>
							<div class="tt-month"><?php echo get_the_date('M'); ?></div>
							<div class="tt-year"><?php echo get_the_date('Y'); ?></div>
							<div class="share-box">
							  <a class="share-btna share-two"  rel="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>', '_blank', 'width=600,height=400');void(0);"><i class="icon-facebook"></i></a>
					  <a class="share-btna share-three"  rel="https://twitter.com/share?url=<?php the_permalink();?>&amp;text=<?php the_title();?>" href="javascript:window.open('https://twitter.com/share?url=<?php the_permalink();?>&amp;text=<?php the_title();?>', '_blank', 'width=550,height=420');void(0);"><i class="icon-twitter"></i></a>
							</div>
						</div>
						<div class="timedateafter"></div>
						<div class="tt-arrow-side<?php if($ab_tf_post_color != 'gglass gdarck' && $ab_tf_post_color != 'gglass' && $ab_tf_post_showcategory != "hide" || $ab_tf_post_color != 'gglass gdarck' && $ab_tf_post_color != 'gglass' && $ab_tf_post_showsoc != "hide" ){?> iswhite<?php }; ?>"></div>
						<div class="tt-arrow-dot blink"></div>
						<div class="reslines"></div>
					</div>
                </div>
			</section><?php 
		endwhile; 
		else : ?>
			<section class="center-content">
				<div class="ss-full ss-row fb-holder s-holder ss-stand-alone s-no-result">
					<div class="container-border">                
						<div class="gray-container <?php echo of_get_option('body-color-scheme', 'turquoise'); ?>">
							<div class="nano">
								<div class="cscrol content">
                                    <h3 class="content-title comm-title"><?php echo $tr_searchtitle; ?></h3> 
                                    	<p><?php echo $tr_searchsubtitle; ?></p>
										<p><?php echo get_search_form(); ?></p><?php 
										$args = array(
											'title' => '',
											'limit' => 3,
											'excerpt' => 10,
											'length' => 20,
											'thumb' => true,
											'cat' => '',
											'date' => true
										);
										$instance = array(
											'title' => ' '
										);?>
                                        <div class="widg-row-one">
                                        	<h3 class="content-title comm-title"><?php echo $tr_search_rpw;?></h3>  
											<?php the_widget( 'ab_tf_recent_posts_widget', $args ); ?>
										</div>
										<div class="widg-row-two">
                                        	<h3 class="content-title comm-title"><?php echo $tr_search_apw;?></h3> 
											<?php the_widget( 'WP_Widget_Calendar', 222, $args ); ?> 
                                            <h3 class="content-title comm-title"><?php echo $tr_search_tw;?></h3>
											<?php the_widget( 'WP_Widget_Tag_Cloud', $instance, $args ); ?>
										</div>
									</div>
                                </div>
                                <div class="icon-soc-container">
						   			<div class="share-btns"></div>   
                                </div>
                            </div> 
                        </div> 
                    </div> 
                    <div class="<?php echo of_get_option('body-color-scheme', 'turquoise'); ?>">
                        <div class="timedate">
                        <div class="tt-day"><i class="icon-warning-sign icon-small"></i></div>
                        <div class="tt-month"></div>
                        <div class="tt-year">404</div>
                    </div>
                    <div class="timedateafter"></div>
                    <div class="tt-arrow-side"></div>
					<div class="tt-arrow-dot blink"></div>
				</div>
                <div class="reslines"></div>
				<script>
                jQuery(document).ready(function ($) {
					$(".nano").nanoScroller({ alwaysVisible: true, iOSNativeScrolling: true});
					$(' .slider').addClass("<?php echo of_get_option('body-color-scheme', 'turquoise'); ?>");
				})
				</script>
		</section><?php
		endif;
		 add_editor_style();?>	
    </article>
    <?php ab_tf_t_pagination($pages = '', $range = 2); ?>
</div>
<?php get_footer(); ?>