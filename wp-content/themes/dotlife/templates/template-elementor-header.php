<?php
	//Check if using normal or transparent header
	if(is_page() OR is_single())
	{
		$page_menu_transparent = get_post_meta($post->ID, 'page_menu_transparent', true);
		
		//If normal header
		if(empty($page_menu_transparent))
		{
			$tg_header_content_default = get_post_meta($post->ID, 'page_header', true);
			
			if(empty($tg_header_content_default))
			{
				$tg_header_content_default = get_theme_mod('tg_header_content_default');
			}
			else
			{
				$tg_header_content_default = $tg_header_content_default;
			}
		}
		//if transparent header
		else
		{
			$tg_transparent_header_content_default = get_post_meta($post->ID, 'page_transparent_header', true);
		
			if(empty($tg_transparent_header_content_default))
			{
				$tg_header_content_default = get_theme_mod('tg_transparent_header_content_default');
			}
			else
			{
				$tg_header_content_default = $tg_transparent_header_content_default;
			}
		}
	}
	else
	{
		$page_menu_transparent = 0;
		
		//If normal header
		if(empty($page_menu_transparent))
		{
			$tg_header_content_default = get_theme_mod('tg_header_content_default');
		}
		//if transparent header
		else
		{
			$tg_header_content_default = get_theme_mod('tg_transparent_header_content_default');
		}
	}
	
	if(!empty($tg_header_content_default))
	{
?>
	<div id="elementor_header" class="header_style_wrapper">
		<?php 
			if (class_exists("\\Elementor\\Plugin")) {
                echo dotlife_get_elementor_content($tg_header_content_default);
            }
		?>
	</div>
<?php
	}
	
	//Check if sticky menu
	$tg_fixed_menu = get_theme_mod('tg_fixed_menu', true);
	
	if(!empty($tg_fixed_menu))
	{
		//Check if using normal or transparent header
		if(is_page() OR is_single())
		{
			$tg_header_content_default = get_post_meta($post->ID, 'page_sticky_header', true);
		
			if(empty($tg_header_content_default))
			{
				$tg_header_content_default = get_theme_mod('tg_sticky_header_content_default');
			}
		}
		else
		{
			$tg_header_content_default = get_theme_mod('tg_sticky_header_content_default');
		}
?>
	<div id="elementor_sticky_header" class="header_style_wrapper">
		<?php 
			if (class_exists("\\Elementor\\Plugin")) {
                echo dotlife_get_elementor_content($tg_header_content_default);
            }
		?>
	</div>
<?php
	}
?>