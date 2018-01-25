<?php
/**
 * chester functions and definitions
 *
 * @package chesterlestreetasc
 */

add_filter( 'wp_feed_cache_transient_lifetime',
   create_function('$a', 'return 1800;') );

add_filter('body_class', 'mbe_body_class');

add_action('wp_head', 'mbe_wp_head');

add_action( 'after_setup_theme', 'chester_theme_setup' );
function chester_theme_setup() {

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
	add_image_size( 'big-thumb', 753, 9999);
}

register_nav_menu('primary', __('Primary Menu'));

/* Add your nav menus function to the 'init' action hook. */
   add_action( 'init', 'chester_register_menus' );

/* Add custom actions. */
   add_action( 'widgets_init', 'chester_register_sidebars' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_pagination.php');
function customize_wp_bootstrap_pagination($args) {

	$args['previous_string'] = '<i class="fa fa-angle-left" aria-hidden="true"></i><p class="sr-only">Previous Page</p>';
    	$args['next_string'] = '<i class="fa fa-angle-right" aria-hidden="true"></i><p class="sr-only">Next Page</p>';

    return $args;
}
add_filter('wp_bootstrap_pagination_defaults', 'customize_wp_bootstrap_pagination');

// Add menu features
function chester_register_menus() {
	register_nav_menus(array('primary'=>__( 'Primary Menu' ), ));
}

// Register Custom Navigation Walker
require_once('class-wp-bootstrap-navwalker.php');

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
function chester_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'chester_page_menu_args' );

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function chester_render_title() {
?><title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'chester_render_title' );
}

function chester_register_sidebars() {
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary Sidebar', 'chester' ),
			'description' => __( 'The following widgets will appear in the Prmary Sidebar.', 'chester' ),
			'before_widget' => '<div id="%1$s" class="sidebar-module widget %2$s cell">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="sidebar-module-title">',
			'after_title' => '</h4>'
		)
	);
}

function chester_scripts() {

 		//wp_enqueue_style( 'bootstrap', 'css/bootstrap.css', null, '4.0.0' );
		//wp_enqueue_style( 'chester', 'chester.css', null, '0.0.1' );
		//wp_enqueue_style( 'chester', 'https://static.chesterlestreetasc.co.uk/global/css/chester.min.css', null, '1.18' );

		//wp_enqueue_style( 'style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function remove_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'remove_devicepx' );

add_action( 'wp_enqueue_scripts', 'chester_scripts' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'chester' ),
) );

//Set up title if SEO plugin is not used.

function chester_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'chester' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'chester_wp_title', 10, 2 );

function chester_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'chester_excerpt_length', 200 );

function chester_excerpt_more($more) {
       global $post;
	return '...</p><a class="btn btn-outline-primary" href="' . get_permalink() . '">Read More <i class="fa fa-chevron-right" aria-hidden="true"></i>
</a>';
}
add_filter('excerpt_more', 'chester_excerpt_more');

function modify_read_more_link() {
return '<a class="btn btn-outline-primary" href="' . get_permalink() . '">Read More <i class="fa fa-chevron-right" aria-hidden="true"></i>
</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_filter('body_class','add_category_to_single');
function add_category_to_single($classes/*, $class*/) {
  if (is_single() ) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
      // add category slug to the $classes array
      $classes[] = $category->category_nicename;
    }
  }
  // return the $classes array
  return $classes;
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
    echo 'body{ padding-top: 4.5rem !important; }'.PHP_EOL;
  //   Using custom CSS class name.
    echo '@media (min-width:784px){body.body-logged-in .fixed-top{ top: 32px !important; }}@media (max-width:783px){body.body-logged-in .fixed-top{ top: 46px !important;} #wpadminbar{position:fixed !important;}'.PHP_EOL;
    // Using WordPress default CSS class name.
    echo '@media (min-width:784px){body.body-logged-in .fixed-top{ top: 32px !important; }}@media (max-width:783px){body.body-logged-in .fixed-top{ top: 46px !important;} #wpadminbar{position:fixed !important;}'.PHP_EOL;
    echo '</style>'.PHP_EOL;
}

