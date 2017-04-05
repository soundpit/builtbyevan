/*
 * Attaches the image uploader to the input field
 */
jQuery(document).ready(function($){

	// Instantiates the variable that holds the media library frame.
	var meta_image_frame;
	
	var thisId;

	// Runs when the image button is clicked.
	$('.image_button').click(function(e){

		// Prevents the default action from occuring.
		e.preventDefault();
		
		//need to get the id 
		//var thisId = ($(this).attr('id'));
		thisId = ($(this).attr('id'));
		
		console.log(thisId);

		// If the frame already exists, re-open it.
		if ( meta_image_frame ) {
			meta_image_frame.open();
			return;
		}

		// Sets up the media library frame
		meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
			title: meta_image.title,
			button: { text:  meta_image.button },
			library: { type: 'image' }
		});

		// Runs when an image is selected.
		meta_image_frame.on('select', function(){
			
			
			
			console.log(thisId);
			
			//console.log(this);
		
			

			// Grabs the attachment selection and creates a JSON representation of the model.
			var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
			
			var splitid = thisId.split("_");
			var splitimg = thisId.split("_");
			
		
	
			splitid.pop(); //takes off the last one
			splitimg.pop();
			
			var thisinput = splitid.push("url");
			//turn it back into a string
			thisinput = splitid.join("_");
			
			var thissrc = splitimg.push("img");
			thissrc = splitimg.join("_");
	

			// Sends the attachment URL to our custom image input field.
			$("#" + thisinput).val(media_attachment.url);
			
			$("#" + thissrc).attr('src',media_attachment.url);
			
		
		});

		// Opens the media library frame.
		meta_image_frame.open();
	});
});
