<?php
if( post_password_required() ) {
	return;
}

$comments = get_comments( 'post_id=' . $post->ID );
$comments = $comments ?: array();
?>
<div id="comments">
	<h3 class="bg-primary">Discussion</h3>

	<?php if( $comments ) : ?>

		<?php foreach( $comments AS $comment ) : ?>

			<?php if( $comment->comment_approved ) : ?>

	<div class="jumbotron media">
		<div class="media-left">
			<a href="<?php echo $comment->comment_author_url; ?>">
				<?php echo get_avatar( $comment->comment_author_email, '96' ); ?>
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<a href="<?php echo $comment->comment_author_url; ?>">
					<?php echo $comment->comment_author; ?>
				</a>
				<small>
					<?php echo $comment->comment_date; ?>
				</small>
			</h4>

			<p><?php echo $comment->comment_content; ?></p>

			<?php /*
			<div class="pull-right">
				<a class="btn btn-default" href="/wp-admin/comment.php?action=editcomment&c=<?php echo $comment->comment_ID; ?>">Edit</a>
				<a class="btn btn-default" href="?replytocom=<?php echo $comment->comment_ID; ?>#respond">Reply</a>
			</div>
			*/ ?>
		</div>
	</div>

			<?php endif; ?>

		<?php endforeach ?>

	<?php else : ?>

	<div class="jumbotron">
		<div class="row">
			<p class="col-xs-12"><i>There don't appear to be any comments yet. You can be the first!</i></p>
		</div>
	</div>

	<?php endif; ?>

	<?php comment_form( new_comment_fields( $user_identity, $commenter ) ); ?>

</div>