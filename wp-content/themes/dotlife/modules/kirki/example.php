<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'kirki_demo_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Kirki Demo Panel', 'dotlife' ),
		'description' => esc_attr__( 'Contains sections for all kirki controls.', 'dotlife' ),
	)
);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'background'      => array( esc_attr__( 'Background', 'dotlife' ), '' ),
	'code'            => array( esc_attr__( 'Code', 'dotlife' ), '' ),
	'checkbox'        => array( esc_attr__( 'Checkbox', 'dotlife' ), '' ),
	'color'           => array( esc_attr__( 'Color', 'dotlife' ), '' ),
	'color-palette'   => array( esc_attr__( 'Color Palette', 'dotlife' ), '' ),
	'custom'          => array( esc_attr__( 'Custom', 'dotlife' ), '' ),
	'dashicons'       => array( esc_attr__( 'Dashicons', 'dotlife' ), '' ),
	'date'            => array( esc_attr__( 'Date', 'dotlife' ), '' ),
	'dimension'       => array( esc_attr__( 'Dimension', 'dotlife' ), '' ),
	'dimensions'      => array( esc_attr__( 'Dimensions', 'dotlife' ), '' ),
	'editor'          => array( esc_attr__( 'Editor', 'dotlife' ), '' ),
	'fontawesome'     => array( esc_attr__( 'Font-Awesome', 'dotlife' ), '' ),
	'generic'         => array( esc_attr__( 'Generic', 'dotlife' ), '' ),
	'image'           => array( esc_attr__( 'Image', 'dotlife' ), '' ),
	'multicheck'      => array( esc_attr__( 'Multicheck', 'dotlife' ), '' ),
	'multicolor'      => array( esc_attr__( 'Multicolor', 'dotlife' ), '' ),
	'number'          => array( esc_attr__( 'Number', 'dotlife' ), '' ),
	'palette'         => array( esc_attr__( 'Palette', 'dotlife' ), '' ),
	'preset'          => array( esc_attr__( 'Preset', 'dotlife' ), '' ),
	'radio'           => array( esc_attr__( 'Radio', 'dotlife' ), esc_attr__( 'A plain Radio control.', 'dotlife' ) ),
	'radio-buttonset' => array( esc_attr__( 'Radio Buttonset', 'dotlife' ), esc_attr__( 'Radio-Buttonset controls are essentially radio controls with some fancy styling to make them look cooler.', 'dotlife' ) ),
	'radio-image'     => array( esc_attr__( 'Radio Image', 'dotlife' ), esc_attr__( 'Radio-Image controls are essentially radio controls with some fancy styles to use images', 'dotlife' ) ),
	'repeater'        => array( esc_attr__( 'Repeater', 'dotlife' ), '' ),
	'select'          => array( esc_attr__( 'Select', 'dotlife' ), '' ),
	'slider'          => array( esc_attr__( 'Slider', 'dotlife' ), '' ),
	'sortable'        => array( esc_attr__( 'Sortable', 'dotlife' ), '' ),
	'switch'          => array( esc_attr__( 'Switch', 'dotlife' ), '' ),
	'toggle'          => array( esc_attr__( 'Toggle', 'dotlife' ), '' ),
	'typography'      => array( esc_attr__( 'Typography', 'dotlife' ), '', 'outer' ),
);
foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'kirki_demo_panel',
	);
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}

/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}

