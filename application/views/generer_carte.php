<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<?php include ('inc/head_carte.php'); ?>
    <?php include ('inc/menu.php'); ?>    
    
	<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Imprimer les cartes de fidélité</h1>
            <span class="pagedesc">Générer les cartes de fidélité en lot pour impression</span>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper invoicewrapper">
                        
                 <div class="one_half">
            
				  <div class="amountdue" style="text-align:left">
					<a href="<?php echo base_url() . 'index.php/carte/imprimer/25'; ?>">Imprimer 25 cartes </a>
					
				  </div>
				  <div class="amountdue" style="text-align:left">
					<a href="<?php echo base_url() . 'index.php/carte/imprimer/50'; ?>">Imprimer 50 cartes </a>
				  </div>
				</div>
			
			<!--one_half-->
            
			<div class="one_half last">
          
          
                                    
               
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    <script>
jQuery(document).ready(function(){
	
});
</script>
<?php include ('inc/foot_list.php'); ?>
