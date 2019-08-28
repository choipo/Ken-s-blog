<?php

$is_verified_envato_purchase_code = false;

//Get verified purchase code data
$pp_verified_envato_dotlife = get_option("pp_verified_envato_dotlife");
if(!empty($pp_verified_envato_dotlife))
{
	$is_verified_envato_purchase_code = true;
}

if($is_verified_envato_purchase_code)
{
	function dotlife_import_files() {
	  return array(
	    array(
	      'import_file_name'             => 'Demo 1',
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'data/demos/demo1/demo.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'data/demos/demo1/demo.json',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'data/demos/demo1/demo.dat',
	      'preview_url'                  => 'https://themes.themegoods.com/dotlife/demo/',
	    ),
	  );
	}
	add_filter( 'pt-ocdi/import_files', 'dotlife_import_files' );
	
	function dotlife_menu_page_removing() {
	    remove_submenu_page( 'themes.php', 'tg-one-click-demo-import' );
	}
	add_action( 'admin_menu', 'dotlife_menu_page_removing', 99 );
	
	function dotlife_confirmation_dialog_options ( $options ) {
		return array_merge( $options, array(
			'width'       => 300,
			'dialogClass' => 'wp-dialog',
			'resizable'   => false,
			'height'      => 'auto',
			'modal'       => true,
		) );
	}
	add_filter( 'pt-ocdi/confirmation_dialog_options', 'dotlife_confirmation_dialog_options', 10, 1 );
	
	function dotlife_after_import( $selected_import ) {
		switch($selected_import['import_file_name'])
		{
			case 'Demo 1':
				// Assign menus to their locations.
				$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
				$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
			
				set_theme_mod( 'nav_menu_locations', array(
						'primary-menu' => $main_menu->term_id,
						'side-menu' => $main_menu->term_id,
						'footer-menu' => $footer_menu->term_id,
					)
				);
				
			break;
			
			default:
				wp_delete_nav_menu('Main Menu');
			break;
		}
		
		// Assign front page
		$front_page_id = get_page_by_title( 'Home 1' );
		
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		
		// 'Hello World!' post
	    wp_delete_post( 1, true );
	
	    // 'Sample page' page
	    wp_delete_post( 2, true );
		
		//Setup theme custom font
		remove_theme_mod('tg_custom_fonts');
		
		$default_custom_fonts = array(
			0 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-300-Light.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 300,
				'font_style' => 'normal',
			),
			1 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-400-Book.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 400,
				'font_style' => 'normal',
			),
			2 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-500-Medium.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 700,
				'font_style' => 'normal',
			),
			3 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-700-Bold.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 900,
				'font_style' => 'normal',
			)
		);
		set_theme_mod( 'tg_custom_fonts', $default_custom_fonts );
	}
	add_action( 'pt-ocdi/after_import', 'dotlife_after_import' );
	
	function dotlife_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = 'themes.php';
		$default_settings['page_title']  = esc_html__( 'Demo Import' , 'dotlife' );
		$default_settings['menu_title']  = esc_html__( 'Import Demo Content' , 'dotlife' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'tg-one-click-demo-import';
	
		return $default_settings;
	}
	add_filter( 'pt-ocdi/plugin_page_setup', 'dotlife_plugin_page_setup' );
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
}

//Disable Elementor getting started
add_action( 'admin_init', function() {
	if ( did_action( 'elementor/loaded' ) ) {
		remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
	}
}, 1 );

/*add_filter( 'zm_alr_login_redirect_url', 'dotlife_zm_alr_login_redirect_url', 16, 3 );
function dotlife_zm_alr_login_redirect_url() {
	if ( validate_username(sanitize_user($_POST['zm_alr_login_user_name'])) ){
		if ( username_exists(sanitize_user($_POST['zm_alr_login_user_name'])) ){
			$user = get_user_by( 'login', sanitize_user($_POST['zm_alr_login_user_name']) );
			
			if ( wp_check_password( $_POST['zm_alr_login_password'], $user->data->user_pass, $user->ID ) )
			{
				$user_homepage = get_the_author_meta( 'user_homepage', $user->ID );
				$user_loggedin_url = get_permalink($user_homepage);
				
			    return $user_loggedin_url;
			}
		}
	}
}*/
	
