<?php

class config {
    public static $css = array(
        "theme_css_style_main" => "style.css",
        "theme_css_build" => "assets/theme/style.css",
        "theme_css_lightslider" => "assets/lightslider/css/lightslider.min.css",
        "theme_css_justifiedGallery" => "assets/justifiedGallery/css/lightgallery.min.css",
        "theme_css_style" => "assets/css/style.css"
    );

    public static $js = array(
        "theme_js_lightslider" => "assets/lightslider/js/lightslider.min.js",
        "theme_js_justifiedGallery" => "assets/justifiedGallery/js/lightgallery.min.js",
        "theme_js_app" => "assets/js/app.min.js"
    );

    public static $jsAdmin = array(
        "vutin_admin_js" => "asset_admin/js/js_admin.js"
    );

    public static $cssAdmin = array(
        "vutin_admin_css" => "asset_admin/css/style.css"
    );

    public static $widgets = array(
        "sidebar-1" => array(
            "name" => 'Khu vực sidebar',
            'id'            => 'sidebar',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<div class="section-title-three"><h3 class="widget-title">',
            'after_title'   => '</h3></div>'
        ),
        "sidebar-2" => array(
            "name" => 'Sidebar tin tức',
            'id'            => 'sidebar-news',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<div class="section-title-three"><h3 class="widget-title">',
            'after_title'   => '</h3></div>'
        ),

        "footer1" => array(
            "name" => 'Khu vực chân trang',
            'id'            => 'footer1',
            'description'   => '.',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title titleCol">',
            'after_title'   => '</h3>'
        ),
    );
    public static $menus = array(
        "primary" => "Menu chính"
    );

