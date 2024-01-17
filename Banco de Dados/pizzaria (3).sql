-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/01/2024 às 05:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bebida`
--

CREATE TABLE `bebida` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `bebida`
--

INSERT INTO `bebida` (`id`, `nome`, `preco`, `tipo`, `img`) VALUES
(5, 'Vinho Percola', 35.00, '1', '../upload_Img_Pizzas/Vinho.jpg'),
(6, 'Vinho Miolo', 30.00, '1', '../upload_Img_Pizzas/miolo.jpg'),
(7, 'Vinho Battistello', 45.99, '1', '../upload_Img_Pizzas/battistello.jpg'),
(8, 'Heineken Long Neck', 11.99, '1', '../upload_Img_Pizzas/hei.jpg'),
(9, 'Del Valle Uva', 12.00, '2', '../upload_Img_Pizzas/dllu.jpg'),
(10, 'Fanta Laranja', 12.00, '2', '../upload_Img_Pizzas/fanta.jpg'),
(11, 'Del Valle Laranja', 10.00, '2', '../upload_Img_Pizzas/fanta.jpg'),
(12, 'Pepsi 2L', 12.00, '2', '../upload_Img_Pizzas/pepsi 2L.jpg'),
(13, 'Budweiser', 8.80, '1', '../upload_Img_Pizzas/budweiser.png'),
(14, 'Guarana 2L', 12.50, '2', '../upload_Img_Pizzas/guarana.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `nome_produto` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `endereco`, `telefone`, `cpf`, `email`, `senha`) VALUES
(1, 'Del Valle Laranja', 'Av. PQP', '1191302041', '401.376.618-35', 'nicholas@gmail.com', 202),
(2, 'otavio', 'Av. PQP', '54665165', '123', 'otavio@gmail.com', 202),
(3, 'Mateus Oliveira Silva', 'Av. Nem te Conto', '(11) 1111-1234', '111.111.111-12', 'mateus.oliveira@gmail.com', 202),
(4, 'Eduardo Dos Santos', 'Av. Sla das quantas', '12 12345 1234', '111.111.111-01', 'edu@gmail.com', 202),
(5, 'Cássio Romero Guedes', 'Rua . Cortinas meu cortinas', '11 1111 2222', '111.111.111-11', 'crg@gmail.com', 202);

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `id_cliente`, `data_hora`) VALUES
(1, 'Achei foda.', 5, '2024-01-11 17:11:26'),
(2, 'Ok.', 2, '2024-01-11 17:12:35'),
(3, 'afdasdgadsgasdgadasfsdgasd', 1, '2024-01-11 17:43:33'),
(4, 'sadfdd', 1, '2024-01-17 01:36:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupom`
--

CREATE TABLE `cupom` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cupom`
--

INSERT INTO `cupom` (`id`, `nome`, `valor`) VALUES
(1, 'CUPOM15', 15),
(2, 'CUPOM20', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ervas_temperos`
--

CREATE TABLE `ervas_temperos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ervas_temperos`
--

