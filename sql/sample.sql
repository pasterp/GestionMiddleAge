SOURCE tables.sql;

INSERT INTO RESSOURCE(idRessource, nomRessource, descriptionRessource, image) VALUES(1, 'Nourriture', 'Comment pourriez vous croire sans Nourriture ?', './img/nourriture.png');
INSERT INTO RESSOURCE(idRessource, nomRessource, descriptionRessource, image) VALUES(2, 'Bois', 'De la cabane dans l\'arbre au bucher contre l\'hérésie, c\'est le meilleur choix !', './img/bois.png');
INSERT INTO RESSOURCE(idRessource, nomRessource, descriptionRessource, image) VALUES(3, 'Pierre', 'Les pierres roulantes ont fait du bon son.', './img/pierre.png');
INSERT INTO RESSOURCE(idRessource, nomRessource, descriptionRessource, image) VALUES(4, 'Fer', 'N\'oubliez pas de finir vos épinards !', './img/fer.png');
INSERT INTO RESSOURCE(idRessource, nomRessource, descriptionRessource, image) VALUES(5, 'Or', '#Capitalisme', './img/or.png');


INSERT INTO TECHNOLOGIE(idTech, nomTech, descriptionTech, image) VALUES
  (1, 'Travail du bois', 'Après avoir vainement tester de le manger, le bois c\'est avéré un parfait matériau de construction pour des batiments comme pour des armes', './img/science.png'),
  (2, 'Tir à l\'arc', 'Les essais infructueux de lancer des pierres à la main ne vous découragèrent pas dans la fabrication d\'une arme plus évoluée', './img/science.png'),
  (3, 'Travail du métal', 'Vous avez réussi à rendre vos fours suffisament chaud pour rendre le fer maléable, à vous les outils et amres plus solides et efficaces !', './img/science.png'),
  (4, 'Armures', 'Portez cette armure de 200kg protège de tout, même des ISM car vous ne pouvez guère prendre soin d\'une dame en l\'écrasant ainsi (cf le commité des Femmes Ecrasées par leur Maris En arMure', './img/science.png'),
  (5, 'Géométrie', '#LaGuerreCestUneQuestionDePiEtDeGore', './img/science.png'),
  (6, 'Armes de siège', 'Non, ce n\'est pas pour s\'asseoir dedans', './img/science.png');

INSERT INTO TECH_DEPEND_DE(techUpgrade, techRequis) VALUES
  (2,1),
  (4,3),
  (6,1),
  (6,3),
  (6,5); -- SELECT (nomTech) FROM TECHNOLOGIE t LEFT JOIN TECH_DEPEND_DE ON t.idTech=TECH_DEPEND_DE.techRequis WHERE TECH_DEPEND_DE.techUpgrade = 6;

INSERT INTO UNITE(idUnite, nomUnite, puissanceUnite) VALUES
  (1, 'Paysan', 1),
  (2, 'Archer', 15),
  (3, 'Chevalier', 100),
  (4, 'Arquebusier', 150),
  (5, 'Catapulte', 200),
  (6, 'Canon', 500),
  (42, 'Chevalier Jedi', 999999999999999999);

INSERT INTO UNITE_DEPEND_DE(idUnite, idTech) VALUES
  (2, 2),
  (3, 3),
  (5, 6);

INSERT INTO TYPE(idType, nomType) VALUES
  (1, 'Production'),
  (2, 'Entrainement');

INSERT INTO BATIMENT(idBatiment, nomBatiment, descriptionBatiment, niveauBatiment, idType) VALUES
  (1, "Ferme basique", "", 1, 1),
  (2, "Grande Ferme", "", 2, 1),
  (3, "Mine", "", 1, 1),
  (4, "Chalet", "", 1, 1);

INSERT INTO PRODUIT_RESSOURCE(idBatiment, idRessource, quantite) VALUES
  (1, 1, 50),
  (2, 1, 150),
  (3, 4, 50),
  (3, 5, 10),
  (3, 3, 20),
  (4, 2, 75);



