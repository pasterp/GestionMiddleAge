-- Ajout de quantite dans 2 table liee a unite mais a verifie

DROP TABLE IF EXISTS EST_INSTALLE;
DROP TABLE IF EXISTS POSSEDE_BATIMENT;
DROP TABLE IF EXISTS POSSEDE_UNITE;
DROP TABLE IF EXISTS CONNAIT;
DROP TABLE IF EXISTS POSSEDE_RESSOURCE;
DROP TABLE IF EXISTS ATTAQUE;
DROP TABLE IF EXISTS PRODUIT_UNITE;
DROP TABLE IF EXISTS COUTE_BATIMENT;
DROP TABLE IF EXISTS UPGRADE;
DROP TABLE IF EXISTS PRODUIT_RESSOURCE;
DROP TABLE IF EXISTS UPGRADE_DEPEND;
DROP TABLE IF EXISTS COUTE_UNITE;
DROP TABLE IF EXISTS UNITE_DEPEND_DE;
DROP TABLE IF EXISTS TECH_DEPEND_DE;
DROP TABLE IF EXISTS MAPCASE;
DROP TABLE IF EXISTS RESSOURCE;
DROP TABLE IF EXISTS UNITE;
DROP TABLE IF EXISTS BATIMENT;
DROP TABLE IF EXISTS TYPE;
DROP TABLE IF EXISTS TECHNOLOGIE;
DROP TABLE IF EXISTS JOUEUR;


