<?php
/**
 * wpboot functions and definitions
 *
 * @package chesterlestreetasc
 */


add_filter('body_class', 'mbe_body_class');

add_action('wp_head', 'mbe_wp_head');

add_action( 'after_setup_theme', 'wpboot_theme_setup' );
function wpboot_theme_setup() {

	//global $content_width;
	/* Set the $content_width for things such as video embeds. */
	//if ( !isset( $content_width ) )
	//$content_width = 753;	
	
	add_theme_support( 'title-tag' );
	
	/* Add theme support for automatic feed links. */
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	/* Add theme support for post thumbnails (featured images). */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'big-thumb', 617, 9999);
}

register_nav_menu('primary', __('Primary Menu'));

/* Add your nav menus function to the 'init' action hook. */
   add_action( 'init', 'wpboot_register_menus' );

/* Add custom actions. */
   add_action( 'widgets_init', 'wpboot_register_sidebars' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_pagination.php');
function customize_wp_bootstrap_pagination($args) {

    $args['previous_string'] = 'Previous';
    $args['next_string'] = 'Next';

    return $args;
}
add_filter('wp_bootstrap_pagination_defaults', 'customize_wp_bootstrap_pagination');

// Add menu features 
function wpboot_register_menus() {
	register_nav_menus(array('primary'=>__( 'Primary Menu' ), ));
}

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
function wpboot_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'wpboot_page_menu_args' );

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function wpboot_render_title() {
?><title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'wpboot_render_title' );
}

function wpboot_register_sidebars() {
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary Sidebar', 'wpboot' ),
			'description' => __( 'The following widgets will appear in the Prmary Sidebar.', 'chester' ),
			'before_widget' => '<div id="%1$s" class="sidebar-module widget %2$s well">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="sidebar-module-title">',
			'after_title' => '</h4>'
		)
	);
}

function wpboot_scripts() {

 		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', null, '3.3.7' );

		wp_enqueue_style( 'chester', get_template_directory_uri() . '/chester.min.css', null, '1.13' );
 
		wp_enqueue_style( 'style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function remove_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'remove_devicepx' );

add_action( 'wp_enqueue_scripts', 'wpboot_scripts' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'wpboot' ),
) );

//Set up title if SEO plugin is not used.

function wpboot_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'wpboot' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'wpboot_wp_title', 10, 2 );

function wpboot_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'wpboot_excerpt_length', 200 );

function wpboot_excerpt_more($more) {
       global $post;
	return '...</p>';
}
add_filter('excerpt_more', 'wpboot_excerpt_more');

add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a class="btn btn-primary" href="' . get_permalink() . '">Read More</a>';
}


	
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}

function mbe_wp_head(){
    echo '<style>'.PHP_EOL;
    echo 'body{ padding-top: 70px !important; }'.PHP_EOL;
    // Using custom CSS class name.
    echo 'body.body-logged-in .navbar-fixed-top{ top: 32px !important; }'.PHP_EOL;
    // Using WordPress default CSS class name.
    echo 'body.logged-in .navbar-fixed-top{ top: 32px !important; }'.PHP_EOL;
    echo '</style>'.PHP_EOL;
}

