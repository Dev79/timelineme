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
function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {
	$typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
asort($typography_mixed_fonts);

	$slider_play = array(
		'true' => __('Yes', 'options_check'),
		'false' => __('No', 'options_check')
	);
	
	$background_valign = array(
		'top' => __('Top', 'options_check'),
		'center' => __('Center', 'options_check'),
		'bottom' => __('Bottom', 'options_check')
	);
	$background_halign = array(
		'left' => __('Left', 'options_check'),
		'center' => __('Center', 'options_check'),
		'right' => __('Right', 'options_check')
	);
	

	
	$date_bubble = array(
		'hide' => __('Hide', 'options_check'),
		'date' => __('Date', 'options_check'),
		'price' => __('Price', 'options_check'),
		'rating' => __('Rating', 'options_check')
	);
	$pagination_display = array(
		'infinite' => __('Infinite Scroll', 'options_check'),
		'pagination' => __('Pagination', 'options_check')
	);
	$typography_defaults = array(
		'size' => '12px',
		'face' => 'Open Sans',
		'color' => '#8b8b8b' );
		
	$typography_options_titles = array(
		'faces' => options_typography_get_google_fonts(),
		'color' => false,
		'styles' =>  array(
	"normal" => "Normal",
	"italic" => "Italic",
	"bold" => "Bold",
	"bold italic" => "Bold italic"
	)
	);
	
	

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories['all'] = 'All';
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;

	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('General', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Home page', 'options_check'),
		'desc' => __('Select home page posts type', 'options_check'),
		'id' => 'sticky-posts',
		'std' => 'show_latest',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'show_latest' => __('Latest posts', 'options_check'),
			'show_sticky' => __('Sticky posts', 'options_check')
			)
		);
	$options[] = array(
		'name' => __('Order posts by', 'options_check'),
		'desc' => __('Show or hide category container ', 'options_check'),
		'id' => 'order-posts',
		'std' => 'lf',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'lf' => __('Last added is first', 'options_check'),
			'll' => __('Last added is last', 'options_check')
			)
		);
	$options[] = array(
		'name' => __('Posts in future', 'options_check'),
		'desc' => __('Enable this option if you want to use timeline template for events or something else that requaers posts with future date to be displayed', 'options_check'),
		'id' => 'future-posts',
		'std' => 'off',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'on' => __('On', 'options_check'),
			'off' => __('Off', 'options_check')
			)
		);
	$options[] = array(
		'name' => __('Clock style', 'options_check'),
		'desc' => __('Select clock style', 'options_check'),
		'id' => 'clock-style',
		'std' => '12-hour',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'12-hour' => __('12-hour', 'options_check'),
			'12-hour-seconds' => __('12-hour-seconds', 'options_check'),
			'24-hour' => __('24-hour', 'options_check'),
			'24-hour-seconds' => __('24-hour-seconds', 'options_check')
			)
		);
		
	$options[] = array(
		'name' => __('Hide older posts', 'options_check'),
		'desc' => __('Enable this option will automaticaly hide posts after post date has past', 'options_check'),
		'id' => 'older-posts',
		'std' => 'off',
		'type' => 'select',
		'class' => 'tiny', //mini, tiny, small
		'options' => array(
			'off' => __('Disabled', 'options_check'),
			'frontend' => __('Hide from front-end', 'options_check'),
			'backend' => __('Hide from front-end and back-end', 'options_check')
			)
		);
		
	$options[] = array(
		'desc' => __('Select category for which hide older posts is valid', 'options_check'),
		'id' => 'hide-categories',
		'type' => 'select',
		'class' => 'tiny', 
		'options' => $options_categories
		);
	$options[] = array(
		'desc' => __('Add +/- days from now to hide posts (example: "+1 day", "-2 day" or "now")', 'options_check'),
		'id' => 'hide-post-date',
		'std' => 'now',
		'class' => 'mini', 
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Select pagination', 'options_check'),
		'desc' => __('Select how to display pages', 'options_check'),
		'id' => 'def-pagination-display',
		'std' => 'infinite',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $pagination_display);
		
	$options[] = array(
		'name' => __('Auto slide ', 'options_check'),
		'desc' => __('Enable or disable post auto slide ', 'options_check'),
		'id' => 'post-autorotate',
		'std' => 'off',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'on' => __('On', 'options_check'),
			'off' => __('Off', 'options_check')
		));
		$options[] = array(
		'desc' => __('Add slideshow delay in miliseconds', 'options_check'),
		'id' => 'post-autorotate-delay',
		'std' => '3000',
		'class' => 'mini', 
		'type' => 'text');
		
		
	
	$options[] = array(
		'name' => __('Open post effect', 'options_check'),
		'desc' => __('Enable or disable open post effect ', 'options_check'),
		'id' => 'post-fx',
		'std' => 'on',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'on' => __('On', 'options_check'),
			'off' => __('Off', 'options_check')
		));
	$options[] = array(
		'name' => __('Bounce to comments', 'options_check'),
		'desc' => __('On / Off automatic scrolling to comments on hitting bottom of the page ', 'options_check'),
		'id' => 'comments-bounce',
		'std' => 'on',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'on' => __('On', 'options_check'),
			'off' => __('Off', 'options_check')
		));
	
	$options[] = array(
		'name' => __('Disqus ID', 'options_check'),
		'desc' => __('Enter your disqus ID', 'options_check'),
		'id' => 'disqus-id',
		'std' => '',
		'class' => 'mini', 
		'type' => 'text');
	$options[] = array(
		'name' => __('Select first post', 'options_check'),
		'desc' => __('Select which post to be on focus first(number).', 'options_check'),
		'id' => 'select-first-post',
		'std' => '0',
		'class' => 'mini', 
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Post excerpt', 'options_check'),
		'desc' => __('Maximum excerpt symbols for square post type', 'options_check'),
		'id' => 'max-excerpt-square',
		'std' => '235',
		'class' => 'mini', 
		'type' => 'text');
	$options[] = array(
		'name' => __('Post excerpt', 'options_check'),
		'desc' => __('Maximum excerpt symbols for circle post type', 'options_check'),
		'id' => 'max-excerpt-circle',
		'std' => '225',
		'class' => 'mini', 
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Select logo', 'options_check'),
		'desc' => __('Select Logo (150x70)', 'options_check'),
		'id' => 'logo-img',
		'class' => 'small', 
		'type' => 'upload');
		
		
	$options[] = array(
		'name' => "Select default content style",
		'desc' => "*Select default content style: square or circle. You can change this option for every single post",
		'id' => "content-style",
		'std' => "square",
		'type' => "images",
		'options' => array(
			'square' => $imagepath . 'options/post-sqr.png',
			'circle' => $imagepath . 'options/post-circ.png',
			
			)
	);
	
	$options[] = array(
		'name' => __('Select other default settings ', 'options_check'),
		'desc' => __('Position', 'options_check'),
		'id' => 'content-position',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'left' => __('Left', 'options_check'),
			'right' => __('Right', 'options_check'),
			'center' => __('Center', 'options_check'),
			)
		);
	
	$options[] = array(
		'desc' => __('Sidebar', 'options_check'),
		'id' => 'show-sidebar',
		'std' => 'sbleft',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'sbleft' => __('Left sidebar', 'options_check'),
			'sbright' => __('Right sidebar', 'options_check'),
			'hide' => __('Hide', 'options_check')
			)
		);
	
	$options[] = array(
		'desc' => __('Title', 'options_check'),
		'id' => 'show-titile',
		'std' => 'show',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'show' => __('Show', 'options_check'),
			'hide' => __('Hide', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Post info data', 'options_check'),
		'id' => 'show-category',
		'std' => 'show',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'show' => __('Show', 'options_check'),
			'hide' => __('Hide', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Bottom line if post info adta is hidden', 'options_check'),
		'id' => 'show-soc',
		'std' => 'hide',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'show' => __('Show', 'options_check'),
			'hide' => __('Hide', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Slider effect', 'options_check'),
		'id' => 'img-effect',
		'std' => 'fade',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'fade' => __('Fade', 'options_check'),
			'slide' => __('Slide', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Slider direction (only if effect is set to "Slide")', 'options_check'),
		'id' => 'img-sdirection',
		'std' => 'horizontal',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'horizontal' => __('Horizontal', 'options_check'),
			'vertical' => __('Vertical', 'options_check')
			)
		);
		
	$options[] = array(
		'desc' => __('Images slideshow', 'options_check'),
		'id' => 'img-slideshow',
		'std' => 'false',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'true' => __('On', 'options_check'),
			'false' => __('Off', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Disqus comments', 'options_check'),
		'id' => 'show-ds-comments',
		'std' => 'off',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'on' => __('On', 'options_check'),
			'off' => __('Off', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Facebook comments', 'options_check'),
		'id' => 'show-fb-comments',
		'std' => 'off',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'on' => __('On', 'options_check'),
			'off' => __('Off', 'options_check')
			)
		);
	
	
	$options[] = array(
		'name' => __('Rollover images effect', 'options_check'),
		'desc' => __('Image rotate', 'options_check'),
		'id' => 'rollover-rotate',
		'std' => '10',
		'class' => 'mini', 
		'type' => 'text');
	$options[] = array(
		'desc' => __('Image scale', 'options_check'),
		'id' => 'rollover-scale',
		'std' => '2',
		'class' => 'mini', 
		'type' => 'text');
	$options[] = array(
		'desc' => __('Duration (in seconds)', 'options_check'),
		'id' => 'rollover-duration',
		'std' => '1',
		'class' => 'mini', 
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Rollout images effect', 'options_check'),
		'desc' => __('Image rotate', 'options_check'),
		'id' => 'rollout-rotate',
		'std' => '0',
		'class' => 'mini', 
		'type' => 'text');
	$options[] = array(
		'desc' => __('Image scale', 'options_check'),
		'id' => 'rollout-scale',
		'std' => '1',
		'class' => 'mini', 
		'type' => 'text');
	$options[] = array(
		'desc' => __('Duration (in seconds)', 'options_check'),
		'id' => 'rollout-duration',
		'std' => '1',
		'class' => 'mini', 
		'type' => 'text');
		
		

	
	$options[] = array(
		'name' => __('Welcome message', 'options_check'),
		'desc' => __('Activate welcome/info message to new visitors.', 'options_check'),
		'id' => 'wellcome-msg',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(

		'desc' => __('Add welcome/info message to new visitors', 'options_check'),
		'id' => 'wellcome-msg-text-hidden',
		'std' => '<span class="content-title">Welcome</span>
<span id="input-method">You can navigate trough the site by:</span><br /><br /><br /><div class="mouseico"></div>',
		'class' => 'hidden',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Footer', 'options_check'),
		'desc' => __('Activate footer.', 'options_check'),
		'id' => 'example_showhidden',
		'std' => '1',
		'type' => 'checkbox');
	
	
		
	$options[] = array(

		'desc' => __('Add footer content', 'options_check'),
		'id' => 'example_text_hidden',
		'std' => '<p><strong>Copyright 2014 </strong><br> Designed by <a href="http://yoursite.com">Your Name</a></p>',
		'class' => 'hidden',
		'type' => 'textarea');
	
	

	
	
	//Background slideshow
    //==================================================
	$options[] = array(
		'name' => __('Background slideshow', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Background Slideshow Settings', 'options_check'),
		'desc' => __('Activate Background Slideshow', 'options_check'),
		'id' => 'active-background',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Slideshow delay', 'options_check'),
		'desc' => __('Add slideshow delay in miliseconds', 'options_check'),
		'id' => 'background-slideshow',
		'std' => '7000',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => "Select background overlays",
		'desc' => "Change theme color scheme.",
		'id' => "background-overlays",
		'std' => "01",
		'type' => "images",
		'options' => array(
			'01' => $imagepath . 'adminico/p-01.jpg',
			'02' => $imagepath . 'adminico/p-02.jpg',
			'03' => $imagepath . 'adminico/p-03.jpg',
			'04' => $imagepath . 'adminico/p-04.jpg',
			'05' => $imagepath . 'adminico/p-05.jpg',
			'06' => $imagepath . 'adminico/p-06.jpg',
			'07' => $imagepath . 'adminico/p-07.jpg',
			'08' => $imagepath . 'adminico/p-08.jpg',
			'09' => $imagepath . 'adminico/p-09.jpg',
			'10' => $imagepath . 'adminico/p-10.jpg',
			'11' => $imagepath . 'adminico/p-11.jpg',
			'12' => $imagepath . 'adminico/p-12.jpg',
			'13' => $imagepath . 'adminico/p-13.jpg',
			'14' => $imagepath . 'adminico/p-14.jpg',
			'15' => $imagepath . 'adminico/p-15.jpg',
			'16' => $imagepath . 'adminico/p-16.png'
			)
	);
	$options[] = array(
		'name' => __('Select images', 'options_check'),
		'desc' => __('Select image', 'options_check'),
		'id' => 'background-img-1',
		'type' => 'upload');
	$options[] = array(
		'desc' => __('Fade in miliseconds', 'options_check'),
		'id' => 'background-fade-1',
		'std' => '4000',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Vertical alignment', 'options_check'),
		'id' => 'background-valign-1',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_valign);
	$options[] = array(
		'desc' => __('Horizontal alignment', 'options_check'),
		'id' => 'background-halign-1',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_halign);
	$options[] = array(
		'name' => __('', 'options_check'),
		'desc' => __('Select image', 'options_check'),
		'id' => 'background-img-2',
		'type' => 'upload');
	$options[] = array(
		'desc' => __('Fade in miliseconds', 'options_check'),
		'id' => 'background-fade-2',
		'std' => '4000',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Vartical alignment', 'options_check'),
		'id' => 'background-valign-2',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_valign);
	$options[] = array(
		'desc' => __('Horizontal alignment', 'options_check'),
		'id' => 'background-halign-2',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_halign);
	$options[] = array(
		'name' => __('', 'options_check'),
		'desc' => __('Select image', 'options_check'),
		'id' => 'background-img-3',
		'type' => 'upload');
	$options[] = array(
		'desc' => __('Fade in miliseconds', 'options_check'),
		'id' => 'background-fade-3',
		'std' => '4000',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Vartical alignment', 'options_check'),
		'id' => 'background-valign-3',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_valign);
	$options[] = array(
		'desc' => __('Horizontal alignment', 'options_check'),
		'id' => 'background-halign-3',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_halign);
	$options[] = array(
		'name' => __('', 'options_check'),
		'desc' => __('Select image', 'options_check'),
		'id' => 'background-img-4',
		'type' => 'upload');
	$options[] = array(
		'desc' => __('Fade in miliseconds', 'options_check'),
		'id' => 'background-fade-4',
		'std' => '4000',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Vartical alignment', 'options_check'),
		'id' => 'background-valign-4',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_valign);
	$options[] = array(
		'desc' => __('Horizontal alignment', 'options_check'),
		'id' => 'background-halign-4',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_halign);
	$options[] = array(
		'name' => __('', 'options_check'),
		'desc' => __('Select image', 'options_check'),
		'id' => 'background-img-5',
		'type' => 'upload');
	$options[] = array(
		'desc' => __('Fade in miliseconds', 'options_check'),
		'id' => 'background-fade-5',
		'std' => '4000',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Vartical alignment', 'options_check'),
		'id' => 'background-valign-5',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_valign);
	$options[] = array(
		'desc' => __('Horizontal alignment', 'options_check'),
		'id' => 'background-halign-5',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $background_halign);
	
	//Background Video
    //==================================================
	$options[] = array(
		'name' => __('Background video', 'options_check'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Youtube Background Video', 'options_check'),
		'desc' => __('Activate Background Video', 'options_check'),
		'id' => 'active-backgroud-yt',
		'std' => '0',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('Add Youtube ID', 'options_check'),
		'id' => 'yt-bg-id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'desc' => __('Video controls', 'options_check'),
		'id' => 'yt-bg-cotrols',
		'std' => 'off',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'on' => __('On', 'options_check'),
			'off' => __('Off', 'options_check')
			)
	);
		
	$options[] = array(
		'desc' => __('Mute video', 'options_check'),
		'id' => 'yt-bg-mute',
		'std' => 'true',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'true' => __('Mute', 'options_check'),
			'false' => __('Unmute', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Repeat video', 'options_check'),
		'id' => 'yt-bg-repeat',
		'std' => 'true',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'true' => __('Repeat', 'options_check'),
			'false' => __('Play once', 'options_check')
			)
		);
	$options[] = array(
		'desc' => __('Starting position in seconds', 'options_check'),
		'id' => 'yt-bg-start',
		'std' => '0',
		'class' => 'mini',
		'type' => 'text');

		
	$options[] = array(
		'name' => __('Background Video Settings', 'options_check'),
		'desc' => __('Activate Background Video', 'options_check'),
		'id' => 'active-backgroud-video',
		'std' => '0',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __('Select image ', 'options_check'),
		'desc' => __('Select image', 'options_check'),
		'id' => 'background-video-image',
		'type' => 'upload');
	$options[] = array(
		'name' => __('Select video (videos must be with same name)', 'options_check'),
		'desc' => __('Select mp4 video', 'options_check'),
		'id' => 'background-video-mp4',
		'type' => 'upload');
	$options[] = array(
		'name' => __('', 'options_check'),
		'desc' => __('Select ogv video', 'options_check'),
		'id' => 'background-video-ogv',
		'type' => 'upload');
		
	//Translate
    //==================================================
	$options[] = array(
		'name' => __('Translate', 'options_check'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Post', 'options_check'),
		'desc' => __('Read more link', 'options_check'),
		'id' => 'tr-readmore',
		'std' => 'Read more',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'name' => __('Search Page', 'options_check'),
		'desc' => __('Search nothing found title', 'options_check'),
		'id' => 'tr-searchtitle',
		'std' => 'Nothing Found',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Search nothing found subtitle', 'options_check'),
		'id' => 'tr-searchsubtitle',
		'std' => 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.',
		'class' => 'mini',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Recent post widget', 'options_check'),
		'id' => 'tr-search-rpw',
		'std' => 'Recent Posts',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Archive widget', 'options_check'),
		'id' => 'tr-search-aw',
		'std' => 'Archive',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Tags widget', 'options_check'),
		'id' => 'tr-search-tw',
		'std' => 'Tags',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Comments', 'options_check'),
		'desc' => __('Disqus comments title', 'options_check'),
		'id' => 'tr-disqus-title',
		'std' => 'Disqus',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Facebook comments title', 'options_check'),
		'id' => 'tr-facebook-title',
		'std' => 'Facebook',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Leave a reply title label', 'options_check'),
		'id' => 'tr-comm-title',
		'std' => 'Leave a Reply',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Leave a reply subtitle', 'options_check'),
		'id' => 'tr-comm-subtitle',
		'std' => 'Your email address will not be published.',
		'class' => 'tiny',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Submint button label', 'options_check'),
		'id' => 'tr-comm-submit',
		'std' => 'Post Comment',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Wrong comment filed', 'options_check'),
		'id' => 'tr-comm-error',
		'std' => 'You might have left one of the fields blank, or be posting too quickly',
		'class' => 'tiny',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Comment is send', 'options_check'),
		'id' => 'tr-comm-thanks',
		'std' => 'Thanks for your comment. We appreciate your response.',
		'class' => 'tiny',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Processing comment', 'options_check'),
		'id' => 'tr-comm-process',
		'std' => 'Processing...',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Author label', 'options_check'),
		'id' => 'tr-comm-author',
		'std' => 'Name',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('E-mail label', 'options_check'),
		'id' => 'tr-comm-email',
		'std' => 'E-mail',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Comment label', 'options_check'),
		'id' => 'tr-comm-comment',
		'std' => 'Comment',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Logged in as label', 'options_check'),
		'id' => 'tr-comm-loggedin',
		'std' => 'Logged in as',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('You must be logged in label', 'options_check'),
		'id' => 'tr-comm-mustlogin',
		'std' => 'You must be logged to post a comment.',
		'class' => 'tiny',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Log in label', 'options_check'),
		'id' => 'tr-comm-login',
		'std' => 'Log in.',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Older comments button label', 'options_check'),
		'id' => 'tr-comm-backbutton',
		'std' => 'Older Comments',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Newer comments button label', 'options_check'),
		'id' => 'tr-comm-nextbutton',
		'std' => 'Newer Comments',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Log out label', 'options_check'),
		'id' => 'tr-comm-logout',
		'std' => 'Log out?',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('User said', 'options_check'),
		'id' => 'tr-comm-said',
		'std' => 'said',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Date at time label', 'options_check'),
		'id' => 'tr-comm-attime',
		'std' => 'at',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Waiting moderation text', 'options_check'),
		'id' => 'tr-comm-waitapp',
		'std' => 'Your comment is awaiting moderation.',
		'class' => 'tiny',
		'type' => 'text');
	$options[] = array(
		'name' => __('Voice control tooltip', 'options_check'),
		'desc' => __('Voice control tooltip title', 'options_check'),
		'id' => 'vc-tt-title',
		'std' => 'Voice control',
		'class' => 'tiny',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Voice control info', 'options_check'),
		'id' => 'vc-tt-info',
		'std' => '<br>Listed below are the available voice commands <br> 
<p><i class="icon-microphone"></i><strong>Homepage</strong> - go to homepage<br>
<i class="icon-microphone"></i><strong>Next</strong> - slide to next post<br>
<i class="icon-microphone"></i><strong>Previous</strong> - slide to previous post<br>
<i class="icon-microphone"></i><strong>Scroll back</strong> - go to first post<br>
<i class="icon-microphone"></i><strong>Scroll down</strong> - scroll down<br>
<i class="icon-microphone"></i><strong>Scroll up</strong> - scroll up<br>
<i class="icon-microphone"></i><strong>Tweet</strong> - tweet on twitter<br>
<i class="icon-microphone"></i><strong>Share</strong> - share on facebook<br>
<i class="icon-microphone"></i><strong>Open</strong> - open post<br>
<i class="icon-microphone"></i><strong>Search for</strong> - search<br>
<i class="icon-microphone"></i><strong>More from same category</strong> - same category<br>
<i class="icon-microphone"></i><strong>Show comments</strong> - shows comments<br>
<i class="icon-microphone"></i><strong>Show picture</strong> - opens big image<br>
<i class="icon-microphone"></i><strong>Close</strong> - closes big image<br>
</p>',
		'class' => 'tiny',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Navigation tooltip', 'options_check'),
		'id' => 'tr-nav-tooltip',
		'std' => 'Navigate trough timeline',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'name' => __('Small info text', 'options_check'),
		'desc' => __('Home info text', 'options_check'),
		'id' => 'tr-home-info',
		'std' => 'posts<br>at home page',
		'class' => 'mini',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Search info text', 'options_check'),
		'id' => 'tr-search-info',
		'std' => 'results<br>found',
		'class' => 'mini',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Archive info text', 'options_check'),
		'id' => 'tr-archive-info',
		'std' => 'posts<br>in archive',
		'class' => 'mini',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Category info text', 'options_check'),
		'id' => 'tr-category-info',
		'std' => 'posts<br>in category',
		'class' => 'mini',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('Clock dates', 'options_check'),
		'desc' => __('January', 'options_check'),
		'id' => 'tr-months-jan',
		'std' => 'January',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('February', 'options_check'),
		'id' => 'tr-months-feb',
		'std' => 'February',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('March', 'options_check'),
		'id' => 'tr-months-mar',
		'std' => 'March',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('April', 'options_check'),
		'id' => 'tr-months-apr',
		'std' => 'April',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('May', 'options_check'),
		'id' => 'tr-months-may',
		'std' => 'May',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('June', 'options_check'),
		'id' => 'tr-months-jun',
		'std' => 'June',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('July', 'options_check'),
		'id' => 'tr-months-jul',
		'std' => 'July',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('August', 'options_check'),
		'id' => 'tr-months-aug',
		'std' => 'August',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('September', 'options_check'),
		'id' => 'tr-months-sep',
		'std' => 'September',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('October', 'options_check'),
		'id' => 'tr-months-oct',
		'std' => 'October',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('November', 'options_check'),
		'id' => 'tr-months-nov',
		'std' => 'November',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('December', 'options_check'),
		'id' => 'tr-months-dec',
		'std' => 'December',
		'class' => 'mini',
		'type' => 'text');
		
	//Voice control
    //==================================================
	$options[] = array(
		'name' => __('Voice control', 'options_check'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Voice control settings', 'options_check'),
		'desc' => __('Activate voice control', 'options_check'),
		'id' => 'active-voicecontrol',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'desc' => __('Select recognition language', 'options_check'),
		'id' => 'vc-set-lang',
		'std' => 'en',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
			'af' => __('Afrikaans', 'options_check'),
			'ar' => __('Arabic', 'options_check'),
			'eu' => __('Basque', 'options_check'),
			'bg' => __('Bulgarian', 'options_check'),
			'ca' => __('Catalan', 'options_check'),
			'cs' => __('Czech', 'options_check'),
			'nl' => __('Dutch', 'options_check'),
			'en' => __('English', 'options_check'),
			'fi' => __('Finnish', 'options_check'),
			'fr' => __('French', 'options_check'),
			'gl' => __('Galician', 'options_check'),
			'de' => __('German', 'options_check'),
			'he' => __('Hebrew', 'options_check'),
			'hu' => __('Hungarian', 'options_check'),
			'is' => __('Icelandic', 'options_check'),
			'it' => __('Italian', 'options_check'),
			'id' => __('Indonesian', 'options_check'),
			'ja' => __('Japanese', 'options_check'),
			'ko' => __('Korean', 'options_check'),
			'la' => __('Latin', 'options_check'),
			'cmn' => __('Mandarin Chinese', 'options_check'),
			'ms' => __('Malaysian', 'options_check'),
			'no' => __('Norwegian', 'options_check'),
			'pl' => __('Polish', 'options_check'),
			'pt' => __('Portuguese', 'options_check'),
			'ro' => __('Romanian', 'options_check'),
			'ru' => __('Russian', 'options_check'),
			'sr' => __('Serbian', 'options_check'),
			'sk' => __('Slovak', 'options_check'),
			'es' => __('Spanish', 'options_check'),
			'sv' => __('Swedish', 'options_check'),
			'tr' => __('Turkish', 'options_check'),
			'zu' => __('Zulu', 'options_check')
			)
		);
	
	$options[] = array(
	'name' => __('Change vocie commands as you wish (you can use phrases)', 'options_check'),
		'desc' => __('Scroll to next post', 'options_check'),
		'id' => 'vc-slide-next',
		'std' => 'next',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Scroll to previous post', 'options_check'),
		'id' => 'vc-slide-prev',
		'std' => 'previous',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Scroll back to first post', 'options_check'),
		'id' => 'vc-scroll-back',
		'std' => 'scroll back',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Scroll down', 'options_check'),
		'id' => 'vc-scroll-down',
		'std' => 'scroll down',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Scroll up', 'options_check'),
		'id' => 'vc-scroll-up',
		'std' => 'scroll up',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Back to home page', 'options_check'),
		'id' => 'vc-home-page',
		'std' => 'home page',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Search for... ', 'options_check'),
		'id' => 'vc-search-for',
		'std' => 'search for',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Open the post', 'options_check'),
		'id' => 'vc-open-post',
		'std' => 'open',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('More from same category', 'options_check'),
		'id' => 'vc-more-cat',
		'std' => 'more from same category',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Open comments', 'options_check'),
		'id' => 'vc-read-comm',
		'std' => 'show comments',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'desc' => __('Show big picture', 'options_check'),
		'id' => 'vc-open-img',
		'std' => 'show picture',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Close', 'options_check'),
		'id' => 'vc-close',
		'std' => 'close',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Tweet on twitter', 'options_check'),
		'id' => 'vc-share-tw',
		'std' => 'tweet',
		'class' => 'mini',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Share on facebook', 'options_check'),
		'id' => 'vc-share-fb',
		'std' => 'share',
		'class' => 'mini',
		'type' => 'text');
		
		
		
		
		
	
	//Colors settings
    //==================================================
	$options[] = array(
			'name' => __('Colors Settings', 'options_check'),
			'type' => 'heading');
	$options[] = array(
		'name' => __('Color scheme', 'options_check'),
		'desc' => __('Color scheme', 'options_check'),
		'id' => 'body-color-scheme',
		'std' => 'turquoise',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array (
			'turquoise'	=>  __('Turquoise', 'options_check'),
			'greensea'	=>  __('Green sea', 'options_check'),
			'emerald'	=>  __('Emerald', 'options_check'),
			'nephritis'	=>  __('Nephritis', 'options_check'),
			'peterriver'	=>  __('Peter river', 'options_check'),
			'belizehole'	=>  __('Belize hole', 'options_check'),
			'amethyst'	=>  __('Amethyst', 'options_check'),
			'wisteria'	=>  __('Wisteria', 'options_check'),
			'wetasphalt'	=>  __('Wet asphalt', 'options_check'),
			'midnightblue'	=>  __('Midnight blue', 'options_check'),
			'sunflower'	=>  __('Sun flower', 'options_check'),
			'orange'	=>  __('Orange', 'options_check'),
			'carrot'	=>  __('Carrot', 'options_check'),
			'pumpkin'	=>  __('Pumpkin', 'options_check'),
			'alizarin'	=>  __('Alizarin', 'options_check'),
			'pomegranate'	=>  __('Pomegranate', 'options_check'),
			'concrete'	=>  __('Concrete', 'options_check'),
			'asbestos'	=>  __('Asbestos', 'options_check')
			
			)
		);
	
	
		
	$options[] = array(
		'name' => __('Buttons', 'options_check'), 
		'desc' => __('Button typography.', 'options_check'),
		'id' => "button_typography",
		'std' => array(
			'size' => '12px',
			'face' => 'Open Sans',
			'color' => '#ffffff' ),
		'type' => 'typography',
		'options' => array(
			'faces' => options_typography_get_google_fonts(),
			'styles' => false ));
	$options[] = array( 
		'name' => __('Body text', 'options_check'),
		'desc' => __('Chabge your body typography.', 'options_check'),
		'id' => "body_typography",
		'std' => array(
			'size' => '12px',
			'face' => 'Open Sans'),
		'type' => 'typography',
		'options' => array(
			'faces' => options_typography_get_google_fonts(),
			'color' => false,
			'styles' => false ));
	$options[] = array( 
		'name' => __('Titles', 'options_check'),
		'desc' => __('Titles typography.', 'options_check'),
		'id' => "title_typography",
		'std' => array(
			'size' => '30px',
			'face' => 'Open Sans',
			'styles' => 'normal'
			 ),
		'type' => 'typography',
		'options' => $typography_options_titles);
		
	$options[] = array( 
		'name' => __('Menu', 'options_check'),
		'desc' => __('Menu typography.', 'options_check'),
		'id' => "menu_typography",
		'std' => array(
			'size' => '13px',
			'face' => 'Open Sans'
			 ),
		'type' => 'typography',
		'options' => array(
			'faces' => options_typography_get_google_fonts(),
			'color' => false,
			'styles' =>  array(
	"normal" => "Normal",
	"italic" => "Italic",
	"bold" => "Bold",
	"bold italic" => "Bold italic"
	) ));
	
	$options[] = array(
		'desc' => __('Ground line color', 'options_check'),
		'id' => 'color_gl',
		'std' => '#000000',
		'type' => 'color' );

		
	
	return $options;
	
}