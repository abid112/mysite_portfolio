<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','kyte'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<div class="reader-comments">
	<ul class="comment-container">
	<?php wp_list_comments('callback=ky_comment');?>
	</ul>
	</div>

	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.','kyte'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>



<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link() ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<h5 class="sub_title"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></h5>
<?php else : ?>

<form action="<?php echo esc_url(site_url()); ?>/wp-comments-post.php" method="post" id="comment-form">


<?php if ( is_user_logged_in() ) : ?>

<h5 class="sub_title"><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_edit_user_link(), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out of this account'); ?>"><?php _e('Log out &raquo;','kyte'); ?></a></h5>

<?php else : ?>

<input placeholder="Your Name" type="text" name="author" id="author" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />



<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>','kyte'), allowed_tags()); ?></small></p>-->


<textarea rows="3" name="comment" id="comment" cols="100" tabindex="4" placeholder="<?php echo __('Your Comment...', 'kyte'); ?>"></textarea>
<div class="clearfix frm_bot">
<input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Comment'); ?>" />

</div>
<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>


</form>

<?php endif; // If registration required and not logged in ?>


<?php endif; // if you delete this the sky will fall on your head ?>
