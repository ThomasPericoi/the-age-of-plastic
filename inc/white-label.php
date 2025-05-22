<?php 
/* WHITE LABEL
--------------------------------------------------------------- */

// Change login logo
function change_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?= get_bloginfo('stylesheet_directory'); ?>/assets/medias/images/favicon.png);
            height: 150px;
            width: 150px;
            background-size: 150px 150px;
            background-repeat: no-repeat;
            padding-bottom: 15px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'change_login_logo');

// Change admin bar logo
function change_admin_bar_logo()
{
    echo '
    <style type="text/css">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
            background-image: url(' . get_bloginfo('stylesheet_directory') . '/assets/medias/images/favicon.png) !important;
            background-position: 0 0;
            background-size: cover;
            color:rgba(0, 0, 0, 0);
        }
        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
            background-position: 0 0;
        }
    </style>
    ';
}
add_action('wp_before_admin_bar_render', 'change_admin_bar_logo');

// Change admin footer text
function change_admin_footer_text()
{
    echo __('Propulsé par <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Thème réalisé par <a href="https://www.thomaspericoi.com/" target="_blank">Thomas Pericoi</a>', 'the-age-of-plastic');
}
add_filter('admin_footer_text', 'change_admin_footer_text');

// Add admin widgets
function custom_dashboard_help()
{
    echo __('Ce thème est réalisé par <a href="https://www.thomaspericoi.com/" target="_blank">Thomas Pericoi</a>.</p>', 'the-age-of-plastic');
}

function add_admin_widgets()
{
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', __('Crédits', 'the-age-of-plastic'), 'custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'add_admin_widgets');