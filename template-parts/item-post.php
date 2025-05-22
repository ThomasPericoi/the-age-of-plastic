<a href="<?= get_the_permalink(); ?>" class="element post <?= get_the_category()[0]->slug ?: false; ?>">
    <?php if (has_post_thumbnail()) : ?>
        <div class="thumbnail" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');">
        </div>
    <?php endif; ?>
    <div class="content">
        <h3 class="h4-size title" <?= (get_field('post_lang') == 'en') ? 'lang="en"' : false; ?>><?php get_field('icon',  get_the_category()[0]) ? get_template_part('assets/medias/icons/' . get_field('icon',  get_the_category()[0]) . '.svg') : false; ?> <?= get_the_title(); ?></h3>
        <div class="metas">
            <?php
            $tags = get_the_tags();
            if (!empty($tags)) :
                foreach ($tags as $tag) :
                    $tags_name[] = esc_html($tag->name);
                endforeach;
            endif; ?>
            <?= implode(' | ', array_filter(array(__('Par le Dr. Goubier', 'the-age-of-plastic'), get_the_category()[0]->cat_name, $tags ? implode(', ', $tags_name) : false))); ?>
        </div>
        <?php if (has_excerpt()) : ?>
            <p><?= get_the_excerpt(); ?></p>
        <?php endif; ?>
        <span class="btn btn-icon-arrow-right"><?= __('Lire la suite', 'the-age-of-plastic'); ?></span>
    </div>
</a>