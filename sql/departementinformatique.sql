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
referenceMenuId INT,
CONSTRAINT fk_verticalmenu_verticalmenu FOREIGN KEY (`referenceMenuId`) REFERENCES departementinformatique.verticalmenu(`menuId`) ON UPDATE CASCADE
) ENGINE=INNODB;