CREATE DATABASE restaurant;
CREATE TABLE menu (
    id INT(10) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE allergy (
    id INT(10) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE category (
    id INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);
CREATE TABLE galery (
    id INT(10) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    file VARCHAR(255) NOT NULL,
    create_at DATETIME NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE hour (
    id INT(10) NOT NULL AUTO_INCREMENT,
    day VARCHAR(255) NOT NULL,
    noonOpening TIME NOT NULL,
    noonClosing TIME NOT NULL,
    eveningOpening TIME NOT NULL,
    eveningClosing TIME NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE formule (
    id INT(10) NOT NULL AUTO_INCREMENT,
    menu_id INT(10) NULL DEFAULT NULL,
    annotation VARCHAR(255) NULL DEFAULT NULL,
    description VARCHAR(255) NOT NULL,
    price DOUBLE NOT NULL,
    title VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (menu_id) REFERENCES menu (id)
);
CREATE TABLE meal (
    id INT(10) NOT NULL AUTO_INCREMENT,
    description VARCHAR(255) NOT NULL,
    price DOUBLE NOT NULL,
    category_id INT(10) NULL DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES category (id)
);
CREATE TABLE user (
    id INT(10) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    roles JSON NOT NULL,
    password VARCHAR(255) NOT NULL,
    guests VARCHAR(255) NULL DEFAULT NULL,
    PRIMARY KEY (id, email)
);
CREATE TABLE allergy_user (
    allergy_id INT(10) NOT NULL,
    user_id INT(10) NOT NULL,
    PRIMARY KEY (allergy_id, user_id),
    FOREIGN KEY (user_id) REFERENCES user (id),
    FOREIGN KEY (allergy_id) REFERENCES allergy (id)
);
CREATE TABLE reservation (
	id INT(10) NOT NULL AUTO_INCREMENT,
	email VARCHAR(255) NOT NULL COLLATE,
	guests DECIMAL(10,0) NOT NULL,
	date DATE NOT NULL,
	hour VARCHAR(255) NOT NULL COLLATE,
	PRIMARY KEY (id)
);
CREATE TABLE reservation_allergy (
	reservation_id INT(10) NOT NULL,
	allergy_id INT(10) NOT NULL,
	PRIMARY KEY (reservation_id, allergy_id),
	FOREIGN KEY (reservation_id) REFERENCES reservation (id),
	FOREIGN KEY (allergy_id) REFERENCES	allergy (id)
);
CREATE TABLE place (
place_id INT(10) NOT NULL,
guests_noon INT(10) NOT NULL,
guests_evening INT(10) NOT NULL,
PRIMARY KEY (id)
);