// Accelerated Mobile Pages

		// Head for Web-fonts
		add_action( 'amp_post_template_head', 'xyz_amp_add_pixel' );
		
		function xyz_amp_add_pixel( $amp_template ) {
			$post_id = $amp_template->get( 'post_id' );
			?>
			<?php
		}

		// Custom AMP CSS
		add_action( 'amp_post_template_css', 'xyz_amp_additional_css_styles' );

		function xyz_amp_additional_css_styles( $amp_template ) {
			// only CSS here please...
			?>
            
            body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size:16px;
            line-height:1.428571429;
            background:#fff;
            color:#333;
            padding-bottom:5px;
            }
            
            .amp-wp-content {
            color: #333;
	    max-width: 600px;
	    padding: 0 10px 0 10px;
            }
            
            .amp-wp-title {
            margin: .67em 0 0 0;
            font-size: 2em;
            line-height:1.1;
            font-weight:500;
            color:#bd0000;
            }
            
            .amp-wp-meta {
            color: #000;
            font-family: inherit;
            font-size: 15px
            }
            
            .amp-wp-meta a {
            color:#bd0000;
            text-decoration:none;
            }
            
            .amp-wp-content a:hover, a:focus {
                color: #a40000;
                text-decoration: underline
            }
            
            .amp-wp-content a {
            color:#bd0000;
            text-decoration:none;
            }
            
			nav.amp-wp-title-bar {
				padding:10px 0;
				background:#bd0000;
				border-bottom:1px solid #9c0000;
			}
			nav.amp-wp-title-bar a {
				background-image: url( '<?php echo get_template_directory_uri();?>/img/chesterLogoAMP.svg' );
				background-repeat: no-repeat;
				background-size: contain;
				display: block;
				background-position: center;
				height: 40px;
				text-indent: -9999px;
			}
            
            p, ol, ul, figure {
                margin:0 0 10px 0;
                color: #333;
            }
            
            ul.amp-wp-meta {
                padding: 0 0 0 0;
                margin: 0.67em 0 0.67em 0;
            }
            
            blockquote {
                padding: 10px 20px;
                margin: 0 0 20px;
                font-size: 18px;
                border-left: 5px solid #bd0000;
                color: #333;
                background: #FFF;
            }
			
			.wp-caption-text {
				color: #FFF;
				font-size: 14px;
				font-style: normal;
				text-align: left;
				background: black;
				padding: 10px 12px 10px 12px;
				margin: 0 0 15px 0;
			}

			<?php
		}

		// Hides Author Name in AMP Pages
		add_filter( 'amp_post_template_meta_parts', 'xyz_amp_remove_author_meta' );
		
		function xyz_amp_remove_author_meta( $meta_parts ) {
			foreach ( array_keys( $meta_parts, 'meta-author', true ) as $key ) {
				unset( $meta_parts[ $key ] );
			}
			return $meta_parts;
		}
		
		// Deals with metadata for Search Engines
		
		// Logo/Content Type
		add_filter( 'amp_post_template_metadata', 'xyz_amp_modify_json_metadata', 10, 2 );
		
		function xyz_amp_modify_json_metadata( $metadata, $post ) {
			$metadata['@type'] = 'NewsArticle';
		
			$metadata['publisher']['logo'] = array(
				'@type' => 'ImageObject',
				'url' => get_template_directory_uri() . '/img/ampsearchlogo.png',
				'height' => 60,
				'width' => 338,
			);
		
			return $metadata;
		}
		
		// Add Featured image for Search Engines	
		add_action( 'pre_amp_render_post', 'xyz_amp_add_custom_actions' );
		function xyz_amp_add_custom_actions() {
			add_filter( 'the_content', 'xyz_amp_add_featured_image' );
		}
		
		function xyz_amp_add_featured_image( $content ) {
			if ( has_post_thumbnail() ) {
				// Just add the raw <img /> tag; our sanitizer will take care of it later.
				$image = sprintf( '<p class="xyz-featured-image">%s</p>', get_the_post_thumbnail() );
				$content = $content;
			}
			return $content;
		}
		
		//Remove inactive shortcodes
		add_filter('the_content', 'mte_remove_unused_shortcode');
		function mte_remove_unused_shortcode($content)
		{	$pattern = mte_get_unused_shortcode_regex();
			$content = preg_replace_callback( '/'. $pattern .'/s', 'strip_shortcode_tag', $content );
			return $content;	
		}
		 
		function mte_get_unused_shortcode_regex() {
			global $shortcode_tags;
			$tagnames = array_keys($shortcode_tags);
			$tagregexp = join( '|', array_map('preg_quote', $tagnames) );
			$regex = '\\[(\\[?)';
			$regex .= "(?!$tagregexp)";
			$regex .= '\\b([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*+(?:\\[(?!\\/\\2\\])[^\\[]*+)*+)\\[\\/\\2\\])?)(\\]?)';
			return $regex; 
		}

function remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
}
 
// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );
 
// Remove image size attributes from images added to a WordPress post
add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );