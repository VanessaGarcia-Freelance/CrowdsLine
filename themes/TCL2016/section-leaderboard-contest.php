<?php
/*
Template Name: Leaderboard Contest
*/
?>  

<?php 
$title_image = get_field('title_image');
$table_title = get_field('table_title');
$team_data = get_field('team_data');
$disclaimer = get_field('disclaimer');
 ?>

<section id="<?php echo( basename(get_permalink()) ); ?>" class="cbp-so-section centered cbp-so-init event contest clearfix <?php post_even(); ?>" <?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>style="<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) ) { ?><?php global $post; $image = get_post_meta( $post->ID, '_playne_imagepickerz', true ); echo "background:url('$image') no-repeat center center; background-size: cover;";  ?><?php } else if ( get_post_meta($post->ID, '_playne_colorpickerz', true) ) { ?><?php global $post; $color = get_post_meta( $post->ID, '_playne_colorpickerz', true ); echo "background-color:$color"; ?>;<?php } ?><?php if( get_post_meta($post->ID, '_playne_colorpickerz3', true)) { ?><?php global $post; $colormaintext = get_post_meta( $post->ID, '_playne_colorpickerz3', true ); echo "color:$colormaintext"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_imagepickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz', true) or get_post_meta($post->ID, '_playne_colorpickerz3', true) ) { ?>"<?php } ?>>

	<div class="row clearfix">

		<?php		
		$post_title = get_the_title();
		if ($post_title == '') {
		} else { ?>
			<h2 class="centered" <?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>style="<?php }?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?><?php global $post; $headercolor = get_post_meta( $post->ID, '_playne_colorpickerz2', true ); echo "color:$headercolor"; ?>;<?php } ?><?php if ( get_post_meta($post->ID, '_playne_colorpickerz2', true) ) { ?>"<?php }?>>
				<?php the_title(); ?>
			</h2>
		<?php }	?>
		
		

		<div class="twelve columns">
			<?php if($title_image){
				$contest_image = true;
			?>
				<div class="contest-image"><img class="centered" src="<?php echo $title_image ; ?>" /></div>
			<?php } ?>
			
			<div class="event-table-container leaderboard-contest<?php echo ($contest_image ? '' : ' no-image' ); ?>">
				<div class="event-title-container">
					<?php if($table_title){ 
						foreach($table_title as $t_title){
								$table_title = $t_title['table_title'];
								$table_subtitle = $t_title['table_subtitle'];
					?>
							<div class="event-title"><?php echo $table_title ; ?></div>
							<div class="event-subtitle"><?php echo $table_subtitle ; ?></div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="event-table clearfix">
					<div class="event-main-content">
						<?php if($team_data){
							$team_num = 0;
							
						?>
							<div class="event-row row-header clearfix">
								<div class="column column-1">
									<div class="column-header clearfix">Top<?php echo ' ' . count($team_data) ; ?></div>
								</div>
								<div class="column column-2">
									<div class="column-header clearfix">Points</div>
								</div>
								<div class="column column-3">
									<div class="column-header clearfix">Accuracy</div>
								</div>			
							</div>
							
							<?php 
							foreach($team_data as $t_data){
								$team_num ++;
								$user_name = $t_data['user_name'];
								$points = $t_data['points'];
								$accuracy = $t_data['accuracy'];
								?>
								<div class="event-row <?php echo 'row-' . $team_num ; ?> clearfix">
									<div class="column column-1">
										<div class="team-name-first<?php echo ($team_num == 1 ? ' highlight' : '') ; ?>"><?php echo $user_name ; ?></div>
									</div>
									<div class="column column-2">
										<div class="column-content<?php echo ($team_num == 1 ? ' highlight' : '') ; ?>"><?php echo $points ; ?></div>
									</div>
									<div class="column column-3">
										<div class="column-content<?php echo ($team_num == 1 ? ' highlight' : '') ; ?>"><?php echo $accuracy ; ?></div>
									</div>
								</div>
								
								
								<?php
							}?>
						</div><!-- .event-main-content -->
							
				<?php } ?>				
				</div><!-- .event-table -->
				<div class="event-timestamp">
					<p>Updated: <?php the_modified_time('n/j/Y'); ?> at <?php the_modified_time('g:i a'); ?> EST</p>
				</div>
			</div>			
			<div class="clearfix">&nbsp;</div>
			<?php if(get_the_content()){ ?>
				<div class="event-content"><?php the_content(); ?></div>			
			<?php } ?>
			<div class="event-disclaimer"><p><?php echo $disclaimer ; ?></p></div>
		</div>	
	</div>

</section>