<?php
/* ACF
--------------------------------------------------------------- */

// Add ACF versioning
if (class_exists('ACF')) {
    function save_acf_groups_json($path)
    {
        $path = get_stylesheet_directory() . '/inc/acf-json';
        return $path;
    }
    add_filter('acf/settings/save_json', 'save_acf_groups_json');

    $field_groups = acf_get_local_field_groups();
    foreach ($field_groups as $field_group) {
        $key = $field_group['key'];
        if (acf_have_local_fields($key)) {
            $field_group['fields'] = acf_get_fields($key);
        }
        acf_write_json_field_group($field_group);
    }
}

// Remove conflicts between footnotes and ACF
add_action('init', function () {
    remove_action('init', 'register_block_core_footnotes');
}, 1);
remove_filter('sanitize_post_meta_footnotes', '_wp_filter_post_meta_footnotes');
