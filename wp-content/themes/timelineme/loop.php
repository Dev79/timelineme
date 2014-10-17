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

if(have_posts()) :
$firsttime = 0;
$postsperpage = get_option('posts_per_page');
$currentpage = get_query_var('paged');
$tr_readmore = of_get_option('tr-readmore', 'Read more');

while(have_posts()) : the_post();
	//if (is_search() && ($post->post_type=='page')) continue;
		$id = get_the_ID();
		$post_meta_data = get_post_custom($post->ID);
		include('functions/post-settings.php');?>
			<section class="<?php echo $ab_tf_post_color; ?>"><?php 
			if($firsttime !=1 ){?>
                <script>
				  window.scrollinit();
					
					
                </script><?php 
				$firsttime = 1; 
			};
				do_shortcode( get_the_content() );
				
				//ROW BODY
				//=====================================================?>
				<div class="tt-cn-style <?php if($ab_tf_post_content_position == "right"){?> right-content <?php }elseif($ab_tf_post_content_position == "left"){?> left-content<?php }elseif($ab_tf_post_content_position == "center"){?> center-content<?php }; if($ab_tf_post_content_width == "boxed" && $ab_tf_row_style != "circle"){?> nonfull<?php }; if($ab_tf_row_style == "circle"){?> is-circle <?php }?> <?php if($ab_tf_post_showcategory == "hide" && $ab_tf_post_showsoc == "hide" || $ab_tf_row_style == "circle"){ ?>gcnopadding<?php }?>"><?php
					//JAVASCRIPT FOR FLEX SLIDER AND FADE IN
					//=====================================================?>
					<?php
					do_shortcode( get_the_content() );
					
					//ROW BODY
					//=====================================================?>
					<?php if($custom_repeatable[0] != ''){?>
						<script>
							jQuery( document ).ready( function($){	
							setTimeout(function(){				 
								$('#flexslider-<?php echo $id;?>').flexslider({
									animation: "<?php echo $ab_tf_post_img_effect; ?>",
									direction: "<?php echo $ab_tf_post_img_sdirection; ?>",
									slideshow: <?php echo $ab_tf_post_img_slideshow; ?>,
									smoothHeight: false,
								})
								}, 200);
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
												}else if($ab_tf_post_img_link =='image'){?>
													<a class="voice-bigimage" href="<?php echo $srcf[0]; ?>" rel="prettyPhotoImages[<?php echo $id; ?>]">
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
															$category = get_the_category();?>
															<div class="empty-left time-holder "> <a class="read-more-init voice-morefromthis" href="<?php echo get_category_link( $category[0]->term_id );?>"><i class="icon-tag"></i> <?php echo $category[0]->cat_name;?></a>
															</div>
															<?php if ( comments_open()){?>
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
					  <a class="share-btna share-three" rel="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title();?>" href="javascript:window.open('https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title();?>', '_blank', 'width=550,height=420');void(0);"><i class="icon-twitter"></i></a>
							</div>
						</div>
						<div class="timedateafter"></div>
						<div class="tt-arrow-side<?php if($ab_tf_post_color != 'gglass gdarck' && $ab_tf_post_color != 'gglass' && $ab_tf_post_showcategory != "hide" || $ab_tf_post_color != 'gglass gdarck' && $ab_tf_post_color != 'gglass' && $ab_tf_post_showsoc != "hide" ){?> iswhite<?php }; ?>"></div>
						<div class="tt-arrow-dot blink"></div>
						<div class="reslines"></div>
					</div>
                </div>
			</section>
<?php endwhile; wp_reset_query() ?>
<?php endif;?>
