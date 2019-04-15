<?php

class registerCustomizer
{
    function __construct()
    {
        add_action( 'customize_register', array( $this, 'register_customizer' ) );
    }


    public function register_customizer(WP_Customize_Manager $wp_customize)
    {
        foreach (config::customizer() as $key_panel => $panel)
        {
            $wp_customize->add_panel(
                $key_panel,
                array(
                    "title" => $panel['label']
                )
            );

            if (isset($panel['section'])) {
                foreach ($panel['section'] as $section) {
                    $nameSection = $key_panel . sanitize_title($section['label']);
                    $wp_customize->add_section(
                        $nameSection,
                        array(
                            "title" => $section['label'],
                            "panel" => $key_panel
                    ));


                    if (isset($section['fields'])) {
                        foreach ($section['fields'] as $key => $field) {

                            $wp_customize->add_setting($key, array(
                                'default' => (isset($field['default']) ? $field['default'] : ''),
                            ));

                            switch ($field['type']) {
                                case "image":
                                    $field['section'] = $nameSection;
                                    $wp_customize->add_control(
                                        new WP_Customize_Image_Control(
                                            $wp_customize,
                                            $key,
                                            array(
                                                'label'      => $field['label'],
                                                'section' => $nameSection,
                                                'setting' => $key
                                            )
                                        )
                                    );
                                    break;

                                case "select":
                                    $wp_customize->add_control(
                                        $key,
                                        array(
                                            'label' => $field['label'],
                                            'type' => 'select',
                                            'section' => $nameSection,
                                            'setting' => $key,
                                            'choices' => $field['options']
                                        )
                                    );
                                    break;

                                case 'slider_control':
                                    $wp_customize->add_control(
                                        new Skyrocket_Slider_Custom_Control(
                                            $wp_customize,
                                            $key,
                                        array(
                                            'label' => $field['label'],
                                            'section' => $nameSection,
                                            'input_attrs' => array(
                                                'min' => $field['min'],
                                                'max' => $field['max'],
                                                'step' => $field['step'],
                                            ),
                                        )
                                    ) );
                                    break;

                                case 'dropdown-pages':
                                    $wp_customize->add_control(
                                        $key,
                                        array(
                                            'label' => $field['label'],
                                            'type' => 'dropdown-pages',
                                            'section' => $nameSection,
                                            'setting' => $key
                                        )
                                    );
                                    break;
                                case 'dropdown_select2':
                                    $wp_customize->add_control(
                                        new Skyrocket_Dropdown_Select2_Custom_Control(
                                            $wp_customize,
                                                $key,
                                            array(
                                                'label' => $field['label'],
                                                'section' => $nameSection,
                                                'input_attrs' => array(
                                                    'multiselect' => true,
                                                ),
                                                'choices' => $field['options'],
                                            )
                                        )
                                    );
                                    break;

                                case 'repeat':
                                    $wp_customize->add_control(
                                        new Skyrocket_Sortable_Repeater_Custom_Control(
                                            $wp_customize,
                                            $key,
                                            array(
                                                'label' => $field['label'],
                                                'section' => $nameSection,
                                                'button_labels' => array(
                                                    'add' => $field['button_label']
                                                )
                                            )
                                        )
                                    );
                                    break;

                                case 'editor':
                                    $wp_customize->add_control(
                                        new Skyrocket_TinyMCE_Custom_control(
                                            $wp_customize,
                                            $key,
                                            array(
                                                'label' => $field['label'],
                                                'description' => @$field['desc'],
                                                'section' => $nameSection,
                                                'input_attrs' => array(
                                                    'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
                                                    'toolbar2' => 'formatselect outdent indent | blockquote charmap',
                                                )
                                            )
                                        )
                                    );
                                    break;

                                case 'select2':
                                    $wp_customize->add_control(
                                        new Skyrocket_Dropdown_Select2_Custom_Control(
                                            $wp_customize,
                                            $key,
                                            array(
                                                'label' => $field['label'],
                                                'description' => $field['desc'],
                                                'section' => $nameSection,
                                                'input_attrs' => array(
                                                    'placeholder' => __( 'Please select a state...', 'skyrocket' ),
                                                    'multiselect' => false,
                                                ),
                                                'choices' => $field['options']
                                            )
                                        )
                                    );
                                    break;

                                case "text":
                                default :
                                    $wp_customize->add_control(
                                        $key,
                                        array(
                                            'label' => $field['label'],
                                            'type' => $field['type'],
                                            'section' => $nameSection,
                                            'setting' => $key
                                        )
                                    );
                                    break;

                            }


                            $wp_customize->selective_refresh->add_partial( $key, array(
                                'selector' => ".customize-{$key}"
                            ) );
                        }
                    }
                }
            }
        }
    }
}


new registerCustomizer();