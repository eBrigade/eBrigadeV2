CREATE TABLE users
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(100),
  `lastname` VARCHAR(100),
  `birthname`VARCHAR(100),
  `email`VARCHAR(255) UNIQUE NOT NULL,
  `login`VARCHAR(100) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `phone`VARCHAR(14),
  `cellphone`VARCHAR(14),
  `address` TEXT,
  `zipcode`VARCHAR(5),
  `city`VARCHAR(100),
  `birthday`DATE,
  `birthplace`VARCHAR(100),
  `skype`VARCHAR(100),
  `is_active` TINYINT(1),
  `permission_id` INT DEFAULT '0',
  `grade_id` INT,
  `role_id` INT,
  `created`DATE,
  `modified`DATE,
  `connected` DATE,
  PRIMARY KEY(`id`)
);

CREATE TABLE grades
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  PRIMARY KEY(`id`)
);

CREATE TABLE roles
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  PRIMARY KEY(`id`)
);

CREATE TABLE permissions
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  PRIMARY KEY(`id`)
);

CREATE TABLE teams
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `description` TEXT,
  PRIMARY KEY(`id`)
);

CREATE TABLE teams_users
(
  `team_id` INT,
  `user_id` INT
);

CREATE TABLE barracks
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `address` TEXT,
  `zipcode` VARCHAR(5),
  `city` VARCHAR(100),
  `type_barrack_id` INT,
  PRIMARY KEY(`id`)
);

CREATE TABLE type_barracks
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  PRIMARY KEY(`id`)
);

CREATE TABLE users_barracks
(
  `user_id` INT,
  `barrack_id` INT
);

CREATE TABLE materials
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `list_material_id` INT,
  `type_material_id` INT,
  `barrack_id` INT,
  `stock` INT,
  PRIMARY KEY(`id`)
);

CREATE TABLE list_materials
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  PRIMARY KEY(`id`)
);

CREATE TABLE type_materials
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  PRIMARY KEY(`id`)
);

CREATE TABLE users_materials
(
  `user_id` INT,
  `material_id` INT,
  `quantity` INT
);

CREATE TABLE vehicles
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `matriculation` VARCHAR(255),
  `number_kilometer` INT DEFAULT 0,
  `snow` TINYINT(1) DEFAULT 0,
  `air_conditionner` TINYINT(1) DEFAULT 0,
  `type_vehicle_id` INT,
  `model_vehicle_id` INT,
  `bought` DATE,
  `end_warranty` DATE,
  `next_revision` DATE,
  PRIMARY KEY(`id`)
);

CREATE TABLE users_vehicles
(
  `user_id` INT,
  `vehicule_id` INT
);

CREATE TABLE type_vehicles
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  PRIMARY KEY(`id`)
);

CREATE TABLE model_vehicles
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `label` VARCHAR(100),
  PRIMARY KEY(`id`)
);

CREATE TABLE providers
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `address` TEXT,
  `zipcode` VARCHAR(5),
  `city` VARCHAR(100),
  `phone` VARCHAR(14),
  `email` VARCHAR(255),
  `descritpion` TEXT,
  PRIMARY KEY(`id`)
);

CREATE TABLE orders
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `list_material_id` INT,
  `quantity` INT NOT NULL DEFAULT '1',
  `user_id` INT,
  PRIMARY KEY(`id`)
);

CREATE TABLE orders_providers
(
  `order_id` INT,
  `provider_id` INT
);