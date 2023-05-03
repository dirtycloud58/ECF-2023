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
(1, 'Soupe de poisson Maison', 15, 1),
(2, 'Moules gratinées au beurre d’ail', 14, 1),
(3, '8 Huîtres gratinées', 22, 1),
(4, 'Saumon fumé Maison', 21, 1),
(5, 'Saint-Jacques snackées sur risotto aux cèpes', 32, 2),
(6, 'Sandre rôti sur lit de choucrote, beurre blanc et petits lardons', 36, 2),
(7, 'Le café gourmand', 8, 3),
(8, 'Mille-feuille mousse caramel beurre salé', 9, 3),
(9, 'Le croustillant aux fraises des bois', 9, 3),
(10, 'Choco-noisette-truffes', 9, 3);

INSERT INTO galery (id, name, file) VALUES 
(1, 'saumon à l\'aneth', 'saumon-63c7d29d15fd6126003356.jpg'),
(2, 'maquereau et légumes vapeur', 'seafood-63c7d2dfaf868477445071.jpg'),
(3, 'Hareng à la pomme', 'herring-g377d547bd-1920-63fa11a8a5d2e906931406.jpg');

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
(5, 4, 'en fonction des arrivages', '8 Huîtres, 6 Crevettes, 6 Moules, 4 Amandes, 4 Palourdes, 6 Bulots, 1/2Homard', 48, 'le plateau Crustacés'),
(6, 4, 'en fonction des arrivages', '12 Huîtres, 6 Crevettes, 6 Moules, 4 Amandes, 4 Palourdes, 6 Bulots, 1/2 Homard, 1/2 Langouste,Tourteau', 60, 'Le plateau Royal');

INSERT INTO user (id, email, roles, password, guests) VALUES
(1, 'admin@quai-antique.fr', '["ROLE_ADMIN"]', '$2y$13$eGF11q2/s2PYSf5PY2eqeewjEkU.CPBUBOqeFM1w4myTb2hrMU3oK', 1),
(2, 'test1@antique.fr','["ROLE_USER"]', '$2y$13$DBYk3HGcilf1sPd7GQoDZuTRQC1K1WIHEu8UTVDtWYH8d8ETv/6pK', 5);

INSERT INTO user_allergy (user_id, allergy_id) VALUES
(2, 3),
(2, 5);

INSERT INTO reservation (id, email, guests, date, hour) VALUES
(1, 'test1@antique.fr', 5, '2023-05-20', '19:00');

INSERT INTO reservation_allergy (reservation_id, allergy_id) VALUES
(1, 3),
(1, 5);

INSERT INTO place (id, guests_noon, guests_evening) VALUES
(1, 30, 50);
