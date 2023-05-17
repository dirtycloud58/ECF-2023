INSERT INTO allergy (id, name) VALUES 
(1, 'Allergie au gluten'),
(2, 'Allergie à l\'arachide'),
(3, 'Allergie au lait'),
(4, 'Allergie aux oeufs'),
(5, 'Allergie aux fruits à coque'),
(6, 'Allergie aux mollusques'),
(7, 'Allergie aux fruits de mer'),
(8, 'Allergie à la moutarde'),
(9, 'Allergie au poisson'),
(10, 'Allergie au céleri'),
(11, 'Allergie au soja'),
(12, 'Allergie aux sulfites'),
(13, 'Allergie au sésame'),
(14, 'Allergie au lupin');

INSERT INTO category (id, title) VALUES 
(1, 'Les entrées'),
(2, 'Les plats'),
(3, 'Les desserts');

INSERT INTO meal (id, description, price, category_id) VALUES 
(1, 'soupe de Saint-Jacques', 12, 1),
(2, 'Moules gratinées au beurre d\’ail', 9, 1),
(3, '8 Huîtres gratinées', 9, 1),
(4, 'Saumon fumé Maison', 10, 1),
(5, 'Saint-Jacques snackées sur risotto aux cèpes', 24, 2),
(6, 'Sandre rôti sur lit de choucrote, beurre blanc et petits lardons', 23, 2),
(7, 'Le café gourmand', 8, 3),
(8, 'Mille-feuille mousse caramel au beurre salé', 9, 3),
(9, 'Le croustillant aux fraises des bois', 9, 3),
(10, 'Choco-noisette-truffes', 9, 3),
(11, 'Salade de truite aux noix', 19, 2),
(12, 'Polenta aux gambas', 21, 2);

INSERT INTO galery (id, name, file, create_at) VALUES 
(1, 'Polenta aux gambas', 'bakd-raw-by-karolin-baitinger-ffqbgkuzeau-unsplash-6456a86b39539481665618.jpg', '2023-05-06 19:20:11'),
(2, 'soupe de Saint-Jacques', 'max-griss-9qektazdrdk-unsplash-6456a9bae238e489950409.jpg', '2023-05-06 19:25:46'),
(3, 'Salade de truite aux noix', 'sebastian-coman-photography-zyd9byytq8q-unsplash-6456a95c51f4e338518798.jpg', '2023-05-06 19:24:12');

INSERT INTO hour (id, day, noon_opening, noon_closing, evening_opening, evening_closing) VALUES 
(1, 'Lundi', '12:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2, 'Mardi', '12:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3, 'Mercredi', '12:00:00', '15:00:00', '00:00:00', '00:00:00'),
(4, 'Jeudi', '12:00:00', '15:00:00', '19:00:00', '22:00:00'),
(5, 'Vendredi', '12:00:00', '15:00:00', '19:00:00', '23:00:00'),
(6, 'Samedi', '12:00:00', '15:00:00', '19:00:00', '23:00:00'),
(7, 'Dimanche', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

INSERT INTO menu (id, name) VALUES 
(1, 'Menu découverte'),
(2, 'Menu Gourmand'),
(3, 'Menu enfant'),
(4, 'Menu du marché');

INSERT INTO formule (id, menu_id, annotation, description, price, title) VALUES 
(1, 1, 'uniquement du lundi au vendredi', 'Entrée, plat, fromage ou dessert', 36, 'Formule midi'),
(2, 1, 'uniquement le plat du jour', 'Entrée, plat, fromage ou dessert.', 39, 'Formule soir et Weekend'),
(3, 3, 'jusqu\'a 12 ans', 'Entrée, plat, fromage ou dessert.', 25, 'le repas des héros'),
(4, 2, 'uniquement le vendredi et le samedi soir', 'degustation de 2 entrées, deux plats, fromage ou dessert', 48, 'le repas du chef'),
(5, 4, 'en fonction des arrivages, pour deux personnes', 'Assiette de charcuterie savoyarde (jambon cru, saucisson, diots, etc.) servie avec une poêlée de gambas à l\'ail et au persil.', 48, 'le plateau du chef'),
(6, 4, 'en fonction des arrivages, pour deux personnes', 'Jambon cru de Savoie, Diots de Savoie, Crozets de Savoie gratinés au fromage, Filets de perche du lac Léman, frits avec une panure légère', 48, 'Le plateau Savoyard');


INSERT INTO user (id, email, roles, password, guests) VALUES
(1, 'admin@quai-antique.fr', '["ROLE_ADMIN"]', '$2y$13$eGF11q2/s2PYSf5PY2eqeewjEkU.CPBUBOqeFM1w4myTb2hrMU3oK', 1),
(2, 'test1@antique.fr','["ROLE_USER"]', '$2y$13$DBYk3HGcilf1sPd7GQoDZuTRQC1K1WIHEu8UTVDtWYH8d8ETv/6pK', 5),
(3, 'test2@antique.fr','["ROLE_USER"]', '$2y$13$DBYk3HGcilf1sPd7GQoDZuTRQC1K1WIHEu8UTVDtWYH8d8ETv/6pK', 7),
(4, 'test3@antique.fr','["ROLE_USER"]', '$2y$13$DBYk3HGcilf1sPd7GQoDZuTRQC1K1WIHEu8UTVDtWYH8d8ETv/6pK', 9),
(5, 'test4@antique.fr','["ROLE_USER"]', '$2y$13$DBYk3HGcilf1sPd7GQoDZuTRQC1K1WIHEu8UTVDtWYH8d8ETv/6pK', 2),
(6, 'test5@antique.fr','["ROLE_USER"]', '$2y$13$DBYk3HGcilf1sPd7GQoDZuTRQC1K1WIHEu8UTVDtWYH8d8ETv/6pK', 2),
(7, 'test6@antique.fr','["ROLE_USER"]', '$2y$13$DBYk3HGcilf1sPd7GQoDZuTRQC1K1WIHEu8UTVDtWYH8d8ETv/6pK', 6);

INSERT INTO user_allergy (user_id, allergy_id) VALUES
(2, 3),
(2, 5),
(3, 6),
(4, 1),
(4, 2),
(5, 8),
(6, 11),
(6, 12),
(7, 3),
(7, 10);

INSERT INTO reservation (id, email, guests, date, hour) VALUES
(1, 'test1@antique.fr', 5, '2023-05-20', '19:00'),
(2, 'test2@antique.fr', 7, '2023-05-20', '19:45'),
(3, 'test3@antique.fr', 9, '2023-05-20', '20:00'),
(4, 'test4@antique.fr', 2, '2023-05-20', '19:00'),
(5, 'test5@antique.fr', 2, '2023-05-20', '20:15'),
(6, 'test6@antique.fr', 6, '2023-05-20', '20:30');

INSERT INTO reservation_allergy (reservation_id, allergy_id) VALUES
(1, 3),
(1, 5),
(2, 6),
(3, 1),
(3, 2),
(4, 8),
(5, 11),
(5, 12),
(6, 3),
(6, 10);

INSERT INTO place (id, guests_noon, guests_evening) VALUES
(1, 30, 50);
