<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();
?>
<div class="tg_parallax_slide_container">
<?php
		$counter = 1;
		$last_slide = count($slides);
		$count_slide = $last_slide;
	
		foreach ($slides as $slide) 
		{
?>
		<section class="tg_parallax_slide_background" style="background-image:url(<?php echo esc_url($slide['slide_image']['url']); ?>);z-index:<?php echo intval($last_slide); ?>;">
			<?php
				if(!empty($slide['slide_link']['url']))
				{
					$target = $slide['slide_link']['is_external'] ? 'target="_blank"' : '';
			?>
			<a class="tg_parallax_slide_link" href="<?php echo esc_url($slide['slide_link']['url']); ?>" <?php echo esc_attr($target); ?>></a>
			<?php
				}
			?>
			<div class="tg_parallax_slide_content_wrapper">
				<?php
					if(!empty($slide['slide_title']))
					{
				?>
		     		<div class="tg_parallax_slide_content_title"><h2><?php echo esc_html($slide['slide_title']); ?></h2></div>
		     	<?php
			     	}
			     	
			     	if(!empty($slide['slide_description']))
					{
				?>
					<div class="tg_parallax_slide_content_subtitle"><?php echo esc_html($slide['slide_description']); ?></div>
				<?php 
					}
				?>
		    </div>
		</section>
<?php
			$counter++;
			$last_slide--;
		}
?>
</div>
<?php
		if($count_slide > 1)
		{
?>
<div class="icon-scroll"></div>
<?php
		}
	}
?>