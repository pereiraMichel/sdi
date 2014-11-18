SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bdsdi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bdsdi` ;

-- -----------------------------------------------------
-- Table `test`.`semana`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`semana` (
  `idSemana` INT NOT NULL,
  `semana` VARCHAR(65) NULL,
  PRIMARY KEY (`idSemana`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`recompensa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`recompensa` (
  `idRecompensa` INT NOT NULL,
  `recompensa` VARCHAR(85) NULL,
  `pontuacao` INT NULL,
  PRIMARY KEY (`idRecompensa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`comportamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`comportamento` (
  `idComportamento` INT NOT NULL,
  `comportamento` VARCHAR(85) NULL,
  `codSemana` INT NULL,
  `pontos` INT NULL,
  `idSemana` INT NOT NULL,
  `idRecompensa` INT NOT NULL,
  PRIMARY KEY (`idComportamento`),
  INDEX `fk_comportamento_semana1_idx` (`idSemana` ASC),
  INDEX `fk_comportamento_recompensa1_idx` (`idRecompensa` ASC),
  CONSTRAINT `fk_comportamento_semana1`
    FOREIGN KEY (`idSemana`)
    REFERENCES `bdsdi`.`semana` (`idSemana`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comportamento_recompensa1`
    FOREIGN KEY (`idRecompensa`)
    REFERENCES `bdsdi`.`recompensa` (`idRecompensa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`turno` (
  `idTurno` INT NOT NULL,
  `turno` VARCHAR(45) NULL,
  PRIMARY KEY (`idTurno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`nota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`nota` (
  `idNota` INT NOT NULL,
  `nota` DOUBLE NULL,
  PRIMARY KEY (`idNota`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`disciplina` (
  `idDisciiplina` INT NOT NULL,
  `disciplina` VARCHAR(65) NULL,
  `idNota` INT NOT NULL,
  PRIMARY KEY (`idDisciiplina`),
  INDEX `fk_disciplina_nota1_idx` (`idNota` ASC),
  CONSTRAINT `fk_disciplina_nota1`
    FOREIGN KEY (`idNota`)
    REFERENCES `bdsdi`.`nota` (`idNota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`escola`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`escola` (
  `idEscola` INT NOT NULL,
  `nomeEscola` VARCHAR(45) NULL,
  `professor` VARCHAR(45) NULL,
  `comentario` VARCHAR(100) NULL,
  `dataComentario` DATE NULL,
  `dataAlteracao` DATE NULL,
  `grau` INT NULL,
  `dataEntrada` DATE NULL,
  `idTurno` INT NOT NULL,
  `idDisciplina` INT NOT NULL,
  PRIMARY KEY (`idEscola`),
  INDEX `fk_escola_turno1_idx` (`idTurno` ASC),
  INDEX `fk_escola_disciplina1_idx` (`idDisciiplina` ASC),
  CONSTRAINT `fk_escola_turno1`
    FOREIGN KEY (`idTurno`)
    REFERENCES `bdsdi`.`turno` (`idTurno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_escola_disciplina1`
    FOREIGN KEY (`idDisciiplina`)
    REFERENCES `bdsdi`.`disciplina` (`idDisciiplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`tipo` (
  `idTipo` INT NOT NULL,
  `nomeTipo` VARCHAR(85) NULL,
  PRIMARY KEY (`idTipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`nivel` (
  `idNivel` INT NOT NULL,
  `nomeNivel` VARCHAR(65) NULL,
  PRIMARY KEY (`idNivel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`status` (
  `idStatus` INT NOT NULL,
  `nomeStatus` VARCHAR(65) NULL,
  PRIMARY KEY (`idStatus`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`usuario` (
  `idUsuario` INT NOT NULL,
  `nome` VARCHAR(65) NULL,
  `senha` LONGBLOB NULL,
  `dataCadastro` DATE NULL,
  `dataAlteracao` DATE NULL,
  `codTipo` INT NOT NULL,
  `codNivel` INT NOT NULL,
  `codStatus` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_usuario_tipo1_idx` (`codTipo` ASC),
  INDEX `fk_usuario_nivel1_idx` (`codNivel` ASC),
  INDEX `fk_usuario_status1_idx` (`codStatus` ASC),
  CONSTRAINT `fk_usuario_tipo1`
    FOREIGN KEY (`codTipo`)
    REFERENCES `bdsdi`.`tipo` (`idTipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_nivel1`
    FOREIGN KEY (`codNivel`)
    REFERENCES `bdsdi`.`nivel` (`idNivel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_status1`
    FOREIGN KEY (`codStatus`)
    REFERENCES `bdsdi`.`status` (`idStatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`paciente` (
  `idPaciente` INT NOT NULL,
  `nome` VARCHAR(65) NULL,
  `dataNascimento` DATE NULL,
  `peso` INT NULL,
  `tamanho` DOUBLE NULL,
  `dataCadastro` DATE NULL,
  `dataAlteracao` DATE NULL,
  `idComportamento` INT NOT NULL,
  `idEscola` INT NOT NULL,
  `codUsuario` INT NOT NULL,
  PRIMARY KEY (`idPaciente`),
  INDEX `fk_paciente_comportamento_idx` (`idComportamento` ASC),
  INDEX `fk_paciente_escola1_idx` (`idEscola` ASC),
  INDEX `fk_paciente_usuario1_idx` (`codUsuario` ASC),
  CONSTRAINT `fk_paciente_comportamento`
    FOREIGN KEY (`idComportamento`)
    REFERENCES `bdsdi`.`comportamento` (`idComportamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_escola1`
    FOREIGN KEY (`idEscola`)
    REFERENCES `bdsdi`.`escola` (`idEscola`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_usuario1`
    FOREIGN KEY (`codUsuario`)
    REFERENCES `bdsdi`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`contrato` (
  `idContrato` INT NOT NULL,
  `textoContrato` VARCHAR(100) NULL,
  `dataContrato` DATE NULL,
  `dataTermino` DATE NULL,
  `dataRenovacao` DATE NULL,
  `idPaciente` INT NOT NULL,
  PRIMARY KEY (`idContrato`),
  INDEX `fk_contrato_paciente1_idx` (`idPaciente` ASC),
  CONSTRAINT `fk_contrato_paciente1`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `bdsdi`.`paciente` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`registroentrada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`registroentrada` (
  `idRegistro` INT NOT NULL,
  `dataEntrada` DATE NULL,
  `dataSaida` DATE NULL,
  `codUsuario` INT NOT NULL,
  PRIMARY KEY (`idRegistro`),
  INDEX `fk_registroentrada_usuario1_idx` (`codUsuario` ASC),
  CONSTRAINT `fk_registroentrada_usuario1`
    FOREIGN KEY (`codUsuario`)
    REFERENCES `bdsdi`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdsdi`.`registrooperacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdsdi`.`registrooperacoes` (
  `idOperacoes` INT NOT NULL,
  `operacao` VARCHAR(65) NULL,
  `historico` VARCHAR(85) NULL,
  `dataOperacao` DATE NULL,
  `codUsuario` INT NOT NULL,
  PRIMARY KEY (`idOperacoes`),
  INDEX `fk_registrooperacoes_usuario1_idx` (`codUsuario` ASC),
  CONSTRAINT `fk_registrooperacoes_usuario1`
    FOREIGN KEY (`codUsuario`)
    REFERENCES `bdsdi`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
