<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		
<script type="text/javascript">
 jQuery("#login-button").click(function(event){
	event.preventDefault();
	var password = jQuery("#password").val();
	var login = jQuery("#username").val();
	
	if(password != '' && '' != login) {
		
		jQuery('form').fadeOut(500);
		jQuery('.wrapper').addClass('form-success');
		jQuery.post( "verifylogin", { username: login, password: password }).done(function( data ) {
			//alert( "Data Loaded: " + data );
			if(data != 'false') {
				setTimeout(function(){
					jQuery(location).attr('href', '<?php echo base_url(); ?>index.php/dashboard');
					return false;
				}, 2000);
			} else {
				jQuery('form').fadeIn(500);
				jQuery('.wrapper').removeClass('form-success');
			}
		  });
		
	} else {
		if(login == '') {
			jQuery('#mtsg').html('Login manquant...');
			jQuery('#mtsg').addClass('error');
			jQuery('#username').addClass('error');
		}
		if(password == '') {
			jQuery('#mtsg').html('Mot de passe manquant...');
			jQuery('#mtsg').addClass('error');
			jQuery('#password').addClass('error');
		}
	}
	
});
</script>
</body>
</html>