create database IF NOT EXISTS departementinformatique;

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



DROP TABLE IF EXISTS departementinformatique.verticalmenu;

CREATE TABLE IF NOT EXISTS departementinformatique.verticalmenu(
menuId INT NOT NULL auto_increment PRIMARY KEY,
nomLien VARCHAR(100) NOT NULL,
lien VARCHAR(20000),
position INT NOT NULL,
layer INT NOT NULL,
renderHtmlPosition INT,
htmlCouleur VARCHAR(6),                  
openNewPage boolean NOT NULL,
CONSTRAINT fk_verticalmenu_renderHtmlPosition FOREIGN KEY (`renderHtmlPosition`) REFERENCES departementinformatique.verticalmenu(`menuId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

INSERT INTO departementinformatique.verticalmenu VALUES (default,'Programmes', NULL, 1, 1, 1, '008747');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Gestion', NULL, 1, 2, 1, '008747');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Industrielle', NULL, 2, 2, 1, '008747');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Réseaux', NULL, 3, 2, 1, '008747');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Stages',NULL,2 , 1, 2, 'cf2130');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Activités', NULL, 3, 1, 3, 'fecf54');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Rallye', NULL, 4, 1, 4, '1A0DDB');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Photos', NULL, 5, 1,5, '6800C8');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Vidéos', NULL, 6, 1, 6, 'CB4CD3');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Foire de l\'emploie', NULL, 7, 1 , 7, '2B2F56');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Club Robotique', NULL, 8, 1, 8, 'EFEC00');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Enseignants', NULL, 9 , 1, 9, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Actuellement', NULL, 1, 2, 9, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Yvan Morrissey', NULL, 1, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Stéphane Mercier', NULL, 2, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Christian Asselin', NULL, 3, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Serge Lévesque', NULL, 4, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Olivier Lafleur', NULL, 5, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Mélissage Clermont', NULL, 6, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Gilles Champagne', NULL, 7, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Marc Deslandes', NULL, 8, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Nelson Marceau', NULL, 9, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Lise Provencher', NULL, 10, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Jocelyne Lapointe', NULL, 11, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Josée Lainesse', NULL, 12, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Guillaume Michaud', NULL, 13, 3, 10, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Technicien(s)', NULL, 2, 2, 11, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Louis-Philippe Normand', NULL, 1, 3, 11, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'À la retraite', NULL, 3, 2, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Luc Morin', NULL, 1, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Danielle Théberge', NULL, 2, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Nicolas Morency', NULL, 3, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Richard Landry', NULL, 4, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Jacques Chabot', NULL, 5, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Normand Lemyre', NULL, 6, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'André Charon', NULL, 7, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Pierre Rajotte', NULL, 8, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Tuy Nguyen', NULL, 9, 3, 12, 'AEAEAE');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'MSDNAA', NULL, 10, 1, 13, '4B7347');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'PDEA', NULL, 11, 1, 14, '0CC291');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Alternance Travail-Études', NULL, 12, 1, 15, '9AFF3C');
INSERT INTO departementinformatique.verticalmenu VALUES (default,'Remise des diplômes', NULL, 13, 1, 16, 'FF6100');
