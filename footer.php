	</div> <!-- /content inside -->
</div> <!-- /container -->
	
<!-- this is the lightbox that will go over the top when clicked -->
<div id="design-lightbox">
	<form id="contact" action="<?php echo URL; ?>/scripts/mail.php" method="post">
	
		<h2>Contact Me</h2>
		<div id="message"></div>
		
		<label>Name</label>
		<input type="text" id="contact-name" name="contact-name" required>
	
		<label>Email</label>
		<input type="email" id="contact-email" name="contact-email" required>
	
		<label>Message</label>
		<textarea id="contact-message" name="contact-message"></textarea>
		<br>
		
		<input type="button" value="Submit" name="contact-submit" id="contact-submit">	
		<input type="button" value="Cancel" name="contact-cancel" id="contact-cancel">
		
	</form>
</div> <!-- /lightbox -->
	
<footer>
	<p id="footer-text">&copy; 2017 | builtbyevan.com | <a href="<?php echo wp_login_url( $redirect ); ?>" target="_blank">login</a></p>
</footer>

<?php wp_footer(); ?>

</body>
</html>