add_filter( 'the_password_form', 'dotlife_password_form' );
function dotlife_password_form() {
    $post = dotlife_get_wp_post();
    
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    
    $return_html = '<div class="protected-post-header"><h1>' . esc_html($post->post_title) . '</h1></div>';
    $return_html.= '<form class="protected-post-form" action="' .wp_login_url(). '?action=postpass" method="post">';
    $return_html.= '<div class="protected-post-text">'.esc_html__( "This content is password protected. To view it please enter your password below:", 'dotlife'  ).'</div><input name="post_password" id="' . $label . '" type="password" size="40" />';
    
    $return_html.= '<input type="submit" name="Submit" class="button" value="' . esc_html__( "Authenticate", 'dotlife' ) . '" />';
    $return_html.= '</form>';
    
    return $return_html;
}
	
if ( ! function_exists( 'dotlife_theme_kirki_update_url' ) ) {
    function dotlife_theme_kirki_update_url( $config ) {
        $config['url_path'] = get_template_directory_uri() . '/modules/kirki/';
        return $config;
    }
}
add_filter( 'kirki/config', 'dotlife_theme_kirki_update_url' );

add_action( 'customize_register', function( $wp_customize ) {
	/**
	 * The custom control class
	 */
	class Kirki_Controls_Title_Control extends Kirki_Control_Base {
		public $type = 'title';
		public function render_content() { 
			echo esc_html($this->label);
		}
	}
	// Register our custom control with Kirki
	add_filter( 'kirki/control_types', function( $controls ) {
		$controls['title'] = 'Kirki_Controls_Title_Control';
		return $controls;
	} );

} );