INSERT INTO MAPCASE(CoordX, CoordY) VALUES
  (0,0),(0,1),(0,2),(0,3),(0,4),(0,5),(0,6),(0,7),(0,8),(0,9),(0,10),(0,11),(0,12),(0,13),(0,14),(0,15),
  (1,0),(1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),
  (2,0),(2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(2,7),(2,8),(2,9),(2,10),(2,11),(2,12),(2,13),(2,14),(2,15),
  (3,0),(3,1),(3,2),(3,3),(3,4),(3,5),(3,6),(3,7),(3,8),(3,9),(3,10),(3,11),(3,12),(3,13),(3,14),(3,15),
  (4,0),(4,1),(4,2),(4,3),(4,4),(4,5),(4,6),(4,7),(4,8),(4,9),(4,10),(4,11),(4,12),(4,13),(4,14),(4,15),
  (5,0),(5,1),(5,2),(5,3),(5,4),(5,5),(5,6),(5,7),(5,8),(5,9),(5,10),(5,11),(5,12),(5,13),(5,14),(5,15),
  (6,0),(6,1),(6,2),(6,3),(6,4),(6,5),(6,6),(6,7),(6,8),(6,9),(6,10),(6,11),(6,12),(6,13),(6,14),(6,15),
  (7,0),(7,1),(7,2),(7,3),(7,4),(7,5),(7,6),(7,7),(7,8),(7,9),(7,10),(7,11),(7,12),(7,13),(7,14),(7,15),
  (8,0),(8,1),(8,2),(8,3),(8,4),(8,5),(8,6),(8,7),(8,8),(8,9),(8,10),(8,11),(8,12),(8,13),(8,14),(8,15),
  (9,0),(9,1),(9,2),(9,3),(9,4),(9,5),(9,6),(9,7),(9,8),(9,9),(9,10),(9,11),(9,12),(9,13),(9,14),(9,15),
  (10,0),(10,1),(10,2),(10,3),(10,4),(10,5),(10,6),(10,7),(10,8),(10,9),(10,10),(10,11),(10,12),(10,13),(10,14),(10,15);

INSERT INTO   JOUEUR(idJoueur, pseudoJoueur, motdepasseJoueur, sexeJoueur, dateNaissanceJoueur, mailJoueur, date_inscripion, date_last_connection ) VALUES
  (1, 'pascal', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@youare.me', NOW(), NOW()),
  (2, 'tiona', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@youare.me', NOW(), NOW()),
  (3, 'quentin', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@youare.me', NOW(), NOW()),
  (4, 'geoffrey', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@youare.me', NOW(), NOW()),
  (5, 'test', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@youare.me', NOW(), NOW());

INSERT INTO POSSEDE_RESSOURCE(idJoueur, idRessource, quantite) VALUES
  (1, 1, 501),
  (1, 2, 502),
  (1, 3, 503),
  (1, 4, 504),
  (1, 5, 505),
  (2, 1, 500),
  (2, 2, 500),
  (2, 3, 500),
  (2, 4, 500),
  (2, 5, 500),
  (3, 1, 500),
  (3, 2, 500),
  (3, 3, 500),
  (3, 4, 500),
  (3, 5, 500),
  (4, 1, 500),
  (4, 2, 500),
  (4, 3, 500),
  (4, 4, 500),
  (4, 5, 500),
  (5, 1, 500),
  (5, 2, 500),
  (5, 3, 500),
  (5, 4, 500),
  (5, 5, 500);

INSERT INTO POSSEDE_UNITE(idJoueur, idUnite, quantite) VALUES
  (1, 1, 0),
  (1, 2, 0),
  (1, 3, 0),
  (1, 4, 0),
  (1, 5, 0),
  (1, 6, 0),
  (1, 42, 0),
  (2, 1, 0),
  (2, 2, 0),
  (2, 3, 0),
  (2, 4, 0),
  (2, 5, 0),
  (2, 6, 0),
  (2, 42, 0),
  (3, 1, 0),
  (3, 2, 0),
  (3, 3, 0),
  (3, 5, 0),
  (3, 6, 0),
  (3, 42, 0),
  (4, 1, 0),
  (4, 2, 0),
  (4, 3, 0),
  (4, 4, 0),
  (4, 5, 0),
  (4, 6, 0),
  (4, 42, 0),
  (5, 1, 0),
  (5, 2, 0),
  (5, 3, 0),
  (5, 4, 0),
  (5, 5, 0),
  (5, 6, 0),
  (5, 42, 0);

INSERT INTO POSSEDE_BATIMENT(idJoueur, idBatiment) VALUES
  (1,1), (1,3), (1,4),
  (2,1), (2,3), (2,4),
  (3,1), (3,3), (3,4),
  (4,1), (4,3), (4,4),
  (5,1), (5,3), (5,4);

INSERT INTO CONNAIT(idJoueur, idTech) VALUES
  (1,1),
  (2,1),
  (3,1),
  (4,1),
  (5,1);
