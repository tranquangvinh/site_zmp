<?php get_header(); ?>

<div class="hg-90"></div>
<?php if(have_posts()) : ?>
    <?php while (have_posts()) :  the_post(); ?>
        <section>
            <div class="banner" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) 50% 0 repeat fixed;">
                <h1 class="titlepage"><?php the_title(); ?></h1>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 postinfo-wrapper">
                    <div class="vutin-wysiwyg"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
