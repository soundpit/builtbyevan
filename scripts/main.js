jQuery(document).ready(function(){
	
	//when the user clicks on the contact me button
	jQuery("#button").on("click", function(){
		
		//clear the message div
		jQuery("#message").removeClass("failure");
		jQuery("#message").removeClass("success");
		jQuery("#message").empty();
		
		jQuery("#contact-submit").show();
		jQuery('#contact-cancel').val("Cancel");
		
		//adjust the height of the lightbox
		var h = jQuery(".container").height();   
		jQuery('#design-lightbox').height(h)  
		//now show the 2 boxes
		jQuery('#design-lightbox').show();		
		jQuery('#contact').fadeIn(500);
		
	}); // end contact me click
	
	//when the user clicks on the submit button
	jQuery('#contact-submit').on('click', function(e){
		
		//serialize the data
		var formdata = jQuery('form').serialize();
		
		jQuery.ajax({
			method: "POST",
			url: jQuery('form').attr('action'),
			data: formdata
		}).done(function(data){
			
			if (data === "blank") {
				jQuery("#message").addClass("failure");
				jQuery("#message").html('<h3>Please make sure all the fields are filled in properly</h3>');
			}else{
				jQuery("#message").addClass("success");
				jQuery("#message").html('<h3>'+ data + '</h3>');	
				
				//hide the submit button
				jQuery("#contact-submit").hide();
				jQuery('#contact-cancel').val("Close");
			}					
		}).fail(function(data2){
			
			jQuery("#message").addClass("failure");
			jQuery("#message").html('<h3>' + data2 + '</h3>');

		});
	}); //end contact-submit
	
	//cancel button
	jQuery('#contact-cancel').on('click', function(){
		//fadeout the lighboxes
		jQuery('#contact').fadeOut(500);
		//call settime out to delay the hiding of the background.
		window.setTimeout(function(){
                 jQuery('#design-lightbox').hide();    
        	}, 500);
		//reset the form
		jQuery('#contact').trigger('reset');
	});// end cancel button
	
});