<?php get_header(); ?>

<!-- Hero -->
<?php
$hero_classes = array('hero', 'hero-simple', has_post_thumbnail() ? 'hero-thumbnail' : false);
$hero_classes_attr = implode(' ', array_filter($hero_classes));
$hero_styles = array(has_post_thumbnail() ? 'background-image: url(' . get_the_post_thumbnail_url() . ')' : false);
$hero_styles_attr = implode('; ', $hero_styles);
?>
<section id="hero-<?= uniqid(); ?>" class="<?= esc_attr($hero_classes_attr); ?>" style="<?= esc_attr($hero_styles_attr); ?>">
    <div class="container container-sm">
        <div class="breadcrumbs">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
        <h1><?= get_the_title(); ?></h1>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="container container-sm formatted">
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>