<?php
function dotlife_get_course_curriculum_number($course_id = '')
{
	$course_lessons = 0;
	if(function_exists('learn_press_get_course') && !empty($course_id))
	{
		$course = learn_press_get_course($course_id);
		$sections = $course->get_curriculum_raw();
		
		if(is_array($sections) && !empty($sections))
		{
			foreach($sections as $section_item)
			{
				if(isset($section_item['items']) && is_array($section_item['items']) && !empty($section_item['items']))
				{
					foreach($section_item['items'] as $section_item)
					{
						$course_lessons++;
					}
				}
			}
		}
	}
	
	return $course_lessons;
}
	
add_action( 'learn-press/before-single-course', 'dotlife_single_course_header' );
function dotlife_single_course_header() {
	$obj_post = dotlife_get_wp_post();
?>
<div id="single_course_header">
	<div class="standard_wrapper">
		<div class="single_course_title">
			<h1><?php the_title(); ?></h1>
			
			<div class="single_course_excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
		<?php
			$current_user_id = get_current_user_id();
			$is_enrolled = learn_press_is_enrolled_course($obj_post->ID, $current_user_id);
			
			if(!$is_enrolled)
			{
		?>
		<div class="single_course_join">
			<a id="single_course_enroll" href="javascript:;" class="button"><?php esc_html_e('Enroll This Course', 'dotlife' ); ?></a>
		</div>
		<?php
			}
		?>
	</div>
</div>
<br class="clear"/>
<?php
	$has_image_class = '';
	
	//Get page featured image
	if(has_post_thumbnail($obj_post->ID, 'full'))
    {
        $image_id = get_post_thumbnail_id($obj_post->ID); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        
        if(isset($image_thumb[0]) && !empty($image_thumb[0]))
        {
        	$pp_page_bg = $image_thumb[0];
        }
        
        if(!empty($pp_page_bg))
        {
	        $has_image_class = 'has_image';
?>
<div id="single_course_bgimage" style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"></div>
<?php
        }
    }
    
    $tg_course_meta_display = get_theme_mod('tg_course_meta_display', true);
    
    if(!empty($tg_course_meta_display))
    {
?>
<div id="single_course_meta" class="standard_wrapper">
	<ul class="single_course_meta_data">
		<?php
			$course_duration = get_post_meta($obj_post->ID, '_lp_duration', true);
			
			if(!empty($course_duration))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-alarm-clock"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Duration', 'dotlife' ); ?>
				</span>
				<?php
					$course_duration_arr = explode(" ", $course_duration);
					
					$duration_int = 0;
					$duration_type = esc_html__('weeks', 'dotlife' );
					if(isset($course_duration_arr[0]))
					{
						$duration_int = intval($course_duration_arr[0]);
						
						if(isset($course_duration_arr[1]))
						{
							$is_plural = false;
							if($duration_int > 1)
							{
								$is_plural = true;
							}
							
							switch($course_duration_arr[1])
							{
								case 'week':
								case 'weeks':
								default:
									if($is_plural)
									{
										$duration_type = esc_html__('weeks', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('week', 'dotlife' );
									}
								break;
								
								case 'day':
								case 'days':
									if($is_plural)
									{
										$duration_type = esc_html__('days', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('day', 'dotlife' );
									}
								break;
								
								case 'hour':
								case 'hours':
									if($is_plural)
									{
										$duration_type = esc_html__('hours', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('hour', 'dotlife' );
									}
								break;
								
								case 'minute':
								case 'minutes':
									if($is_plural)
									{
										$duration_type = esc_html__('minutes', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('minute', 'dotlife' );
									}
								break;
							}
						}
					}
				?>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($duration_int.'&nbsp;'.$duration_type); ?>
				</span>
			</div>
		</li>
		<?php
			}
		?>
		
		<li class="single_course_meta_data_separator"></li>
		<?php
			$course_skill_level = get_post_meta($obj_post->ID, '_lp_skill_level', true);
			
			if(!empty($course_skill_level))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-thumb-up"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Skill Level', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($course_skill_level); ?>
				</span>
			</div>
		</li>
		<?php
			}
		?>
		
		<li class="single_course_meta_data_separator"></li>
		
		<?php
		if(function_exists('dotlife_get_course_curriculum_number'))
		{
			$course_lessons = dotlife_get_course_curriculum_number($obj_post->ID);
			
			if(!empty($course_lessons))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-agenda"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Lectures', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($course_lessons); ?>
					<?php
						if($course_lessons > 1)
						{
							echo esc_html_e('lessons', 'dotlife' );
						}
						else
						{
							echo esc_html_e('lesson', 'dotlife' );
						}
					?>
				</span>
			</div>
		</li>
		<?php
			}
		}
		?>
		<li class="single_course_meta_data_separator"></li>
		
		<?php
			$course_enrolled_number = get_post_meta($obj_post->ID, '_lp_students', true);
			
			if(!empty($course_enrolled_number))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-user"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Enrolled', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
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
		</li>
		<?php
			}
		?>
		
		<li class="single_course_meta_data_separator"></li>
	</ul>
</div>
<?php
	} //End if display course meta
}

add_action( 'learn-press/after-single-course', 'dotlife_single_course_footer' );
function dotlife_single_course_footer() {
?>
<a href="javascript:;" id="course_action"></a>
<?php	
}
?>