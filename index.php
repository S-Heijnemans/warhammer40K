
<?php get_header(); ?>

<main class="content-area">

    <section class="hero">
        <p class="hero-subtitle">
            IN THE GRIM DARKNESS OF THE FAR FUTURE
        </p>

        <h1>Warhammer 40,000</h1>

    </section>

    <section class="gallery-section">

        <h2>Gallery of the Imperium</h2>

        <div class="image-grid">

            <?php
            $images = warhammer_get_gallery_images(4);

            $gallery_pages = array(
                array(
                    'url'   => 'http://my-wp-site.local/the-imperuim/',
                    'title' => 'The Imperium',
                ),
                array(
                    'url'   => 'http://my-wp-site.local/space-marines/',
                    'title' => 'Space Marines',
                ),
                array(
                    'url'   => 'http://my-wp-site.local/age-of-darkness/',
                    'title' => 'Age Of Darkness',
                ),
                array(
                    'url'   => 'http://my-wp-site.local/the-long-war/',
                    'title' => 'The Long War',
                ),
            );

            if ($images) :

                foreach ($images as $index => $image) :

                    if (!isset($gallery_pages[$index])) {
                        break;
                    }

                    $page_url = $gallery_pages[$index]['url'];
                    $page_title = $gallery_pages[$index]['title'];

                    $image_title = get_the_title($image->ID);

                    $image_alt = get_post_meta(
                        $image->ID,
                        '_wp_attachment_image_alt',
                        true
                    );

                    $image_html = wp_get_attachment_image(
                        $image->ID,
                        'large',
                        false,
                        array(
                            'class' => 'gallery-image',
                            'alt'   => $image_alt
                                ? $image_alt
                                : $page_title,
                        )
                    );

                    if (!$image_html) {
                        continue;
                    }
            ?>

                <article class="gallery-card">

                    <a href="<?php echo esc_url($page_url); ?>">

                        <?php echo $image_html; ?>

                        <div class="gallery-card-content">

                            <h3>
                                <?php echo esc_html($page_title); ?>
                            </h3>

                            <span>Discover more &raquo;</span>

                        </div>

                    </a>

                </article>

            <?php
                endforeach;

            else :
            ?>

                <p>No images are found.</p>

            <?php endif; ?>

        </div>

    </section>

    
    <section class="latest-posts">

        <h2>Latest transmissions</h2>

        <?php
        $categories = get_categories(array(
            'hide_empty' => true,
        ));

        $selected_categories = isset($_GET['categories'])
            ? array_map('absint', (array) $_GET['categories'])
            : array();
        ?>

        <form method="GET" class="category-filter">

            <h3>Filter by category</h3>

            <?php foreach ($categories as $category) : ?>

                <label>
                    <input
                        type="checkbox"
                        name="categories[]"
                        value="<?php echo esc_attr($category->term_id); ?>"
                        <?php checked(
                            in_array($category->term_id, $selected_categories)
                        ); ?>
                    >

                    <?php echo esc_html($category->name); ?>

                </label>

            <?php endforeach; ?>

            <div class="filter-button">

                <button type="submit">
                    Filter posts
                </button>

            </div>

        </form>

        <?php

        $query_args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        );

        if (!empty($selected_categories)) {
            $query_args['category__in'] = $selected_categories;
        }

        $latest_posts = new WP_Query($query_args);

        if ($latest_posts->have_posts()) :

            while ($latest_posts->have_posts()) :
                $latest_posts->the_post();
        ?>

            <article class="post-card">

                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>

                <?php the_excerpt(); ?>

            </article>

        <?php
            endwhile;

            wp_reset_postdata();

        else :
        ?>

            <p>No messages found in this category.</p>

        <?php endif; ?>

    </section>


</main>

<?php get_footer(); ?>
