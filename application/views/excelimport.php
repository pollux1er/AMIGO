<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_upload.php'); ?>
    <?php include ('inc/menu.php'); ?>  

    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Clients</h1>
            <span class="pagedesc">Importer les données dans la base</span>
            
           <!-- <ul class="hornav">
                <li class="current"><a href="#basicform">Basic</a></li>
                <li><a href="#validation">Validation</a></li>
            </ul>-->
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        	
			<div class="notibar msgsuccess" style="display:none;">
				<a class="close"></a>
				<p>Enregistrement réussi</p>
			</div>
        	<div id="validation" class="subcontent" style="">
            	
                    <form action="<?php echo base_url(); ?>index.php/vendeuse/import" method="post" name="upload_excel" enctype="multipart/form-data">
                    	<p>
                        	<label>Charger le fichier</label>
                            <span class="field">
                            	<input type="file" name="donnees" />
                            </span>
                        </p>
                        
                        <p class="stdformbutton">
                        	<input class="submit radius2" type="submit" value="Importer" name="import" />
                        </p>
                    </form>

            </div><!--subcontent-->
			
			<br>
			<a href="<?php echo base_url(); ?>sample.csv" class="btn btn2 btn_search"><span>Echantillon de fichier CSV</span></a>
			<br><br>
			
			
			<table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Nom</th>
                            <th class="head1">Numero</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
							<th class="head0">Nom</th>
                            <th class="head1">Numero</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php
						if(isset($view_data) && is_array($view_data) && count($view_data)) : $i=1;
							foreach ($view_data as $key => $data) { 
							?>
							  <tr>
								<td><?php echo $data['nom'] ?></td>
								<td><?php echo $data['numero'] ?></td>
							  </tr>
							<?php } endif; ?>
					</tbody>
				</table>

			
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    <script>
		jQuery(document).ready(function(){
			
			
		});
	</script>
<?php include ('inc/foot_form.php'); ?>