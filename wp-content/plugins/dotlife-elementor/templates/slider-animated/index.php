<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();
?>
<div class="tg_animated_slider_wrapper slideshow">
<?php
		$counter = 1;
		$last_slide = count($slides);
	
		foreach ($slides as $slide) 
		{
?>
		<div class="slideshow__slide js-slider-home-slide" data-slide="<?php echo esc_attr($counter); ?>">
			<div class="slideshow__slide-background-parallax background-absolute js-parallax">
				<div class="slideshow__slide-background-load-wrap background-absolute">
					<div class="slideshow__slide-background-load background-absolute">
						<div class="slideshow__slide-background-wrap background-absolute">
							<div class="slideshow__slide-background background-absolute">
								<div class="slideshow__slide-image-wrap background-absolute">
									<div class="slideshow__slide-image background-absolute" style="background-image:url(<?php echo esc_url($slide['slide_image']['url']); ?>);"></div>
								</div>
							</div>
						</div>			
					</div>
				</div>
			</div>
			
			<div class="slideshow__slide-caption">
		        <div class="slideshow__slide-caption-text">
		          <div class="container js-parallax">
			       <?php
						if(!empty($slide['slide_title']))
						{
					?>
		            	<h2 class="slideshow__slide-caption-title"><?php echo esc_html($slide['slide_title']); ?></h2>
		            <?php
			            }
			            
			            if(!empty($slide['slide_description']))
						{
			        ?>
		            <p class="slideshow__slide-caption-content"><?php echo esc_html($slide['slide_description']); ?></p>
		            <?php
			           	}
			           	
			           	if(!empty($slide['slide_button_title']))
						{
							$target = $slide['slide_button_link']['is_external'] ? 'target="_blank"' : '';
			        ?>
		            <a class="slideshow__slide-caption-subtitle -load o-hsub -link" href="<?php echo esc_url($slide['slide_button_link']['url']); ?>" <?php echo esc_attr($target); ?>><span class="slideshow__slide-caption-subtitle-label"><?php echo esc_html($slide['slide_button_title']); ?></span></a>
		            <?php
			            }
			        ?>
		          </div>
		        </div>
		    </div>
		</div>
<?php
			$counter++;
			$last_slide--;
		}
?>
	<div class="c-header-home_footer">
      <div class="o-container">
        <div class="c-header-home_controls -nomobile o-button-group">
          <div class="js-parallax is-inview">
	        <button class="js-slider-home-prev floating-btn ripple" type="button">
              <span class="ti-arrow-left"></span>
            </button>
            <button class="js-slider-home-next floating-btn ripple" type="button">
              <span class="ti-arrow-right"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
	}
?>