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
global $ab_tf_row_style, $ab_tf_img_title, $ab_tf_img_content, $ab_tf_img_link, $ab_tf_img_buttontitle, $ab_tf_post_showsoc, $ab_tf_post_showtitle, $ab_tf_post_showcategory , $ab_tf_post_showdate, $ab_tf_post_showfbcomments, $ab_tf_post_bgimage, $ab_tf_post_img_slideshow, $ab_tf_post_embed_video_yt, $ab_tf_post_embed_video_vm, $ab_tf_show_sidebar, $ab_tf_post_img_effect, $ab_tf_post_img_sdirection, $ab_tf_post_excerpt, $ab_tf_post_color, $ab_tf_post_show_featured, $ab_tf_post_img_link, $ab_tf_post_showdscomments, $ab_tf_post_content_position, $ab_tf_post_content_width;
if(isset($post_meta_data['custom_repeatable'][0]) ){
			$custom_repeatable = unserialize($post_meta_data['custom_repeatable'][0]); 
		}else{
			$custom_repeatable[0] = '';
		};
		
		if(isset( $post_meta_data['custom_select_color_style'][0]))
			$ab_tf_post_color = $post_meta_data['custom_select_color_style'][0];
		else $ab_tf_post_color = "turquoise";
		if(isset( $post_meta_data['custom_select_row_style'][0]))
			$ab_tf_row_style = $post_meta_data['custom_select_row_style'][0];
		else $ab_tf_row_style = "scuare";
		if(isset($post_meta_data['custom_img_title'][0]))
			$ab_tf_img_title = $post_meta_data['custom_img_title'][0];
		else $ab_tf_img_title ='';
		if(isset($post_meta_data['custom_img_content'][0]))
			$ab_tf_img_content = $post_meta_data['custom_img_content'][0];
		else $ab_tf_img_content ='';
		if(isset($post_meta_data['custom_img_link'][0]))
			$ab_tf_img_link = $post_meta_data['custom_img_link'][0];
		else $ab_tf_img_link='';
		if(isset($post_meta_data['custom_img_buttontitle'][0]))
			$ab_tf_img_buttontitle = $post_meta_data['custom_img_buttontitle'][0];
		else $ab_tf_img_buttontitle ='';
		if(isset($post_meta_data['custom_select_show_sidebar'][0]))
			$ab_tf_show_sidebar = $post_meta_data['custom_select_show_sidebar'][0];
		else $ab_tf_show_sidebar ='hide';
        if(isset($post_meta_data['custom_select_show_soc'][0]))
			$ab_tf_post_showsoc = $post_meta_data['custom_select_show_soc'][0];
		else $ab_tf_post_showsoc ='show';
		if(isset($post_meta_data['custom_select_show_title'][0]))
			$ab_tf_post_showtitle = $post_meta_data['custom_select_show_title'][0];
		else $ab_tf_post_showtitle = 'show';
		if(isset($post_meta_data['custom_select_show_category'][0]))
			$ab_tf_post_showcategory = $post_meta_data['custom_select_show_category'][0];
		else $ab_tf_post_showcategory = 'show';
		if(isset($post_meta_data['custom_select_show_date'][0]))
			$ab_tf_post_showdate = $post_meta_data['custom_select_show_date'][0];
		else $ab_tf_post_showdate = 'show';
		if(isset($post_meta_data['custom_select_fb_comments'][0]))
			$ab_tf_post_showfbcomments = $post_meta_data['custom_select_fb_comments'][0];
		else $ab_tf_post_showfbcomments = 'off';
		if(isset($post_meta_data['custom_select_post_excerpt'][0]))
			$ab_tf_post_excerpt = $post_meta_data['custom_select_post_excerpt'][0];
		else $ab_tf_post_excerpt = 'on';
		if(isset($post_meta_data['custom_image'][0]))
			$ab_tf_post_bgimage = $post_meta_data['custom_image'][0];
		else $ab_tf_post_bgimage = '';
		if(isset($post_meta_data['custom_select_img_effect'][0]))
			$ab_tf_post_img_effect = $post_meta_data['custom_select_img_effect'][0];
		else $ab_tf_post_img_effect = 'fade';
		if(isset($post_meta_data['custom_select_img_sdirection'][0]))
			$ab_tf_post_img_sdirection = $post_meta_data['custom_select_img_sdirection'][0];
		else $ab_tf_post_img_sdirection = 'horizontal';
		if(isset($post_meta_data['custom_select_img_slideshow'][0]))
			$ab_tf_post_img_slideshow = $post_meta_data['custom_select_img_slideshow'][0];
		else $ab_tf_post_img_slideshow = 'false';
		if(isset($post_meta_data['custom_embed_video_yt'][0]))
			$ab_tf_post_embed_video_yt = $post_meta_data['custom_embed_video_yt'][0];
		else $ab_tf_post_embed_video_yt = '';
		if(isset($post_meta_data['custom_embed_video_vm'][0]))
			$ab_tf_post_embed_video_vm = $post_meta_data['custom_embed_video_vm'][0];
		else $ab_tf_post_embed_video_vm = '';
		if(isset($post_meta_data['custom_select_ds_comments'][0]))
			$ab_tf_post_showdscomments = $post_meta_data['custom_select_ds_comments'][0];
		else $post_ribbon_display = 'off';
		if(isset($post_meta_data['custom_select_show_featured'][0]))
			$ab_tf_post_show_featured = $post_meta_data['custom_select_show_featured'][0];
		else $ab_tf_post_show_featured = '';
		if(isset($post_meta_data['custom_select_img_link'][0]))
			$ab_tf_post_img_link = $post_meta_data['custom_select_img_link'][0];
		else $ab_tf_post_img_link = 'image';
		if(isset($post_meta_data['custom_select_content_position'][0]))
			$ab_tf_post_content_position = $post_meta_data['custom_select_content_position'][0];
		else $ab_tf_post_content_position = 'center';
		if(isset($post_meta_data['custom_select_content_width'][0]))
			$ab_tf_post_content_width = $post_meta_data['custom_select_content_width'][0];
		else $ab_tf_post_content_width = 'boxed';
		?>