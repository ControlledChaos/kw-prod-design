<?php
/**
 * ACF content for singular project post type
 *
 * @package    KW_Prod
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

use KWProd\Front as Front;

$icon_link = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497.6,0,334.4.17A14.4,14.4,0,0,0,320,14.57V47.88a14.4,14.4,0,0,0,14.69,14.4l73.63-2.72,2.06,2.06L131.52,340.49a12,12,0,0,0,0,17l23,23a12,12,0,0,0,17,0L450.38,101.62l2.06,2.06-2.72,73.63A14.4,14.4,0,0,0,464.12,192h33.31a14.4,14.4,0,0,0,14.4-14.4L512,14.4A14.4,14.4,0,0,0,497.6,0ZM432,288H416a16,16,0,0,0-16,16V458a6,6,0,0,1-6,6H54a6,6,0,0,1-6-6V118a6,6,0,0,1,6-6H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V304A16,16,0,0,0,432,288Z"/></svg>';

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
	$description = sprintf(
		'<div class="project-info-entry project-description">%s</div>',
		$description
	);
} else {
	$description = '';
}

if ( $client ) {
	$client = sprintf(
		'<p class="project-info-entry project-client"><span class="project-info-label">%1s</span> %2s</p>',
		__( 'Client:', 'kw-prod-design' ),
		$client
	);
} else {
	$client = null;
}

if ( $director ) {
	$director = sprintf(
		'<p class="project-info-entry project-director"><span class="project-info-label">%1s</span> %2s</p>',
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
$size     = 'large';

if ( $poster ) {

	$featured  = $poster;
	$img_class = 'project-poster';
	if ( has_image_size( 'large-poster' ) ) {
		$size = 'large-poster';
	}

} elseif ( $screenshot ) {

	$featured  = $screenshot;
	$img_class = 'project-screenshot';
	if ( has_image_size( 'large-video' ) ) {
		$size = 'large-video';
	}
}

$size = apply_filters( 'single_project_featured_image_size', $size );

if ( ! is_null( $featured ) ) {
	$full_url = $featured['url'];
	$alt      = $featured['alt'];
	$thumb    = $featured['sizes'][ $size ];
	$width    = $featured['sizes'][ $size . '-width' ];
	$height   = $featured['sizes'][ $size . '-height' ];
}

if ( $imdb_url ) {
	$imdb = sprintf(
		'<p class="project-info-entry project-imdb"><a href="%1s" target="_blank" rel="nofollow">%2s %3s <span class="icon icon-link">%s</span></a></p>',
		esc_url( $imdb_url ),
		$title,
		__( 'on IMDb', 'kw-prod-design' ),
		$icon_link
	);
} else {
	$imdb = null;
}

$vimeo_data = null;
if ( ! empty( $vimeo_url ) ) {
	$file = 'http://vimeo.com/api/oembed.json?url=' . $vimeo_url;
	if ( file_exists( $file ) ) {
		$vimeo_data = json_decode( file_get_contents( $file ) );
	}
}

if ( ! $vimeo_data ) {
	$vimeo = null;
} else {
	$vimeo = $vimeo_data->video_id;
}

if ( $video_title ) {
	$video_title = sprintf(
		'<h2>%1s</h2>',
		$video_title
	);
} else {
	$video_title = sprintf(
		'<h2>%1s %2s</h2>',
		get_the_title(),
		__( 'Preview', 'kw-prod-design' )
	);
}

// Get taxonomy terms.
$project_roles = Front\project_roles();
$project_types = Front\project_types();

if ( ! is_null( $project_roles ) ) {
	$project_roles = sprintf(
		'<p class="project-info-entry project-role"><span class="project-info-label">%1s</span> %2s</p>',
		__( 'Project Role:', 'kw-prod-design' ),
		$project_roles
	);
} else {
	$project_roles = '';
}

if ( ! is_null( $project_types ) ) {
	$project_types = sprintf(
		'<p class="project-info-entry project-type"><span class="project-info-label">%1s</span> %2s</p>',
		__( 'Project Type:', 'kw-prod-design' ),
		$project_types
	);
} else {
	$project_types = '';
}

?>
<div class="entry-content" itemprop="articleBody">
	<div class="single-project-top">

		<?php if ( ! is_null( $featured ) ) : ?>
		<div class="project-featured-image <?php echo $img_class; ?>">
			<figure>
				<a href="<?php echo $full_url; ?>" data-fancybox data-type="image" data-caption="<?php echo get_the_title() . __( ' poster', 'kw-prod-design' ); ?>"><img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo get_the_title() . __( ' poster', 'kw-prod-design' ); ?>" $width="<?php echo $width; ?>" height="<?php echo $height; ?>"></a>
				<figcaption class="screen-reader-text"><?php echo get_the_title() . __( ' poster', 'kw-prod-design' ); ?></figcaption>
			</figure>
		</div>
		<?php endif; // if $featured ?>

		<div class="project-info">
			<div class="project-details">
				<?php echo $project_roles; ?>
				<?php echo $project_types; ?>
				<?php echo $director; ?>
				<?php echo $client; ?>
			</div>
			<?php echo $description; ?>
			<?php echo $imdb; ?>
		</div>
	</div>
	<?php if ( $vimeo ) : ?>
	<?php echo $video_title; ?>
	<div class="project-trailer-embed">
		<iframe src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?color=ffffff&title=0&byline=0&portrait=0" width="1280" height="720" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
	<?php endif; ?>

	<?php if ( $vimeo && have_rows( 'project_additional_videos' ) ) : ?>
		<div class="project-additional-videos">
			<h2><?php _e( 'Additional Videos' ); ?></h2>
			<ul>
			<?php while ( have_rows( 'project_additional_videos' ) ) : the_row(); ?>
				<li><a href="<?php esc_url( the_sub_field( 'project_additional_vimeo_url' ) ); ?>" data-fancybox target="_blank" rel="nofollow"><?php the_sub_field( 'project_additional_video_title' ); ?></a></li>
			<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; // if $vimeo ?>

	<?php if ( $gallery ) : ?>
	<div class="project-gallery" id="project-gallery-<?php echo get_the_ID(); ?>">
		<?php echo sprintf( '<h2>%1s %2s</h2>', get_the_title(), esc_html__( 'Gallery', 'kw-prod-design' ) ); ?>
		<ul class="image-gallery medium-gallery">
		<?php foreach( $gallery as $image ) :

		if ( $image['caption'] ) {
			$data_caption = $image['caption'];
		} else {
			$data_caption = $image['title'];
		}
		?>
			<li>
				<figure>
					<a data-type="image" data-fancybox="project-gallery-<?php echo get_the_ID(); ?>" data-caption="<?php echo esc_attr( esc_html( $data_caption ) ); ?>" href="<?php echo $image['url']; ?>">
						<img src="<?php echo $image['sizes']['medium']; ?>" />
						<?php if ( $image['caption'] ) : ?>
						<figcaption><?php echo esc_html( $image['caption'] ); ?></figcaption>
						<?php endif; ?>
					</a>
				</figure>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; // if $gallery ?>
</div>
