<?php

class Sub_menu
{

    public function __construct()
    {
        add_action('admin_menu', array(&$this, 'register_sub_menu'));
        add_shortcode('vutin_slider_home', [&$this, 'shortcode']);
    }

    public function shortcode()
    {
        $id = uniqid();

        $images = get_transient('vutin_home_slider');
        if (empty($images) || !is_array($images) || count($images) == 0) return '';

        ob_start();

        ?>
        <div class="hero-slider-box">
            <div class="">
                <div class="hero-slider hero-slider-<?php echo $id ?> hero-slider-one">
                    
                    <?php foreach ($images['images'] as $index => $image) : ?>
                        <?php if ($image['active'] != 'on') continue; ?>
                        <div class="single-slide"
                             style="background-image: url('<?php echo $image['image'] ?>')">
                            <div class="hero-content-one container">
                                <div class="row">
                                    <div class="col">
                                        <div class="slider-text-info text-black">

                                            <?php if (!empty($image['link'])) : ?>
                                                <a href="<?php echo $image['link'] ?>"
                                                   class="btn slider-btn uppercase">
                                                    <span><i class="fa fa-plus"></i> <?php echo isset($image['textbutton']) ? $image['textbutton'] : 'Mua ngay'; ?></span></a>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Hero Slider end -->
        <script>
            (function ($) {
                $(document).ready(function () {
                    $('.hero-slider-<?php echo $id ?>').slick({
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 5000,
                        dots: false,
                        pauseOnFocus: false,
                        pauseOnHover: false,
                        fade: true,
                        infinite: true,
                        slidesToShow: 1,
                        adaptiveHeight: false,
                        variableWidth:false,
                        dots: true,
                        prevArrow: '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"></i> </button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
                        responsive: [
                            {
                                breakpoint: 767,
                                settings: {
                                    dots: false
                                }
                            }
                        ]
                    });
                });
            })(jQuery);
        </script>

        <?php

        return ob_get_clean();
    }

    public function register_sub_menu()
    {
        add_submenu_page(
            'upload.php',
            __('Slider trang chủ', 'vutin'),
            __('Slider home', 'vutin'),
            'manage_options',
            'vutin-slider-home',
            [&$this, 'submenu_page_callback']
        );
    }

    public function handlePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postsData = isset($_POST['slider_home']) ? $_POST['slider_home'] : [];
            update_option('vutin_slider_home', $postsData);

            if (count($postsData) > 0 ) {
                set_transient('vutin_home_slider', $postsData);
            }
        }
    }

    public function submenu_page_callback($atts)
    {
        $this->handlePost();

        $postsData = get_option('vutin_slider_home');

        $categorySlider = get_terms([
            'taxonomy' => 'media_category',
        ]);
        $options = [];
        $options[] = "<option value=''>Chọn thư mục hình ảnh</option>";

        $folderCurrent = '';

        foreach ($categorySlider as $term) {
            $selected = '';
            if (isset($postsData['folder']) && $postsData['folder'] == $term->term_id) {
                $selected = 'selected';
                $folderCurrent = $term->slug;
            }
            $options[] = "<option {$selected} value='{$term->term_id}'>{$term->name}</option>";
        }
        $options = implode('', $options);


        $images = [];
        if (!empty($folderCurrent)) {
            $images = getImageByFolder($folderCurrent);
        }

        foreach ($images as &$item) {

            $item['content']['active'] = isset($postsData['images'][$item['id']]['active'])
                ? $postsData['images'][$item['id']]['active'] : 'on';

            $item['content']['link'] = isset($postsData['images'][$item['id']]['link'])
                ? $postsData['images'][$item['id']]['link'] : '';

            $item['content']['textbutton'] = isset($postsData['images'][$item['id']]['textbutton'])
                ? $postsData['images'][$item['id']]['textbutton'] : '';
        }

        wp_enqueue_script('jquery-ui-sortable');
        ?>


        <div class="wrap">
            <h1 class="wp-heading-inline">Cài đặt slider trang chủ</h1>

            <form action="" method="post">
                <div class="media-toolbar wp-filter" style="padding: 10px; position: relative;">
                    <div class="media-toolbar-secondary">
                        <select onchange="form.submit()" name="slider_home[folder]" id="" class="">
                            <?php echo $options ?>
                        </select>
                    </div>
                </div>


                <div class="sliderHomeList">
                    <table class="sortableen wp-list-table widefat fixed striped posts">
                        <thead>
                        <tr>
                            <th style="width: 200px"><b>Hình ảnh</b></th>
                            <th ><b>Thông tin slider</b></th>
                        </tr>
                        </thead>

                        <?php if (count($images) > 0) : ?>
                            <?php foreach ($images as $index => $image) : ?>
                                <tr>
                                    <td>
                                        <div class="wrapImage">
                                            <img src="<?php echo $image['full_image'] ?>" alt="">
                                            <input type="hidden"
                                                   name="slider_home[images][<?php echo $image['id'] ?>][image]"
                                                   value="<?php echo $image['full_image'] ?>">
                                        </div>
                                    </td>

                                    <td>
                                        <p>
                                            <input
                                                    name="slider_home[images][<?php echo $image['id'] ?>][active]"
                                                    type="checkbox"
                                                    value="on" <?php echo $image['content']['active'] == 'on' ? "checked" : '' ?>>
                                            Kích hoạt
                                        </p>
                                        <p>
                                            <input
                                                    name="slider_home[images][<?php echo $image['id'] ?>][link]"
                                                    type="text" class="regular-text"
                                                    placeholder="Liên kêt" value="<?php echo $image['content']['link'] ?>">
                                        </p>
                                        <p>
                                            <input
                                                    name="slider_home[images][<?php echo $image['id'] ?>][textbutton]"
                                                    type="text" class="regular-text"
                                                    placeholder="Text button" value="<?php echo $image['content']['textbutton'] ?>">
                                        </p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td>
                                <button type="submit" class="button button-primary">Lưu thay đổi</button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>

            </form>

        </div>
        <?php

    }

}

new Sub_menu();