<html>
	<head>
		<?php
			header('Content-Type: text/html; charset=utf-8');
			setlocale(LC_ALL, 'fr_CA');
		?>	
		<title>Template</title>
		<link rel="stylesheet" href="css/templatePage.css">
		<script type="text/javascript" script-name="wire-one" src="http://use.edgefonts.net/wire-one.js"></script>
	</head>
	</body>
		<header>
			<div id="titre_logo">
				<a href="http://cll.qc.ca" target="_blank"><img src="images/logoLevis.png" alt="Cégep Lévis-Lauzon" /></a>
			</div>
			<div id="titre_principal">
				<h1>Techniques de l'informatique </h1>
			</div>
			<div id="titre_menu">
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
										
					<div>
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
	</body>
</html>
