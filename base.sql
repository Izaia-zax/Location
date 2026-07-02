CREATE DATABASE Location;

USE Location;





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

CREATE TABLE vehicule
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
    date_fin date not null,
    foreign key (id_vehicule) REFERENCES vehicule(id),
    foreign key (id_clients) REFERENCES clients(id)
);

CREATE TABLE statut_vehicule
(

    id int primary key auto_increment,
    libelle varchar(100) not null
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

-- ============================================================
-- Données de test
-- ============================================================

-- Catégories de véhicules
INSERT INTO categorie (libelle) VALUES
('Citadine'),
('Berline'),
('SUV'),
('Utilitaire'),
('Sportive');

-- Clients
INSERT INTO clients (nom, email, numero) VALUES
('Rakoto Jean',    'rakoto.jean@email.com',    '034 10 000 01'),
('Rabe Lala',      'rabe.lala@email.com',      '034 10 000 02'),
('Randria Paul',   'randria.paul@email.com',   '034 10 000 03'),
('Andria Mialy',   'andria.mialy@email.com',   '034 10 000 04'),
('Rasoa Nina',     'rasoa.nina@email.com',     '034 10 000 05');

-- Véhicules
INSERT INTO vehicule (marque, modele, immatriculation, id_categorie) VALUES
('Toyota',   'Yaris',      '1234 TAB', 1),
('Renault',  'Clio',       '5678 TAC', 1),
('Peugeot',  '508',        '9012 TAD', 2),
('BMW',      'Serie 3',    '3456 TAE', 2),
('Toyota',   'Rav4',       '7890 TAF', 3),
('Hyundai',  'Tucson',     '1111 TAG', 3),
('Renault',  'Kangoo',     '2222 TAH', 4),
('Ford',     'Transit',    '3333 TAI', 4),
('Porsche',  '911',        '4444 TAJ', 5),
('Ferrari',  'F8 Tributo', '5555 TAK', 5);

-- Statuts des véhicules
INSERT INTO statut_vehicule (libelle) VALUES
('Disponible'),
('En location'),
('En maintenance'),
('Hors service');

-- Tarifs par catégorie (valables à partir de 2026-07-01)
INSERT INTO historique_tarif (id_categorie, tarif, date_debut) VALUES
(1, 25000.00, '2026-07-01'),  -- Citadine
(2, 45000.00, '2026-07-01'),  -- Berline
(3, 60000.00, '2026-07-01'),  -- SUV
(4, 50000.00, '2026-07-01'),  -- Utilitaire
(5, 120000.00, '2026-07-01'); -- Sportive

-- Statut initial des véhicules
INSERT INTO historique_statut_vehicule (id_vehicule, id_statut, date_changement) VALUES
(1,  1, '2026-07-01'),  -- Yaris       → Disponible
(2,  1, '2026-07-01'),  -- Clio        → Disponible
(3,  1, '2026-07-01'),  -- 508         → Disponible
(4,  2, '2026-07-01'),  -- Serie 3     → En location
(5,  1, '2026-07-01'),  -- Rav4        → Disponible
(6,  3, '2026-07-01'),  -- Tucson      → En maintenance
(7,  1, '2026-07-01'),  -- Kangoo      → Disponible
(8,  1, '2026-07-01'),  -- Transit     → Disponible
(9,  1, '2026-07-01'),  -- 911         → Disponible
(10, 4, '2026-07-01');  -- F8 Tributo  → Hors service
