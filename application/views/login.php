<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_login.php'); ?>
	
		

	<div class=" container container-table loginbox">
    	<div class="row vertical-center-row loginboxinner">
        	<div class="text-center col-md-4 col-md-offset-4" style="">
           
            <br clear="all" /><br />
            
            
            <div class="logo">
				<img alt="AMIGO" src="<?php echo base_url(); ?>/assets/images/amigologo.png"> 
				<br>
				<p>PROGRAMME DE FIDELISATION</p>
			</div>
            <form id="login" action="" method="post">
            	
                <div class="username">
						<div class="usernameinner">
							<input type="text" name="username" id="username" placeholder="Login" />
						</div>
					</div>
					
					<div class="password">
						<div class="passwordinner">
							<input type="password" name="password" id="password" placeholder="Mot de passe" />
						</div>
					</div>
					
					<button id="login-button">Connexion</button>
					
            
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->

<?php include ('inc/footer_login.php'); ?>
