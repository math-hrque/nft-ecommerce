

------------------------------------------administradores
------------------------------------------administradores
------------------------------------------administradores

CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;


------------------------------------------administradores
------------------------------------------administradores
------------------------------------------administradores

-----------------------insert primeiro usuario ----------------------------------------

INSERT INTO `administradores` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'admin', 'admin@admin.com.br', '202cb962ac59075b964b07152d234b70', 1, 1, '2016-02-14 00:00:01', '2016-02-20 21:58:01');

-----------------------insert primeiro usuario ----------------------------------------




------------------------------------------niveis de acesso
------------------------------------------niveis de acesso
------------------------------------------niveis de acesso



CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

------------------------------------------niveis de acesso
------------------------------------------niveis de acesso
------------------------------------------niveis de acesso


--------------------------------------- inserir nivel de acesso ----------------------------
-------- podem ter varios niveis de acesso basta adicionar mais niveis ao arquivo VALIDA.php --------------

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2016-02-19 00:00:00', NULL),


------------------------------------------niveis de acesso
------------------------------------------niveis de acesso
------------------------------------------niveis de acesso



----------------------- NFT
----------------------- NFT
----------------------- NFT

-----------------------------nft tabela padrao nome sendo nome da URL da imagem a ser utilizada pela web -----------------------
-----------------------------nft tabela padrao nome sendo nome da URL da imagem a ser utilizada pela web -----------------------

CREATE TABLE nft (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(450) NOT NULL,
    descricao VARCHAR(450) NOT NULL,
    preco VARCHAR(20) DEFAULT NULL,
    PRIMARY KEY(id)
);

-----------------------------nft tabela padrao nome sendo nome da URL da imagem a ser utilizada pela web -----------------------
-----------------------------nft tabela padrao nome sendo nome da URL da imagem a ser utilizada pela web -----------------------
----------------------- NFT
----------------------- NFT
----------------------- NFT
