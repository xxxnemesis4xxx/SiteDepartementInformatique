/* Create our Database */
create database IF NOT EXISTS departementinformatique;


/****************************************************
*
*
* Table Containing Links for General drop down menu
*
*
****************************************************/
DROP TABLE IF EXISTS departementinformatique.lienmenuderoulant;

CREATE TABLE IF NOT EXISTS departementinformatique.lienmenuderoulant(
menuId INT NOT NULL auto_increment PRIMARY KEY,
nomLien varchar(100) NOT NULL,
lien varchar(20000) NOT NULL,
renderHtmlPosition INT NOT NULL UNIQUE)
ENGINE=INNODB;

INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Omnivox','https://cll.omnivox.ca/intr/Module/Identification/Login/Login.aspx?ReturnUrl=/intr', 1);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Messagerie','https://alphonse2.clevislauzon.qc.ca/gw/webacc', 2);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Repro+','https://repro.clevislauzon.qc.ca/sysrepro/login/login.asp', 3);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Repertoire du personnel','http://cll.qc.ca/repertoire-personnel/', 4);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Alternance Travail-Études','http://cll.qc.ca/programmes/alternance-travail-etudes/', 5);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'MSDNAA', 'http://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=6c5a70be-a08b-e011-969d-0030487d8897&vsro=8&JSEnabled=1', 6);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'PDÉA','http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf', 7);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Accueil','http://www.cll.qc.ca/informatique/index2.php', 8);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Site du cégep','http://cll.qc.ca/', 9);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Facebook','https://www.facebook.com/pages/D%C3%A9partement-dinformatique-C%C3%A9gep-L%C3%A9vis-Lauzon/127878897268010', 10);
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Nous joindre','#bas', 11);


/********************************************************
*
*
* Table containing Details for generating Vertical menu
*
*
********************************************************/


DROP TABLE IF EXISTS departementinformatique.verticalmenu;

CREATE TABLE IF NOT EXISTS departementinformatique.verticalmenu(
menuId INT NOT NULL auto_increment PRIMARY KEY,
nomLien VARCHAR(100) NOT NULL,
lien VARCHAR(20000),
position INT NOT NULL,
layer INT NOT NULL,
renderHtmlPosition INT NOT NULL,
htmlCouleur VARCHAR(6) NOT NULL,                  
openNewPage boolean NOT NULL default FALSE,
CONSTRAINT fk_verticalmenu_renderHtmlPosition FOREIGN KEY (`renderHtmlPosition`) REFERENCES departementinformatique.verticalmenu(`menuId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

INSERT INTO departementinformatique.verticalmenu VALUES (default,'Programmes', NULL, 1, 1, 1, '008747', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Gestion', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-de-gestion-420-aa/', 1, 2, 1, '873400', true);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Industrielle', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-industrielle-420-ab/', 2, 2, 1, '870020', true);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Réseaux', 'http://cll.qc.ca/programmes/techniques/informatique-gestion-de-reseaux/', 3, 2, 1, '240087', true);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Événements', NULL, 1, 1, 2, 'cf2130', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Activités', NULL, 1, 2, 2, 'fecf54', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Foire de l\'emploie', NULL, 3, 2, 2, '2B2F56', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Rallye', NULL, 4, 2, 2, '1A0DDB', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Remise des Diplomes', NULL, 5, 2, 2, '836E37', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Vidéos Promotionnelles', NULL, 6, 2, 2, 'CB4CD3', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Enseignants', NULL, 1 , 1, 3, 'AEAEAE', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Actuellement', NULL, 1, 2, 3, '957777', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Yvan Morrissey', NULL, 1, 3, 3, '8C2F19', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Stéphane Mercier', NULL, 2, 3, 3, '779395', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Christian Asselin', NULL, 3, 3, 3, '8C1919', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Serge Lévesque', NULL, 4, 3, 3, '6E3E33', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Olivier Lafleur', NULL, 5, 3, 3, '382723', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Mélissage Clermont', NULL, 6, 3, 3, 'F0AB80', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Gilles Champagne', NULL, 7, 3, 3, 'A18964', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Marc Deslandes', NULL, 8, 3, 3, '1B1306', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Nelson Marceau', NULL, 9, 3, 3, '7C7C7C', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Lise Provencher', NULL, 10, 3, 3, '493E2E', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Jocelyne Lapointe', NULL, 11, 3, 3, 'A1855A', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Josée Lainesse', NULL, 12, 3, 3, 'A99F33', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Guillaume Michaud', NULL, 13, 3, 3, '575008', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Technicien(s)', NULL, 2, 2, 4, '779395', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Louis-Philippe Normand', NULL, 1, 3, 4, '6B7C37', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'À la retraite', NULL, 3, 2, 5, '599959', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Luc Morin', NULL, 1, 3, 5, '759612', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Danielle Théberge', NULL, 2, 3, 5, 'B1EA0A', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Nicolas Morency', NULL, 3, 3, 5, '7EEA0A', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Richard Landry', NULL, 4, 3, 5, '2E5109', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Jacques Chabot', NULL, 5, 3, 5, '1B2D07', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Normand Lemyre', NULL, 6, 3, 5, '11D031', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'André Charon', NULL, 7, 3, 5, '2D843C', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Pierre Rajotte', NULL, 8, 3, 5, '2D8460', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Tuy Nguyen', NULL, 9, 3, 5, '45D096', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Club Robotique', NULL, 1, 1, 6, 'EFEC00', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Liens Utilies',NULL, 1, 1, 8, 'DB00FF', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Alternance Travail-Études', 'http://cll.qc.ca/programmes/alternance-travail-etudes/', 1, 2, 8, '9AFF3C', true);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'MSDNAA', 'http://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=6c5a70be-a08b-e011-969d-0030487d8897&vsro=8&JSEnabled=1', 2, 2, 8, '4B7347', true);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'PDEA', 'http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf', 3, 2, 8, '0CC291', true);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Stages', NULL, 1, 1, 7, '6F4876', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Critères d\'admissibilités','stagecritere.php', 1, 2, 7, 'B1EA0A', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Dates des Stages','datestages.php', 2, 2, 7, '2E5109', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Document d\'information', 'http://www.cll.qc.ca/informatique/2014_Lettre_stage_H-2014GIR_1.pdf' , 3, 2, 7, '1B2D07', true);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Formation des Étudiants', 'formationetudiant.php', 4, 2, 7, '2D843C', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Responsables des Stages', 'responsablestage.php', 5, 2, 7, '11D031', false);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Stages en France', 'france.php', 6, 2, 7, '45D096', false);


/***************************************************
*
*
* Table containing info for Rendering index
*
*
***************************************************/

DROP TABLE IF EXISTS departementinformatique.displaymenu;

CREATE TABLE IF NOT EXISTS departementinformatique.displaymenu(
itemId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
nomFichier VARCHAR(100) NOT NULL,
colspan INT NOT NULL DEFAULT 1,
rowspan INT NOT NULL DEFAULT 1,
position INT NOT NULL UNIQUE,
lastCols BOOLEAN NOT NULL DEFAULT FALSE
) ENGINE=INNODB;


INSERT INTO departementinformatique.displaymenu VALUES (default, 'pub.txt', default, default, 1, false);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'gestion.txt', default, default, 2, false);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'industrielle.txt', default, default, 3, false);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'reseau.txt', default, default, 4, false);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'pub2.txt', default, default, 5, true);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'enseignant.txt', 2, 2, 6, false);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'pdea.txt', default, default, 9, false);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'evenement.txt', 2, 2, 8, true);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'robotique.txt', default, default, 7, false);
