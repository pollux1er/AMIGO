<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_forms.php'); ?>
    <?php include ('inc/menu.php'); ?>  

    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Agent</h1>
            <span class="pagedesc">Ajouter un agent</span>
            
           <!-- <ul class="hornav">
                <li class="current"><a href="#basicform">Basic</a></li>
                <li><a href="#validation">Validation</a></li>
            </ul>-->
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        	
			<div class="notibar msgsuccess" style="display:none;">
				<a class="close"></a>
				<p>Enregistrement réussi</p>
			</div>
        	<div id="validation" class="subcontent" style="">
            	
                    <form id="form1" class="stdform" method="post" action="<?php echo base_url() . "index.php/ajax/save_agent/"; ?>">
                    	<p>
                        	<label>Nom </label>
                            <span class="field"><input type="text" name="nom" id="nom" class="longinput" /></span>
                        </p>
						<p>
                        	<label>Prenom</label>
                            <span class="field"><input type="text" name="prenom" id="prenom" class="longinput" /></span>
                        </p>
						<p>
                        	<label>Numéro</label>
                            <span class="field"><input type="text" name="numero" id="numero" class="longinput" /></span>
                        </p>
						<p>
                        	<label>Email</label>
                            <span class="field"><input type="text" name="email" id="email" class="longinput" /></span>
                        </p>
                        
                        
                        <br />
                        
                        <p class="stdformbutton">
                        	<input class="submit radius2" type="submit" value="Enregistrer" />
                        </p>
                    </form>

            </div><!--subcontent-->
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    <script>
		jQuery(document).ready(function(){
			jQuery("#form1").validate({
				rules: {
					nom: "required",
					numero: "required",
				},
				messages: {
					nom: "Entrez le nom du secteur S.V.P",
					numero: "Entrez le numero S.V.P",
				},
				submitHandler: function(form) {
					jQuery.ajax({
						url: form.action,
						type: form.method,
						data: jQuery(form).serialize(),
						success: function(response) {
							jQuery("#nom").val("");
							jQuery("#prenom").val("");
							jQuery("#numero").val("");
							jQuery("#email").val("");
							jQuery(".msgsuccess").fadeIn();
							setTimeout(function(){
								jQuery(".msgsuccess").fadeOut();
							}, 2000);
						}            
					});
					
				}
			});
			
		});
	</script>
<?php include ('inc/foot_form.php'); ?>