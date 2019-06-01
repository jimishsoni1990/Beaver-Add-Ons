<?php
class IcModule extends FLBuilderModule {
    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Image Carousel', 'fl-builder' ),
            'description'     => __( 'A totally awesome Carousel!', 'fl-builder' ),
            'category'        => __( 'Carousel', 'fl-builder' ),
            'dir'             => IC_DIR . 'ic-module/',
            'url'             => IC_URL . 'ic-module/',
            'icon'            => 'button.svg',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));

        $this->add_css( 'ic-slick',       $this->url . 'css/slick.css' );
    }

    public function render_slider(){

        $slide_item_counter = 1;
        
        foreach( $this->settings->add_slide_item as $slide ){
            $this->render_each_slide( $slide, $slide_item_counter );
            $slide_item_counter = $slide_item_counter + 1;
        }
        

    }

    public function render_each_slide( $slide, $slide_item_counter ){
        
        if(isset($slide->photo_src) && $slide->photo_src != ''){
            echo '<div class="ic-slide-'.$slide_item_counter.'">
                    <img src="'.$slide->photo_src.'" alt="'.$slide->ic_slide_title.'">';

                    if($this->settings->ic_display_title == 'yes'){
                        echo '<p class="ic-display-title">'.$slide->ic_slide_title.'</p>';
                    }

            echo  ' </div>';
        }
    }
}

FLBuilder::register_module('IcModule', array(
    'ic_slides'       => array( 
        'title'         => __('Slides', 'icba'),
        'sections'      => array( 
            'ic_slides_general'       => array( 
                'title'         => '', 
                'fields'        => array( 
                    'add_slide_item'     => array(
                        'type'         => 'form',
                        'label'        => __('Slide', 'icba'),
                        'form'         => 'ic_slides_form',
                        'preview_text' => 'ic_slide_title',
                        'multiple'     => true
                    ),
                )
            )
        )
    ),

    'ic_slides_settings'       => array( 
        'title'         => __('Settings', 'icba'), 
        'sections'      => array( 
            'ic_display_settings'       => array( 
                'title'         => __('Display Settings', 'icba'), 
                'fields'        => array( 
                    'ic_image_position'   => array(
                        'type'          => 'select',
                        'label'         => __('Icon / Image Alignment', 'icba'),
                        'default'       => 'left',
                        'options'       => array(
                            'left'      => __('Left', 'icba'),
                            'right'     => __('Right', 'icba'),
                            'center'       => __('Center', 'icba')
                        )
                    ),
                    'ic_display_title'         => array(
                        'type'          => 'select',
                        'label'         => __('Display Image Title', 'icba'),
                        'default'       => 'no',
                        'description'   => '',
                        'options'       => array(
                            'yes'         => __('Yes', 'icba'),
                            'no'         => __('No', 'icba')
                        ),
                    ),
                ),
            ),
            'ic_slider_settings'       => array( 
                'title'         => __('Slider Settings', 'icba'), 
                'fields'        => array( 
                    'ic_setting_autoplay'   => array(
                        'type'          => 'select',
                        'label'         => __('Autoplay', 'icba'),
                        'default'       => '0',
                        'options'       => array(
                            '0'     => __('No', 'icba'),
                            '1'      => __('Yes', 'icba'),
                        )
                    ),
                    'ic_setting_arrows'   => array(
                        'type'              => 'select',
                        'label'             => __('Arrows', 'icba'),
                        'help'              => __('Choose weather to show or hide arrows at different device sizes.', 'icba'),
                        'default'           => 'always',
                            'options'           => array(
                                'always'        => __('Always', 'icba'),
                                'desktop'       => __('Large Devices Only', 'icba'),
                                'desktop-medium'=> __('Large &amp; Medium Devices Only', 'icba'),
                                'medium'        => __('Medium Devices Only', 'icba'),
                                'medium-mobile' => __('Medium &amp; Small Devices Only', 'icba'),
                                'mobile'        => __('Small Devices Only', 'icba'),
                                'none'          => __('None', 'icba')
                            )
                    ),
                    'ic_setting_dots'   => array(
                        'type'              => 'select',
                        'label'             => __('Dots', 'icba'),
                        'help'              => __('Choose weather to show or hide dots at different device sizes.', 'icba'),
                        'default'           => 'always',
                            'options'           => array(
                                'always'        => __('Always', 'icba'),
                                'desktop'       => __('Large Devices Only', 'icba'),
                                'desktop-medium'=> __('Large &amp; Medium Devices Only', 'icba'),
                                'medium'        => __('Medium Devices Only', 'icba'),
                                'medium-mobile' => __('Medium &amp; Small Devices Only', 'icba'),
                                'mobile'        => __('Small Devices Only', 'icba'),
                                'none'          => __('None', 'icba')
                            )
                    ),
                    'ic_setting_slides_to_show'    => array(
                        'type'          => 'unit',
                        'label'         => __( 'Slides to show', 'icba' ),
                        'description'   => '',
                        'help'              => __('Slide to show at differnt device sizes.', 'icba'),
                        'default'       => 3,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.icba-info-list-description *',
                            'property'        => 'line-height',
                            'unit'            => 'em'
                        ),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '',
                                'medium' => '',
                                'responsive' => '',
                            ),
                        ),
                    ),
                    'ic_setting_slides_to_scroll'    => array(
                        'type'          => 'unit',
                        'label'         => __( 'Slides to scroll', 'icba' ),
                        'description'   => '',
                        'help'              => __('Slide to scroll at differnt device sizes.', 'icba'),
                        'default'       => 3,
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.icba-info-list-description *',
                            'property'        => 'line-height',
                            'unit'            => 'em'
                        ),
                        'responsive' => array(
                            'placeholder' => array(
                                'default' => '',
                                'medium' => '',
                                'responsive' => '',
                            ),
                        ),
                    ),
                ),
            ),
        ),

    )
));


