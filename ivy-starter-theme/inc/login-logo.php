<?php

/**
 * Custom WP Login Logo
 */
function theme_login_logo() { ?>
    <style type="text/css">
        body.login {
            background: #eeeeee;
        }
        #loginform {
            border-radius: 3px;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-full.png);
			height: 120px;
			width: 320px;
			background-repeat: no-repeat;
			background-size: contain;
			margin-bottom: 32px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'theme_login_logo' );
function theme_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'theme_login_logo_url' );
function theme_login_logo_url_title() {
    return 'Organization Name';
}
add_filter( 'login_headertitle', 'theme_login_logo_url_title' );