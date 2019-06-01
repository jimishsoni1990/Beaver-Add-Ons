/*
 *	Add Extra Background fields for 
 *	medium and small devices
 *
 */
function bb_register_settings_form( $form, $id ) {
  
  if ( 'row' == $id ) {
  	$form['tabs']['style']['sections']['bg_photo']['fields']['bg_photo_medium'] = array(
	    'type'          => 'photo',
	    'label'         => __('Photo for medium devices', 'fl-builder'),
	    'show_remove'   => true,
	);
	$form['tabs']['style']['sections']['bg_photo']['fields']['bg_position_medium'] =  array(						
		'type'          => 'select',
		'label'         => __('Position', 'fl-builder'),
		'default'       => 'center center',
		'options'       => array(
			'left top'      => __('Left Top', 'fl-builder'),
			'left center'   => __('Left Center', 'fl-builder'),
			'left bottom'   => __('Left Bottom', 'fl-builder'),
			'right top'     => __('Right Top', 'fl-builder'),
			'right center'  => __('Right Center', 'fl-builder'),
			'right bottom'  => __('Right Bottom', 'fl-builder'),
			'center top'    => __('Center Top', 'fl-builder'),
			'center center' => __( 'Center', 'fl-builder' ),
			'center bottom' => __('Center Bottom', 'fl-builder')
		),
		'help'          => __('Position will tell the image where it should sit in the background.', 'fl-builder'),
		'preview'         => array(
			'type'            => 'none'
		)
	);
	$form['tabs']['style']['sections']['bg_photo']['fields']['bg_size_medium'] =  array(						
		'type'          => 'select',
		'label'         => __('Scale', 'fl-builder'),
		'default'       => 'cover',
		'options'       => array(
			''              => _x( 'None', 'Background scale.', 'fl-builder' ),
			'contain'       => __( 'Fit', 'fl-builder'),
			'cover'         => __( 'Fill', 'fl-builder')
		),
		'help'          => __('Scale applies to how the image should display in the background. You can select either fill or fit to the background.', 'fl-builder'),
		'preview'         => array(
			'type'            => 'none'
		)
	);

	$form['tabs']['style']['sections']['bg_photo']['fields']['bg_photo_small'] = array(
	    'type'          => 'photo',
	    'label'         => __('Photo for small devices', 'fl-builder'),
	    'show_remove'   => true,
	);

	$form['tabs']['style']['sections']['bg_photo']['fields']['bg_position_small'] =  array(						
		'type'          => 'select',
		'label'         => __('Position', 'fl-builder'),
		'default'       => 'center center',
		'options'       => array(
			'left top'      => __('Left Top', 'fl-builder'),
			'left center'   => __('Left Center', 'fl-builder'),
			'left bottom'   => __('Left Bottom', 'fl-builder'),
			'right top'     => __('Right Top', 'fl-builder'),
			'right center'  => __('Right Center', 'fl-builder'),
			'right bottom'  => __('Right Bottom', 'fl-builder'),
			'center top'    => __('Center Top', 'fl-builder'),
			'center center' => __( 'Center', 'fl-builder' ),
			'center bottom' => __('Center Bottom', 'fl-builder')
		),
		'help'          => __('Position will tell the image where it should sit in the background.', 'fl-builder'),
		'preview'         => array(
			'type'            => 'none'
		)
	);
	$form['tabs']['style']['sections']['bg_photo']['fields']['bg_size_small'] =  array(						
		'type'          => 'select',
		'label'         => __('Scale', 'fl-builder'),
		'default'       => 'cover',
		'options'       => array(
			''              => _x( 'None', 'Background scale.', 'fl-builder' ),
			'contain'       => __( 'Fit', 'fl-builder'),
			'cover'         => __( 'Fill', 'fl-builder')
		),
		'help'          => __('Scale applies to how the image should display in the background. You can select either fill or fit to the background.', 'fl-builder'),
		'preview'         => array(
			'type'            => 'none'
		)
	);
  }
  
  return $form;
}
add_filter( 'fl_builder_register_settings_form', 'bb_register_settings_form', 10, 2 );

/*
 *	Add CSS for Extra Background fields for 
 *	medium and small devices
 *
 */
add_filter( 'fl_builder_render_css', 'bb_filter_row_css',1000, 3 );
function bb_filter_row_css( $css, $nodes, $global_settings )
{
    foreach( $nodes['rows'] as $row )
    {
        $settings = $row->settings;
 
        if( 'photo' == $settings->bg_type && ! empty( $settings->bg_photo_medium ) )
        {
            $css .= '@media (max-width:' . $global_settings->medium_breakpoint . 'px)
                    {
                        .fl-node-' . $row->node . ' > .fl-row-content-wrap {
                            background-image: url(' . $row->settings->bg_photo_medium_src . ');
                            background-position: ' . $row->settings->bg_position_medium . ';
                            background-size: ' . $row->settings->bg_size_medium . ';
                        }
                    }';
        }
 
        if( 'photo' == $settings->bg_type && ! empty( $settings->bg_photo_small ) )
        {
            $css .= '@media (max-width:' . $global_settings->responsive_breakpoint . 'px)
                    {
                        .fl-node-' . $row->node . ' > .fl-row-content-wrap {
                            background-image: url(' . $row->settings->bg_photo_small_src . ');
                            background-position: ' . $row->settings->bg_position_small . ';
                            background-size: ' . $row->settings->bg_size_small . ';
                        }
                    }';
        }
    }
 
    return $css;
}
