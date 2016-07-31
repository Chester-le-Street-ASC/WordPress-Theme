<?php

	/**
	 * Shortcode: heading
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_heading_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'color' => '',
				'size'  => '26',
				'align'  => 'left',
				'style' => 1
				), $atts ) );

		return '<div class="heading-wrapper"><h2 style="font-size:' . $size . 'px;line-height:' . $size . 'px;text-align: ' . $align . ';">' . $content . '</h2></div>';
	}
		
	/**
	 * Shortcode: service
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_service_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title' => 'Your service title',
				'size' => '24',
				'width' => '40',
				'color' => '',
				'url'=> '',
				'icon' => 'moon-checkmark'
				), $atts ) );
		
		
		if ($url){ $service_title = '<a href="' . $url . '" />' . $title . '</a>'; } else { $service_title = $title; }

		return '<div class="service-box"><i style="font-size:' . $size . 'px; color:' . $color . ';" class="' . $icon . '"></i><div class="service-content" style="margin-left:57px;"><h5>' . $service_title . '</h5>' . $content . '</div></div>';
	}
		
	/**
	 * Shortcode: clients
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_client_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'logo' => '',
				'link' => '',
				'align' => 'center'
				), $atts ) );
				
		$return = '';
		
		if ($link){ $return .= '<div class="client-wrapper" style="text-align:'. $align .'"><a href="'. $link .'">'; } else { $return .= '<div class="client-wrapper" style="text-align:'. $align .'">'; }

		$return .= '<img src="'. $logo .'" alt="" />';
		
		if ($link){ $return .= '</a></div>'; } else { $return .= '</div>'; }
		
		return $return;
	}
	
	
	/**
	 * Shortcode: background block
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_background_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'color' => '',
				'image' => '',
				'align' => 'center',
				'margin_bottom' => 40,
				'margin_top' => 0,
				'padding_top' => 40,
				'padding_bottom' => 40
				), $atts ) );
		
		$bg_image = ( $image ) ? 'background-image:url(' . $image . ');' : '';
				
		return '<div class="background-block" style="background-color:' . $color .'; '. $bg_image .' margin-top:' . $margin_top . 'px; margin-bottom:' . $margin_bottom . 'px; padding-top:' . $padding_top . 'px; padding-bottom:' . $padding_bottom . 'px; text-align:' . $align . ';"><div class="background-block-container">' . $content . '</div></div>';
	}
	
	

	/**
	 * Shortcode: testimonial
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_testimonial_shortcode( $atts, $content ) {
		extract( shortcode_atts( array( 
				'author' => 'Author Name' 
				), $atts ) );

		$return = '<div class="testimonial-wrapper"><div class="testimonial-content">' . $content . '</div><div class="testimonial-arrow"></div><div class="testimonial-author"><i class="moon-user-6"></i>' . $author . '</div></div>';
		
		return $return;
	}
	
	
	/**
	 * Shortcode: team
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_team_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'image' => '',
				'name' => '',
				'profession' => '',
				'facebook' => '',
				'hide_facebook' => '',
				'twitter' => '',
				'hide_twitter' => '',
				'linkedin' => '',
				'hide_linkedin' => '',
				'custom_icon' => '',
				'custom_icon_url' => '',
				'hide_custom_icon' => ''
				), $atts ) );
					
		return '<div class="team"><img src="'. $image .'" alt="' . $name .'"><h3>' . $name .'</h3><h5>' . $profession . '</h5><hr><div class="clearfix"><p>' . $content . '</p><section class="social-connect"><ul><li class="' . $hide_facebook . '"><a href="' . $facebook . '" target="_blank"><i class="icon-facebook"></i></a></li><li class="' . $hide_twitter . '"><a href="' . $twitter . '" target="_blank"><i class="icon-twitter"></i></a></li><li class="' . $hide_linkedin . '"><a href="' . $linkedin . '" target="_blank"><i class="icon-linkedin-sign"></i></a></li><li class="' . $hide_custom_icon . '"><a href="' . $custom_icon_url . '" target="_blank"><i class="' . $custom_icon . '"></i></a></li></ul></section></div></div>';
		
	}
	
	
	/**
	 * Shortcode: services
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_services_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'icon_class' => 'icon-heart',
				'heading' => '',
				'button_text' => '',
				'button_link' => '',
				'hide_button' => ''
				), $atts ) );
							
		return '<div class="contentblock services-list"><div class="iconcircle"><i class="'. $icon_class .'"></i></div><div class="services-desc"><h5>'. $heading .'</h5><p>' . $content . '</p><br><a href="'. $button_link .'" class="su-button '. $hide_button .'">'. $button_text .'</a></div></div>';
		
	}
	
	/**
	 * Shortcode: counter
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_counter_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'icon_class' => 'icon-heart',
				'background' => '',
				'heading' => '',
				'count_num' => ''
				), $atts ) );
							
		return '<div class="count"><div class="total-numbers"><div class="counter"><div class="counter-icon" style="background:'. $background .';"><i class="'. $icon_class .'"></i></div><div class="count-title"><span class="sum">'. $count_num .'</span><h3>'. $heading .'</h3></div></div></div></div>';

	}
	
	
	/**
	 * Shortcode: timelines
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_timelines_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				
				), $atts ) );
							
		return '<ul class="timeline">' . do_shortcode ($content) . '</ul>';
				
	}
	
	/**
	 * Shortcode: timeline
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_timeline_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'icon_class' => 'icon-heart',
				'heading' => '',
				'background' => ''
				), $atts ) );
							
		return '<div class="timeline"><li><div class="timeline_icon" style="background:'. $background .';"><i class="'. $icon_class .'"></i></div><div class="timeline_label"><h2>'. $heading .'</h2><p>' . $content . '</p></p></div></li></div>';
				
	}

	/**
	 * Shortcode: tabs
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_tabs_shortcode( $atts, $content ) {
		extract( shortcode_atts( array(
				'style' => 1
				), $atts ) );

		$GLOBALS['tab_count'] = 0;

		do_shortcode( $content );

		if ( is_array( $GLOBALS['tabs'] ) ) {
			foreach ( $GLOBALS['tabs'] as $tab ) {
				$tab_icon = ( $tab['icon'] ) ? '<i class="' . $tab['icon'] . ' su-tab-icon"></i>' : '';
				$tabs[] = '<span>' . $tab_icon . $tab['title'] . '</span>';
				$panes[] = '<div class="pane-wrapper"><div class="pane-title"><i class="' . $tab['icon'] . ' su-tab-icon"></i>' . $tab['title'] . '</div><div class="su-tabs-pane">' . $tab['content'] . '</div></div>';
			}
			$return = '<div class="su-tabs su-tabs-style-' . $style . '"><div class="su-tabs-nav">' . implode( '', $tabs ) . '<div class="su-tabs-nav-shadow"></div></div><div class="su-tabs-panes">' . implode( "\n", $panes ) . '</div><div class="clear"></div></div>';
		}

		// Unset globals
		unset( $GLOBALS['tabs'], $GLOBALS['tab_count'] );

		return $return;
	}

	/**
	 * Shortcode: tab
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_tab_shortcode( $atts, $content ) {
		extract( shortcode_atts( array( 'title' => 'Tab %d', 'icon' => '' ), $atts ) );
		$x = $GLOBALS['tab_count'];
		$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'icon' => $icon, 'content' => do_shortcode( $content ) );
		$GLOBALS['tab_count']++;
	}

	/**
	 * Shortcode: spoiler
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_spoiler_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title' => __( 'Spoiler title', 'csb-admin' ),
				'open' => false,
				'style' => 1,
				'color' => ''
				), $atts ) );

		$open_class = ( $open ) ? ' su-spoiler-open' : '';
		$open_display = ( $open ) ? ' style="display:block"' : '';

		return '<div class="su-spoiler su-spoiler-style-' . $style . $open_class . '"><div class="su-spoiler-title"><i class="icon-plus spoiler-button"></i><i class="icon-minus spoiler-button spoiler-active"></i>' . $title . '</div><div class="su-spoiler-content"' . $open_display . '>' . su_do_shortcode( $content, 's' ) . '</div></div>';
	}

	/**
	 * Shortcode: accordion
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_accordion_shortcode( $atts = null, $content = null ) {

		return '<div class="su-accordion">' . su_do_shortcode( $content, 'a' ) . '</div>';
	}

	/**
	 * Shortcode: divider
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_divider_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 'default',
				'color' => '#E7E7E7'
				), $atts ) );

		if ($style == 'with-bottom-pointer'){
			$return = '<div class="divider-arrow-down" style="background-color:' . $color . '; border-top-color:' . $color . ';"></div>';
		} elseif ($style == 'with-top-pointer'){
			$return = '<div class="divider-arrow-up" style="background-color:' . $color . '; border-bottom-color:' . $color . ';"></div>';
		} else {
			$return = '<div class="divider" style="border-color:' . $color . ';"></div>';
		};
		
		return $return;
	}
	
	/**
	 * Shortcode: spacer
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_spacer_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'size' => 0
				), $atts ) );

		return '<div class="spacer" style="height:' . $size . 'px"></div>';
	}

	/**
	 * Shortcode: highlight
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'bg' => '#fff287',
				'color' => '#000'
				), $atts ) );

		return '<span class="su-highlight" style="background:' . $bg . ';color:' . $color . '">&nbsp;' . $content . '&nbsp;</span>';
	}

	/**
	 * Shortcode: column
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_column_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'size' => '1-2',
				'last' => false
				), $atts ) );

		return ( $last ) ? '<div class="column column-' . $size . ' column-last">' . do_shortcode( $content ) . '</div><div class="clear"></div>' : '<div class="column column-' . $size . '">' . do_shortcode( $content ) . '</div>';
	}

	/**
	 * Shortcode: quote
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_quote_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1,

				'author' => ' Author Name'
				), $atts ) );

		return '<div class="su-quote"><i class="icon-quote-left"></i><div class="su-quote-shell">' . $content . '</div><div class="quote-author">' . $author . '</div></div>';
	}

	/**
	 * Shortcode: pullquote
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_pullquote_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1,
				'align' => 'left'
				), $atts ) );

		return '<div class="su-pullquote su-pullquote-style-' . $style . ' su-pullquote-align-' . $align . '">' . $content . '</div>';
	}

	/**
	 * Shortcode: button
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'link' => '#',
				'color' => '',
				'icon' => '',
				'size' => 'su-small',
				'text' => 'light',
				'target' => false
				), $atts ) );

		$v_icon = ( $icon ) ? '<i class="' . $icon . '"></i>' : '';
		$target = ( $target ) ? ' target="_' . $target . '"' : '';

		return '<a href="' . $link . '" class="su-button su-'. $size .' '. $text .'" ' . $target . ' style="background-color:'. $color .'">' . $v_icon . $content . '</a>';
	}
	
	/**
	 * Shortcode: fancy-link
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_fancy_link_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'link_text' => 'Learn More',
				'url' => '#',
				'float' => 'left'
				), $atts ) );

		return '<a class="su-fancy-link" style="float:' . $float . '" href="' . $url . '">' . $link_text . '<span>&rsaquo;</span></a>';
	}

	/**
	 * Shortcode: box
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_box_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'color' => '#333',
				'title' => __( 'This is box title', 'csb-admin' )
				), $atts ) );

		$styles = array(
			'dark_color' => su_hex_shift( $color, 'darker', 20 ),
			'text_color' => su_hex_shift( $color, 'darker', 60 ),
			'light_color' => su_hex_shift( $color, 'lighter', 60 ),
			'text_shadow' => su_hex_shift( $color, 'darker', 20 ),
			'extra_light_color' => su_hex_shift( $color, 'lighter', 80 ),
		);

		return '<div class="su-box"><div class="su-box-title" style="background-color:' . $color . ';">' . $title . '</div><div class="su-box-content">' . $content . '</div></div>';
	}

	/**
	 * Shortcode: note
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_note_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'color' => '#fc0'
				), $atts ) );

		$styles = array(
			'dark_color' => su_hex_shift( $color, 'darker', 20 ),
			'light_color' => su_hex_shift( $color, 'lighter', 10 ),
			'extra_light_color' => su_hex_shift( $color, 'lighter', 50 ),
			'text_color' => su_hex_shift( $color, 'darker', 60 )
		);

		return '<div class="su-note" style="background-color:' . $styles['light_color'] . ';border:1px solid ' . $styles['dark_color'] . '"><div class="su-note-shell" style="border:1px solid ' . $styles['extra_light_color'] . '; color:' . $styles['text_color'] . '">' . $content . '</div></div>';
	}
	
	/**
	 * Shortcode: call out
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_callout_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'callout_icon' => 'moon-redo-2',
				'add_button' => 'no',
				'button_text' => 'Learn More',
				'button_icon' => '',
				'button_url' => '#'
				), $atts ) );
				
		if ($add_button == 'yes') { 
			$b_icon = ( $button_icon ) ? '<i class="' . $button_icon . '"></i>' : '';	
			$button = '<a href="' . $button_url . '" class="su-button callout-button">' . $b_icon . $button_text . '</a>';
		} else { $button = ''; }			

		$return = '<div class="su-callout"><div class="callout-content">' . $content .'</div>'. $button .'<div class="clear"></div></div>';
		
		return $return;
	}

	/**
	 * Shortcode: nivo_slider
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_nivo_slider_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => 1000,
				'height' => 300,
				'link' => false,
				'effect' => 'random',
				'navigation' => 1,
				'bullets' => 1,
				'pauseonhover' => 0,
				'speed' => 600,
				'delay' => 3000,
				'p' => false
				), $atts ) );

		global $post;
		$post_id = ( $p ) ? $p : $post->ID;

		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'order' => 'ASC',
			'post_status' => null,
			'post_parent' => $post_id
		);

		// Get attachments
		$attachments = get_posts( $args );

		// If has attachments
		if ( count( $attachments ) > 1 ) {
			$slider_id = uniqid( 'nivo-slider_' );
			$return = '<script type="text/javascript">
						jQuery(window).load(function() {
							jQuery("#' . $slider_id . '").nivoSlider({
								effect: "' . $effect . '",
								animSpeed: ' . $speed . ',
								directionNav: ' . $navigation . ',
								controlNav: ' . $bullets . ',
								pauseTime: ' . $delay . ',
								pauseOnHover: ' . $pauseonhover . ',
								afterLoad: function(){jQuery(".nivo-size-wrap").removeClass("nivo-loading");}
							});
						});
					</script>';
			$return .= '<div class="nivo-size-wrap nivo-loading" style="width:' . $width . 'px;"><div id="' . $slider_id . '" class="nivoSlider">';
			foreach ( $attachments as $attachment ) {

				$title = apply_filters( 'the_title', $attachment->post_title );
				$url = wp_get_attachment_image_src( $attachment->ID, 'full', false );
				$image = add_image_size( $url[0], $width, $height, true ); 

				// Link to file
				if ( $link == 'file' ) {
					$return .= '<a href="' . $url[0] . '" title=""><img src="' . $image . '" alt="' . $title . '" /></a>';
				}

				// Link to attachment page
				elseif ( $link == 'attachment' ) {
					$return .= '<a href="' . get_permalink( $attachment->ID ) . '"><img src="' . $image . '" alt="' . $title . '" /></a>';
				}

				// Custom link
				elseif ( $link == 'caption' ) {
					if ( $attachment->post_excerpt ) {
						$return .= '<a href="' . $attachment->post_excerpt . '" title=""><img src="' . $image . '" alt="' . $title . '" /></a>';
					} else {
						$return .= '<img src="' . $image . '" alt="' . $title . '" />';
					}
				}

				// No link
				else {
					$return .= '<img src="' . $image . '" alt="' . $title . '" />';
				}
			}
			$return .= '</div></div>';
		}

		// No attachments
		else {
			$return = '<p class="su-error"><strong>Nivo slider:</strong> ' . __( 'no attached images, or only one attached image', 'csb-admin' ) . '&hellip;</p>';
		}
		return $return;
	}

	/**
	 * Shortcode: menu
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_sitemap_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'name' => 1
				), $atts ) );

		$return = wp_nav_menu( array(
			'echo' => false,
			'menu' => $name,
			'container' => false,
			'menu_id' => 'sitemap_menu',
			'fallback_cb' => 'su_menu_shortcode_fb_cb'
			) );

		return ( $name ) ? $return : false;
	}

	/**
	 * Fallback callback function for menu shortcode
	 *
	 * @return string Text message
	 */
	function su_menu_shortcode_fb_cb() {
		return __( 'This menu doesn\'t exists, or has no elements', 'csb-admin' );
	}

	/**
	 * Shortcode: document
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_document_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => 600,
				'height' => 400,
				'file' => ''
				), $atts ) );

		return '<iframe src="http://docs.google.com/viewer?embedded=true&url=' . $file . '" width="' . $width . '" height="' . $height . '" class="su-document"></iframe>';
	}
	
	/**
	 * Shortcode: youtube
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_youtube_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => 600,
				'height' => 400,
				'video' => ''
				), $atts ) );

		return '<iframe src="http://www.youtube.com/embed/' . $video . '" width="' . $width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	
	/**
	 * Shortcode: vimeo
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_vimeo_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => 600,
				'height' => 400,
				'video' => ''
				), $atts ) );

		return '<iframe src="http://player.vimeo.com/video/' . $video . '" width="' . $width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	
	/**
	 * Shortcode: dailymotion
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_dailymotion_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => 600,
				'height' => 400,
				'video' => ''
				), $atts ) );

		return '<iframe src="http://www.dailymotion.com/embed/video/' . $video . '" width="' . $width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	
	/**
	 * Shortcode: image
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_image_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => 600,
				'height' => 400,
				'url' => '',
				'align' => '',
				), $atts ) );

		return '<img src="' . $url . '" width="' . $width . '" height="' . $height . '" class="'. $align .'" />';
	}

	/**
	 * Shortcode: gmap
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_gmap_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => 600,
				'height' => 400,
				'address' => 'Sydney NSW 2000, Australia'
				), $atts ) );

		return '<iframe style="margin-bottom:-5px;" width="' . $width . '" height="' . $height . '" src="http://maps.google.com/maps?q=' . urlencode( $address ) . '&amp;iwloc=near&amp;output=embed" class="su-gmap"></iframe>';
	}
	
	/**
	 * Shortcode: Contact Info
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_contact_info_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'address' => '13, Main St, LocalHost, Uk',
				'phone' => '+61 (123) 456 789',
				'fax' => '+61 (123) 456 789',
				'email' => 'test@minimallab.com',
				'website' => __( 'http://wwww.yourstie.com', 'csb-admin' )
				), $atts ) );
		
		$return = '<span><strong>Address: </strong>' . $address . '</span><br>';
		
		$return .= '<span><strong>Phone: </strong>' . $phone . '</span><br>';
		
		$return .= '<span><strong>Fax: </strong>' . $fax . '</span><br>';
		
		$return .= '<span><strong>Email: </strong><a href="mailto:' . $email . '">' . $email . '</a></span><br>';
		
		$return .= '<span><strong>Website: </strong><a href="' . $website . '" target="_blank">' . $website . '</a></span><br><br>';
		
		$return .= '<span>' . $content . '</span><br>';
			
		return $return;
	}

	
	/**
	 * Shortcode: Post shortcode
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_show_posts_shortcode($atts) {
	extract( shortcode_atts( array(
				'post_category' => '',
				'port_category' => '',
				'tag' => '',
				'id' => '',
				'exclude' => '',
				'offset' => 0,
				'limit' => 3,
				'type' => 'excerpt',
				'excerpt_words' => 24,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'paging' => false
				), $atts ) );

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;  

		query_posts(  array ( 
			'posts_per_page' => $limit, 
			'tag' => $tag,
			'p' => $id,
			'category_name' => $post_category,
			'portfolio_categories' => $port_category,
			'post__not_in' => array($exclude),
			'post_type' => $post_type, 
			'order' => $order, 
			'orderby' => $orderby,
			'offset' => $offset,			
			'paged' => $paged ) );

		global $more;
        $more = 0;
		$inner = '';
		$count = 0;
		
		while ( have_posts() ) : the_post();
		$count++;
		
		if( $count == 3  ){ 
			$add_class = 'project-list three-cols last';
			$count = 0;			
		} else {
			$add_class = 'project-list three-cols';	
		}

				
			// Content
			if ( $type == 'excerpt' ) {
				$title = '<h3><a href="'. get_permalink() .'">'.the_title("","",false).'</a></h3>';
				$meta = '<div class="blog-entry-date"><span>'. get_the_time('M') .'</span>'. get_the_time('j') .'</div>';
				$content = apply_filters('the_excerpt', get_excerpt($excerpt_words) );
				
				$output = '<div class="latest-blog-entry '. $add_class .'">'. $meta .'<div class="blog-entry-content">'. $title . $content . '</div></div>';
				$inner .= apply_filters( 'display_posts_shortcode_output', $output, $atts, $title, $meta, $content );
				
			} elseif ( $type == 'thumbnail-excerpt' ) {
				
				$title = '<h3><a href="'. get_permalink() .'">'.the_title("","",false).'</a></h3>';
				$content = apply_filters('the_excerpt', get_excerpt($excerpt_words) );
				$thumb_id = get_post_thumbnail_id();
				$thumb_url = wp_get_attachment_image_src($thumb_id,'project-thumb-3cols', true);
				$large_url = wp_get_attachment_image_src($thumb_id,'project-xlarge', true);
				
				$output = '<div class="latest-blog-entry-thumb '. $add_class .'"><div class="port-hover"><img src="'. $thumb_url[0] .'"/><div class="overlay"><a href="'. get_permalink() .'" class="details"><i class="icon-share-alt"></i>Details</a><a href="'. $large_url[0] .'" class="zoom fancybox"><i class="icon-eye-open"></i>View</a></div></div>'. $title . $content . '</div>';
				$inner .= apply_filters( 'display_posts_shortcode_output', $output, $atts, $thumb_url, $title, $content );
				
			} else {
				ob_start(); 
				get_template_part( 'content', get_post_format() );
				$inner .= ob_get_contents();  
				ob_end_clean();
			}
				
		endwhile;
		
	if ( $paging == 'true') {
		ob_start();
		wp_pagenavi();
		$pagenavi = ob_get_contents();
		ob_end_clean();	
	} else { 
		$pagenavi = '';
	}
	
	wp_reset_query();
	
	if ( $type == 'thumbnail-excerpt' ) {
		$return = $inner .'<div class="clear"></div>'.  $pagenavi;
	} else { 
		$return = $inner . $pagenavi;
	}	

	return $return;

	}

		
	/**
	 * Shortcode: skill
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_skillbar_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title' => 'WordPress',
				'level' => '90'
				), $atts ) );		

		return '<div class="skillbar-wrapper" data-perc="'. $level .'"><div class="skillbar"><div class="skillbar-title">'. $title . ' </div><span class="percentage">'. $level .'%</span></div></div>';
	}
	
	
	/**
	 * Shortcode: dropcap
	 */
	function su_dropcap_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'bg' => '#222',
		'color' => '#fff'
	), $atts));
	
		return '<span class="su-dropcap" style="background-color:' . $bg . '; color:' . $color . ';">'. $content .'</span>';
	}
	
	/**
	 * Shortcode: list
	 */
	function su_list_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'icon' => '',
		'color' => ''
	), $atts));
	
		return '<div class="custom-list"><i class="'. $icon .'" style="color:'. $color .';"></i>' . $content . '</div>';
	}
	
	
	/**
	 * Shortcode: pre
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_pre_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'heading' => ''
				), $atts ) );
					
		return '<pre><h2>'. $heading .'</h2><code>' . $content . '</code></pre>';
		
	}
	
	/**
	 * Div clear - shortcode
	 */
	function su_clear_shortcode() {
		 return '<div class="clear"></div>';
	}
	
		
	/**
	 * Break - shortcode
	 */
	function break_shortcode() {
		 return '<br />';
	}
	add_shortcode('br', 'break_shortcode');
	
	/**
	 * Shortcode: Pricing box
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_pricing_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'color' => '#2b2b2b',
				'currency' => '$',
				'price' => 10,
				'period' => '/mo',
				'slug' => '',
				'title' => __( 'This is title', 'csb-admin' )
				), $atts ) );

		$styles = array(
			'dark_color' => su_hex_shift( $color, 'darker', 20 ),
			'extra_light_color' => su_hex_shift( $color, 'lighter', 50 ),
		);
		
		$return = '<div class="pricing-box-wrapper">';
		
		$return .= '<div class="pricing-box-header" style="background-color:' . $color . '"><div class="pricing-box-info">' . $slug . '</div><h3 class="pricing-box-title" style="border-color: ' . $styles['dark_color'] . ';"> ' . $title . '</h3>';
		
		$return .= '<div class="pricing-box-header-content"><span class="pricing-box-currency">' . $currency . '</span>
		<span class="pricing-box-value">'. $price . '</span>
		<span class="pricing-box-period">' . $period . '</span></div>
		</div>';
		
		$return .= '<div class="pricing-box-content">' . $content . '</div>';
		
		$return .= '</div>';
		

		return $return;
	}
?>