INSERT INTO `ervas_temperos` (`id`, `nome`, `preco`, `img`) VALUES
(1, 'Peperoni', 3.50, '../upload_Img_Pizzas/peperoni.jpg'),
(2, 'Alecrim', 1.50, '../upload_Img_Pizzas/alecrin.jpg'),
(3, 'Oregano', 1.50, '../upload_Img_Pizzas/oregano.png'),
(4, 'Pimentão', 2.00, '../upload_Img_Pizzas/pimentao.jpg'),
(5, 'Alho', 1.50, '../upload_Img_Pizzas/alho.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `esfirra`
--

CREATE TABLE `esfirra` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `sabor` varchar(50) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `doce_salgada` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `esfirra`
--

INSERT INTO `esfirra` (`id`, `img`, `sabor`, `preco`, `doce_salgada`, `descricao`) VALUES
(14, '../upload_Img_Pizzas/esfiha carne.png', 'Esfiha Carne', 2.00, 1, 'Carne, Tomate e Verduras bem temperda.'),
(15, '../upload_Img_Pizzas/esfiha 2 queijos.jpg', 'Esfiha Dois Queijos', 4.00, 1, 'Catupiry e Mussarela'),
(16, '../upload_Img_Pizzas/esfiha queijo.jpg', 'Esfiha Queijo', 2.00, 1, 'Queijo Mussarela e Orégano'),
(17, '../upload_Img_Pizzas/esfiha 3 queijos.jpg', 'Esfiha Três Queijos', 4.00, 1, 'Catupiry, Mussarela e Provolone'),
(19, '../upload_Img_Pizzas/esfiha 4 queijos.jpg', 'Esfiha Quatro Queijos', 4.80, 1, 'Catupiry, Mussarela, Provolone e Parmesão'),
(20, '../upload_Img_Pizzas/esfiha americana.jpg', 'Esfiha Americana', 4.70, 1, 'Presunto, Mussarela, Bacon e Ovos'),
(21, '../upload_Img_Pizzas/esfiha baiana.jpg', 'Esfiha Baiana', 4.60, 1, 'Calabresa moída, Cebola, Ovos e Pimenta'),
(22, '../upload_Img_Pizzas/esfiha bauru.jpg', 'Esfiha Bauru', 4.60, 1, 'Presunto picado, Tomate Fatiado e Mussarela'),
(23, '../upload_Img_Pizzas/esfiha calabresa.jpg', 'Esfiha Calabresa', 2.25, 1, 'Calabresa Moída'),
(26, '../upload_Img_Pizzas/esfiha calabresa2.jpg', 'Esfiha Calabresa com Catupiry', 4.00, 1, 'Calabresa moída e Catupiry'),
(27, '../upload_Img_Pizzas/esfiha calabresa3.jpg', 'Esfiha Calabresa com Mussarela', 4.00, 1, 'Calabresa moída e Queijo mussarela'),
(28, '../upload_Img_Pizzas/esfiha carne2.jpg', 'Esfiha carne com Mussarela', 4.00, 1, 'Carne bovina moída e Queijo Mussarela'),
(29, '../upload_Img_Pizzas/esfiha carneseca.jpg', 'Esfiha Carne seca com Mussarela ', 5.50, 1, 'Carne Seca desfiada, Queijo Mussarela e Cebola'),
(30, '../upload_Img_Pizzas/Esfiha escarola.jpg', 'Esfiha Escarola', 4.50, 1, 'Escarola refogada com Alho e Queijo Mussarela'),
(31, '../upload_Img_Pizzas/esfiha frango.jpg', 'Esfiha Frango com Catupiry', 4.20, 1, 'Frango Desfiado e Catupiry'),
(32, '../upload_Img_Pizzas/Esfiha milho.jpg', 'Esfiha Mussarela com Milho', 4.00, 1, 'Queijo Mussarela e Milho'),
(33, '../upload_Img_Pizzas/esfiha palmito.jpg', 'Esfiha Palmito', 4.00, 1, 'Queijo Mussarela e Palmito Fatiado'),
(34, '../upload_Img_Pizzas/esfiha palmito2.jpg', 'Esfiha Palmito com Catupiry', 4.40, 1, 'Catupiry e Palmito Fatiado'),
(35, '../upload_Img_Pizzas/esfiha peperoni.jpg', 'Esfiha Pepperoni', 4.20, 1, 'Queijo Mussarela e Pepperoni'),
(36, '../upload_Img_Pizzas/esfiha portuguesa.jpg', 'Esfiha Portuguesa', 4.50, 1, 'Presunto picado, Mussarela, Ovos e Cebola'),
(37, '../upload_Img_Pizzas/esfiha banana.jpg', 'Esfiha Banana', 5.00, 2, 'Banana, Leite condensado e Canela'),
(38, '../upload_Img_Pizzas/esfiha banana2.jpg', 'Esfiha banana com Chocolate ao Leite', 5.50, 2, 'Chocolate ao leite e Banana Fatiada'),
(39, '../upload_Img_Pizzas/esfiha brigadeiro.jpg', 'Esfiha Brigadeiro', 4.50, 2, 'Chocolate ao leite e Granulado sabor Chocolate'),
(40, '../upload_Img_Pizzas/esifha chocolate.jpg', 'Esfiha Chocolate', 4.00, 2, 'Chocolate ao Leite'),
(41, '../upload_Img_Pizzas/esfiha ovomaltine.jpg', 'Esfiha Ovomaltine', 6.00, 2, 'Chocolate ao leite e Flocos de Ovomaltine®'),
(42, '../upload_Img_Pizzas/esfiha mm.jpg', 'Esfiha Confetti', 6.00, 2, 'Chocolate ao leite e Confeito de Chocolate colorido'),
(43, '../upload_Img_Pizzas/esfiha churros.jpg', 'Esfiha Churros', 5.00, 2, 'Doce de leite Cremoso e Canela em pó');

-- --------------------------------------------------------

--
-- Estrutura para tabela `molhos`
--

CREATE TABLE `molhos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `molhos`
--

INSERT INTO `molhos` (`id`, `nome`, `preco`, `img`) VALUES
(1, 'Molho de Tomate', 4.00, '../upload_Img_Pizzas/moloho de tomate.jpg'),
(2, 'Molho de Tomate com Manjericão', 4.50, '../upload_Img_Pizzas/manjericao.jpg'),
(3, 'Molho Pesto', 7.00, '../upload_Img_Pizzas/pesto.jpg'),
(4, 'Molho Branco', 5.50, '../upload_Img_Pizzas/molhobranco.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `itens_pedidos` varchar(1000) NOT NULL,
  `nome_cupom` varchar(50) NOT NULL,
  `valor_total` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id`, `id_cliente`, `itens_pedidos`, `nome_cupom`, `valor_total`) VALUES
