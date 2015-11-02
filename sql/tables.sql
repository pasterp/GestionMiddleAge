SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`joueur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`joueur` ;

CREATE TABLE IF NOT EXISTS `mydb`.`joueur` (
  `idJoueur` INT(8) NULL DEFAULT NULL,
  `pseudo` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`idJoueur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`carte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`carte` ;

CREATE TABLE IF NOT EXISTS `mydb`.`carte` (
  `x` INT(5) NULL DEFAULT NULL,
  `y` INT(5) NULL DEFAULT NULL,
  PRIMARY KEY (`x`, `y`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`technologie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`technologie` ;

CREATE TABLE IF NOT EXISTS `mydb`.`technologie` (
  `idTech` INT(5) NULL DEFAULT NULL,
  `libelleTech` VARCHAR(50) NULL DEFAULT NULL,
  `descriptionTech` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`idTech`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`type` ;

CREATE TABLE IF NOT EXISTS `mydb`.`type` (
  `idType` INT(5) NULL DEFAULT NULL,
  `libelleType` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`idType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`batiment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`batiment` ;

CREATE TABLE IF NOT EXISTS `mydb`.`batiment` (
  `idBatiment` INT(5) NULL DEFAULT NULL,
  `libelleBatiment` VARCHAR(50) NULL DEFAULT NULL,
  `descriptionBatiment` VARCHAR(500) NULL DEFAULT NULL,
  `idType` INT(5) NULL DEFAULT NULL,
  PRIMARY KEY (`idBatiment`),
  INDEX `fk_bdad4de8-8196-11e5-b684-74f06d745b42` (`idType` ASC),
  CONSTRAINT `fk_bdad4de8-8196-11e5-b684-74f06d745b42`
    FOREIGN KEY (`idType`)
    REFERENCES `mydb`.`type` (`idType`)
    ON DELETE cascade
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ressource`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ressource` ;

CREATE TABLE IF NOT EXISTS `mydb`.`ressource` (
  `idRessource` INT NOT NULL,
  `libelleRessource` VARCHAR(45) NULL,
  PRIMARY KEY (`idRessource`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`unite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`unite` ;

CREATE TABLE IF NOT EXISTS `mydb`.`unite` (
  `idUnite` INT NOT NULL,
  `libelleUnite` VARCHAR(45) NULL DEFAULT '',
  `descriptionUnite` VARCHAR(45) NULL DEFAULT '',
  `puissanceUnité` INT(8) NULL DEFAULT 0,
  PRIMARY KEY (`idUnite`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`installeEn`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`installeEn` ;

CREATE TABLE IF NOT EXISTS `mydb`.`installeEn` (
  `x` INT NOT NULL,
  `y` INT NOT NULL,
  `idJoueur` INT NULL,
  PRIMARY KEY (`x`, `y`),
  INDEX `idJoueur_idx` (`idJoueur` ASC),
  CONSTRAINT `x_y`
    FOREIGN KEY (`x` , `y`)
    REFERENCES `mydb`.`carte` (`x` , `y`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `idJoueur_`
    FOREIGN KEY (`idJoueur`)
    REFERENCES `mydb`.`joueur` (`idJoueur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`possedeUnit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`possedeUnit` ;

CREATE TABLE IF NOT EXISTS `mydb`.`possedeUnit` (
  `idUnite` INT NOT NULL,
  `idJoueur` INT NOT NULL,
  `quantité` INT(10) NULL DEFAULT 0,
  PRIMARY KEY (`idUnite`, `idJoueur`),
  INDEX `idJoueur_idx` (`idJoueur` ASC),
  CONSTRAINT `idJoueur__`
    FOREIGN KEY (`idJoueur`)
    REFERENCES `mydb`.`joueur` (`idJoueur`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `unité`
    FOREIGN KEY (`idUnite`)
    REFERENCES `mydb`.`unite` (`idUnite`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`couteBat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`couteBat` ;

CREATE TABLE IF NOT EXISTS `mydb`.`couteBat` (
  `idRessource` INT NOT NULL,
  `idBatiment` INT NOT NULL,
  `cout` INT NULL DEFAULT 0,
  PRIMARY KEY (`idRessource`, `idBatiment`),
  INDEX `idBatiment_idx` (`idBatiment` ASC),
  CONSTRAINT `idRessource`
    FOREIGN KEY (`idRessource`)
    REFERENCES `mydb`.`ressource` (`idRessource`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `idBatiment`
    FOREIGN KEY (`idBatiment`)
    REFERENCES `mydb`.`batiment` (`idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dependDe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`dependDe` ;

CREATE TABLE IF NOT EXISTS `mydb`.`dependDe` (
  `idTechNeed` INT NOT NULL,
  `idTech` INT NOT NULL,
  PRIMARY KEY (`idTechNeed`, `idTech`),
  INDEX `fk_dependDe_1_idx` (`idTech` ASC),
  CONSTRAINT `fk_dépendDe_1`
    FOREIGN KEY (`idTechNeed`)
    REFERENCES `mydb`.`technologie` (`idTech`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dependDe_1_`
    FOREIGN KEY (`idTech`)
    REFERENCES `mydb`.`technologie` (`idTech`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`necessiteUnit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`necessiteUnit` ;

CREATE TABLE IF NOT EXISTS `mydb`.`necessiteUnit` (
  `idUnite` INT NOT NULL,
  `idTech` INT NOT NULL,
  PRIMARY KEY (`idUnite`, `idTech`),
  INDEX `idTech_idx` (`idTech` ASC),
  CONSTRAINT `idTech__`
    FOREIGN KEY (`idTech`)
    REFERENCES `mydb`.`technologie` (`idTech`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `idBatiment_`
    FOREIGN KEY (`idUnite`)
    REFERENCES `mydb`.`unite` (`idUnite`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`necessiteBat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`necessiteBat` ;

CREATE TABLE IF NOT EXISTS `mydb`.`necessiteBat` (
  `idBatiment` INT NOT NULL,
  `idTech` INT NOT NULL,
  PRIMARY KEY (`idBatiment`, `idTech`),
  INDEX `idTech_idx` (`idTech` ASC),
  CONSTRAINT `idTech_necessiteBat`
    FOREIGN KEY (`idTech`)
    REFERENCES `mydb`.`technologie` (`idTech`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `idBatiment_necessiteBat`
    FOREIGN KEY (`idBatiment`)
    REFERENCES `mydb`.`batiment` (`idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`upgradeVers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`upgradeVers` ;

CREATE TABLE IF NOT EXISTS `mydb`.`upgradeVers` (
  `idBatimentNext` INT NOT NULL,
  `idBatimentBase` INT NOT NULL,
  `duree` INT NULL DEFAULT 0,
  PRIMARY KEY (`idBatimentNext`, `idBatimentBase`),
  INDEX `fk_upgradeVers_2_idx` (`idBatimentBase` ASC),
  CONSTRAINT `fk_upgradeVers_1`
    FOREIGN KEY (`idBatimentNext`)
    REFERENCES `mydb`.`batiment` (`idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_upgradeVers_2`
    FOREIGN KEY (`idBatimentBase`)
    REFERENCES `mydb`.`batiment` (`idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`possedeRes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`possedeRes` ;

CREATE TABLE IF NOT EXISTS `mydb`.`possedeRes` (
  `idRessource` INT NOT NULL,
  `idJoueur` INT NOT NULL,
  `quantité` INT(10) NULL DEFAULT 0,
  PRIMARY KEY (`idRessource`, `idJoueur`),
  INDEX `idJoueur_idx` (`idJoueur` ASC),
  CONSTRAINT `idJoueur_-_`
    FOREIGN KEY (`idJoueur`)
    REFERENCES `mydb`.`joueur` (`idJoueur`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `idRessource_-_`
    FOREIGN KEY (`idRessource`)
    REFERENCES `mydb`.`ressource` (`idRessource`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`couteUnit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`couteUnit` ;

CREATE TABLE IF NOT EXISTS `mydb`.`couteUnit` (
  `idRessource` INT NOT NULL,
  `idUnite` INT NOT NULL,
  `cout` INT NULL DEFAULT 0,
  PRIMARY KEY (`idRessource`, `idUnite`),
  INDEX `idUnité_idx` (`idUnite` ASC),
  CONSTRAINT `idRessource-`
    FOREIGN KEY (`idRessource`)
    REFERENCES `mydb`.`ressource` (`idRessource`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `idUnite-`
    FOREIGN KEY (`idUnite`)
    REFERENCES `mydb`.`unite` (`idUnite`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`possedeBat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`possedeBat` ;

CREATE TABLE IF NOT EXISTS `mydb`.`possedeBat` (
  `idBatiment` INT NOT NULL,
  `idJoueur` INT NOT NULL,
  `quantite` INT(10) NULL DEFAULT 0,
  PRIMARY KEY (`idBatiment`, `idJoueur`),
  INDEX `idJoueur_idx` (`idJoueur` ASC),
  CONSTRAINT `idJoueur_possedeBat`
    FOREIGN KEY (`idJoueur`)
    REFERENCES `mydb`.`joueur` (`idJoueur`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `idBatiment_possedeBat`
    FOREIGN KEY (`idBatiment`)
    REFERENCES `mydb`.`batiment` (`idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`genereUnit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`genereUnit` ;

CREATE TABLE IF NOT EXISTS `mydb`.`genereUnit` (
  `idUnité` INT NOT NULL,
  `idBatiment` INT NOT NULL,
  `nombre` INT NULL DEFAULT 0,
  `durée` INT NULL DEFAULT 0,
  PRIMARY KEY (`idUnité`, `idBatiment`),
  INDEX `fk_génèreUnit_2_idx` (`idBatiment` ASC),
  CONSTRAINT `fk_génèreUnit_1`
    FOREIGN KEY (`idUnité`)
    REFERENCES `mydb`.`unite` (`idUnite`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_génèreUnit_2`
    FOREIGN KEY (`idBatiment`)
    REFERENCES `mydb`.`batiment` (`idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`necessiteEntrainement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`necessiteEntrainement` ;

CREATE TABLE IF NOT EXISTS `mydb`.`necessiteEntrainement` (
  `idGenere` INT NOT NULL,
  `idRessource` INT NOT NULL,
  `idBatiment` INT NOT NULL,
  `quantité` INT NULL DEFAULT 0,
  PRIMARY KEY (`idGenere`, `idRessource`, `idBatiment`),
  INDEX `idTech_idx` (`idRessource` ASC),
  INDEX `2_idx` (`idGenere` ASC, `idBatiment` ASC),
  CONSTRAINT `1`
    FOREIGN KEY (`idRessource`)
    REFERENCES `mydb`.`ressource` (`idRessource`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `2`
    FOREIGN KEY (`idGenere` , `idBatiment`)
    REFERENCES `mydb`.`genereUnit` (`idUnité` , `idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`genereRes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`genereRes` ;

CREATE TABLE IF NOT EXISTS `mydb`.`genereRes` (
  `idRessource` INT NOT NULL,
  `idBatiment` INT NOT NULL,
  `quantite` INT NULL DEFAULT 0,
  `duree` INT NULL DEFAULT 0,
  PRIMARY KEY (`idRessource`, `idBatiment`),
  INDEX `fk_génèreUnit_2_idx` (`idBatiment` ASC),
  CONSTRAINT `fk_genUnit_1`
    FOREIGN KEY (`idRessource`)
    REFERENCES `mydb`.`ressource` (`idRessource`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_genUnit_2`
    FOREIGN KEY (`idBatiment`)
    REFERENCES `mydb`.`batiment` (`idBatiment`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