/**
 * Background Control.
 *
 * @todo Triggers change on load.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'background',
		'settings'    => 'background_setting',
		'label'       => esc_attr__( 'Background Control', 'dotlife' ),
		'description' => esc_attr__( 'Background conrols are pretty complex! (but useful if properly used)', 'dotlife' ),
		'section'     => 'background_section',
		'default'     => array(
			'background-color'      => 'rgba(20,20,20,.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
	)
);

/**
 * Code control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/code.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'code',
		'settings'    => 'code_setting',
		'label'       => esc_attr__( 'Code Control', 'dotlife' ),
		'description' => esc_attr__( 'Description', 'dotlife' ),
		'section'     => 'code_section',
		'default'     => '',
		'choices'     => array(
			'language' => 'css',
		),
	)
);

/**
 * Checkbox control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/checkbox.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'checkbox_setting',
		'label'       => esc_attr__( 'Checkbox Control', 'dotlife' ),
		'description' => esc_attr__( 'Description', 'dotlife' ),
		'section'     => 'checkbox_section',
		'default'     => true,
	)
);

/**
 * Color Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_hex',
		'label'       => __( 'Color Control (hex-only)', 'dotlife' ),
		'description' => esc_attr__( 'This is a color control - without alpha channel.', 'dotlife' ),
		'section'     => 'color_section',
		'default'     => '#0008DC',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_rgba',
		'label'       => __( 'Color Control (with alpha channel)', 'dotlife' ),
		'description' => esc_attr__( 'This is a color control - with alpha channel.', 'dotlife' ),
		'section'     => 'color_section',
		'default'     => '#0088CC',
		'choices'     => array(
			'alpha' => true,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'color_setting_hue',
		'label'       => __( 'Color Control - hue only.', 'dotlife' ),
		'description' => esc_attr__( 'This is a color control - hue only.', 'dotlife' ),
		'section'     => 'color_section',
		'default'     => 160,
		'mode'        => 'hue',
	)
);

/**
 * DateTime Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'date',
		'settings'    => 'date_setting',
		'label'       => esc_attr__( 'Date Control', 'dotlife' ),
		'description' => esc_attr__( 'This is a date control.', 'dotlife' ),
		'section'     => 'date_section',
		'default'     => '',
	)
);

/**
 * Editor Controls
 */
my_config_kirki_add_field(
	array(
		'type'        => 'editor',
		'settings'    => 'editor_1',
		'label'       => esc_attr__( 'First Editor Control', 'dotlife' ),
		'description' => esc_attr__( 'This is an editor control.', 'dotlife' ),
		'section'     => 'editor_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'editor',
		'settings'    => 'editor_2',
		'label'       => esc_attr__( 'Second Editor Control', 'dotlife' ),
		'description' => esc_attr__( 'This is a 2nd editor control just to check that we do not have issues with multiple instances.', 'dotlife' ),
		'section'     => 'editor_section',
		'default'     => esc_attr__( 'Default Text', 'dotlife' ),
	)
);