(3, 1, 'Frango, Carne, Carne', '', 155.47),
(4, 1, 'Frango, Carne, Carne', '', 155.47),
(5, 1, 'Frango', '', 132.97),
(6, 1, 'Frango', '', 91.98),
(7, 1, 'Javali', '', 222.97),
(8, 1, 'Frango', '', 132.97),
(9, 1, 'Javali', '', 80.99),
(10, 1, 'Javali', '', 151.98),
(11, 1, 'Frango', '', 132.97),
(12, 1, 'Frango', '', 132.97),
(13, 1, 'Frango', '', 132.97),
(14, 1, 'Javali', '', 222.97),
(15, 1, 'Frango', '', 132.97),
(16, 1, 'Frango', '', 132.97),
(17, 1, 'Javali', '', 151.98),
(18, 1, 'Carne', '', 19.00),
(19, 1, 'Guarana 2L', '', 47.50),
(20, 1, 'Guarana 2L, Javali, Javali, Carne', '', 410.45),
(23, 2, '', '', 0.00),
(24, 2, '', '', 0.00),
(25, 2, '', '', 0.00),
(26, 2, '', '', 0.00),
(27, 2, '', '', 0.00),
(28, 2, '', '', 0.00),
(29, 2, '', '', 0.00),
(30, 2, '', '', 0.00),
(31, 1, '', '', 0.00),
(32, 1, '', '', 0.00),
(33, 1, '', '', 0.00),
(34, 1, '', '', 0.00),
(35, 2, '', '', 0.00),
(36, 2, '', '', 0.00),
(37, 2, '', '', 0.00),
(38, 1, 'Item -  Javali  :  quantidade -  5', '', 364.95),
(39, 1, 'Item -  Javali  :  quantidade -  3', '', 222.97),
(40, 2, 'Item -  Margherita  :  quantidade -  3', '', 145.00),
(41, 2, 'Item -  Frango  :  quantidade -  3 Item -  Fanta Laranja  :  quantidade -  2', '', 156.97),
(42, 3, '', '', 10.00),
(43, 3, '', '', 10.00),
(44, 3, 'Javali 3  |  Esfiha Calabresa com Catupiry 4  | ', '', 238.97),
(45, 3, 'Javali 3  | ', '', 222.97),
(46, 3, 'Javali 3  | ', '', 222.97),
(47, 3, 'Javali 3  |  Esfiha Dois Queijos 8  | ', '', 254.97),
(48, 3, 'Esfiha Dois Queijos 8  |  Esfiha Quatro Queijos 2  |  Guarana 2L 1  |  Javali 1  | ', '', 135.09),
(49, 3, 'Frango 3  | ', '', 132.97),
(50, 3, 'Esfiha Dois Queijos 3  |  Javali 3  | ', '', 189.98),
(51, 3, 'Javali 3  | ', '', 180.38),
(52, 3, 'Esfiha Carne 6  | ', '', 22.00),
(53, 3, 'Esfiha Queijo 15  |  Javali 3  |  Fanta Laranja 4  |  Javali 3  | ', '', 513.94),
(54, 3, 'Esfiha Dois Queijos 4  |  Javali 3  | ', '', 238.97),
(55, 3, 'Javali 3  | ', '', 222.97),
(56, 3, 'Javali 3  | ', '', 222.97),
(57, 3, 'Javali 3  |  Javali 3  | ', '', 435.94),
(58, 3, 'Javali 3  |  Javali 3  |  Javali 3  | ', '', 0.00),
(59, 4, 'Javali 3  |  Portuguesa 3  |  Vinho Percola 3  |  Vinho Battistello 6  | ', '', 561.93),
(60, 1, 'Portuguesa 1  |  Guarana 2L 1  |  Esfiha Calabresa com Catupiry 2  |  Esfiha Carne 10  | ', '', 78.00),
(61, 1, 'Frango 1  |  Vinho Percola 10  | ', '', 310.39),
(62, 1, 'Javali 1  | ', '', 65.49),
(63, 1, 'Javali 1  | ', '', 65.49),
(64, 1, 'Javali 5  | ', '', 231.96),
(65, 1, 'Javali 1  | ', 'CUPOM20', 54.39),
(66, 1, 'Guarana 2L 1  | ', 'CUPOM20', 20.50),
(67, 1, 'Javali 1  | ', 'CUPOM15', 57.17),
(68, 1, 'Parma 5  | ', 'CUPOM15', 285.00),
(69, 1, 'Javali 1  | ', 'CUPOM15', 65.49),
(70, 1, 'Javali 1  | ', 'CUPOM15', 65.49),
(71, 1, 'Javali 1  |  Esfiha Dois Queijos 1  | ', 'CUPOM15', 69.49),
(72, 1, 'Javali 1  |  Esfiha Dois Queijos 1  | ', 'CUPOM15', 69.49),
(73, 1, 'Javali 1  |  Esfiha Dois Queijos 1  |  Esfiha Calabresa com Catupiry 1  | ', 'CUPOM15', 72.24),
(74, 1, 'Javali 1  |  Esfiha Dois Queijos 1  |  Esfiha Calabresa com Catupiry 1  | ', 'CUPOM15', 72.24),
(75, 1, 'Javali 1  |  Esfiha Dois Queijos 1  |  Esfiha Calabresa com Catupiry 1  | ', 'CUPOM15', 72.24),
(76, 1, 'Javali 3  | ', 'CUPOM15', 176.47),
(77, 1, 'Esfiha Calabresa com Catupiry 4  | ', '', 21.00),
(78, 1, 'Esfiha Três Queijos 5  | ', 'Nenhum Cupom Usado', 23.75),
(79, 1, 'Esfiha Calabresa com Catupiry 1  | ', '', 12.75),
(80, 1, 'Esfiha Calabresa com Catupiry 4  | ', 'Nenhum Cupom Usado', 21.00),
(81, 1, 'Esfiha Três Queijos 5  | ', 'Nenhum Cupom Usado', 21.00),
(82, 1, 'Javali 2  | ', 'Nenhum Cupom Usado', 120.98),
(83, 1, 'Javali 1  | ', 'Nenhum Cupom Usado', 54.39),
(84, 1, 'Javali 1  | ', 'Nenhum Cupom Usado', 54.39),
(85, 1, 'Javali 5  | ', 'Nenhum Cupom Usado', 287.45),
(86, 1, 'Javali 5  | ', 'CUPOM20', 231.96),
(87, 1, 'Javali 1  | ', 'Nenhum Cupom Usado', 65.49),
(88, 1, 'Guarana 2L 1  | ', 'Nenhum Cupom Usado', 20.50),
(89, 1, 'Javali 1  | ', 'Nenhum Cupom Usado', 65.49),
(90, 1, 'Javali 1  | ', 'Nenhum Cupom Usado', 57.17),
(91, 2, 'Javali 3  |  Esfiha Calabresa com Catupiry 5  | ', 'Nenhum Cupom Usado', 154.18),
(92, 2, 'Javali 1  | ', 'Nenhum Cupom Usado', 57.17),
(93, 2, 'Javali 1  | ', 'Nenhum Cupom Usado', 65.49),
(94, 2, 'Javali 1  | ', 'CUPOM20', 54.39),
(95, 2, 'Frango 1  | ', 'CUPOM15', 31.67),
(96, 2, 'Javali 1  | ', 'CUPOM15', 65.49),
(97, 5, 'Javali 3  |  Esfiha Calabresa com Catupiry 3  | ', 'CUPOM20', 149.78),
(98, 5, 'Esfiha Escarola 1  | ', 'CUPOM20', 10.00),
(99, 5, 'Esfiha Escarola 1  | ', 'CUPOM20', 10.00),
(100, 1, 'Javali 5  | ', 'CUPOM20', 231.96);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `sabor` varchar(50) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pizza`
--

INSERT INTO `pizza` (`id`, `imagem`, `sabor`, `valor`, `descricao`) VALUES
(10, '../upload_Img_Pizzas/frango.png', 'Frango', 40.99, 'Frango, Molho e Catupiry'),
(11, '../upload_Img_Pizzas/parma.png', 'Parma', 55.00, 'Presunto Parma'),
(12, '../upload_Img_Pizzas/portuguesa.png', 'Portuguesa', 32.00, 'Presunto, ovo, queijo e cebola'),
(13, '../upload_Img_Pizzas/margherita.png', 'Margherita', 45.00, 'mussarela, queijo e rodela de tomate'),
(14, '../upload_Img_Pizzas/calabresa.png', 'Calabresa', 32.99, 'Calabresa, Molho e Cebola'),
(15, '../upload_Img_Pizzas/javali.png', 'Javali', 70.99, 'Javali e Queijo'),
(16, '../upload_Img_Pizzas/torinese.png', 'Torinese', 59.99, 'Torinese e Cebola');

-- --------------------------------------------------------

--
-- Estrutura para tabela `promocao_bebida`
--

CREATE TABLE `promocao_bebida` (
  `id` int(11) NOT NULL,
  `id_bebida` int(11) NOT NULL,
  `valor_promo` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `promocao_bebida`
--

INSERT INTO `promocao_bebida` (`id`, `id_bebida`, `valor_promo`) VALUES
(3, 10, 5.00),
(4, 14, 2.00),
(6, 13, 2.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `promocao_esfiha`
--

CREATE TABLE `promocao_esfiha` (
  `id` int(11) NOT NULL,
  `id_esfiha` int(11) NOT NULL,
  `valor_promo` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `promocao_esfiha`
--

INSERT INTO `promocao_esfiha` (`id`, `id_esfiha`, `valor_promo`) VALUES
(3, 17, 1.50),
(5, 26, 2.70),
(11, 30, 1.25);

-- --------------------------------------------------------

--
-- Estrutura para tabela `promocao_pizza`
--

CREATE TABLE `promocao_pizza` (
  `id` int(11) NOT NULL,
  `id_pizza` int(11) NOT NULL,
  `valor_promo` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `promocao_pizza`
--

INSERT INTO `promocao_pizza` (`id`, `id_pizza`, `valor_promo`) VALUES
(10, 10, 10.00),
(15, 15, 15.50);

-- --------------------------------------------------------

--
-- Estrutura para tabela `proteinas`
--

CREATE TABLE `proteinas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `proteinas`
--

