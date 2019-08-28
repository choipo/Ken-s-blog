<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'DotLife_Templates_Manager' ) ) {

	/**
	 * Define DotLife_Templates_Manager class
	 */
	class DotLife_Templates_Manager {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * Template option name
		 * @var string
		 */
		protected $option = 'dotlife_templates';

		/**
		 * Constructor for the class
		 */
		public function init() {
			add_action( 'elementor/init', array( $this, 'register_templates_source' ) );
			
			if ( defined( 'Elementor\Api::LIBRARY_OPTION_KEY' ) ) {
				// Add JetImpex templates to Elementor templates list
				add_filter( 'option_' . Elementor\Api::LIBRARY_OPTION_KEY, array( $this, 'prepend_categories' ) );
			}
			
			// Process template request
			if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '2.2.8', '>' ) ) {
				add_action( 'elementor/ajax/register_actions', array( $this, 'register_ajax_actions' ), 20 );
			} else {
				add_action( 'wp_ajax_elementor_get_template_data', array( $this, 'force_dotlife_template_source' ), 0 );
			}
		}
		
		/**
		 * Register
		 *
		 * @return [type] [description]
		 */
		public function register_templates_source() {
			$is_verified_envato_purchase_code = false;

			//Get verified purchase code data
			$pp_verified_envato_dotlife = get_option("pp_verified_envato_dotlife");
			if(!empty($pp_verified_envato_dotlife))
			{
				$is_verified_envato_purchase_code = true;
			}
			
			if($is_verified_envato_purchase_code)
			{
				/*if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '2.4.7', '>' ) ) {
					require DOTLIFE_ELEMENTOR_PATH.'/templates_source_v_2_5.php';
				}
				else
				{
					require DOTLIFE_ELEMENTOR_PATH.'/templates_source.php';
				}*/
				require DOTLIFE_ELEMENTOR_PATH.'/templates_source.php';
				
				$elementor = Elementor\Plugin::instance();
				$elementor->templates_manager->register_source( 'DotLife_Templates_Source' );
			}
		}
		
		/**
		 * Register AJAX actions
		 *
		 * @param $ajax
		 */
		public function register_ajax_actions( $ajax ) {
			if ( ! isset( $_REQUEST['actions'] ) ) {
				return;
			}

			$actions = json_decode( stripslashes( $_REQUEST['actions'] ), true );
			$data    = false;

			foreach ( $actions as $id => $action_data ) {
				if ( ! isset( $action_data['get_template_data'] ) ) {
					$data = $action_data;
				}
			}

			if ( ! $data ) {
				return;
			}

			if ( ! isset( $data['data'] ) ) {
				return;
			}

			$data = $data['data'];

			if ( empty( $data['template_id'] ) ) {
				return;
			}

			if ( false === strpos( $data['template_id'], 'dotlife_' ) ) {
				return;
			}

			$ajax->register_ajax_action( 'get_template_data', array( $this, 'get_dotlife_template_data' ) );
		}

		/**
		 * Get dotlife template data.
		 *
		 * @param $args
		 *
		 * @return mixed
		 */
		public function get_dotlife_template_data( $args ) {

			$source = Elementor\Plugin::instance()->templates_manager->get_source( 'dotlife-templates' );

			$data = $source->get_data( $args );

			return $data;
		}

		/**
		 * Return template data insted of elementor template.
		 *
		 * @return [type] [description]
		 */
		public function force_dotlife_template_source() {

			if ( empty( $_REQUEST['template_id'] ) ) {
				return;
			}

			if ( false === strpos( $_REQUEST['template_id'], 'dotlife_' ) ) {
				return;
			}

			$_REQUEST['source'] = 'dotlife-templates';

		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		/**
		 * Add templates to Elementor templates list
		 *
		 * @param  [type] $templates [description]
		 * @return [type]            [description]
		 */
		public function prepend_categories( $library_data ) {

			$categories = array('theme navigation menu', 'theme footer');

			if ( ! empty( $categories ) ) {

				if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '2.3.9', '>' ) ) {
					$library_data['types_data']['block']['categories'] = array_merge( $categories, $library_data['types_data']['block']['categories'] );
				} else {
					$library_data['categories'] = array_merge( $categories, $library_data['categories'] );
				}

				return $library_data;

			} else {
				return $library_data;
			}

		}
	}

}

/**
 * Returns instance of DotLife_Templates_Manager
 *
 * @return object
 */
function dotlife_templates_manager() {
	return DotLife_Templates_Manager::get_instance();
}
