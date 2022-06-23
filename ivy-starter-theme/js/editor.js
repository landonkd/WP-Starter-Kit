wp.domReady( () => {

	/* Remove Panels
	-------------------------------------------------- */
	//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'post-excerpt' );
	//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'featured-image' );
	//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'post-excerpt' );
	//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'page-attributes' );
	wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'discussion-panel' );
	wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'template' );


	/* Unregister Block Types
	https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
	-------------------------------------------------- */
	wp.blocks.unregisterBlockType( 'core/verse' );
	wp.blocks.unregisterBlockType( 'core/audio' );
	wp.blocks.unregisterBlockType( 'core/preformatted' );
	wp.blocks.unregisterBlockType( 'core/freeform' ); // Allow if enabling blocks retroactively for an old site.
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

	wp.blocks.unregisterBlockType( 'core/navigation' );
	wp.blocks.unregisterBlockType( 'core/post-author' );
	wp.blocks.unregisterBlockType( 'core/post-comments' );
	wp.blocks.unregisterBlockType( 'core/next-post' );
	wp.blocks.unregisterBlockType( 'core/post-navigation-link' );
	wp.blocks.unregisterBlockType( 'core/term-description' );

	wp.blocks.unregisterBlockType( 'core/avatar' );
	wp.blocks.unregisterBlockType( 'core/read-more' );
	wp.blocks.unregisterBlockType( 'core/comments-query-loop' );
	wp.blocks.unregisterBlockType( 'core/post-comments-form' );
	wp.blocks.unregisterBlockType( 'core/post-author-biography' );


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
	wp.blocks.unregisterBlockStyle( 'core/quote', 'plain' );


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
