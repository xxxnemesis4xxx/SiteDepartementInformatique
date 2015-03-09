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
lien varchar(20000) NOT NULL)
ENGINE=INNODB;

INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Omnivox','https://cll.omnivox.ca/intr/Module/Identification/Login/Login.aspx?ReturnUrl=/intr');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Messagerie','https://alphonse2.clevislauzon.qc.ca/gw/webacc');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Repro+','https://repro.clevislauzon.qc.ca/sysrepro/login/login.asp');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Repertoire du personnel','http://cll.qc.ca/repertoire-personnel/');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Alternance Travail-Études','http://cll.qc.ca/programmes/alternance-travail-etudes/');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'PDÉA','http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Accueil','http://www.cll.qc.ca/informatique/index2.php');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Site du cégep','http://cll.qc.ca/');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Facebook','https://www.facebook.com/pages/D%C3%A9partement-dinformatique-C%C3%A9gep-L%C3%A9vis-Lauzon/127878897268010');
INSERT INTO departementinformatique.lienmenuderoulant VALUES(default,'Nous joindre','#bas');


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

INSERT INTO departementinformatique.verticalmenu VALUES (default,'Programmes', NULL, 1, 1, 1, '008747', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Gestion', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-de-gestion-420-aa/', 1, 2, 1, '008747', TRUE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Industrielle', 'http://cll.qc.ca/programmes/techniques/techniques-de-linformatique-informatique-industrielle-420-ab/', 2, 2, 1, '008747', TRUE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Réseaux', 'http://cll.qc.ca/programmes/techniques/informatique-gestion-de-reseaux/', 3, 2, 1, '008747', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Stages',NULL,2 , 1, 2, 'cf2130', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Activités', NULL, 3, 1, 3, 'fecf54', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Rallye', NULL, 4, 1, 4, '1A0DDB', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Photos', NULL, 5, 1,5, '6800C8', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Vidéos', NULL, 6, 1, 6, 'CB4CD3', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Foire de l\'emploie', NULL, 7, 1 , 7, '2B2F56', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Club Robotique', NULL, 8, 1, 8, 'EFEC00', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Enseignants', NULL, 9 , 1, 9, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Actuellement', NULL, 1, 2, 9, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Yvan Morrissey', NULL, 1, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Stéphane Mercier', NULL, 2, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Christian Asselin', NULL, 3, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Serge Lévesque', NULL, 4, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Olivier Lafleur', NULL, 5, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Mélissage Clermont', NULL, 6, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Gilles Champagne', NULL, 7, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Marc Deslandes', NULL, 8, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Nelson Marceau', NULL, 9, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Lise Provencher', NULL, 10, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Jocelyne Lapointe', NULL, 11, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Josée Lainesse', NULL, 12, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Guillaume Michaud', NULL, 13, 3, 10, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Technicien(s)', NULL, 2, 2, 11, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Louis-Philippe Normand', NULL, 1, 3, 11, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'À la retraite', NULL, 3, 2, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Luc Morin', NULL, 1, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Danielle Théberge', NULL, 2, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Nicolas Morency', NULL, 3, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Richard Landry', NULL, 4, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Jacques Chabot', NULL, 5, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Normand Lemyre', NULL, 6, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'André Charon', NULL, 7, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Pierre Rajotte', NULL, 8, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Tuy Nguyen', NULL, 9, 3, 12, 'AEAEAE', FALSE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'MSDNAA', 'http://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=6c5a70be-a08b-e011-969d-0030487d8897&vsro=8&JSEnabled=1', 10, 1, 13, '4B7347', TRUE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'PDEA', 'http://www.clevislauzon.qc.ca/informatique/PDEA%20Version%20officielle%202010.pdf', 11, 1, 14, '0CC291', TRUE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Alternance Travail-Études', 'http://cll.qc.ca/programmes/alternance-travail-etudes/', 12, 1, 15, '9AFF3C', TRUE);
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Remise des diplômes', NULL, 13, 1, 16, 'FF6100', FALSE);


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
lastCols BOOLEAN NOT NULL DEFAULT FALSE,
backgroundColor BOOLEAN NOT NULL DEFAULT TRUE
) ENGINE=INNODB;


INSERT INTO departementinformatique.displaymenu VALUES (default, 'pub.txt', default, default, 1, false, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'slider.txt', 3, default, 2, false, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'pub2.txt', default, default, 3, true, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'enseignant.txt', default, 2, 4, false, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'pdea.txt', default, default, 5, false, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'diplome.txt', default, default, 6, false, false);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'foireemploi.txt', 2, default, 7, true, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'video.txt', 2, default, 8, false, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'rally.txt', default, default, 9, false, default);
INSERT INTO departementinformatique.displaymenu VALUES (default, 'evenement.txt', default, default, 10, true, default);
