<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_lists.php'); ?>
    <?php include ('inc/menu.php'); ?>    
    
	<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Secteur</h1>
            <span class="pagedesc">Gestion des secteurs</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                        
                <div class="contenttitle2">
                	<h3>Liste des différents secteurs</h3>
                </div><!--contenttitle-->
                
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" width="5%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" width="12%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">#</th>
                            <th class="head1">Zone</th>
                            <th class="head0">Ville</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                             <th class="head0">#</th>
                            <th class="head1">Zone</th>
                            <th class="head0">Ville</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
					<?php if($liste){
                            foreach ($liste as $row){
                                echo '<tr>
                                        <td>'.$row->id.'</td>
                                        <td id="td-'.$row->id.'">'.$row->nom.'</td>
                                        <td id="tdv-'.$row->id.'">'.$row->ville.'</td>
                                        <td class="center"><a href="' . base_url() . 'index.php/ajax/edit_zone/' . $row->id . '" class="toggle">Modifier</a>&nbsp; 
															<a href="' . base_url() . 'index.php/ajax/delete_zone/' . $row->id . '" class="delete">Effacer</a></td>
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
	jQuery('.toggledata button.update').live('click',function(){
		
		var nouveau_nom = jQuery(this).closest("form").find('input[name="nom"]').val();
		var nouvelle_ville = jQuery("#ville option:selected").val();
		var id = jQuery(this).closest("form").find('input[name="id"]').val();
		var url = '<?php echo base_url() . "index.php/ajax/save_zone/"; ?>';
		//alert(nouvelle_ville);
		jQuery(this).parents('.toggledata').animate({height: 0},200, function(){
			jQuery(this).parents('tr').prev().removeClass('hiderow');															 
			jQuery(this).parents('tr').remove();
			jQuery('#td-'+id).html(nouveau_nom);
			jQuery('#tdv-'+id).html(nouvelle_ville);
		});
		jQuery.post(url, jQuery(this).closest("form").serializeArray(), function(data){
			console.log(data);
		});
		return false;
	});
	
	jQuery('.stdtable a.delete').click(function(){
		var c = confirm('Voulez vous supprimer ce secteur ?');
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
