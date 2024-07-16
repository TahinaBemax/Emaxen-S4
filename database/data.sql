INSERT INTO type_service (type, duree, montant) VALUES ('Service A', '01:00:00', 150.00);
INSERT INTO type_service (type, duree, montant) VALUES ('Service B', '02:00:00', 300.00);

INSERT INTO type_voiture (type) VALUES ('Voiture Standard');
INSERT INTO type_voiture (type) VALUES ('Voiture Premium');

INSERT INTO admin (login, password) VALUES ('admin', 'admin');

INSERT INTO slot (nomSlot, capacite) VALUES ('Slot 1', 1);
INSERT INTO slot (nomSlot, capacite) VALUES ('Slot 2', 1);

INSERT INTO client value(null);
INSERT INTO client value (null);

INSERT INTO heure (heure_ouverture, heure_fermeture) VALUES ('08:00:00', '18:00:00');

INSERT INTO rendez_vous (date_debut, date_fin, idSlot, idClient, idTypeService)
VALUES (NOW(), DATE_ADD(NOW(), INTERVAL 1 HOUR), 1, 1, 1);
INSERT INTO rendez_vous (date_debut, date_fin, idSlot, idClient, idTypeService)
VALUES (NOW(), DATE_ADD(NOW(), INTERVAL 2 HOUR), 2, 2, 2);



INSERT INTO voiture (numero, idClient, idTypeVoiture) VALUES ('ABC123', 1, 1);
INSERT INTO voiture (numero, idClient, idTypeVoiture) VALUES ('DEF456', 2, 2);

INSERT INTO devis (idRendezVous, montant, date_paiement, statut) VALUES
                                                                     (3, 300.00, '2024-07-16', true),
                                                                     (4, 180.75, '2024-07-17', true),
                                                                     (6, 250.00, NULL, false);

