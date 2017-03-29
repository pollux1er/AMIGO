<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="vernav2 iconmenu">
	<ul>
		<li <?php if($this->uri->uri_string() == 'vendeuse/vendeuse_add' 
						|| $this->uri->uri_string() == 'vendeuse'
						|| $this->uri->uri_string() == 'vendeuse/import_csv'
						
						) { ?> class="current" <?php } ?>><a href="#vendeuses" class="editor">Gestion des vendeuses</a>
			<span class="arrow"></span>
			<ul id="vendeuses">
				<li <?php if($this->uri->uri_string() == 'vendeuse/vendeuse_add') { ?> class="current" <?php } ?>><a href="<?php echo base_url(); ?>index.php/vendeuse/vendeuse_add">Ajouter une vendeuse</a></li>
				<li <?php if($this->uri->uri_string() == 'vendeuse') { ?> class="current" <?php } ?>><a href="<?php echo base_url(); ?>index.php/vendeuse">Lister les vendeuses</a></li>
				<li <?php if($this->uri->uri_string() == 'vendeuse/import_csv') { ?> class="current" <?php } ?>><a href="<?php echo base_url(); ?>index.php/vendeuse/import_csv">Charger la base de données</a></li>
			</ul>
		</li>
		<li <?php if($this->uri->uri_string() == 'zone/zone_add' 
						|| $this->uri->uri_string() == 'agent'
						|| $this->uri->uri_string() == 'agent/agent_add'
						|| $this->uri->uri_string() == 'zone'
						
						) { ?> class="current" <?php } ?>><a href="#agents" class="editor">Gestion des Agents & Zones</a>
			<span class="arrow"></span>
			<ul id="agents">
				<li><a href="<?php echo base_url(); ?>index.php/agent/agent_add">Ajouter un agent</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/agent">Lister les agents</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/zone/zone_add">Ajouter une zone</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/zone">Lister les zones</a></li>
			</ul>
		</li>
		
		<li><a href="#cartes" class="editor">Gestion des cartes</a>
			<span class="arrow"></span>
			<ul id="cartes">
				<li><a href="<?php echo base_url(); ?>index.php/carte/vendeuse">Générer Cartes de fidélité</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/carte/sac">Générer QR Code pour sac</a></li>
			</ul>
		</li>
	</ul>
	<!--
    	<ul>
        	<li><a href="#formsub" class="editor">Forms</a>
            	<span class="arrow"></span>
            	<ul id="formsub">
               		<li><a href="forms.html">Basic Form</a></li>
                    <li><a href="wizard.html">Wizard</a></li>
                    <li><a href="editor.html">WYSIWYG</a></li>
                </ul>
            </li>
            <li><a href="filemanager.html" class="gallery">File Manager</a></li>
            <li><a href="elements.html" class="elements">Elements</a></li>
            <li><a href="widgets.html" class="widgets">Widgets</a></li>
            <li><a href="calendar.html" class="calendar">Calendar</a></li>
            <li><a href="support.html" class="support">Customer Support</a></li>
            <li><a href="typography.html" class="typo">Typography</a></li>
            <li><a href="tables.html" class="tables">Tables</a></li>
			<li><a href="buttons.html" class="buttons">Buttons &amp; Icons</a></li>
            <li><a href="#error" class="error">Error Pages</a>
            	<span class="arrow"></span>
            	<ul id="error">
               		<li><a href="notfound.html">Page Not Found</a></li>
                    <li><a href="forbidden.html">Forbidden Page</a></li>
                    <li><a href="internal.html">Internal Server Error</a></li>
                    <li><a href="offline.html">Offline</a></li>
                </ul>
            </li>
            <li><a href="#addons" class="addons">Addons</a>
            	<span class="arrow"></span>
            	<ul id="addons">
               		<li><a href="newsfeed.html">News Feed</a></li>
                    <li><a href="profile.html">Profile Page</a></li>
                    <li><a href="productlist.html">Product List</a></li>
                    <li><a href="photo.html">Photo/Video Sharing</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                </ul>
            </li>
        </ul>-->
        <a class="togglemenu"></a>
        <br /><br />
    </div>
	
	
	
	<!--leftmenu-->