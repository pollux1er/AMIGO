<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_lists.php'); ?>
    <?php include ('inc/menu.php'); ?>    
    
	<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Agents</h1>
            <span class="pagedesc">Liste des clients de l'agent</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                        
                <div class="contenttitle2">
                	<h3>Liste des Clients de l'agent</h3>
                </div><!--contenttitle-->
                
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick" id="dyntable">
                    <colgroup>
                       <col class="con1" />
                        <col class="con0" width="10%" />
                        <col class="con1" width="10%" />
                        <col class="con1" width="20%" />
                        <col class="con0" width="10%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head1">Nom</th>
                            <th class="head0">Numero</th>
                            <th class="head1">Carte</th>
                            <th class="head0">Secteur</th>
                            <th class="head1">Quota</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head1">Nom</th>
                            <th class="head0">Numero</th>
                            <th class="head1">Carte</th>
                            <th class="head0">Secteur</th>
                            <th class="head1">Quota</th>
                        </tr>
                    </tfoot>
                    <tbody>
					<?php if($liste){
                            foreach ($liste as $row){
                                echo '<tr>
                                        <td>'.$row->nom.'</td>
                                        <td>'.$row->numero.'</td>
                                        <td><a href="' . base_url() . 'index.php/vendeuse/voir_carte/'.$row->id_vendeuse.'">Voir</a></td>
                                        <td>'.$this->zone_model->getSecteurNameById($row->id_secteur).'</td>';
										
                                        
								echo '
                                        <td class="center">0</td>
                                      </tr>';
                            }
                    } ?>
                  
                       <!-- <tr>
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td class="center"><a href="<?php echo base_url(); ?>assets/ajax/zone.php" class="toggle">Modifier</a></td>
                        </tr>-->
                    </tbody>
                </table>
                
                <br /><br />
               
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    <script>
jQuery(document).ready(function(){
	jQuery('.toggledata button.attrib').live('click',function(){
		var nouveau_agent = jQuery(this).closest("form").find('#id_agent :selected').text();
		var id = jQuery(this).closest("form").find('input[name="id_vendeuse"]').val();
		var url = '<?php echo base_url() . "index.php/ajax/save_agent_vendeuse/"; ?>';
		//alert(id);
		jQuery(this).parents('.toggledata').animate({height: 0},200, function(){
			jQuery(this).parents('tr').prev().removeClass('hiderow');															 
			jQuery(this).parents('tr').remove();
			jQuery('#tda-'+id).html(nouveau_agent);
		});
		jQuery.post(url, jQuery(this).closest("form").serializeArray(), function(data){
			console.log(data);
		});
		return false;
	});
	
	jQuery('.toggledata button.update').live('click',function(){
		var nouveau_nom = jQuery(this).closest("form").find('input[name="nom"]').val();
		var nouveau_nunero = jQuery(this).closest("form").find('input[name="numero"]').val();
		//var nouveau_secteur = jQuery(this).closest("form").find('input[name="id_secteur"]').val();
		var nouveau_secteur = jQuery(this).closest("form").find('input[name="id_secteur"]').val();
		var secteur = jQuery("#id_secteur option:selected").text();
		var url = '<?php echo base_url() . "index.php/ajax/save_vendeuse/"; ?>';
		var id = jQuery(this).closest("form").find('input[name="id"]').val();
		//alert(id);
		jQuery(this).parents('.toggledata').animate({height: 0},200, function(){
			jQuery(this).parents('tr').prev().removeClass('hiderow');															 
			jQuery(this).parents('tr').remove();
			jQuery('#td-'+id).html(nouveau_nom);
			jQuery('#tdn-'+id).html(nouveau_nunero);
			jQuery('#tds-'+id).html(secteur);
		});
		jQuery.post(url, jQuery(this).closest("form").serializeArray(), function(data){
			console.log(data);
		});
		return false;
	});
	
	jQuery('.stdtable a.delete').click(function(){
		var c = confirm('Voulez vous supprimer cette vendeuse ?');
		var url = jQuery(this).attr('href');
		//alert(url);
		if(c) jQuery(this).parents('tr').fadeOut(function(){ 
			jQuery(this).remove();
			jQuery.get(url, function(data){
				console.log(data);
			});
		});
		return false;
	});
});
</script>
<?php include ('inc/foot_list.php'); ?>
