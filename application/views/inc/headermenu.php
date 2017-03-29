<?php defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($this->uri->uri_string()); die;
 ?>
	<ul class="headermenu">
		<li <?php if($this->uri->uri_string() == '' || $this->uri->uri_string() == 'dashboard') { ?> class="current" <?php } ?>><a href="<?php echo base_url(); ?>"><span class="icon icon-flatscreen"></span>Tableau de Bord</a></li>
		<li <?php if($this->uri->uri_string() == 'sms') { ?> class="current" <?php } ?>><a href="<?php echo base_url('index.php/sms'); ?>"><span class="icon icon-message"></span>SMS</a></li>
		<li <?php if($this->uri->uri_string() == 'rapports') { ?> class="current" <?php } ?>><a href="<?php echo base_url('index.php/rapports'); ?>"><span class="icon icon-chart"></span>Rapports</a></li>
	</ul>
	<div class="headerwidget">
		<div class="earnings">
			
			<div class="one_half last alignright" style="width : 100%">
				<h4>Enregistrements de la journée</h4>
				<h2><?php echo $nbrec; ?></h2>
			</div><!--one_half last-->
		</div><!--earnings-->
	</div><!--headerwidget-->