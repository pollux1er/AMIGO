<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include ('inc/head_dashboard.php'); ?>
<?php include ('inc/menu.php'); ?>
        
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Tableau de bord</h1>
            <span class="pagedesc">Aperçu global de la plateforme</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="updates" class="subcontent">
					<!--
                    <div class="notibar announcement">
                        <a class="close"></a>
                        <h3>Announcement</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
					--><!-- notification announcement -->
                    
                    <div class="two_third dashboard_left">
                    
                    	<ul class="shortcuts">
                        	<!--<li><a href="" class="settings"><span>Paramètres</span></a></li>-->
                            <li><a href="<?php echo base_url(); ?>index.php/agent" class="users"><span>Agents</span></a></li><!--
                            <li><a href="" class="gallery"><span>Gallery</span></a></li>
                            <li><a href="" class="events"><span>Events</span></a></li>-->
                            <li><a href="<?php echo base_url('index.php/rapports'); ?>" class="analytics"><span>Rapports</span></a></li>
                        </ul>
                        
                        <br clear="all" />
                    
                        <div class="contenttitle2 nomargintop">
                            <h3>Recensement fidélité</h3>
                        </div><!--contenttitle-->
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="stdtable overviewtable">
                            <colgroup>
                                <col class="con0" width="20%" />
                                <col class="con1" width="20%" />
                                <col class="con0" width="20%" />
                                <col class="con1" width="20%" />
                                <col class="con0" width="20%" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head0">Metrique</th>
                                    <th class="head1">Nombres d'Agents</th>
                                    <th class="head0">Nombres de Clients</th>
                                    <th class="head1">Enregistrements du jour</th>
                                    <th class="head0"> Enregistrements</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    	<div class="progress progress150">
                            				<div class="bar"><div style="width: 60%;" class="value bluebar"></div></div>
                        				</div>
                        			</td>
                                    <td>3</td>
                                    <td>5</td>
                                    <td class="center">28</td>
                                    <td class="center">85</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <br clear="all" />
                        
						<div class="overviewhead">
                        	<div class="overviewselect">
                                <select id="overviewselect" name="select">
                                    <option value="">Last 1 hour ago</option>
                                    <option value="">Last 5 hours ago</option>
                                    <option value="">Today</option>
                                    <option value="">Yesterday</option>
                                    <option value="">This Week</option>
                                    <option value="">Last Week</option>
                                    <option value="">This Month</option>
                                    <option value="">Last Month</option>
                                </select>
                            </div><!--floatright-->
                        	From: &nbsp;<input type="text" id="datepickfrom" /> &nbsp; &nbsp; To: &nbsp;<input type="text" id="datepickto" />
                        </div><!--overviewhead-->
                        
                        <br clear="all" />
						
                        <div id="chartplace" style="height:300px;"></div>
                        
                        <br clear="all" />
                        
                        
                    </div><!--two_third dashboard_left -->
                    
                    <div class="one_third last dashboard_right">
                    
                        <div class="contenttitle2 nomargintop">
                            <h3>Top 3 Vendeuses</h3>
                        </div><!--contenttitle-->
                    
                    
                    	<ul class="toplist">
						<?php if($rang_mamie) { 
							foreach($rang_mamie as $mamie) {
						?>
                        	<li>
                            	<div>
                                	<span class="three_fourth">
                                    	<span class="left">
                                    		<span class="title"><a href=""><?php echo $mamie->nom; ?></a></span>
                                        	<span class="desc"><?php echo $mamie->secteur; ?></span>
                                    	</span><!--left-->
                                    </span><!--three_fourth-->
                                    <span class="one_fourth last">
                                    	<span class="right">
                                        	<span class="h3"><?php echo $mamie->quota; ?></span>
                                        </span><!--right-->
                                    </span><!--one_fourth-->
                                    <br clear="all" />
                                </div>
                            </li>
							<?php }} ?>
                        </ul>
                        
						<div class="widgetbox">
                            <div class="title"><h3>Agents nouvelement enregistrés</h3></div>
                            <div class="widgetoptions">
                                <div class="right"><a href="<?php echo base_url('index.php/agent'); ?>">Voir tous les agents</a></div>
                                <a href="">Ajouter un agent</a>
                            </div>
                            <div class="widgetcontent userlistwidget nopadding">
                                <ul>
								<?php if($agents)
									foreach($agents as $agent) { ?>
                                    <li>
                                        <div class="avatar"><img alt="" src="<?php echo base_url(); ?>assets/images/thumbs/avatar1.png" /></div>
                                        <div class="info">
                                            <a href=""><?php echo $agent->nom . ' ' . $agent->prenom; ?></a> <br />
                                            Bassa <br /> Hier
                                        </div><!--info-->
                                    </li>
									<?php } ?>
									<!--
                                    <li>
                                        <div class="avatar"><img alt="" src="<?php echo base_url(); ?>assets/images/thumbs/avatar2.png" /></div>
                                        <div class="info">
                                            <a href="">Eunice NGONO</a> <br />
                                            Ndogbong <br /> Il y a 3 jours
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar"><img alt="" src="<?php echo base_url(); ?>assets/images/thumbs/avatar1.png" /></div>
                                        <div class="info">
                                            <a href="">Captain Gutt</a> <br />
                                            Bonaberi <br /> Il y a une semaine
                                        </div>
                                    </li>-->
                                </ul>
                                <a class="more" href="<?php echo base_url('index.php/agent'); ?>">Voir plus d'agents</a>
                            </div><!--widgetcontent-->
                        </div>
                                            
                    </div><!--one_third last-->
                    
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display: none;">
            	&nbsp;
            </div><!-- #activities -->
        
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->


<?php include ('inc/foot_dashboard.php'); ?>