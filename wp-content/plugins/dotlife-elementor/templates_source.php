<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DotLife_Templates_Source extends Elementor\TemplateLibrary\Source_Base {

	/**
	 * Template prefix
	 *
	 * @var string
	 */
	protected $template_prefix = 'dotlife_';

	/**
	 * Return JetImpex templates prefix
	 *
	 * @return [type] [description]
	 */
	public function get_prefix() {
		return $this->template_prefix;
	}

	public function get_id() {
		return 'dotlife-templates';
	}

	public function get_title() {
		return __( 'DotLife Templates', 'dotlife-elementor' );
	}

	public function register_data() {}

	public function get_items( $args = array() ) {
		
		$templates = array();

		$templates_data = array(
			1 	=> array(
				'template_id'      	=> $this->template_prefix .'1',
				'source'            => $this->get_id(),
				'title'             => 'Home 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_1.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/',
			),
			2 	=> array(
				'template_id'      	=> $this->template_prefix .'2',
				'source'            => $this->get_id(),
				'title'             => 'Home 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_2.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/lawyer/',
			),
			3	=> array(
				'template_id'      	=> $this->template_prefix .'3',
				'source'            => $this->get_id(),
				'title'             => 'Home 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_3.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/contractor/',
			),
			4	=> array(
				'template_id'      	=> $this->template_prefix .'4',
				'source'            => $this->get_id(),
				'title'             => 'Home 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_4.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/healthcare/',
			),
			5	=> array(
				'template_id'      	=> $this->template_prefix .'5',
				'source'            => $this->get_id(),
				'title'             => 'Home 5',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_5.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/life-coach/',
			),
			6	=> array(
				'template_id'      	=> $this->template_prefix .'6',
				'source'            => $this->get_id(),
				'title'             => 'Home 6',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_6.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/yoga/',
			),
			7	=> array(
				'template_id'      	=> $this->template_prefix .'7',
				'source'            => $this->get_id(),
				'title'             => 'Home 7',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_7.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/fitness-trainer/',
			),
			8	=> array(
				'template_id'      	=> $this->template_prefix .'8',
				'source'            => $this->get_id(),
				'title'             => 'Home 8',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_8.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/barber/',
			),
			9	=> array(
				'template_id'      	=> $this->template_prefix .'9',
				'source'            => $this->get_id(),
				'title'             => 'Home 9',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_9.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/bed-and-breakfast-hotel/',
			),
			10	=> array(
				'template_id'      	=> $this->template_prefix .'10',
				'source'            => $this->get_id(),
				'title'             => 'Home 10',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_10.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/restaurant/',
			),
			11	=> array(
				'template_id'      	=> $this->template_prefix .'11',
				'source'            => $this->get_id(),
				'title'             => 'Home 11',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_11.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/tourism/',
			),
			12	=> array(
				'template_id'      	=> $this->template_prefix .'12',
				'source'            => $this->get_id(),
				'title'             => 'Home 12',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_12.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/limousine/',
			),
			13	=> array(
				'template_id'      	=> $this->template_prefix .'13',
				'source'            => $this->get_id(),
				'title'             => 'Home 13',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_13.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/technician/',
			),
			14	=> array(
				'template_id'      	=> $this->template_prefix .'14',
				'source'            => $this->get_id(),
				'title'             => 'Home 14',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_14.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/financial-advisor/',
			),
			15	=> array(
				'template_id'      	=> $this->template_prefix .'15',
				'source'            => $this->get_id(),
				'title'             => 'Home 15',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_15.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/medical/',
			),
			16	=> array(
				'template_id'      	=> $this->template_prefix .'16',
				'source'            => $this->get_id(),
				'title'             => 'About 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_16.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/about-1/',
			),
			17	=> array(
				'template_id'      	=> $this->template_prefix .'17',
				'source'            => $this->get_id(),
				'title'             => 'About 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_17.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/about-2/',
			),
			18	=> array(
				'template_id'      	=> $this->template_prefix .'18',
				'source'            => $this->get_id(),
				'title'             => 'About 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_18.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/about-3/',
			),
			19	=> array(
				'template_id'      	=> $this->template_prefix .'19',
				'source'            => $this->get_id(),
				'title'             => 'About 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_19.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/about-4/',
			),
			20	=> array(
				'template_id'      	=> $this->template_prefix .'20',
				'source'            => $this->get_id(),
				'title'             => 'About 5',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_20.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/about-5/',
			),
			21	=> array(
				'template_id'      	=> $this->template_prefix .'21',
				'source'            => $this->get_id(),
				'title'             => 'Service 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_21.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/service-1/',
			),
			22	=> array(
				'template_id'      	=> $this->template_prefix .'22',
				'source'            => $this->get_id(),
				'title'             => 'Service 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_22.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/service-2/',
			),
			23	=> array(
				'template_id'      	=> $this->template_prefix .'23',
				'source'            => $this->get_id(),
				'title'             => 'Service 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_23.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/service-3/',
			),
			24	=> array(
				'template_id'      	=> $this->template_prefix .'24',
				'source'            => $this->get_id(),
				'title'             => 'Service 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_24.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/service-4/',
			),
			25	=> array(
				'template_id'      	=> $this->template_prefix .'25',
				'source'            => $this->get_id(),
				'title'             => 'Service 5',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_25.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/service-5/',
			),
			26	=> array(
				'template_id'      	=> $this->template_prefix .'26',
				'source'            => $this->get_id(),
				'title'             => 'Pricing 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_26.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('pricing'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/pricing-1/',
			),
			27	=> array(
				'template_id'      	=> $this->template_prefix .'27',
				'source'            => $this->get_id(),
				'title'             => 'Pricing 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_27.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('pricing'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/pricing-2/',
			),
			28	=> array(
				'template_id'      	=> $this->template_prefix .'28',
				'source'            => $this->get_id(),
				'title'             => 'Our Process',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_28.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('process'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/our-process/',
			),
			29	=> array(
				'template_id'      	=> $this->template_prefix .'29',
				'source'            => $this->get_id(),
				'title'             => 'Contact 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_29.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('contact'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/contact-1/',
			),
			30	=> array(
				'template_id'      	=> $this->template_prefix .'30',
				'source'            => $this->get_id(),
				'title'             => 'Contact 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_30.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('contact'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/contact-2/',
			),
			31	=> array(
				'template_id'      	=> $this->template_prefix .'31',
				'source'            => $this->get_id(),
				'title'             => 'Contact 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_31.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('contact'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/contact-3/',
			),
			32	=> array(
				'template_id'      	=> $this->template_prefix .'32',
				'source'            => $this->get_id(),
				'title'             => 'Team 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_32.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('team'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/team-1/',
			),
			33	=> array(
				'template_id'      	=> $this->template_prefix .'33',
				'source'            => $this->get_id(),
				'title'             => 'Team 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_33.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('team'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/team-2/',
			),
			34	=> array(
				'template_id'      	=> $this->template_prefix .'34',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Classic',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_34.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-classic/',
			),
			35	=> array(
				'template_id'      	=> $this->template_prefix .'35',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_35.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-grid/',
			),
			36	=> array(
				'template_id'      	=> $this->template_prefix .'36',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Masonry',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_36.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-masonry/',
			),
			37	=> array(
				'template_id'      	=> $this->template_prefix .'37',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Timeline Horizon',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_37.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-timeline-horizon/',
			),
			38	=> array(
				'template_id'      	=> $this->template_prefix .'38',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Timeline Vertical',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_38.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-timeline-vertical/',
			),
			39	=> array(
				'template_id'      	=> $this->template_prefix .'39',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Slider Horizon',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_39.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-slider-horizon/',
			),
			40	=> array(
				'template_id'      	=> $this->template_prefix .'40',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Slice Slider',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_40.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-slice-slider/',
			),
			41	=> array(
				'template_id'      	=> $this->template_prefix .'41',
				'source'            => $this->get_id(),
				'title'             => 'Portfolio Coverflow',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_41.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/portfolio-coverflow/',
			),
			42	=> array(
				'template_id'      	=> $this->template_prefix .'42',
				'source'            => $this->get_id(),
				'title'             => 'Single Portfolio',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_42.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/single-portfolio/',
			),
			43	=> array(
				'template_id'      	=> $this->template_prefix .'43',
				'source'            => $this->get_id(),
				'title'             => 'Gallery Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_43.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('gallery'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/gallery-grid/',
			),
			44	=> array(
				'template_id'      	=> $this->template_prefix .'44',
				'source'            => $this->get_id(),
				'title'             => 'Gallery Masonry',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_44.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('gallery'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/gallery-masonry/',
			),
			45	=> array(
				'template_id'      	=> $this->template_prefix .'45',
				'source'            => $this->get_id(),
				'title'             => 'Gallery Justified',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_45.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('gallery'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/gallery-justified/',
			),
			46	=> array(
				'template_id'      	=> $this->template_prefix .'46',
				'source'            => $this->get_id(),
				'title'             => 'Gallery Preview',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_46.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('gallery'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/gallery-preview/',
			),
			47	=> array(
				'template_id'      	=> $this->template_prefix .'47',
				'source'            => $this->get_id(),
				'title'             => 'Gallery Fullscreen',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_47.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('gallery'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/gallery-fullscreen/',
			),
			48	=> array(
				'template_id'      	=> $this->template_prefix .'48',
				'source'            => $this->get_id(),
				'title'             => 'Gallery Horizontal',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_48.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('gallery'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/gallery-horizontal/',
			),
			49	=> array(
				'template_id'      	=> $this->template_prefix .'49',
				'source'            => $this->get_id(),
				'title'             => 'Video Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_49.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('video'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/video-grid/',
			),
			50	=> array(
				'template_id'      	=> $this->template_prefix .'50',
				'source'            => $this->get_id(),
				'title'             => 'Blog Grid No Space',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_50.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-grid-no-space/',
			),
			51	=> array(
				'template_id'      	=> $this->template_prefix .'51',
				'source'            => $this->get_id(),
				'title'             => 'Blog Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_51.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-grid/',
			),
			52	=> array(
				'template_id'      	=> $this->template_prefix .'52',
				'source'            => $this->get_id(),
				'title'             => 'Blog Masonry',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_52.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-masonry/',
			),
			53	=> array(
				'template_id'      	=> $this->template_prefix .'53',
				'source'            => $this->get_id(),
				'title'             => 'Blog Metro No Space',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_53.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-metro-no-space/',
			),
			54	=> array(
				'template_id'      	=> $this->template_prefix .'54',
				'source'            => $this->get_id(),
				'title'             => 'Blog Metro',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_54.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-metro/',
			),
			55	=> array(
				'template_id'      	=> $this->template_prefix .'55',
				'source'            => $this->get_id(),
				'title'             => 'Blog Classic',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_55.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-classic/',
			),
			56	=> array(
				'template_id'      	=> $this->template_prefix .'56',
				'source'            => $this->get_id(),
				'title'             => 'Blog List',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_56.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-list/',
			),
			57	=> array(
				'template_id'      	=> $this->template_prefix .'57',
				'source'            => $this->get_id(),
				'title'             => 'Blog List Circle',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_57.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog-list-circle/',
			),
						
			//Adding navigation menu block templates
			501 => array(
				'template_id'      	=> $this->template_prefix .'501',
				'source'            => $this->get_id(),
				'title'             => 'Header 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_501.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog/header/header-layout-1/',
			),
			502 => array(
				'template_id'      	=> $this->template_prefix .'502',
				'source'            => $this->get_id(),
				'title'             => 'Header 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_502.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog/header/header-layout-2/',
			),
			503 => array(
				'template_id'      	=> $this->template_prefix .'503',
				'source'            => $this->get_id(),
				'title'             => 'Header 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_503.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/blog/header/header-layout-3/',
			),
			504 => array(
				'template_id'      	=> $this->template_prefix .'504',
				'source'            => $this->get_id(),
				'title'             => 'Header 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_504.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/lawyer/header/default-header/',
			),
			505 => array(
				'template_id'      	=> $this->template_prefix .'505',
				'source'            => $this->get_id(),
				'title'             => 'Header 5',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_505.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/barber/header/default-header/',
			),
			//Adding footer block templates
			701 => array(
				'template_id'      	=> $this->template_prefix .'701',
				'source'            => $this->get_id(),
				'title'             => 'Footer',
				'thumbnail'         => 'http://assets.themegoods.com/demo/dotlife/templates/screenshots/dotlife_701.png',
				'date'      		=> date( get_option( 'date_format' ), 1550821224 ),
				'type'				=> 'block',
				'subtype'			=> 'theme footer',
				'author'            => 'ThemeGoods',

				'keywords'          => array('footer'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/dotlife/demo/barber/footer/default-footer/',
			),
		);
		
		if ( ! empty( $templates_data ) ) {
			foreach ( $templates_data as $template_data ) 
			{
				$templates_data['popularityIndex'] = 260;
				$templates_data['trendIndex'] = 125;
				
				$templates[] = $this->get_item( $template_data );
			}
		}

		if ( ! empty( $args ) ) {
			$templates = wp_list_filter( $templates, $args );
		}
		
		return $templates;
	}
	
	public function get_item( $template_data ) {
		return array(
			'template_id'     => $template_data['template_id'],
			'source'          => 'remote',
			'type'            => $template_data['type'],
			'subtype'         => $template_data['subtype'],
			'title'           => $template_data['title'],
			'thumbnail'       => $template_data['thumbnail'],
			'date'            => $template_data['date'],
			'author'          => $template_data['author'],
			'tags'            => $template_data['tags'],
			'isPro'           => ( 1 == $template_data['isPro'] ),
			'popularityIndex' => (int) $template_data['popularityIndex'],
			'trendIndex'      => (int) $template_data['trendIndex'],
			'hasPageSettings' => ( 1 == $template_data['hasPageSettings'] ),
			'url'             => $template_data['url'],
			'favorite'        => ( 1 == $template_data['favorite'] ),
		);
	}

	public function save_item( $template_data ) {
		return false;
	}

	public function update_item( $new_data ) {
		return false;
	}

	public function delete_template( $template_id ) {
		return false;
	}

	public function export_template( $template_id ) {
		return false;
	}

	public function get_data( array $args, $context = 'display' ) {
		$url	  = 'http://assets.themegoods.com/demo/dotlife/templates/json/'.$args['template_id'].'.json';
		$response = wp_remote_get( $url, array( 'timeout' => 60 ) );
		$body     = wp_remote_retrieve_body( $response );
		$body     = json_decode( $body, true );
		$data     = ! empty( $body['content'] ) ? $body['content'] : false;
		
		$result = array();

		$result['content']       = $this->replace_elements_ids($data);
		$result['content']       = $this->process_export_import_content( $result['content'], 'on_import' );
		$result['page_settings'] = array();

		return $result;
	}
}
