<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_sms.php'); ?>
    <?php include ('inc/menu.php'); ?>  
<script type="text/javascript">
	jQuery(document).ready(function(){
		// Smart Wizard 	
		
  		jQuery('#clients').smartWizard({
			onFinish: onFinishCallback,
			onLeaveStep:leaveAStepCallback,
			transitionEffect:'fade',
			labelNext: 'Etape Suivante',
			labelPrevious: 'Etape Précédente',
			labelFinish: 'Envoi de SMS'
		});
		
		// Initialize the showStep event
		jQuery("#clients").on("onShowStep", function(e, anchorObject, stepNumber, stepDirection) {
			alert("You are on step "+stepNumber+" now");
		});
		
		function onFinishCallback(){
			var sms = jQuery('#sms').val();
			if(sms == '') {
				alert("Votre SMS ne peut etre envoyé vide!");
				return false;
			}
			// Ma requete ajax pour envoyer les SMS
			var str = jQuery( "#clientform" ).serialize();
			var send_sms_url = '<?php echo base_url("index.php/ajax/send_sms_mamie/"); ?>/';
			jQuery.ajax({    
				type: 'POST',
				url: send_sms_url,
				data: str,
				async: true,
				success: function(i){    
					if(i === "echec") {
						alert("Il n'y aucun destinataires pour le groupe que vous avez choisi!");
						
					}
					else {
						alert("Votre SMS est bien envoyé!");
						jQuery('#sms').val("");
					}
				}    
			});  
			
			//alert('SMS envoyé!');
		}
				
		function leaveAStepCallback(obj){
			var step_num= obj.attr('rel');
			if(step_num == 1) {
				//alert("Etape 1");
				if(jQuery('input:radio[name="group"]:checked').val() == 'secteur') {
					//alert("il sagit du secteur");
					jQuery("#cible-ville").hide();
					jQuery("#cible-secteur").show();
					jQuery("#cible-agent").hide();
					jQuery("#cible-client").hide();
				}
				if(jQuery('input:radio[name="group"]:checked').val() == 'ville') {
					//alert("il sagit du ville");
					jQuery("#cible-ville").show();
					jQuery("#cible-secteur").hide();
					jQuery("#cible-agent").hide();
					jQuery("#cible-client").hide();
				}
				
				if(jQuery('input:radio[name="group"]:checked').val() == 'agent') {
					//alert("il sagit du agent");
					jQuery("#cible-secteur").hide();
					jQuery("#cible-ville").hide();
					jQuery("#cible-agent").show();
					jQuery("#cible-client").hide();
				}
				if(jQuery('input:radio[name="group"]:checked').val() == 'client') {
					//alert("il sagit du client");
					jQuery("#cible-secteur").hide();
					jQuery("#cible-ville").hide();
					jQuery("#cible-agent").hide();
					jQuery("#cible-client").show();
				}
				
				return true;
			}
			
			if(step_num == 2) {
				//alert("Etape 2");
				
				return true;
			}
			
			if(step_num == 3) {
				//alert("Etape 3");
				
				return true;
			}
			
		}
      
      
		jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
		
		//jQuery('select, input:checkbox').uniform();
		jQuery(".chzn-select").chosen();
		
		jQuery("#sms").charCount({
			allowed: 160,		
			warning: 10,
			counterText: 'Characters left: '	
		});
	});
