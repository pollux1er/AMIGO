<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<h4>Attribuer un agent à ce client</h4>
<br />
<form action="" method="post" class="quickform">
	<div class="one_half">
        <p>
            <label>Zone</label>
			<span class="field">
				<select name="id_agent" id="id_agent">
					<option value="">-------------------------</option>
					<?php 
						if($agents){
							foreach ($agents as $row){
								echo '<option value="'.$row->id.'">'.$row->nom. ' ' . $row->prenom . '</option>';
							}
					}

					?>
				</select>
			</span>
            <input type="hidden" name="id_vendeuse" id="id_vendeuse" value="<?php echo $id; ?>" />
        </p>
        
    </div><!-- one_half -->
    
    <div class="one_half last">
    	
    </div><!-- one_half last -->
    
    <br clear="all" />
    
    <div class="quickformbutton">
    	<button class="attrib" type="button">Attribuer</button>
        <button class="cancel" type="button">Annuler</button>
        <span class="loading"><img src="<?php echo base_url(); ?>assets/images/loaders/loader3.gif" alt="" />Updating changes...</span>
    </div><!-- button -->
</form>
