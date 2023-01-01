<?php
/**
 * Site frontend
 *
 * @package    KW_Prod
 * @subpackage Front
 * @category   General
 * @since      1.0.0
 */

namespace KWProd\Front;

use KWProd\Classes\Front as Frontend_Class;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Execute functions
 *
 * @since  1.0.0
 * @return void
 */
function setup() {

	// Return namespaced function.
	$ns = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Remove unpopular meta tags.
	add_action( 'init', $ns( 'head_cleanup' ) );

	// Remove system versions from stylesheets and scripts.
	add_filter( 'style_loader_src', $ns( 'remove_versions' ), 999 );
	add_filter( 'script_loader_src', $ns( 'remove_versions' ), 999 );

	// Disable emoji script.
	add_action( 'init', $ns( 'disable_emojis' ) );

	// Deregister Dashicons for users not logged in.
	add_action( 'wp_enqueue_scripts', $ns( 'deregister_dashicons' ) );

	// Remove user toolbar items.
	add_action( 'admin_bar_menu', $ns( 'remove_toolbar_items' ), 999 );

	// Enqueue scripts.
	add_action( 'wp_enqueue_scripts', $ns( 'enqueue_scripts' ) );

	// Enqueue styles.
	add_action( 'wp_enqueue_scripts', $ns( 'enqueue_styles' ), 9 );

	// Post type archive titles & descriptions.
	add_filter( 'get_the_archive_title', $ns( 'archive_titles' ) );
	add_filter( 'get_the_archive_description', $ns( 'archive_descriptions' ) );

	// Title & content filters.
	new Frontend_Class\Title_Project;
	new Frontend_Class\Content_Project;
}

/**
 * Clean up meta tags from the <head>
 *
 * @since  1.0.0
 * @return void
 */
function head_cleanup() {

	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
}

/**
 * Remove system versions
 *
 * Removes the system versions from stylesheet and script inks
 * in the head. The versions are a potential security risk,
 * indicating which version of the system to attack, and force
 * browsers to download new scripts when the system updates.
 *
 * @since  1.0.0
 * @param  string $src Path to the file.
 * @return null
 */
function remove_versions( $src ) {

	if ( strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}

/**
 * Disable emoji script
 *
 * Emojis will still work in modern browsers. This removes the script
 * that makes emojis work in old browser.
 *
 * @since  1.0.0
 * @return void
 */
function disable_emojis() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}

/**
 * Deregister Dashicons for users not logged in.
 *
 * @since  1.0.0
 * @return void
 */
function deregister_dashicons() {

	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}

/**
 * Remove user toolbar items
 *
 * @since  1.0.0
 * @param  object $wp_admin_bar The WP_Admin_Bar class.
 * @return void
 */
function remove_toolbar_items( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_menu( 'search' );
}

/**
 * Enqueue JavaScript
 *
 * @since  1.0.0
 * @return void
 */
function enqueue_scripts() {

	// Script suffix.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		$suffix = '';
	} else {
		$suffix = '.min';
	}

	wp_enqueue_script( 'kw-prod-tooltips', KWPD_URL . 'assets/js/tooltips' . $suffix . '.js', [ 'jquery' ], KWPD_VERSION, true );
}

/**
 * Enqueue stylesheets
 *
 * @since  1.0.0
 * @return void
 */
function enqueue_styles() {

	// Script suffix.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		$suffix = '';
	} else {
		$suffix = '.min';
	}

	wp_enqueue_style( 'kwpd-frontend', KWPD_URL . 'assets/css/frontend' . $suffix . '.css', [], KWPD_VERSION, 'all' );
	wp_enqueue_style( 'kw-prod-tooltips', KWPD_URL . 'assets/css/tooltips' . $suffix . '.css', [], KWPD_VERSION, 'all' );
}

/**
 * Post type archive titles
 *
 * @since  1.0.0
 * @return string Returns the filtered title.
 */
function archive_titles( $title ) {

	// Remove any HTML, words, digits, and spaces before the title.
	$title = preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );

	// Get the page for posts.
	$front = (string) get_option( 'show_on_front' );
	$posts = (int) get_option( 'page_for_posts' );

	// Blog pages title.
	if (
		'post' === get_post_type() &&
		is_home() && is_main_query() &&
		'page' === $front &&
		! empty( $posts )
	) {
		$title = get_the_title( $posts );
	}
	return $title;
}

/**
 * Post type archive descriptions
 *
 * @since  1.0.0
 * @param  string $description The default post type description.
 * @return string Returns the new post type description.
 */
