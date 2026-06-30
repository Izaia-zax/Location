CREATE DATABASE Location;

USE Location;




CREATE TABLE statut_vehicule
(

    id int primary key auto_increment,
    libelle varchar(100) not null
); 

CREATE TABLE categorie
(
    id int primary key auto_increment,
    libelle varchar(100) not null
);

CREATE TABLE historique_tarif
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_categorie INT NOT NULL,
    tarif DECIMAL(10,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE,
    FOREIGN KEY(id_categorie) REFERENCES categorie(id)
);

CREATE TABLE vehicule()
(
    id int primary key auto_increment,
    marque varchar(100) not null,
    modele varchar(100) not null,
    immatriculation int not null unique,
    id_categorie int not null,
    foreign key (id_categori) REFERENCES categorie(id)
);

CREATE TABLE clients()
(
    id int primary key auto_increment,
    nom varchar(100) not null,
    email varchar(100) not null,
    numero varchar(100) not null
);

CREATE TABLE location()
(
    id int primary key auto_increment,
    id_vehicule int not null,
    id_clients int not null,
    date_debut date not null,
    date_fin date,
    foreign key (id_vehicule) REFERENCES vehicule(id),
    foreign key (id_clients) REFERENCES clients(id)
);

CREATE TABLE historique_statut_vehicule()
(
    id int primary key auto_increment,
    id_vehicule int not null,
    id_statut int not null,
    date_changement date not null,
    foreign key (id_vehicule) REFERENCES vehicule(id),
    foreign key (id_statut) REFERENCES statut_vehicule(id)
);