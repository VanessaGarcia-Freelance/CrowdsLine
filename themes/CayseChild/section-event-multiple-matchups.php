<?php
/*
Template Name: Event Multiple Matchups
*/
?>  

<?php 
$title_image = get_field('title_image');
$matchups = get_field('matchups');
$disclaimer = get_field('disclaimer');
 ?>

<section id="<?php echo( basename(get_permalink()) ); ?>" class="cbp-so-section centered cbp-so-init event multiple-matchup clearfix <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

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
			<?php if(get_the_content()){ ?>
				<div class="event-content"><?php the_content(); ?></div>			
			<?php } ?>
			<div class="event-table-container">
				<div class="event-table clearfix">
					
						<?php if($matchups){							
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
								<div class="column column-4">
									<div class="column-header clearfix">Over/Under</div>
									<div class="column-sub-header-container">
										<div class="column-sub-header highlight">Crowd</div>
										<div class="column-sub-header">Vegas</div>
									</div>
								</div>								
							</div>
							
							<?php 
							foreach($matchups as $matchup){
							$team_num = 0;
							$team_data = $matchup['team_data'];
							$event_over_under = $matchup['event_over_under'];
							$start_time = $matchup['start_time'];
							?>
							<div class="event-main-content">
								<div class="event-matchup">
								
								<?php	foreach($team_data as $t_data){
										$team_num ++;
										$first_name = $t_data['first_name'];
										$last_name = $t_data['last_name'];
										$crowd_score = $t_data['crowd_score'];
										$vegas_score = $t_data['vegas_score'];
										$crowd_spread = $t_data['crowd_spread'];
										$vegas_spread = $t_data['vegas_spread'];
										?>
										<div class="event-row <?php echo 'row-' . $team_num ; ?><?php echo ($team_num != 1 ? ' inside': ''); ?>">
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
											<div class="clearfix"></div>
										</div>
										<?php
									}?>
									</div>
							
								<?php if($event_over_under){ ?>
									<div class="over-under-content">
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
									<?php }
								} ?>
									
								</div><!-- .event-main-content -->
								<div class="clearfix"></div>
								<?php if($start_time){ ?>
									<div class="start-time-content clearfix">
									<?php foreach($start_time as $s_time){
										$start_time = $s_time['start_time'];
										$start_date = $s_time['start_date'];
										?>
											<div>Game starts at <?php echo $start_time ; ?> on <?php echo $start_date ; ?></div>
									</div>
									<?php }
								} ?>
								
							<?php }	?>
							
						<?php } ?>				
				</div><!-- .event-table -->
			</div>
			
			<div class="event-disclaimer"><p><?php echo $disclaimer ; ?></p></div>
		</div>	
	</div>

</section>