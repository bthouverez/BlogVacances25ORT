DROP TABLE IF EXISTS Articles;
DROP TABLE IF EXISTS Users;

CREATE TABLE Articles (
	id int AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	published_at DATETIME NOT NULL,
	picture VARCHAR(255) NULL,
	content TEXT NOT NULL,
	user_id int,
	CONSTRAINT articlePK PRIMARY KEY (id)
);

CREATE TABLE Users (
	id int PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	mail VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL
);

ALTER TABLE Articles ADD CONSTRAINT userFK FOREIGN KEY (user_id) REFERENCES Users(id);


TRUNCATE TABLE Articles;
TRUNCATE TABLE Users;

-- Insertion des 5 utilisateurs
INSERT INTO Users (id, name, mail, password) VALUES
(1, 'Marie Dubois', 'marie.dubois@email.com', 'motdepasse123'),
(2, 'Pierre Martin', 'pierre.martin@email.com', 'password456'),
(3, 'Sophie Laurent', 'sophie.laurent@email.com', 'mdp789'),
(4, 'Thomas Moreau', 'thomas.moreau@email.com', 'secret321'),
(5, 'Camille Rousseau', 'camille.rousseau@email.com', 'pass654');

-- Articles pour l'utilisateur 1 (Marie) - 3 articles
INSERT INTO Articles (id, title, published_at, picture, content, user_id) VALUES
(1, 'Les tendances tech de 2025', '2025-01-15 10:30:00', 'tech_trends.jpg', 'Un aperçu des technologies émergentes qui vont marquer cette année...', 1),
(2, 'Guide du télétravail efficace', '2025-02-03 14:20:00', 'remote_work.jpg', 'Conseils pratiques pour optimiser sa productivité en télétravail...', 1),
(3, 'L''art de la photographie mobile', '2025-02-20 09:15:00', 'mobile_photo.jpg', 'Comment réaliser de superbes clichés avec son smartphone...', 1);

-- Articles pour l'utilisateur 2 (Pierre) - 1 article
INSERT INTO Articles (id, title, published_at, picture, content, user_id) VALUES
(4, 'Recettes de cuisine rapide', '2025-01-28 16:45:00', 'quick_recipes.jpg', 'Des plats délicieux à préparer en moins de 30 minutes...', 2);

-- Articles pour l'utilisateur 3 (Sophie) - 5 articles
INSERT INTO Articles (id, title, published_at, picture, content, user_id) VALUES
(5, 'Jardinage urbain pour débutants', '2025-01-10 08:00:00', 'urban_garden.jpg', 'Créer son petit jardin sur balcon ou terrasse...', 3),
(6, 'Voyager responsable en 2025', '2025-01-25 11:30:00', 'eco_travel.jpg', 'Comment réduire son empreinte carbone en voyage...', 3),
(7, 'DIY : Décoration récup', '2025-02-08 15:10:00', 'diy_deco.jpg', 'Transformer ses déchets en objets de décoration...', 3),
(8, 'Méditation et bien-être', '2025-02-15 07:45:00', 'meditation.jpg', 'Les bienfaits de la méditation au quotidien...', 3),
(9, 'Sport à la maison sans équipement', '2025-03-01 12:20:00', 'home_workout.jpg', 'Exercices efficaces à faire chez soi...', 3);

-- Articles pour l'utilisateur 4 (Thomas) - 2 articles
INSERT INTO Articles (id, title, published_at, picture, content, user_id) VALUES
(10, 'Investir en bourse pour les nuls', '2025-02-12 13:30:00', 'stock_market.jpg', 'Guide complet pour débuter dans l''investissement...', 4),
(11, 'Cybersécurité : protéger ses données', '2025-02-28 10:15:00', 'cybersecurity.jpg', 'Bonnes pratiques pour sécuriser sa vie numérique...', 4);

-- L'utilisateur 5 (Camille) n'a pas d'articles (0 article)