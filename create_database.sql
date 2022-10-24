-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Ferreteria
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Ferreteria` ;

-- -----------------------------------------------------
-- Schema Ferreteria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Ferreteria` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `Ferreteria` ;

-- -----------------------------------------------------
-- Table `Ferreteria`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`producto` (
  `productoId` INT NOT NULL AUTO_INCREMENT,
  `productoDescipcion` VARCHAR(100) NULL,
  `productoNombre` VARCHAR(60) NOT NULL,
  `productoImagen` BLOB NULL,
  `productoPrecio` DECIMAL(12,4) NOT NULL,
  `productoActivo` TINYINT NOT NULL,
  `productoCantStock` DECIMAL(12,4) NOT NULL,
  PRIMARY KEY (`productoId`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`grupo` (
  `grupoId` VARCHAR(5) NOT NULL,
  `grupoNombre` VARCHAR(60) NOT NULL,
  `grupoAdmin` TINYINT NOT NULL,
  PRIMARY KEY (`grupoId`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`usuario` (
  `usuarioId` INT NOT NULL AUTO_INCREMENT,
  `usuarioNombre` VARCHAR(60) NOT NULL,
  `usuarioApellido` VARCHAR(60) NOT NULL,
  `usuarioNroDoc` INT NOT NULL,
  `usuarioTpoDoc` VARCHAR(5) NOT NULL,
  `usuarioDireccion` VARCHAR(255) NOT NULL,
  `usuarioMail` VARCHAR(40) NOT NULL,
  `usuarioUsuWeb` VARCHAR(20) NOT NULL,
  `usuarioPassWeb` VARCHAR(32) NOT NULL,
  `usuarioGrupo` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`usuarioId`),
  INDEX `fk_usuario_grupo1_idx` (`usuarioGrupo` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_grupo1`
    FOREIGN KEY (`usuarioGrupo`)
    REFERENCES `Ferreteria`.`grupo` (`grupoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`carrito` (
  `carritoId` INT NOT NULL AUTO_INCREMENT,
  `usuarioId` INT NOT NULL,
  `carritoTotal` DECIMAL(12,4) NULL,
  PRIMARY KEY (`carritoId`, `usuarioId`),
  INDEX `fk_carrito_usuario1_idx` (`usuarioId` ASC) VISIBLE,
  CONSTRAINT `fk_carrito_usuario1`
    FOREIGN KEY (`usuarioId`)
    REFERENCES `Ferreteria`.`usuario` (`usuarioId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`carritoItem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`carritoItem` (
  `carritoItemId` INT NOT NULL AUTO_INCREMENT,
  `carritoId` INT NOT NULL,
  `carritoItemProducto` INT NOT NULL,
  `carritoItemCant` DECIMAL(12,4) NOT NULL,
  `carritoItemImporte` DECIMAL(12,4) NOT NULL,
  PRIMARY KEY (`carritoItemId`, `carritoId`),
  INDEX `fk_carritoItem_producto1_idx` (`carritoItemProducto` ASC) VISIBLE,
  INDEX `fk_carritoItem_carrito1_idx` (`carritoId` ASC) VISIBLE,
  CONSTRAINT `fk_carritoItem_producto1`
    FOREIGN KEY (`carritoItemProducto`)
    REFERENCES `Ferreteria`.`producto` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carritoItem_carrito1`
    FOREIGN KEY (`carritoId`)
    REFERENCES `Ferreteria`.`carrito` (`carritoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`envio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`envio` (
  `envioId` INT NOT NULL AUTO_INCREMENT,
  `envioDireccionDest` VARCHAR(255) NOT NULL,
  `envioFecha` DATETIME NOT NULL,
  `envioFechaRecepcion` DATETIME NULL,
  `envioEstado` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`envioId`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`categoria` (
  `categoriaId` INT NOT NULL AUTO_INCREMENT,
  `categoriaDescripcion` VARCHAR(60) NOT NULL,
  `categoriaCatePadre` INT NULL,
  PRIMARY KEY (`categoriaId`),
  INDEX `fk_categoria_categoria1_idx` (`categoriaCatePadre` ASC) VISIBLE,
  CONSTRAINT `fk_categoria_categoria1`
    FOREIGN KEY (`categoriaCatePadre`)
    REFERENCES `Ferreteria`.`categoria` (`categoriaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`estadoPedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`estadoPedido` (
  `estadoPedidoId` INT NOT NULL AUTO_INCREMENT,
  `estadoPedidoDesc` VARCHAR(45) NULL,
  PRIMARY KEY (`estadoPedidoId`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`pedido` (
  `pedidoId` INT NOT NULL AUTO_INCREMENT,
  `usuarioId` INT NOT NULL,
  `pedidoFecha` DATETIME NOT NULL,
  `pedidoImporteTotal` DECIMAL(12,4) NOT NULL,
  `pedidoEstado` INT NOT NULL,
  PRIMARY KEY (`pedidoId`, `usuarioId`),
  INDEX `fk_pedido_estadoPedido1_idx` (`pedidoEstado` ASC) VISIBLE,
  INDEX `fk_pedido_usuario1_idx` (`usuarioId` ASC) VISIBLE,
  CONSTRAINT `fk_pedido_estadoPedido1`
    FOREIGN KEY (`pedidoEstado`)
    REFERENCES `Ferreteria`.`estadoPedido` (`estadoPedidoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_usuario1`
    FOREIGN KEY (`usuarioId`)
    REFERENCES `Ferreteria`.`usuario` (`usuarioId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`pedidoItem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`pedidoItem` (
  `pedidoItemId` INT NOT NULL AUTO_INCREMENT,
  `pedidoId` INT NOT NULL,
  `productoItemProducto` INT NOT NULL,
  `pedidoItemCantidad` DECIMAL(12,4) NOT NULL,
  `pedidoItemImporte` DECIMAL(12,4) NOT NULL,
  PRIMARY KEY (`pedidoItemId`, `pedidoId`),
  INDEX `fk_pedidoItem_producto1_idx` (`productoItemProducto` ASC) VISIBLE,
  INDEX `fk_pedidoItem_pedido1_idx` (`pedidoId` ASC) VISIBLE,
  CONSTRAINT `fk_pedidoItem_producto1`
    FOREIGN KEY (`productoItemProducto`)
    REFERENCES `Ferreteria`.`producto` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidoItem_pedido1`
    FOREIGN KEY (`pedidoId`)
    REFERENCES `Ferreteria`.`pedido` (`pedidoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`moneda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`moneda` (
  `monedaId` INT NOT NULL AUTO_INCREMENT,
  `monedaSimbolo` VARCHAR(5) NULL,
  `monedaNombre` VARCHAR(30) NULL,
  PRIMARY KEY (`monedaId`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`monedaCot`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`monedaCot` (
  `monedaId` INT NOT NULL,
  `monedaCotFecha` DATETIME NOT NULL,
  `monedaCotizacion` DECIMAL(12,4) NOT NULL,
  PRIMARY KEY (`monedaId`, `monedaCotFecha`),
  CONSTRAINT `fk_monedaCot_moneda1`
    FOREIGN KEY (`monedaId`)
    REFERENCES `Ferreteria`.`moneda` (`monedaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`programa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`programa` (
  `programaId` INT NOT NULL AUTO_INCREMENT,
  `programaNombre` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`programaId`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`grupoPrograma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`grupoPrograma` (
  `grupoId` VARCHAR(5) NOT NULL,
  `programaId` INT NOT NULL,
  PRIMARY KEY (`grupoId`, `programaId`),
  INDEX `fk_programa_has_grupo_grupo1_idx` (`grupoId` ASC) VISIBLE,
  INDEX `fk_programa_has_grupo_programa1_idx` (`programaId` ASC) VISIBLE,
  CONSTRAINT `fk_programa_has_grupo_programa1`
    FOREIGN KEY (`programaId`)
    REFERENCES `Ferreteria`.`programa` (`programaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programa_has_grupo_grupo1`
    FOREIGN KEY (`grupoId`)
    REFERENCES `Ferreteria`.`grupo` (`grupoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Ferreteria`.`productoCategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ferreteria`.`productoCategoria` (
  `categoriaId` INT NOT NULL,
  `productoId` INT NOT NULL,
  PRIMARY KEY (`categoriaId`, `productoId`),
  INDEX `fk_producto_has_categoria_categoria1_idx` (`categoriaId` ASC) VISIBLE,
  INDEX `fk_producto_has_categoria_producto1_idx` (`productoId` ASC) VISIBLE,
  CONSTRAINT `fk_producto_has_categoria_producto1`
    FOREIGN KEY (`productoId`)
    REFERENCES `Ferreteria`.`producto` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_categoria_categoria1`
    FOREIGN KEY (`categoriaId`)
    REFERENCES `Ferreteria`.`categoria` (`categoriaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
