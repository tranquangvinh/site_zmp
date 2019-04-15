<?php
function limitSize()
{
    wp_enqueue_script('customSize', plugins_url('custom-size-image-resize.js', __FILE__), array('media-editor'), '0.0.1');
    wp_localize_script('customSize', 'customSize', array(
        'plupload' => array(
            'resize' => array(
                'enabled' => true,
                'width' => 1920,
                'height' => 2400,
                'quality' => 90,
            ),
        )
    ));
}

// add_action('wp_enqueue_media', 'limitSize');


add_action('admin_print_scripts', function () {
    echo <<< 'EOT'
    <script type="text/javascript">
        if (typeof wp != 'undefined') {
            (function(media){
                var oldReady = media.view.UploaderWindow.prototype.ready;
                media.view.UploaderWindow.prototype.ready = function() {
                    if ( ! this.options.uploader.plupload )
                        this.options.uploader.plupload = customSize.plupload;
                    // back to default behaviour
                    oldReady.apply( this , arguments );
                };
            })(wp.media);
        }
    </script>
EOT;

}, PHP_INT_MAX);