//Add List Items
FLBuilder::register_settings_form('ic_slides_form', array(
    'title' => __( 'Add Slide', 'icba' ),
    'tabs'  => array(
        'ic_slide_image'      => array(
            'title'         => __('Icon / Image', 'icba'),
            'sections'      => array(
                'title'       => array(
                    'title'         => __( 'Icon / Image', 'icba' ),
                    'fields'        => array(
                        'ic_slide_title'          => array(
                            'type'          => 'text',
                            'label'         => __('Title', 'icba'),
                            'description'   => '',
                            'default'       => __('Slide Title','icba'),
                            'help'          => __( 'Provide a title for this slide.', 'icba' ),
                            'placeholder'         => __('Title','icba'),
                            'class'         => 'ic-slide-title',
                            'connections'   => array( 'string', 'html' )
                        ),
                        'ic_image_type'    => array(
                            'type'          => 'select',
                            'label'         => __('Image Type', 'icba'),
                            'default'       => 'none',
                            'options'       => array(
                                'none'          => __( 'None', 'Image type.', 'icba' ),
                                'icon'          => __('Icon', 'icba'),
                                'photo'         => __('Photo', 'icba'),
                            ),
                            'toggle'        => array(
                                'icon'          => array(
                                    'sections'   => array( 'ic_icon_basic', 'ic_icon_colors' ),
                                ),
                                'photo'         => array(
                                    'sections'   => array( 'ic_img_basic' ),
                                )
                            ),
                        ),
                    ),
                ),
                /* Icon Basic Setting */
                'ic_icon_basic'        => array( // Section
                    'title'         => __('Icon','icba'), // Section Title
                    'fields'        => array( // Section Fields
                        'icon'          => array(
                            'type'          => 'icon',
                            'label'         => __('Icon', 'icba'),
                            'show_remove' => true
                        ),
                        'icon_color' => array( 
                            'type'       => 'color',
                            'label'      => __('Icon Color', 'icba'),
                            'default'    => '',
                            'show_reset' => true,
                        ),
                    )
                ),
                /* Image Basic Setting */
                'ic_img_basic'     => array( // Section
                    'title'         => __('Image','icba'), // Section Title
                    'fields'        => array( // Section Fields
                        'photo_source'  => array(
                            'type'          => 'select',
                            'label'         => __('Photo Source', 'icba'),
                            'default'       => 'library',
                            'options'       => array(
                                'library'       => __('Media Library', 'icba'),
                                'url'           => __('URL', 'icba')
                            ),
                            'toggle'        => array(
                                'library'       => array(
                                    'fields'        => array('photo')
                                ),
                                'url'           => array(
                                    'fields'        => array('photo_url' )
                                )
                            )
                        ),
                        'photo'         => array(
                            'type'          => 'photo',
                            'label'         => __('Photo', 'icba'),
                            'show_remove'   => true,
                            'connections'   => array( 'photo' )
                        ),
                        'photo_url'     => array(
                            'type'          => 'text',
                            'label'         => __('Photo URL', 'icba'),
                            'placeholder'   => 'http://www.example.com/my-photo.jpg',
                        ),
                    )
                ),
            ),
        )
    )
));