// Accelerated Mobile Pages

if ( function_exists( 'amp_backcompat_use_v03_templates' ) ) {
	amp_backcompat_use_v03_templates();
}

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


	html{background-color:#FFF}

            body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size:1rem;
            background:#fff;
            line-height: 1.5;
			color: #212529;
            padding-bottom:1rem;
            }

			h1 {
				font-size: 2.5rem;
			}

			h2 {
				font-size: 2rem;
			}

			h3 {
				font-size: 1.75rem;
			}

			h4 {
				font-size: 1.5rem;
			}

			h5 {
				font-size: 1.25rem;
			}

			h6 {
				font-size: 1rem;
			}

			h1, h2, h3, h4, h5, h6 {
				font-weight: 600;
				margin: 0 0 1rem 0;
			}

            .amp-wp-content {
            color: #212529;
	    max-width: 800px;
	    padding: 0 0 0 1rem;
            }

            .amp-wp-title {
            font-size: 2.5rem;
            line-height:1.1;
            font-weight:600;
			margin-bottom:0;
			color: #212529;
            }

            .amp-wp-meta {
            color: #000;
            font-family: inherit;
            font-size: 1rem
			margin: 0 0 1rem 0;
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
				padding:0.6rem 0;
				background:#bd0000;
				margin: 0 0 1rem 0;
			}
			nav.amp-wp-title-bar a {
				background-image: url( '<?php echo get_template_directory_uri();?>/img/chesterLogoAMP.svg' );
				background-repeat: no-repeat;
				background-size: contain;
				display: block;
				background-position: center;
				height: 2rem;
				text-indent: -9999px;
			}

            p, ol, ul, figure {
                margin:0 0 1rem 0;
                color: #212529;
            }

            ul.amp-wp-meta {
                padding: 0 0 0 0;
				font-size: 1rem;
                margin: 0 0 1rem 0;
            }

            blockquote {
                padding: 1rem 1rem;
                margin: 0 0 1rem;
                font-size: 1.25rem;
                border-left: 5px solid #bd0000;
                color: #212529;
                background: #FFF;
            }

			.wp-caption-text {
				color: #212529;
				font-size: 1rem;
				font-style: normal;
				text-align: left;
				background: #efefef;
				padding: 1rem;
				margin: 0 0 1rem 0;
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

//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);

function wpb_tags() {
$wpbtags =  get_tags();
foreach ($wpbtags as $tag) {
$string .= '<a class="btn btn-default" href="'. get_tag_link($tag->term_id) .'">'. $tag->name . '</a>';
}
return $string;
}
add_shortcode('wpbtags' , 'wpb_tags' );

function first_paragraph($content){
   return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
 }

 // Custom Login Stuff

 function my_login_logo() { ?>
     <style type="text/css">
     .login h1 {
       padding-top: 1rem;
     }
         #login h1 a, .login h1 a {
             background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/chesterLogo.svg);
    width: 100%;
    max-width: 445px;
    height: auto;
 		background-size: auto;
 		background-repeat: no-repeat;
    padding: 1rem 0 0 0;
         }
     </style>
 <?php }
 add_action( 'login_enqueue_scripts', 'my_login_logo' );

 // custom login for theme
 function childtheme_custom_login() { ?>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
  #login {
     width: 100%;
     padding: 0 1rem;
     margin: auto;
     min-height: 100%;
 }
 .cell, .well, #loginform, .login .message, #lostpasswordform {
    min-height: 20px;
    border: none;
        border-top-width: medium;
        border-top-style: none;
        border-top-color: currentcolor;
    border-top: 3px solid #bd0000;
    border-radius: 0;
    box-shadow: none;
    -webkit-box-shadow: none;
    background-color: #efefef;
    padding: 1rem;
    max-width: 100%;
    margin: 0 auto 1rem auto;
}

