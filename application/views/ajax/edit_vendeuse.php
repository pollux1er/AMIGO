<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<h4>Edition rapide</h4>
<br />
<form action="" method="post" class="quickform">
	<div class="one_half">
        <p>
			<label>Nom de la vendeuse</label>
			<span class="field"><input type="text" name="nom" id="nom" class="longinput" value="<?php echo $vendeuse->nom; ?>" /></span>
		</p>
		
		<p>
			<label>Zone</label>
			<span class="field">
				<select name="id_secteur" id="id_secteur">
					<option value="">-------------------------------</option>
					<?php 
						if($zones){
							foreach ($zones as $row){
								echo '<option value="'.$row->id.'" ';
								if($row->id == $vendeuse->id_secteur) echo "SELECTED "; 
								echo '>'.$row->nom.'</option>';
							}
					}

					?>
				</select>
			</span>
		</p>
        
    </div><!-- one_half -->
    
    <div class="one_half last">
    	<p>
			<label>Numéro de téléphone</label>
			<span class="field"><input type="text" name="numero" id="numero" class="longinput" value="<?php echo $vendeuse->numero; ?>" /></span>
		</p>
    </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
    	<button class="update" type="button">Mettre à jour</button>
        <button class="cancel" type="button">Annuler</button>
        <span class="loading"><img src="<?php echo base_url(); ?>assets/images/loaders/loader3.gif" alt="" />Updating changes...</span>
		<input type="hidden" name="id" id="id" value="<?php echo $vendeuse->id; ?>" />
    </div><!-- button -->
</form>
