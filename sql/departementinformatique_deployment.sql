/* Create our Database */
create database IF NOT EXISTS equipe6h15;


/****************************************************
*
*
* Table Containing Links for General drop down menu
*
*
****************************************************/
DROP TABLE IF EXISTS equipe6h15.lienmenuderoulant;

CREATE TABLE IF NOT EXISTS equipe6h15.lienmenuderoulant(
menuId INT NOT NULL auto_increment PRIMARY KEY,
nomLien varchar(100) NOT NULL,
lien varchar(20000) NOT NULL,
renderHtmlPosition INT NOT NULL UNIQUE)
ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Omnivox','https://cll.omnivox.ca/intr/Module/Identification/Login/Login.aspx?ReturnUrl=/intr', 1);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Messagerie','https://alphonse2.clevislauzon.qc.ca/gw/webacc', 2);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Repro+','https://repro.clevislauzon.qc.ca/sysrepro/login/login.asp', 3);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Repertoire du personnel','http://cll.qc.ca/repertoire-personnel/', 4);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Alternance Travail-Études','http://cll.qc.ca/programmes/alternance-travail-etudes/', 5);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'MSDNAA', 'http://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=6c5a70be-a08b-e011-969d-0030487d8897&vsro=8&JSEnabled=1', 6);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'PDÉA','http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf', 7);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Accueil','http://www.cll.qc.ca/informatique/index2.php', 8);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Site du cégep','http://cll.qc.ca/', 9);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Facebook','https://www.facebook.com/pages/D%C3%A9partement-dinformatique-C%C3%A9gep-L%C3%A9vis-Lauzon/127878897268010', 10);
INSERT INTO equipe6h15.lienmenuderoulant VALUES(default,'Nous joindre','#bas', 11);


/********************************************************
*
*
* Table containing Details for generating Vertical menu
*
*
********************************************************/


DROP TABLE IF EXISTS equipe6h15.verticalmenu;

