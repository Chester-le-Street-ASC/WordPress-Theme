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

	global $content_width;
	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
	$content_width = 617;	
	
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

    $args['previous_string'] = 'previous';
    $args['next_string'] = 'next';

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
			'description' => __( 'The following widgets will appear in the main sidebar div.', 'wpboot' ),
			'before_widget' => '<div id="%1$s" class="sidebar-module widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		)
	);
}

function wpboot_scripts() {

 		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', null, '3.0.0' );
 
		wp_enqueue_style( 'style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpboot_scripts' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
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
	return 80;
}
add_filter( 'excerpt_length', 'wpboot_excerpt_length', 999 );

function wpboot_excerpt_more($more) {
       global $post;
	return '...</p><a class="btn btn-primary" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'wpboot_excerpt_more');

	
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'wpboot_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function wpboot_register_required_plugins() {
 
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
 
        // Include WP Product Review plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'WP Product Review',
            'slug'      => 'wp-product-review',
            'required'  => false,
        ),
        
        // Include Revive Old Post plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Revive Old Post',
            'slug'      => 'tweet-old-post',
            'required'  => false,
        ),
 
    );
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
 
}

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
    echo 'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }'.PHP_EOL;
    // Using WordPress default CSS class name.
    echo 'body.logged-in .navbar-fixed-top{ top: 28px !important; }'.PHP_EOL;
    echo '</style>'.PHP_EOL;
}

// Accelerated Mobile Pages

		// Head for Web-fonts
		add_action( 'amp_post_template_head', 'xyz_amp_add_pixel' );
		
		function xyz_amp_add_pixel( $amp_template ) {
			$post_id = $amp_template->get( 'post_id' );
			?>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
			<?php
		}

		// Custom AMP CSS
		add_action( 'amp_post_template_css', 'xyz_amp_additional_css_styles' );

		function xyz_amp_additional_css_styles( $amp_template ) {
			// only CSS here please...
			?>
            
            body {
            font-family:'Open Sans', sans-serif;
            font-size:16px;
            line-height:1.428571429;
            background:#fff;
            color:#000;
            padding-bottom:100px;
            }
            
            .amp-wp-content {
            color: #000;
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
            
            .amp-wp-content a {
            color:#bd0000;
            text-decoration:none;
            }
            
			nav.amp-wp-title-bar {
				padding: 12px 0;
				background: #bd0000;
			}
			nav.amp-wp-title-bar a {
				background-image: url( '<?php echo get_bloginfo('template_directory');?>/img/chesterLogoAMP.png' );
				background-repeat: no-repeat;
				background-size: contain;
				display: block;
				background-position: center;
				height: 50px;
				margin: 0 auto;
				text-indent: -9999px;
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