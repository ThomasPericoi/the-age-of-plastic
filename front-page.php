<?php get_header(); ?>

<!-- Home Hero -->
<?php
$hero_classes = array('home-hero', get_field('home_hero_background_shadow') ? 'shadowed' : false);
$hero_classes_attr = implode(' ', array_filter($hero_classes));
$hero_styles = array('background-image: url(' . get_field('home_hero_background') . ')');
$hero_styles_attr = implode('; ', $hero_styles);
?>
<?php if (get_field('home_hero_title')) : ?>
    <section id="home-hero-<?= uniqid(); ?>" class="<?= esc_attr($hero_classes_attr); ?>" style="<?= esc_attr($hero_styles_attr); ?>">
        <div class="container">
            <?php if (get_field('home_hero_title')) : ?>
                <h1 class="hero-title"><?= get_field('home_hero_title'); ?></h1>
            <?php endif; ?>
            <?php if (get_field('home_hero_subtitle')) : ?>
                <h2 class="p-size hero-subtitle"><?= esc_html(get_field('home_hero_subtitle')); ?></h2>
            <?php endif; ?>
            <?php if (get_field('home_hero_primary_cta_text') || get_field('home_hero_primary_cta_image') || get_field('home_hero_secondary_cta_text') || get_field('home_hero_secondary_cta_image')) : ?>
                <div class="btn-wrapper">
                    <?php render_cta('home_hero_primary'); ?>
                    <?php render_cta('home_hero_secondary'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Home Surgeons -->
<?php if (get_field('home_surgeons_portrait_1_image') && get_field('home_surgeons_portrait_2_image')) : ?>
    <section id="home-surgeons-<?= uniqid(); ?>" class="home-surgeons">
        <div class="cols-wrapper reverse">
            <div class="col">
                <div class="container formatted">
                    <?php if (get_field('home_surgeons_presentation_title')) : ?>
                        <h2 class="h3-size"><?= get_field('home_surgeons_presentation_title'); ?></h2>
                    <?php endif; ?>
                    <?php if (get_field('home_surgeons_presentation_content')) : ?>
                        <?= wp_kses_post(get_field('home_surgeons_presentation_content')); ?>
                    <?php endif; ?>
                    <?php if (get_field('home_surgeons_presentation_primary_cta_text') || get_field('home_surgeons_presentation_primary_cta_image')) : ?>
                        <div class="btn-wrapper">
                            <?php render_cta('home_surgeons_presentation_primary'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <?php if (get_field('home_surgeons_portrait_1_image')) : ?>
                    <div class="portrait" style="<?= 'background-image: url(' . get_field('home_surgeons_portrait_1_image') . ')'; ?>">
                        <?php if (get_field('home_surgeons_portrait_1_primary_cta_text') || get_field('home_surgeons_portrait_1_primary_cta_image')) : ?>
                            <div class="btn-wrapper">
                                <?php render_cta('home_surgeons_portrait_1_primary'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (get_field('home_surgeons_portrait_2_image')) : ?>
                    <div class="portrait" style="<?= 'background-image: url(' . get_field('home_surgeons_portrait_2_image') . ')'; ?>">
                        <?php if (get_field('home_surgeons_portrait_2_primary_cta_text') || get_field('home_surgeons_portrait_2_primary_cta_image')) : ?>
                            <div class="btn-wrapper">
                                <?php render_cta('home_surgeons_portrait_2_primary'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Home Domains -->
<?php if (have_rows('home_domains_domains')): ?>
    <section id="home-domains-<?= uniqid(); ?>" class="home-domains">
        <div class="domains-grid">
            <?php while (have_rows('home_domains_domains')) : the_row(); ?>
                <div class="domain element" style="<?= 'background-image: url(' . get_sub_field('background') . ')'; ?>">
                    <div class="btn-wrapper">
                        <?php render_cta('button', false, true); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Home Before / After -->
<?php if (get_field('home_before_after_title')) : ?>
    <section id="home-before-after-<?= uniqid(); ?>" class="home-before-after">
        <div class="cols-wrapper reverse">
            <div class="col">
                <div class="container formatted">
                    <?php if (get_field('home_before_after_title')) : ?>
                        <h2 class="h3-size"><?= get_field('home_before_after_title'); ?></h2>
                    <?php endif; ?>
                    <?php if (get_field('home_before_after_content')) : ?>
                        <?= wp_kses_post(get_field('home_before_after_content')); ?>
                    <?php endif; ?>
                    <?php if (get_field('home_before_after_primary_cta_text') || get_field('home_before_after_primary_cta_image')) : ?>
                        <div class="btn-wrapper">
                            <?php render_cta('home_before_after_primary'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <?php render_comparison_slider('home_before_after'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Home RDV -->
<?php
$rdv_classes = array('home-rdv', get_field('home_rdv_background_shadow') ? 'shadowed' : false);
$rdv_classes_attr = implode(' ', array_filter($rdv_classes));
$rdv_styles = array('background-image: url(' . get_field('home_rdv_background') . ')');
$rdv_styles_attr = implode('; ', $rdv_styles);
?>
<?php if (get_field('home_rdv_title')) : ?>
    <section id="home-rdv-<?= uniqid(); ?>" class="<?= esc_attr($rdv_classes_attr); ?>" style="<?= esc_attr($rdv_styles_attr); ?>">
        <div class="container">
            <?php if (get_field('home_rdv_title')) : ?>
                <h2 class="h3-size"><?= get_field('home_rdv_title'); ?></h2>
            <?php endif; ?>
            <?php if (get_field('home_rdv_primary_cta_text') || get_field('home_rdv_primary_cta_image') || get_field('home_rdv_secondary_cta_text') || get_field('home_rdv_secondary_cta_image')) : ?>
                <div class="btn-wrapper">
                    <?php render_cta('home_rdv_primary'); ?>
                    <?php render_cta('home_rdv_secondary'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Home PR -->
<?php if (have_rows('home_pr_items')): ?>
    <section id="home-pr-<?= uniqid(); ?>" class="home-pr">
        <div class="container">
            <?php if (get_field('home_pr_title')) : ?>
                <h2 class="h3-size"><?= get_field('home_pr_title'); ?></h2>
            <?php endif; ?>
        </div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php while (have_rows('home_pr_items')) : the_row();
                    $logo = get_sub_field('logo');
                    $url = get_sub_field('url'); ?>
                    <a href="<?= $url; ?>" class="swiper-slide element">
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>