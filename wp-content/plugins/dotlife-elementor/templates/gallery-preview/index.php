<?php
	$widget_id = $this->get_id();
	$images = $this->get_settings('gallery');
	
	if(!empty($images))
	{
		//Get all settings
		$settings = $this->get_settings();
		$timer_arr = $this->get_settings('timer');
		$timer = intval($timer_arr['size']) * 1000;
?>
<div class="tg_fullscreen_gallery_preview_wrapper slider-wrapper">
	<div class="slider" data-pagination="<?php echo esc_attr($settings['show_pagination']); ?>" data-navigation="<?php echo esc_attr($settings['show_navigation']); ?>" <?php if($settings['autoplay'] == 'yes') { ?>data-autoplay="<?php echo esc_attr($timer); ?>"<?php } ?>>
<?php
		$counter = 0;
	
		foreach ( $images as $image ) 
		{	
			$image_id = dotlife_get_image_id($image['url']);
			
			//Get slideshow content
	        $image_title = '';
	        $image_caption = '';
	        $image_desc = '';
	        
	        $image_title = get_the_title($image_id);
			$image_caption = get_post_field('post_excerpt', $image_id);
			$image_description = get_post_field('post_content', $image_id);
?>
		<div class="slider--item" style="background-image:url(<?php echo esc_url($image['url']); ?>);background-size:<?php echo esc_attr($settings['size']); ?>">
			<?php
				if($settings['slideshow_content'] != 'none')
				{
			?>
				<div class="tg_gallery_fullscreen_content">
				<?php
					if(!empty($image_caption) && in_array('caption', $settings['slideshow_content']))
					{
				?>
					<div class="tg_gallery_fullscreen_caption"><?php echo esc_html($image_caption); ?></div>
				<?php
					}
				
					if(!empty($image_title) && in_array('title', $settings['slideshow_content']))
					{
				?>
					<div class="tg_gallery_fullscreen_title"><?php echo esc_html($image_title); ?></div>
				<?php
					}
					
					if(!empty($image_description) && in_array('description', $settings['slideshow_content']))
					{
				?>
					<div class="tg_gallery_fullscreen_description"><?php echo esc_html($image_description); ?></div>
				<?php
					}
				?>
				</div>
			<?php
				}
			?>
		</div>
<?php
			$counter++;
		}
?>
	</div>
</div>
<?php
	}
?>