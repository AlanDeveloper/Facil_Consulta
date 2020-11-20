CREATE TABLE `medico` (
    `id` serial,
    `nome` varchar(250) NOT NULL,
    `email` varchar(250) UNIQUE NOT NULL,
    `password` varchar(250) NOT NULL,
    `data_criacao` timestamp,
    `data_alteracao` timestamp,
    CONSTRAINT `medico_pk` PRIMARY KEY (`id`)
);