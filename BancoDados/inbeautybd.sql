-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2023 às 21:13
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
  `idPrestador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_reserva`
--

CREATE TABLE `itens_reserva` (
  `iditens_reserva` int(11) NOT NULL,
  `preco` float NOT NULL,
  `situacao` varchar(25) NOT NULL,
  `idServicoPrestador` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `DataReserva` date NOT NULL,
  `HoraReserva` time NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idItemReserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `descritivo` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `tempoEstimado` float NOT NULL,
  `Profissional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServico`, `descritivo`, `preco`, `tempoEstimado`, `Profissional`) VALUES
(1, 'manicure', 20, 60, 'Helen'),
(2, 'Manicure', 20, 60, 'Evelin Moreira'),
(3, 'Escova', 50, 60, 'Débora Martins'),
(4, 'pedicure', 25, 60, 'Evelin Moreira'),
(5, 'pé & mão', 50, 60, 'Evelin Moreira'),
(6, 'Mechas', 200, 60, 'Gaby'),
(7, 'Corte feminino', 50, 60, 'Neto'),
(8, 'Tintura completa', 100, 60, 'Neto'),
(9, 'Tintura retoque raiz', 60, 60, 'Neto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicoprestador`
--

CREATE TABLE `servicoprestador` (
  `idServicoPrestador` int(11) NOT NULL,
  `idServico` int(11) NOT NULL,
  `idPrestador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `idServico` (`idServicoPrestador`);

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
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idItemReserva` (`idItemReserva`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices para tabela `servicoprestador`
--
ALTER TABLE `servicoprestador`
  ADD PRIMARY KEY (`idServicoPrestador`),
  ADD KEY `idServico` (`idServico`),
  ADD KEY `idPrestador` (`idPrestador`);

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
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itens_reserva`
--
ALTER TABLE `itens_reserva`
  MODIFY `iditens_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prestador`
--
ALTER TABLE `prestador`
  MODIFY `idPrestador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `servicoprestador`
--
ALTER TABLE `servicoprestador`
  MODIFY `idServicoPrestador` int(11) NOT NULL AUTO_INCREMENT;

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
-- Limitadores para a tabela `itens_reserva`
--
ALTER TABLE `itens_reserva`
  ADD CONSTRAINT `itens_reserva_ibfk_1` FOREIGN KEY (`idServicoPrestador`) REFERENCES `servicoprestador` (`idServicoPrestador`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idItemReserva`) REFERENCES `itens_reserva` (`iditens_reserva`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `servicoprestador`
--
ALTER TABLE `servicoprestador`
  ADD CONSTRAINT `servicoprestador_ibfk_1` FOREIGN KEY (`idPrestador`) REFERENCES `prestador` (`idPrestador`),
  ADD CONSTRAINT `servicoprestador_ibfk_2` FOREIGN KEY (`idServico`) REFERENCES `servico` (`idServico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
