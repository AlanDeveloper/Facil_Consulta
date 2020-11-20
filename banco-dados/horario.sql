CREATE TABLE `horario` (
    `id` serial,
    `id_medico` int,
    `data_horario` datetime NOT NULL,
    `horario_agendado` BIT(1) NOT NULL,
    `data_criacao` timestamp,
    `data_alteracao` timestamp,
    CONSTRAINT `horario_pk` PRIMARY KEY (`id`),
    CONSTRAINT `horario_fk` FOREIGN KEY (`id_medico`)
        REFERENCES `medico`(`id`)
            ON DELETE CASCADE
            ON UPDATE CASCADE
);