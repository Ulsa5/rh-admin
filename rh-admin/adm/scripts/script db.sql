-- MySQL Script generated by MySQL Workbench
-- Thu Mar 31 23:14:25 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rh-admin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rh-admin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rh-admin` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema example
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema example
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `example` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `rh-admin` ;

-- -----------------------------------------------------
-- Table `rh-admin`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`users` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(75) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`roles` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idroles_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`permissions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`permissions` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`permissions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idpermissions_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`role_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`role_user` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`role_user` (
  `role_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`role_id`, `user_id`),
  INDEX `fk_users_has_roles_roles1_idx` (`role_id` ASC) VISIBLE,
  INDEX `fk_users_has_roles_users_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_has_roles_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `rh-admin`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_roles_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `rh-admin`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`permission_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`permission_role` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`permission_role` (
  `permission_id` INT NOT NULL,
  `role_id` INT NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`),
  INDEX `fk_roles_has_permissions_permissions1_idx` (`permission_id` ASC) VISIBLE,
  INDEX `fk_roles_has_permissions_roles1_idx` (`role_id` ASC) VISIBLE,
  CONSTRAINT `fk_roles_has_permissions_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `rh-admin`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_permissions_permissions1`
    FOREIGN KEY (`permission_id`)
    REFERENCES `rh-admin`.`permissions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`bloods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`bloods` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`bloods` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `comment` VARCHAR(250) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idbloods_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`genders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`genders` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`genders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idgenders_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`civil_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`civil_status` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`civil_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `comment` VARCHAR(250) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idcivil_status_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`banks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`banks` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`banks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idbanks_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`bank_account_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`bank_account_types` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`bank_account_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `account_type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idbank_accounts_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`companies` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `nit` VARCHAR(25) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idcompanies_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  UNIQUE INDEX `nit_UNIQUE` (`nit` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`igss_afilliations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`igss_afilliations` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`igss_afilliations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `number` VARCHAR(25) NULL,
  `filial` VARCHAR(25) NULL,
  `companies_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idigss_afilliations_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `number_UNIQUE` (`number` ASC) VISIBLE,
  INDEX `fk_igss_afilliations_companies1_idx` (`companies_id` ASC) VISIBLE,
  CONSTRAINT `fk_igss_afilliations_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `rh-admin`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`sections`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`sections` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`sections` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`jobs` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `sections_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  INDEX `fk_jobs_sections1_idx` (`sections_id` ASC) VISIBLE,
  CONSTRAINT `fk_jobs_sections1`
    FOREIGN KEY (`sections_id`)
    REFERENCES `rh-admin`.`sections` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`project_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`project_type` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`project_type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`proyects`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`proyects` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`proyects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project_type_id` INT NOT NULL,
  `name` VARCHAR(250) NOT NULL,
  `code` VARCHAR(10) NULL,
  `address` VARCHAR(250) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idproyects_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_proyects_project_type1_idx` (`project_type_id` ASC) VISIBLE,
  UNIQUE INDEX `code_UNIQUE` (`code` ASC) VISIBLE,
  CONSTRAINT `fk_proyects_project_type1`
    FOREIGN KEY (`project_type_id`)
    REFERENCES `rh-admin`.`project_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`insurances`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`insurances` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`insurances` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `carrier` VARCHAR(100) NOT NULL,
  `companies_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `carrier_UNIQUE` (`carrier` ASC) VISIBLE,
  INDEX `fk_insurances_companies1_idx` (`companies_id` ASC) VISIBLE,
  CONSTRAINT `fk_insurances_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `rh-admin`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`employees`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`employees` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `dpi` VARCHAR(13) NOT NULL,
  `admission_date` DATE NOT NULL,
  `carnet` VARCHAR(15) NULL,
  `carnet_expiration` DATE NULL,
  `telephone` VARCHAR(8) NULL,
  `nit` VARCHAR(15) NULL,
  `irtra` VARCHAR(25) NULL,
  `educational_level` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `birthday` DATE NULL,
  `children` INT NULL,
  `address` VARCHAR(250) NULL,
  `bloods_id` INT NOT NULL,
  `genders_id` INT NOT NULL,
  `civil_status_id` INT NOT NULL,
  `bank_account_number` VARCHAR(50) NULL,
  `banks_id` INT NOT NULL,
  `bank_account_types_id` INT NOT NULL,
  `igss_afilliations_id` INT NOT NULL,
  `companies_id` INT NOT NULL,
  `jobs_id` INT NOT NULL,
  `proyects_id` INT NOT NULL,
  `insurances_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idemployees_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `dpi_UNIQUE` (`dpi` ASC) VISIBLE,
  UNIQUE INDEX `carnet_UNIQUE` (`carnet` ASC) VISIBLE,
  UNIQUE INDEX `nit_UNIQUE` (`nit` ASC) VISIBLE,
  UNIQUE INDEX `bank_account_UNIQUE` (`bank_account_number` ASC) VISIBLE,
  INDEX `fk_employees_bloods1_idx` (`bloods_id` ASC) VISIBLE,
  INDEX `fk_employees_genders1_idx` (`genders_id` ASC) VISIBLE,
  INDEX `fk_employees_civil_status1_idx` (`civil_status_id` ASC) VISIBLE,
  INDEX `fk_employees_banks1_idx` (`banks_id` ASC) VISIBLE,
  INDEX `fk_employees_bank_account_types1_idx` (`bank_account_types_id` ASC) VISIBLE,
  INDEX `fk_employees_igss_afilliations1_idx` (`igss_afilliations_id` ASC) VISIBLE,
  INDEX `fk_employees_companies1_idx` (`companies_id` ASC) VISIBLE,
  INDEX `fk_employees_jobs1_idx` (`jobs_id` ASC) VISIBLE,
  INDEX `fk_employees_proyects1_idx` (`proyects_id` ASC) VISIBLE,
  INDEX `fk_employees_insurances1_idx` (`insurances_id` ASC) VISIBLE,
  CONSTRAINT `fk_employees_bloods1`
    FOREIGN KEY (`bloods_id`)
    REFERENCES `rh-admin`.`bloods` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_genders1`
    FOREIGN KEY (`genders_id`)
    REFERENCES `rh-admin`.`genders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_civil_status1`
    FOREIGN KEY (`civil_status_id`)
    REFERENCES `rh-admin`.`civil_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_banks1`
    FOREIGN KEY (`banks_id`)
    REFERENCES `rh-admin`.`banks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_bank_account_types1`
    FOREIGN KEY (`bank_account_types_id`)
    REFERENCES `rh-admin`.`bank_account_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_igss_afilliations1`
    FOREIGN KEY (`igss_afilliations_id`)
    REFERENCES `rh-admin`.`igss_afilliations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `rh-admin`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_jobs1`
    FOREIGN KEY (`jobs_id`)
    REFERENCES `rh-admin`.`jobs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_proyects1`
    FOREIGN KEY (`proyects_id`)
    REFERENCES `rh-admin`.`proyects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_insurances1`
    FOREIGN KEY (`insurances_id`)
    REFERENCES `rh-admin`.`insurances` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`departments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`departments` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`departments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(5) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `iddepartments_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`municipalities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`municipalities` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`municipalities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(5) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `departments_id` INT NOT NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idmunicipalities_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  INDEX `fk_municipalities_departments1_idx` (`departments_id` ASC) VISIBLE,
  INDEX `fk_municipalities_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_municipalities_departments1`
    FOREIGN KEY (`departments_id`)
    REFERENCES `rh-admin`.`departments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_municipalities_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`kin_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`kin_types` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`kin_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idkin_types_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`kins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`kins` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`kins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `kin_types_id` INT NOT NULL,
  `telephone` VARCHAR(10) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_kins_kin_types1_idx` (`kin_types_id` ASC) VISIBLE,
  CONSTRAINT `fk_kins_kin_types1`
    FOREIGN KEY (`kin_types_id`)
    REFERENCES `rh-admin`.`kin_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`employees_kins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`employees_kins` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`employees_kins` (
  `employees_id` INT NOT NULL,
  `kins_id` INT NOT NULL,
  PRIMARY KEY (`employees_id`, `kins_id`),
  INDEX `fk_employees_has_kins_kins1_idx` (`kins_id` ASC) VISIBLE,
  INDEX `fk_employees_has_kins_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_employees_has_kins_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_has_kins_kins1`
    FOREIGN KEY (`kins_id`)
    REFERENCES `rh-admin`.`kins` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`licenses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`licenses` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`licenses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `number` VARCHAR(45) NOT NULL,
  `expiration` DATE NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idlicenses_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `number_UNIQUE` (`number` ASC) VISIBLE,
  INDEX `fk_licenses_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_licenses_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`updatable_documents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`updatable_documents` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`updatable_documents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `number` VARCHAR(45) NULL,
  `verificator` VARCHAR(45) NULL,
  `expiration` DATE NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idupdatable_documents_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_updatable_documents_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_updatable_documents_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`vaccines`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`vaccines` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`vaccines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idvaccines_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`vaccine_dosis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`vaccine_dosis` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`vaccine_dosis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dosis` VARCHAR(25) NOT NULL,
  `date` DATE NOT NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_vaccine_dosis_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_vaccine_dosis_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`employee_vaccine`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`employee_vaccine` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`employee_vaccine` (
  `employee_id` INT NOT NULL,
  `vaccine_id` INT NOT NULL,
  PRIMARY KEY (`employee_id`, `vaccine_id`),
  INDEX `fk_employees_has_vaccines_vaccines1_idx` (`vaccine_id` ASC) VISIBLE,
  INDEX `fk_employees_has_vaccines_employees1_idx` (`employee_id` ASC) VISIBLE,
  CONSTRAINT `fk_employees_has_vaccines_employees1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_has_vaccines_vaccines1`
    FOREIGN KEY (`vaccine_id`)
    REFERENCES `rh-admin`.`vaccines` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`vacations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`vacations` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`vacations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NULL,
  `period` VARCHAR(100) NULL,
  `comments` VARCHAR(250) NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idvacations_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_vacations_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_vacations_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`suspensions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`suspensions` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`suspensions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `reason` VARCHAR(150) NOT NULL,
  `comments` VARCHAR(250) NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idsuspensions_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_suspensions_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_suspensions_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`attention_calls`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`attention_calls` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`attention_calls` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `reason` VARCHAR(150) NOT NULL,
  `comments` VARCHAR(250) NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idattention_calls_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_attention_calls_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_attention_calls_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`capacitations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`capacitations` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`capacitations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_capacitations_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_capacitations_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`capacitation_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`capacitation_types` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`capacitation_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `capacitations_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idcapacitation_types_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  INDEX `fk_capacitation_types_capacitations1_idx` (`capacitations_id` ASC) VISIBLE,
  CONSTRAINT `fk_capacitation_types_capacitations1`
    FOREIGN KEY (`capacitations_id`)
    REFERENCES `rh-admin`.`capacitations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`poligraphs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`poligraphs` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`poligraphs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NULL,
  `result` VARCHAR(150) NULL,
  `comment` VARCHAR(250) NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idpoligraphs_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_poligraphs_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_poligraphs_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`poligraph_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`poligraph_types` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`poligraph_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `poligraphs_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idpoligraph_types_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  INDEX `fk_poligraph_types_poligraphs1_idx` (`poligraphs_id` ASC) VISIBLE,
  CONSTRAINT `fk_poligraph_types_poligraphs1`
    FOREIGN KEY (`poligraphs_id`)
    REFERENCES `rh-admin`.`poligraphs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`verifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`verifications` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`verifications` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `result` VARCHAR(150) NOT NULL,
  `comment` VARCHAR(250) NULL,
  `employees_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idverifications_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_verifications_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_verifications_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`verifications_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`verifications_type` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`verifications_type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `verifications_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  INDEX `fk_verifications_type_verifications1_idx` (`verifications_id` ASC) VISIBLE,
  CONSTRAINT `fk_verifications_type_verifications1`
    FOREIGN KEY (`verifications_id`)
    REFERENCES `rh-admin`.`verifications` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rh-admin`.`coments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rh-admin`.`coments` ;

CREATE TABLE IF NOT EXISTS `rh-admin`.`coments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment` TEXT(3000) NULL,
  `employees_id` INT NOT NULL,
  `date` DATE NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  PRIMARY KEY (`id`),
  INDEX `fk_coments_employees1_idx` (`employees_id` ASC) VISIBLE,
  CONSTRAINT `fk_coments_employees1`
    FOREIGN KEY (`employees_id`)
    REFERENCES `rh-admin`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `example` ;

-- -----------------------------------------------------
-- Table `example`.`companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `example`.`companies` ;

CREATE TABLE IF NOT EXISTS `example`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `nit` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  UNIQUE INDEX `nit_UNIQUE` (`nit` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `example`.`departamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `example`.`departamentos` ;

CREATE TABLE IF NOT EXISTS `example`.`departamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre departamento` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `iddepartamentos_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `example`.`igss_afilliations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `example`.`igss_afilliations` ;

CREATE TABLE IF NOT EXISTS `example`.`igss_afilliations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `number` VARCHAR(45) NULL DEFAULT NULL,
  `filial` VARCHAR(45) NULL DEFAULT NULL,
  `id_company` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `number_UNIQUE` (`number` ASC) VISIBLE,
  INDEX `fk_company_igss_afilliations_idx` (`id_company` ASC) VISIBLE,
  CONSTRAINT `fk_company_igss_afilliations`
    FOREIGN KEY (`id_company`)
    REFERENCES `example`.`companies` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `example`.`puestos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `example`.`puestos` ;

CREATE TABLE IF NOT EXISTS `example`.`puestos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre Puesto` VARCHAR(45) NULL DEFAULT NULL,
  `id_departamento` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_puestos_deptos_idx` (`id_departamento` ASC) VISIBLE,
  CONSTRAINT `fk_puestos_deptos`
    FOREIGN KEY (`id_departamento`)
    REFERENCES `example`.`departamentos` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;