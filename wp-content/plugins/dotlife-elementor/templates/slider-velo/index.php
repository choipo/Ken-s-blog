<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();
?>
<section class="tg_velo_slide_container velo-slides" data-velo-slider="on">
<?php
		foreach ($slides as $slide) 
		{
?>
		<section class="velo-slide <?php if($settings['expand'] == 'yes') { ?>is-hovering<?php } ?>">
			<div class="velo-slide__bg">
	        	<span class="border"><span></span></span>
				<figure class="velo-slide__figure" style="background-image: url(<?php echo esc_url($slide['slide_image']['url']); ?>)"></figure>
	      	</div>
			
			<header class="velo-slide__header">
				<?php
					if(!empty($slide['slide_title']))
					{
				?>
		        <h2 class="velo-slide__title"><span class="oh"><span><?php echo esc_html($slide['slide_title']); ?></span></span></h2>
		        <?php
					}
				?>
		        
		        <?php
			        if(!empty($slide['slide_description']))
					{
				?>
		        <p class="velo-slide__text"><span class="oh"><span><?php echo esc_html($slide['slide_description']); ?></span></span></p>
		        <?php
			        }
			    ?>
		        
		        <?php
					if(!empty($slide['slide_link']['url']))
					{
						$target = $slide['slide_link']['is_external'] ? 'target="_blank"' : '';
				?>
		        <span class="velo-slide__btn"><a class="btn-draw btn--white" href="<?php echo esc_url($slide['slide_link']['url']); ?>" <?php echo esc_attr($target); ?>><span class="btn-draw__text"><span><?php echo esc_html($slide['slide_link_title']); ?></span></span></a></span>
		        <?php
					}
				?>
	      	</header>
		</section>
<?php
		}
?>
</section>

<nav class="velo-slides-nav">
  <ul class="velo-slides-nav__list">
    <li>
      <a class="js-velo-slides-prev velo-slides-nav__prev inactive" href="#0"><i class="icon-up-arrow"></i></a>
    </li>
    <li>
      <a class="js-velo-slides-next velo-slides-nav__next" href="#0"><i class="icon-down-arrow"></i></a>
    </li>
  </ul>
</nav>
<?php
	}
?>