INSERT INTO `proteinas` (`id`, `nome`, `preco`, `img`) VALUES
(1, 'Linguiça', 6.00, '../upload_Img_Pizzas/linguica.jpg'),
(2, 'Bacon', 3.00, '../upload_Img_Pizzas/bacon.jpg'),
(3, 'Carne moida', 6.50, '../upload_Img_Pizzas/carne moida.webp'),
(4, 'Presunto', 2.50, '../upload_Img_Pizzas/presunto.png'),
(5, 'Frango', 4.00, '../upload_Img_Pizzas/frangodesfiado.jpg'),
(6, 'Camarão', 7.00, '../upload_Img_Pizzas/camarao.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `queijos`
--

CREATE TABLE `queijos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `queijos`
--

INSERT INTO `queijos` (`id`, `nome`, `preco`, `img`) VALUES
(2, 'Mussarela', 3.50, '../upload_Img_Pizzas/mussarela.jpg'),
(3, 'Cheddar', 4.00, '../upload_Img_Pizzas/cheddar.jpg'),
(4, 'Provolone', 5.50, '../upload_Img_Pizzas/provolone.jpg'),
(6, 'Parmesão', 6.00, '../upload_Img_Pizzas/parmesao.jpg'),
(7, 'Gorgonzola', 6.70, '../upload_Img_Pizzas/gorgonzola.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vegetais`
--

CREATE TABLE `vegetais` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vegetais`
--

INSERT INTO `vegetais` (`id`, `nome`, `preco`, `img`) VALUES
(1, 'Azeitona', 1.00, '../upload_Img_Pizzas/azeitona.jpg'),
(2, 'Champignon', 3.00, '../upload_Img_Pizzas/champignon.jpg'),
(3, 'Tomate', 3.00, '../upload_Img_Pizzas/tomate.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ervas_temperos`
--
ALTER TABLE `ervas_temperos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `esfirra`
--
ALTER TABLE `esfirra`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `molhos`
--
ALTER TABLE `molhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `promocao_bebida`
--
ALTER TABLE `promocao_bebida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bebida` (`id_bebida`);

--
-- Índices de tabela `promocao_esfiha`
--
ALTER TABLE `promocao_esfiha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tabela_promocao_esfiha_esfiha` (`id_esfiha`);

--
-- Índices de tabela `promocao_pizza`
--
ALTER TABLE `promocao_pizza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pizza` (`id_pizza`);

--
-- Índices de tabela `proteinas`
--
ALTER TABLE `proteinas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `queijos`
--
ALTER TABLE `queijos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vegetais`
--
ALTER TABLE `vegetais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ervas_temperos`
--
ALTER TABLE `ervas_temperos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `esfirra`
--
ALTER TABLE `esfirra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `molhos`
--
ALTER TABLE `molhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `promocao_bebida`
--
ALTER TABLE `promocao_bebida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `promocao_esfiha`
--
ALTER TABLE `promocao_esfiha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `promocao_pizza`
--
ALTER TABLE `promocao_pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `proteinas`
--
ALTER TABLE `proteinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `queijos`
--
ALTER TABLE `queijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `vegetais`
--
ALTER TABLE `vegetais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Restrições para tabelas `promocao_bebida`
--
ALTER TABLE `promocao_bebida`
  ADD CONSTRAINT `promocao_bebida_ibfk_1` FOREIGN KEY (`id_bebida`) REFERENCES `bebida` (`id`);

--
-- Restrições para tabelas `promocao_esfiha`
--
ALTER TABLE `promocao_esfiha`
  ADD CONSTRAINT `fk_tabela_promocao_esfiha_esfiha` FOREIGN KEY (`id_esfiha`) REFERENCES `esfirra` (`id`);

--
-- Restrições para tabelas `promocao_pizza`
--
ALTER TABLE `promocao_pizza`
  ADD CONSTRAINT `promocao_pizza_ibfk_1` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
