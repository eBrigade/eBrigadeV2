

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `TE_CODE` varchar(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `CEV_CODE` varchar(5) NOT NULL
)

INSERT INTO `event_types` (`TE_CODE`, `title`,`CEV_CODE`) VALUES
('AH', 'Autres actions humanitaires','C_OPE'),
('AIP', 'Aide aux populations','C_OPE'),
('CER', 'Cérémonie','C_DIV'),
('COM', 'Communication - Promotion','C_DIV'),
('COOP', 'Coopération état-sdis-samu','C_SEC'),
('DIV', 'Evénement divers','C_DIV'),
('DPS', 'Dispositif Prévisionnel de Secours','C_SEC'),
('EXE', 'Participation à exercice état-sdis-samu','C_FOR'),
('FOR', 'Formation','C_FOR'),
('GAR', 'Garde','C_SEC'),
('HEB', 'Hébergement durgence','C_OPE'),
('MAN', 'Manoeuvre','C_FOR'),
('MAR', 'Maraude','C_SEC'),
('MC', 'Main courante','C_DIV'),
('MED', 'Médicalisation, équipe médicale','C_SEC'),
('MET', 'Alerte des bénévoles','C_OPE'),
('MLA', 'Mission Logistique et Administrative','C_DIV'),
('NAUT', 'Activité nautique','C_SEC'),
('REU', 'Réunion', 'C_DIV'),
('SPO', 'Compétition sportive','C_DIV'),
('TEC', 'Entretien, opérations techniques','C_DIV'),
('WEB', 'Visio conférence', 'C_DIV');



