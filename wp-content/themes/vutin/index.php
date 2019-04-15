<?php get_header() ?>



<section class="news">
    <div class="container-custom">
        <div class="title">
            <h2 ><?php echo get_theme_mod('title_new') ?></h2>
        </div>
        <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 line">
                <div class="image">
                    <img src="<?php echo get_theme_mod('image_1') ?>" alt="">
                </div>
                <div class="video-yb">
                    <iframe width="100%" height="218"
                    src="https://www.youtube.com/embed/<?php echo get_theme_mod('id_yb_1') ?>">
                    </iframe>
                </div>
                <div class="link">
                    <a href="<?php echo get_theme_mod('link_1') ?>">
                        <img src="<?php echo get_theme_mod('text_link_1') ?>" alt="">
                    </a>
                </div>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 line">
                <div class="image">
                    <img src="<?php echo get_theme_mod('image_2') ?>" alt="">
                </div>
                <div class="video-yb">
                   <iframe width="100%" height="218"
                    src="https://www.youtube.com/embed/<?php echo get_theme_mod('id_yb_2') ?>">
                    </iframe>
                </div>
                <div class="link">
                    <a href="<?php echo get_theme_mod('link_2') ?>">
                        <img src="<?php echo get_theme_mod('text_link_2') ?>" alt="">
                    </a>
                </div>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 line">
                <div class="image">
                    <img src="<?php echo get_theme_mod('image_3') ?>" alt="">
                </div>
                <div class="video-yb">
                    <iframe width="100%" height="218"
                    src="https://www.youtube.com/embed/<?php echo get_theme_mod('id_yb_3') ?>">
                    </iframe>
                </div>
                <div class="link">
                    <a href="<?php echo get_theme_mod('link_3') ?>">
                        <img src="<?php echo get_theme_mod('text_link_3') ?>" alt="">
                    </a>
                </div>
            </div>
       </div>
    </div>
</section>

<section class="products">
    <div class="container-custom">
        <div class="title">
            <h2><?php echo get_theme_mod('title_category') ?></h2>
        </div>
        <div class="row">
            <?php $array_id_category = explode(",", get_theme_mod('id_chuyen_muc'));
            foreach ($array_id_category as $id) { ?>
                <div class="col-lg-6 col-md-2 col-xs-12">
                    <a href="<?php echo get_term_link((int)$id) ; ?>">
                        <img src="<?php echo get_field('hinh-nen', 'category_' . $id) ?>" alt="">
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="all_category">
            <a href="<?php echo get_theme_mod('text_link') ?>">
                <?php echo get_theme_mod('text_link_all') ?>
            </a>
        </div>   

    </div>
</section>

<section class="custom-news">
    <div class="container-custom">
        <div class="title">
            <h2><?php echo get_theme_mod('title_news') ?></h2>
        </div>
        <div class="row">
            <?php 
                $id_news = get_theme_mod('id_tin_tuc'); 
                $args = array(
                  'cat' => $id_news,
                  'post_type' => 'post',
                  'posts_per_page' => 5,
                  'orderby'   => 'id',
                  'order'     => 'DESC',

                );
                $query = new WP_Query( $args );
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post(); ?>
                            <div class="col-lg-12 col-md-12 col-xs-12 item">
                                <ul class="gr-news">
                                    <li>
                                        <a href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a>
                                        <p><?php echo get_the_date('Y/m/d'); ?></p>
                                    </li>
                                </ul>
                            </div>
                <?php   }
                        wp_reset_postdata();
                        wp_reset_query();
                } ?>
        </div>
    </div>
</section>

<section class="products">
    <div class="container-custom">
        <div class="title">
            <h2><?php echo get_theme_mod('title_products') ?></h2>
        </div>
        <div class="row">
            <?php 
                $id_products = get_theme_mod('id_products'); 
                $args = array(
                  'cat' => $id_products,
                  'post_type' => 'post',
                  'posts_per_page' => 5,
                  'orderby'   => 'id',
                  'order'     => 'DESC',

                );
                $query = new WP_Query( $args );
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post(); ?>
                            <div class="col-lg-3 col-md-4 col-xs-1 item">
                                <div class="img">
                                    <?php echo get_the_post_thumbnail() ?>
                                </div>
                                <a href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a>
                            </div>
                <?php   }
                        wp_reset_postdata();
                        wp_reset_query();
                } ?>
        </div>
        <div class="all-product">
            <div class="custom-col">
                <a href="<?php echo get_theme_mod('link_all_products') ?>">
                    <?php echo get_theme_mod('text_link_all_products') ?>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="slogan">
    <div class="container-custom">
        <div class="title">
            <h2><?php echo get_theme_mod('title_slogan') ?></h2>
            <div class="image_slogan">
                <a href="<?php echo get_theme_mod('link_slogan') ?>">
                    <img src="<?php echo get_theme_mod('image_slogan') ?>" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="request">
    <div class="container-custom">
        <div class="title">
            <h2><?php echo get_theme_mod('title_yc') ?></h2>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xl-4">
                    <div class="item">
                        <a href="<?php echo get_theme_mod('link_yc1') ?>">
                            <?php echo get_theme_mod('title_yc1') ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xl-4">
                    <div class="item">
                        <a href="<?php echo get_theme_mod('link_yc2') ?>">
                            <?php echo get_theme_mod('title_yc2') ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xl-4">
                    <div class="item">
                        <a href="<?php echo get_theme_mod('link_yc3') ?>">
                            <?php echo get_theme_mod('title_yc3') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>