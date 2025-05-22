<?php
/* RENDER
--------------------------------------------------------------- */

// Render Comparison Slider
function render_comparison_slider($selector_prefix)
{
    $image_left = get_field("{$selector_prefix}_image_left");
    $image_right = get_field("{$selector_prefix}_image_right");

    if (empty($image_left['url']) || empty($image_right['url'])) {
        return;
    }
?>
    <div id="comparison-slider-<?= esc_attr(uniqid()); ?>" class="comparison-slider">
        <img class="image-right" src="<?= esc_url($image_right['url']); ?>" alt="<?= esc_attr($image_right['alt']); ?>">

        <div class="mask">
            <img class="image-left" src="<?= esc_url($image_left['url']); ?>" alt="<?= esc_attr($image_left['alt']); ?>">
        </div>

        <input type="range" min="0" step="0.5" max="100" value="50">

        <div class="separator">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                <path d="M 6 2 L 1 8 L 6 14 M 10 2 L 15 8 L 10 14" stroke="white"></path>
            </svg>
        </div>
    </div>
<?php
}

// Render CTA
function render_cta($selector_prefix, $post_id = false, $sub_field = false)
{
    $color = $sub_field ? get_sub_field("{$selector_prefix}_cta_color") : get_field("{$selector_prefix}_cta_color", $post_id);
    $type = $sub_field ? get_sub_field("{$selector_prefix}_cta_type") : get_field("{$selector_prefix}_cta_type", $post_id);

    $text_cta = $sub_field ? get_sub_field("{$selector_prefix}_cta_text") : get_field("{$selector_prefix}_cta_text", $post_id);
    $text_icon = $sub_field ? get_sub_field("{$selector_prefix}_cta_text_icon") : get_field("{$selector_prefix}_cta_text_icon", $post_id);
    $text_icon_direction = $sub_field ? get_sub_field("{$selector_prefix}_cta_text_icon_direction") : get_field("{$selector_prefix}_cta_text_icon_direction", $post_id);
    $image_cta = $sub_field ? get_sub_field("{$selector_prefix}_cta_image") : get_field("{$selector_prefix}_cta_image", $post_id);

    if (!$text_cta && empty($image_cta['image'])) {
        return;
    }

    if ($type === 'text' && !empty($text_cta['title'])) {
        echo sprintf(
            '<a class="btn btn-%1$s btn-icon-%2$s %3$s" href="%4$s" target="%5$s">%6$s</a>',
            esc_attr($color),
            esc_attr($text_icon),
            esc_attr($text_icon_direction),
            esc_url($text_cta['url']),
            esc_attr($text_cta['target']),
            esc_html($text_cta['title'])
        );
    } elseif ($type === 'image' && !empty($image_cta['image'])) {
        echo sprintf(
            '<a class="btn btn-%1$s btn-image" href="%2$s" title="%3$s" aria-label="%3$s" target="%4$s">
                <img src="%5$s" alt="%3$s" />
            </a>',
            esc_attr($color),
            esc_url($image_cta['url']),
            esc_attr($image_cta['title']),
            esc_attr($image_cta['target']),
            esc_url($image_cta['image'])
        );
    }
}
