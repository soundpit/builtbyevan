<?php

get_header();

?>

<main>
	
	<div class="row banner">
		<div class="col-12">
			<div id="banner-container" class="single_header">
			<h1><a href="<?php echo get_home_url(); ?>"><i class="fa fa-home"></i> / </a> <?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	
	<div id="main-content">

		<?php $project_stored_meta = get_post_meta( $post->ID ); ?>
	
		<div class="row single-page">
			<div class="col-5">
				<!-- the image goes here -->
				<img src="<?php echo $project_stored_meta['project_big_image_url'][0]; ?>">
			</div>
			
			<div class="col-7 page-info">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				
				<?php the_content(); ?>
				
				<?php endwhile; else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
				<!--
				<h3>About</h3>
				<p>This site was developed as part of a course assignment. We designed the site according to supplied design documents.</p>
				<br>
				<h3>Things to Note</h3>
				<ul>
					<li>Each page on the site uses some form of javaScript to provide interactivity.</li>
					<li>The Main page has a sidebar where the user can input a name and address and some simple validation will occur.</li>
					<li>The about page has an image display which rotates through images</li>
					<li>...etc</li>
				</ul>
				<br>
				<h3>Technologies Used</h3>
				<ul>
					<li>HTML/5</li>
					<li>CSS/3</li>
					<li>javaScript</li>	
</ul>
				-->
				<br>
				<p>View the website <a class="bold-link" href="<?php echo $project_stored_meta['project_url_link'][0]; ?>">here</a></p>
				<br>
				<p>Check out the source code <a class="bold-link" href="<?php echo $project_stored_meta['project_git_link'][0]; ?>">here</a></p>
				
				
			</div>
		
		
		
		</div>
	
	</div><!-- main content -->

</main>


<?php

get_footer();

?>