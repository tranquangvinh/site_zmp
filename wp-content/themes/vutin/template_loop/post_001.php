<div class="<?php echo isset($args['wrap-class']) ? $args['wrap-class'] : '' ?>">
    <!-- single-latest-blog start -->
    <div class="single-latest-blog mt--30">
        <div class="latest-blog-image">
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="wrapImage frame43">
                <?php the_post_thumbnail(); ?>
            </a>
        </div>
        <div class="latest-blog-content">
            <h4><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo niceWordsByChars(get_the_title(), 40) ?></a></h4>
            <div class="post_meta">
                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span><?php echo get_the_date() ?></span>
                <span class="meta_author"><span></span><?php echo get_the_author() ?></span>
            </div>
            <p><?php echo niceWordsByChars(get_the_excerpt(), 100) ; ?></p>
        </div>
    </div>
    <!-- single-latest-blog end -->
</div>