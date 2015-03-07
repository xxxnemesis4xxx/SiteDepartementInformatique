<html>
	<head>
		<?php
			header('Content-Type: text/html; charset=utf-8');
			setlocale(LC_ALL, 'fr_CA');
		?>	
		<title>Template</title>
		<link rel="stylesheet" href="css/templatePage.css">
		
		<!-- Jquery Icon List -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
		
		<!-- Adobe Text Style for Title -->
		<script type="text/javascript" script-name="wire-one" src="http://use.edgefonts.net/wire-one.js"></script>
		
		<script type="text/javascript" src="javascript/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="javascript/verticalmenu.js"></script>
	</head>
	<body>
		<header>
			<div id="titre_logo">
				<a href="http://cll.qc.ca" target="_blank"><img src="images/logoLevis.png" alt="Cégep Lévis-Lauzon" /></a>
			</div>
			<div id="titre_principal">
				<h1>Techniques de l'informatique </h1>
			</div>
			<div class="menu">
				<ul>
					<li><a href="#1">
						<span>Accès Rapides</span>
					</a>
						<ul class="menuderoulant">
							<?php
							$servername = "localhost";
							$username = "root";
							$password = "admin123*";
							$dbname = "departementinformatique";
				
							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
									die("Erreur de connection: " . $conn->connect_error);
							} 
							
							$sql = "SELECT * from lienmenuderoulant;";
							$result = $conn->query($sql);
			
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								    echo "<li><a href='". $row["lien"] . "' ><span>" . utf8_encode($row["nomLien"]) . "</span></a></li>";
								}
							} else {
									echo "0 results";
							}
				
				
							$conn->close();
						?>
						</ul>
					</li>
				</ul>
			</div>
		</header>
		
		<ul class="form">
		    <li>
		    	<a style="border-left : 5px solid #008747">
		    		<span>
		    			Programmes
		    		</span>
		    	</a>
		    	<ul>
		    		<li>
					<a href="http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-de-gestion-420-aa/" target="_blank" style="border-left : 5px solid #008747">
						<span>
							Gestion
						</span>
					</a>
				</li>
				<li>
					<a href="http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-industrielle-420-ab/" target="_blank" style="border-left : 5px solid #008747">
						<span>
							Industrielle
						</span>
					</a>
				</li>
				<li>
					<a href="http://cll.qc.ca/programmes/techniques/informatique-gestion-de-reseaux/" target="_blank" style="border-left : 5px solid #008747">
						<span>
							Réseau
						</span>
					</a>
				</li>
		    	</ul>
		    </li>
		    <li>
			 <a href="#" style="border-left : 5px solid #cf2130">
			 	<span>
			 		Stage
			 	</span>
			 </a>
		    </li>
		    <li>
		    	<a href="#" style="border-left : 5px solid #fecf54">
		    		<span>
		    			Activités
		    		</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="#" style="border-left : 5px solid #1A0DDB">
		    		<span>
		    			Rallye
		    		</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="#" style="border-left : 5px solid #6800C8">
		    		<span>
		    			Photos
		    		</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="#" style="border-left : 5px solid #CB4CD3">
		    		<span>
		    			Vidéo
		    		</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="#" style="border-left : 5px solid #2B2F56">
		    		<span>
		    			Foire de l'emploie
		    		</span>
		    	</a>
		    </li>
		    <li>
			 <a href="#" style="border-left : 5px solid #EFEC00">
			 	<span>
			 		Club Robotique
			 	</span>
			 </a>
		    </li>
		    <li>
		    	<a href="#" style="border-left : 5px solid #AEAEAE">
		    		<span>
		    			Enseignants
		    		</span>
		    	</a>
		    	<ul>
		    		<li>
		    			<a href="#" style="border-left : 5px solid #AEAEAE">
		    				<span>
		    					Actuellement
		    				</span>
		    			</a>
		    			<ul>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Yvan Morrissey
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Stéphane Mercier
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Christian Asselin
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Serge Lévesque
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Olivier Lafleur
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Mélissa Clermont
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Gilles Champagne
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Marc Deslandes
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Nelson Marceau
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Lise Provencher
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Jocelyne Lapointe
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Josée Lainesse
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Guillaume Michaud
								</span>
							</a>
						</li>
					</ul>
				</li>
				<li>
		    			<a href="#" style="border-left : 5px solid #AEAEAE">
		    				<span>
		    					Technicien(s)
		    				</span>
		    			</a>
		    			<ul>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Louis-Philippe Normand
								</span>
							</a>
						</li>
					</ul>
				</li>
				<li>
		    			<a href="#" style="border-left : 5px solid #AEAEAE">
		    				<span>
		    					À la retraite
		    				</span>
		    			</a>
		    			<ul>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Luce Morin
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Danielle Théberge
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Nicolas Morency
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Richard Landry
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Jacques Chabot
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Normand Lemyre
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									André Charron
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Pierre rajotte
								</span>
							</a>
						</li>
						<li>
							<a href="#" style="border-left : 5px solid #AEAEAE">
								<span>
									Tuy Nguyen
								</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		    		
		    </li>
		    <li>
		    	<a href="http://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=6c5a70be-a08b-e011-969d-0030487d8897&vsro=8&JSEnabled=1" style="border-left : 5px solid #4B7347">
		    		<span>
		    			MSDNAA
		    		</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf" style="border-left : 5px solid #0CC291">
		    		<span>
		    			PDEA
		    		</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="http://cll.qc.ca/programmes/alternance-travail-etudes/" style="border-left : 5px solid #9AFF3C">
		    		<span>
		    			Alternance Travail-Études
		    		</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="#" style="border-left : 5px solid #FF6100">
		    		<span>
		    			Remise des diplômes
		    		</span>
		    	</a>
		    </li>
    		</ul>

		
		<footer id="pied-de-page">
			<div id="font-noir">
				<div id="fond-noir-fade">
					<div class="largeur">
						<div class="colonne">
							<section class="a-propos">
								<h3>à propos</h3>
								<p>
									Le Cégep de Lévis-Lauzon, établissement public d'enseignement supérieur, a pour mission de contribuer 
									au développement de sa région et du Québec par une formation qualifiante, ouverte sur le monde et par 
									des services aux entreprises et aux organisations répondant à leurs besoins.
								</p>
							</section>
													
							<section class="carte">
								<h3>Carte</h3>
								<a target="_blank" href="http://maps.google.ca/maps?q=C%C3%A9gep+L%C3%A9vis-Lauzon,+L%C3%A9vis,+QC&amp;hl=fr&amp;ie=UTF8&amp;sll=49.891235,-97.15369&amp;sspn=50.70371,129.550781&amp;oq=C%C3%A9gep+L%C3%A9vi&amp;t=h&amp;hq=C%C3%A9gep+L%C3%A9vis-Lauzon,+L%C3%A9vis,+QC&amp;z=15&amp;iwloc=A">
									<img alt="Carte" src="http://cll.qc.ca/admin/wp-content/themes/clevislauzon/img/img_pied_carte.jpg">
								</a>
							</section>
						
							<section class="coordonnees">
								<h3>Adresse</h3>
								<p>
									205,&nbsp;route&nbsp;Mgr&nbsp;Bourget,<br>
									Lévis,&nbsp;(Québec), G6V&nbsp;6Z9
								</p>
								<p></p>
								<h3>COORDONATEUR <br>
								Département d'informatique</h3>
								<p>
									Stéphane Mercier<br>
									<a href="mailto:stephane.mercier@cll.qc.ca">stephane.mercier@cll.qc.ca</a>
								</p>
								<h3>Téléphone</h3>
								<p>
									418 833-5110 poste 3826
								</p>
							</section>
													
							<section class="medias-sociaux">
								<h3>Médias sociaux</h3>
								<ul>
									<li class="facebook menu-item menu-item-type-custom menu-item-object-custom menu-item-128">
										<a target="_blank" href="http://www.facebook.com/pages/D%C3%A9partement-dinformatique-C%C3%A9gep-L%C3%A9vis-Lauzon/127878897268010" onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://www.facebook.com']);">
											<span>Facebook</span>
										</a>
									</li>
								</ul>
								
								</section>
													
								<div class="bugfix-ie7-absolute"></div>
													
								<section class="liens">
									<div class="premier">
										<nav class="menu-personnel" role="navigation">
											<ul>
												<li id="menu-item-1572" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1572">
													<a href="http://cll.qc.ca/repertoire-personnel/">
														Répertoire du personnel&nbsp;
														<img src="http://cll.qc.ca/admin/wp-content/themes/clevislauzon/img/img_fleche_blanc.png">
													</a>
												</li>
											</ul>
										</nav>
									</div>
														
									<div class="deuxieme">
									</div>
														
									<div class="dernier">
										<nav class="menu-omnivox" role="navigation">
											<ul>
												<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-127">
													<a href="https://cll.omnivox.ca/intr/Login.aspx?ReturnUrl=/intr" onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://cll.omnivox.ca']);">
														Omnivox
														<img src="http://cll.qc.ca/admin/wp-content/themes/clevislauzon/img/ico_omnivox_big.png">
													</a>
												</li>
											</ul>
										</nav>
									</div>
								</section>
													
							<div class="clearboth">
							</div>
													
						</div>
						
						<div class="copyright">
							<p class="largeur">
								© 2015 Cégep de Lévis-Lauzon
								<span>
									•
								</span>
								Tous droits réservés 2015	
								<br/>Par Marc-André Gagné et Briand Brousseau Demers</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>
