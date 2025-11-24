CREATE DATABASE IF NOT EXISTS `arena360`;
USE `arena360`;

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `nome_cliente` varchar(150) NOT NULL,
  `email_cliente` varchar(150) NOT NULL UNIQUE,
  `telefone_cliente` varchar(20) DEFAULT NULL
);

CREATE TABLE `equipamento` (
  `id_equipamento` int NOT NULL,
  `nome_equipamento` varchar(100) NOT NULL,
  `tipo_equipamento` varchar(50) DEFAULT NULL,
  `valor_hora` decimal(10,2) NOT NULL,
  `status_disponivel` tinyint(1) NOT NULL DEFAULT 1
);

CREATE TABLE `reserva` (
  `id_reserva` int NOT NULL,
  `cliente_id` int NOT NULL,
  `equipamento_id` int NOT NULL,
  `data_reserva` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `duracao_horas` int NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
);

ALTER TABLE `cliente` ADD PRIMARY KEY (`id_cliente`);
ALTER TABLE `equipamento` ADD PRIMARY KEY (`id_equipamento`);
ALTER TABLE `reserva` ADD PRIMARY KEY (`id_reserva`);

ALTER TABLE `cliente` MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT;
ALTER TABLE `equipamento` MODIFY `id_equipamento` int NOT NULL AUTO_INCREMENT;
ALTER TABLE `reserva` MODIFY `id_reserva` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `reserva` ADD CONSTRAINT `fk_reserva_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);
ALTER TABLE `reserva` ADD CONSTRAINT `fk_reserva_equipamento` FOREIGN KEY (`equipamento_id`) REFERENCES `equipamento` (`id_equipamento`);