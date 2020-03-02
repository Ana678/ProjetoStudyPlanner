-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: 14-Fev-2020 às 16:54
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atividades`
--

CREATE TABLE `tb_atividades` (
  `ATI_CODIGO` int(11) NOT NULL,
  `ATI_TIPO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_atividades`
--

INSERT INTO `tb_atividades` (`ATI_CODIGO`, `ATI_TIPO`) VALUES
(1, 'Individual'),
(2, 'Em Grupo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `COM_CODIGO` int(11) NOT NULL,
  `COM_COMENTARIO` text NOT NULL,
  `COM_DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COM_USU_CODIGO` int(11) NOT NULL,
  `COM_POS_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`COM_CODIGO`, `COM_COMENTARIO`, `COM_DATA`, `COM_USU_CODIGO`, `COM_POS_CODIGO`) VALUES
(1, 'eu acho que poderíamos trabalhar algo voltado pra questão do óleo nas praias do Nordeste', '2019-10-23 15:07:09', 7, 30),
(4, 'Mas esse não seria um tema óbvio e que não cairia?', '2019-10-23 15:14:18', 14, 30),
(9, 'Sim, no entanto temos que treinar e estar atualizados de qualquer maneira', '2019-10-23 15:16:06', 13, 30),
(10, 'é verdade, pode ser essa a temática', '2019-10-23 15:17:27', 14, 30),
(12, 'uhul, vamos a produção!', '2019-10-23 15:18:07', 7, 30),
(13, 'Que tal algo com moda, João? Nós dois gostamos haha', '2019-09-23 15:20:44', 14, 31),
(14, ' Amei haha! Me interesso muito. Que tal um selecionador de looks? ', '2019-09-23 15:22:48', 13, 31),
(15, 'Acho ótimo, você fica com o frontend?', '2019-09-23 15:23:04', 14, 31),
(16, 'Claro migs, vou começar a traçar as ideias e te mando! ', '2019-09-23 15:24:50', 13, 31),
(17, 'Combinado!', '2019-09-23 15:25:03', 14, 31),
(19, 'Muito bem meninos, amei a ideia!', '2019-09-23 15:26:39', 12, 31),
(20, 'Paracetamol, e a de vocês? ', '2019-10-23 15:35:16', 13, 32),
(21, 'A minha e a de Bento é a da dipirona. ', '2019-10-23 15:36:21', 7, 32),
(22, 'Que materiais você vai usar? ', '2019-10-23 15:37:06', 14, 32),
(23, 'Estou pensando em usar bolinhas de isopor e palitos de churrasco, como vocês farão? ', '2019-10-23 15:37:17', 13, 32),
(24, 'Pensamos o mesmo, e pintar as bolinhas com tinta guache.', '2019-10-23 15:38:55', 14, 32),
(25, 'Não podemos esquecer da base de isopor pra sustentar a molécula.', '2019-10-23 15:39:53', 7, 32),
(26, 'Amanhã conversaremos com o secretário de saúde de Caicó, e quinta com o de educação', '2019-10-23 15:43:21', 13, 33),
(27, 'Ótimo! Depois disso analisamos a pesquisa que fizemos e colocamos a mão na massa, ok? ', '2019-10-23 15:43:57', 15, 33),
(28, 'Fechado! Precisamos dar o gás, saúde e educação são fundamentais para que nossa chapa seja vitoriosa! ', '2019-10-23 15:44:10', 13, 33),
(29, 'Sem dúvidas. Alisson e Edson vão ganhar!', '2019-10-23 15:44:21', 15, 33),
(30, 'Vamos a vitória. 2M campeã!', '2019-10-23 15:44:46', 13, 33),
(36, 'Vamos lá ! Quarta, quinta e sexta-feira, a partir das 16:00h até 21:00', '2019-10-23 16:31:09', 16, 36),
(37, 'Concordo, perfeito!', '2019-10-23 16:32:23', 17, 36),
(38, 'fico responsável pela exposição de softwares ', '2019-10-23 16:33:06', 17, 36),
(39, 'sou responsável pela estação ciência', '2019-10-23 16:42:35', 16, 36),
(40, 'tenho uma ideia... podemos fazer a primeira mostra de experiencias do campus!', '2019-10-23 16:43:40', 12, 36),
(41, 'Perfeitoooo!', '2019-10-23 16:44:15', 17, 36),
(42, 'essa turma está muito barulhenta!', '2019-10-23 16:49:12', 17, 37),
(43, 'Eu percebi que o rendimento deles baixou muito!', '2019-10-23 16:50:52', 12, 37),
(46, 'zzxzx', '2020-02-07 20:23:50', 13, 31),
(47, 'cvcv', '2020-02-12 19:16:34', 13, 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudos`
--

CREATE TABLE `tb_conteudos` (
  `CON_CODIGO` int(11) NOT NULL,
  `CON_DESCRICAO` varchar(100) DEFAULT NULL,
  `CON_FINALIZADO` int(1) DEFAULT NULL,
  `CON_USU_CODIGO` int(11) NOT NULL,
  `COM_USU_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_desempenhousuarios`
--

CREATE TABLE `tb_desempenhousuarios` (
  `DES_CODIGO` int(11) NOT NULL,
  `DES_DIA_CODIGO` int(11) NOT NULL,
  `DES_DATA` date NOT NULL,
  `DES_DESEMPENHO` int(11) NOT NULL,
  `DES_USU_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_desempenhousuarios`
--

INSERT INTO `tb_desempenhousuarios` (`DES_CODIGO`, `DES_DIA_CODIGO`, `DES_DATA`, `DES_DESEMPENHO`, `DES_USU_CODIGO`) VALUES
(6, 3, '2020-02-11', 1, 13),
(7, 5, '2020-02-13', 1, 13),
(8, 5, '2020-02-13', 3, 13),
(9, 1, '2020-02-09', 3, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dias`
--

CREATE TABLE `tb_dias` (
  `DIA_CODIGO` int(11) NOT NULL,
  `DIA_DIA` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_dias`
--

INSERT INTO `tb_dias` (`DIA_CODIGO`, `DIA_DIA`) VALUES
(1, 'Domingo'),
(2, 'Segunda'),
(3, 'Terca'),
(4, 'Quarta'),
(5, 'Quinta'),
(6, 'Sexta'),
(7, 'Sabado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eventosusuarios`
--

CREATE TABLE `tb_eventosusuarios` (
  `EVU_CODIGO` int(11) NOT NULL,
  `EVU_DATA` date NOT NULL,
  `EVU_TITULO` varchar(45) NOT NULL,
  `EVU_DESCRICAO` text NOT NULL,
  `EVU_USU_CODIGO` int(11) NOT NULL,
  `EVU_COR` text NOT NULL,
  `EVU_FIN_CODIGO` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_eventosusuarios`
--

INSERT INTO `tb_eventosusuarios` (`EVU_CODIGO`, `EVU_DATA`, `EVU_TITULO`, `EVU_DESCRICAO`, `EVU_USU_CODIGO`, `EVU_COR`, `EVU_FIN_CODIGO`) VALUES
(3, '2020-02-08', 'ENTREGA DO PE', 'VAI DAR CERTO', 7, '#FF00FF', 1),
(4, '2020-02-08', 'Expotec', 'apresentação parcial do pp', 7, '#00FF00', 1),
(8, '0000-00-00', 'AULA', 'atividade', 13, '#81F7BE', 2),
(9, '0000-00-00', 'AULA', 'atividade', 13, '#3A01DF', 2),
(14, '2020-02-28', 'APRESENTAÇÃO', 'dia especial', 13, '#400000', 2),
(15, '2020-08-04', 'NIVER', 'vai ser show', 13, '#ff8000', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_finalizado`
--

CREATE TABLE `tb_finalizado` (
  `FIN_CODIGO` int(11) NOT NULL,
  `FIN_FINALIZADO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_finalizado`
--

INSERT INTO `tb_finalizado` (`FIN_CODIGO`, `FIN_FINALIZADO`) VALUES
(1, 'nao'),
(2, 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_frases`
--

CREATE TABLE `tb_frases` (
  `FRA_CODIGO` int(11) NOT NULL,
  `FRA_FRASE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_frases`
--

INSERT INTO `tb_frases` (`FRA_CODIGO`, `FRA_FRASE`) VALUES
(1, 'A vida tanto lhe pode dar o melhor como o pior, mas é você quem escolhe aquilo que vai permanecer ou ficar para trás.'),
(2, 'O poder está dentro de você, na sua mente, pois se acreditar que consegue não haverá obstáculo capaz de impedir o seu sucesso.'),
(3, 'A persistência é o caminho do êxito.'),
(4, 'Toda ação humana, quer se torne positiva ou negativa, precisa depender de motivação.'),
(5, 'Toda conquista começa com a decisão de tentar.'),
(6, 'Enfrente cada desafio como uma oportunidade de crescimento.'),
(7, 'Você já experimentou acreditar em si mesmo? Tente...'),
(8, 'Comece onde você está. Use o que você tiver. Faça o que você puder.'),
(9, 'O sucesso é a soma de pequenos esforços repetidos dia após dia.'),
(10, 'Oportunidades não surgem, é você que as cria.'),
(11, 'Sonhe, trace metas, estabeleça prioridades e corra riscos para executar seus sonhos. Melhor é errar por tentar do que errar por omitir.'),
(12, 'Porque suas ações determinam o seu futuro, estude e dedique-se aos seus sonhos para amanhã os realizar.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupos`
--

CREATE TABLE `tb_grupos` (
  `GRU_CODIGO` int(11) NOT NULL,
  `GRU_NOME` varchar(25) NOT NULL,
  `GRU_DESCRICAO` varchar(45) DEFAULT NULL,
  `GRU_DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grupos`
--

INSERT INTO `tb_grupos` (`GRU_CODIGO`, `GRU_NOME`, `GRU_DESCRICAO`, `GRU_DATA`) VALUES
(19, 'Grupo de Redação ', 'grupo direcionado ao estudo de redação ', '2019-10-23 13:47:33'),
(20, 'Projeto de Autoria Web', 'projeto de matéria técnica', '2019-10-23 13:54:30'),
(21, 'Planos de Governo', 'Trabalho da matéria de Sociologia', '2019-10-23 13:56:37'),
(22, 'Grupo da Molécula', 'grupo destinado à produção de uma molécula - ', '2019-10-23 13:58:44'),
(26, 'Estudo de Filosofia', 'grupo destinado à tirar duvidas sobre filosof', '2019-10-23 14:03:59'),
(28, 'Expotec', 'grupo destinado à organização da expotec 2019', '2019-10-23 14:08:22'),
(29, 'Grupo dos Professores', 'Condutores de almas e sonhos', '2019-10-23 14:09:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_gru_dos_usuarios`
--

CREATE TABLE `tb_gru_dos_usuarios` (
  `GDU_GRU_CODIGO` int(11) NOT NULL,
  `GDU_USU_CODIGO` int(11) NOT NULL,
  `GDU_RANKING` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_gru_dos_usuarios`
--

INSERT INTO `tb_gru_dos_usuarios` (`GDU_GRU_CODIGO`, `GDU_USU_CODIGO`, `GDU_RANKING`) VALUES
(19, 7, 5),
(19, 13, 7),
(19, 14, 0),
(20, 12, 0),
(20, 13, 5),
(20, 14, 0),
(21, 13, 0),
(21, 15, 0),
(22, 7, 0),
(22, 13, 0),
(22, 14, 0),
(28, 12, 0),
(28, 16, 0),
(28, 17, 0),
(29, 12, 0),
(29, 16, 0),
(29, 17, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensagens`
--

CREATE TABLE `tb_mensagens` (
  `MEN_CODIGO` int(11) NOT NULL,
  `MEN_TEXTO` text NOT NULL,
  `MEN_COR` text NOT NULL,
  `MEN_DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_mensagens`
--

INSERT INTO `tb_mensagens` (`MEN_CODIGO`, `MEN_TEXTO`, `MEN_COR`, `MEN_DATA`) VALUES
(2, 'SDSDS', '#008000', '2020-02-10 18:43:23'),
(3, 'ASSAS', '#0000ff', '2020-02-10 18:43:51'),
(4, 'XCXC', '#000000', '2020-02-10 18:44:16'),
(8, 'SAS', '#000000', '2020-02-10 19:00:39'),
(9, 'SASA', '#000000', '2020-02-10 19:00:42'),
(10, 'b b ', '#000000', '2020-02-12 16:09:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_men_dos_destinatarios`
--

CREATE TABLE `tb_men_dos_destinatarios` (
  `MDD_MEN_CODIGO` int(11) NOT NULL,
  `MDD_USU_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_men_dos_destinatarios`
--

INSERT INTO `tb_men_dos_destinatarios` (`MDD_MEN_CODIGO`, `MDD_USU_CODIGO`) VALUES
(1, 7),
(2, 7),
(3, 13),
(4, 7),
(5, 7),
(6, 7),
(7, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_men_dos_remetentes`
--

CREATE TABLE `tb_men_dos_remetentes` (
  `MDR_MEN_CODIGO` int(11) NOT NULL,
  `MDR_USU_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_men_dos_remetentes`
--

INSERT INTO `tb_men_dos_remetentes` (`MDR_MEN_CODIGO`, `MDR_USU_CODIGO`) VALUES
(1, 13),
(2, 7),
(3, 7),
(4, 13),
(5, 13),
(6, 13),
(7, 13),
(8, 13),
(9, 13),
(10, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  `POS_CODIGO` int(11) NOT NULL,
  `POS_TEXTO` text,
  `POS_DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `POS_GRU_CODIGO` int(11) NOT NULL,
  `POS_USU_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`POS_CODIGO`, `POS_TEXTO`, `POS_DATA`, `POS_GRU_CODIGO`, `POS_USU_CODIGO`) VALUES
(30, 'Galerinha, vamos decidir o tema dessa semana', '2019-10-23 13:50:53', 19, 13),
(31, 'Bento, o que acha que podemos desenvolver nesse projeto? ', '2019-10-23 15:20:02', 20, 13),
(32, 'Gente, qual a molécula de vocês?', '2019-10-23 15:34:31', 22, 7),
(33, 'Por onde começaremos o plano de governo da secretaria de educação e saúde? ', '2019-10-23 15:42:44', 21, 15),
(36, 'Pessoal, precisamos definir os dias da expotec, assim como os horários. E as salas que ficaremos responsáveis!', '2019-10-23 16:29:08', 28, 12),
(37, 'Gente, preciso discutir uma coisa com vocês. Uma turma tem chamado minha atenção! A 2M', '2019-10-23 16:47:27', 29, 16),
(38, 'SDSD', '2020-02-12 17:17:22', 19, 13),
(39, 'dffdf', '2020-02-12 17:40:59', 19, 7),
(40, 'dsds', '2020-02-12 18:16:15', 20, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_rotinaestudo`
--

CREATE TABLE `tb_rotinaestudo` (
  `ROT_CODIGO` int(11) NOT NULL,
  `ROT_INICIO` time DEFAULT NULL,
  `ROT_FIM` time DEFAULT NULL,
  `ROT_DESCRICAO` text,
  `ROT_USU_CODIGO` int(11) NOT NULL,
  `ROT_DIA_CODIGO` int(11) NOT NULL,
  `ROT_ATI_CODIGO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_rotinaestudo`
--

INSERT INTO `tb_rotinaestudo` (`ROT_CODIGO`, `ROT_INICIO`, `ROT_FIM`, `ROT_DESCRICAO`, `ROT_USU_CODIGO`, `ROT_DIA_CODIGO`, `ROT_ATI_CODIGO`) VALUES
(36, '13:30:00', '14:00:00', 'Ler Capitulo 2 do livro', 7, 2, 1),
(39, '07:00:00', '12:00:00', 'Aula', 7, 4, 1),
(40, '07:00:00', '12:00:00', 'Aula', 7, 5, 1),
(41, '07:00:00', '12:00:00', 'Aula', 7, 6, 1),
(42, '14:00:00', '16:00:00', 'Terminar Atividade de BDD', 7, 1, 1),
(43, '13:00:00', '14:30:00', 'Estudo de matemática sobre cones', 7, 3, 2),
(45, '08:30:00', '10:00:00', 'Exercitar escalas do clarinete', 7, 1, 1),
(46, '08:30:00', '10:00:00', 'Ler capítulos 3 e 4 do livro', 7, 7, 1),
(48, '14:31:00', '16:00:00', 'Horário de descanso', 7, 2, 1),
(52, '16:00:00', '18:00:00', 'Treino', 7, 5, 1),
(53, '16:00:00', '18:00:00', 'Treino', 7, 7, 1),
(54, '14:30:00', '16:20:00', 'Pesquisar sobre viajens', 7, 4, 1),
(55, '13:30:00', '00:00:00', 'Descansar', 7, 6, 1),
(56, '06:30:00', '07:30:00', 'Correr', 13, 1, 1),
(57, '10:00:00', '12:00:00', 'Ajudar mãe com almoço', 13, 1, 1),
(58, '16:00:00', '17:30:00', 'Finalizar o livro Jardim de Cimento ', 13, 1, 1),
(59, '19:00:00', '21:30:00', 'Missa + jantar com as meninas', 13, 1, 1),
(60, '07:00:00', '12:00:00', 'Aula', 13, 2, 1),
(61, '14:00:00', '15:30:00', 'Academia', 13, 2, 1),
(62, '16:00:00', '18:00:00', 'Estudar Isomeria ', 13, 2, 1),
(63, '19:00:00', '20:00:00', 'Discutir tema de redação da semana', 13, 2, 2),
(64, '20:00:00', '21:00:00', 'Fazer resumo de Português (O.S)', 13, 2, 1),
(65, '07:00:00', '12:00:00', 'Aula', 13, 3, 1),
(66, '14:00:00', '15:30:00', 'Academia', 13, 3, 1),
(67, '16:00:00', '17:00:00', 'Produzir redação semanal', 13, 3, 1),
(68, '18:00:00', '19:00:00', 'Jantar + descanso', 13, 3, 1),
(69, '19:00:00', '20:00:00', 'Tarefa semanal do curso virtual de Design ', 13, 3, 2),
(70, '20:00:00', '21:00:00', 'Projeto de Autoria Web', 13, 3, 2),
(71, '07:00:00', '12:00:00', 'Aula', 13, 4, 1),
(72, '14:00:00', '15:30:00', 'Academia', 13, 4, 1),
(73, '16:00:00', '17:00:00', 'Resolver ½ da lista de Matemática ', 13, 4, 1),
(74, '18:00:00', '19:00:00', 'Fazer resumos de Biologia', 13, 4, 1),
(75, '20:00:00', '22:00:00', 'Assistir preliminar do MGI', 13, 4, 1),
(76, '07:00:00', '12:00:00', 'Aula', 13, 5, 1),
(77, '14:00:00', '15:30:00', 'Academia', 13, 5, 1),
(78, '16:00:00', '17:00:00', 'Acabar lista de Matemática ', 13, 5, 1),
(79, '18:00:00', '19:00:00', 'Elaborar plano de governo da Secretaria de Educação (Sociologia)', 13, 5, 2),
(80, '20:00:00', '21:30:00', 'Individual-Assistir Malévola: Dona do Mal', 13, 5, 1),
(81, '07:00:00', '12:00:00', 'Aula', 13, 6, 1),
(82, '14:00:00', '15:30:00', 'Academia', 13, 6, 1),
(83, '16:00:00', '17:00:00', 'Elaborar plano de governo da Secretaria de Saúde (Sociologia) ', 13, 6, 2),
(84, '18:00:00', '19:00:00', 'Fazer pesquisa da molécula do Paracetamol', 13, 6, 2),
(85, '20:00:00', '23:00:00', 'Aniversário ', 13, 6, 1),
(86, '07:00:00', '08:00:00', 'Correr no açude', 13, 7, 1),
(87, '10:00:00', '12:00:00', 'Listas de exercícios pendentes', 13, 7, 1),
(88, '14:00:00', '16:30:00', 'Resumos pendentes ', 13, 7, 1),
(89, '20:00:00', '22:00:00', 'Sair com as migles', 13, 7, 2),
(90, '07:00:00', '08:30:00', 'Aula Turma Informática ', 12, 2, 1),
(91, '08:50:00', '10:20:00', 'Aula Turma Eletro', 12, 2, 1),
(92, '10:20:00', '13:00:00', 'Descanso + Horário de almoço', 12, 2, 1),
(93, '13:00:00', '14:30:00', 'Aula de pilates ', 12, 2, 1),
(94, '15:00:00', '16:00:00', 'Revisar aula para amanhã ', 12, 2, 1),
(95, '16:00:00', '17:20:00', 'Elaborar testes', 12, 2, 1),
(96, '08:50:00', '10:20:00', 'Estudar para prova de doutorado', 12, 3, 1),
(97, '10:30:00', '12:00:00', 'Ler um livro', 12, 3, 1),
(98, '14:50:00', '16:20:00', 'Aula na turma Mulheres mil', 12, 3, 1),
(99, '16:30:00', '17:40:00', 'Reunião da Expotec', 12, 3, 2),
(100, '08:00:00', '08:30:00', 'Revisar aula do laboratório', 12, 4, 1),
(101, '09:00:00', '10:10:00', 'Aula de natação ', 12, 4, 1),
(102, '10:30:00', '11:40:00', 'Reunião com o professor Ari', 12, 4, 1),
(103, '11:40:00', '13:00:00', 'Descanso ', 12, 4, 1),
(104, '13:10:00', '14:30:00', 'Aula na turma de Informática ', 12, 4, 1),
(105, '08:00:00', '10:00:00', 'Reunião pedagógica', 12, 5, 2),
(106, '10:10:00', '11:30:00', 'Estudar para prova de doutorado ', 12, 5, 1),
(107, '11:30:00', '13:00:00', 'Descanso', 12, 5, 1),
(108, '13:00:00', '14:50:00', 'Aula de treinamento para pedagogos', 12, 5, 1),
(109, '15:00:00', '16:30:00', 'Ler um livro', 12, 5, 1),
(110, '16:30:00', '17:30:00', 'Aula de pilates ', 12, 5, 1),
(111, '19:00:00', '20:30:00', 'Aula informática subsequente', 12, 5, 1),
(112, '07:00:00', '08:50:00', 'Aplicar testa mulheres mil (contra turno)', 12, 6, 1),
(113, '09:00:00', '10:30:00', 'Ler um livro', 12, 6, 1),
(114, '10:40:00', '11:10:00', 'Fazer inscrição do doutorado ', 12, 6, 1),
(115, '11:30:00', '13:00:00', 'Descanso', 12, 6, 1),
(116, '15:00:00', '16:30:00', 'Aula de natação', 12, 6, 1),
(117, '17:00:00', '18:00:00', 'Preparar o slide para a aula ', 12, 6, 1),
(118, '18:30:00', '19:30:00', 'Corrigir testes de informática ', 12, 6, 1),
(119, '20:00:00', '22:30:00', 'Jantar com o homem ', 12, 6, 1),
(120, '08:00:00', '10:00:00', 'Descanso', 12, 7, 1),
(121, '10:10:00', '11:30:00', 'Corrigir teste das mulheres mil', 12, 7, 1),
(122, '11:30:00', '13:00:00', 'Almoço em família ', 12, 7, 2),
(123, '14:00:00', '14:50:00', 'Ler um livro', 12, 7, 1),
(124, '15:30:00', '16:30:00', 'Planejar uma aula ', 12, 7, 1),
(125, '17:00:00', '17:20:00', 'Enviar o projeto para expotec', 12, 7, 1),
(126, '18:00:00', '19:00:00', 'Caminhada', 12, 7, 1),
(127, '08:00:00', '09:20:00', 'Estudar para prova de doutorado', 12, 1, 1),
(128, '11:30:00', '13:00:00', 'Almoço com os professores', 12, 1, 2),
(129, '14:00:00', '16:00:00', 'Cinema', 12, 1, 2),
(130, '17:00:00', '18:20:00', 'Caminhada', 12, 1, 1),
(131, '07:10:00', '08:10:00', 'Estudar Redes', 14, 1, 1),
(132, '08:10:00', '09:10:00', 'Fazer Exercícios ', 14, 1, 1),
(133, '09:40:00', '10:40:00', 'Estudar química', 14, 1, 1),
(134, '10:40:00', '11:40:00', 'Listas de exercícios de Química', 14, 1, 1),
(135, '13:10:00', '14:10:00', 'Estudar Biologia', 14, 1, 1),
(136, '14:10:00', '15:10:00', 'Tirar dúvidas com os colegas do grupo', 14, 1, 2),
(137, '07:10:00', '08:10:00', 'Estudar matemática', 14, 2, 1),
(138, '08:10:00', '09:10:00', ' Resolver questões do ITA', 14, 2, 1),
(139, '09:40:00', '10:40:00', 'Estudar trigonometria', 14, 2, 1),
(140, '10:40:00', '11:40:00', 'Fazer Exercícios', 14, 2, 1),
(141, '13:10:00', '14:10:00', 'Fazer Molécula', 14, 2, 1),
(142, '14:10:00', '15:10:00', 'Fazer seminário da molécula', 14, 2, 2),
(143, '07:10:00', '08:10:00', 'Tirar dúvidas de Sociologia', 14, 3, 1),
(144, '08:10:00', '09:10:00', 'Tirar dúvidas de Filosofia', 14, 3, 2),
(145, '09:10:00', '09:30:00', 'FAZER INSCRIÇÃO PARA EAM', 14, 3, 1),
(146, '09:30:00', '09:40:00', 'Descansar', 14, 3, 1),
(147, '09:40:00', '10:40:00', 'Estudar redação', 14, 3, 1),
(148, '10:40:00', '11:40:00', 'Treinar Redação', 14, 3, 1),
(149, '13:10:00', '14:10:00', 'Estudar as Partituras ', 14, 3, 1),
(150, '14:10:00', '15:10:00', 'Treinar as partituras', 14, 3, 1),
(151, '19:00:00', '22:00:00', 'Aula', 14, 2, 1),
(152, '19:00:00', '22:00:00', 'Aula', 14, 3, 1),
(153, '19:00:00', '22:00:00', 'Aula', 14, 4, 1),
(154, '19:00:00', '22:00:00', 'Aula', 14, 5, 1),
(155, '19:00:00', '22:00:00', 'Aula', 14, 6, 1),
(156, '07:10:00', '08:10:00', 'Estudar para Banco de Dados', 14, 4, 1),
(157, '08:10:00', '09:10:00', 'Projeto Pizzaria', 14, 4, 1),
(158, '09:10:00', '09:30:00', 'Corrigir erros do projeto', 14, 4, 2),
(159, '07:10:00', '08:10:00', 'Ler o livro', 14, 5, 1),
(160, '08:10:00', '09:10:00', 'Tirar dúvidas sobre o livro', 14, 5, 1),
(161, '09:10:00', '09:30:00', 'Estudar orações subordinadas', 14, 5, 1),
(162, '09:30:00', '09:40:00', 'Fazer Exercícios', 14, 5, 1),
(163, '09:40:00', '10:40:00', 'Estudar leis de Newton', 14, 5, 1),
(164, '00:00:00', '00:00:00', 'Estudar leis', 14, 5, 1),
(165, '10:40:00', '11:40:00', 'Estudar leis das atrações', 14, 5, 1),
(166, '13:10:00', '14:10:00', 'Fazer lista de Física', 14, 5, 1),
(167, '14:10:00', '15:10:00', 'Estudar Probabilidade', 14, 5, 1),
(168, '07:10:00', '08:10:00', 'Estudar Mitocôndrias ', 14, 6, 1),
(169, '08:10:00', '09:10:00', 'Estudar Respiração celular', 14, 6, 1),
(170, '09:10:00', '12:30:00', 'Olimpíada de Biologia', 14, 6, 1),
(171, '12:30:00', '14:10:00', 'Descansar', 14, 6, 1),
(172, '14:10:00', '16:10:00', 'Estudar Autoria Web', 14, 6, 1),
(173, '09:30:00', '09:40:00', 'Aula de Musica', 14, 4, 1),
(174, '09:40:00', '10:40:00', 'Fic de Redação', 14, 4, 1),
(175, '10:40:00', '11:40:00', 'Ler o orfanato da senhora peregrine ', 14, 4, 1),
(176, '13:10:00', '14:10:00', 'Fazer atividade de História', 14, 4, 1),
(177, '14:10:00', '15:10:00', 'Fichamento de Geografia', 14, 4, 1),
(178, '07:10:00', '08:10:00', 'Estudar para História', 14, 7, 1),
(179, '08:10:00', '09:10:00', 'Estudar para Inglês ', 14, 7, 1),
(180, '09:10:00', '12:30:00', 'Estudar as propriedades físicas dos hidrocarbonetos', 14, 7, 1),
(181, '13:30:00', '14:30:00', 'Resolver Questões do ENEM', 14, 7, 1),
(182, '15:10:00', '17:10:00', 'Curso de Make', 14, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `USU_CODIGO` int(11) NOT NULL,
  `USU_NOME` varchar(50) NOT NULL,
  `USU_SOBRENOME` varchar(50) NOT NULL,
  `USU_SENHA` varchar(25) NOT NULL,
  `USU_EMAIL` varchar(50) NOT NULL,
  `USU_ARQUIVO` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`USU_CODIGO`, `USU_NOME`, `USU_SOBRENOME`, `USU_SENHA`, `USU_EMAIL`, `USU_ARQUIVO`) VALUES
(7, 'Ana', 'Maria', 'ana', 'ana@hotmail.com', '7.jpg'),
(12, 'Erica', 'Maria', '12345', 'erica@hotmail.com', '12.jpg'),
(13, 'joao ', 'elias', '123456', 'joao@hotmail.com', '13.jpg'),
(14, 'Bento', 'Diniz', '12', 'bentodiniz@hotmail.com', '14.jpg'),
(15, 'Augusto', 'Castro', 'guto', 'augusto@hotmail.com', '15.jpg'),
(16, 'José', '', '1', 'jose@hotmail.com', '16.jpg'),
(17, 'Mercia', '', '10', 'mercia@hotmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_atividades`
--
ALTER TABLE `tb_atividades`
  ADD PRIMARY KEY (`ATI_CODIGO`);

--
-- Indexes for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`COM_CODIGO`);

--
-- Indexes for table `tb_conteudos`
--
ALTER TABLE `tb_conteudos`
  ADD PRIMARY KEY (`CON_CODIGO`);

--
-- Indexes for table `tb_desempenhousuarios`
--
ALTER TABLE `tb_desempenhousuarios`
  ADD PRIMARY KEY (`DES_CODIGO`);

--
-- Indexes for table `tb_dias`
--
ALTER TABLE `tb_dias`
  ADD PRIMARY KEY (`DIA_CODIGO`);

--
-- Indexes for table `tb_eventosusuarios`
--
ALTER TABLE `tb_eventosusuarios`
  ADD PRIMARY KEY (`EVU_CODIGO`);

--
-- Indexes for table `tb_finalizado`
--
ALTER TABLE `tb_finalizado`
  ADD PRIMARY KEY (`FIN_CODIGO`);

--
-- Indexes for table `tb_frases`
--
ALTER TABLE `tb_frases`
  ADD PRIMARY KEY (`FRA_CODIGO`);

--
-- Indexes for table `tb_grupos`
--
ALTER TABLE `tb_grupos`
  ADD PRIMARY KEY (`GRU_CODIGO`);

--
-- Indexes for table `tb_gru_dos_usuarios`
--
ALTER TABLE `tb_gru_dos_usuarios`
  ADD PRIMARY KEY (`GDU_GRU_CODIGO`,`GDU_USU_CODIGO`),
  ADD KEY `GDU_USU_CODIGO` (`GDU_USU_CODIGO`);

--
-- Indexes for table `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  ADD PRIMARY KEY (`MEN_CODIGO`);

--
-- Indexes for table `tb_men_dos_destinatarios`
--
ALTER TABLE `tb_men_dos_destinatarios`
  ADD PRIMARY KEY (`MDD_MEN_CODIGO`,`MDD_USU_CODIGO`);

--
-- Indexes for table `tb_men_dos_remetentes`
--
ALTER TABLE `tb_men_dos_remetentes`
  ADD PRIMARY KEY (`MDR_MEN_CODIGO`,`MDR_USU_CODIGO`);

--
-- Indexes for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD PRIMARY KEY (`POS_CODIGO`);

--
-- Indexes for table `tb_rotinaestudo`
--
ALTER TABLE `tb_rotinaestudo`
  ADD PRIMARY KEY (`ROT_CODIGO`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`USU_CODIGO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_atividades`
--
ALTER TABLE `tb_atividades`
  MODIFY `ATI_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `COM_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_conteudos`
--
ALTER TABLE `tb_conteudos`
  MODIFY `CON_CODIGO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_desempenhousuarios`
--
ALTER TABLE `tb_desempenhousuarios`
  MODIFY `DES_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_dias`
--
ALTER TABLE `tb_dias`
  MODIFY `DIA_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_eventosusuarios`
--
ALTER TABLE `tb_eventosusuarios`
  MODIFY `EVU_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_finalizado`
--
ALTER TABLE `tb_finalizado`
  MODIFY `FIN_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_frases`
--
ALTER TABLE `tb_frases`
  MODIFY `FRA_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_grupos`
--
ALTER TABLE `tb_grupos`
  MODIFY `GRU_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  MODIFY `MEN_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_postagens`
--
ALTER TABLE `tb_postagens`
  MODIFY `POS_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_rotinaestudo`
--
ALTER TABLE `tb_rotinaestudo`
  MODIFY `ROT_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `USU_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_gru_dos_usuarios`
--
ALTER TABLE `tb_gru_dos_usuarios`
  ADD CONSTRAINT `tb_gru_dos_usuarios_ibfk_1` FOREIGN KEY (`GDU_GRU_CODIGO`) REFERENCES `tb_grupos` (`GRU_CODIGO`),
  ADD CONSTRAINT `tb_gru_dos_usuarios_ibfk_2` FOREIGN KEY (`GDU_USU_CODIGO`) REFERENCES `tb_usuarios` (`USU_CODIGO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
