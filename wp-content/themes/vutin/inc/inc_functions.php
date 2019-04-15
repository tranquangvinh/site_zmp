<?php

function get_term_option($taxonomy)
{
    $output = array();

    $terms = get_terms(array(
        "taxonomy" => $taxonomy
    ));

    foreach ($terms as $term){
        $output[$term->term_id] = $term->name;
    }

    return $output;
}



function getThumbnailHomePage(&$index)
{
    $html = "
        <li><a><span class='counter'>{$index}</span></a>
    ";
    $index ++;


    return $html;
}

function catchuoi($chuoi , $chieudai){
    $chuoi = strip_tags($chuoi);
    $chieudai = $chieudai*1;
    $chuoira = "";
    $mangvao = explode(" ", $chuoi);
    if (count($mangvao) > 0) {
        for($i = 0 ; $i < ($chieudai+1) ; $i++){
            if (!isset($mangvao[$i])) {
                continue;
            }
            $chuoira = $chuoira.$mangvao[$i]." ";
        }    
    }
    
    return($chuoira."...");
}

function getPostsByTag($term)
{

    $args = array(
        'posts_per_page' => 3,
        'post_type' => 'post',
        'post_status' => 'publish',
        'tag_id' => $term->term_id
    );
    $posts = new WP_Query($args);

    if ($posts->have_posts()) {
        echo "<div class='row'>";
        while ($posts->have_posts()) {
            $posts->the_post(); ?>
            
            <div class="col-xs-12 col-ms-6 col-md-4">
                <div class="postTag">
                    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                        <div class="wrapImage">
                            <?php the_post_thumbnail() ?>
                        </div>

                        <div class="titlePost">
                            <?php the_title() ?>
                        </div>

                        <div class="descPost">
                            <?php echo catchuoi(get_the_excerpt(), 50) ?>
                        </div>
                    </a>
                </div>
            </div>
    
        <?php }
        echo '</div>';
    }
    
}






function getRelatedPost($params)
{
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID())
    );

    if (isset($params['limit']) && $params['limit'] > 0) {
        $args['posts_per_page'] = $params['limit'];
    }

    return new WP_Query($args);
}


function getImageByFolder($slug, $size = 'thumbnail')
{
    $output = array();
    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'tax_query' => array(
            array(
                'taxonomy' => 'media_category',
                'field' => 'slug',
                'include_children'=> false,
                'terms' => $slug
            )
        ),
        "order" => "ASC",
        "orderby" => "title"
    );
    $the_query = new WP_Query($args);

    $attachment = $the_query->get_posts();
    if ($attachment) {
        foreach ($attachment as $item) {
            $fullImage = $item->guid;
            $fullImage = explode('/', $fullImage);
            unset($fullImage[count($fullImage) - 1]);
            $fullPath = implode('/', $fullImage) . '/';

            $output[] = array(
                'id' => $item->ID,
                'path' => $fullPath,
                'full_image' => $item->guid,
                'meta' => wp_get_attachment_metadata($item->ID),
                'link' => get_post_meta($item->ID, '_gallery_link_url', true),
                "content" => [
                    "caption" => $item->post_excerpt,
                    "title" => $item->post_title
                ]
            );
        }
    }

    wp_reset_query();
    return $output;
}
