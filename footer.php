</main>

<!-- Footer -->
<footer id="footer">
    <!-- Pre Footer -->
    <?php
    $prefooter_classes = array(get_field('prefooter_background_shadow', 'options') ? 'shadowed' : false);
    $prefooter_classes_attr = implode(' ', array_filter($prefooter_classes));
    $prefooter_styles = array('background-image: url(' . get_field('prefooter_background', 'options') . ')');
    $prefooter_styles_attr = implode('; ', $prefooter_styles);
    ?>
    <div id="pre-footer" class="<?= esc_attr($prefooter_classes_attr); ?>" style="<?= esc_attr($prefooter_styles_attr); ?>">
        <div class="container">
            <?php if (get_field('prefooter_introduction', 'options')) : ?>
                <h2 class="h3-size title"><?= get_field('prefooter_introduction', 'options'); ?></h2>
            <?php endif; ?>
            <?php if (get_field('prefooter_primary_cta_text', 'options') || get_field('prefooter_primary_cta_image', 'options')) : ?>
                <?php render_cta('prefooter_primary', 'options'); ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- Main Footer -->
    <?php $locations = get_nav_menu_locations(); ?>
    <div id="main-footer">
        <div class="container">
            <div class="cols-wrapper">
                <div class="col">
                    <?php if (get_field('footer_title_1', 'options')) : ?>
                        <h2 class="h3-size title"><?= get_field('footer_title_1', 'options'); ?></h2>
                    <?php endif; ?>
                    <?php if ($description = get_field('footer_description', 'options')) : ?>
                        <div class="description formatted">
                            <?= wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (have_rows('footer_contacts', 'options')): ?>
                        <ul class="addresses">
                            <?php while (have_rows('footer_contacts', 'options')): the_row(); ?>
                                <?php switch (get_sub_field('type')):
                                    case 'address': ?>
                                        <li class="address"><span><?php get_template_part('assets/medias/icons/map-marker.svg'); ?><?= esc_html(get_sub_field('text')); ?></span></li>
                                    <?php break;
                                    case 'mail': ?>
                                        <li class="address"><a href="mailto:<?= esc_html(get_sub_field('text')); ?>"><?php get_template_part('assets/medias/icons/envelop.svg'); ?><?= esc_html(get_sub_field('text')); ?></a></li>
                                    <?php break;
                                    case 'phone': ?>
                                        <li class="address"><a href="tel:<?= esc_html(get_sub_field('text')); ?>"><?php get_template_part('assets/medias/icons/phone.svg'); ?><?= esc_html(get_sub_field('text')); ?></a></li>
                                <?php break;
                                endswitch; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="col">
                    <?php if (get_field('footer_title_2', 'options')) : ?>
                        <h2 class="h3-size title"><?= get_field('footer_title_2', 'options'); ?></h2>
                    <?php endif; ?>
                    <?php if (get_field('footer_primary_cta_text', 'options') || get_field('footer_primary_cta_image', 'options')) : ?>
                        <div class="btn-wrapper">
                            <?php if (get_field('footer_primary_cta_text', 'options')) : ?>
                                <?php render_cta('footer_primary', 'options'); ?>
                            <?php endif; ?>
                            <?php if (get_field('footer_secondary_cta_text', 'options')) : ?>
                                <?php render_cta('footer_secondary', 'options'); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Sub Footer -->
    <div id="sub-footer">
        <div class="container container-lg">
            <?php if (has_nav_menu('footer-submenu')) : ?>
                <div class="menu menu-footer">
                    <span>
                        <?php
                        printf(
                            __('%1$s | %2$s %3$d | %4$s', 'the-age-of-plastic'),
                            __('Copyrights', 'the-age-of-plastic'),
                            get_bloginfo('name'),
                            date('Y'),
                            __('Tous droits réservés', 'the-age-of-plastic')
                        );
                        ?>
                    </span>
                    <?php wp_nav_menu(array('theme_location' => 'footer-submenu', 'container' => false, 'depth' => 1)); ?>
                </div>
            <?php endif; ?>
            <?php if (get_field('footer_open_dyslexic', 'options')) : ?>
                <!-- OpenDyslexic Toggle -->
                <div class="dyslexic-toggle">
                    <input type="checkbox" id="open-dyslexic" name="open-dyslexic" class="screen-reader-only" />
                    <label for="open-dyslexic"><?= get_field('footer_open_dyslexic_label', 'options') ?: __('Activer OpenDyslexic', 'the-age-of-plastic'); ?></label>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>