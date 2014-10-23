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
//TRANSLATION VARS
//=====================================================
$vc_tt_title = of_get_option('vc-tt-title','Voice Browsing Options');
$vc_tt_info = of_get_option('vc-tt-info', '<br>Available voice commands <br> 
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
</p>' );



$tr_nav_tooltip= of_get_option('tr-nav-tooltip','Navigate trough timeline');
$tr_home_info = of_get_option('tr-home-info','posts<br>at home page');
$tr_search_info = of_get_option('tr-search-info', 'results<br>found');
$tr_archive_info = of_get_option('tr-archive-info', 'posts<br>in archive');
$tr_category_info = of_get_option('tr-category-info','posts<br>in category');
//CONVERT SIDEBAR TO STRING
//=====================================================
ob_start();
dynamic_sidebar('archive-time');
$sidebar = ob_get_contents();
ob_end_clean();

?>
                <div id="footer" <?php if(of_get_option('active-glass') == 1){?>class="glassstyle"<?php }?> <?php if(of_get_option('active-dglass') == 1){?>class="dglassstyle"<?php }?>>
                    <div class="f-padding"><div class="logo animated fadeOutH">
                        <a href="<?php echo get_site_url(); ?>" class="logohover">
                            <img src="<?php echo of_get_option('logo-img', get_template_directory_uri()."/images/logo.png" ); ?>" />
                        </a> 
                    </div><?php 
                    if(of_get_option('example_showhidden', 'no entry' ) !='0'){ ?>
                    <div class="copyrholder animated fadeOutH">
                        <?php echo of_get_option('example_text_hidden', '<p><strong>Copyright 2014 </strong><br> Designed by Your Name</p>' ); ?> 
                    </div> <?php
                    }; ?>                   
                </div>
            </div>
    	</div>
    </div>    
</div>


<div class="right-bottom-nav">
<div class="breadcrumbs animated fadeOutH">
    <?php if(function_exists('bcn_display')){
        bcn_display();
    }?>
</div>
	<div id="tt-voice-c" class="tt-voice-c animated fadeOutH" data-ot='<h4><a href="#"><?php echo $vc_tt_title;?></a></h4><div class="vc-info"><?php echo $vc_tt_info ?></div>'  data-ot-fixed="true"  data-ot-background="rgba(0,0,0,0.7)" data-ot-border-color="rgba(0,0,0,0.8)" data-ot-offset="[ 15, -10 ]" data-ot-auto-offset="true" data-ot-tip-joint="top center" data-ot-target="true" data-ot-border-radius="0">
		<i id="vocie-control" class="icon-microphone-off navkey"></i> 
    </div>
    
	<div class="tt-bottom-nav animated fadeOutH" data-ot='<?php echo $tr_nav_tooltip;?>'  data-ot-fixed="true"  data-ot-background="rgba(0,0,0,0.5)" data-ot-border-color="rgba(0,0,0,0.8)" data-ot-offset="[ 15, -10 ]" data-ot-auto-offset="true" data-ot-tip-joint="top center" data-ot-target="true" data-ot-border-radius="0" >
		<i id="backb-arrow" class="icon-step-backward navkey" ></i> 
        <i id="next-arrow" class="icon-chevron-down navkey" ></i> 
        <i id="enter-arrow" class="icon-level-down navkey"></i> 
        <i id="prev-arrow" class="icon-chevron-up navkey "></i>
	</div>
	<div id="footer-time" class="date-time animated fadeOutH" data-ot='<?php echo htmlentities($sidebar, ENT_QUOTES, "UTF-8"); ?>&nbsp;'  data-ot-fixed="true" data-ot-hide-trigger="closeButton" <?php /*?>data-ot-show-on="click"<?php */?> data-ot-background="rgba(0,0,0,0.7)" data-ot-border-color="rgba(0,0,0,0.8)" data-ot-offset="[ 0, -10 ]" data-ot-auto-offset="true" data-ot-tip-joint="top center" data-ot-target="true" data-ot-border-radius="0" data-ot-close-button-radius="11" data-ot-close-button-cross-size="7"  data-ot-close-button-cross-color="#fff">
		<div class="tt-b-day <?php if(is_single() || is_page()){?>rem-border<?php } ?> "></div>
		<div class="tt-b-day-r">
            <div class="tt-b-month"></div>
            <div class="tt-b-date" ></div>
        </div>	
        <div class="tt-b-time-r">
            <div class="tt-b-time"></div>
            <div class="tt-b-amp"></div>
        </div>
	</div>
    
    <div class="inifiniteLoader animated">
		<div class="loading"></div>
	</div>
    <div  class="animated numpostinfi <?php if(of_get_option('def-pagination-display') == "pagination"){?>bottom-nav-hide<?php }?>"><?php 
		if ( is_home()  ){?>
       		<div class="numpostcontent"><?php
				echo "<div class='tt-big-dig'>".$wp_query->found_posts."</div> <div class='tt-dig-txt' >".$tr_home_info."</div>"; ?>
            </div><?php
 		}else if(is_search()){?>
       		<div class="numpostcontent"><?php
                echo "<div class='tt-big-dig'>".$wp_query->found_posts."</div> <div class='tt-dig-txt'>".$tr_search_info."</div>"; ?>
            </div><?php
		}else if(is_archive()){?>
       		<div class="numpostcontent"><?php
				$cat_obj = $wp_query->get_queried_object();
			//	foreach((get_the_category()) as $category) { $category->cat_name . ' '; }
				if(is_category()){
					
					$category = $cat_obj->cat_name; 
					$infoend = $tr_category_info.' '.$category;	
					//echo '<a href="'.get_category_link(get_cat_id($category->cat_name)).'">'.$category->cat_name.'</a>';
					
				}else{
					$infoend = $tr_archive_info;
				}
				echo "<div class='tt-big-dig'>".$wp_query->found_posts."</div> <div class='tt-dig-txt'>".$infoend."</div>"; ?>
            </div><?php 
		}?>
	</div>
</div>

<div class="cn-overlay"></div>  
<audio id="beep-two">
    <source src="<?php echo get_template_directory_uri();?>/images/audio/click.mp3"></source>
    <source src="<?php echo get_template_directory_uri();?>/images/audio/click.ogg"></source>
</audio>
<div id="sounddiv"><bgsound id="sound"></div>

<div id="dl-menu" class="dl-menuwrapper animated fadeOutH">
	<div class="cn-buttonbg"></div>
	<button class="dl-trigger">Open Menu</button><?php 
	wp_nav_menu( array( 'sort_column' => 'menu_order','container' => '', 'menu_class' => 'dl-menu', 'sub_menu_class' => 'dl-submenu', 'menu_id' => 'nav', 'theme_location' => 'primary-menu' ) );?>
</div>
<?php include('functions/java-fun.php');?>            
<?php wp_footer();?>
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styleIE.css" />
<![endif]-->
</body>
</html>