wp.domReady( () => {

	/* Unregister Block Types
	-------------------------------------------------- */
	wp.blocks.unregisterBlockType( 'core/verse' );
	wp.blocks.unregisterBlockType( 'core/audio' );
	wp.blocks.unregisterBlockType( 'core/preformatted' );
	wp.blocks.unregisterBlockType( 'core/freeform' ); // Allow 'freeform' if enabling blocks retroactively for an old site.
	wp.blocks.unregisterBlockType( 'core/more' );
	wp.blocks.unregisterBlockType( 'core/nextpage' );
	wp.blocks.unregisterBlockType( 'core/archives' );
	wp.blocks.unregisterBlockType( 'core/categories' );
	wp.blocks.unregisterBlockType( 'core/latest-comments' );
	wp.blocks.unregisterBlockType( 'core/calendar' );
	wp.blocks.unregisterBlockType( 'core/search' );
	wp.blocks.unregisterBlockType( 'core/tag-cloud' );
	wp.blocks.unregisterBlockType( 'core/rss' );
	//wp.blocks.unregisterBlockType( 'core/code' );
	wp.blocks.unregisterBlockType( 'core/social-links' );

	// New from WP 5.8
	// DESIGN
	wp.blocks.unregisterBlockType( 'core/site-logo' );
	wp.blocks.unregisterBlockType( 'core/site-tagline' );
	wp.blocks.unregisterBlockType( 'core/site-title' );
	wp.blocks.unregisterBlockType( 'core/query-title' ); // true name of 'archive-title'
	wp.blocks.unregisterBlockType( 'core/post-categories' );
	wp.blocks.unregisterBlockType( 'core/post-tags' );
	wp.blocks.unregisterBlockType( 'core/post-terms' ); // true name of 'post-categories' and 'post-tags'
	// WIDGETS
	wp.blocks.unregisterBlockType( 'core/page-list' );
	//wp.blocks.unregisterBlockType( 'core/latest-posts' );
	// THEME
	wp.blocks.unregisterBlockType( 'core/query' );
	wp.blocks.unregisterBlockType( 'core/post-title' );
	wp.blocks.unregisterBlockType( 'core/post-content' );
	wp.blocks.unregisterBlockType( 'core/post-date' );
	wp.blocks.unregisterBlockType( 'core/post-excerpt' );
	wp.blocks.unregisterBlockType( 'core/post-featured-image' );
	wp.blocks.unregisterBlockType( 'core/loginout' );
	wp.blocks.unregisterBlockType( 'core/posts-list' );


	/* Unregister Block Styles
	-------------------------------------------------- */

	// Paragraph
	wp.blocks.unregisterBlockStyle( 'core/paragraph', 'pretitle' );

	// Buttons
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

	// Separator
	wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );

	// Quote
	wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );



	/* Register Block Styles
	-------------------------------------------------- */

	// Button
	wp.blocks.registerBlockStyle(
		'core/button',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			},
			{
				name: 'outline',
				label: 'Outline',
				isDefault: false,
			},
			{
				name: 'no-background',
				label: 'No Background',
				isDefault: false,
			},
			{
				name: 'full',
				label: 'Full Width',
				isDefault: false,
			}
		]
	);

	// Paragraph
	wp.blocks.registerBlockStyle(
		'core/paragraph',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			},
			{
				name: 'pre-heading',
				label: 'Pre-Heading',
				isDefault: false,
			},
			{
				name: 'max-width',
				label: 'Max-Width',
				isDefault: false,
			}
		]
	);

	// Separator
	wp.blocks.registerBlockStyle(
		'core/separator',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			}
		]
	);

	// Columns
	wp.blocks.registerBlockStyle(
		'core/columns',
		[
			{
				name: 'equal-height',
				label: 'Equal Height',
				isDefault: false,
			}
		]
	);

	// Cover
	wp.blocks.registerBlockStyle(
		'core/cover',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			},
			{
				name: 'wide-inner-container',
				label: 'Wide Inner Container',
				isDefault: false,
			}
		]
	);

	// Group
	wp.blocks.registerBlockStyle(
		'core/group',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			},
			{
				name: 'wide-inner-container',
				label: 'Wide Inner Container',
				isDefault: false,
			}
		]
	);

	// List
	wp.blocks.registerBlockStyle(
		'core/list',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			},
			{
				name: 'check-mark',
				label: 'Check Mark',
				isDefault: false,
			}
		]
	);


} );
