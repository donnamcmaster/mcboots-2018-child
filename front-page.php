<?php
while ( have_posts() ) : the_post();
?>
	<div class="front-page-content">
<?php
	get_template_part( 'template-parts/page', 'header' );
	get_template_part( 'template-parts/content-single', 'page' );
?>
	</div>
<?php
endwhile;

	$features = get_post_meta( get_the_ID(), 'feature_boxes', true );
	if ( !$features ) {
		return;
	}
?>

<div class="feature-boxes">
	<div class="row">

<?php
	foreach ( $features as $card ) {
		extract( $card );
		$title = wptexturize( $title );
		$content = wptexturize( $body_text );
		if ( isset( $image[0] ) && $image[0] ) {
			$image_tag = wp_get_attachment_image( $image[0], 'large-thumb', false, ['class'=>'card-img-top img-fluid'] );
		} else {
			$image_tag = '';
		}
		
		if ( $link_url ) {
			$title = McPik_Utils::get_anchor( $link_url, $title );
			$image_tag = McPik_Utils::get_anchor( $link_url, $image_tag );
			$button = $link_text ? McPik_Utils::get_anchor( $link_url, wptexturize( $link_text ), 'btn btn-primary' ) : '';
		} else {
			$button = '';
		}
?>
		<div class="col-md-4">
			<div class="card">
				<?= $image_tag; ?>
				<div class="card-body">
					<h2 class="card-title"><?= $title; ?></h2>
					<p class="card-text"><?= $content; ?></p>
					<?= $button; ?>
				</div><!-- card-body -->
			</div><!-- card -->
		</div>

<?php

	}
?>
	</div><!-- row -->
</div><!-- panel-feature -->

<?php
