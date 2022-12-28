<?php
/**
 * ACF content for project post type archive
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

 use KWProd\Front as Front;

$icon_video = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm288 224c0 6.6-5.4 12-12 12H140c-6.6 0-12-5.4-12-12V108c0-6.6 5.4-12 12-12h232c6.6 0 12 5.4 12 12v296zm96-32c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z"/></svg>';

$icon_gallery = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 408c-66.2 0-120-53.8-120-120s53.8-120 120-120 120 53.8 120 120-53.8 120-120 120zm0-208c-48.5 0-88 39.5-88 88s39.5 88 88 88 88-39.5 88-88-39.5-88-88-88zm-32 88c0-17.6 14.4-32 32-32 8.8 0 16-7.2 16-16s-7.2-16-16-16c-35.3 0-64 28.7-64 64 0 8.8 7.2 16 16 16s16-7.2 16-16zM324.3 64c3.3 0 6.3 2.1 7.5 5.2l22.1 58.8H464c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h110.2l20.1-53.6c2.3-6.2 8.3-10.4 15-10.4h131m0-32h-131c-20 0-37.9 12.4-44.9 31.1L136 96H48c-26.5 0-48 21.5-48 48v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48h-88l-14.3-38c-5.8-15.7-20.7-26-37.4-26z"/></svg>';

$icon_more = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M96 160c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-32c0-17.7-14.3-32-32-32s-32 14.3-32 32 14.3 32 32 32 32-14.3 32-32zm96 0c0-17.7-14.3-32-32-32s-32 14.3-32 32 14.3 32 32 32 32-14.3 32-32zm192-48v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h416c26.5 0 48 21.5 48 48zm-32 144H32v208c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16V224zm0-32V80c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v112h448z"/></svg>';

// Custom fields.
$title       = get_field( 'project_title' );
$client      = get_field( 'project_client' );
$director    = get_field( 'project_director' );
$description = get_field( 'project_description' );
$poster      = get_field( 'project_poster_image' );
$screenshot  = get_field( 'project_screenshot_image' );
$imdb_url    = get_field( 'project_imdb_page' );
$vimeo_url   = get_field( 'project_vimeo_url' );
$video_title = get_field( 'project_video_title' );
$gallery     = get_field( 'project_gallery' );

if ( $title ) {
	$title = $title;
} else {
	$title = get_the_title( get_the_ID() );
}

if ( $description ) {
	$description = $description;
} else {
	$description = '';
}

if ( $client ) {
	$client = sprintf(
		'<p><strong>%1s</strong> %2s</p>',
		__( 'Client:', 'kw-prod-design' ),
		$client
	);
} else {
	$client = null;
}

if ( $director ) {
	$director = sprintf(
		'<p class="directed-by-label"><strong>%1s</strong> %2s</p>',
		__( 'Directed by:', 'kw-prod-design' ),
		$director
	);
} else {
	$director = null;
}

/**
 * Featured image
*
* Looks for the poster image first,
* then for the screenshot image.
*/
$featured = null;
$featured  = $poster;
$img_class = 'project-poster';
if ( has_image_size( 'medium-poster' ) ) {
	$size = 'medium-poster';
}
$size = apply_filters( 'single_project_featured_image_size', $size );

$display = false;
if ( $featured && has_image_size( $size ) ) {
	$display = true;
}
$display = apply_filters( 'display_project_in_archive', $display );

if ( ! $display ) {
	return;
}

$full_url = $featured['url'];
$alt      = $featured['alt'];
$thumb    = $featured['sizes'][ $size ];
$width    = $featured['sizes'][ $size . '-width' ];
$height   = $featured['sizes'][ $size . '-height' ];

if ( $gallery ) {
	$first_image = $gallery[0];
	$first_url   = $first_image['url'];
}

?>
<div class="projects-grid-item">
	<figure>
		<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo get_the_title() . __( ' poster', 'kw-prod-design' ); ?>">
		<figcaption>
			<div>
				<h3><?php the_title(); ?></h3>

				<ul class="projects-links projects-grid-links">

					<?php if ( $vimeo_url ) : ?>
					<li><a class="tooltip" href="<?php echo esc_url( $vimeo_url ); ?>" title="<?php _e( 'Video' ); ?>" data-fancybox target="_blank" rel="nofollow"><span class="icon-video"><?php echo $icon_video; ?></span><span class="text-video"><?php _e( 'Video', 'kw-prod-design' ); ?></span></a></li>
					<?php endif; ?>

					<?php if ( $gallery && function_exists( 'KWProd\Front\projects_galleries' ) ) : ?>
					<li class="project-gallery-link"><a class="tooltip" href="<?php echo esc_url( $first_url ); ?>" title="<?php _e( 'Gallery' ); ?>" data-fancybox="<?php echo 'gallery-' . get_the_ID(); ?>"><span class="icon-gallery"><?php echo $icon_gallery; ?></span><span class="text-gallery"><?php _e( 'Gallery', 'kw-prod-design' ); ?></span></a></li>
					<?php endif; ?>

					<li><a class="tooltip" href="<?php the_permalink(); ?>" title="<?php _e( 'Info' ); ?>"><span class="icon-more"><?php echo $icon_more; ?></span><span class="text-more"><?php _e( 'Info', 'kw-prod-design' ); ?></span></a></li>
				</ul>
			</div>
		</figcaption>
	</figure>
	<?php

	if ( $gallery && function_exists( 'KWProd\Front\projects_galleries' ) ) :

	?>
	<div class="project-grid-gallery project-gallery-hidden" id="<?php echo 'gallery-' . get_the_ID(); ?>">
		<?php Front\projects_galleries(); ?>
	</div>
	<?php

	endif;

	?>
</div>