CREATE TABLE IF NOT EXISTS JOUEUR(
  idJoueur INT(50) NOT NULL AUTO_INCREMENT,
  pseudoJoueur VARCHAR(50),
  sexeJoueur ENUM('male', 'female'), 
  dateNaissanceJoueur date, 
  motdepasseJoueur VARCHAR(50),
  mailJoueur VARCHAR(150),
  image VARCHAR(300),
  date_inscripion datetime,
  date_last_connection datetime,
  PRIMARY KEY (idJoueur)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS MAPCASE(
  idCase INT(50) NOT NULL AUTO_INCREMENT,
  CoordX INT(50) NOT NULL, 
  CoordY INT(50) NOT NULL,
  PRIMARY KEY (idCase)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS RESSOURCE(
  idRessource INT(50) NOT NULL AUTO_INCREMENT,
  nomRessource VARCHAR(50),
  descriptionRessource VARCHAR(300),
  image VARCHAR(300),
  PRIMARY KEY (idRessource)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS UNITE(
  idUnite INT(50) NOT NULL AUTO_INCREMENT,
  nomUnite VARCHAR(50),
  puissanceUnite INT(50),
  descriptionUnite VARCHAR(300),
  image VARCHAR(300),
  PRIMARY KEY (idUnite)
)ENGINE = InnoDB;


#____________________________

CREATE TABLE IF NOT EXISTS TYPE(
  idType INT(50) NOT NULL AUTO_INCREMENT,
  nomType VARCHAR(50),
  PRIMARY KEY (idType)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS BATIMENT(
  idBatiment INT(50) NOT NULL AUTO_INCREMENT,
  nomBatiment VARCHAR(50),
  descriptionBatiment VARCHAR(500),
  niveauBatiment int(5),
  idType INT(50),
  image VARCHAR(300),
  CONSTRAINT FOREIGN KEY (idType) REFERENCES TYPE(idType) ON DELETE CASCADE,
  PRIMARY KEY (idBatiment)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS TECHNOLOGIE(
  idTech INT(50) NOT NULL AUTO_INCREMENT,
  nomTech VARCHAR(50),
  descriptionTech VARCHAR(500),
  image VARCHAR(300),
  PRIMARY KEY (idTech)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS EST_INSTALLE(
  idJoueur INT(50) NOT NULL,
  idCase INT(50) NOT NULL,	
  CONSTRAINT FOREIGN KEY (idJoueur) REFERENCES JOUEUR(idJoueur) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idCase) REFERENCES MAPCASE(idCase) ON DELETE CASCADE,
  PRIMARY KEY(idJoueur, idCase)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS POSSEDE_BATIMENT(
  idJoueur INT(50) NOT NULL,
  idBatiment INT(50) NOT NULL,
  CONSTRAINT FOREIGN KEY (idJoueur) REFERENCES JOUEUR(idJoueur) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idBatiment) REFERENCES BATIMENT(idBatiment) ON DELETE CASCADE,
  PRIMARY KEY(idJoueur, idBatiment)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS POSSEDE_UNITE(
  idJoueur INT(50) NOT NULL,
  idUnite INT(50) NOT NULL,
  quantite INT(50),
  CONSTRAINT FOREIGN KEY (idJoueur) REFERENCES JOUEUR(idJoueur) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idUnite) REFERENCES UNITE(idUnite) ON DELETE CASCADE,
  PRIMARY KEY(idJoueur, idUnite)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS CONNAIT(
  idJoueur INT(50) NOT NULL,
  idTech INT(50) NOT NULL,
  CONSTRAINT FOREIGN KEY (idJoueur) REFERENCES JOUEUR(idJoueur) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idTech) REFERENCES TECHNOLOGIE(idTech) ON DELETE CASCADE,
  PRIMARY KEY(idJoueur, idTech)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS POSSEDE_RESSOURCE(
  idJoueur INT(50) NOT NULL,
  idRessource INT(50) NOT NULL,
  quantite INT(50),
  CONSTRAINT FOREIGN KEY (idJoueur) REFERENCES JOUEUR(idJoueur) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idRessource) REFERENCES RESSOURCE(idRessource) ON DELETE CASCADE,
  PRIMARY KEY(idJoueur, idRessource)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS ATTAQUE(
  idAttaquant INT(50) NOT NULL,
  idDefenseur INT(50) NOT NULL,
  puissance INT(50),
  tempsAttaque INT(50),
  CONSTRAINT FOREIGN KEY (idAttaquant) REFERENCES JOUEUR(idJoueur) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idDefenseur) REFERENCES JOUEUR(idJoueur) ON DELETE CASCADE,
  PRIMARY KEY(tempsAttaque, idAttaquant, idDefenseur)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS PRODUIT_UNITE(
  quantite INT(50),
  idUnite INT(50),
  idBatiment INT(50),
  CONSTRAINT FOREIGN KEY (idUnite) REFERENCES UNITE(idUnite) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idBatiment) REFERENCES BATIMENT(idBatiment) ON DELETE CASCADE,
  PRIMARY KEY(idUnite, idBatiment)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS COUTE_BATIMENT(
  quantite INT(50),
  idRessource INT(50),
  idBatiment INT(50),
  CONSTRAINT FOREIGN KEY (idRessource) REFERENCES RESSOURCE(idRessource) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idBatiment) REFERENCES BATIMENT(idBatiment) ON DELETE CASCADE,
  PRIMARY KEY(idRessource, idBatiment)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS UPGRADE(
  idBatiment INT(50),
  idUpgrade INT(50),
  CONSTRAINT FOREIGN KEY (idBatiment) REFERENCES BATIMENT(idBatiment) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idUpgrade) REFERENCES BATIMENT(idBatiment) ON DELETE CASCADE,
  PRIMARY KEY(idBatiment, idUpgrade)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS PRODUIT_RESSOURCE(
  quantite INT(50) NOT NULL,
  idRessource INT(50) NOT NULL,
  idBatiment INT(50) NOT NULL,
  CONSTRAINT FOREIGN KEY (idRessource) REFERENCES RESSOURCE(idRessource) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idBatiment) REFERENCES BATIMENT(idBatiment) ON DELETE CASCADE,
  PRIMARY KEY(idRessource, idBatiment)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS UPGRADE_DEPEND(
  idBatiment INT(50) NOT NULL,
  idTech INT(50) NOT NULL,
  CONSTRAINT FOREIGN KEY (idBatiment) REFERENCES BATIMENT(idBatiment) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idTech) REFERENCES TECHNOLOGIE(idTech) ON DELETE CASCADE,
  PRIMARY KEY(idBatiment, idTech)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS COUTE_UNITE(
  idUnite INT(50) NOT NULL,
  idRessource INT(50) NOT NULL,
  -- quantite INT(50),
  CONSTRAINT FOREIGN KEY (idUnite) REFERENCES UNITE(idUnite) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idRessource) REFERENCES RESSOURCE(idRessource) ON DELETE CASCADE,
  PRIMARY KEY(idUnite, idRessource)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS UNITE_DEPEND_DE(
  idUnite INT(50) NOT NULL,
  idTech INT(50) NOT NULL,
  CONSTRAINT FOREIGN KEY (idUnite) REFERENCES UNITE(idUnite) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (idTech) REFERENCES TECHNOLOGIE(idTech) ON DELETE CASCADE,
  PRIMARY KEY(idUnite, idTech)
)ENGINE = InnoDB;

#____________________________

CREATE TABLE IF NOT EXISTS TECH_DEPEND_DE(
  techRequis INT(50),
  techUpgrade INT(50),
  CONSTRAINT FOREIGN KEY (techRequis) REFERENCES TECHNOLOGIE(idTech) ON DELETE CASCADE,
  CONSTRAINT FOREIGN KEY (techUpgrade) REFERENCES TECHNOLOGIE(idTech) ON DELETE CASCADE,
  PRIMARY KEY(techRequis, techUpgrade)
)ENGINE = InnoDB;