CREATE TABLE IF NOT EXISTS equipe6h15.verticalmenu(
menuId INT NOT NULL auto_increment PRIMARY KEY,
nomLien VARCHAR(100) NOT NULL,
lien VARCHAR(20000),
layer INT NOT NULL,
renderHtmlPosition INT NOT NULL UNIQUE,
htmlCouleur VARCHAR(6) NOT NULL,                  
openNewPage boolean NOT NULL default FALSE,
CONSTRAINT fk_verticalmenu_renderHtmlPosition FOREIGN KEY (`renderHtmlPosition`) REFERENCES equipe6h15.verticalmenu(`menuId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO equipe6h15.verticalmenu VALUES (default,'Programmes', 'http://205.236.12.52/projet/h2015/equipe6/programmes.php', 1, 1, '008747', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Gestion', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-de-gestion-420-aa/',  2, 2, '873400', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Industrielle', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-industrielle-420-ab/', 2, 3, '870020', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Réseaux', 'http://cll.qc.ca/programmes/techniques/informatique-gestion-de-reseaux/', 2, 4, '240087', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Événements', 'http://205.236.12.52/projet/h2015/equipe6/evenement.php', 1, 5, 'cf2130', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Activités', 'http://205.236.12.52/projet/h2015/equipe6/activite.php', 2, 6, 'fecf54', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Foire de l\'emploie', 'http://205.236.12.52/projet/h2015/equipe6/foireemploi.php', 2, 7, '2B2F56', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Rallye', 'http://205.236.12.52/projet/h2015/equipe6/rallye.php', 2, 8, '1A0DDB', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Remise des Diplomes', 'http://205.236.12.52/projet/h2015/equipe6/diplome.php', 2, 9, '836E37', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Vidéos Promotionnelles', 'http://205.236.12.52/projet/h2015/equipe6/videopromo.php', 2, 10, 'CB4CD3', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Enseignants', 'http://205.236.12.52/projet/h2015/equipe6/enseignant.php', 1, 11, 'AEAEAE', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Actuellement', NULL, 2, 12, '957777', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Yvan Morrissey', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/yvanmorrissey.php', 3, 13, '8C2F19', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Stéphane Mercier', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/stephanemercier.php', 3, 14, '779395', FALSE);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Christian Asselin', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/christianasselin.php', 3, 15, '8C1919', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Serge Lévesque', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/sergelevesque.php', 3, 16, '6E3E33', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Olivier Lafleur', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/olivierlafleur.php', 3, 17, '382723', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Mélissa Clermont', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/melissaclermont.php', 3, 18, 'F0AB80', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Gilles Champagne', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/gilleschampagne.php', 3, 19, 'A18964', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Marc Deslandes', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/marcdeslandes.php', 3, 20, '1B1306', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Nelson Marceau', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/nelsonmarceau.php', 3, 21, '7C7C7C', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Lise Provencher', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/liseprovencher.php', 3, 22, '493E2E', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Jocelyne Lapointe', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/jocelynelapointe.php', 3, 23, 'A1855A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Josée Lainesse', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/joseelainesse.php', 3, 24, 'A99F33', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Guillaume Michaud', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/guillaumemichaud.php', 3, 25, '575008', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Technicien(s)', NULL, 2, 26, '779395', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Louis-Philippe Normand', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/louisphilippenormand.php', 3, 27, '6B7C37', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'À la retraite', NULL, 2, 28, '599959', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Luc Morin', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/lucmorin.php', 3, 29, '759612', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Danielle Théberge', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/danielletheberge.php', 3, 30, 'B1EA0A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Nicolas Morency', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/nicolasmorency.php', 3, 31, '7EEA0A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Richard Landry', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/richardlandry.php', 3, 32, '2E5109', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Jacques Chabot', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/jacqueschabot.php', 3, 33, '1B2D07', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Normand Lemyre', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/nordmandlemyre.php', 3, 34, '11D031', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'André Charon', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/andrecharon.php', 3, 35, '2D843C', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Pierre Rajotte', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/pierrerajotte.php', 3, 36, '2D8460', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Tuy Nguyen', 'http://205.236.12.52/projet/h2015/equipe6/enseignant/tuynguyen.php', 3, 37, '45D096', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Club Robotique', 'http://205.236.12.52/projet/h2015/equipe6/clubrobot.php', 1, 38, 'EFEC00', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Liens Utilies',NULL, 1, 39, 'DB00FF', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Alternance Travail-Études', 'http://cll.qc.ca/programmes/alternance-travail-etudes/', 2, 40, '9AFF3C', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'MSDNAA', 'http://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=6c5a70be-a08b-e011-969d-0030487d8897&vsro=8&JSEnabled=1', 2, 41, '4B7347', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'PDEA', 'http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf', 2, 42, '0CC291', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Stages', NULL, 1, 43, '6F4876', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Critères d\'admissibilités','http://205.236.12.52/projet/h2015/equipe6/stagecritere.php', 2, 44, 'B1EA0A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Dates des Stages','http://205.236.12.52/projet/h2015/equipe6/datestages.php', 2, 45, '2E5109', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Document d\'information', 'http://www.cll.qc.ca/informatique/2014_Lettre_stage_H-2014GIR_1.pdf' , 2, 46, '1B2D07', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Formation des Étudiants', 'http://205.236.12.52/projet/h2015/equipe6/formationetudiant.php', 2, 47, '2D843C', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Responsables des Stages', 'http://205.236.12.52/projet/h2015/equipe6/responsablestage.php', 2, 48, '11D031', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Stages en France', 'http://205.236.12.52/projet/h2015/equipe6/france.php', 2, 49, '45D096', false);


/***************************************************
*
*
* Table containing info for Rendering index
*
*
***************************************************/

DROP TABLE IF EXISTS equipe6h15.displaymenu;

CREATE TABLE IF NOT EXISTS equipe6h15.displaymenu(
itemId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
nomFichier VARCHAR(100) NOT NULL,
colspan INT NOT NULL DEFAULT 1,
rowspan INT NOT NULL DEFAULT 1,
position INT NOT NULL UNIQUE,
lastCols BOOLEAN NOT NULL DEFAULT FALSE
) ENGINE=INNODB DEFAULT CHARSET=utf8;


INSERT INTO equipe6h15.displaymenu VALUES (default, 'pub.html', default, default, 1, false);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'gestion.html', default, default, 2, false);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'industrielle.html', default, default, 3, false);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'reseau.html', default, default, 4, false);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'pub2.html', default, default, 5, true);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'enseignant.html', 2, 2, 6, false);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'pdea.html', default, default, 9, false);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'evenement.html', 2, 2, 8, true);
INSERT INTO equipe6h15.displaymenu VALUES (default, 'robotique.html', default, default, 7, false);


/********************************************************
*
*
*	Table containing info for Rendering Teachers
*
*
*********************************************************/
DROP TABLE IF EXISTS equipe6h15.enseignants;

CREATE TABLE IF NOT EXISTS equipe6h15.enseignants(
enseignantId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(80) NOT NULL,
pathPicture VARCHAR(200) NOT NULL,
pathFile VARCHAR(200) NOT NULL,
renderPosition INT NOT NULL UNIQUE
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO equipe6h15.enseignants VALUES(default, 'Yvan Morrissey', 'Images/photoProfileDefault.png', 'enseignant/yvanmorrissey.php', 1);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Stéphane Mercier', 'Images/photoProfileDefault.png', 'enseignant/stephanemercier.php', 2);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Christian Asselin', 'Images/photoProfileDefault.png', 'enseignant/christianasselin.php', 3);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Serge Lévesque', 'Images/photoProfileDefault.png', 'enseignant/sergelevesque.php', 4);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Olivier Lafleur', 'Images/photoProfileDefault.png', 'enseignant/olivierlafleur.php', 5);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Mélissa Clermont', 'Images/photoProfileDefault.png', 'enseignant/melissaclermont.php', 6);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Gilles Champagne', 'Images/photoProfileDefault.png', 'enseignant/gilleschampagne.php', 7);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Marc Deslandes', 'Images/photoProfileDefault.png', 'enseignant/marcdeslandes.php', 8);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Nelson Marceau', 'Images/photoProfileDefault.png', 'enseignant/nelsonmarceau.php', 9);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Lise Provencher', 'Images/photoProfileDefault.png', 'enseignant/liseprovencher.php', 10);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Jocelyne Lapointe', 'Images/photoProfileDefault.png', 'enseignant/jocelynelapointe.php', 11);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Josée Lainesse', 'Images/photoProfileDefault.png', 'enseignant/joseelainesse.php', 12);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Guillaume Michaud', 'Images/photoProfileDefault.png', 'enseignant/guillaumemichaud.php', 13);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Louis-Philippe Normand', 'Images/photoProfileDefault.png', 'enseignant/louisphilippenormand.php', 14);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Luc Morin', 'Images/photoProfileDefault.png', 'enseignant/lucmorin.php', 15);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Danielle Théberge', 'Images/photoProfileDefault.png', 'enseignant/danielletheberge.php', 16);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Nicolas Morency', 'Images/photoProfileDefault.png', 'enseignant/nicolasmorency.php', 17);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Richard Landry', 'Images/photoProfileDefault.png', 'enseignant/richardlandry.php', 18);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Jacques Chabot', 'Images/photoProfileDefault.png', 'enseignant/jacqueschabot.php', 19);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Normand Lemyre', 'Images/photoProfileDefault.png', 'enseignant/nordmandlemyre.php', 20);
INSERT INTO equipe6h15.enseignants VALUES(default, 'André Charon', 'Images/photoProfileDefault.png', 'enseignant/andrecharon.php', 21);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Pierre Rajotte', 'Images/photoProfileDefault.png', 'enseignant/pierrerajotte.php', 22);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Tuy Nguyen', 'Images/photoProfileDefault.png', 'enseignant/tuynguyen.php', 23);
