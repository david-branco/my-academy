



-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Admin'
-- 
-- ---

DROP TABLE IF EXISTS `Admin`;
    
CREATE TABLE `Admin` (
  `admin_id` INT NOT NULL AUTO_INCREMENT,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
);

-- ---
-- Table 'Docente'
-- 
-- ---

DROP TABLE IF EXISTS `Docente`;
    
CREATE TABLE `Docente` (
  `docente_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `website` MEDIUMTEXT NULL DEFAULT NULL,
  `foto` MEDIUMTEXT NULL DEFAULT NULL,
  `contato` VARCHAR(255) NULL DEFAULT NULL,
  `info_pessoal` MEDIUMTEXT NULL DEFAULT NULL,
  `info_academica` MEDIUMTEXT NULL DEFAULT NULL,
  `info_hobbies` MEDIUMTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`docente_id`)
);

-- ---
-- Table 'Supervisao'
-- 
-- ---

DROP TABLE IF EXISTS `Supervisao`;
    
CREATE TABLE `Supervisao` (
  `supervisao_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `estado` TINYINT NOT NULL DEFAULT 0,
  `tipo` TINYINT NOT NULL DEFAULT 0,
  `local` VARCHAR(255) NULL DEFAULT NULL,
  `nome_estudante` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) NULL DEFAULT NULL,
  `endereco` VARCHAR(255) NULL DEFAULT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `doi` MEDIUMTEXT NULL DEFAULT NULL,
  `nome_coadjuvante` VARCHAR(255) NULL DEFAULT NULL,
  `instituicao_coadjuvante` VARCHAR(255) NULL DEFAULT NULL,
  `data_inicial` VARCHAR(255) NULL DEFAULT NULL,
  `data_final` VARCHAR(255) NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`supervisao_id`)
);

-- ---
-- Table 'Exame'
-- 
-- ---

DROP TABLE IF EXISTS `Exame`;
    
CREATE TABLE `Exame` (
  `exame_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `tipo` TINYINT NOT NULL DEFAULT 0,
  `nome_estudante` VARCHAR(255) NOT NULL,
  `id_estudante` VARCHAR(255) NULL DEFAULT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `tese_url` MEDIUMTEXT NULL DEFAULT NULL,
  `instituicao` VARCHAR(255) NOT NULL,
  `data_exame` VARCHAR(255) NOT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`exame_id`)
);

-- ---
-- Table 'Livro'
-- 
-- ---

DROP TABLE IF EXISTS `Livro`;
    
CREATE TABLE `Livro` (
  `livro_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `autores` VARCHAR(255) NOT NULL,
  `editores` VARCHAR(255) NULL DEFAULT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `capitulo` VARCHAR(255) NULL DEFAULT NULL,
  `paginas` VARCHAR(255) NULL DEFAULT NULL,
  `editora` VARCHAR(255) NOT NULL,
  `data_data` VARCHAR(255) NULL DEFAULT NULL,
  `volume` VARCHAR(255) NULL DEFAULT NULL,
  `isbn` VARCHAR(255) NULL DEFAULT NULL,
  `doi` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`livro_id`)
);

-- ---
-- Table 'Procedimento'
-- 
-- ---

DROP TABLE IF EXISTS `Procedimento`;
    
CREATE TABLE `Procedimento` (
  `procedimento_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `autores` VARCHAR(255) NOT NULL,
  `local` VARCHAR(255) NULL DEFAULT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `titulo_livro` VARCHAR(255) NULL DEFAULT NULL,
  `data_data` VARCHAR(255) NULL DEFAULT NULL,
  `urls` MEDIUMTEXT NULL DEFAULT NULL,
  `isbn` VARCHAR(255) NULL DEFAULT NULL,
  `doi` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`procedimento_id`)
);

-- ---
-- Table 'Artigo'
-- 
-- ---

DROP TABLE IF EXISTS `Artigo`;
    
CREATE TABLE `Artigo` (
  `artigo_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `autores` VARCHAR(255) NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `publicacao` VARCHAR(255) NOT NULL,
  `volume` VARCHAR(255) NULL DEFAULT NULL,
  `data_data` VARCHAR(255) NULL DEFAULT NULL,
  `editora` VARCHAR(255) NULL DEFAULT NULL,
  `issn` VARCHAR(255) NULL DEFAULT NULL,
  `urls` MEDIUMTEXT NULL DEFAULT NULL,
  `doi` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`artigo_id`)
);

-- ---
-- Table 'Investigacao'
-- 
-- ---

DROP TABLE IF EXISTS `Investigacao`;
    
