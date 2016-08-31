CREATE TABLE Evenements (
    `id` INT NOT NULL,
    `id_city` INT(11),
    `id_user` INT(11),
    `id_facture` INT(11),
    `id_renfort` INT(11),
    `id_team` INT(11),
    `name_event` VARCHAR(70),
    `address` VARCHAR(180),
    `latitude` INT(11),
    `longitude` INT(11),
    `created` DATE,
    `modified` DATE,
    `is_closed` BOOLEAN,
    `closed` DATE,
    `price` INT(11),
    `canceled` BOOLEAN,
    `canceled_detail` VARCHAR(400),
    `is_active` BOOLEAN,
    `consigne` VARCHAR(400),
    `nb_equipe` VARCHAR(5),
    `nb_user` INT(5),
    `responsable` VARCHAR(40),
    `responsable_mail` VARCHAR(30),
    `responsable_phone` INT(14),
    `detail` VARCHAR(400),
    `renfort` BOOLEAN,
    `id_casern` INT(11),
    `begin` DATE,
    `end` DATE,
    `date_horraire` VARCHAR(200),
    `publique` BOOLEAN,
    PRIMARY KEY (`id`)
);

CREATE TABLE Evenements_materiels (
	`id_event` INT(11)   ,
	`id_materiel` INT(11)
);

CREATE TABLE `Evenements_vehicules` (
	`id_event` INT(11) ,
	`id_vehicule` INT(11)
);

CREATE TABLE `Evenements_equipes` (
	`id_equipe` INT(11) ,
	`id_user` INT(11)  ,
	`id_event` IN(11) ,
	`chef_equipe` VARCHAR(50)  ,
	`created` DATE  ,
	`modified` DATE
);

CREATE TABLE `Evenements_types` (
	`id` INT(11) NOT NULL ,
	`type_name` VARCHAR(50)  ,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Formations` (
	`id` INT(11) NOT NULL,
	`id_organisation` INT(11)  ,
	`name_formateur` VARCHAR(80)  ,
	`phone_formateur` INT(14)  ,
	`adress_formateur` VARCHAR(200),
	`mail_formateur` VARCHAR(140)  ,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Organisations` (
	`id` INT(11) NOT NULL ,
	`name_organisation` VARCHAR(250) ,
	`adress` VARCHAR(200)  ,
	`id_city` INT(11)  ,
	PRIMARY KEY (`id`)
);