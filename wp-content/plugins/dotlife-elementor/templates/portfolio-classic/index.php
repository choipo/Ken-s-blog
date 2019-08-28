<div class="portfolio_classic_container">
<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	$count_slides = count($slides);
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();
		
		//Get spacing class
		$spacing_class = '';
		if($settings['spacing'] != 'yes')
		{
			$spacing_class = 'has_no_space';
		}
		
		$column_class = 1;
		$thumb_image_name = 'dotlife-gallery-grid';
		
		//Start displaying gallery columns
		switch($settings['columns']['size'])
		{
			case 1:
		   		$column_class = 'tg_one_col';
		   	break;
		   	
			case 2:
		   		$column_class = 'tg_two_cols';
		   	break;
		   	
		   	case 3:
		   	default:
		   		$column_class = 'tg_three_cols';
		   	break;
		   	
		   	case 4:
		   		$column_class = 'tg_four_cols';
		   	break;
		   	
		   	case 5:
		   		$column_class = 'tg_five_cols';
		   	break;
		   	
		   	case 6:
		   		$column_class = 'tg_six_cols';
		   	break;
		}
		
		$filterable_class = 'no_filter';
		
		if($settings['filterable'] == 'yes')
		{
			//Get filterable tags
			$filterable_tags = array();
			foreach ( $slides as $slide ) 
			{
				$filterable_tags[] = $slide['slide_tag'];
			}
			$filterable_tags = array_unique($filterable_tags);
			
			if(!empty($filterable_tags) && $settings['filterable'] == 'yes')
			{
				$filterable_class = 'filterable';
?>
<div class="portfolio_filter_wrapper">
		<a class="filter_tag_btn active" href="javascript:;" data-rel="all" data-cols="<?php echo esc_attr($settings['columns']['size']); ?>"><?php echo __( 'All', 'dotlife-elementor' ); ?></a>
	<?php
		foreach ( $filterable_tags as $filterable_tag ) 
		{
	?>
		<a class="filter_tag_btn" href="javascript:;" data-rel="<?php echo dotlife_sanitize_title($filterable_tag); ?>" data-cols="<?php echo esc_attr($settings['columns']['size']); ?>"><?php echo esc_html($filterable_tag); ?></a>
	<?php
		}
	?>
</div>
<?php
			}
		}
?>
<div class="portfolio_classic_content_wrapper portfolio_classic layout_<?php echo esc_attr($column_class); ?> <?php echo esc_attr($spacing_class); ?>" data-cols="<?php echo esc_attr($settings['columns']['size']); ?>">
<?php		
		$last_class = '';
		$count = 1;
		
		foreach ( $slides as $slide ) 
		{
			$last_class = '';
			if($count%$settings['columns']['size'] == 0)
			{
				$last_class = 'last';
			}
			
			if(is_numeric($slide['slide_image']['id']) && !empty($slide['slide_image']['id']))
			{
				if(is_numeric($slide['slide_image']['id']) && (!isset($_GET['elementor_library']) OR empty($_GET['elementor_library'])))
				{
					$image_url = wp_get_attachment_image_src($slide['slide_image']['id'], $thumb_image_name, true);
				}
				else
				{
					$image_url[0] = $slide['slide_image']['url'];
				}
				
				//Get image meta data
				$image_alt = get_post_meta($slide['slide_image']['id'], '_wp_attachment_image_alt', true);
			}
			else
			{
				$image_url[0] = $slide['slide_image']['url'];
				$image_alt = '';
			}
			
			$target = $slide['slide_link']['is_external'] ? 'target="_blank"' : '';
?>
		<div class="portfolio_classic_grid_wrapper <?php echo esc_attr($column_class); ?> <?php echo esc_attr($last_class); ?>  portfolio-<?php echo esc_attr($count); ?> tile scale-anm <?php echo dotlife_sanitize_title($slide['slide_tag']); ?> all <?php echo esc_attr($filterable_class); ?>">
			<div class="portfolio_classic_img">
				<img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt);?>" />
			
				<div>		
					<span class="ti-arrow-right"></span>
					<div class="curl"></div>
					<a href="<?php echo esc_url($slide['slide_link']['url']); ?>" <?php echo esc_attr($target); ?> ></a>
				</div>
			</div>
			<br class="clear"/>
			<div class="portfolio_classic_content">
				<h3 class="portfolio_classic_title"><a href="<?php echo esc_url($slide['slide_link']['url']); ?>" <?php echo esc_attr($target); ?> ><?php echo esc_html($slide['slide_title']); ?></a></h3>
				<div class="portfolio_classic_subtitle"><?php echo esc_html($slide['slide_subtitle']); ?></div>
			</div>
		</div>
<?php
			$count++;
		}
?>
<?php
	if($settings['spacing'] == 'yes')
	{
?>
<br class="clear"/>
<?php
	}
?>
</div>
<?php
	}
?>
</div>