CREATE TABLE `Investigacao` (
  `investigacao_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `periodo` VARCHAR(255) NOT NULL,
  `descricao` MEDIUMTEXT NOT NULL,
  `sites_relacionados` MEDIUMTEXT NOT NULL,
  `publicacoes` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`investigacao_id`)
);

-- ---
-- Table 'Comunicacao'
-- 
-- ---

DROP TABLE IF EXISTS `Comunicacao`;
    
CREATE TABLE `Comunicacao` (
  `comunicacao_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `tipo` VARCHAR(255) NOT NULL,
  `autores` VARCHAR(255) NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `evento` VARCHAR(255) NULL DEFAULT NULL,
  `local` VARCHAR(255) NULL DEFAULT NULL,
  `data_data` VARCHAR(255) NULL DEFAULT NULL,
  `url` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`comunicacao_id`)
);

-- ---
-- Table 'Evento'
-- 
-- ---

DROP TABLE IF EXISTS `Evento`;
    
CREATE TABLE `Evento` (
  `evento_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `tipo_participacao` VARCHAR(255) NOT NULL,
  `data_data` VARCHAR(255) NULL DEFAULT NULL,
  `local` VARCHAR(255) NOT NULL,
  `descricao` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`evento_id`)
);

-- ---
-- Table 'Ensino'
-- 
-- ---

DROP TABLE IF EXISTS `Ensino`;
    
CREATE TABLE `Ensino` (
  `ensino_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `periodo` VARCHAR(255) NOT NULL,
  `instituicao` VARCHAR(255) NOT NULL,
  `curso` VARCHAR(255) NULL DEFAULT NULL,
  `nalunos` INT NULL DEFAULT NULL,
  `url` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`ensino_id`)
);

-- ---
-- Table 'Gestao'
-- 
-- ---

DROP TABLE IF EXISTS `Gestao`;
    
CREATE TABLE `Gestao` (
  `gestao_id` INT NOT NULL AUTO_INCREMENT,
  `docente_id` INT NOT NULL,
  `instituicao` VARCHAR(255) NOT NULL,
  `cargo` VARCHAR(255) NOT NULL,
  `referente` VARCHAR(255) NOT NULL,
  `periodo` VARCHAR(255) NOT NULL,
  `descricao` MEDIUMTEXT NULL DEFAULT NULL,
  `visibilidade` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`gestao_id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `Supervisao` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Exame` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Livro` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Procedimento` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Artigo` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Investigacao` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Comunicacao` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Evento` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Ensino` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);
ALTER TABLE `Gestao` ADD FOREIGN KEY (docente_id) REFERENCES `Docente` (`docente_id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Admin` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Docente` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Supervisao` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Exame` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Livro` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Procedimento` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Artigo` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Investigacao` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Comunicacao` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Evento` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Ensino` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Gestao` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Admin` (`admin_id`,`password`,`email`) VALUES
-- ('','','');
-- INSERT INTO `Docente` (`docente_id`,`nome`,`password`,`email`,`website`,`foto`,`contato`,`info_pessoal`,`info_academica`,`info_hobbies`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `Supervisao` (`supervisao_id`,`docente_id`,`estado`,`tipo`,`local`,`nome_estudante`,`descricao`,`endereco`,`titulo`,`doi`,`nome_coadjuvante`,`instituicao_coadjuvante`,`data_inicial`,`data_final`,`visibilidade`) VALUES
-- ('','','','','','','','','','','','','','','');
-- INSERT INTO `Exame` (`exame_id`,`docente_id`,`tipo`,`nome_estudante`,`id_estudante`,`titulo`,`tese_url`,`instituicao`,`data_exame`,`visibilidade`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `Livro` (`livro_id`,`docente_id`,`autores`,`editores`,`titulo`,`capitulo`,`paginas`,`editora`,`data_data`,`volume`,`isbn`,`doi`,`visibilidade`) VALUES
-- ('','','','','','','','','','','','','');
-- INSERT INTO `Procedimento` (`procedimento_id`,`docente_id`,`autores`,`local`,`titulo`,`titulo_livro`,`data_data`,`urls`,`isbn`,`doi`,`visibilidade`) VALUES
-- ('','','','','','','','','','','');
-- INSERT INTO `Artigo` (`artigo_id`,`docente_id`,`autores`,`titulo`,`publicacao`,`volume`,`data_data`,`editora`,`issn`,`urls`,`doi`,`visibilidade`) VALUES
-- ('','','','','','','','','','','','');
-- INSERT INTO `Investigacao` (`investigacao_id`,`docente_id`,`nome`,`periodo`,`descricao`,`sites_relacionados`,`publicacoes`,`visibilidade`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `Comunicacao` (`comunicacao_id`,`docente_id`,`tipo`,`autores`,`titulo`,`evento`,`local`,`data_data`,`url`,`visibilidade`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `Evento` (`evento_id`,`docente_id`,`nome`,`tipo_participacao`,`data_data`,`local`,`descricao`,`visibilidade`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `Ensino` (`ensino_id`,`docente_id`,`nome`,`periodo`,`instituicao`,`curso`,`nalunos`,`url`,`visibilidade`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `Gestao` (`gestao_id`,`docente_id`,`instituicao`,`cargo`,`referente`,`periodo`,`descricao`,`visibilidade`) VALUES
-- ('','','','','','','','');

