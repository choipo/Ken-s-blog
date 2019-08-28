<?php
namespace DotLifeElementor;

use DotLifeElementor\Widgets\DotLife_Navigation_Menu;
use DotLifeElementor\Widgets\DotLife_Blog_Posts;
use DotLifeElementor\Widgets\DotLife_Gallery_Grid;
use DotLifeElementor\Widgets\DotLife_Gallery_Masonry;
use DotLifeElementor\Widgets\DotLife_Gallery_Justified;
use DotLifeElementor\Widgets\DotLife_Gallery_Horizontal;
use DotLifeElementor\Widgets\DotLife_Gallery_Fullscreen;
use DotLifeElementor\Widgets\DotLife_Gallery_Preview;
use DotLifeElementor\Widgets\DotLife_Album_Grid;
use DotLifeElementor\Widgets\DotLife_Distortion_Grid;
use DotLifeElementor\Widgets\DotLife_Slider_Vertical_Parallax;
use DotLifeElementor\Widgets\DotLife_Slider_Horizontal;
use DotLifeElementor\Widgets\DotLife_Slider_Animated_Frame;
use DotLifeElementor\Widgets\DotLife_Slider_Room;
use DotLifeElementor\Widgets\DotLife_Slider_Multi_Layouts;
use DotLifeElementor\Widgets\DotLife_Slider_Velo;
use DotLifeElementor\Widgets\DotLife_Slider_Split_Carousel;
use DotLifeElementor\Widgets\DotLife_Slider_Popout;
use DotLifeElementor\Widgets\DotLife_Slider_Clip_Path;
use DotLifeElementor\Widgets\DotLife_Slider_Split_Slick;
use DotLifeElementor\Widgets\DotLife_Slider_Transitions;
use DotLifeElementor\Widgets\DotLife_Slider_Property_Clip;
use DotLifeElementor\Widgets\DotLife_Slider_Slice;
use DotLifeElementor\Widgets\DotLife_Slider_Flip;
use DotLifeElementor\Widgets\DotLife_Slider_Parallax;
use DotLifeElementor\Widgets\DotLife_Slider_Animated;
use DotLifeElementor\Widgets\DotLife_Slider_Fade_UP;
use DotLifeElementor\Widgets\DotLife_Slider_Motion_Reveal;
use DotLifeElementor\Widgets\DotLife_Slider_Image_Carousel;
use DotLifeElementor\Widgets\DotLife_Slider_Synchronized_Carousel;
use DotLifeElementor\Widgets\DotLife_Slider_Zoom;
use DotLifeElementor\Widgets\DotLife_Mouse_Drive_Vertical_Carousel;
use DotLifeElementor\Widgets\DotLife_Slider_Glitch_Slideshow;
use DotLifeElementor\Widgets\DotLife_Horizontal_Timeline;
use DotLifeElementor\Widgets\DotLife_Portfolio_Classic;
use DotLifeElementor\Widgets\DotLife_Portfolio_Grid;
use DotLifeElementor\Widgets\DotLife_Portfolio_Masonry;
use DotLifeElementor\Widgets\DotLife_Portfolio_Timeline;
use DotLifeElementor\Widgets\DotLife_Portfolio_Timeline_Vertical;
use DotLifeElementor\Widgets\DotLife_Portfolio_Coverflow;
use DotLifeElementor\Widgets\DotLife_Background_List;
use DotLifeElementor\Widgets\DotLife_Testimonial_Card;
use DotLifeElementor\Widgets\DotLife_Video_Grid;
use DotLifeElementor\Widgets\DotLife_Course_Grid;
use DotLifeElementor\Widgets\DotLife_Music_Player;
use DotLifeElementor\Widgets\DotLife_Flip_Box;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class DotLife_Elementor {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
		
		add_action( 'init', array( $this, 'init' ), -999 );
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/init', [ $this, 'on_elementor_init' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

		//Enqueue javascript files
		add_action( 'elementor/frontend/after_register_scripts', function() {
			
			//Check if enable lazy load image
			wp_enqueue_script('masonry');
			wp_enqueue_script('lazy', plugins_url( '/dotlife-elementor/assets/js/jquery.lazy.js' ), array(), false, true );	
			wp_enqueue_script('modulobox', plugins_url( '/dotlife-elementor/assets/js/modulobox.js' ), array(), false, true );
			
			//Registered scripts
			wp_register_script('lodash', plugins_url( '/dotlife-elementor/assets/js/lodash.core.min.js' ), array(), false, true );
			wp_register_script('anime', plugins_url( '/dotlife-elementor/assets/js/anime.min.js' ), array(), false, true );
			wp_register_script('hover', plugins_url( '/dotlife-elementor/assets/js/hover.js' ), array(), false, true );
			wp_register_script('three', plugins_url( '/dotlife-elementor/assets/js/three.min.js' ), array(), false, true );
			wp_register_script('mls', plugins_url( '/dotlife-elementor/assets/js/mls.js' ), array(), false, true );
			wp_register_script('velocity', plugins_url( '/dotlife-elementor/assets/js/velocity.js' ), array(), false, true );
			wp_register_script('velocity-ui', plugins_url( '/dotlife-elementor/assets/js/velocity.ui.js' ), array(), false, true );
			wp_register_script('slick', plugins_url( '/dotlife-elementor/assets/js/slick.min.js' ), array(), false, true );
			wp_register_script('mousewheel', plugins_url( '/dotlife-elementor/assets/js/jquery.mousewheel.min.js' ), array(), false, true );
			wp_register_script('tweenmax', plugins_url( '/dotlife-elementor/assets/js/tweenmax.min.js' ), array(), false, true );
			wp_register_script('flickity', plugins_url( '/dotlife-elementor/assets/js/flickity.pkgd.js' ), array(), false, true );
			wp_register_script('tilt', plugins_url( '/dotlife-elementor/assets/js/tilt.jquery.js' ), array(), false, true );
			wp_register_script('dotlife-album-tilt', plugins_url( '/dotlife-elementor/assets/js/album-tilt.js' ), array(), false, true );
			wp_register_script('justifiedGallery', plugins_url( '/dotlife-elementor/assets/js/justifiedGallery.js' ), array(), false, true );
			wp_register_script('sticky-kit', plugins_url( '/dotlife-elementor/assets/js/jquery.sticky-kit.min.js' ), array(), false, true );
			wp_register_script('touchSwipe', plugins_url( '/dotlife-elementor/assets/js/jquery.touchSwipe.js' ), array(), false, true );
			wp_register_script('momentum-slider', plugins_url( '/dotlife-elementor/assets/js/momentum-slider.js' ), array(), false, true );
			wp_register_script('dotlife-elementor', plugins_url( '/dotlife-elementor/assets/js/dotlife-elementor.js' ), array('sticky-kit'), false, true );
			
			$params = array(
			  'ajaxurl' => esc_url(admin_url('admin-ajax.php')),
			  'ajax_nonce' => wp_create_nonce('dotlife-post-contact-nonce'),
			);
			
			wp_localize_script("dotlife-elementor", 'tgAjax', $params );
		} );
		
		//Enqueue CSS style files
		add_action( 'elementor/frontend/after_enqueue_styles', function() {
			wp_enqueue_style('modulobox', plugins_url( '/dotlife-elementor/assets/css/modulobox.css' ), false, false, 'all' );
			wp_enqueue_style('swiper', plugins_url( '/dotlife-elementor/assets/css/swiper.css' ), false, false, 'all' );
			wp_enqueue_style('justifiedGallery', plugins_url( '/dotlife-elementor/assets/css/justifiedGallery.css' ), false, false, 'all' );
			wp_enqueue_style('flickity', plugins_url( '/dotlife-elementor/assets/css/flickity.css' ), false, false, 'all' );
			wp_enqueue_style('dotlife-elementor', plugins_url( '/dotlife-elementor/assets/css/dotlife-elementor.css' ), false, false, 'all' );
			wp_enqueue_style('dotlife-elementor-responsive', plugins_url( '/dotlife-elementor/assets/css/dotlife-elementor-responsive.css' ), false, false, 'all' );
		});
	}
	
	/**
	 * Manually init required modules.
	 *
	 * @return void
	 */
	public function init() {

		dotlife_templates_manager()->init();

	}
	
	/**
	 * On Elementor Init
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_elementor_init() {
		$this->register_category();
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/navigation-menu.php';
		require __DIR__ . '/widgets/blog-posts.php';
		require __DIR__ . '/widgets/gallery-grid.php';
		require __DIR__ . '/widgets/gallery-masonry.php';
		require __DIR__ . '/widgets/gallery-justified.php';
		require __DIR__ . '/widgets/gallery-fullscreen.php';
		require __DIR__ . '/widgets/gallery-horizontal.php';
		require __DIR__ . '/widgets/gallery-preview.php';
		require __DIR__ . '/widgets/album-grid.php';
		require __DIR__ . '/widgets/distortion-grid.php';
		require __DIR__ . '/widgets/slider-vertical-parallax.php';
		require __DIR__ . '/widgets/slider-horizontal.php';
		require __DIR__ . '/widgets/slider-animated-frame.php';
		require __DIR__ . '/widgets/slider-room.php';
		require __DIR__ . '/widgets/slider-multi-layouts.php';
		require __DIR__ . '/widgets/slider-velo.php';
		require __DIR__ . '/widgets/slider-split-carousel.php';
		require __DIR__ . '/widgets/mouse-driven-vertical-carousel.php';
		require __DIR__ . '/widgets/slider-popout.php';
		require __DIR__ . '/widgets/slider-clip-path.php';
		require __DIR__ . '/widgets/slider-split-slick.php';
		require __DIR__ . '/widgets/slider-transitions.php';
		require __DIR__ . '/widgets/slider-property-clip.php';
		require __DIR__ . '/widgets/slider-slice.php';
		require __DIR__ . '/widgets/slider-flip.php';
		require __DIR__ . '/widgets/slider-parallax.php';
		require __DIR__ . '/widgets/slider-animated.php';
		require __DIR__ . '/widgets/slider-fade-up.php';
		require __DIR__ . '/widgets/slider-motion-reveal.php';
		require __DIR__ . '/widgets/slider-image-carousel.php';
		require __DIR__ . '/widgets/slider-synchronized-carousel.php';
		require __DIR__ . '/widgets/slider-glitch-slideshow.php';
		require __DIR__ . '/widgets/slider-zoom.php';
		require __DIR__ . '/widgets/horizontal-timeline.php';
		require __DIR__ . '/widgets/portfolio-classic.php';
		require __DIR__ . '/widgets/portfolio-grid.php';
		require __DIR__ . '/widgets/portfolio-masonry.php';
		require __DIR__ . '/widgets/portfolio-timeline.php';
		require __DIR__ . '/widgets/portfolio-timeline-vertical.php';
		require __DIR__ . '/widgets/portfolio-coverflow.php';
		require __DIR__ . '/widgets/background-list.php';
		require __DIR__ . '/widgets/testimonial-card.php';
		require __DIR__ . '/widgets/video-grid.php';
		require __DIR__ . '/widgets/course-grid.php';
		require __DIR__ . '/widgets/music-player.php';
		require __DIR__ . '/widgets/flip-box.php';
	}
	
	/**
	 * Register Category
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_category() {
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'dotlife-theme-widgets-category-fullscreen',
			array(
				'title' => 'Theme Fullscreen Elements',
				'icon'  => 'fonts',
			),
			1
		);
		
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'dotlife-theme-widgets-category',
			array(
				'title' => 'Theme General Elements',
				'icon'  => 'fonts',
			),
			2
		);
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Navigation_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Blog_Posts() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Gallery_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Gallery_Masonry() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Gallery_Justified() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Gallery_Fullscreen() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Gallery_Preview() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Gallery_Horizontal() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Album_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Distortion_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Vertical_Parallax() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Horizontal() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Animated_Frame() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Room() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Multi_Layouts() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Velo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Split_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Mouse_Drive_Vertical_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Popout() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Clip_Path() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Split_Slick() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Transitions() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Property_Clip() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Slice() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Flip() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Parallax() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Animated() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Motion_Reveal() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Fade_UP() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Image_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Synchronized_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Glitch_Slideshow() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Slider_Zoom() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Horizontal_Timeline() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Portfolio_Classic() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Portfolio_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Portfolio_Masonry() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Portfolio_Timeline() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Portfolio_Timeline_Vertical() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Portfolio_Coverflow() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Background_list() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Testimonial_Card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Video_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Course_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Music_Player() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new DotLife_Flip_Box() );
	}
}

new DotLife_Elementor();
