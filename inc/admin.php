<?php
/* ADMIN
--------------------------------------------------------------- */

// Add menus
function register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('En-tête', 'the-age-of-plastic'),
            'footer-submenu' => __('Pied de page inférieur', 'the-age-of-plastic'),
        )
    );
}
add_action('init', 'register_menus');

// Add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Options du thème', 'the-age-of-plastic'),
        'menu_title'    => __('Options du thème', 'the-age-of-plastic'),
        'menu_slug'     => 'options',
        'capability'    => 'edit_pages',
        'redirect'      => true,
        'position'      => 2,
        'update_button' => __('Mettre à jour', 'the-age-of-plastic'),
        'updated_message' => __('Tout est bon', 'the-age-of-plastic'),
        'icon_url'      => 'dashicons-admin-settings'
    ));
}

// Add and delete roles
function manage_user_roles()
{
    remove_role('subscriber');
    // remove_role('editor');
    remove_role('contributor');
    remove_role('author');
}
add_action('init', 'manage_user_roles');
