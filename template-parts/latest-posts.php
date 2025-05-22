<!-- Latest Posts  -->
<?php $latest = get_posts(array(
    'numberposts' => wp_is_mobile() ? 2 : $args['amount'],
    'post_type' => 'post',
    'post__not_in' => is_single() ? array($post->ID) : false
)); ?>

<?php if ($latest) : ?>
    <section id="latest-posts-<?= uniqid(); ?>" class="latest-posts">
        <div class="container">
            <h2><?= $args['title']; ?></h2>
            <div class="posts-grid grid-<?= $args['amount']; ?> posts">
                <?php foreach ($latest as $post) :
                    setup_postdata($post); ?>

                    <?php get_template_part('template-parts/item', 'post'); ?>

                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>