add_action( 'admin_footer', 'dotlife_welcome_dashboard_widget' );
function dotlife_welcome_dashboard_widget() {
 // Bail if not viewing the main dashboard page
 if ( get_current_screen()->base !== 'dashboard' ) {
  return;
 }
 ?>

 <div id="dotlife-welcome-id" class="welcome-panel" style="display: none;">
  <div class="welcome-panel-content">
	  <div style="height:10px"></div>
   <h2>Welcome to <?php echo esc_html(DOTLIFE_THEMENAME); ?> Theme</h2>
   <p class="about-description">Welcome to <?php echo esc_html(DOTLIFE_THEMENAME); ?> theme. <?php echo esc_html(DOTLIFE_THEMENAME); ?> is now installed and ready to use! Read below for additional informations. We hope you enjoy using the theme!</p>
   
   <br style="clear:both;"/>
   
<?php

$is_verified_envato_purchase_code = false;

//Get verified purchase code data
$pp_verified_envato_dotlife = get_option("pp_verified_envato_dotlife");
if(!empty($pp_verified_envato_dotlife))
{
	$is_verified_envato_purchase_code = true;
}

if(!$is_verified_envato_purchase_code)
{
?>
	<div style="height:20px"></div>
	
	<div class="tg_notice">
			<span class="dashicons dashicons-warning" style="color:#FF3B30"></span> 
			Please visit <a href="<?php echo admin_url("themes.php?page=functions.php#pp_panel_registration"); ?>">Product Registration page</a> and enter a valid Envato Token to import the full <?php echo DOTLIFE_THEMENAME; ?>' demos and single pages through Elementor.
	</div>
		
	<div style="height:40px"></div>
<?php
}
?>
   
   <div class="welcome-panel-column-container">
    
    <div class="one_half">
		<div class="step_icon">
			<a href="<?php echo admin_url("themes.php?page=install-required-plugins"); ?>">
				<i class="fas fa-plug"></i>
				<div class="step_title">Install Plugins</div>
			</a>
		</div>
		<div class="step_info">
			<?php echo esc_html(DOTLIFE_THEMENAME); ?> has required and recommended plugins in order to build your website using layouts you saw on our demo site. We recommend you to install all plugins first.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="<?php echo admin_url("post-new.php?post_type=page"); ?>">
				<i class="fa fa-file-alt"></i>
				<div class="step_title">Create Page</div>
			</a>
		</div>
		<div class="step_info">
			<?php echo esc_html(DOTLIFE_THEMENAME); ?> support standard WordPress page option. You can also use Elementor page builder to create and organise page contents.
		</div>
	</div>
	
	<div class="one_half">
		<div class="step_icon">
			<a href="<?php echo admin_url("customize.php"); ?>">
				<i class="fas fa-sliders-h"></i>
				<div class="step_title">Customize Theme</div>
			</a>
		</div>
		<div class="step_info">
			Start customize theme's layouts, typography, elements colors using WordPress customize and see your changes in live preview instantly.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="<?php echo admin_url("themes.php?page=functions.php#pp_panel_import-demo"); ?>">
				<i class="fas fa-database"></i>
				<div class="step_title">Import Demo</div>
			</a>
		</div>
		<div class="step_info">
			We created various ready to use pages for you to use as starting point of your website. We recommend you to install all recommended plugins before importing ready site contents.
		</div>
	</div>

<?php
$booked_plugin_activated = class_exists('booked_plugin');

//Check if booked plugin is activated
if($booked_plugin_activated)
{
?>
	
	<br style="clear:both;"/>
	<div class="one_half nomargin">
		<div class="step_icon">
			<a href="<?php echo admin_url("admin.php?page=booked-install-addons"); ?>">
				<i class="fas fa-calendar-plus"></i>
				<div class="step_title">Booking Add-ons</div>
			</a>
		</div>
		<div class="step_info">
			Enhance booking features from various addons which are available for free. adding Woocommerce payment support, Calendar feeds and Front-end agents options.
		</div>
	</div>
	
	<div class="one_half last nomargin">
		<div class="step_icon">
			<a href="<?php echo admin_url("admin.php?page=booked-settings"); ?>">
				<i class="fas fa-calendar-alt"></i>
				<div class="step_title">Calendar Settings</div>
			</a>
		</div>
		<div class="step_info">
			You can configure all calendar booking options here including time slots, display options, color settings and many more.
		</div>
	</div>
	
<?php
}
?>
	
	<br style="clear:both;"/>
	
	<h1>Support</h1>
	<div style="height:20px"></div>
	<div class="one_half nomargin">
		<div class="step_icon">
			<a href="https://themegoods.ticksy.com/submit/" target="_blank">
				<i class="fas fa-life-ring"></i>
				<div class="step_title">Submit a Ticket</div>
			</a>
		</div>
		<div class="step_info">
			We offer excellent support through our ticket system. Please make sure you prepare your purchased code first to access our services.
		</div>
	</div>
	
	<div class="one_half last nomargin">
		<div class="step_icon">
			<a href="https://docs.themegoods.com/docs/dotlife" target="_blank">
				<i class="fas fa-book"></i>
				<div class="step_title">Theme Document</div>
			</a>
		</div>
		<div class="step_info">
			This is the place to go find all reference aspects of theme functionalities. Our online documentation is resource for you to start using theme.
		</div>
	</div>
	
	<br style="clear:both;"/>
	
	<div style="height:30px"></div>
    
   </div>
  </div>
 </div>
 <script>
  jQuery(document).ready(function($) {
   	jQuery('#welcome-panel').after($('#dotlife-welcome-id').show());
  });
 </script>

<?php }

function dotlife_tag_cloud_filter($args = array()) {
   $args['smallest'] = 12;
   $args['largest'] = 12;
   $args['unit'] = 'px';
   return $args;
}

add_filter('widget_tag_cloud_args', 'dotlife_tag_cloud_filter', 90);

//Customise Widget Title Code
add_filter( 'dynamic_sidebar_params', 'dotlife_wrap_widget_titles', 1 );
function dotlife_wrap_widget_titles( array $params ) 
{
	$widget =& $params[0];
	$widget['before_title'] = '<h2 class="widgettitle"><span>';
	$widget['after_title'] = '</span></h2>';
	
	return $params;
}

//Control post excerpt length
function dotlife_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'dotlife_custom_excerpt_length', 200 );


