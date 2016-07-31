<?php

	/**
	 * List of available shortcodes
	 */
	function su_shortcodes( $shortcode = false ) {
	
	$menu_list = array();
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	foreach ( $menus as $menu ) {
		$menu_list[] = $menu->name;
	}
	
		$shortcodes = array(
			# basic shortcodes - start
			'basic-shortcodes-open' => array(
				'name' => __( 'Frequently Needed Shortcodes', 'csb-admin' ),
				'type' => 'opengroup'
			),
				
				# column
				'column' => array(
					'name' => 'Columns',
					'type' => 'wrap',
					'atts' => array(
						'size' => array(
							'values' => array(
								'1-2',
								'1-3',
								'1-4',
								'1-5',
								'1-6',
								'2-3',
								'2-5',
								'3-4',
								'3-5',
								'4-5',
								'5-6'
							),
							'default' => '1-2',
							'desc' => __( 'Column width', 'csb-admin' )
						),
						'last' => array(
							'values' => array(
								'0',
								'1'
							),
							'default' => '0',
							'desc' => __( 'Last column <span>(0 = false, 1 = true)</span>', 'csb-admin' )
						)
					),
					'usage' => '[column size="1-2"] Content [/column]<br/>[column size="1-2" last="1"] Content [/column]',
					'content' => __( 'Column content', 'csb-admin' ),
					'desc' => __( 'Flexible columns', 'csb-admin' )
				),
				
				# heading
				'heading' => array(
					'name' => 'Heading',
					'type' => 'wrap',
					'atts' => array(
						'size' => array(
								'values' => array( ),
								'default' => '28',
								'desc' => __( 'Heading Size', 'csb-admin' )
							),
						'align' => array(
							'values' => array(
								'left',
								'center',
								'right'
							),
							'default' => 'left',
							'desc' => __( 'Align', 'csb-admin' )
						),
					),
					'usage' => '[heading] Content [/heading]',
					'content' => __( 'Heading text', 'csb-admin' ),
					'desc' => __( 'Styled heading', 'csb-admin' )
				),
								
				# spacer
				'spacer' => array(
					'name' => 'Spacer',
					'type' => 'single',
					'atts' => array(
						'size' => array(
							'values' => array( ),
							'default' => '20',
							'desc' => __( 'Spacer height in pixels', 'csb-admin' )
						)
					),
					'usage' => '[spacer size="20"]',
					'desc' => __( 'Empty space with adjustable height (White space)', 'csb-admin' )
				),
				
				# button
				'button' => array(
					'name' => 'Button',
					'type' => 'wrap',
					'atts' => array(
						'link' => array(
							'values' => array( ),
							'default' => '#',
							'desc' => __( 'Button link URL <span>(include http://)</span>', 'csb-admin' )
						),
						'color' => array(
							'values' => array( ),
							'default' => ot_get_option('general_color'),
							'desc' => __( 'Button color <span>(clear to use "Primary theme color")</span>', 'csb-admin' ),
							'type' => 'color'
						),
						'target' => array(
							'values' => array(
								'self',
								'blank'
							),
							'default' => 'self',
							'desc' => __( 'Button link target', 'csb-admin' )
						),
						'icon' => array(
							'values' => array( ),
							'default' => '',
							'desc' => __( 'Add icon <span>(optional)</span>', 'csb-admin' ),
							'type' => 'icon'
						),
						'size' => array(
							'values' => array(
								'small',
								'medium',
								'large'
							),
							'default' => 'small',
							'desc' => __( 'Button Size', 'csb-admin' )
						),
						'text' => array(
							'values' => array(
								'light',
								'dark-text'
							),
							'default' => 'light',
							'desc' => __( 'Text color', 'csb-admin' )
						),
					),
					'usage' => '[button link="#" size="3" style="3" dark="1" square="1"] Button text [/button]',
					'content' => __( 'Button text', 'csb-admin' ),
					'desc' => __( 'Styled button', 'csb-admin' )
				),

				
				
				
				# list
				'list' => array(
					'name' => 'List',
					'type' => 'wrap',
					'atts' => array(
						'icon' => array(
							'values' => array( ),
							'default' => '',
							'desc' => __( 'Choose list item icon', 'csb-admin' ),
							'type' => 'icon'
						),
						'color' => array(
							'values' => array( ),
							'default' => ot_get_option('general_color'),
							'desc' => __( 'Icon color <span>(clear to use "Primary theme color")</span>', 'csb-admin' ),
							'type' => 'color'
						)
					),
					'usage' => '[list]',
					'content' => 'Item text',
					'desc' => __( 'List item with custom icon', 'csb-admin' )
				),
				
				# fancy_link
				'fancy_link' => array(
					'name' => 'Fancy link',
					'type' => 'single',
					'atts' => array(
						'link_text' => array(
							'values' => array( ),
							'default' => 'Learn More',
							'desc' => __( 'Link text', 'csb-admin' )
						),
						'url' => array(
							'values' => array( ),
							'default' => '#',
							'desc' => __( 'URL <span>(include http://)</span>', 'csb-admin' )
						),
						'float' => array(
							'values' => array(
								'none',
								'left',
								'right'
							),
							'default' => 'none',
							'desc' => __( 'Choose left or right link position', 'csb-admin' ),
						)
						
					),
					'usage' => '[fancy_link] Read more [/fancy_link]',
					'content' => __( 'Link text', 'csb-admin' ),
					'desc' => __( 'Styled link', 'csb-admin' )
				),
				
				# divider
				'divider' => array(
					'name' => 'Divider',
					'type' => 'single',
					'atts' => array(
						'style' => array(
							'values' => array(
								'default',
								'with-bottom-pointer',
								'with-top-pointer'
							),
							'default' => 'default',
							'desc' => __( 'Choose divider style', 'csb-admin' )
						),
						'color' => array(
								'values' => array( ),
								'default' => '#E7E7E7',
								'desc' => __( 'Divider color', 'csb-admin' ),
								'type' => 'color'
						)				
					),
					'usage' => '[divider top="1"]',
					'desc' => __( 'Content divider with 3 styles', 'csb-admin' )
				),
			
			# basic shortcodes - end
			'basic-shortcodes-close' => array(
				'type' => 'closegroup'
			),
			


			
			# content shortcodes - start
			'content-shortcodes-open' => array(
				'name' => __( 'Other Shortcodes', 'csb-admin' ),
				'type' => 'opengroup'
			),
						
				# quote
				'quote' => array(
					'name' => 'Quote',
					'type' => 'wrap',
					'atts' => array(
						'author' => array(
								'values' => array( ),
								'default' => __( 'Author Name', 'csb-admin' ),
								'desc' => __( 'Author of a Quote <span>(Can be empty)</span>', 'csb-admin' )
						)
					),
					'usage' => '[quote] Content [/quote]',
					'content' => __( 'Quote text', 'csb-admin' ),
					'desc' => __( 'Blockquote alternative', 'csb-admin' )
				),
				# pullquote
				'pullquote' => array(
					'name' => 'Pullquote',
					'type' => 'wrap',
					'atts' => array(
						'align' => array(
							'values' => array(
								'left',
								'right'
							),
							'default' => 'left',
							'desc' => __( 'Pullquote alignment', 'csb-admin' )
						)
					),
					'usage' => '[pullquote align="left"] Content [/pullquote]',
					'content' => __( 'Pullquote', 'csb-admin' ),
					'desc' => __( 'Styled pullquote', 'csb-admin' )
				),
				
				
				# testimonial
				'testimonial' => array(
					'name' => 'Testimonial',
					'type' => 'wrap',
					'atts' => array(
						'author' => array(
							'values' => array( ),
							'default' => __( 'Author Name', 'csb-admin' ),
							'desc' => __( 'Author', 'csb-admin' )
						)
					),
					'usage' => '[testimonials] [testimonial author="autrhor"] content [/testimonial] [/testimonials]',
					'content' => __( 'Testimonial text', 'csb-admin' ),
					'desc' => __( 'User testimonial', 'csb-admin' )
				),
				
				# team
				'team' => array(
					'name' => 'Team',
					'type' => 'wrap',
					'atts' => array(
						'image' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Image URL <span>image width and height 130x130 for better view </span>', 'csb-admin' )
						),
						'name' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Name ', 'csb-admin' )
						),
						'profession' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Profession ', 'csb-admin' )
						),
						'facebook' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Facebook ', 'csb-admin' )
						),
						'hide_facebook' => array(
							'values' => array(
								'show',
								'hide'
							),
							'default' => 'show',
							'desc' => __( 'Hide Facebook Icon', 'csb-admin' )
						),
						'twitter' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Twitter ', 'csb-admin' )
						),
						'hide_twitter' => array(
							'values' => array(
								'show',
								'hide'
							),
							'default' => 'show',
							'desc' => __( 'Hide Twitter Icon', 'csb-admin' )
						),
						'linkedin' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Linked In ', 'csb-admin' )
						),
						'hide_linkedin' => array(
							'values' => array(
								'show',
								'hide'
							),
							'default' => 'show',
							'desc' => __( 'Hide LinkedIn Icon', 'csb-admin' )
						),
						'custom_icon' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Custom icon <span>Paste icon class, you can find icons class on <a href="http://www.defatch.com/themes/valise/style/icons/" target="_blank">here</a> Eg : icon-youtube</span>', 'csb-admin' )
						),
						'custom_icon_url' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Custom icon link ', 'csb-admin' )
						),
						'hide_custom_icon' => array(
							'values' => array(
								'show',
								'hide'
							),
							'default' => 'show',
							'desc' => __( 'Hide Custom Icon', 'csb-admin' )
						),
						
					),
					'usage' => '[team name="Jeo Lawren"] content [/team]',
					'content' => __( 'Short info about the member', 'csb-admin' ),
					'desc' => __( 'Team member', 'csb-admin' )
				),
				
				
				
				# services
				'services' => array(
					'name' => 'Services',
					'type' => 'wrap',
					'atts' => array(
						'icon_class' => array(
							'values' => array( ),
							'default' => __( 'icon-heart', 'csb-admin' ),
							'desc' => __( 'Icon Class <span>Paste icon class, you can find icons class on <a href="http://www.defatch.com/themes/valise/style/icons/" target="_blank">here</a> Eg : icon-heart</span>', 'csb-admin' )
						),
						'heading' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Heading ', 'csb-admin' )
						),
						'button_text' => array(
							'values' => array( ),
							'default' => __( 'Read More', 'csb-admin' ),
							'desc' => __( 'Button Text ', 'csb-admin' )
						),
						'button_link' => array(
							'values' => array( ),
							'default' => __( '#', 'csb-admin' ),
							'desc' => __( 'Button Link ', 'csb-admin' )
						),
						'hide_button' => array(
							'values' => array(
								'show',
								'hide'
							),
							'default' => 'show',
							'desc' => __( 'Hide Button', 'csb-admin' )
						)						
					),
					'usage' => '[services heading="Responsive" icon_class="icon-heart"] content [/services]',
					'content' => __( 'Add your services text', 'csb-admin' ),
					'desc' => __( 'Add your services box', 'csb-admin' )
				),
				
				# counter
				'counter' => array(
					'name' => 'Counter',
					'type' => 'wrap',
					'atts' => array(
						'icon_class' => array(
							'values' => array( ),
							'default' => __( 'icon-heart', 'csb-admin' ),
							'desc' => __( 'Icon Class <span>Paste icon class, you can find icons class on <a href="http://www.defatch.com/themes/valise/style/icons/" target="_blank">here</a> Eg : icon-heart</span>', 'csb-admin' )
						),
						'background' => array(
							'values' => array( ),
							'default' => '#34b78b',
							'desc' => __( 'Icon Background color', 'csb-admin' ),
							'type' => 'color'
						),
						'heading' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Heading ', 'csb-admin' )
						),
						'count_num' => array(
							'values' => array( ),
							'default' => __( '300', 'csb-admin' ),
							'desc' => __( 'Counter Numbers', 'csb-admin' )
						)
					),
					'usage' => '[counter heading="Coffee" icon_class="icon-coffee" count_num="200"][/counter]',
					'desc' => __( 'Add your counter', 'csb-admin' )
				),
				
				
				# timelines
				'timelines' => array(
					'name' => 'Timelines',
					'type' => 'wrap',
					'atts' => array(
									
					),
					'usage' => '[timelines] content [/timelines]',
					'content' => __( '[timeline heading=&quot;Company Start-Up&quot; icon_class=&quot;icon-heart&quot; background=&quot;#e3c66e&quot;] content [/timeline]', 'csb-admin' ),
					'desc' => __( 'Put this shortcode before', 'csb-admin' )
				),
				
				# timeline
				'timeline' => array(
					'name' => 'Timeline',
					'type' => 'wrap',
					'atts' => array(
						'icon_class' => array(
							'values' => array( ),
							'default' => __( 'icon-heart', 'csb-admin' ),
							'desc' => __( 'Icon Class <span>Paste icon class, you can find icons class on <a href="http://www.defatch.com/themes/valise/style/icons/" target="_blank">here</a> Eg : icon-heart</span>', 'csb-admin' )
						),
						'heading' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Heading ', 'csb-admin' )
						),
						'background' => array(
							'values' => array( ),
							'default' => '#e3c66e',
							'desc' => __( 'Icon Background color', 'csb-admin' ),
							'type' => 'color'
						)					
					),
					'usage' => '[timeline heading="Responsive" icon_class="icon-heart" background="#e3c66e"] content [/timeline]',
					'content' => __( 'Add your Timline', 'csb-admin' ),
					'desc' => __( 'Dont put this without [timelines]', 'csb-admin' )
				),


		
				
				# highlight
				'highlight' => array(
					'name' => 'Highlight',
					'type' => 'wrap',
					'atts' => array(
						'bg' => array(
							'values' => array( ),
							'default' => '#e6db55',
							'desc' => __( 'Background color', 'csb-admin' ),
							'type' => 'color'
						),
						'color' => array(
							'values' => array( ),
							'default' => '#000000',
							'desc' => __( 'Text color', 'csb-admin' ),
							'type' => 'color'
						)
					),
					'usage' => '[highlight bg="#fc0" color="#000"] Content [/highlight]',
					'content' => __( 'Highlighted text', 'csb-admin' ),
					'desc' => __( 'Highlighted text', 'csb-admin' )
				),
				
				# dropcap
				'dropcap' => array(
					'name' => 'Dropcap',
					'type' => 'wrap',
					'atts' => array(
						'bg' => array(
							'values' => array( ),
							'default' => '#222222',
							'desc' => __( 'Background color', 'csb-admin' ),
							'type' => 'color'
						),
						'color' => array(
							'values' => array( ),
							'default' => '#ffffff',
							'desc' => __( 'Text color', 'csb-admin' ),
							'type' => 'color'
						)
					),
					'usage' => '[dropcap style=""] [/dropcap]',
					'content' => 'A',
					'desc' => __( 'Styled dropcaps', 'csb-admin' )
				),
				

				# box
				'box' => array(
					'name' => 'Box',
					'type' => 'wrap',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Box title', 'csb-admin' ),
							'desc' => __( 'Box title', 'csb-admin' )
						),
						'color' => array(
							'values' => array( ),
							'default' => '#333333',
							'desc' => __( 'Box color', 'csb-admin' ),
							'type' => 'color'
						)
					),
					'usage' => '[box title="Box title" color="#f00"] Content [/box]',
					'content' => __( 'Box content', 'csb-admin' ),
					'desc' => __( 'Colored box with title', 'csb-admin' )
				),
				# note
				'note' => array(
					'name' => 'Note',
					'type' => 'wrap',
					'atts' => array(
						'color' => array(
							'values' => array( ),
							'default' => '#FFCC00',
							'desc' => __( 'Note color', 'csb-admin' ),
							'type' => 'color'
						)
					),
					'usage' => '[note color="#FFCC00"] Content [/note]',
					'content' => __( 'Note text', 'csb-admin' ),
					'desc' => __( 'Colored note box', 'csb-admin' )
				),
				# callout
				'callout' => array(
					'name' => 'Call Out',
					'type' => 'wrap',
					'atts' => array(
							'add_button' => array(
								'values' => array(
									'yes',
									'no'
								),
								'default' => 'no',
								'desc' => __( 'Show button?', 'csb-admin' )
							),
							'button_text' => array(
								'values' => array( ),
								'default' => __( 'Learn More', 'csb-admin' ),
								'desc' => __( 'Button text', 'csb-admin' )
							),
							'button_url' => array(
								'values' => array( ),
								'default' => __( '#', 'csb-admin' ),
								'desc' => __( 'Button URL <span>(include http://)</span>', 'csb-admin' )
							),
							'button_icon' => array(
								'values' => array( ),
								'default' => '',
								'desc' => __( 'Button Icon <span>(optional)</span>', 'csb-admin' ),
								'type' => 'icon'
							)
					),		
					'usage' => '[callout color="#FFCC00"] Content [/callout]',
					'content' => __( '<h4><strong>This is title</strong></h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mollis nisl.', 'csb-admin' ),
					'desc' => __( 'Call out box', 'csb-admin' )
				),			
												
				# post shortcode
				'show_posts' => array(
					'name' => 'Show posts',
					'type' => 'single',
					'atts' => array(
						'post_category' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Category <span>(category slug for post)</span>', 'csb-admin' )
						),
						'port_category' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Portfolio Category <span>(category slug for portfolio)</span>', 'csb-admin' )
						),
						'tag' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Tag SLUG <span>Note : Portfolio not have tags</span>', 'csb-admin' )
						),
						'type' => array(
							'values' => array(
								'excerpt',
								'thumbnail-excerpt'
							),
							'default' => 'excerpt',
							'desc' => __( 'Content type', 'csb-admin' )
						),	
						'excerpt_words' => array(
							'values' => false,
							'default' => '18',
							'desc' => __( 'Words in excerpt', 'csb-admin' )
						),
						'limit' => array(
							'values' => false,
							'default' => '3',
							'desc' => __( 'Number of posts', 'csb-admin' )
						),
						'orderby' => array(
							'values' => array(
								'ID',
								'author',
								'title',
								'date',
								'modified',
								'parent',
								'rand',
								'comment_count'	
							),
							'default' => 'date',
							'desc' => __( 'Order by', 'csb-admin' )
						),
						'order' => array(
							'values' => array(
								'ASC',
								'DESC'
							),
							'default' => 'DESC',
							'desc' => __( 'Order', 'csb-admin' )
						),	
						'offset' => array(
							'values' => false,
							'default' => '0',
							'desc' => __( 'Offset', 'csb-admin' )
						),
						'post_type' => array(
							'values' => false,
							'default' => 'post',
							'desc' => __( 'Post type <span>Use : post (or) portfolio</span>', 'csb-admin' )
						),
						'exclude' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Exclude By id <span>Exclude this id.</span>', 'csb-admin' )
						),
						'id' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Post ID <span>Show only this post</span>', 'csb-admin' )
						)
					),
					'usage' => '[show_posts]',
					'desc' => __( 'Display your latest posts or posts from certain categories', 'csb-admin' )
				),
				
				# accordion
				'accordion' => array(
					'name' => 'Accordion',
					'type' => 'wrap',
					'atts' => array( ),
					'usage' => '[accordion]<br/>[spoiler open="true"] content [/spoiler]<br/>[spoiler] content [/spoiler]<br/>[spoiler] content [/spoiler]<br/>[/accordion]',
					'content' => '[spoiler] content [/spoiler][spoiler] content 2 [/spoiler]',
					'desc' => __( 'Toggle view content / FAQ', 'csb-admin' )
				),
						
				# spoiler
				'spoiler' => array(
					'name' => 'Spoiler',
					'type' => 'wrap',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Spoiler title', 'csb-admin' ),
							'desc' => __( 'Spoiler title', 'csb-admin' )
						),
						'open' => array(
							'values' => array(
								'0',
								'1'
							),
							'default' => '0',
							'desc' => __( 'Open by default? <span>(0 = false, 1 = true)</span>', 'csb-admin' )
						),
						'style' => array(
							'values' => array(
								'1',
								'2'
							),
							'default' => '1',
							'desc' => __( 'Spoiler style', 'csb-admin' )
						)
					),
					'usage' => '[spoiler title="Spoiler title"] Hidden text [/spoiler]',
					'content' => __( 'Hidden content', 'csb-admin' ),
					'desc' => __( 'Toggle hidden text / FAQ', 'csb-admin' )
				),
				
				# skillbar
				'skillbar' => array(
					'name' => 'Skillbar',
					'type' => 'single',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => 'WordPress',
							'desc' => __( 'Bar title', 'csb-admin' )
						),
						'level' => array(
							'values' => array( ),
							'default' => '80',
							'desc' => __( 'Level', 'csb-admin' )
						)
					),
					'usage' => '[skill]',
					'desc' => __( 'Show skill level', 'csb-admin' )
				),				
								
				# tabs
				'tabs' => array(
					'name' => 'Tabs',
					'type' => 'wrap',
					'atts' => array(
						'style' => array(
							'values' => array(
								'1',
								'2'
							),
							'default' => '1',
							'desc' => __( 'Tabs style', 'csb-admin' )
						)
					),
					'usage' => '[tabs style="1"] [tab title="Tab name"] Tab content [/tab] [/tabs]',
					'content' => '[tab title=&quot;Tab name&quot;] Tab content [/tab][tab title=&quot;Tab name 2&quot;] Tab content 2[/tab]',
					'desc' => __( 'Tabs container (Use with TAB shortcode)', 'csb-admin' )
				),
				# tab
				'tab' => array(
					'name' => 'Tab',
					'type' => 'wrap',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Title', 'csb-admin' ),
							'desc' => __( 'Tab title', 'csb-admin' )
						),
						'icon' => array(
							'values' => array( ),
							'default' => '',
							'desc' => __( 'Icon', 'csb-admin' ),
							'type' => 'icon'
						)
					),
					'usage' => '[tabs style="1"] [tab title="Tab name"] Tab content [/tab] [/tabs]',
					'content' => __( 'Tab content', 'csb-admin' ),
					'desc' => __( 'Single tab', 'csb-admin' )
				),
								
				# clients
				'client' => array(
					'name' => 'Client',
					'type' => 'single',
					'atts' => array(
						'logo' => array(
							'values' => array( ),
							'default' => '',
							'desc' => __( 'Logo IMG URL<span>(min width: 280px) (include http://)</span>', 'csb-admin' )
						),
						'link' => array(
							'values' => array( ),
							'default' => '',
							'desc' => __( 'Client container URL <span>(optional) (include http://)</span>', 'csb-admin' )
						),
						'align' => array(
							'values' => array(
								'center',
								'left',
								'right'
							),
							'default' => 'center',
							'desc' => __( 'Image align', 'csb-admin' )
						)
					),
					'usage' => '[client]',
					'desc' => __( 'Add styled client or partner logo', 'csb-admin' )
				),
				
				# pricing box
				'pricing' => array(
					'name' => 'Pricing box',
					'type' => 'wrap',
					'atts' => array(
						'color' => array(
							'values' => array( ),
							'default' => '#2b2b2b',
							'desc' => __( 'Background color', 'csb-admin' ),
							'type' => 'color'
						),
						'slug' => array(
							'values' => array( ),
							'default' => __( 'Popular', 'csb-admin' ),
							'desc' => __( 'Pricing Category<span>(eg: Popular)</span>', 'csb-admin' )
						),
						'title' => array(
							'values' => array( ),
							'default' => __( 'This is title', 'csb-admin' ),
							'desc' => __( 'Plans', 'csb-admin' )
						),
						'currency' => array(
							'values' => array( ),
							'default' => __( '$', 'csb-admin' ),
							'desc' => __( 'Offer currency', 'csb-admin' )
						),
						'price' => array(
							'values' => array( ),
							'default' => __( '10', 'csb-admin' ),
							'desc' => __( 'Offer price', 'csb-admin' )
						),
						'period' => array(
							'values' => array( ),
							'default' => __( '/mo', 'csb-admin' ),
							'desc' => __( 'Offer period', 'csb-admin' )
						)
					),
					'usage' => '[pricing] Content [/pricing]',
					'content' => '<ul><li>20GB Storage</li><li>1024MB Ram</li><li>C-panel</li><li>INSERT BUTTON HERE</li></ul>',
					'desc' => __( 'Styled pricing boxes', 'csb-admin' )
				),

				# menu
				'sitemap' => array(
					'name' => 'Sitemap',
					'type' => 'single',
					'atts' => array(
						'name' => array(
							'values' => $menu_list,
							'default' => '',
							'desc' => __( 'Choose custom menu', 'csb-admin' )
						)
					),
					'usage' => '[sitemap name="Main menu"]',
					'desc' => __( 'Sitemap style for custom menu', 'csb-admin' )
				),

				# document
				'document' => array(
					'name' => 'Document',
					'type' => 'single',
					'atts' => array(
						'file' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Document URL <span>(include http://)</span>', 'csb-admin' )
						),
						'width' => array(
							'values' => false,
							'default' => '600',
							'desc' => __( 'Width', 'csb-admin' )
						),
						'height' => array(
							'values' => false,
							'default' => '400',
							'desc' => __( 'Height', 'csb-admin' )
						)
					),
					'usage' => '[document file="file.doc" width="600" height="400"]',
					'desc' => __( '.doc, .xls, .pdf viewer by Google', 'csb-admin' )
				),
				
				# youtube
				'youtube' => array(
					'name' => 'Youtube',
					'type' => 'single',
					'atts' => array(
						'video' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Video Id <span>(Eg : 123456789)</span>', 'csb-admin' )
						),
						'width' => array(
							'values' => false,
							'default' => '600',
							'desc' => __( 'Width', 'csb-admin' )
						),
						'height' => array(
							'values' => false,
							'default' => '400',
							'desc' => __( 'Height', 'csb-admin' )
						)
					),
					'usage' => '[document video="12345678" width="600" height="400"]',
					'desc' => __( 'Youtube video id', 'csb-admin' )
				),
				
				# vimeo
				'vimeo' => array(
					'name' => 'Vimeo',
					'type' => 'single',
					'atts' => array(
						'video' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Video Id <span>(Eg : 123456789)</span>', 'csb-admin' )
						),
						'width' => array(
							'values' => false,
							'default' => '600',
							'desc' => __( 'Width', 'csb-admin' )
						),
						'height' => array(
							'values' => false,
							'default' => '400',
							'desc' => __( 'Height', 'csb-admin' )
						)
					),
					'usage' => '[document video="12345678" width="600" height="400"]',
					'desc' => __( 'Vimeo video id', 'csb-admin' )
				),
				
				# dailymotion
				'dailymotion' => array(
					'name' => 'Dailymotion',
					'type' => 'single',
					'atts' => array(
						'video' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Video Id <span>(Eg : x17em84)</span>', 'csb-admin' )
						),
						'width' => array(
							'values' => false,
							'default' => '600',
							'desc' => __( 'Width', 'csb-admin' )
						),
						'height' => array(
							'values' => false,
							'default' => '400',
							'desc' => __( 'Height', 'csb-admin' )
						)
					),
					'usage' => '[dailymotion video="x17em84" width="600" height="400"]',
					'desc' => __( 'Dailymotion video id', 'csb-admin' )
				),
				
				# image
				'image' => array(
					'name' => 'image',
					'type' => 'single',
					'atts' => array(
						'url' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Image URL', 'csb-admin' )
						),
						'width' => array(
							'values' => false,
							'default' => '600',
							'desc' => __( 'Width', 'csb-admin' )
						),
						'height' => array(
							'values' => false,
							'default' => '400',
							'desc' => __( 'Height', 'csb-admin' )
						),
						'align' => array(
							'values' => array(
								'alignleft',
								'aligncenter',
								'alignright'
							),
							'default' => 'small',
							'desc' => __( 'Button Size', 'csb-admin' )
						),
					),
					'usage' => '[image url="" width="600" height="400" align=""]',
					'desc' => __( 'Image URL', 'csb-admin' )
				),
				
				
				# gmap
				'gmap' => array(
					'name' => 'Gmap',
					'type' => 'single',
					'atts' => array(
						'width' => array(
							'values' => false,
							'default' => '600',
							'desc' => __( 'Width', 'csb-admin' )
						),
						'height' => array(
							'values' => false,
							'default' => '400',
							'desc' => __( 'Height', 'csb-admin' )
						),
						'address' => array(
							'values' => false,
							'default' => '',
							'desc' => __( 'Marker address', 'csb-admin' )
						),
					),
					'usage' => '[gmap width="600" height="400" address="Russia, Moscow"]',
					'desc' => __( 'Maps by Google', 'csb-admin' )
				),
				
				# contact info
				'contact_info' => array(
					'name' => 'Contact Info',
					'type' => 'wrap',
					'atts' => array(
						'address' => array(
							'values' => array( ),
							'default' => __( '13, Main St, LocalHost, Uk', 'csb-admin' ),
							'desc' => __( 'Address : ', 'csb-admin' )
						),
						'phone' => array(
							'values' => array( ),
							'default' => __( '+61 (123) 456 789', 'csb-admin' ),
							'desc' => __( 'Phone Number :', 'csb-admin' )
						),
						'fax' => array(
							'values' => array( ),
							'default' => __( '+61 (123) 456 789', 'csb-admin' ),
							'desc' => __( 'Fax Number :', 'csb-admin' )
						),
						'email' => array(
							'values' => array( ),
							'default' => __( 'test@yoursite.com', 'csb-admin' ),
							'desc' => __( 'Email :', 'csb-admin' )
						),
						'website' => array(
							'values' => array( ),
							'default' => __( 'http://www.yoursite.com', 'csb-admin' ),
							'desc' => __( 'Website :', 'csb-admin' )
						)
					),
					'usage' => '[contact][/contact]',
					'content' => '',
					'desc' => __( 'Contact info', 'csb-admin' )
				),
				
				# pre
				'pre' => array(
					'name' => 'Code',
					'type' => 'wrap',
					'atts' => array(
						'heading' => array(
							'values' => array( ),
							'default' => __( '', 'csb-admin' ),
							'desc' => __( 'Heading <span>put inside a &lt;em&gt;&lt;/em&gt; tag</span> on content', 'csb-admin' )
						)					
					),
					'usage' => '[pre Heading="Your Heading"] content [/team]',
					'content' => __( '[but<em></em>ton]Dark Text[/button]', 'csb-admin' ),
					'desc' => __( 'Code', 'csb-admin' )
				),
				
				# clear
				'clear' => array(
					'name' => 'Clear',
					'type' => 'single',
					'atts' => array(),
					'usage' => '[clear]',
					'desc' => __( 'Clear floats after elements', 'csb-admin' )
				),
			
			# content shortcodes - end
			'content-shortcodes-close' => array(
				'type' => 'closegroup'
			),
			
		);

		if ( $shortcode )
			return $shortcodes[$shortcode];
		else
			return $shortcodes;
	}

?>