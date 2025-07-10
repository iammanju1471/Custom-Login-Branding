<?php
/**
 * Plugin Name: Custom Login Branding
 * Description: Customize the WordPress login page with your own logo and styles.
 * Version: 1.0
 * Author: Manjunath
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue custom CSS for login page
 */
function clb_custom_login_styles() {
    $logo_url = plugin_dir_url( __FILE__ ) . 'assets/logo.png';
    ?>
    <style type="text/css">
        body.login {
            background-color: #f0f4f8;
        }

        body.login div#login h1 a {
            background-image: url(<?php echo esc_url( $logo_url ); ?>);
            padding-bottom: 30px;
            background-size: contain;
            width: 100%;
            height: 80px;
        }

        .login form {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'clb_custom_login_styles' );

/**
 * Change login logo URL
 */
function clb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'clb_login_logo_url' );

/**
 * Change login logo title
 */
function clb_login_logo_title() {
    return 'Welcome to Your Custom Portal';
}
add_filter( 'login_headertext', 'clb_login_logo_title' );
