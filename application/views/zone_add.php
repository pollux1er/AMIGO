<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_forms.php'); ?>
    <?php include ('inc/menu.php'); ?>  

    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Zone</h1>
            <span class="pagedesc">Ajouter un secteur</span>
            
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
            	
                    <form id="form1" class="stdform" method="post" action="<?php echo base_url() . "index.php/ajax/save_zone/"; ?>">
                    	<p>
                        	<label>Sélectionner la ville</label>
                            <span class="formwrapper" style="padding-top:0">
                            	<select data-placeholder="Selectionner une ville..." class="chzn-select" style="width:350px;" tabindex="2" name="ville">
									<option value=""></option> 
									<option value="Douala">Douala</option>
									<option value="Yaoundé">Yaoundé</option>
									<option value="Kribi">Kribi</option>
									<option value="Bafoussam">Bafoussam</option>
									<option value="Buea">Buea</option>
                                </select>
                            </span>
                        </p>
						<p>
                        	<label>Nom du secteur</label>
                            <span class="field"><input type="text" name="nom" id="nom" class="longinput" /></span>
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
					nom: "Entrez le nom du secteur S.V.P",
				},
				submitHandler: function(form) {
					jQuery.ajax({
						url: form.action,
						type: form.method,
						data: jQuery(form).serialize(),
						success: function(response) {
							jQuery("#nom").val("");
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