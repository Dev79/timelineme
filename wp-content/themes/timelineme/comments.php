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
	$tr_comm_submit = of_get_option('tr-comm-submit', "Post Comment");
	$tr_comm_author = of_get_option('tr-comm-author', "Author");
	$tr_comm_email = of_get_option('tr-comm-email', "E-mail");
	$tr_comm_comment = of_get_option('tr-comm-comment', "Comment");
	$tr_comm_title = of_get_option('tr-comm-title', "Leave a Reply");
	$tr_comm_subtitle = of_get_option('tr-comm-subtitle', "");
	$tr_comm_loggedin = of_get_option('tr-comm-loggedin', "Logged in as");
	$tr_comm_logout = of_get_option('tr-comm-logout', "Log out?");
	$tr_comm_mustlogin = of_get_option('tr-comm-mustlogin', "You must be logged to post a comment.");
	$tr_comm_login = of_get_option('tr-comm-login', "Log in.");
	$tr_comm_backbutton = of_get_option('tr-comm-backbutton', "Older Comments");
	$tr_comm_nextbutton = of_get_option('tr-comm-nextbutton', "Newer Comments");

if(!post_password_required()){
	if ( have_comments() ) {
		global $fbcomm, $ab_tf_post_showfbcomments;
		if ( $ab_tf_post_showfbcomments == 'on' ){
			$fbcomm = 2;
		}else{
			$fbcomm = 1;
		}
		wp_list_comments( array( 'callback' => 'ab_tf_timetrvale_comment', 'end-callback'=> 'ab_tf_tt_end' ) );
	}
}
global $fbcomm, $ab_tf_post_showfbcomments, $scramble, $ab_tf_post_color; 
if(comments_open() ){?>
	<section class="<?php if($scramble == 1){?>right-content<?php  }else {?>left-content<?php };?> "> 
		<div class="tt-cn-style <?php if($scramble == 1){?>right-content<?php  }else {?>left-content<?php };?> ">
        <?php if($scramble==0){
			 $scramble=1;
		}else{
			 $scramble=0;
		};?>    
		<div class=" ss-row iscomm">
			<div class="container-border ">
				<div class="gray-container <?php  echo $ab_tf_post_color;?> addcolor">
					<div class="nano addcomm" >
                    	<div class="cscrol content">
							<div class="comments-add-c"><?php
								if( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ){?>
									<p class="nocomments"><?php echo 'Comments are closed.'; ?></p><?php
								};
								$args = array(
									'id_form'           => 'commentform',
									'id_submit'         => 'submit',
									'title_reply'       => '',
									'title_reply_to'    => $tr_comm_title.'to %s',
									'label_submit'      => $tr_comm_submit ,
									
									'comment_field'		=>  '<div class="comment-form-comment"><label for="comment">' .$tr_comm_comment .
									'</label><textarea id="comment" name="comment" cols="45" rows="3" aria-required="true">' .
									'</textarea></div>',
									
									'must_log_in' 		=> '<div class="must-log-in">' .
									sprintf(
									  $tr_comm_mustlogin.' <a href="%s">'.$tr_comm_login .'</a>',
									  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
									) . '</div>',
									
									'logged_in_as' 		=> '<div class="logged-in-as">' .
									sprintf(
									 $tr_comm_loggedin.' <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">'.$tr_comm_logout.'</a>' ,
									  admin_url( 'profile.php' ),
									  $user_identity,
									  wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
									) . '</div>',
									
									'comment_notes_before' => '<div class="comment-notes">' .$tr_comm_subtitle.
									'</div>',
									
									'comment_notes_after' => '',
									
									'fields' 		=> apply_filters( 'comment_form_default_fields', array(
									
									'author' 		=>
									  '<div class="comment-form-author">' .
									  '<label for="author">'.$tr_comm_author.'</label><span class="required">*</span>
									  <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
									  '" size="30" /></div>',
									
									'email' 		=>
									  '<div class="comment-form-email"><label for="email">'.$tr_comm_email.'</label> ' .
									  ( $req ? '<span class="required">*</span>' : '' ) .
									  '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
									  '" size="30" /></div>',
									
									'url' =>''
										)
									),
								);
								if(post_password_required()){?>
                                <h3 class="content-title comm-title"><?php echo $tr_comm_title;?></h3> <?php
									echo 'This post is password protected. Enter the password to view any comments.';
								}else{
									?>
                                <h3 class="content-title comm-title"><?php echo $tr_comm_title;?></h3> <?php
								comment_form($args);
								}?>
							</div>
                    	</div>
                    </div>
                    <div class="icon-soc-container">
                        <div class="share-btns"><?php
                        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ){?>
                            <nav class="comment-nav-below">
                                <div class="nav-previous empty-left"><?php previous_comments_link( '<i class="icon-angle-left"></i> '.$tr_comm_backbutton  ); ?></div>
                                <div class="nav-next empty-right" ><?php next_comments_link(  $tr_comm_nextbutton.' <i class="icon-angle-right"></i>' ); ?></div>
                            </nav>
                        <?php };?>
                        </div>
                    </div>
				</div>
			</div>
        </div>
	</div>
	<div class="<?php echo $ab_tf_post_color; ?>">
		<div class="timedate">
			<div class="tt-day nohover">
         	   <i class="icon-comments icon-large"></i>
            </div>
		</div>
		<div class="timedateafter"></div>     
		<div class="tt-arrow-side"></div> 
		<div class="tt-arrow-dot blink"></div>
		<div class="reslines"></div>
	</div>
</section><?php 
};
	