<?php
/* Template Name: Page de contact */
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

<!-- Contact -->
<section id="contact-<?= uniqid(); ?>" class="contact">
    <div class="container">
        <div class="cols-wrapper">
            <div class="col form formatted">
                <?php if (get_field("contact_form_shortcode")) : ?>
                    <h2 class="h3-size"><?= get_field("contact_form_title"); ?></h2>
                    <?php $shortcode_contact = '[contact-form-7 id="' . get_field("contact_form_shortcode") . '"]';
                    echo do_shortcode($shortcode_contact); ?>
                <?php endif; ?>
            </div>
            <div class="col">
                <div class="informations formatted">
                    <?php if (get_field("contact_informations_title")) : ?>
                        <h2 class="h3-size"><?= get_field("contact_informations_title"); ?></h2>
                    <?php endif; ?>
                    <?php if (have_rows('contact_informations_cards')) : ?>
                        <?php while (have_rows('contact_informations_cards')) : the_row();
                            $title = get_sub_field('title');
                            $content = get_sub_field('content'); ?>
                            <div class="card formatted">
                                <?php if ($title) : ?>
                                    <h3 class="h6-size"><?= $title; ?></h3>
                                <?php endif; ?>
                                <?php if ($content) : ?>
                                    <?= $content; ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>