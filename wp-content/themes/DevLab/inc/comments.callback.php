<?php
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */

if ( ! function_exists( 'seclek_comment' ) ) :
function seclek_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li id="post-comment comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<p><?php _e( 'Pingback:', 'seclek' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'seclek' ), '<span class="ping-meta"><span class="edit-link">', '</span></span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
	?>
	<li id="post-comment li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="commenter-avatar">
				<?php echo get_avatar( $comment, 80 ); ?>
			</div><!-- .comment-author -->
            <div class="comment-box media-body">
                <div class="comment-meta">
                    <span class="title pull-left"><?php comment_author_link(); ?></span>
                    <span class="pull-right"><?php echo seclek_time_ago(); ?> <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( '| Reply', 'seclek' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
                </div>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'seclek' ); ?></p>
                <?php endif; ?>
                <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->
               </div><!-- .comment-details -->
                <ul class="comment-meta list-inline pull-right">
                    <li><?php edit_comment_link( esc_html__( 'Edit', 'seclek' ), ' <span class="edit-link">', '<span>' ); ?></li>
                </ul>
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch; // End comment_type check.
}
endif;

