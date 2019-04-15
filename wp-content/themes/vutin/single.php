<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <?php get_sidebar('news'); ?>
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <?php if(have_posts()) : ?>
                    <?php while (have_posts()) :  the_post(); ?>
                        <div class="blog-details-wrapper">
                            <div class="postinfo-wrapper">
                                <div class="post-info">
                                    <h1 class="titlepage"><?php the_title(); ?></h1>

                                    <div class="product-social-sharing">
                                        <label>Share</label>
                                        <ul>
                                            <li><a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink() ?>')" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a onclick="window.open('https://twitter.com/home?status=<?php echo get_the_permalink() ?>')" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a onclick="window.open('https://pinterest.com/pin/create/button/?url=<?php echo get_the_permalink() ?>&description=<?php the_title() ?>&media=<?php the_post_thumbnail_url() ?>')" href="#"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="vutin-wysiwyg"><?php the_content(); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php get_footer(); ?>
