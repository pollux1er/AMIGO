<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_lists.php'); ?>
    <?php include ('inc/menu.php'); ?>    
    
	<div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Agents</h1>
            <span class="pagedesc">Gestion des Agents & des Zones</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                        
                <div class="contenttitle2">
                	<h3>Liste des agents</h3>
                </div><!--contenttitle-->
                <div class="notibar msgsuccess" style="display:none;">
					<a class="close"></a>
					<p id="sms">Mot de passe envoyé par SMS au 699454152</p>
				</div>
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablequick">
                    <colgroup>
                        <col class="con0" width="3%" />
                        <col class="con1" width="15%"/>
                        <col class="con0" width="12%" />
                        <col class="con1" width="10%" />
                        <col class="con0" width="20%" />
                        <col class="con1" width="10%" />
                        <col class="con1" width="10%" />
                        <col class="con0" width="15%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">#</th>
                            <th class="head1">Nom</th>
                            <th class="head0">Prenom</th>
                            <th class="head1">Numero</th>
                            <th class="head0">Email</th>
                            <th class="head1">Enregistrements</th>
                            <th class="head1">Clients</th>
                            <th class="head0"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">#</th>
                            <th class="head1">Nom</th>
                            <th class="head0">Prenom</th>
                            <th class="head1">Numero</th>
                            <th class="head0">Email</th>
                            <th class="head1">Enregistrements</th>
                            <th class="head1">Clients</th>
                            <th class="head0"></th>
                        </tr>
                    </tfoot>
                    <tbody>
					<?php if($liste){
                            foreach ($liste as $row){
                                echo '<tr>
                                        <td>'.$row->id.'</td>
                                        <td id="td-'.$row->id.'">'.$row->nom.'</td>
                                        <td id="tdp-'.$row->id.'">'.$row->prenom.'</td>
                                        <td id="tdn-'.$row->id.'">'.$row->numero.'</td>
                                        <td id="tde-'.$row->id.'">'.$row->email.'</td>
                                        <td><a href="' . base_url() . 'index.php/agent/list_records/' . $row->id . '">'.$row->nbrecords.'</a></td>
                                        <td><a href="' . base_url() . 'index.php/agent/list_client/' . $row->id . '">'.$row->nbclients.'</a></td>
                                        <td class="center">
										<a href="' . base_url() . 'index.php/ajax/edit_agent/' . $row->id . '" class="toggle">Modifier</a>&nbsp;|&nbsp; 
                                        <a href="' . base_url() . 'index.php/ajax/pass_agent/' . $row->id . '" class="password">Code</a>&nbsp;|&nbsp;
                                        <a href="' . base_url() . 'index.php/ajax/delete_agent/' . $row->id . '" class="delete">Effacer</a>
										</td>
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
		var nouveau_prenom = jQuery(this).closest("form").find('input[name="prenom"]').val();
		var nouveau_numero = jQuery(this).closest("form").find('input[name="numero"]').val();
		var nouveau_email = jQuery(this).closest("form").find('input[name="email"]').val();
		var id = jQuery(this).closest("form").find('input[name="id"]').val();
		var url = '<?php echo base_url() . "index.php/ajax/save_agent/"; ?>';
		
		jQuery(this).parents('.toggledata').animate({height: 0},200, function(){
			jQuery(this).parents('tr').prev().removeClass('hiderow');															 
			jQuery(this).parents('tr').remove();
			jQuery('#td-'+id).html(nouveau_nom);
			jQuery('#tdp-'+id).html(nouveau_prenom);
			jQuery('#tdn-'+id).html(nouveau_numero);
			jQuery('#tde-'+id).html(nouveau_email);
		});
		jQuery.post(url, jQuery(this).closest("form").serializeArray(), function(data){
			console.log(data);
		});
		return false;
	});
	
	jQuery('.stdtable a.password').click(function(){
		var c = confirm('Voulez vous envoyer un code d\'accès à cet agent par SMS ?');
		var url = jQuery(this).attr('href');
		//alert(url);
		if(c) 
			jQuery.get(url, function(data){
				jQuery(".msgsuccess").fadeIn();
				jQuery('#sms').html("Mot de passe envoyé par SMS au numéro de l'agent");
				setTimeout(function(){
					jQuery(".msgsuccess").fadeOut();
				}, 5000);
			});
		return false;
	});
	
	jQuery('.stdtable a.delete').click(function(){
		var c = confirm('Voulez vous supprimer cet agent ?');
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
