<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();
?>
<div class="tg_clip_path_slide_container slider">
	<div class="slider__slides">
<?php
		$count = 1;
		$count_slide = count($slides);
		foreach ($slides as $slide) 
		{
			$slide_class = '';
			if($count == 1)
			{
				$slide_class = 's--active';
			}
			else if($count == $count_slide)
			{
				$slide_class = 's--prev';
			}
?>
		<div class="slide <?php echo esc_attr($slide_class); ?>">
	      <div class="slide__inner" style="background-image:url(<?php echo esc_url($slide['slide_image']['url']); ?>);">
	        <div class="slide__content">
		        <?php
					if(!empty($slide['slide_title']))
					{
				?>
					<h2 class="slide__heading"><?php echo esc_html($slide['slide_title']); ?></h2>
				<?php
					}
					
					if(!empty($slide['slide_description']))
					{
				?>
					<div class="slide__text"><?php echo strip_tags($slide['slide_description']); ?></div>
				<?php
				    }
				?>
	        </div>
	      </div>
	    </div>
<?php
			$count++;
		}
?>
	</div>
	
	<?php
		if($count_slide > 1)
		{
	?>
	<div class="slider__control">
	    <div class="slider__control-line"></div>
	    <div class="slider__control-line"></div>
	</div>
	<div class="slider__control slider__control--right m--right">
	    <div class="slider__control-line"></div>
	    <div class="slider__control-line"></div>
	</div>
	<?php
		}
	?>
</div>
<?php
	}
?>