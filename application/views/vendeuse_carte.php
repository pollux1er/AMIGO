<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<?php include ('inc/head_carte.php'); ?>
    <?php include ('inc/menu.php'); ?>    
    
	<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Carte du client</h1>
            <span class="pagedesc">Ceci est un apercu de la carte de fidélité du client avec les historiques de recensement.</span>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper invoicewrapper">
                        
                 <div class="one_half">
            
              <div class="invoice_logo">
				<!--<img src="<?php echo $qr_code_image_url?>" >-->
				<img src="<?php echo base_url(); ?>assets/images/carte_agent.php?name=<?php echo $vendeuse->nom; ?>&username=&phone=<?php echo $vendeuse->numero; ?>&quartier=<?php echo $this->zone_model->getSecteurNameById($vendeuse->id_secteur); ?>&id=<?php echo $vendeuse->id; ?>" width="450px" >
			  
			  </div>
              <!--
              <table cellpadding="0" cellspacing="0" class="table invoicefor">
               	  <tr>
                   	  <td width="30%">Invoice For:</td>
                      <td width="70%"><strong>John Doe</strong></td>
                  </tr>
               	  <tr>
               	    <td>Project ID:</td>
               	    <td>HF12-23DFF</td>
           	    </tr>
                	<tr>
                	  <td>Project Name:</td>
                	  <td>Company Website Design</td>
              	  </tr>
              </table>-->
            </div>
			
			<!--one_half-->
            
			<div class="one_half last"><!--
            <table cellpadding="0" cellspacing="0" class="table">
               	  <tr>
                   	  <td width="30%">From:</td>
                      <td width="70%">
                      	<strong>ThemePixels, Inc.</strong> <br />
                        201 Something St., Something Town, <br />
                        YT 242, Country 6546 <br />
                        Tel No: 324 445-4544 <br />
                        Email: youremail@companyname.com
                      </td>
                  </tr>
              </table>
           -->
              <table cellpadding="0" cellspacing="0" class="table">
               	  <tr>
                   	  <td width="30%">Nom :</td>
                      <td width="70%"><strong><?php echo $vendeuse->nom; ?></strong></td>
                  </tr>
               	  <tr>
               	    <td>Numero :</td>
               	    <td><strong><?php echo $vendeuse->numero; ?></strong></td>
           	    </tr>
                	<tr>
                	  <td>Secteur :</td>
                	  <td><strong><?php echo $this->zone_model->getSecteurNameById($vendeuse->id_secteur); ?></strong></td>
              	  </tr>
				  <tr>
                	  <td>Id :</td>
                	  <td><strong><?php echo $vendeuse->id; ?></strong></td>
              	  </tr>
              </table>
			  <!--<img src="<?php echo $qr_code_image_url?>" />-->
            </div><!--one_half-->
            
            <br clear="all" />
            
            <table cellpadding="0" cellspacing="0" border="0" class="stdtable invoicetable">
                    <colgroup>
                        <col class="con0" width="15%" />
                        <col class="con1" width="25%" />
                        <col class="con0" width="15%" />
                        <col class="con1" width="15%" />
                        <col class="con0" width="20%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Date</th>
                            <th class="head1">Agent de recensement</th>
                            <th class="head0 right">Quantité achetée</th>
                            <th class="head1 right">Type de sac</th>
                            <th class="head0 right">Points</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						$sum = 0;
						if($logs){
							$sum = 0; $pt = 1;
                            foreach ($logs as $row){
                                echo '<tr><td>'.$row->date.'</td>
									<td>'.$row->nom.' '.$row->prenom.'</td>
									<td class="right">1</td>
									<td class="right">'.$row->type.'</td>
									<td class="right"><strong>'.$pt .'</strong></td>
								</tr>';
								$sum = $sum + $pt;
							}
					}
                        ?>
                    </tbody>
                </table>
                  <!--              
                <table cellpadding="0" cellspacing="0" border="0" class="invoicetable">
                    <colgroup>
                        <col class="con0" width="80%" />
                        <col class="con1" width="20%" />
                  </colgroup>
                    <tbody>
                        <tr>
                            <td class="right" style="border-right: 1px solid #ddd; padding-right: 10px; ">
                            	Subtotal <br />
                                Tax (5%) <br />
                                Discount
                            </td>
                            <td class="right"><strong>$6,000 <br />$600 <br />$50</strong></td>
                        </tr>
                    </tbody>
          </table>-->
			
          <div class="amountdue">
          	<h1><span>Total des points:</span> <?php echo $sum; ?> </h1>
            <a href="<?php echo base_url() . "vendeuse/telecharge_carte/1"; ?>">Imprimer carte de fidélité</a>
          </div>
          
                                    
               
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    <script>
jQuery(document).ready(function(){
	
});
</script>
<?php include ('inc/foot_list.php'); ?>
                                                                                                                                                               