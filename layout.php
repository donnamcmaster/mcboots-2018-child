<?php
/**
 * Layout (default)
 * 
 * - defines the skeleton of the rendered page
 * - called from lib/layout-wrapper.php 
 *
 * Default layout: header, main and footer are all wrapped in one container. 
 * Override in child theme if desired. 
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use McBoots\Template;

return function( $template ) {
	ob_start();

?><!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'template-parts/head' ); ?>

<body <?php body_class(); ?>>
<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'mcboots' ); ?></a>

<div class="wrapper">

<?php
	get_header();
	if ( is_front_page() ) {
		get_template_part( 'template-parts/home-slides' );
	}
?>

	<div class="content container mb-5" id="content" role="document">

<?php
	if ( !is_front_page() && current_theme_supports( 'breadcrumbs' ) ) {
		get_template_part( 'template-parts/breadcrumbs' );
	}
?>

		<div class="row">
			<main class="site-main <?= Template\main_class(); ?>" role="main">
				<?php include( $template ); ?>
				<?= edit_post_link(); ?>
			</main>

<?php
	// allow for an optional single sidebar
	$sidebar = Template\display_sidebar();
	if ( $sidebar ) {
		get_template_part( 'template-parts/sidebar', $sidebar );
	}
?>
		</div><!-- row -->
	</div><!-- content container -->

<?php
	// allow for a full-width aside between content and footer
	if ( Template\display_footbar() ) {
		get_template_part( 'template-parts/aside', 'footbar' );
	}

	// add the <footer> element
	get_footer();
?>
</div><!-- wrapper -->

<?php wp_footer(); ?>

</body>
</html>

<?php
	return ob_get_clean();
};
