-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2023 às 17:30
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inbeautybd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `NomeFantasia` varchar(100) NOT NULL,
  `RazaoSocial` varchar(100) NOT NULL,
  `Cnpj` varchar(25) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `bairro` varchar(25) NOT NULL,
  `cep` varchar(25) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(25) NOT NULL,
  `fone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Senha` varchar(1000) NOT NULL,
  `idPrestador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `NomeFantasia`, `RazaoSocial`, `Cnpj`, `logradouro`, `numero`, `bairro`, `cep`, `cidade`, `uf`, `fone`, `email`, `status`, `Senha`, `idPrestador`) VALUES
(3, 'Studio Hair Beleza', 'Deborah Martins ME', '125.254.789/0001-87', 'Rua Visconte do Rio Branco', '459', 'Centro', '17.202-806', 'Jaú', 'SP', '(14)3622-8745', 'deboram@gmail.com', 'Ativo', '202cb962ac59075b964b07152d234b70', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_reserva`
--

CREATE TABLE `itens_reserva` (
  `iditens_reserva` int(11) NOT NULL,
  `preco` float NOT NULL,
  `situacao` varchar(25) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestador`
--

CREATE TABLE `prestador` (
  `idPrestador` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `DtNasc` date NOT NULL,
  `celular` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `prestador`
--

INSERT INTO `prestador` (`idPrestador`, `Nome`, `DtNasc`, `celular`, `Email`, `senha`, `Status`) VALUES
(1, 'Neto ', '1986-07-21', '(14)9856-8521', 'neto@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo'),
(2, 'Helen', '1976-05-17', '(14)9854-8796', 'helen@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo'),
(3, 'Gaby', '1988-01-25', '(14)9875-2154', 'gaby@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo'),
(4, 'Evelin', '1971-03-10', '(14)9857-8745', 'evelin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo'),
(5, 'Déborah', '1976-08-26', '(14)9854-8796', 'debora@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo'),
(6, 'Graziela Morales', '1976-07-14', '(14)99806-9335', 'grazimorales@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo'),
(7, 'Daniel de Oliveira', '1971-08-14', '(14)9865-7458', 'dani@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo'),
(8, 'Neto e Gaby Stufio Har', '1986-04-01', '(14)9999-9999', 'neto@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `DataReserva` date NOT NULL,
  `HoraReserva` time NOT NULL,
  `ValorServico` double NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `descritivo` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `tempoEstimado` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServico`, `descritivo`, `preco`, `tempoEstimado`) VALUES
(12, 'Corte feminino', 60, '01:00:00'),
(13, 'Manicure e pedicure', 60, '01:30:00'),
(14, 'Tintura completa', 120, '02:00:00'),
(15, 'Tintura retoque raiz', 80, '01:30:00'),
(16, 'Maquiagem ', 120, '01:00:00'),
(17, 'Manicure', 20, '01:00:00'),
(18, 'Escova modeladora', 50, '00:40:00'),
(19, 'Escova Progressiva', 150, '01:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicoprestadorservico`
--

CREATE TABLE `servicoprestadorservico` (
  `id` int(11) NOT NULL,
  `idPrestador` int(11) NOT NULL,
  `idServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicoprestadorservico`
--

INSERT INTO `servicoprestadorservico` (`id`, `idPrestador`, `idServico`) VALUES
(1, 4, 17),
(2, 1, 12),
(3, 5, 16),
(4, 3, 15),
(5, 2, 17),
(6, 7, 16),
(7, 5, 14),
(8, 3, 15),
(9, 2, 13),
(10, 4, 13),
(11, 6, 19),
(12, 3, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cpf` varchar(25) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Celular` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `Situacao` varchar(20) NOT NULL,
  `Apelido` varchar(50) NOT NULL,
  `Sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nome`, `Cpf`, `DataNascimento`, `Celular`, `Email`, `Senha`, `Situacao`, `Apelido`, `Sexo`) VALUES
(1, 'Graziela Morales', '26458064810', '1976-07-14', '(14)99806-9335', 'grazimorales@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Gra', 'feminino'),
(3, 'Luiz Felipe Mendes', '555.555.555-55', '1986-05-21', '(14)9878-5478', 'luizfm@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Luis Felipe', 'masculino'),
(4, 'Ana Clara Romão', '888.888.888-88', '2006-09-17', '(14)9874-6532', 'kaka@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Kaka', 'feminino'),
(5, 'Silvio Silva', '444.444.444-44', '1975-09-21', '(14)9874-4125', 'silvio@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Silvio', 'masculino'),
(6, 'Júlia Marostiga', '777.777.777-77', '1980-01-19', '(99)9999-9999', 'juliam@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Júlia', 'feminino'),
(7, 'João Paulo Lopes', '265.478.456-58', '1985-07-14', '(14)9999-9999', 'joaop@gmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'João', 'masculino'),
(8, 'Danielle Franco', '236.548.785-45', '1986-01-10', '(14)9865-8754', 'danielle@hotmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'Dani', 'feminino'),
(9, 'Pedro', '55555555', '1979-07-14', '5555555', 'pedro@hotmail.com', '202cb962ac59075b964b07152d234b70\r\n', 'Ativo', 'pedro', 'masculino'),
(10, 'Ana Lívia Franco', '555.555.555-55', '2003-04-19', '(14)9999-9999', 'anali@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Ana Lívia', 'feminino'),
(11, 'Tamires Fernandes', '584.698.784-89', '1987-04-21', '(14)9999-9999', 'tamires@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 'Tamires', 'feminino');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `idPrestador` (`idPrestador`);

--
-- Índices para tabela `itens_reserva`
--
ALTER TABLE `itens_reserva`
  ADD PRIMARY KEY (`iditens_reserva`),
  ADD KEY `idServico` (`idServico`),
  ADD KEY `idServico_2` (`idServico`);

--
-- Índices para tabela `prestador`
--
ALTER TABLE `prestador`
  ADD PRIMARY KEY (`idPrestador`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices para tabela `servicoprestadorservico`
--
ALTER TABLE `servicoprestadorservico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPrestador` (`idPrestador`),
  ADD KEY `idServico` (`idServico`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens_reserva`
--
ALTER TABLE `itens_reserva`
  MODIFY `iditens_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prestador`
--
ALTER TABLE `prestador`
  MODIFY `idPrestador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `servicoprestadorservico`
--
ALTER TABLE `servicoprestadorservico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`idPrestador`) REFERENCES `prestador` (`idPrestador`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `servicoprestadorservico`
--
ALTER TABLE `servicoprestadorservico`
  ADD CONSTRAINT `servicoprestadorservico_ibfk_1` FOREIGN KEY (`idPrestador`) REFERENCES `prestador` (`idPrestador`),
  ADD CONSTRAINT `servicoprestadorservico_ibfk_2` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
