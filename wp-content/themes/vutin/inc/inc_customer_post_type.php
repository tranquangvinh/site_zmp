<?php


class vutinCustomer
{
    function __construct()
    {
        add_action('init', [&$this, 'post_type']);
        add_action('save_post_khach-hang', [$this, 'save_post'], 999, 2);
    }

    public function save_post($postId, $post)
    {
        $custom = isset($_POST['customer']) ? $_POST['customer'] : [];
        if (count($custom) > 0) {
            if (isset($custom['name'])) {
                update_post_meta($postId, 'customer_name', $custom['name']);
            }
            if (isset($custom['desc'])) {
                update_post_meta($postId, 'customer_desc', $custom['desc']);
            }
        }
    }


    public function post_type()
    {
        $labels = array(
            'name'               => "Khách hàng",
            'singular_name'      => "Khách hàng",
            'menu_name'          => "Khách hàng",
            'name_admin_bar'     => "Khách hàng",
            'add_new'            => "Add New",
            'add_new_item'       => "Add New",
            'new_item'           => "New  " ,
            'edit_item'          => "Edit  ",
            'view_item'          => "View  ",
            'all_items'          => "All  ",
            'search_items'       => "Search  ",
            'parent_item_colon'  => "Parent  ",
            'not_found'          => "No License found",
            'not_found_in_trash' => "No License found in Trash. "
        );

        $args = array(
            'labels'             => $labels,
            'description'        => "Description",
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'thumbnail'),
            'register_meta_box_cb' => [&$this, 'meta_box_cp_license'],
        );
        register_post_type( 'khach-hang', $args );

    }

    public function meta_box_cp_license()
    {
        add_meta_box(
            'cp_license_info',
            'Thông tin khách hàng',
            [$this, 'render_meta_box'],
            'khach-hang',
            'normal',
            'default'
        );
    }

    public function render_meta_box($post)
    {
        $name = get_post_meta($post->ID, 'customer_name', true);
        $desc = get_post_meta($post->ID, 'customer_desc', true);
        ?>
            <table class="form-table">
                <tr>
                    <th>Họ và tên khách hàng</th>
                    <td>
                        <input name="customer[name]" type="text" value="<?php echo $name ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th>Nhận xét</th>
                    <td>
                        <textarea name="customer[desc]" id="" style="width:100%;" rows="10"><?php echo $desc ?></textarea>
                    </td>
                </tr>
            </table>
        <?php
    }
}

new vutinCustomer();