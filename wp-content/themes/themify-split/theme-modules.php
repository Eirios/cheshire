<?php
/***************************************************************************
 *						Theme Modules
 * 	----------------------------------------------------------------------
 * 						DO NOT EDIT THIS FILE
 *	----------------------------------------------------------------------
 * 
 *  					Copyright (C) Themify
 * 						http://themify.me
 *
 *  To add custom modules to the theme, create a new 'custom-modules.php' file in the theme folder.
 *  They will be added to the theme automatically.
 * 
 ***************************************************************************/

/**
 * Choose pagination or infinite scroll.
 * @param array $data
 * @return string
 */
function themify_pagination_infinite($data=array()){
	$html = '<p>';

	//Infinite Scroll
	$html .= '<input ' . checked( themify_check( 'setting-more_posts' ) ? themify_get( 'setting-more_posts' ) : 'infinite', 'infinite', false ) . ' type="radio" name="setting-more_posts" value="infinite" /> ';
	$html .= __('Infinite Scroll (posts are loaded on the same page)', 'themify');
	$html .= '<br/>';
	$html .= '<label for="setting-autoinfinite"><input class="disable-autoinfinite" type="checkbox" id="setting-autoinfinite" name="setting-autoinfinite" '.checked( themify_check( 'setting-autoinfinite' ), true, false ).'/> ' . __('Disable automatic infinite scroll', 'themify').'</label>';
	$html .= '<br/><br/>';

	//Numbered pagination
	$html .= '<input ' . checked( themify_get( 'setting-more_posts' ), 'pagination', false ) . ' type="radio" name="setting-more_posts" value="pagination" /> ';
	$html .= __('Standard Pagination', 'themify');
	$html .= '</p>';

	return $html;
}

/**
 * Control to disable page loader effect in regular pages.
 * @param array $data
 * @return string
 */
function themify_page_loader_effect( $data = array() ) {
	$html = sprintf('<p class="hide-if none"><label class="label" for="%1$s">%4$s</label><label for="%1$s"><input onchange="jQuery(this).is(\':checked\')?jQuery(\'.page_loader_wrap\').hide():jQuery(\'.page_loader_wrap\').show();" type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
		'setting-page_loader_disabled',
		checked( themify_get( 'setting-page_loader_disabled' ), 'on', false ),
		__('Disable page loader effect in regular pages', 'themify'),
                __('Page Loader', 'themify')
	);
        $key = 'setting-page_loader_color';
        $value = themify_get($key);
        $html.='<p class="page_loader_wrap">
                    <label class="label" for="'.$key.'">' . __('Loading screen color', 'themify') . '  </label>
                    <span class="colorSelect" style=""><span></span></span> <input id="'.$key.'" type="text"  name="'.$key.'" class="colorSelectInput width4" value="'.esc_attr($value).'"/>
                </p>';
        $key = 'setting-page_loader_icon';
        $value = themify_get($key);
        $html.='<div class="themify_field_row page_loader_wrap">
                        <span class="label">'. __('Loader Icon', 'themify') . '</span>
                        <input id="'.$key.'" type="text" class="width10" name="'.$key.'" value="' . esc_attr( $value ) . '" /> <br />
                        <span class="pushlabel">
                            <a class="left button button-secondary hide-if-no-js themify_fa_toggle" href="#" data-target="#'.$key.'">'.__( 'Insert Icon', 'themify' ).'</a>
                            <span style="margin: 2px 7px;font-size: 1.15em;" class="left">'.__('or', 'themify').'</span>
                            <div class="left" style="margin-top: -4px;">' . themify_get_uploader($key, array('tomedia' => true,'label'=>__('Upload an image','themify'))) . '</div>
                        </span>
                </div>';
	return $html;
}

/**
 * Markup for header options
 * @param array $data
 * @return string
 */
