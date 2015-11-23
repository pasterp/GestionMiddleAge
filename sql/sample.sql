INSERT INTO RESSOURCE(nomRessource, descriptionRessource, image) VALUES('Nourriture', 'Comment pourriez vous croire sans Nourriture ?', './img/nourriture.png');
INSERT INTO RESSOURCE(nomRessource, descriptionRessource, image) VALUES('Bois', 'De la cabane dans l\'arbre au bucher contre l\'hérésie, c\'est le meilleur choix !', './img/bois.png');
INSERT INTO RESSOURCE(nomRessource, descriptionRessource, image) VALUES('Pierre', 'Les pierres roulantes ont fait du bon son.', './img/pierre.png');
INSERT INTO RESSOURCE(nomRessource, descriptionRessource, image) VALUES('Fer', 'N\'oubliez pas de finir vos épinards !', './img/fer.png');
INSERT INTO RESSOURCE(nomRessource, descriptionRessource, image) VALUES('Or', '#Capitalisme', './img/or.png');

INSERT INTO   JOUEUR(pseudoJoueur, motdepasseJoueur, sexeJoueur, dateNaissanceJoueur, mailJoueur, date_inscripion, date_last_connection ) 
VALUES 				('pascal', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@phelipot.me', NOW(), NOW()),
					('test', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@phelipot.me', NOW(), NOW()),
					('tiona', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@phelipot.me', NOW(), NOW()),
					('quentin', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@phelipot.me', NOW(), NOW()),
					('geoffrey', 'c9MfAVndQY3tg', 'male', '01-01-1111', 'contact@phelipot.me', NOW(), NOW());

INSERT INTO POSSEDE_RESSOURCE(idJoueur, idRessource, quantite) 
VALUES 						(1, 1, 500),
							(1, 2, 500),
							(1, 3, 500),
							(1, 4, 500),
							(1, 5, 500),
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