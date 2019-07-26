/*
 * Register image sizes for use in "Add Media" modal in Gutenberg
 */
add_filter( 'image_size_names_choose', 'campfriendship_custom_sizes' );
function campfriendship_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        '430x430' => __( '430x430' ),
		'580x330' => __( '580x330' ),
        '960x470' => __( '960x470' ),
    ) );
}

/*
 * Use custom colors in ACF color picker
 */
function campfriendship_acf_input_admin_footer() {
	?>
	<script type="text/javascript">
	(function($) {
		
		// JS here
		acf.add_filter('color_picker_args', function( args, $field ){
	
			// do something to args
			args.palettes = ['#F0F0E9', '#fff', '#bfced6', '#00312B', '#ffc845', '#829995', '#006F62', '#487A7B', '#4b3d2a', '#a69f88', '#98a4ae' ]
			
			// return
			return args;
					
		});
		
	})(jQuery);	
	</script>
	<?php		
}
add_action('acf/input/admin_footer', 'campfriendship_acf_input_admin_footer');


/*--------------------------------------------------------------
## List Child Pages
## Tweaked to start from the level 1 ancestor page/post
--------------------------------------------------------------*/
function ivy_list_child_pages() { 
	global $post; 
	$post_type = get_post_type( $post);
		
		if ( is_page() && $post->post_parent ) {
			$parent = array_reverse(get_post_ancestors($post->ID));
			$first_parent = get_page($parent[0]);

			$parent_page = '<li class="parent_page_link"><a href="' . get_permalink($first_parent->ID) . '">' . $first_parent->post_title . '</a></li>';
			$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $first_parent->ID . '&echo=0' );
		}
		else  { 
			$post_ancestors = get_post_ancestors($post->ID);
			if (!(empty($post_ancestors))) {
				$parent = array_reverse($post_ancestors);
				$first_parent = get_page($parent[0]);
				
				$parent_page = '<li class="parent_page_link"><a href="' . get_permalink($first_parent->ID) . '">' . $first_parent->post_title . '</a></li>';
				$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $first_parent->ID . '&echo=0' );
			}
			else {
				$parent_page = '<li class="parent_page_link current-menu-item"><a href="' . $post->permalink . '">' . $post->post_title . '</a></li>';
				$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
			}
		}
		
		if ( $childpages ) {
			//var_dump($first_parent);
			$string = '<ul>' . $parent_page . $childpages . '</ul>';
		}
	return $string;
}
add_shortcode('ivy_child_pages', 'ivy_list_child_pages');
