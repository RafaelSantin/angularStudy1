CREATE TABLE `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dat_nasc` date DEFAULT NULL,
  `biografia` text COLLATE utf8mb4_unicode_ci,
  `datCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `cep` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logradouro` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mensagens` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pessoas_id` int(10) DEFAULT NULL,
  `mensagem_text` text,
  `data_envio` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);