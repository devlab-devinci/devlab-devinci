<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Seclek
 */

if ( ! function_exists( 'seclek_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function seclek_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'seclek' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'seclek_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function seclek_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'seclek' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'seclek_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function seclek_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'seclek' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'seclek' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'seclek' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'seclek' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'seclek' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'seclek' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'seclek_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function seclek_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( !function_exists( 'seclek_post_entry_meta' ) ) :

function seclek_post_entry_meta() {

	$comments_count = wp_count_comments(get_the_ID());
	$comment_text = '';
	if( $comments_count->approved > 1 || $comments_count->approved == 0 ) $comment_text = esc_html__( 'Comments', 'seclek' );
	else $comment_text = esc_html__( 'Comment', 'seclek' );
	$comments = sprintf( esc_html__('%s %s', 'seclek'), $comments_count->approved , $comment_text );

	$dates = get_the_date();	
	$seclek_meta = '';
	$seclek_meta .= '<div class="entry-meta">';
		$seclek_meta .= '<ul class="global-list">';
			$seclek_meta .= '<li><i class="fa fa-calendar-check-o"></i>'. $dates .'</li>';
			$seclek_meta .= '<li><a href="#comments"><i class="fa fa-comments-o"></i>' . $comments . '</a></li>';
		$seclek_meta .= '</ul>';
	$seclek_meta .= '</div>';

	printf( '%s', $seclek_meta );
}

endif;


if ( !function_exists( 'seclek_post_grid_date' ) ) :

	function seclek_post_grid_date() {

		$dates = get_the_date('d M');
		$grid_date = explode(' ', $dates);
		$seclek_meta = '';
		$seclek_meta .= '<div class="post-time">';
				$seclek_meta .= '<span><strong>'. $grid_date[0] .'</strong>'. $grid_date[1] .'</span>';
		$seclek_meta .= '</div>';

		printf( '%s', $seclek_meta );
	}
	
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function seclek_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'seclek_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'seclek_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so seclek_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so seclek_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in seclek_categorized_blog.
 */
function seclek_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'seclek_categories' );
}
add_action( 'edit_category', 'seclek_category_transient_flusher' );
add_action( 'save_post',     'seclek_category_transient_flusher' );

if ( ! function_exists( 'seclek_single_footer_meta' ) ) :
	function seclek_single_footer_meta() {
		$seclek_meta = '';
		if ( 'post' === get_post_type() && is_single() ) {

			if( !isset( $seclekOptions['cr_blog_category'] ) || (isset($seclekOptions['cr_blog_category']) && $seclekOptions['cr_blog_category'] == 'enable') ) :
				$categories_list = get_the_category_list( esc_html__( ', ', 'seclek' ) );
				$seclek_meta .= '<p>' . '<span><i class="fa fa-book"></i><strong>' . esc_html__( ' Categories: ', 'seclek' ) . '</strong></span>' .  $categories_list . '</p>';
			endif;

			if( !isset( $seclekOptions['cr_blog_tag'] ) || ( isset($seclekOptions['cr_blog_tag']) && $seclekOptions['cr_blog_tag'] == 'enable' ) ) :
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'seclek' ) );
				if ( $tags_list ) :
					$seclek_meta .= '<p>' . '<span><i class="fa fa-tags"></i><strong>' . esc_html__( ' Tags: ', 'seclek' ) . '</strong></span>' . $tags_list . '</p>';
				endif;
			endif;
		}
		printf( '%s', $seclek_meta );
	}
endif;

if ( ! function_exists( 'seclek_blog_entry_meta' ) ) :
	function seclek_blog_entry_meta() {

		global $seclekOptions;
		$seclek_meta = '<ul class="global-list">';
		$comments_count = wp_count_comments(get_the_ID());
		$comment_text = '';
		if( $comments_count->approved > 1 || $comments_count->approved == 0 ) $comment_text = esc_html__( 'Comments', 'seclek' );
		else $comment_text = esc_html__( 'Comment', 'seclek' );
		$comments = sprintf( esc_html__('%s %s', 'seclek'), $comments_count->approved , $comment_text );
		$dates = get_the_date();
		$seclek_meta .= '<li><i class="fa fa-user-o"></i>' . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( ucfirst( get_the_author() ) ) . '</a></li>';
		$seclek_meta .= '<li><i class="fa fa-calendar-check-o"></i>' .$dates. '</li>';
		$seclek_meta .= '<li><i class="fa fa-comments-o"></i>' . $comments . '</li>';
		if( is_sticky() ) :
		$seclek_meta .= '<li><i class="fa fa-paperclip"></i>' . esc_html__( 'Sticky', 'seclek' ) . '</li>';
		endif;
		$seclek_meta .= '</ul>';
		printf( '%s', $seclek_meta );
	}
endif;

if ( ! function_exists( 'seclek_custom_taxonomies_terms_links' ) ) :

function seclek_custom_taxonomies_terms_links() {

    $post = get_post( get_the_ID() );
    $post_type = $post->post_type;
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
    $icon = '';
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
        	if ( $taxonomy->label == 'Categories' ) $icon = '<i class="fa fa-file-archive-o"></i> ';
        	if ( $taxonomy->label == 'Tags' ) $icon = '<i class="fa fa-bookmark-o"></i>';
            $out[] = "<li class='tr-".$taxonomy_slug."'>" . $icon .' ';
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<a href="%1$s">%2$s</a>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "</li>";
        }
    }
    return implode( '', $out );
}

endif;

if ( !function_exists( 'seclek_folio_entry_meta' ) ) :

function seclek_folio_entry_meta() {

	$page_meta_data = get_post_meta(get_the_ID(), '_folio_information', true );
	$folio_client = $page_meta_data['_folio_client'];
	$folio_budget = $page_meta_data['_folio_budget'];

	$seclek_meta = '';
	$seclek_meta .= '<div class="entry-meta">';
		$seclek_meta .= '<ul class="global-list">';
		if ( !empty( $folio_client ) ) 
			$seclek_meta .= '<li><i class="fa fa-user-o"></i>' .  esc_html( ucfirst( $folio_client ) ) . '</li>';
		if ( !empty( $folio_budget ) ) 
			$seclek_meta .= '<li><i class="fa fa-money"></i>' .  esc_html( $folio_budget ) . '</li>';
		if ( 'folio' === get_post_type() && is_single() ) {
			$seclek_meta .= seclek_custom_taxonomies_terms_links();
		}
		if ( is_sticky() && !is_single() ){
			$seclek_meta .= '<li class="stickypost"><i class="fa fa-sticky-note-o"></i> ' . __( 'Sticky', 'seclek' ) . '</li>';
		}
		$seclek_meta .= '</ul>';
	$seclek_meta .= '</div>';

	printf( '%s', $seclek_meta );
}

endif;