function archive_descriptions( $description ) {

	// Blog pages description.
	if (
		'post' === get_post_type() &&
		is_home() && is_main_query()
	) {
		return sprintf(
			'<p>%s %s</p>',
			__( 'Get the latest news from', 'kw-prod-design' ),
			get_bloginfo( 'name' )
		);
	}
	return $description;
}

/**
 * Project types
 *
 * Returns a comma-separated list of terms
 * from the project_type taxonomy.
 *
 * @since  1.0.0
 * @access public
 * @return mixed Returns a list of terms (string) or
 *               returns null.
 */
function project_types() {

	$terms = get_the_terms( get_the_ID(), 'project_type' );

	if ( $terms && ! is_wp_error( $terms ) ) {

		$list = [];
		foreach ( $terms as $term ) {
			$list[] = $term->name;
		}

		return implode( ', ', $list );
	}
	return null;
}

/**
 * Project roles
 *
 * Returns a comma-separated list of terms
 * from the project_role taxonomy.
 *
 * @since  1.0.0
 * @access public
 * @return mixed Returns a list of terms (string) or
 *               returns null.
 */
function project_roles() {

	$terms = get_the_terms( get_the_ID(), 'project_role' );

	if ( $terms && ! is_wp_error( $terms ) ) {

		$list = [];
		foreach ( $terms as $term ) {
			$list[] = $term->name;
		}

		return implode( ', ', $list );
	}
	return null;
}

/**
 * Featured projects galleries
 *
 * Used for modal galleries in project grids.
 *
 * @since  1.0.0
 * @return void
 */
function projects_galleries() {

	$gallery = get_field( 'project_gallery', get_the_ID() );
	$title   = get_field( 'project_title', get_the_ID() );
	$count   = null;

	if ( $title ) {
		$title = $title;
	} else {
		$title = get_the_title();
	}

	if ( $gallery ) :

		$count = 0;

		foreach ( $gallery as $image ) : $count++;

			if ( $count != 1 ) :

			?>
			<a class="gallery-image" data-fancybox="<?php echo 'gallery-' . get_the_ID(); ?>" data-type="image" data-fancybox-group="<?php echo 'gallery-' . get_the_ID(); ?>" data-caption="<?php echo __( 'Scenes from ' ) . $title; ?>" href="<?php echo $image['url']; ?>" title="<?php echo __( 'Scenes from ', 'kw-prod-design' ) . $title; ?>">
				<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
			</a>
			<?php endif;

			if ( ++$count == 16 ) break;
		endforeach;
	endif; ?>

	<?php

	if ( $count > 8 ) :

		?>
		<a class="fancybox-notice" data-fancybox="<?php echo 'gallery-' . get_the_ID(); ?>" data-src="<?php echo '#fancybox-page-link-' . get_the_ID(); ?>" href="javascript:;"></a>

		<div class="fancybox-page-link" id="<?php echo 'fancybox-page-link-' . get_the_ID(); ?>" data-type="image" data-fancybox-group="<?php echo 'gallery-' . get_the_ID(); ?>" data-caption="<?php echo __( 'Scenes from ' ) . $title; ?>">

			<h3><?php the_title(); ?></h3>

			<p><?php _e( 'More photos, video & info available on this project\'s page.', 'kw-prod-design' ); ?></p>

			<p><a class="fancybox-link" href="<?php the_permalink(); ?>"><?php _e( 'Take me there', 'kw-prod-design' ); ?></a> | <a href="javascript:jQuery.fancybox.close();"><?php _e( 'Close', 'kw-prod-design' ); ?></a></p>
		</div>
		<?php

	endif;
}

/**
 * Post navigation
 *
 * Next & previous navigation of singular post types.
 *
 * @since  1.0.0
 * @return void
 */
function post_navigation() {

	$prev = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', false );

	if ( ! $next && ! $prev ) {
		return;
	}

	global $post;

	$post_id  = get_post_type( $post->ID );
	$get_type = get_post_type_object( $post_id );
	$type     = $get_type->labels->singular_name;

	// Post navigation labels.
	$prev_text = get_the_title( $prev );
	$next_text = get_the_title( $next );

	// Post navigation links.
	$next_url = get_permalink( $next );
	$prev_url = get_permalink( $prev );

	?>
	<nav class="post-navigation">

		<?php if ( $prev ) : ?>
		<a class="button nav-previous" href="<?php echo $prev_url; ?>"><span class="post-navigation-text"><?php echo $prev_text; ?></span></a>
		<?php endif; ?>

		<?php if ( $next ) : ?>
		<a class="button nav-next" href="<?php echo $next_url; ?>"><span class="post-navigation-text"><?php echo $next_text; ?></span></a>
		<?php endif; ?>
	</nav>
	<?php
}