function dotlife_theme_queue_js(){
  if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('get_header', 'dotlife_theme_queue_js');


function dotlife_add_meta_tags() {
    $post = dotlife_get_wp_post();
    
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    //Check if responsive layout is enabled
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
	
	//meta for phone number link on mobile
	echo '<meta name="format-detection" content="telephone=no">';
}
add_action( 'wp_head', 'dotlife_add_meta_tags' , 1 );

add_filter('redirect_canonical','custom_disable_redirect_canonical');
function custom_disable_redirect_canonical($redirect_url) {if (is_paged() && is_singular()) $redirect_url = false; return $redirect_url; }

function dotlife_body_class_names($classes) 
{
	$post = dotlife_get_wp_post();
	
	if(isset($post->ID))
	{
		//Check if boxed layout is enable
		$page_boxed_layout = get_post_meta($post->ID, 'page_boxed_layout', true);
		if(!empty($page_boxed_layout))
		{
			$classes[] = esc_attr('tg_boxed');
		}
		
		//Get Page Menu Transparent Option
		$page_menu_transparent = get_post_meta($post->ID, 'page_menu_transparent', true);
		if(!empty($page_menu_transparent))
		{
			$classes[] = esc_attr('tg_menu_transparent');
		}
	}
	
	//if password protected
	if(post_password_required() && is_page())
	{
	   	$classes[] = esc_attr('tg_password_protected');
	}
	
	//Get lightbox color scheme
	$tg_lightbox_color_scheme = get_theme_mod('tg_lightbox_color_scheme', 'black');
	
	if(!empty($tg_lightbox_color_scheme))
	{
		$classes[] = esc_attr('tg_lightbox_'.$tg_lightbox_color_scheme);
	}
	
	//Get sidemenu on desktop class
	$tg_sidemenu = get_theme_mod('tg_sidemenu', false);

	if(!empty($tg_sidemenu))
	{
		$classes[] = esc_attr('tg_sidemenu_desktop');
	}
	
	//Get main menu layout
	$tg_menu_layout = dotlife_menu_layout();
	if(!empty($tg_menu_layout))
	{
		$classes[] = esc_attr($tg_menu_layout);
	}
	
	//Get fotoer reveal class
	$tg_footer_reveal = get_theme_mod('tg_footer_reveal', false);
	if(!empty($tg_footer_reveal))
	{
		$classes[] = esc_attr('tg_footer_reveal');
	}
	
	if(is_page() && !comments_open($post->ID) && !class_exists("\\Elementor\\Plugin"))
	{
		$classes[] = esc_attr('comment_close');
	}

	return $classes;
}

//Now add test class to the filter
add_filter('body_class','dotlife_body_class_names');

add_filter('upload_mimes', 'dotlife_add_custom_upload_mimes');
function dotlife_add_custom_upload_mimes($existing_mimes) 
{
  	$existing_mimes['woff'] = 'application/x-font-woff';
  	return $existing_mimes;
}

add_action('init','dotlife_shop_sorting_remove');
function dotlife_shop_sorting_remove() {
	$tg_shop_filter_sorting = get_theme_mod('tg_shop_filter_sorting', true);
	
	if(empty($tg_shop_filter_sorting))
	{
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30 );
		
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	}
}

/*add_action( 'show_user_profile', 'dotlife_extra_user_fields' );
add_action( 'edit_user_profile', 'dotlife_extra_user_fields' );
function dotlife_extra_user_fields( $user ) 
{ 
	$available_pages = get_pages();
?>
    <h3><?php esc_html_e('Client Options', 'dotlife' ); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="user_homepage"><?php esc_html_e('Client Homepage', 'dotlife' ); ?></label></th>
            <td>
                <select id="user_homepage" name="user_homepage">
	            <?php
		            $user_homepage = get_the_author_meta( 'user_homepage', $user->ID ); 
		            
					foreach($available_pages as $available_page) 
					{  
		        ?>
		        	<option value="<?php echo esc_attr($available_page->ID); ?>" <?php if($user_homepage == $available_page->ID) { ?>selected<?php } ?>><?php echo esc_attr($available_page->post_title); ?></option>
		        <?php
			        }
			    ?>
                </select>
                <span class="description"><?php esc_html_e('Select homepage for this user when logged in successfully', 'dotlife' ); ?></span>
            </td>
        </tr>
    </table>
<?php }
	
add_action( 'personal_options_update', 'dotlife_save_extra_user_fields' );
add_action( 'edit_user_profile_update', 'dotlife_save_extra_user_fields' );

function dotlife_save_extra_user_fields( $user_id ) 
{
    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }else{

        if(isset($_POST['user_homepage']) && $_POST['user_homepage'] != ""){
            update_user_meta( $user_id, 'user_homepage', $_POST['user_homepage'] );
        }
    }
}*/

