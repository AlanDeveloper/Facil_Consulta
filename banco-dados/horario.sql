CREATE TABLE `horario` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_medico` INT,
    `data_horario` datetime NOT NULL,
    `horario_agendado` BIT(1) NOT NULL,
    `data_criacao` timestamp,
    `data_alteracao` timestamp,
    CONSTRAINT `horario_pk` PRIMARY KEY (`id`),
    CONSTRAINT `horario_fk` FOREIGN KEY (`id_medico`)
        REFERENCES `medico`(`id`)
            ON DELETE CASCADE   
            ON UPDATE CASCADE
)ENGINE = innodb;

INSERT INTO `horario`(`id_medico`, `data_horario`, `horario_agendado`, `data_criacao`, `data_alteracao`) VALUES 
    (3, '2020-11-28 13:58:00', false, now(), now()),
    (3, '2020-12-18 15:00:00', true, now(), now()),
    (4, '2020-11-15 14:00:00', true, now(), now()),
    (5, '2020-11-25 17:58:00', false, now(), now()),
    (6, '2020-11-30 19:58:00', true, now(), now()),
    (8, '2020-12-05 20:38:00', false, now(), now()),
    (7, '2020-12-03 10:18:00', true, now(), now()),
    (9, '2020-12-05 19:50:00', false, now(), now());