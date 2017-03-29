<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<h4>Edition rapide</h4>
<br />
<form action="" method="post" class="quickform">
	<div class="one_half">
        <p>
			<label>Nom de l'agent</label>
			<span class="field"><input type="text" name="nom" id="nom" class="longinput" value="<?php echo $agent->nom; ?>" /></span>
		</p>
		 <p>
			<label>Prenom de l'agent</label>
			<span class="field"><input type="text" name="prenom" id="prenom" class="longinput" value="<?php echo $agent->prenom; ?>" /></span>
		</p>
		
    </div><!-- one_half -->
    
    <div class="one_half last">
    	<p>
			<label>Numéro de téléphone</label>
			<span class="field"><input type="text" name="numero" id="numero" class="longinput" value="<?php echo $agent->numero; ?>" /></span>
		</p>
		<p>
			<label>Email</label>
			<span class="field"><input type="text" name="email" id="email" class="longinput" value="<?php echo $agent->email; ?>" /></span>
		</p>
    </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
    	<button class="update" type="button">Mettre à jour</button>
        <button class="cancel" type="button">Annuler</button>
        <span class="loading"><img src="<?php echo base_url(); ?>assets/images/loaders/loader3.gif" alt="" />Updating changes...</span>
		<input type="hidden" name="id" id="id" value="<?php echo $agent->id; ?>" />
    </div><!-- button -->
</form>
