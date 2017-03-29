<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_forms.php'); ?>
    <?php include ('inc/menu.php'); ?>  

    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Vendeuse</h1>
            <span class="pagedesc">Ajouter une vendeuse</span>
            
           <!-- <ul class="hornav">
                <li class="current"><a href="#basicform">Basic</a></li>
                <li><a href="#validation">Validation</a></li>
            </ul>-->
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        	
			<div class="notibar msgsuccess" style="display:none;">
				<a class="close"></a>
				<p>This is a success message.</p>
			</div>
        	<div id="validation" class="subcontent" style="">
            	
                    <form id="form1" class="stdform" method="post" action="<?php echo base_url() . "index.php/ajax/save_vendeuse/"; ?>">
                    	<p>
                        	<label>Nom de la vendeuse</label>
                            <span class="field"><input type="text" name="nom" id="nom" class="longinput" /></span>
                        </p>
						<p>
                        	<label>Numéro de téléphone</label>
                            <span class="field"><input type="text" name="numero" id="numero" class="longinput" /></span>
                        </p>
						<p>
                        	<label>Zone</label>
                            <span class="field">
								<select name="id_secteur" id="id_secteur">
									<option value="">---</option>
									<?php 
										if($zones){
											foreach ($zones as $row){
												echo '<option value="'.$row->id.'">'.$row->nom.'</option>';
											}
									}

									?>
								</select>
							</span>
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
				},
				messages: {
					nom: "Entrez le nom de la vendeuse S.V.P",
				},
				submitHandler: function(form) {
					jQuery.ajax({
						url: form.action,
						type: form.method,
						data: jQuery(form).serialize(),
						success: function(response) {
							jQuery("#nom").val("");
							jQuery("#numero").val("");
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