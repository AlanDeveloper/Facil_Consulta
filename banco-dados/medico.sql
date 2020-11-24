CREATE TABLE `medico` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` varchar(250) NOT NULL,
    `email` varchar(250) UNIQUE NOT NULL,
    `senha` varchar(250) NOT NULL,
    `data_criacao` timestamp,
    `data_alteracao` timestamp,
    CONSTRAINT `medico_pk` PRIMARY KEY (`id`)
)ENGINE = innodb;


INSERT INTO `medico`(`nome`, `email`, `senha`, `data_criacao`, `data_alteracao`) VALUES
    ('Keven Bingre Canedo', 'kbingre@gmail.com', md5(123456), now(), now()),
    ('Derek Severo Brião', 'severo.briao@gmail.com', md5(464266), now(), now()),
    ('Ana Calçada Monsanto', 'anacalçadamonsanto@gmail.com', md5('anacalçada'), now(), now()),
    ('Cristóvão Barroqueiro Cesário', 'cris@gmail.com', md5(154465464), now(), now()),
    ('Matias Meireles Lindim', 'matiasm123@gmail.com', md5(878978789), now(), now()),
    ('Luara Nogueira Durão', 'luaraNogu@gmail.com', md5(554564545), now(), now());