<?php
/**
 * Register Sidebars / Widget Areas
 *
 * @package McBoots-2018
 * @since 0.1
 *
 * Brego: primary sidebar, blog sidebar, movie sidebar
 */

add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => esc_html__( 'Primary Sidebar', 'mcboots' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( 'Default.', 'mcboots' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	] );
	register_sidebar( [
		'name'          => esc_html__( 'Blog Sidebar', 'mcboots' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Appears only on blog pages.', 'mcboots' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	] );
});