.login #login_error {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    border-left-color: rgb(245, 198, 203);
    padding: 0.75rem 1.25rem;
    border: 1px solid transparent;
    border-left-width: 1px;
    border-left-style: solid;
    border-top-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    border-left-color: transparent;
    margin: 0 auto 1rem auto;
}
.login #nav, .login #backtoblog, .login {
  padding: 0;
  font-size: 1rem;
  color: #333;
  width: 100%;
  margin: 0 auto 1rem auto;
}
.login p, .login h1 {
  margin-bottom: 1rem;
}
@media screen and (min-width: 600px) {
  .login #nav, .login #backtoblog, .cell, .well, #loginform, .login .message, #lostpasswordform, .login #login_error {
    width: 50%;
  }
}
@media screen and (min-width: 1200px) {
  .login #nav, .login #backtoblog, .cell, .well, #loginform, .login .message, #lostpasswordform, .login #login_error {
    width: 33.3333%;
  }
}
.login #backtoblog a:hover, .login #nav a:hover {
    color: #bd0000;
    text-decoration: underline;
}
.login #backtoblog a, .login #nav a {
    color: #bd0000;
}
.login h1 {
    padding-top: 1rem;
}
#loginform p, .login label {
  color: #333;
  font-size: 0.9375rem;
  width: 100%;
}
.login form .input, .login input[type="text"] {
  display: block;
  width: 100%;
  padding: 0.5rem 0.75rem;
  margin: 0.25rem 0 1rem 0 !important;
  font-size: 0.9375rem;
  line-height: 1.25;
  color: #495057;
  background-color: #fff;
  background-image: none;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 0;
  box-shadow: none !important;
  -webkit-transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
  transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
  -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
  transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
  transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
}
.login form .input:focus, .login input[type="text"]:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ff3e3e;
    outline: none;
}
.login form .forgetmenot label {
    font-size: 0.9375rem;
    line-height: auto;
}
.wp-core-ui .button, .wp-core-ui .button.button-large, .wp-core-ui .button.button-small, a.preview, input#publish, input#save-post {
    padding: none;
    line-height: none;
    font-size: none;
    vertical-align: none;
    height: none;
    margin-bottom: none;
}
.login .button-primary {
  color: #fff;
  margin: 1rem 0 0 0;
  background-color: #bd0000;
  border-color: #bd0000;
  display: block;
  width: 100%;
  height: auto !important;
	font-weight: normal;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	border: 1px solid transparent;
	padding: 0.5rem 0.75rem !important;
	font-size: 0.9375rem !important;
	line-height: 1.25 !important;
	-webkit-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  text-shadow: none !important;
  border-radius: 0px !important;
}

.login .button-primary:hover, .login .button-primary:focus, .login .button-primary:active {
  color: #fff;
  background-color: #970000;
  border-color: #8a0000;
}

body, html, .login, #login {
  height: auto;
  background-color: #FFF;
}
 </style>

 <?php }

 add_action('login_head', 'childtheme_custom_login');

 function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'CLS ASC Homepage';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function smallenvelop_login_message( $message ) {
    if ( empty($message) ){
        return "<div class=\"cell\"><h1 class=\"h3 pt-0\">Login with G Suite</h1>
        <p>Committee Members &amp; Coaches should login with our Single Sign-On system using their G Suite Account.</p>
        <p>Website only users should login with their WordPress Username and Password below.</p>
        <a class=\"btn btn-primary btn-block\" href=\"http://login.chesterlestreetasc.co.uk/\" target=\"_self\">Login with CLS ASC Single Sign On</a></div>";
    } else {
        return $message;
    }
}

add_filter( 'login_message', 'smallenvelop_login_message' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', '/wp-content/themes/chester/css/bootstrap.css' );
    wp_enqueue_style( 'custom-login2', '/wp-content/themes/chester/chester.css' );
    wp_enqueue_script( 'custom-login3', 'https://static.chesterlestreetasc.co.uk/global/js/jquery.min.js' );
    wp_enqueue_script( 'custom-login4', '/wp-content/themes/chester/js/popper.min.js' );
    wp_enqueue_script( 'custom-login5', '/wp-content/themes/chester/js/bootstrap.min.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