add_action( 'admin_enqueue_scripts', 'dotlife_admin_pointers_header' );

function dotlife_admin_pointers_header() {
   if ( dotlife_admin_pointers_check() ) {
      add_action( 'admin_print_footer_scripts', 'dotlife_admin_pointers_footer' );

      wp_enqueue_script( 'wp-pointer' );
      wp_enqueue_style( 'wp-pointer' );
   }
}

function dotlife_admin_pointers_check() {
   $admin_pointers = dotlife_admin_pointers();
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] )
         return true;
   }
}

function dotlife_admin_pointers_footer() {
   $admin_pointers = dotlife_admin_pointers();
?>
<script type="text/javascript">
/* <![CDATA[ */
( function($) {
   <?php
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] ) {
         ?>
         $( '<?php echo esc_js($array['anchor_id']); ?>' ).pointer( {
            content: '<?php echo wp_kses_post($array['content']); ?>',
            position: {
            edge: '<?php echo esc_js($array['edge']); ?>',
            align: '<?php echo esc_js($array['align']); ?>'
         },
            close: function() {
               $.post( ajaxurl, {
                  pointer: '<?php echo esc_js($pointer); ?>',
                  action: 'dismiss-wp-pointer'
               } );
            }
         } ).pointer( 'open' );
         <?php
      }
   }
   ?>
} )(jQuery);
/* ]]> */
</script>
   <?php
}

function dotlife_admin_pointers() {
   $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
   $prefix = 'dotlife_admin_pointer';
   
   //Page help pointers
   $elementor_builder_content = '<h3>Page Builder</h3>';
   $elementor_builder_content .= '<p>Basically you can use WordPress visual editor to create page content but theme also has another way to create page content. By using Elementor Page Builder, you would be ale to drag&drop each content block without coding knowledge. Click here to enable Elementor.</p>';
   
   $page_options_content = '<h3>Page Options</h3>';
   $page_options_content .= '<p>You can customise various options for this page including menu styling, page templates etc.</p>';
   
   $page_featured_image_content = '<h3>Page Featured Image</h3>';
   $page_featured_image_content .= '<p>Upload or select featured image for this page to displays it as background header.</p>';
   
   //Post help pointers
   $post_options_content = '<h3>Post Options</h3>';
   $post_options_content .= '<p>You can customise various options for this post including its layout and featured content type.</p>';
   
   $post_featured_image_content = '<h3>Post Featured Image (*Required)</h3>';
   $post_featured_image_content .= '<p>Upload or select featured image for this post to displays it as post image on blog, archive, category, tag and search pages.</p>';

   $tg_pointer_arr = array(   
   	  //Page help pointers
      $prefix . '_elementor_builder' => array(
         'content' => $elementor_builder_content,
         'anchor_id' => '#elementor-switch-mode-button .elementor-switch-mode-off',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_elementor_builder', $dismissed ) )
      ),
      
      $prefix . '_page_options' => array(
         'content' => $page_options_content,
         'anchor_id' => 'body.post-type-page #page_option_page_menu_transparent',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_page_options', $dismissed ) )
      ),
      
      $prefix . '_page_featured_image' => array(
         'content' => $page_featured_image_content,
         'anchor_id' => 'body.post-type-page #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_page_featured_image', $dismissed ) )
      ),
      
      //Post help pointers
      $prefix . '_post_options' => array(
         'content' => $post_options_content,
         'anchor_id' => 'body.post-type-post #post_option_post_layout',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_post_options', $dismissed ) )
      ),
      
      $prefix . '_post_featured_image' => array(
         'content' => $post_featured_image_content,
         'anchor_id' => 'body.post-type-post #set-post-thumbnail',
         'edge' => 'top',
         'align' => 'left',
         'active' => ( ! in_array( $prefix . '_post_featured_image', $dismissed ) )
      ),
   );

   return $tg_pointer_arr;
}

remove_action( 'wp_head', 'rest_output_link_header', 10);    
remove_action( 'template_redirect', 'rest_output_link_header', 11);

if(DOTLIFE_THEMEDEMO)
{
	add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
	add_action( 'elementor/frontend/after_enqueue_styles', function() { wp_dequeue_style( 'elementor-icons' ); } );
}
?>