<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();
?>
<div class="tg_animated_frame_slider_wrapper slideshow" data-background="<?php echo esc_attr($settings['frame_color']); ?>">
	<div class="slides">
<?php
		$counter = 1;
		$last_slide = count($slides);
	
		foreach ($slides as $slide) 
		{
?>
			<div class="slide <?php if($counter == 1) { ?>slide--current<?php } ?>">
				<div class="slide__img" style="background-image:url(<?php echo esc_url($slide['slide_image']['url']); ?>);"></div>
				<div class="slide__content">
					<?php
						if(!empty($slide['slide_title']))
						{
					?>
			     		<h2 class="slide__title"><?php echo esc_html($slide['slide_title']); ?></h2>
			     	<?php
				     	}
				     	
				     	if(!empty($slide['slide_description']))
						{
					?>
						<p class="slide__desc"><?php echo esc_html($slide['slide_description']); ?></p>
					<?php 
						}
					?>
					<a class="slide__link" href="<?php echo esc_url($slide['slide_button_link']['url']); ?>"><?php echo esc_html($slide['slide_button_title']); ?></a>
				</div>
		</div>
<?php
			$counter++;
			$last_slide--;
		}
?>
	</div>
	<nav class="slidenav">
		<button class="slidenav__item slidenav__item--prev"><i class="fa fa-long-arrow-left"></i></button>
		<button class="slidenav__item slidenav__item--next"><i class="fa fa-long-arrow-right"></i></button>
	</nav>
</div>
<?php
	}
?>