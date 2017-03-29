<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<h4>Edition rapide</h4>
<br />
<form action="" method="post" class="quickform">
	<div class="one_half">
        <p>
            <label for="title">Nom Zone</label>
            <input type="text" name="nom" id="nom" value="<?php echo $zone->nom; ?>" />
            <input type="hidden" name="id" id="id" value="<?php echo $zone->id; ?>" />
        </p>
        <p>
			<label style="width:100%">Ville</label>
			<span class="field">
				<select name="ville" id="ville">
					<option value="" selected>Sélectionnez la ville ----------------------------</option>
					<?php 
						if($villes){
							foreach ($villes as $row){
								echo '<option value="'.$row->ville.'" ';
								//if($row->ville == $zone->ville) echo "SELECTED "; 
								echo '>'.$row->ville.'</option>';
							}
					}

					?>
				</select>
			</span>
		</p>
        
    </div><!-- one_half -->
    
    <div class="one_half last">
    	
    </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
    	<button class="update" type="button">Mettre à jour</button>
        <button class="cancel" type="button">Annuler</button>
        <span class="loading"><img src="<?php echo base_url(); ?>assets/images/loaders/loader3.gif" alt="" />Updating changes...</span>
    </div><!-- button -->
</form>
