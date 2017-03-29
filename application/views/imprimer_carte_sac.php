<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<?php include ('inc/head_carte.php'); ?>
    <?php include ('inc/menu.php'); ?>    
    
	<div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Imprimer carte</h1>
            <span class="pagedesc">Cette page contient des cartes pour sac</span>
        </div><!--pageheader-->
        
      <div id="contentwrapper" class="contentwrapper nopadding">
        
        
        	<div class="prodhead">
            	<ul class="prodhead_menu">
                    <li><a class="prev prev_disabled"></a></li>
                    <li><a class="next"></a></li>
                    <li class="right"><span class="pagenuminfo">Affichage 1 - 20 of 25</span></li>
                </ul>
                <span class="clearall"></span>
            </div><!--prodhead-->
            
            <div class="gallerywrapper">

                    <ul class="imagelist">
					<?php 
					
						if($qrs)
							foreach($qrs as $k => $qr) {
								?>
								<li>
								<img src="<?php echo $qr; ?>" alt=""  />
								<span></span>
                        </li>
								
						<?php
							}
                    	
                        ?>
                    </ul>
                    
        	</div><!--gallerywrapper-->
                                        
            <br clear="all" /><br />
                                                
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    <script>
jQuery(document).ready(function(){
	
});
</script>
<?php include ('inc/foot_list.php'); ?>