/**
 * Color-Palette Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color-palette.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_0',
		'label'       => esc_attr__( 'Color-Palette', 'dotlife' ),
		'description' => esc_attr__( 'This is a color-palette control', 'dotlife' ),
		'section'     => 'color_palette_section',
		'default'     => '#888888',
		'choices'     => array(
			'colors' => array( '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ),
			'style'  => 'round',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_4',
		'label'       => esc_attr__( 'Color-Palette', 'dotlife' ),
		'description' => esc_attr__( 'Material Design Colors - all', 'dotlife' ),
		'section'     => 'color_palette_section',
		'default'     => '#F44336',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'all' ),
			'size'   => 17,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_1',
		'label'       => esc_attr__( 'Color-Palette', 'dotlife' ),
		'description' => esc_attr__( 'Material Design Colors - primary', 'dotlife' ),
		'section'     => 'color_palette_section',
		'default'     => '#000000',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'primary' ),
			'size'   => 25,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_2',
		'label'       => esc_attr__( 'Color-Palette', 'dotlife' ),
		'description' => esc_attr__( 'Material Design Colors - red', 'dotlife' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF1744',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'red' ),
			'size'   => 16,
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_3',
		'label'       => esc_attr__( 'Color-Palette', 'dotlife' ),
		'description' => esc_attr__( 'Material Design Colors - A100', 'dotlife' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF80AB',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'A100' ),
			'size'   => 60,
			'style'  => 'round',
		),
	)
);

/**
 * Dashicons control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/dashicons.html
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_0',
		'label'       => esc_attr__( 'Dashicons Control', 'dotlife' ),
		'description' => esc_attr__( 'Using a custom array of dashicons', 'dotlife' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
		'choices'     => array(
			'menu',
			'admin-site',
			'dashboard',
			'admin-post',
			'admin-media',
			'admin-links',
			'admin-page',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_1',
		'label'       => esc_attr__( 'All Dashicons', 'dotlife' ),
		'description' => esc_attr__( 'Showing all dashicons', 'dotlife' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
	)
);

/**
 * Dimension Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dimension',
		'settings'    => 'dimension_0',
		'label'       => esc_attr__( 'Dimension Control', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'dimension_section',
		'default'     => '10px',
	)
);

/**
 * Dimensions Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'dimensions_0',
		'label'       => esc_attr__( 'Dimension Control', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'dimensions_section',
		'default'     => array(
			'width'  => '100px',
			'height' => '100px',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'dimensions_1',
		'label'       => esc_attr__( 'Dimension Control', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'dimensions_section',
		'default'     => array(
			'padding-top'    => '1em',
			'padding-bottom' => '10rem',
			'padding-left'   => '1vh',
			'padding-right'  => '10px',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'spacing',
		'settings'    => 'spacing_0',
		'label'       => esc_attr__( 'Spacing Control', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'dimensions_section',
		'default'     => array(
			'top'    => '1em',
			'bottom' => '10rem',
			'left'   => '1vh',
			'right'  => '10px',
		),
	)
);

/**
 * Font-Awesome Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'fontawesome',
		'settings'    => 'fontawesome_setting',
		'label'       => esc_attr__( 'Font Awesome Control', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'fontawesome_section',
		'default'     => 'bath',
	)
);

/**
 * Generic Controls.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'generic_text_setting',
		'label'       => esc_attr__( 'Text Control', 'dotlife' ),
		'description' => esc_attr__( 'Description', 'dotlife' ),
		'section'     => 'generic_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'textarea',
		'settings'    => 'generic_textarea_setting',
		'label'       => esc_attr__( 'Textarea Control', 'dotlife' ),
		'description' => esc_attr__( 'Description', 'dotlife' ),
		'section'     => 'generic_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'generic',
		'settings'    => 'generic_custom_setting',
		'label'       => esc_attr__( 'Custom input Control.', 'dotlife' ),
		'description' => esc_attr__( 'The "generic" control allows you to add any input type you want. In this case we use type="password" and define custom styles.', 'dotlife' ),
		'section'     => 'generic_section',
		'default'     => '',
		'choices'     => array(
			'element'  => 'input',
			'type'     => 'password',
			'style'    => 'background-color:black;color:red;',
			'data-foo' => 'bar',
		),
	)
);

/**
 * Image Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_url',
		'label'       => esc_attr__( 'Image Control (URL)', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'image_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_id',
		'label'       => esc_attr__( 'Image Control (ID)', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_array',
		'label'       => esc_attr__( 'Image Control (array)', 'dotlife' ),
		'description' => esc_attr__( 'Description Here.', 'dotlife' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => array(
			'save_as' => 'array',
		),
	)
);

/**
 * Multicheck Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'multicheck',
		'settings'    => 'multicheck_setting',
		'label'       => esc_attr__( 'Multickeck Control', 'dotlife' ),
		'section'     => 'multicheck_section',
		'default'     => array( 'option-1', 'option-3', 'option-4' ),
		'priority'    => 10,
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'dotlife' ),
			'option-2' => esc_attr__( 'Option 2', 'dotlife' ),
			'option-3' => esc_attr__( 'Option 3', 'dotlife' ),
			'option-4' => esc_attr__( 'Option 4', 'dotlife' ),
			'option-5' => esc_attr__( 'Option 5', 'dotlife' ),
		),
	)
);

/**
 * Multicolor Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'multicolor',
		'settings'    => 'multicolor_setting',
		'label'       => esc_attr__( 'Label', 'dotlife' ),
		'section'     => 'multicolor_section',
		'priority'    => 10,
		'choices'     => array(
			'link'    => esc_attr__( 'Color', 'dotlife' ),
			'hover'   => esc_attr__( 'Hover', 'dotlife' ),
			'active'  => esc_attr__( 'Active', 'dotlife' ),
		),
		'alpha'       => true,
		'default'     => array(
			'link'    => '#0088cc',
			'hover'   => '#00aaff',
			'active'  => '#00ffff',
		),
	)
);

/**
 * Number Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'number',
		'settings'    => 'number_setting',
		'label'       => esc_attr__( 'Label', 'dotlife' ),
		'section'     => 'number_section',
		'priority'    => 10,
		'choices'     => array(
			'min'  => -5,
			'max'  => 5,
			'step' => 1,
		),
	)
);

/**
 * Palette Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'palette',
		'settings'    => 'palette_setting',
		'label'       => esc_attr__( 'Label', 'dotlife' ),
		'section'     => 'palette_section',
		'default'     => 'blue',
		'choices'     => array(
			'a200'  => Kirki_Helper::get_material_design_colors( 'A200' ),
			'blue'  => Kirki_Helper::get_material_design_colors( 'blue' ),
			'green' => array( '#E8F5E9', '#C8E6C9', '#A5D6A7', '#81C784', '#66BB6A', '#4CAF50', '#43A047', '#388E3C', '#2E7D32', '#1B5E20', '#B9F6CA', '#69F0AE', '#00E676', '#00C853' ),
			'bnw'   => array( '#000000', '#ffffff' ),
		),
	)
);

/**
 * Radio Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio',
		'settings'    => 'radio_setting',
		'label'       => esc_attr__( 'Radio Control', 'dotlife' ),
		'description' => esc_attr__( 'The description here.', 'dotlife' ),
		'section'     => 'radio_section',
		'default'     => 'option-3',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'dotlife' ),
			'option-2' => esc_attr__( 'Option 2', 'dotlife' ),
			'option-3' => esc_attr__( 'Option 3', 'dotlife' ),
			'option-4' => esc_attr__( 'Option 4', 'dotlife' ),
			'option-5' => esc_attr__( 'Option 5', 'dotlife' ),
		),
	)
);

/**
 * Radio-Buttonset Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'radio_buttonset_setting',
		'label'       => esc_attr__( 'Radio-Buttonset Control', 'dotlife' ),
		'description' => esc_attr__( 'The description here.', 'dotlife' ),
		'section'     => 'radio_buttonset_section',
		'default'     => 'option-2',
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'dotlife' ),
			'option-2' => esc_attr__( 'Option 2', 'dotlife' ),
			'option-3' => esc_attr__( 'Option 3', 'dotlife' ),
		),
	)
);

/**
 * Radio-Image Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'radio-image',
		'settings'    => 'radio_image_setting',
		'label'       => esc_attr__( 'Radio-Image Control', 'dotlife' ),
		'description' => esc_attr__( 'The description here.', 'dotlife' ),
		'section'     => 'radio_image_section',
		'default'     => 'travel',
		'choices'     => array(
			'moto'    => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-moto.png',
			'cossack' => 'https://raw.githubusercontent.com/templatemonster/cossack-wapuula/master/cossack-wapuula.png',
			'travel'  => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-travel.png',
		),
	)
);

/**
 * Repeater Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'repeater',
		'settings'    => 'repeater_setting',
		'label'       => esc_attr__( 'Repeater Control', 'dotlife' ),
		'description' => esc_attr__( 'The description here.', 'dotlife' ),
		'section'     => 'repeater_section',
		'default'     => array(
			array(
				'link_text'   => esc_attr__( 'Kirki Site', 'dotlife' ),
				'link_url'    => 'https://aristath.github.io/kirki/',
				'link_target' => '_self',
				'checkbox'    => false,
			),
			array(
				'link_text'   => esc_attr__( 'Kirki Repository', 'dotlife' ),
				'link_url'    => 'https://github.com/aristath/kirki',
				'link_target' => '_self',
				'checkbox'    => false,
			),
		),
		'fields' => array(
			'link_text' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Link Text', 'dotlife' ),
				'description' => esc_attr__( 'This will be the label for your link', 'dotlife' ),
				'default'     => '',
			),
			'link_url' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Link URL', 'dotlife' ),
				'description' => esc_attr__( 'This will be the link URL', 'dotlife' ),
				'default'     => '',
			),
			'link_target' => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'Link Target', 'dotlife' ),
				'description' => esc_attr__( 'This will be the link target', 'dotlife' ),
				'default'     => '_self',
				'choices'     => array(
					'_blank'  => esc_attr__( 'New Window', 'dotlife' ),
					'_self'   => esc_attr__( 'Same Frame', 'dotlife' ),
				),
			),
			'checkbox' => array(
				'type'			=> 'checkbox',
				'label'			=> esc_attr__( 'Checkbox', 'dotlife' ),
				'default'		=> false,
			),
		),
	)
);

/**
 * Select Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'select',
		'settings'    => 'select_setting',
		'label'       => esc_attr__( 'Select Control', 'dotlife' ),
		'description' => esc_attr__( 'The description here.', 'dotlife' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'placeholder' => esc_attr__( 'Select an option', 'dotlife' ),
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'dotlife' ),
			'option-2' => esc_attr__( 'Option 2', 'dotlife' ),
			'option-3' => esc_attr__( 'Option 3', 'dotlife' ),
			'option-4' => esc_attr__( 'Option 4', 'dotlife' ),
			'option-5' => esc_attr__( 'Option 5', 'dotlife' ),
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'select',
		'settings'    => 'select_setting_multiple',
		'label'       => esc_attr__( 'Select Control', 'dotlife' ),
		'description' => esc_attr__( 'The description here.', 'dotlife' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'multiple'    => 3,
		'choices'     => array(
			'option-1' => esc_attr__( 'Option 1', 'dotlife' ),
			'option-2' => esc_attr__( 'Option 2', 'dotlife' ),
			'option-3' => esc_attr__( 'Option 3', 'dotlife' ),
			'option-4' => esc_attr__( 'Option 4', 'dotlife' ),
			'option-5' => esc_attr__( 'Option 5', 'dotlife' ),
		),
	)
);

/**
 * Slider Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'slider',
		'settings'    => 'slider_setting',
		'label'       => esc_attr__( 'Slider Control', 'dotlife' ),
		'description' => esc_attr__( 'The description here.', 'dotlife' ),
		'section'     => 'slider_section',
		'default'     => '10',
		'choices'     => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
			'suffix' => 'px',
		),
	)
);

/**
 * Sortable control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'sortable',
		'settings'    => 'sortable_setting',
		'label'       => __( 'This is a sortable control.', 'dotlife' ),
		'section'     => 'sortable_section',
		'default'     => array( 'option3', 'option1', 'option4' ),
		'choices'     => array(
			'option1' => esc_attr__( 'Option 1', 'dotlife' ),
			'option2' => esc_attr__( 'Option 2', 'dotlife' ),
			'option3' => esc_attr__( 'Option 3', 'dotlife' ),
			'option4' => esc_attr__( 'Option 4', 'dotlife' ),
			'option5' => esc_attr__( 'Option 5', 'dotlife' ),
			'option6' => esc_attr__( 'Option 6', 'dotlife' ),
		),
	)
);

/**
 * Switch control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_setting',
		'label'       => esc_attr__( 'Switch Control', 'dotlife' ),
		'description' => esc_attr__( 'Description', 'dotlife' ),
		'section'     => 'switch_section',
		'default'     => true,
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_setting_custom_label',
		'label'       => esc_attr__( 'Switch Control with custom labels', 'dotlife' ),
		'description' => esc_attr__( 'Description', 'dotlife' ),
		'section'     => 'switch_section',
		'default'     => true,
		'choices'     => array(
			'on'  => esc_attr__( 'Enabled', 'dotlife' ),
			'off' => esc_attr__( 'Disabled', 'dotlife' ),
		),
		'active_callback'    => array(
			array(
				'setting'  => 'switch_setting',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Toggle control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'toggle',
		'settings'    => 'toggle_setting',
		'label'       => esc_attr__( 'Toggle Control', 'dotlife' ),
		'description' => esc_attr__( 'Description', 'dotlife' ),
		'section'     => 'toggle_section',
		'default'     => true,
	)
);

/**
 * Typography Control.
 */
