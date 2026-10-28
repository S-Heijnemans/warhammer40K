
<?php get_header(); ?>

<main class="content-area">

    <?php while (have_posts()) : the_post(); ?>

        <article>

            <h1><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>

            <?php the_content(); ?>

        </article>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
