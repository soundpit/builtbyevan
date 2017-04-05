<?php 

	get_header();
	
?>

<main>
	<div class="row banner">
		<div class="col-12">
			<div id="banner-container">
				<div class="row">
					<div class="col-12">
						<h1>Welcome</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<p class="intro-text">Here you will find a selection of my projects, starting with the most recent. Some of these projects were assesments for my diploma, while others were my own personal creations.  </p>
					</div>				
					<div class="col-4">
						<p class="intro-text">Click on the project to be taken to a page with more details on the project itself. All the projects are hosted online, and thier source code can be found on github. Links are provided.  </p>			
					</div>
					<div class="col-4">
						<p class="intro-text">if you like what you see, please feel free to contact me using the above link and I will get back to you as soon as I can.  </p>
					</div>
				</div> <!-- /row -->
			</div>
		</div>
	</div>
	
	<div id="main-content">
		
		<?php
			
			// initialise a counter
			$counter = 0;
		
			//$args = array( 'post_type' => 'project', 'posts_per_page' => 24 );
		
			//the args. sort by metavalue
			$args = array(
				'post_type' => 'project',
				'orderby'   => 'meta_value_num',
				'meta_key'  => 'project_position',
				'order'     => 'DESC',
			);

			$loop = new WP_Query( $args );
		
			while ( $loop->have_posts() ) : $loop->the_post();
		
				$project_stored_meta = get_post_meta( $post->ID );
		
				if ($counter == 0){
					//start a new row
					echo "<div class='row'>";
				}
		?>
			
			<div class="col-4">
				<div class="box">
					<img src="<?php echo $project_stored_meta['project_thumb_url'][0]; ?>">
					<div class="inner-box">
					<h3><?php echo the_title(); ?></h3>
					<p><?php echo $project_stored_meta['intro_blurb_text'][0]; ?></p>
					<a class="bold-link" target="_blank" href="<?php echo get_permalink($post->ID); ?>">Read More</a>
					</div>
				</div>
			</div>
					
	<?php
		
		if ($counter == 2){
			//end the row
			echo "</div>";
			//reset the counter
			$counter = 0;
		}else{
			//increment the counter
			$counter ++;
			//echo ($counter);
		}
	
		endwhile;	
		
		//echo sizeof($loop->posts);

	?>
	
	</div><!-- main content -->

</main>

<?php 

	get_footer();
	
?>