function themify_theme_header_options( $data = array() ) {
	/**
	 * Module markup
	 * @var string
	 */
	$html = '';

	/**
	 * Header Design
	 * @var array
	 */
	$header_design_options = array(
		array(
			'value' => 'header-horizontal',
			'img'   => 'images/layout-icons/header-horizontal.png',
			'title' => __( 'Header Horizontal', 'themify' ),
			'selected' => true,
		),
		array(
			'value' => 'header-block',
			'img'   => 'images/layout-icons/header-block.png',
			'title' => __( 'Header Block', 'themify' )
		),
		array(
			'value' => 'none',
			'img'   => 'images/layout-icons/none.png',
			'title' => __( 'No Header ', 'themify' )
		)
	);

	/**
	 * Prefix for theme settings
	 * @var string
	 */
	$pre = 'setting-header_design';

	// Store items to hide
	$html .= '<div class="group-hide" data-hide="none header-leftpane header-minbar boxed-content">';

		/**
		 * Exclude Site Logo
		 */
		$html .= sprintf('<p class="hide-if none pushlabel"><label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
			'setting-exclude_site_logo',
			checked( themify_get( 'setting-exclude_site_logo' ), 'on', false ),
			__('Exclude Site Logo.', 'themify')
		);

		/**
		 * Exclude Site Tagline
		 */
		$html .= sprintf('<p class="hide-if none pushlabel"><label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
			'setting-exclude_site_tagline',
			checked( themify_get( 'setting-exclude_site_tagline' ), 'on', false ),
			__('Exclude Site Tagline.', 'themify')
		);

		/**
		 * Exclude Search Form
		 */
		$html .= sprintf('<p class="hide-if none pushlabel"><label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
			'setting-exclude_search_form',
			checked( themify_get( 'setting-exclude_search_form' ), 'on', false ),
			__('Exclude Search Form.', 'themify')
		);

		/**
		 * Exclude RSS Link
		 */
		$html .= sprintf('<p class="hide-if none pushlabel"><label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
			'setting-exclude_rss',
			checked( themify_get( 'setting-exclude_rss' ), 'on', false ),
			__('Exclude RSS Link.', 'themify')
		);

		/**
		 * Exclude Social Widgets
		 */
		$html .= sprintf('<p class="hide-if none pushlabel"><label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
			'setting-exclude_social_widget',
			checked( themify_get( 'setting-exclude_social_widget' ), 'on', false ),
			__('Exclude Social Widgets.', 'themify')
		);

		/**
		 * Exclude Menu Navigation
		 */
		$html .= sprintf('<p class="hide-if none pushlabel"><label for="%1$s"><input type="checkbox" id="%1$s" name="%1$s" %2$s /> %3$s</label></p>',
			'setting-exclude_menu_navigation',
			checked( themify_get( 'setting-exclude_menu_navigation' ), 'on', false ),
			__('Exclude Menu Navigation.', 'themify')
		);

	// End group of elements to hide
	$html .= '</div><!-- /.group-hide -->';

	return $html;
}

/**
 * Default Index Layout Module
 * @param array $data Theme settings data
 * @return string Markup for module.
 * @since 1.0.0
 */
