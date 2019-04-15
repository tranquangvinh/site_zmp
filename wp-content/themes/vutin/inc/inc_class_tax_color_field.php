<?php

class vutinColorField
{
    function __construct()
    {
        add_action('pa_mau-sac_edit_form_fields', [$this, 'add_field'], 10, 2);
        add_action('edited_pa_mau-sac', [$this, 'save_field'], 10, 2);
    }

    public function add_field($term)
    {
        global $post;
        wp_enqueue_media(array(
            'post' => $post->ID,
        ));
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');

        $term_meta = get_term_meta($term->term_id);

        $thumbnail_id = absint($term_meta['color_thumbnail_id'][0]);

        if ($thumbnail_id) {
            $image = wp_get_attachment_thumb_url($thumbnail_id);
        } else {
            $image = wc_placeholder_img_src();
        }
        ?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="presenter_id"><?php _e('Mã màu sắc'); ?></label>
            </th>
            <td>
                <input type="color" name="term_meta[color_hex]" id="term_meta[color_hex]" size="25" style="width:60%;"
                       value="<?php echo $term_meta['color_hex'] ? $term_meta['color_hex'][0] : ''; ?>"><br/>
                <span class="description"><?php _e('Nhập mã màu sắc cho thuộc tính này, mã bắt đầu bằng #'); ?></span>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="presenter_id"><?php _e('Hình ảnh màu sắc'); ?></label>
            </th>
            <td>
                <div id="product_cat_thumbnail" style="">
                    <img
                            style="object-fit: contain"
                            src="<?php echo esc_url($image); ?>" width="120px" height="120px"/></div>
                <div style="line-height: 60px;">
                    <input  type="hidden" id="color_thumbnail_id" name="term_meta[color_thumbnail_id]"
                           value="<?php echo $thumbnail_id; ?>"/>
                    <button type="button"
                            class="upload_image_button button"><?php _e('Upload/Add image', 'woocommerce'); ?></button>
                    <button type="button"
                            class="remove_image_button button"><?php _e('Remove image', 'woocommerce'); ?></button>
                </div>
                <script type="text/javascript">

                    (function ($) {
                        if ('0' === jQuery('#color_thumbnail_id').val()) {
                            jQuery('.remove_image_button').hide();
                        }
                        var file_frame;

                        jQuery(document).on('click', '.upload_image_button', function (event) {
                            event.preventDefault();

                            if (file_frame) {
                                file_frame.open();
                                return;
                            }
                            // Create the media frame.
                            file_frame = wp.media.frames.downloadable_file = wp.media({
                                title: '<?php _e('Choose an image', 'woocommerce'); ?>',
                                button: {
                                    text: '<?php _e('Use image', 'woocommerce'); ?>'
                                },
                                multiple: false
                            });

                            // When an image is selected, run a callback.
                            file_frame.on('select', function () {
                                var attachment = file_frame.state().get('selection').first().toJSON();
                                var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

                                jQuery('#color_thumbnail_id').val(attachment.id);
                                jQuery('#product_cat_thumbnail').find('img').attr('src', attachment_thumbnail.url);
                                jQuery('.remove_image_button').show();
                            });

                            // Finally, open the modal.
                            file_frame.open();
                        });

                        jQuery(document).on('click', '.remove_image_button', function () {
                            jQuery('#product_cat_thumbnail').find('img').attr('src', '<?php echo esc_js(wc_placeholder_img_src()); ?>');
                            jQuery('#color_thumbnail_id').val('');
                            jQuery('.remove_image_button').hide();
                            return false;
                        });
                    })(jQuery)

                </script>
                <div class="clear"></div>

                <br/>
            </td>
        </tr>
        <?php
    }


    public function save_field($term_id)
    {
        if (isset($_POST['term_meta'])) {
            foreach ($_POST['term_meta'] as $key => $value) {
                update_term_meta($term_id, $key, $value);
            }
        }
    }
}

new vutinColorField();