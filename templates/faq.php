<?php
/* Template Name: F.A.Q. */
get_header(); ?>

<!-- Hero -->
<section id="hero-<?= uniqid(); ?>" class="hero hero-simple">
    <div class="container">
        <div class="breadcrumbs">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
        <h1><?= get_the_title(); ?></h1>
    </div>
</section>

<!-- F.A.Q. -->
<section id="faq-<?= uniqid(); ?>" class="faq">
    <div class="container">
        <?php if (have_rows('faq_faq')) : ?>
            <ul class="faq-list">
                <?php while (have_rows('faq_faq')) : the_row();
                    $title = get_sub_field('title');
                    $content = get_sub_field('content'); ?>
                    <details class="faq">
                        <summary>
                            <h2 class="h4-size"><?= $title; ?></h2>
                        </summary>
                        <?php if ($content) : ?>
                            <div class="content formatted">
                                <?= $content; ?>
                            </div>
                        <?php endif; ?>
                    </details>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>