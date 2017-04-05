<?php

/*
* 	This builts and adds the metaboxes for the project page.
* 	The user can add details for each project for the portfolio.
* 	I built it here rather than using a plugin because I wanted the code 
* 	all in one place.
*/


/* Called when it's saved */
function save_project_settings( $post_id ){
	
	//this saves the meta info.
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'project_nonce' ] ) && wp_verify_nonce( $_POST[ 'project_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}
	
	//call a function that does the saving
	project_save_settings ('project_thumb_url', $post_id);
	project_save_settings ('intro_blurb_text', $post_id);
	project_save_settings ('project_big_image_url', $post_id);
	
	project_save_settings ('project_url_link', $post_id);
	project_save_settings ('project_git_link', $post_id);
	project_save_settings ('project_position', $post_id);
	
	//the title and the content should already be saved. (I hope)
	
}
add_action( 'save_post', 'save_project_settings' );

//generic saving function to reduce space
function project_save_settings ( $name, $post_id ){
	
	if( isset( $_POST[ $name ] ) ) {
		update_post_meta( $post_id, $name, $_POST[ $name ] );
	}
};

/* Add the Stylesheet */
function project_add_style(){
	global $typenow; //get the $post info

	if ($typenow === "project"){
 		wp_enqueue_style( 'project_meta_box_styles', get_template_directory_uri() . '/scripts/metabox-styles.css' );
	}
}
add_action( 'admin_print_styles', 'project_add_style' );


/* function to check and return values */
function project_test_values( $meta, $value ){
	//checks if  the metavalue is stored
	if (isset($meta[$value])){
		return $meta[$value][0]; 
	}else {
		return $value. " Does not exist";
	}
}

/*
The Image Picker Code
*/
function project_color_enqueue() {
	
	global $typenow; //get the $post info
	
	
	if ( $typenow === 'project') {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'meta-box-color-js', get_template_directory_uri() . '/scripts/meta-box-color.js', array( 'wp-color-picker' ) );
	}
}
add_action( 'admin_enqueue_scripts', 'project_color_enqueue' );

/*
now the button code script
*/
function project_image_enqueue() {

	global $typenow; //get the $post info

	if ( $typenow === 'project'){
		wp_enqueue_media();
 
		// Registers and enqueues the required javascript.
		wp_register_script( 'meta-box-image', get_template_directory_uri() . '/scripts/meta-box-image.js', array( 'jquery' ) );
		wp_localize_script( 'meta-box-image', 'meta_image',
			array(
				'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
				'button' => __( 'Use this image', 'prfx-textdomain' ),
			)
		);
		wp_enqueue_script( 'meta-box-image' );
	}
}
add_action( 'admin_enqueue_scripts', 'project_image_enqueue' );


function custom_meta_box_markup()
{

	
	global $post;
	//create the nonce field
	wp_nonce_field( basename( __FILE__ ), 'project_nonce' );
	
	//get the stored details for filling in the blanks if the project
	//is already created.
	$project_stored_meta = get_post_meta( $post->ID );
	
	?>

	<div id="project-metabox">

		<div class="row">
			<div class="col-2">
				<label>Thumb Image</label>
			</div>
			<div class="col-10">
				<input type="button" id="project_thumb_button" class="image_button" name="project_thumb_button" value="Choose Image">
				<input type="text" id ="project_thumb_url" name="project_thumb_url" value="<?php echo project_test_values($project_stored_meta, 'project_thumb_url'); ?>">
				<div class="img-container">
					<img id="project_thumb_img" src="<?php echo project_test_values($project_stored_meta, 'project_thumb_url'); ?>" alt="">
				</div>
			</div>
		</div> <!-- /.row -->
	
		<div class="row">
			<div class="col-2">
				<label>Intro Blurb</label>
			</div>
			<div class="col-10">
				<textarea id="intro_blurb_text" name="intro_blurb_text" placeholder="Write a short description of your project here"><?php echo project_test_values($project_stored_meta, 'intro_blurb_text'); ?></textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-2">
				<label>Big Image</label>
			</div>
			<div class="col-10">
				<input type="button" id="project_big_image_button" class="image_button" name="project_big_image_button" value="Choose Image">
				<input type="text" id ="project_big_image_url" name="project_big_image_url" value="<?php echo project_test_values($project_stored_meta, 'project_big_image_url'); ?>">
				<div class="img-container">
					<img id="project_big_image_img" src="<?php echo project_test_values($project_stored_meta, 'project_big_image_url'); ?>" alt="">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-2">
				<label>Links</label>
			</div>
			<div class="col-10">
				<label>Website Link</label><br>
				<input type="text" id ="project_url_link" name="project_url_link" placeholder="Link to the project online" value="<?php echo project_test_values($project_stored_meta, 'project_url_link'); ?>">
				<br><br><label>Github Link</label><br>
				<input type="text" id ="project_git_link" name="project_git_link" value="<?php echo project_test_values($project_stored_meta, 'project_git_link'); ?>">

			</div>
		</div>
		
		<div class="row">
			<div class="col-2">
				<label>Position</label>
			</div>
			<div class="col-10">
				 <input type="number" name="project_position" min="1" max="50" value="<?php echo project_test_values($project_stored_meta, 'project_position'); ?>">
			</div>
		</div>

	</div> <!-- /#project-metabox -->
	<?php	
	
}


function add_custom_meta_box(){
    add_meta_box("demo-meta-box", "Edit Project Details", "custom_meta_box_markup", "project", "after_title", "high", null);
		
}
add_action("add_meta_boxes", "add_custom_meta_box");

//this function puts the metabox before the edit box and after the title
function edit_form_after_title() {
    // get globals vars
    global $post, $wp_meta_boxes;

    do_meta_boxes( get_current_screen(), 'after_title', $post );

    // unset 'ai_after_title' context from the post's meta boxes
    unset( $wp_meta_boxes['post']['after_title'] );
}
add_action( 'edit_form_after_title', 'edit_form_after_title' );
