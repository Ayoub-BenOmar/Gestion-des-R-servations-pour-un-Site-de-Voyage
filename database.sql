-- Créer la base de données et les tables
CREATE DATABASE IF NOT EXISTS reservation_voyage;
USE reservation_voyage;

CREATE TABLE IF NOT EXISTS client (
    id_client INT(11) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telephone VARCHAR(15) NOT NULL,
    adresse TEXT NOT NULL,
    date_naissance DATE NOT NULL,
    PRIMARY KEY (id_client)
);

CREATE TABLE IF NOT EXISTS activite (
    id_activite INT(11) NOT NULL AUTO_INCREMENT,
    titre VARCHAR(150) NOT NULL,
    description VARCHAR(100),
    destination VARCHAR(200) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    places_disponible INT(11),
    PRIMARY KEY (id_activite)
);

CREATE TABLE IF NOT EXISTS reservation (
    id_reservation INT(11) NOT NULL AUTO_INCREMENT,
    id_client INT(11) NOT NULL,
    id_activite INT(11) NOT NULL,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('En attente', 'Confirmée', 'Annulée') NOT NULL,
    PRIMARY KEY (id_reservation),
    FOREIGN KEY (id_client) REFERENCES client(id_client) ON DELETE CASCADE,
    FOREIGN KEY (id_activite) REFERENCES activite(id_activite)ON DELETE CASCADE
);

-- Modifier des champs des tables
ALTER TABLE client ADD COLUMN sex VARCHAR(10);
ALTER TABLE activite ADD COLUMN season VARCHAR(10);
ALTER TABLE client MODIFY COLUMN telephone VARCHAR(20);

-- Ajouter une nouvelle réservation.
INSERT INTO reservation (id_client, id_activite, date_reservation, status) VALUES (7, 3, '2025-07-18', 'Confirmée');

-- Modifier les détails d’une Activité.
UPDATE activite SET destination = 'Agadir', prix = 499.00 WHERE id_activite = 4;

-- Supprimer une réservation.
DELETE FROM reservation WHERE id_reservation = 1;

-- les détails des activités réservés par un client
SELECT a.* FROM activite as a, reservation as r, client as c 
WHERE a.id_activite = r.id_activite
and r.id_client = c.id_client 
and nom='ayoub';
