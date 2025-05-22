<?php get_header(); ?>

<!-- Hero -->
<?php
if (is_category()) :
    $title = single_cat_title('', false);
    $description = category_description();
elseif (is_tag()) :
    $title = single_tag_title(__('Tag : ', 'the-age-of-plastic'), false);
    $description = tag_description();
else :
    $title = get_field("index_hero_title", get_option('page_for_posts')) ?: get_the_title(get_option('page_for_posts'));
    $description = get_field("index_hero_description", get_option('page_for_posts')) ?: false;
endif;
?>
<section id="hero-<?= uniqid(); ?>" class="hero hero-simple">
    <div class="container formatted">
        <?php if (is_category()) : ?>
            <div class="category">
                <?php get_template_part('assets/medias/icons/' . get_field('icon',  get_the_category()[0]) . '.svg'); ?>
            </div>
        <?php endif; ?>
        <div class="breadcrumbs">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
        <h1><?= $title; ?></h1>
        <?php if ($description) : ?>
            <p class="description formatted">
                <?= $description; ?>
            </p>
        <?php endif; ?>
        <?php
        $categories = get_categories();
        $categories_html = '';
        if (!empty($categories)) :
            foreach ($categories as $category) :
                if (!is_category($category->term_id)) :
                    $categories_html .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="btn btn-icon-' . esc_attr(get_field('icon', $category)) . '">' . esc_html($category->name) . '</a>';
                endif;
            endforeach;
        endif;
        if (!empty($categories_html)) : ?>
            <div class="btn-wrapper">
                <?= __('Catégories :', 'the-age-of-plastic') . $categories_html; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Loop -->
<section id="index-loop-<?= uniqid(); ?>" class="index-loop">
    <div class="container">

        <div class="posts-wrapper">
            <?php if (have_posts()) : ?>
                <div class="posts-grid grid-2 posts">
                    <?php
                    while (have_posts()) : the_post(); ?>

                        <?php get_template_part('template-parts/item', 'post'); ?>

                    <?php endwhile; ?>
                </div>
            <?php else : echo __('Aucun article n\'a été (encore) publié ici.', 'the-age-of-plastic');
            endif; ?>
            <?php the_posts_pagination(array(
                'prev_text' => __('<span class="icon icon-left"></span>', 'the-age-of-plastic'),
                'next_text' => __('<span class="icon icon-right"></span>', 'the-age-of-plastic'),
            )); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>