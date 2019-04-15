<?php 

/**
* Template Name: Page plugin
*/

get_header(); ?>

<div class="hg-90"></div>
<?php if(have_posts()) : ?>
    <?php while (have_posts()) :  the_post(); ?>
        <div class="container-custom">
            <div class="row">
                <div class="col-md-12 postinfo-wrapper">
                    <div class="vutin-wysiwyg"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    <?php endwhile;
    endif; ?>
<?php get_footer(); ?>
