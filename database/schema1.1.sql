CREATE DATABASE garage;
use garage;

CREATE TABLE type_service(
   idTypeService INT AUTO_INCREMENT,
   type VARCHAR(250)  NOT NULL,
   duree TIME NOT NULL,
   montant DECIMAL(15,2)   NOT NULL DEFAULT 0,
    date_suppression DATETIME,
   PRIMARY KEY(idTypeService)
);

CREATE TABLE type_voiture(
   idTypeVoiture INT AUTO_INCREMENT,
   type VARCHAR(250)  NOT NULL,
   PRIMARY KEY(idTypeVoiture),
   UNIQUE(type)
);

CREATE TABLE client(
   idClient INT AUTO_INCREMENT,
   PRIMARY KEY(idClient)
);

CREATE TABLE admin(
   idAdmin INT AUTO_INCREMENT,
   login VARCHAR(250)  NOT NULL  DEFAULT 'admin',
   password VARCHAR(250)  NOT NULL DEFAULT 'admin',
   PRIMARY KEY(idAdmin),
   UNIQUE(login),
   UNIQUE(password)
);

CREATE TABLE slot(
   idSlot INT AUTO_INCREMENT,
   nomSlot VARCHAR(250)  NOT NULL,
   capacite INT NOT NULL DEFAULT 1,
   PRIMARY KEY(idSlot)
);

CREATE TABLE heure(
   idOuverture INT AUTO_INCREMENT,
   heure_ouverture TIME NOT NULL,
   heure_fermeture TIME NOT null,
   PRIMARY KEY(idOuverture)
);

CREATE TABLE rendez_vous(
   idRendezVous INT AUTO_INCREMENT,
   date_debut DATETIME NOT NULL DEFAULT CURRENT_DATE,
   date_fin DATETIME,
   idSlot INT NOT NULL,
   idClient INT NOT NULL,
   idTypeService INT NOT NULL,
   PRIMARY KEY(idRendezVous),
   FOREIGN KEY(idSlot) REFERENCES slot(idSlot),
   FOREIGN KEY(idClient) REFERENCES client(idClient),
   FOREIGN KEY(idTypeService) REFERENCES type_service(idTypeService)
);

CREATE TABLE voiture(
   idVoiture INT AUTO_INCREMENT,
   numero VARCHAR(50)  NOT NULL,
   idClient INT NOT NULL,
   idTypeVoiture INT NOT NULL,
   PRIMARY KEY(idVoiture),
   UNIQUE(numero),
   FOREIGN KEY(idClient) REFERENCES client(idClient),
   FOREIGN KEY(idTypeVoiture) REFERENCES type_voiture(idTypeVoiture)
);

-- ---------- VIEWS ---------
CREATE OR REPLACE VIEW v_voiture as
SELECT voiture.*, type_voiture.type
FROM voiture JOIN type_voiture ON voiture.idTypeVoiture = type_voiture.idTypeVoiture;

CREATE OR REPLACE VIEW v_client as
SELECT v_voiture.* FROM client JOIN v_voiture ON client.idClient = v_voiture.idClient;

CREATE OR REPLACE VIEW v_type_service as
SELECT *
FROM type_service WHERE date_suppression IS NULL;
