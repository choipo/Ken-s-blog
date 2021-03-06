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
class DotLife_Portfolio_Masonry extends Widget_Base {

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
		return 'dotlife-portfolio-masonry';
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
		return __( 'Portfolio Masonry', 'dotlife-elementor' );
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
		return 'eicon-posts-masonry';
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
			'slides',
			[
				'label' => __( 'Slides', 'dotlife-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'slide_image',
						'label' => __( 'Image', 'dotlife-elementor' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
					],
					[
						'name' => 'slide_title',
						'label' => __( 'Title', 'dotlife-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Title' , 'dotlife-elementor' ),
					],
					[
						'name' => 'slide_subtitle',
						'label' => __( 'Sub Title', 'dotlife-elementor' ),
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'slide_link',
						'label' => __( 'Link URL', 'dotlife-elementor' ),
						'type' => Controls_Manager::URL,
						'default' => [
					        'url' => '',
					        'is_external' => '',
					     ],
						'show_external' => true,
					],
					[
						'name' => 'slide_tag',
						'label' => __( 'Tag', 'dotlife-elementor' ),
						'description' => __( 'Enter tag for this item for filterable option (optional)', 'dotlife-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => '',
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);

		$this->add_control(
		    'columns',
		    [
		        'label' => __( 'Columns', 'dotlife-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 2,
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
			'filterable',
			[
				'label' => __( 'Filterable', 'dotlife-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
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
		    'content_bg_color',
		    [
		        'label' => __( 'Content Background Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio_masonry_grid_wrapper figcaption' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'content_border_hover_color',
		    [
		        'label' => __( 'Content Border Hover Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio_masonry_grid_wrapper .border:before' => 'background-color: {{VALUE}}',
		            '{{WRAPPER}} .portfolio_masonry_grid_wrapper .border:after' => 'background-color: {{VALUE}}',
		            '{{WRAPPER}} .portfolio_masonry_grid_wrapper .border div:before' => 'background-color: {{VALUE}}',
		            '{{WRAPPER}} .portfolio_masonry_grid_wrapper .border div:after' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'title_color',
		    [
		        'label' => __( 'Title Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio_masonry_grid_wrapper h3' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'dotlife-elementor' ),
				'selector' => '{{WRAPPER}} div.portfolio_masonry_grid_wrapper h3',
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
		            '{{WRAPPER}} div.portfolio_masonry_grid_wrapper' => 'text-align: {{VALUE}}',
		        ],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_subtitle_style',
			array(
				'label'      => esc_html__( 'Sub Title', 'dotlife-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'subtitle_color',
		    [
		        'label' => __( 'Sub Title Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#B8B8B8',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio_masonry_subtitle' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Sub Title Typography', 'dotlife-elementor' ),
				'selector' => '{{WRAPPER}} .portfolio_masonry_content .portfolio_masonry_subtitle',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_filterable_style',
			array(
				'label'      => esc_html__( 'Filterable', 'dotlife-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
			'filterable_text_align',
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
		            '{{WRAPPER}} .portfolio_filter_wrapper' => 'text-align: {{VALUE}}',
		        ],
			]
		);
		
		$this->add_control(
		    'filterable_color',
		    [
		        'label' => __( 'Filterable Title Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#666666',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio_filter_wrapper a.filter_tag_btn' => 'color: {{VALUE}}',
		            '{{WRAPPER}} div.elementor-widget-container .portfolio_filter_wrapper a.filter_tag_btn' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'filterable_hover_color',
		    [
		        'label' => __( 'Filterable Title Hover Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio_filter_wrapper a.filter_tag_btn:hover' => 'color: {{VALUE}}',
		            '{{WRAPPER}} div.portfolio_filter_wrapper a.filter_tag_btn:hover' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'filterable_active_color',
		    [
		        'label' => __( 'Filterable Title Active Color', 'dotlife-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} div.portfolio_filter_wrapper a.filter_tag_btn.active' => 'border-color: {{VALUE}}',
		            '{{WRAPPER}} .portfolio_filter_wrapper .filter_tag_btn.active' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'filterable_typography',
				'label' => __( 'Filterable Title Typography', 'dotlife-elementor' ),
				'selector' => '{{WRAPPER}} div.portfolio_filter_wrapper a.filter_tag_btn',
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
		include(DOTLIFE_ELEMENTOR_PATH.'templates/portfolio-masonry/index.php');
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
