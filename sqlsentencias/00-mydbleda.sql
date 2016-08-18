SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydbleda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydbleda` ;

-- -----------------------------------------------------
-- Table `mydbleda`.`tb_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_roles` (
  `id_rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_personas` (
  `id_persona` VARCHAR(45) NOT NULL,
  `fecha_ingreso` TIMESTAMP NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `rol` VARCHAR(45) NOT NULL,
  `cargo` VARCHAR(45) NULL,
  `sede` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefono` VARCHAR(15) NULL,
  `celular` VARCHAR(15) NULL,
  `direccion` VARCHAR(45) NULL,
  `user` VARCHAR(20) NULL,
  `pass` VARCHAR(20) NULL,
  `img` VARCHAR(45) NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `fk_tb_personas_tb_roles1_idx` (`rol` ASC),
  UNIQUE INDEX `user_UNIQUE` (`user` ASC),
  CONSTRAINT `fk_tb_personas_tb_roles1`
    FOREIGN KEY (`rol`)
    REFERENCES `mydbleda`.`tb_roles` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_tipo_movimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_tipo_movimientos` (
  `id_tipo_movimiento` INT NOT NULL AUTO_INCREMENT,
  `descripcion_tipo_movimiento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_movimiento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_estado_movimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_estado_movimientos` (
  `id_estado_movimiento` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_movimiento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_movimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_movimientos` (
  `id_movimiento` BIGINT NULL AUTO_INCREMENT,
  `id_tipo_movimiento` INT NOT NULL,
  `cliente` VARCHAR(45) NOT NULL,
  `id_estado_movimiento` INT NOT NULL,
  `fecha_inicio` TIMESTAMP NULL,
  `fecha_solucion` TIMESTAMP NULL,
  `fecha_fin` TIMESTAMP NULL,
  `comentario_cliente` VARCHAR(500) NULL,
  `comentario_tecnico` VARCHAR(500) NULL,
  `comentario_solucion` VARCHAR(500) NULL,
  `sede` VARCHAR(45) NULL,
  `create_by` VARCHAR(45) NULL,
  PRIMARY KEY (`id_movimiento`),
  INDEX `fk_TB_Movimiento_Tipo_Movimiento1_idx` (`id_tipo_movimiento` ASC),
  INDEX `fk_TB_Movimiento_Estado_Movimiento1_idx` (`id_estado_movimiento` ASC),
  INDEX `fk_TB_Movimientos_TB_Personas1_idx` (`cliente` ASC),
  CONSTRAINT `fk_TB_Movimiento_Tipo_Movimiento1`
    FOREIGN KEY (`id_tipo_movimiento`)
    REFERENCES `mydbleda`.`tb_tipo_movimientos` (`id_tipo_movimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_Movimiento_Estado_Movimiento1`
    FOREIGN KEY (`id_estado_movimiento`)
    REFERENCES `mydbleda`.`tb_estado_movimientos` (`id_estado_movimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_Movimientos_TB_Personas1`
    FOREIGN KEY (`cliente`)
    REFERENCES `mydbleda`.`tb_personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_proveedores` (
  `id_proveedor` INT NOT NULL,
  `nombre_emp` VARCHAR(45) NULL,
  `nit` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `movil` VARCHAR(45) NULL,
  `ciudad` VARCHAR(45) NULL,
  `nombre_contac1` VARCHAR(50) NULL,
  `nombre_contac2` VARCHAR(50) NULL,
  PRIMARY KEY (`id_proveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_estado_articulo_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_estado_articulo_clientes` (
  `id_estado_art` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_estado_art`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_art`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_art` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `articulo` VARCHAR(80) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_marca` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marca_art` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_articulos` (
  `id_articulo` BIGINT NOT NULL AUTO_INCREMENT,
  `id_movimiento` BIGINT NOT NULL,
  `fecha_create` TIMESTAMP NULL,
  `fecha_solution` TIMESTAMP NULL,
  `fecha_change` TIMESTAMP NULL,
  `fecha_pago_prov` TIMESTAMP NULL,
  `fecha_send_prov` TIMESTAMP NULL,
  `serial` VARCHAR(45) NULL,
  `art` INT NOT NULL,
  `marca` INT NOT NULL,
  `ref` VARCHAR(45) NULL,
  `proveedor` INT NOT NULL,
  `fecha_prov` VARCHAR(45) NULL,
  `nro_fac` VARCHAR(45) NULL,
  `fecha_fac` VARCHAR(45) NULL,
  `valor` VARCHAR(45) NULL,
  `problema` VARCHAR(500) NULL,
  `observacion` VARCHAR(500) NULL,
  `solucion` VARCHAR(500) NULL,
  `estado` INT NOT NULL,
  PRIMARY KEY (`id_articulo`),
  INDEX `fk_TB_articulos_TB_proveedores1_idx` (`proveedor` ASC),
  INDEX `fk_TB_articulos_TB_estado_articulo_clientes1_idx` (`estado` ASC),
  INDEX `fk_TB_articulos_TB_Movimientos1_idx` (`id_movimiento` ASC),
  INDEX `fk_tb_articulos_tb_art1_idx` (`art` ASC),
  INDEX `fk_tb_articulos_tb_marca1_idx` (`marca` ASC),
  CONSTRAINT `fk_TB_articulos_TB_proveedores1`
    FOREIGN KEY (`proveedor`)
    REFERENCES `mydbleda`.`tb_proveedores` (`id_proveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_articulos_TB_estado_articulo_clientes1`
    FOREIGN KEY (`estado`)
    REFERENCES `mydbleda`.`tb_estado_articulo_clientes` (`id_estado_art`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_articulos_TB_Movimientos1`
    FOREIGN KEY (`id_movimiento`)
    REFERENCES `mydbleda`.`tb_movimientos` (`id_movimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_articulos_tb_art1`
    FOREIGN KEY (`art`)
    REFERENCES `mydbleda`.`tb_art` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_articulos_tb_marca1`
    FOREIGN KEY (`marca`)
    REFERENCES `mydbleda`.`tb_marca` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_articulos_cambio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_articulos_cambio` (
  `id_articulo` INT NOT NULL AUTO_INCREMENT,
  `id_art_cambio` BIGINT NOT NULL,
  `fecha` TIMESTAMP NULL,
  `art` INT NOT NULL,
  `marca` INT NOT NULL,
  `ref` VARCHAR(45) NULL,
  `serial` VARCHAR(45) NULL,
  `proveedor` INT NOT NULL,
  `fecha_prov` VARCHAR(45) NULL,
  PRIMARY KEY (`id_articulo`),
  INDEX `fk_TB_articulos_cambio_TB_articulos1_idx` (`id_art_cambio` ASC),
  INDEX `fk_TB_articulos_cambio_TB_proveedores1_idx` (`proveedor` ASC),
  INDEX `fk_tb_articulos_cambio_tb_art1_idx` (`art` ASC),
  INDEX `fk_tb_articulos_cambio_tb_marca1_idx` (`marca` ASC),
  CONSTRAINT `fk_TB_articulos_cambio_TB_articulos1`
    FOREIGN KEY (`id_art_cambio`)
    REFERENCES `mydbleda`.`tb_articulos` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TB_articulos_cambio_TB_proveedores1`
    FOREIGN KEY (`proveedor`)
    REFERENCES `mydbleda`.`tb_proveedores` (`id_proveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_articulos_cambio_tb_art1`
    FOREIGN KEY (`art`)
    REFERENCES `mydbleda`.`tb_art` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_articulos_cambio_tb_marca1`
    FOREIGN KEY (`marca`)
    REFERENCES `mydbleda`.`tb_marca` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_serv_entrada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_serv_entrada` (
  `id_entrada` BIGINT NOT NULL,
  `id_movimiento` BIGINT NOT NULL,
  `n_id_entrada` VARCHAR(45) NULL,
  `name_entrada` VARCHAR(45) NULL,
  `tel_entrada` VARCHAR(45) NULL,
  INDEX `fk_tb_otroscontactos_tb_movimientos1_idx` (`id_movimiento` ASC),
  PRIMARY KEY (`id_entrada`),
  CONSTRAINT `fk_tb_otroscontactos_tb_movimientos1`
    FOREIGN KEY (`id_movimiento`)
    REFERENCES `mydbleda`.`tb_movimientos` (`id_movimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydbleda`.`tb_serv_salida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbleda`.`tb_serv_salida` (
  `id_salida` BIGINT NOT NULL AUTO_INCREMENT,
  `id_movimiento` BIGINT NOT NULL,
  `n_id_salida` VARCHAR(45) NULL,
  `name_salida` VARCHAR(45) NULL,
  `tel_salida` VARCHAR(45) NULL,
  INDEX `fk_tb_otroscontactos_tb_movimientos1_idx` (`id_movimiento` ASC),
  PRIMARY KEY (`id_salida`),
  CONSTRAINT `fk_tb_otroscontactos_tb_movimientos10`
    FOREIGN KEY (`id_movimiento`)
    REFERENCES `mydbleda`.`tb_movimientos` (`id_movimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