my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'typography_setting_0',
		'label'       => esc_attr__( 'Typography Control Label', 'dotlife' ),
		'description' => esc_attr__( 'The full set of options.', 'dotlife' ),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => array(
			'font-family'     => 'Roboto',
			'variant'         => 'regular',
			'font-size'       => '14px',
			'line-height'     => '1.5',
			'letter-spacing'  => '0',
			'subsets'         => array( 'latin-ext' ),
			'color'           => '#333333',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
			'text-align'      => 'left',
			'margin-top'      => '0',
			'margin-bottom'   => '0',
		),
		'output'      => array(
			array(
				'element' => 'body, p',
			),
		),
		'choices' => array(
			'fonts' => array(
				'google' => array( 'popularity', 60 ),
			),
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'typography_setting_1',
		'label'       => esc_attr__( 'Typography Control Label', 'dotlife' ),
		'description' => esc_attr__( 'The full set of options.', 'dotlife' ),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => array(
			'font-family'     => 'Roboto',
		),
		'output'      => array(
			array(
				'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
			),
		),
	)
);

function kirki_sidebars_select_example() {
	$sidebars = array();
	if ( isset( $GLOBALS['wp_registered_sidebars'] ) ) {
		$sidebars = $GLOBALS['wp_registered_sidebars'];
	}
	$sidebars_choices = array();
	foreach ( $sidebars as $sidebar ) {
		$sidebars_choices[ $sidebar['id'] ] = $sidebar['name'];
	}
	if ( ! class_exists( 'Kirki' ) ) {
		return;
	}
	Kirki::add_field( 'kirki_demo', array(
		'type'        => 'select',
		'settings'    => 'sidebars_select',
		'label'       => esc_attr__( 'Sidebars Select', 'dotlife' ),
		'description' => esc_attr__( 'An example of how to implement sidebars selection.', 'dotlife' ),
		'section'     => 'select_section',
		'default'     => 'primary',
		'choices'     => $sidebars_choices,
		'priority'    => 30,
	) );
}
add_action( 'init', 'kirki_sidebars_select_example', 999 );