</script>
   <div class="centercontent">
    
        <div class="pageheader" style="padding-bottom:0px">
            <h1 class="pagetitle">Envoi de SMS</h1>
            <span class="pagedesc">Module d'envoi de SMS aux clients et agents</span>
            
            <ul class="hornav">
                <li><a href="#agent"> Aux Agents</a></li>
                <li class="current"><a href="#client">Aux Clients</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                    
            <div id="agent" class="subcontent" style="display:none">
            
                    <!-- START OF VERTICAL WIZARD -->
                    <form class="stdform" method="post" action="">
                    <div id="agents" class="wizard verwizard">
                    	
                        <ul class="verticalmenu">
                            <li>
                            	<a href="#step-1">
                                    <span class="label">Etape 1 : Choix du groupe cible</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#step-2">
                                    <span class="label">Etape 2 : Choix de la cible</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#step-3">
                                    <span class="label">Etape 3 : Composition du message</span>
                                </a>
                            </li>
                        </ul>
                                                	
                        <div id="step-1" class="formwiz">
                        	<h4>Etape 1 : Choix du groupe cible</h4> 
                        	
                                <p >
									
									<span class="formwrapper">
										<input type="radio" name="group2" checked="checked" value="ville2" /> Clients d'une ville &nbsp; &nbsp;<!--
										<input type="radio" name="radiofield" checked="checked" /> Checked Radio &nbsp; &nbsp;
										<input type="radio" name="radiofield" disabled="disabled" /> Disabled Radio  &nbsp; &nbsp;
										<input type="radio" name="radiofield" checked="checked" disabled="disabled" /> Disabled Radio -->
									</span>
								
									<span class="formwrapper">
										<input type="radio" name="group2" value="secteur2" /> Clients d'un secteur &nbsp; &nbsp;
									</span>
									<span class="formwrapper">
										<input type="radio" name="group" value="agent" /> Clients d'un agent &nbsp; &nbsp;
									</span>
									<span class="formwrapper">
										<input type="radio" name="group" value="client" /> Un Client &nbsp; &nbsp;
									</span>
								</p>
                                
                                <!--<p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>-->
                                
                        	
                            
                        </div><!--#wiz1step3_1-->
                        
                        <div id="step-2" class="formwiz">
                        	<h4>Etape 2 : Choix de la cible</h4> 
                            
                                <p id="cible-ville2" style="min-height : 150px">
									<label>Sélectionner la ville</label>
									<span class="formwrapper" style="padding-top:0">
										<select data-placeholder="Selectionner une ville..." class="chzn-select" style="width:350px;" tabindex="2" name="ville2">
											<option value=""></option> 
											<option value="Douala">Douala</option>
											<option value="Yaoundé">Yaoundé</option>
											<option value="Kribi">Kribi</option>
											<option value="Bafoussam">Bafoussam</option>
											<option value="Buea">Buea</option>
										</select>
									</span>
								</p>
								
								<p id="cible-secteur2" style="min-height : 100px">
									<label>Sélectionner la ville</label>
									<span class="formwrapper" style="padding-top:0">
										<select data-placeholder="Selectionner une ville..." class="chzn-select" style="width:350px;" tabindex="2" name="vill2e">
											<option value=""></option> 
											<option value="Douala">Douala</option>
											<option value="Yaoundé">Yaoundé</option>
											<option value="Kribi">Kribi</option>
											<option value="Bafoussam">Bafoussam</option>
											<option value="Buea">Buea</option>
										</select>
									</span>
									<br />
									<label>Sélectionner le secteur</label>
									<span class="field">
										<select name="id_secteur2" id="id_secteur2">
											<option value="">Sélectionner un secteur</option>
											<?php 
												if($secteurs){
													foreach ($secteurs as $row){
														echo '<option value="'.$row->id.'">'.$row->nom.'</option>';
													}
											}

											?>
										</select>
									</span>
								</p>
								
								<p id="cible-agent2" style="min-height : 100px">
									<label>Sélectionner l'agent</label>
									<span class="formwrapper" style="padding-top:0">
										<select data-placeholder="Rechercher un agent..." class="chzn-select" style="width:350px;" tabindex="2" name="ville2">
											<option value=""></option> 
											<?php 
												if($agents){
													foreach ($agents as $row){
														echo '<option value="'.$row->id.'">'.$row->nom.'</option>';
													}
											}

											?>
										</select>
									</span>
									
								</p>
								
								<p id="cible-client2" style="min-height : 100px">
									<label>Sélectionner le client</label>
									<span class="field">
										<select name="id_vendeuse2" id="id_vendeuse2">
											<option value="">Sélectionner un client</option>
											<?php 
												if($clients){
													foreach ($clients as $row){
														echo '<option value="'.$row->id.'">'.$row->nom.'</option>';
													}
											}

											?>
										</select>
									</span>
								</p>
                                                                                                                      
                        </div><!--#wiz1step3_2-->
                        
                        <div id="step-3">
                        	<h4>Etape 3 : Composition du message</h4>
                            <div class="par terms">
                                <p>
									<label>Textarea with Character Count</label>
									<span class="field">
										<textarea cols="80" rows="5"  class="longinput"></textarea>
									</span> 
								</p>
                                <!--<p><input type="checkbox"  /> I agree with the terms and agreement...</p>-->
                            </div>
                        </div><!--#wiz1step3_3-->
                        
                    </div><!--#wizard-->
                    </form>
                    
                    <br clear="all" /><br />
                    
                    <!-- END OF VERTICAL WIZARD -->
                    
            </div><!--#vertical-->
            
            <div id="client" class="subcontent">
            
                    <!-- START OF clients WIZARD -->
                    <form class="stdform" method="post" id="clientform" action="">
                    <div id="clients" class="wizard verwizard">
                    	
                        <ul class="verticalmenu">
                            <li>
                            	<a href="#step-1">
                                    <span class="label">Etape 1 : Choix du groupe cible</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#step-2">
                                    <span class="label">Etape 2 : Choix de la cible</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#step-3">
                                    <span class="label">Etape 3 : Composition du message</span>
                                </a>
                            </li>
                        </ul>
                                                	
                        <div id="step-1" class="formwiz">
                        	<h4>Etape 1 : Choix du groupe cible</h4> 
                        	
                                <p >
									
									<span class="formwrapper">
										<input type="radio" name="group" checked="checked" value="ville" /> Clients d'une ville &nbsp; &nbsp;<!--
										<input type="radio" name="radiofield" checked="checked" /> Checked Radio &nbsp; &nbsp;
										<input type="radio" name="radiofield" disabled="disabled" /> Disabled Radio  &nbsp; &nbsp;
										<input type="radio" name="radiofield" checked="checked" disabled="disabled" /> Disabled Radio -->
									</span>
								
									<span class="formwrapper">
										<input type="radio" name="group" value="secteur" /> Clients d'un secteur &nbsp; &nbsp;
									</span>
									<span class="formwrapper">
										<input type="radio" name="group" value="agent" /> Clients d'un agent &nbsp; &nbsp;
									</span>
									<span class="formwrapper">
										<input type="radio" name="group" value="client" /> Un Client &nbsp; &nbsp;
									</span>
								</p>
                                
                                <!--<p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>-->
                                
                        	
                            
                        </div><!--#wiz1step3_1-->
                        
                        <div id="step-2" class="formwiz">
                        	<h4>Etape 2 : Choix de la cible</h4> 
                            
                                <p id="cible-ville" style="min-height : 150px">
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
								
								<p id="cible-secteur" style="min-height : 100px">
									<label>Sélectionner la ville</label>
									<span class="formwrapper" style="padding-top:0">
										<select data-placeholder="Selectionner une ville..." class="chzn-select" style="width:350px;" tabindex="2" name="ville_secteur" id="ville_secteur">
											<option value=""></option> 
											<option value="Douala">Douala</option>
											<option value="Yaounde">Yaoundé</option>
											<option value="Kribi">Kribi</option>
											<option value="Bafoussam">Bafoussam</option>
											<option value="Buea">Buea</option>
										</select>
									</span>
									<br />
									<label>Sélectionner le secteur</label>
									<span class="field">
										<select name="id_secteur_1" id="id_secteur_1">
											<option value="">Sélectionner un secteur</option>
											<?php 
												if($secteurs){
													foreach ($secteurs as $row){
														echo '<option value="'.$row->id.'">'.$row->nom.'</option>';
													}
											}

											?>
										</select>
									</span>
								</p>
								
								<p id="cible-agent" style="min-height : 100px">
									<label>Sélectionner l'agent</label>
									<span class="formwrapper" style="padding-top:0">
										<select data-placeholder="Rechercher un agent..." class="chzn-select" style="width:350px;" tabindex="2" name="agent">
											<option value=""></option> 
											<?php 
												if($agents){
													foreach ($agents as $row){
														echo '<option value="'.$row->id.'">'.$row->nom.'</option>';
													}
											}

											?>
										</select>
									</span>
									
								</p>
								
								<p id="cible-client" style="min-height : 100px">
									<label>Sélectionner le client</label>
									<span class="field">
										<select data-placeholder="Rechercher un client..." class="chzn-select" style="width:350px;" tabindex="2" name="id_vendeuse" id="id_vendeuse">
											<option value=""></option>
											<?php 
												if($clients){
													foreach ($clients as $row){
														echo '<option value="'.$row->id.'">'.$row->nom.'</option>';
													}
											}

											?>
										</select>
									</span>
								</p>
                                                                                                                      
                        </div><!--#wiz1step3_2-->
                        
                        <div id="step-3">
                        	<h4>Etape 3 : Composition du message</h4>
                            <div class="par terms">
                                <p>
									<label>Textarea with Character Count</label>
									<span class="field">
										<textarea cols="80" rows="5" id="sms" name="sms" class="longinput"></textarea>
									</span> 
								</p>
                                <!--<p><input type="checkbox"  /> I agree with the terms and agreement...</p>-->
                            </div>
                        </div><!--#wiz1step3_3-->
                        
                    </div><!--#wizard-->
                    </form>
                    
                    <br clear="all" /><br />
                    
                    <!-- END OF clients WIZARD -->
                    
            </div><!--#clients-->
            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    <script>
		jQuery(document).ready(function(){
			/*jQuery("#form1").validate({
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
							
							setTimeout(function(){
								jQuery(".msgsuccess").fadeOut();
							}, 2000);
						}            
					});
					
				}
			});
			*/
			jQuery('#ville_secteur').on('change',function(){
				var ville = jQuery('#ville_secteur').val(); 
				//alert(ville); //return false;
				var secteur_url = '<?php echo base_url("index.php/ajax/get_secteurs/"); ?>/'+ville;    
				jQuery.ajax({    
					type: 'POST',
					url: secteur_url,
					data: '',
					dataType: 'json',
					async: true,
					success: function(i){    
						var select = jQuery('#id_secteur_1');
						select.empty().append('<option value="">---Selectionner secteur---</option>'); 						
						for (var j = 0; j < i.length; j++){                 
							console.log(i[j].id + "--" + i[j].nom);
							jQuery("#id_secteur_1").append("<option value='" +i[j].id+ "'>" +i[j].nom+ "</option>");    
						}  
						
					}    
				});    
			});
			
			jQuery('#id_secteur').on('change',function(){
				var id_secteur = jQuery('#id_secteur').val();    
				var clients_url = '<?php echo base_url("index.php/ajax/get_clients/"); ?>/'+id_secteur	;    
				jQuery.ajax({    
					type: 'POST',
					url: clients_url,
					data: '',
					dataType: 'json',
					async: true,
					success: function(i){    
						var select = jQuery('#id_vendeuse');
						select.empty().append('<option value="">---Selectionner client---</option>'); 						
						for (var j = 0; j < i.length; j++){                 
							console.log(i[j].id + "--" + i[j].nom);
							jQuery("#id_vendeuse").append("<option value='" +i[j].id+ "'>" +i[j].nom+ "</option>");    
						}  
						
					}    
				});    
			});
			
		});
	</script>
	
<?php include ('inc/foot_form.php'); ?>