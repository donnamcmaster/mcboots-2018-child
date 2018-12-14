<?php
/**
 * Template Pieces
 *
 * Default functions for the detailed parts of templates, such as entry meta and page navigation. 
 * Called from template-parts/content*.php. 
 * 
 * @package McBoots-2018
 * @since 0.1
 */

namespace McBoots\Pieces;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Post: Entry Meta Header
 *
 * Prints HTML with meta information for the current post-date/time and author.
 * This version is from _s but modified to remove last update time. 
 */
function post_entry_meta_head () {
	// print byline if defined
	if ( is_singular() ) {
		$byline = get_post_meta( get_the_ID(), 'byline', true );
		if ( get_query_var( 'page' ) > 1 ) {
			$byline .= ' <em>(continued)</em>';
		}
	} else {
		$byline = '';
	}
?>

	<div class="entry-meta">
		<?php echo $byline; ?>
	</div>

<?php
}


/**
 * Post: Entry Meta Footer
 */
function post_entry_meta_foot () {
	if ( is_singular() ) {
		$author = sprintf(
			esc_html_x( 'by %s', 'post author', 'mcboots' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
	} else {
		$author = '';
	}
	$categories_list = get_the_category_list( ', ' );
	$tag_list = get_the_tag_list( '', ', ' );
?>

	<p class="entry-meta">
	Posted <time class="published" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time> <?= $author; ?>
<?php
	if ( $categories_list ) {
		echo ' in ', $categories_list;
	}
	if ( $tag_list ) {
		echo "<br>Tagged $tag_list";
	}
?>
	</p>

<?php
}


/**
 * Small bits
 */
function entry_meta_head ( $post_type ) {
	// same head for all singular posts
	post_entry_meta_head();
}

function entry_meta_foot ( $post_type) {
	if ( ( $post_type == 'post' ) && !is_search() ) {
		post_entry_meta_foot();
	} else {
		return false;
	}
}

function post_navigation ( $post_type ) {
	if ( $post_type == 'post' ) {
		the_post_navigation();
	}
}

function link_pages () {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages', 'mcboots' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );
}

function report_page_num () {
	global $numpages, $multipage;
	if ( !$multipage ) {
		return;
	}
	$this_page = get_query_var( 'page' );
	$this_page = $this_page ? $this_page : 1;
?>
	<div class="this-page">Page <?= $this_page; ?> of <?= $numpages; ?></div>
<?php
}

function render_comments ( $post_type, $is_singular ) {
	// if comments are open or we have at least one comment, load up the comment template.
	if ( $is_singular && ( $post_type == 'post' ) && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}
}
