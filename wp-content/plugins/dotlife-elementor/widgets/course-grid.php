<?php
namespace DotLifeElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Portfolio Classic
 *
 * Elementor widget for portfolio posts
 *
 * @since 1.0.0
 */
class DotLife_Course_Grid extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dotlife-course-grid';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Course Grid', 'dotlife-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'dotlife-theme-widgets-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'imagesloaded', 'dotlife-elementor' ];
	}
	
	/**
	 * Retrieve course categories
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Course categories
	 */
	public function get_course_categories() {
		//Get all categories
		$categories_arr = get_terms('course_category', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
		$tg_categories_select = array();
		
		foreach ($categories_arr as $cat) {
			$tg_categories_select[$cat->term_id] = $cat->name;
		}

		return $tg_categories_select;
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'dotlife-elementor' ),
			]
		);
		
		$this->add_control(
			'course_category',
			[
				'label' => __( 'Categories', 'dotlife-elementor' ),
				'type' => Controls_Manager::SELECT2,
			    'options' => $this->get_course_categories(),
			    'multiple' => true,
			]
		);
		
		$this->add_control(
			'sort_by',
			[
				'label' => __( 'Sort By', 'dotlife-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
			    'options' => [
				    'default' => __( 'Default', 'dotlife-elementor' ),
				    'published' => __( 'Published Date', 'dotlife-elementor' ),
			     	'title' => __( 'Title', 'dotlife-elementor' ),
			     	'price_low' => __( 'Price (Low to High)', 'dotlife-elementor' ),
			     	'price_high' => __( 'Price (High to Low)', 'dotlife-elementor' ),
			    ],
			]
		);

		$this->add_control(
		    'posts_per_page',
		    [
		        'label' => __( 'Posts Per Page', 'dotlife-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 6,
		        ],
		        'range' => [
		            'px' => [
		                'min' => -1,
		                'max' => 100,
		                'step' => 1,
		            ]
		        ],
		    ]
		);
		
		$this->add_control(
		    'columns',
		    [
		        'label' => __( 'Columns', 'dotlife-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 3,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 2,
		                'max' => 4,
		                'step' => 1,
		            ]
		        ],
		    ]
		);
		
		$this->add_control(
			'spacing',
			[
				'label' => __( 'Column Spacing', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'dotlife-elementor' ),
				'label_off' => __( 'No', 'dotlife-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Show Pagination', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'dotlife-elementor' ),
				'label_off' => __( 'No', 'dotlife-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_search',
			[
				'label' => __( 'Show Search Bar', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'dotlife-elementor' ),
				'label_off' => __( 'No', 'dotlife-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_meta',
			[
				'label' => __( 'Meta Data', 'dotlife-elementor' ),
			]
		);
		
		$this->add_control(
		    'image_height',
		    [
		        'label' => __( 'Image Height', 'dotlife-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 235,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 400,
		                'step' => 5,
		            ]
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__img' => 'height: {{SIZE}}{{UNIT}}',
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__img--hover' => 'height: {{SIZE}}{{UNIT}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'price_top',
		    [
		        'label' => __( 'Price Top Position', 'dotlife-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 200,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 400,
		                'step' => 5,
		            ]
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__price' => 'top: {{SIZE}}{{UNIT}}',
		        ],
		    ]
		);
		
		$this->add_control(
			'show_date',
			[
				'label' => __( 'Show Date', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'dotlife-elementor' ),
				'label_off' => __( 'No', 'dotlife-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
		    'excerpt_length',
		    [
		        'label' => __( 'Excerpt Length', 'dotlife-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 90,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 300,
		                'step' => 1,
		            ]
		        ],
		    ]
		);
		
		$this->add_control(
			'show_lesson',
			[
				'label' => __( 'Show Lesson', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'dotlife-elementor' ),
				'label_off' => __( 'No', 'dotlife-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_student',
			[
				'label' => __( 'Show Student Number', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'dotlife-elementor' ),
				'label_off' => __( 'No', 'dotlife-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_price',
			[
				'label' => __( 'Show Price', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'dotlife-elementor' ),
				'label_off' => __( 'No', 'dotlife-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_title_style',
			array(
				'label'      => esc_html__( 'Title', 'dotlife-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'title_color',
		    [
		        'label' => __( 'Title Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__title a' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'dotlife-elementor' ),
				'selector' => '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__title',
			]
		);
		
		$this->add_control(
		    'content_bg_color',
		    [
		        'label' => __( 'Content Background Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__info' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
			'title_text_align',
			[
				'label' => __( 'Alignment', 'dotlife-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'dotlife-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'dotlife-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'dotlife-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
		            '{{WRAPPER}} div.course_grid_container .portfolio_classic_grid_wrapper' => 'text-align: {{VALUE}}',
		        ],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_date_style',
			array(
				'label'      => esc_html__( 'Date', 'dotlife-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'date_color',
		    [
		        'label' => __( 'Date Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#999999',
		        'selectors' => [
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__info .card__date' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'label' => __( 'Date Typography', 'dotlife-elementor' ),
				'selector' => '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__info span.card__date',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_excerpt_style',
			array(
				'label'      => esc_html__( 'Excerpt', 'dotlife-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'excerpt_color',
		    [
		        'label' => __( 'Excerpt Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__info .card__excerpt' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => __( 'Excerpt Typography', 'dotlife-elementor' ),
				'selector' => '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__info .card__excerpt p',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_meta_style',
			array(
				'label'      => esc_html__( 'Meta Data', 'dotlife-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'meta_color',
		    [
		        'label' => __( 'Meta Data Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__info .card__meta' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => __( 'Meta Data Typography', 'dotlife-elementor' ),
				'selector' => '{{WRAPPER}} .course_grid_container .portfolio_classic_grid_wrapper .card__info div.card__meta',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_search_style',
			array(
				'label'      => esc_html__( 'Search Bar', 'dotlife-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'text_field_bg_color',
		    [
		        'label' => __( 'Text Field Background Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} form[name="search-course"] .search-course-input' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'text_field_border_color',
		    [
		        'label' => __( 'Text Field Border Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#D7D8D6',
		        'selectors' => [
		            '{{WRAPPER}} form[name="search-course"] .search-course-input' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'text_field_text_color',
		    [
		        'label' => __( 'Text Field Text Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} form[name="search-course"] .search-course-input' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'text_field_focus_border_color',
		    [
		        'label' => __( 'Text Field Focus Border Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0067DA',
		        'selectors' => [
		            '{{WRAPPER}} form[name="search-course"] .search-course-input::focus' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_bg_color',
		    [
		        'label' => __( 'Button Background Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0067DA',
		        'selectors' => [
		            '{{WRAPPER}} form.learn-press-search-course-form .lp-button' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_border_color',
		    [
		        'label' => __( 'Button Border Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0067DA',
		        'selectors' => [
		            '{{WRAPPER}} form.learn-press-search-course-form .lp-button' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_text_color',
		    [
		        'label' => __( 'Button Text Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} form.learn-press-search-course-form .lp-button' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_hover_bg_color',
		    [
		        'label' => __( 'Button Hover Background Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => 'rgba(256,256,256,0)',
		        'selectors' => [
		            '{{WRAPPER}} form.learn-press-search-course-form .lp-button:hover' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_hover_border_color',
		    [
		        'label' => __( 'Button Hover Border Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0067DA',
		        'selectors' => [
		            '{{WRAPPER}} form.learn-press-search-course-form .lp-button:hover' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_hover_text_color',
		    [
		        'label' => __( 'Button Hover Text Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0067DA',
		        'selectors' => [
		            '{{WRAPPER}} form.learn-press-search-course-form .lp-button:hover' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->end_controls_section();
	}
	

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		include(DOTLIFE_ELEMENTOR_PATH.'templates/course-grid/index.php');
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		return '';
	}
}