function themify_default_layout( $data = array() ){
	$data = themify_get_data();
	/**
	 * Theme Settings Option Key Prefix
	 * @var string
	 */
	$prefix = 'setting-default_';

	if ( themify_get( $prefix . 'more_text' ) == '' ) {
		$more_text = __('More', 'themify');
	} else {
		$more_text = themify_get( $prefix.'more_text' );
	}
	/**
	 * Tertiary options <blank>|yes|no
	 * @var array
	 */
	$default_options = array(
		array('name' => '', 'value' => ''),
		array('name' => __('Yes', 'themify'), 'value' => 'yes'),
		array('name' => __('No', 'themify'), 'value' => 'no')
	);
	/**
	 * Default options 'yes', 'no'
	 * @var array
	 */
	$binary_options = array(
		array('name'=>__('Yes', 'themify'),'value'=>'yes'),
		array('name'=>__('No', 'themify'),'value'=>'no')
	);
	/**
	 * Post content display options
	 * @var array
	 */
	$default_display_options = array(
		array('name' => __('Full Content', 'themify'),'value' => 'content'),
		array('name' => __('Excerpt', 'themify'),'value' => 'excerpt'),
		array('name' => __('None', 'themify'),'value' => 'none')
	);
	/**
	 * Post layout options
	 * @var array
	 */
	$default_post_layout_options = array(
		array('value' => 'list-post', 'img' => 'images/layout-icons/list-post.png', 'title' => __('List Post', 'themify'), 'selected' => true),
		array('value' => 'grid4', 'img' => 'images/layout-icons/grid4.png', 'title' => __('Grid 4', 'themify')),
		array('value' => 'grid3', 'img' => 'images/layout-icons/grid3.png', 'title' => __('Grid 3', 'themify')),
		array('value' => 'grid2', 'img' => 'images/layout-icons/grid2.png', 'title' => __('Grid 2', 'themify')),
		array('value' => 'list-large-image', 'img' => 'images/layout-icons/list-large-image.png', 'title' => __('List Large Image', 'themify')),
		array('value' => 'list-thumb-image', 'img' => 'images/layout-icons/list-thumb-image.png', 'title' => __('List Thumb Image', 'themify')),
		array('value' => 'grid2-thumb', 'img' => 'images/layout-icons/grid2-thumb.png', 'title' => __('Grid 2 Thumb', 'themify')),
	);
	/**
	 * Sidebar placement options
	 * @var array
	 */
	$sidebar_location_options = array(
		array('value' => 'sidebar1', 'img' => 'images/layout-icons/sidebar1.png', 'selected' => true, 'title' => __('Sidebar Right', 'themify')),
		array('value' => 'sidebar1 sidebar-left', 'img' => 'images/layout-icons/sidebar1-left.png', 'title' => __('Sidebar Left', 'themify')),
		array('value' => 'sidebar-none', 'img' => 'images/layout-icons/sidebar-none.png', 'title' => __('No Sidebar', 'themify'))
	);
	/**
	 * Image alignment options
	 * @var array
	 */
	$alignment_options = array(
		array('name' => '', 'value' => ''),
		array('name' => __('Left', 'themify'), 'value' => 'left'),
		array('name' => __('Right', 'themify'), 'value' => 'right')
	);
	/**
	 * Entry media position, above or below the title
	 */
	$media_position = array(
		array('name'=>__('Above Post Title', 'themify'), 'value'=>'above'),
		array('name'=>__('Below Post Title', 'themify'), 'value'=>'below'),
	);

	/**
	 * Module markup
	 * @var string
	 */
	$output = '<div class="themify-info-link">' . __( 'Here you can set the <a href="https://themify.me/docs/default-layouts">Default Layouts</a> for WordPress archive post layout (category, search, archive, tag pages, etc.), single post layout (single post page), and the static Page layout. The default single post and page layout can be override individually on the post/page > edit > Themify Custom Panel.', 'themify' ) . '</div>';
	
	/**
	 * Index Sidebar Option
	 */
	$output .= '<p>
					<span class="label">' . __('Archive Sidebar Option', 'themify') . '</span>';
	$val = themify_get( $prefix.'layout' );
	foreach ( $sidebar_location_options as $option ) {
		if ( ( '' == $val || ! $val || ! isset( $val ) ) && ( isset( $option['selected'] ) && $option['selected'] ) ) {
			$val = $option['value'];
		}
		if ( $val == $option['value'] ) {
			$class = 'selected';
		} else {
			$class = '';
		}
		$output .= '<a href="#" class="preview-icon ' . esc_attr( $class ) . '" title="' . esc_attr( $option['title'] ) . '"><img src="' . esc_url( THEME_URI.'/'.$option['img'] ) . '" alt="' . esc_attr( $option['value'] ) . '"  /></a>';
	}
	
	$output .= '	<input type="hidden" name="' . esc_attr( $prefix ) . 'layout" class="val" value="' . esc_attr( $val ) . '" />
				</p>';

	/**
	 * Post Layout
	 */
	$output .= '<p>
					<span class="label">' . __('Post Layout', 'themify') . '</span>';
	$val = themify_get( $prefix.'post_layout' );
	foreach ( $default_post_layout_options as $option ) {
		if ( ( '' == $val || ! $val || ! isset( $val ) ) && ( isset( $option['selected'] ) && $option['selected'] ) ) {
			$val = $option['value'];
		}
		if ( $val == $option['value'] ) {
			$class = 'selected';
		} else {
			$class = '';
		}
		$output .= '<a href="#" class="preview-icon ' . esc_attr( $class ) . '" title="' . esc_attr( $option['title'] ) . '"><img src="' . esc_url( THEME_URI.'/'.$option['img'] ) . '" alt="' . esc_attr( $option['value'] ) . '"  /></a>';
	}
	
	$output .= '	<input type="hidden" name="' . esc_attr( $prefix ) . 'post_layout" class="val" value="' . esc_attr( $val ) . '" />
				</p>';

	/**
	 * Enable Masonry
	 */
	$output .=	'<p>
					<span class="label">' . __('Post Masonry', 'themify') . '</span>
					<select name="setting-disable_masonry">' .
						themify_options_module($binary_options, 'setting-disable_masonry') . '
					</select>
				</p>';

	/**
	 * Display Content
	 */
	$output .= '<p>
					<span class="label">' . __('Display Content', 'themify') . '</span> 
					<select name="'.$prefix.'layout_display">'.
						themify_options_module($default_display_options, $prefix.'layout_display').'
					</select>
				</p>';
	
	/**
	 * More Text
	 */
	$output .= '<p>
					<span class="label">' . __('More Text', 'themify') . '</span>
					<input type="text" name="'.$prefix.'more_text" value="'.$more_text.'">
				</p>';

	/**
	 * Display more link in excerpt mode
	 */
	$output .= '<span class="pushlabel vertical-grouped"><label for="setting-excerpt_more"><input type="checkbox" value="1" id="setting-excerpt_more" name="setting-excerpt_more" '.checked(themify_get( 'setting-excerpt_more' ), 1, false).'/> ' . __('Display more link button in excerpt mode as well.', 'themify') . '</label></span>';

	/**
	 * Order & OrderBy Options
	 */
	$output .= themify_post_sorting_options('setting-index_order', $data);
				
	/**
	 * Hide Post Title
	 */
	$output .= '<p>
					<span class="label">' . __('Hide Post Title', 'themify') . '</span>
					<select name="'.$prefix.'post_title">' .
						themify_options_module($default_options, $prefix.'post_title') . '
					</select>
				</p>';
	
	/**
	 * Unlink Post Title
	 */
	$output .= '<p>
					<span class="label">' . __('Unlink Post Title', 'themify') . '</span>
					<select name="'.$prefix.'unlink_post_title">' .
						themify_options_module($default_options, $prefix.'unlink_post_title') . '
					</select>
				</p>';
	
	/**
	 * Hide Post Meta
	 */
	$output .= themify_post_meta_options($prefix.'post_meta', $data);
	
	/**
	 * Hide Post Date
	 */
	$output .= '<p>
					<span class="label">' . __('Hide Post Date', 'themify') . '</span>
					<select name="'.$prefix.'post_date">' .
						themify_options_module($default_options, $prefix.'post_date') . '
					</select>
				</p>';
	
	/**
	 * Auto Featured Image
	 */
	$output .= '<p>
					<span class="label">' . __('Auto Featured Image', 'themify') . '</span>
					<label for="setting-auto_featured_image"><input type="checkbox" value="1" id="setting-auto_featured_image" name="setting-auto_featured_image" '.checked( themify_get( 'setting-auto_featured_image' ), 1, false).'/> ' . __('If no featured image is specified, display first image in content.', 'themify') . '</label>
				</p>';
	
	/**
	 * Featured Image/Media Position
	 */
	$output .= '<p>
					<span class="label">' . __( 'Featured Image/Media Position', 'themify' ) . '</span>
					<select name="' . $prefix . 'media_position">' .
						themify_options_module( $media_position, $prefix.'media_position' ) . '
					</select>
				</p>';
	
	/**
	 * Hide Featured Image
	 */
	$output .= '<p>
					<span class="label">' . __('Hide Featured Image', 'themify') . '</span>
					<select name="'.$prefix.'post_image">' .
						themify_options_module($default_options, $prefix.'post_image') . '
					</select>
				</p>';
	
	/**
	 * Unlink Featured Image
	 */
	$output .= '<p>
					<span class="label">' . __('Unlink Featured Image', 'themify') . '</span>
					<select name="'.$prefix.'unlink_post_image">' .
						themify_options_module($default_options, $prefix.'unlink_post_image') . '
					</select>
				</p>';
	
	/**
	 * Featured Image Sizes
	 */
	$output .= themify_feature_image_sizes_select('image_post_feature_size');
	
	/**
	 * Image Dimensions
	 */	
	$output .= '<p>
					<span class="label">' . __('Image Size', 'themify') . '</span>  
					<input type="text" class="width2" name="setting-image_post_width" value="'.themify_get( 'setting-image_post_width' ).'" /> ' . __('width', 'themify') . ' <small>(px)</small>
					<input type="text" class="width2" name="setting-image_post_height" value="'.themify_get( 'setting-image_post_height' ).'" /> ' . __('height', 'themify') . ' <small>(px)</small>
					<br /><span class="pushlabel show_if_enabled_img_php"><small>' . __('Enter height = 0 to disable vertical cropping with img.php enabled', 'themify') . '</small></span>
				</p>';
	
	return $output;
}