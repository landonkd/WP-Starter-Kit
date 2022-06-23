<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ivy-starter-theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>


<body id="top" <?php body_class(); ?>>

<?php include('alert-banner.php'); ?>

<div id="page">
	
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="flex-container">
			<div class="site-branding">
				<div itemscope="itemscope" itemtype="http://schema.org/Organization">
					<a itemprop="url" href="/">
						<span class="site-title ir" itemprop="legalName">Ivy Group</span>
						<img class="logo" itemprop="logo" src="/wp-content/themes/ivy-starter-theme/images/Ivy-logo-horizontal.png" alt="IvyGroup organization logo" class="desktop-logo">
					</a>
				</div>
			</div><!-- .site-branding -->

			<nav id="desktop-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-primary',
				) );
				?>
			</nav><!-- #desktop-menu -->

			<button onclick="toggleMenu()" class="menu-button" aria-label="Navigation Menu">Menu
				<svg viewBox="0 0 20 20" class="svg-icon">
					<path fill="none" d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"></path>
				</svg>
			</button>
		</div><!-- .grid-container -->
		
		<nav id="push-menu">
			<a onclick="toggleMenu()" class="close-button">
				<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
				  <g id="Group_525" data-name="Group 525" transform="translate(-102 -178)">
					<rect id="Rectangle_1191" data-name="Rectangle 1191" width="46.669" height="4.243" rx="2" transform="translate(102 211) rotate(-45)" fill="#2f3034"/>
					<rect id="Rectangle_1192" data-name="Rectangle 1192" width="46.669" height="4.243" rx="2" transform="translate(135 214) rotate(-135)" fill="#2f3034"/>
				  </g>
				</svg>
			</a><!-- .close-button -->
			
			<div class="nav-wrapper">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-primary',
				) );
				?>
			</div>
		</nav>

	</header><!-- #masthead -->