    public static function customizer(){
        return array(

            "general" => array(
                "label" => "Tổng quan",
                "section" => array(
                    "giao_dien" => array(
                        "label" => "Giao diện",
                        "fields" => array(
                            "logo" => array(
                                "name" => "Logo",
                                "label" => "Logo",
                                "type" => "image",
                                "default" => ""
                            ),"hotline" => array(
                                "label" => "Top hotline",
                                "type" => "text",
                                "default" => "0908 55 56 56"
                            ),"email" => array(
                                "label" => "Top email",
                                "type" => "text",
                                "default" => "suong@balotuixach.com"
                            ),"facebook" => array(
                                "label" => "Link Facebook",
                                "type" => "text",
                                "default" => ""
                            ),"google" => array(
                                "label" => "Link Google Plus",
                                "type" => "text",
                                "default" => ""
                            ),"twitter" => array(
                                "label" => "Link Twitter",
                                "type" => "text",
                                "default" => ""
                            ),"pinterest" => array(
                                "label" => "Link Pinterest",
                                "type" => "text",
                                "default" => ""
                            ),"youtube" => array(
                                "label" => "Link Youtube chanel",
                                "type" => "text",
                                "default" => ""
                            ),"instagram" => array(
                                "label" => "Link Instagram",
                                "type" => "text",
                                "default" => ""
                            ),
                        )
                    ),
                    'mobile' => [
                        'label' => "Mobile",
                        'fields' => [
                            "mobile_button_text" =>[
                                "label" => "Tên nút gọi mobile",
                                "type" => "text",
                            ],"mobile_button_link" =>[
                                "label" => "Link nút gọi",
                                "type" => "text"
                            ],
                            "mobile_button_text-color" =>[
                                "label" => "Màu chữ",
                                "type" => "text"
                            ],
                            "mobile_button_background_color" =>[
                                "label" => "Màu nút",
                                "type" => "text"
                            ],
                            "mobile_button_font_size" =>[
                                "label" => "Kích thước chữ",
                                "type" => "text"
                            ],

                        ]
                    ],

                    'footer' => [
                        "label" => "Footer",
                        "fields" => [
                            "logo_footer" => array(
                                "label" => "Logo",
                                "type" => "image",
                                "default" => ""
                            ),"footer_address" => array(
                                "label" => "Địa chỉ",
                                "type" => "text",
                                "default" => ""
                            ),"footer_phone" => array(
                                "label" => "Số điện thoại",
                                "type" => "text",
                                "default" => ""
                            ),"footer_email" => array(
                                "label" => "Email",
                                "type" => "text",
                                "default" => ""
                            ),"footer_title" => array(
                                "label" => "Tiêu đề cột 4",
                                "type" => "text",
                                "default" => ""
                            ),"footer_desc" => array(
                                "label" => "Nội dung cột 4",
                                "type" => "editor",
                                "default" => ""
                            ),"footer_bottom" => array(
                                "label" => "Copyright",
                                "type" => "textarea",
                                "default" => "Copyright 2018 MuaBanNhanh.com. All Rights Reserved"
                            ),"logo_bank" => array(
                                "label" => "Logo các ngân hàng chấp nhận thanh toán",
                                "type" => "image",
                            )
                        ]
                    ]
                )
            ),

            "home_slider" => [
                "label" => "Trang chủ",
                "section" => [
                    "product_tab" => [
                        "label" => "News",
                        "fields" => [
                            "title_new" => array(
                                "label" => "Tiêu đề",
                                "type" => "text",
                                "default" => ""
                            ),
                            "image_1" => array(
                                "label" => "Hình 1",
                                "type" => "image",
                                "default" => ""
                            ),
                             "id_yb_1" => array(
                                "label" => "id youtube 1",
                                "type" => "text",
                                "default" => ""
                            ),
                            "text_link_1" => array(
                                "label" => "text link 1",
                                "type" => "image",
                                "default" => ""
                            ),
                             "link_1" => array(
                                "label" => "link 1",
                                "type" => "text",
                                "default" => ""
                            ),

                            "image_2" => array(
                                "label" => "Hình 2",
                                "type" => "image",
                                "default" => ""
                            ),
                             "id_yb_2" => array(
                                "label" => "id youtube 2",
                                "type" => "text",
                                "default" => ""
                            ),
                            "text_link_2" => array(
                                "label" => "text link 2",
                                "type" => "image",
                                "default" => ""
                            ),
                             "link_2" => array(
                                "label" => "link 2",
                                "type" => "text",
                                "default" => ""
                            ),

                            "image_3" => array(
                                "label" => "Hình 3",
                                "type" => "image",
                                "default" => ""
                            ),
                             "id_yb_3" => array(
                                "label" => "id youtube 3",
                                "type" => "text",
                                "default" => ""
                            ),
                            "text_link_3" => array(
                                "label" => "text link 3",
                                "type" => "image",
                                "default" => ""
                            ),
                             "link_3" => array(
                                "label" => "link 3",
                                "type" => "text",
                                "default" => ""
                            ),
                            
                        ]
                    ],
                    "chuyen_muc" => [
                        "label" => "Chuyên mục",
                         "fields" => [
                            "title_category" => array(
                                "label" => "Tiêu đề chuyên mục",
                                "type" => "text",
                                "default" => ""
                            ),
                            "id_chuyen_muc" => array(
                                "label" => "Id chuyên mục",
                                "type" => "text",
                                "default" => ""
                            ),
                            "text_link_all" => array(
                                "label" => "Text link all chuyên mục",
                                "type" => "text",
                                "default" => ""
                            ),
                            "text_link" => array(
                                "label" => "link all chuyên mục",
                                "type" => "text",
                                "default" => ""
                            ),
                        ]
                    ],
                    "tin_tuc" => [
                        "label" => "Tin tức",
                         "fields" => [
                            "title_news" => array(
                                "label" => "Tiêu đề tin tức",
                                "type" => "text",
                                "default" => ""
                            ),
                            "id_news" => array(
                                "label" => "Id tin tức",
                                "type" => "text",
                                "default" => ""
                            ),
                        ]
                    ],
                    "products" => [
                        "label" => "Sản phẩm",
                         "fields" => [
                            "title_products" => array(
                                "label" => "Tiêu đề sản phẩm",
                                "type" => "text",
                                "default" => ""
                            ),
                            "id_products" => array(
                                "label" => "Id sản phẩm",
                                "type" => "text",
                                "default" => ""
                            ),
                            "text_link_all_products" => array(
                                "label" => "Tiêu đề link tất cả products",
                                "type" => "text",
                                "default" => ""
                            ),
                             "link_all_products" => array(
                                "label" => "link tất cả products",
                                "type" => "text",
                                "default" => ""
                            ),
                        ]
                    ],
                    "slogan" => [
                        "label" => "slogan",
                         "fields" => [
                            "title_slogan" => array(
                                "label" => "Tiêu đề slogan",
                                "type" => "text",
                                "default" => ""
                            ),
                            "image_slogan" => array(
                                "label" => "Hình ảnh",
                                "type" => "image",
                                "default" => ""
                            ),
                             "link_slogan" => array(
                                "label" => "link slogan",
                                "type" => "text",
                                "default" => ""
                            ),
                        ]
                    ],
                    "request" => [
                        "label" => "Yêu cầu",
                         "fields" => [
                            "title_yc" => array(
                                "label" => "Tiêu đề yêu cầu",
                                "type" => "text",
                                "default" => ""
                            ),
                            "title_yc1" => array(
                                "label" => "Tiêu đề item 1",
                                "type" => "text",
                                "default" => ""
                            ),
                             "link_yc1" => array(
                                "label" => "link item 1",
                                "type" => "text",
                                "default" => ""
                            ),
                            "title_yc2" => array(
                                "label" => "Tiêu đề item 2",
                                "type" => "text",
                                "default" => ""
                            ),
                             "link_yc2" => array(
                                "label" => "link item 2",
                                "type" => "text",
                                "default" => ""
                            ),
                            "title_yc3" => array(
                                "label" => "Tiêu đề item 3",
                                "type" => "text",
                                "default" => ""
                            ),
                             "link_yc2" => array(
                                "label" => "link item 3",
                                "type" => "text",
                                "default" => ""
                            ),
                        ]
                    ],
                ]
            ],
        );
    }
}