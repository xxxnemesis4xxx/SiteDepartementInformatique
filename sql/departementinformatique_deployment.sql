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
position INT NOT NULL,
layer INT NOT NULL,
renderHtmlPosition INT NOT NULL,
htmlCouleur VARCHAR(6) NOT NULL,                  
openNewPage boolean NOT NULL default FALSE,
CONSTRAINT fk_verticalmenu_renderHtmlPosition FOREIGN KEY (`renderHtmlPosition`) REFERENCES equipe6h15.verticalmenu(`menuId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO equipe6h15.verticalmenu VALUES (default,'Programmes', 'programmes.php', 1, 1, 1, '008747', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Gestion', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-de-gestion-420-aa/', 1, 2, 1, '873400', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Industrielle', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-industrielle-420-ab/', 2, 2, 1, '870020', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Réseaux', 'http://cll.qc.ca/programmes/techniques/informatique-gestion-de-reseaux/', 3, 2, 1, '240087', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Événements', 'evenement.php', 1, 1, 2, 'cf2130', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Activités', 'activite.php', 1, 2, 2, 'fecf54', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Foire de l\'emploie', 'foireemploi.php', 3, 2, 2, '2B2F56', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Rallye', 'rallye.php', 4, 2, 2, '1A0DDB', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Remise des Diplomes', 'diplome.php', 5, 2, 2, '836E37', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Vidéos Promotionnelles', 'videopromo.php', 6, 2, 2, 'CB4CD3', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Enseignants', 'enseignant.php', 1 , 1, 3, 'AEAEAE', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Actuellement', NULL, 1, 2, 3, '957777', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Yvan Morrissey', 'yvanmorrissey.php', 1, 3, 3, '8C2F19', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Stéphane Mercier', 'stephanemercier.php', 2, 3, 3, '779395', FALSE);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Christian Asselin', 'christianasselin.php', 3, 3, 3, '8C1919', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Serge Lévesque', 'sergelevesque.php', 4, 3, 3, '6E3E33', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Olivier Lafleur', 'olivierlafleur.php', 5, 3, 3, '382723', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Mélissa Clermont', 'melissaclermont.php', 6, 3, 3, 'F0AB80', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Gilles Champagne', 'gilleschampagne.php', 7, 3, 3, 'A18964', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Marc Deslandes', 'marcdeslandes.php', 8, 3, 3, '1B1306', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Nelson Marceau', 'nelsonmarceau.php', 9, 3, 3, '7C7C7C', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Lise Provencher', 'liseprovencher.php', 10, 3, 3, '493E2E', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Jocelyne Lapointe', 'jocelynelapointe.php', 11, 3, 3, 'A1855A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Josée Lainesse', 'joseelainesse.php', 12, 3, 3, 'A99F33', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Guillaume Michaud', 'guillaumemichaud.php', 13, 3, 3, '575008', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Technicien(s)', NULL, 2, 2, 4, '779395', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Louis-Philippe Normand', 'louisphilippenormand.php', 1, 3, 4, '6B7C37', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'À la retraite', NULL, 3, 2, 5, '599959', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Luc Morin', 'lucmorin.php', 1, 3, 5, '759612', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Danielle Théberge', 'danielletheberge.php', 2, 3, 5, 'B1EA0A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Nicolas Morency', 'nicolasmorency.php', 3, 3, 5, '7EEA0A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Richard Landry', 'richardlandry.php', 4, 3, 5, '2E5109', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Jacques Chabot', 'jacqueschabot.php', 5, 3, 5, '1B2D07', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Normand Lemyre', 'nordmandlemyre.php', 6, 3, 5, '11D031', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'André Charon', 'andrecharon.php', 7, 3, 5, '2D843C', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Pierre Rajotte', 'pierrerajotte.php', 8, 3, 5, '2D8460', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Tuy Nguyen', 'tuynguyen.php', 9, 3, 5, '45D096', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Club Robotique', 'clubrobot.php', 1, 1, 6, 'EFEC00', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Liens Utilies',NULL, 1, 1, 8, 'DB00FF', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Alternance Travail-Études', 'http://cll.qc.ca/programmes/alternance-travail-etudes/', 1, 2, 8, '9AFF3C', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'MSDNAA', 'http://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=6c5a70be-a08b-e011-969d-0030487d8897&vsro=8&JSEnabled=1', 2, 2, 8, '4B7347', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'PDEA', 'http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf', 3, 2, 8, '0CC291', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Stages', NULL, 1, 1, 7, '6F4876', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Critères d\'admissibilités','stagecritere.php', 1, 2, 7, 'B1EA0A', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Dates des Stages','datestages.php', 2, 2, 7, '2E5109', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Document d\'information', 'http://www.cll.qc.ca/informatique/2014_Lettre_stage_H-2014GIR_1.pdf' , 3, 2, 7, '1B2D07', true);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Formation des Étudiants', 'formationetudiant.php', 4, 2, 7, '2D843C', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Responsables des Stages', 'responsablestage.php', 5, 2, 7, '11D031', false);
INSERT INTO equipe6h15.verticalmenu VALUES (default,'Stages en France', 'france.php', 6, 2, 7, '45D096', false);


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

INSERT INTO equipe6h15.enseignants VALUES(default, 'Yvan Morrissey', 'Images/photoProfileDefault.png', 'yvanmorrissey.php', 1);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Stéphane Mercier', 'Images/photoProfileDefault.png', 'stephanemercier.php', 2);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Christian Asselin', 'Images/photoProfileDefault.png', 'christianasselin.php', 3);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Serge Lévesque', 'Images/photoProfileDefault.png', 'sergelevesque.php', 4);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Olivier Lafleur', 'Images/photoProfileDefault.png', 'olivierlafleur.php', 5);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Mélissa Clermont', 'Images/photoProfileDefault.png', 'melissaclermont.php', 6);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Gilles Champagne', 'Images/photoProfileDefault.png', 'gilleschampagne.php', 7);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Marc Deslandes', 'Images/photoProfileDefault.png', 'marcdeslandes.php', 8);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Nelson Marceau', 'Images/photoProfileDefault.png', 'nelsonmarceau.php', 9);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Lise Provencher', 'Images/photoProfileDefault.png', 'liseprovencher.php', 10);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Jocelyne Lapointe', 'Images/photoProfileDefault.png', 'jocelynelapointe.php', 11);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Josée Lainesse', 'Images/photoProfileDefault.png', 'joseelainesse.php', 12);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Guillaume Michaud', 'Images/photoProfileDefault.png', 'guillaumemichaud.php', 13);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Louis-Philippe Normand', 'Images/photoProfileDefault.png', 'louisphilippenormand.php', 14);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Luc Morin', 'Images/photoProfileDefault.png', 'lucmorin.php', 15);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Danielle Théberge', 'Images/photoProfileDefault.png', 'danielletheberge.php', 16);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Nicolas Morency', 'Images/photoProfileDefault.png', 'nicolasmorency.php', 17);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Richard Landry', 'Images/photoProfileDefault.png', 'richardlandry.php', 18);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Jacques Chabot', 'Images/photoProfileDefault.png', 'jacqueschabot.php', 19);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Normand Lemyre', 'Images/photoProfileDefault.png', 'nordmandlemyre.php', 20);
INSERT INTO equipe6h15.enseignants VALUES(default, 'André Charon', 'Images/photoProfileDefault.png', 'andrecharon.php', 21);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Pierre Rajotte', 'Images/photoProfileDefault.png', 'pierrerajotte.php', 22);
INSERT INTO equipe6h15.enseignants VALUES(default, 'Tuy Nguyen', 'Images/photoProfileDefault.png', 'tuynguyen.php', 23);
