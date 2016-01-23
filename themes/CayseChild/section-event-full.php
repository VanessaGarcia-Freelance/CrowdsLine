<?php
/*
Template Name: Event full width
*/
?>  

<?php 
$title_image = get_field('title_image');
$team_data = get_field('team_data');
$event_over_under = get_field('event_over_under');
$disclaimer = get_field('disclaimer');
 ?>

<section id="<?php echo( basename(get_permalink()) ); ?>" class="cbp-so-section centered cbp-so-init event clearfix <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

	<div class="row clearfix">

		<?php
		
		$post_title = get_the_title();
		
		if($title_image){ ?>
			<img class="centered" src="<?php echo $title_image ; ?>" />
		<?php } else {
			if ($post_title == '') {
			} else { ?>
				<h2 class="centered" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>>
					<?php the_title(); ?>
				</h2>
			<?php } 
		}
		?>

		<div class="twelve columns">
			<div class="event-table-container">
				<div class="event-table clearfix">
					<div class="event-main-content">
						<?php if($team_data){
							$team_num = 0;
						?>
							<div class="event-row row-header clearfix">
								<div class="column column-1">&nbsp;</div>
								<div class="column column-2">
									<div class="column-header clearfix">Score</div>
									<div class="column-sub-header-container">
										<div class="column-sub-header highlight">Crowd</div>
										<div class="column-sub-header">Vegas</div>
									</div>
								</div>
								<div class="column column-3">
									<div class="column-header clearfix">Spread</div>
									<div class="column-sub-header-container">
										<div class="column-sub-header highlight">Crowd</div>
										<div class="column-sub-header">Vegas</div>
									</div>
								</div>			
							</div>
							
							<?php 
							foreach($team_data as $t_data){
								$team_num ++;
								$first_name = $t_data['first_name'];
								$last_name = $t_data['last_name'];
								$crowd_score = $t_data['crowd_score'];
								$vegas_score = $t_data['vegas_score'];
								$crowd_spread = $t_data['crowd_spread'];
								$vegas_spread = $t_data['vegas_spread'];
								?>
								<div class="event-row <?php echo 'row-' . $team_num ; ?> clearfix">
									<div class="column column-1">
										<div class="team-name-first"><?php echo $first_name ; ?></div>
										<div class="team-name-last"><?php echo $last_name ; ?></div>
									</div>
									<div class="column column-2">
										<div class="column-content highlight"><?php echo $crowd_score ; ?></div>
										<div class="column-content"><?php echo $vegas_score ; ?></div>
									</div>
									<div class="column column-3">
										<div class="column-content highlight"><?php echo $crowd_spread ; ?></div>
										<div class="column-content"><?php echo $vegas_spread ; ?></div>
									</div>
								</div>
								
								
								<?php
							}?>
						</div><!-- .event-main-content -->
						<div class="over-under-content clearfix">
							<div class="event-row row-header">
								<div class="column column-4">
									<div class="column-header clearfix">Over/Under</div>
									<div class="column-sub-header-container">
										<div class="column-sub-header highlight">Crowd</div>
										<div class="column-sub-header">Vegas</div>
									</div>
								</div>	
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						<?php foreach($event_over_under as $e_over_under){
							$crowd_ou = $e_over_under['crowd_ou'];
							$vegas_ou = $e_over_under['vegas_ou'];
							?>
							<div class="event-row over-under ">
								<div class="column column-4">
									<div class="column-content highlight"><?php echo $crowd_ou ; ?></div>
									<div class="column-content"><?php echo $vegas_ou ; ?></div>
								</div>
								<div class="clearfix"></div>	
							</div>					
												
						</div>
							<?php
						}
					} ?>				
				</div><!-- .event-table -->
				<div class="event-timestamp">
					<p>Updated: <?php the_modified_time('n/j/Y'); ?> at <?php the_modified_time('g:i a'); ?> EST</p>
				</div>
			</div>
			<?php if(get_the_content()){ ?>
				<div class="event-content"><?php the_content(); ?></div>			
			<?php } ?>
			<div class="event-disclaimer"><p><?php echo $disclaimer ; ?></p></div>
		</div>	
	</div>

</section>