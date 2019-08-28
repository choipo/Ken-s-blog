<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	$count_slides = count($slides);
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();

?>
<section class="tg_slice_slide_container slides">
	<?php
		if($count_slides > 1)
		{
	?>
		<section class="slides-nav">
		    <nav class="slides-nav__nav">
		      	<button class="slides-nav__prev js-prev"><?php esc_html_e( 'Prev' , 'dotlife-elementor' ); ?></button>
			  	<button class="slides-nav__next js-next"><?php esc_html_e( 'Next' , 'dotlife-elementor' ); ?></button>
		    </nav>
	  	</section>
	<?php
		}
	?>
<?php
	$count = 1;
	
	foreach ($slides as $slide) 
	{
?>
	<section class="slide <?php if($count == 1) { ?>is-active<?php } ?>">
		<div class="slide__content">
			<figure class="slide__figure"><div class="slide__img" style="background-image: url(<?php echo esc_url($slide['slide_image']['url']); ?>)"></div></figure>
		
			<header class="slide__header">
			<?php 
				if(!empty($slide['slide_title']))
				{
			?>
				<h2 class="slide__title"><span class="title-line"><span><?php echo esc_html($slide['slide_title']); ?></span></span></h2>
			<?php
				}
				
			 	if(!empty($slide['slide_link']['url']))
			 	{
			 		$target = $slide['slide_link']['is_external'] ? 'target="_blank"' : '';
			?>
				<a class="tg_slice_slide_link" href="<?php echo esc_url($slide['slide_link']['url']); ?>" <?php echo esc_attr($target); ?>></a>
			<?php
				}
			?>
			</header>
		</div>
    </section>
<?php
		$count++;
	}
?>
</section>
<?php
	}
?>