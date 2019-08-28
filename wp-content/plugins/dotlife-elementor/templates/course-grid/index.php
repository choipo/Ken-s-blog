<?php
	//Get all settings
	$settings = $this->get_settings();
	
	if($settings['show_search'] == 'yes')
	{
		$obj_id = get_queried_object_id();
		$current_url = get_permalink($obj_id);
		
		$keyword = '';
		if(isset($_GET['keyword']) && !empty($_GET['keyword']))
		{
			$keyword = $_GET['keyword'];
		}
?>
<form method="get" name="search-course" class="learn-press-search-course-form" action="<?php echo esc_url($current_url); ?>">
    <input type="text" name="keyword" class="search-course-input" value="<?php echo esc_attr($keyword); ?>" placeholder="<?php esc_html_e('enter keywords here', 'dotlife-elementor' ); ?>">
    <button class="lp-button button search-course-button"><?php esc_html_e('Search', 'dotlife-elementor' ); ?></button>
</form>
<?php
	}
?>

<div class="course_grid_container">
<?php
	$widget_id = $this->get_id();
	
	//For pagination
	if(is_front_page())
	{
	    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
	}
	else
	{
	    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	$args = array( 
		'post_type' => 'lp_course',
		'suppress_filters' => false,
		'post_status' => 'publish',
		'posts_per_page' => $settings['posts_per_page']['size'],
		'course_category' => $settings['course_category'],
		'paged' => $paged,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	);
	
	switch($settings['sort_by'])
	{
		case 'default':
			$args['orderby'] = 'menu_order';
			$args['order'] = 'ASC';
		break;
		
		case 'published':
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
		break;
		
		case 'title':
			$args['orderby'] = 'title';
			$args['order'] = 'ASC';
		break;
		
		case 'price_low':
			$args['orderby'] = 'meta_value';
			$args['order'] = 'ASC';
			$args['meta_key'] = '_lp_price';
		break;
		
		case 'price_high':
			$args['orderby'] = 'meta_value';
			$args['order'] = 'DESC';
			$args['meta_key'] = '_lp_price';
		break;
	}
	
	if(isset($_GET['keyword']) && !empty($_GET['keyword']))
    {  
        $args['s'] = $_GET['keyword'];
    }
	
	query_posts($args);
	$count = 0;
	
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
?>
<div class="portfolio_classic_content_wrapper portfolio_classic layout_<?php echo esc_attr($column_class); ?> <?php echo esc_attr($spacing_class); ?>" data-cols="<?php echo esc_attr($settings['columns']['size']); ?>">
<?php
	if (have_posts()) : while (have_posts()) : the_post();
		$post_ID = get_the_ID();		
		
		$last_class = '';
		$count++;
		
		if($count%$settings['columns']['size'] == 0)
		{
			$last_class = 'last';
		}
		
		$course_featured_img_url = get_the_post_thumbnail_url($post_ID, $thumb_image_name);
		$course_featured_img_alt = get_post_meta(get_post_thumbnail_id($post_ID), '_wp_attachment_image_alt', true);
		$course_url = get_permalink($post_ID);
		$course_title= get_the_title();
?>
		 <div class="portfolio_classic_grid_wrapper <?php echo esc_attr($column_class); ?> <?php echo esc_attr($last_class); ?>  portfolio-<?php echo esc_attr($count); ?> tile scale-anm">
			<div class="card__img" style="background-image:url(<?php echo esc_url($course_featured_img_url); ?>);"></div>
			 
			<?php
				if($settings['show_price'] == 'yes')
				{
					$course_price = dotlife_get_course_price_html($post_ID);
			?>
			<span class="card__price"><?php echo esc_html($course_price); ?></span>
			<?php
				}
			?>
			 
			 <a href="<?php echo esc_url($course_url); ?>" class="card_link">
				<div class="card__img--hover" style="background-image:url(<?php echo esc_url($course_featured_img_url); ?>);"></div>
			</a>

			<div class="card__info">
				<?php
					if($settings['show_date'] == 'yes')
					{
				?>
		    		<span class="card__date"><?php echo date_i18n(DOTLIFE_THEMEDATEFORMAT, get_the_time('U')); ?></span>
		    	<?php
			    	}
			    ?>
			    
				<h3 class="card__title"><a href="<?php echo esc_url($course_url); ?>"><?php echo esc_html($course_title); ?></a></h3>
				<?php
					if(isset($settings['excerpt_length']['size']) && !empty($settings['excerpt_length']['size']))
					{
				?>
				<div class="card__excerpt"><?php echo dotlife_limit_get_excerpt(strip_tags(get_the_excerpt()), $settings['excerpt_length']['size'], '...'); ?></div>
				<?php
					}
				?>
				
				<?php
				if(function_exists('dotlife_get_course_curriculum_number') && $settings['show_lesson'] == 'yes')
				{
					$course_lessons = dotlife_get_course_curriculum_number($post_ID);
					
					if(!empty($course_lessons))
					{
				?>
				<div class="card__meta">
					<span class="ti-agenda"></span>&nbsp;
					<span class="card__lesson">
						<?php echo esc_html($course_lessons); ?>
						<?php
							if($course_lessons > 1)
							{
								echo esc_html_e('lessons', 'dotlife-elementor' );
							}
							else
							{
								echo esc_html_e('lesson', 'dotlife-elementor' );
							}
						?>
					</span>
				</div>
				<?php
					}
				}
				?>
				
				<?php
				if($settings['show_student'] == 'yes')
				{
					$course_enrolled_number = get_post_meta($post_ID, '_lp_students', true);
					
					if(!empty($course_enrolled_number))
					{
				?>
				<div class="card__meta">
					<span class="ti-user"></span>&nbsp;
					<span class="card__student">
						<?php echo esc_html($course_enrolled_number); ?>
						<?php
							if($course_enrolled_number > 1)
							{
								echo esc_html_e('students', 'dotlife' );
							}
							else
							{
								echo esc_html_e('student', 'dotlife' );
							}
						?>
					</span>
				</div>
				<?php
					}
				}
				?>
		  	</div>
		</div>
<?php
	endwhile; endif;
	
	if($settings['spacing'] == 'yes')
	{
?>
<br class="clear"/>
<?php
	}
?>
</div>
</div>
<?php
	if($settings['show_pagination'] == 'yes')
	{
		global $wp_query;
		if($wp_query->max_num_pages > 1)
	    {
	    	if (function_exists("dotlife_pagination")) 
	    	{
	    	    dotlife_pagination($wp_query->max_num_pages, 4, 'course-posts-grid' );
	    	}
	    	else
	    	{
?>
	    		<div class="pagination"><p><?php posts_nav_link(''); ?></p></div>
<?php
	    	}
?>
			<div class="pagination_detail">
		    	<?php esc_html_e('Page', 'dotlife-elementor' ); ?> <?php echo esc_html($paged); ?> <?php esc_html_e('of', 'dotlife-elementor' ); ?> <?php echo esc_html($wp_query->max_num_pages); ?>
		    </div>
<?php
	    }
	}
	
	wp_reset_query();	
?>
<br class="clear"/>