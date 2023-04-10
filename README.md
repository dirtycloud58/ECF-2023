# ECF-2023
LE PROJET Restaurant

Le Chef Arnaud Michant aime passionnément les produits - et producteurs - de la Savoie.
C’est pourquoi il a décidé d’ouvrir son troisième restaurant dans ce département.
Le Quai Antique sera installé à Chambéry et proposera au déjeuner comme au dîner une 
expérience gastronomique, à travers une cuisine sans artifice.
Plus encore que ses deux autres restaurants, Arnaud Michant le voit comme une promesse 
d’un voyage dans son univers culinaire.
Lors de l’inauguration de son deuxième établissement, le chef Michant a pu constater 
l’impact positif que pouvait avoir un bon site web sur son chiffre d’affaires. C’est pourquoi il 
a fait appel à l’agence web dont vous faites partie.
Dans le cadre de cette mission qui vous est affectée, vous aurez à créer une application web 
vitrine pour le Quai Antique avec ce goût de la qualité que recherche Arnaud Michant.

## Prérequis

- PHP 7.4 ou version ultérieure
- Composer
- MySQL
- Symfony CLI

## Installation

1. Clonez le projet : git clone https://github.com/dirtycloud58/ECF-2023
2. Installez les dépendances : composer install
3. Créez la base de données : php bin/console doctrine:database:create
4. Exécutez les migrations : php bin/console doctrine:migrations:migrate
5. Chargez les fixtures dans votre terminal : mysql -u username database_name < path/nom_de_la_fixture.sql
(Attention à bien modifier votre username et le nom de la base de données et d’inclure la route du fichier sql, les fichiers se trouvent dans le dossier fixtures)
6. Lancez le serveur : "symfony serve" ou "symfony server:start"
Le projet sera accessible à l'adresse `http://localhost:8000/`.

## création d'un admin :
  - Rendez-vous dans votre terminal IDE et ouvrez le projet Symfony.
  - Utilisez la commande Symfony pour créer un mot de passe haché : "symfony console security:hash-password", ensuite enregistrez votre mot de passe dans votre bloc note
  - utilisez votre terminal et connectez-vous à la bdd ou vous pouvez utiliser le sqltools de vscode et saisissez cette commande :
    INSERT INTO user (id, email, roles, password, guests) 
  VALUES (NULL, 'admin2@quai-antique.fr', '[\"ROLE_ADMIN\"]', '$2y$13$eGF11q2/s2PYSf5PY2eqeewjEkU.CPBUBOqeFM1w4myTb2hrMU3oK', '1')
  Attention, il est impératif de remplacer le mot de passe haché par celui que vous venez de récupérer avant d'envoyer votre ligne en base de données.