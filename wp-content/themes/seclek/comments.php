<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seclek
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<div id="comments" class="comments-area section-bg-white">
		<h1><?php echo esc_html__( 'Comments', 'seclek' ); ?> </h1><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php echo esc_html__( 'Comment navigation', 'seclek' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'seclek' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'seclek' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ul class="comment-list global-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
					'callback'	 => 'seclek_comment'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php echo esc_html__( 'Comment navigation', 'seclek' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'seclek' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'seclek' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation.

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'seclek' ); ?></p>
		<?php endif; ?>
	</div><!-- #comments -->
<?php 		
	endif; // Check for have_comments().
	?>

<?php if ( comments_open() ) : ?>
<div class="tr-comments media  section-bg-white">
<?php
	    $req = get_option( 'require_name_email' );
	    $aria_req = ( $req ? " aria-required='true'" : '' );

		$comments_args = array(
	        // change the title of send button
	        'label_submit'=> esc_html__( 'Submit', 'seclek' ),
			// Change the class of send button
			'class_submit'=> 'btn btn-primary',
	        // change the title of the reply section
	        'title_reply'=> esc_html__( 'Leave a Comment', 'seclek' ),
	        // remove "Text or HTML to be displayed after the set of comment fields"
	        'comment_notes_after' => '',
	        // redefine your own textarea (the comment body)

	        'fields' => apply_filters( 'comment_form_default_fields', array(

			    'author' =>
			      	'<div class="form-group">' .
			      	'<input class="form-control" id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'seclek' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
			      	'" size="30"' . $aria_req . ' /></div>',

			    'email' =>
					'<div class="form-group">' .
			      	'<input class="form-control" id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'seclek' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			      	'" size="30"' . $aria_req . ' /></div>',

			    'url' =>
					'<div class="form-group">' .
			      	'<input class="form-control" id="url" name="url" type="text" placeholder="' . esc_attr__( 'Website', 'seclek' ) . ( $req ? '*' : '' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
			      	'" size="30" /></div>'
	    	)
	  	),
	        'comment_field' => ' <div class="form-group"><textarea class="form-control" rows="10" id="comment" name="comment" aria-required="true" placeholder="' . esc_attr__( 'Your Comment', 'seclek' ) . '"></textarea></div>',
	);
	comment_form( $comments_args );
	?>
</div>
<?php endif; ?>