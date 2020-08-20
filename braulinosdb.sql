-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/08/2020 às 21:03
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `braulinosdb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `procedimento` int(11) DEFAULT NULL,
  `horario` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id`, `idusuario`, `procedimento`, `horario`, `status`, `data`) VALUES
(102, 1012, 1, '08:00', 1, '2020-08-15'),
(104, 1014, 7, '12:00', 1, '2020-09-01'),
(105, 1015, 10, '14:00', 1, '2020-09-02'),
(106, 1016, 3, '14:00', 1, '2020-08-15'),
(107, 1017, 5, '14:00', 1, '2020-09-02'),
(108, 1018, 14, '15:00', 1, '2020-08-28'),
(126, 1011, 6, '12:00', 1, '2020-09-02'),
(127, 1011, 1, '13:00', 1, '2020-08-17'),
(128, 1011, 8, '12:00', 1, '2020-08-17'),
(129, 1011, 5, '14:00', 1, '2020-08-17'),
(130, 1011, 3, '16:00', 1, '2020-08-18'),
(131, 1011, 11, '15:00', 1, '2020-08-19'),
(132, 1011, 11, '15:00', 1, '2020-08-19'),
(133, 1010, 8, '08:00', 1, '2020-11-06'),
(135, 1010, 10, '14:00', 1, '2020-11-06'),
(136, 1019, 8, '13:00', 1, '2020-09-04'),
(137, 1020, 11, '14:00', 1, '2020-09-24'),
(138, 1021, 10, '15:00', 1, '2020-09-11'),
(139, 1022, 3, '11:00', 1, '2020-08-16'),
(140, 1023, 14, '13:00', 1, '2020-08-16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `horario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `horario`
--

INSERT INTO `horario` (`id`, `horario`) VALUES
(1, '08:00'),
(2, '09:00'),
(3, '10:00'),
(4, '11:00'),
(5, '12:00'),
(6, '13:00'),
(7, '14:00'),
(8, '15:00'),
(9, '16:00'),
(10, '17:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `procedimento`
--

INSERT INTO `procedimento` (`id`, `nome`) VALUES
(1, 'Corte de cabelo'),
(2, 'Pintura de cabelo'),
(3, 'Massagem'),
(4, 'Denagem linfática'),
(5, 'Manicure'),
(6, 'Hidratação de cabelo'),
(7, 'Penteado profissional'),
(8, 'Depilacão'),
(9, 'Progressiva'),
(10, 'Mechas'),
(11, 'Alongamento de cílios'),
(12, 'Banho de lua'),
(13, 'Botox capilar'),
(14, 'Cauterização');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nomecompleto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nomecompleto`, `cep`, `rua`, `numero`, `cidade`, `estado`, `email`, `senha`, `cpf`, `tipo`, `celular`) VALUES
(1010, 'USUáRIO', NULL, NULL, NULL, NULL, NULL, 'USUARIO@USUARIO.COM', 'DFA7A2273567DCD1EFFFB9A46308E91C20FA13C44C3441BC69CD6A7869B3F7FD', '11111111111', 0, '11111111111'),
(1011, 'ADMIN', NULL, NULL, NULL, NULL, NULL, 'ADMIN@ADMIN.COM', '240BE518FABD2724DDB6F04EEB1DA5967448D7E831C08C8FA822809F74C720A9', '00000000000', 1, '00000000000'),
(1012, 'MARINA SOPHIE BAPTISTA', NULL, NULL, NULL, NULL, NULL, 'MARINASOPHIEBAPTISTA-75@HOTMAI.COM.BR', '5ED19A38DF2E7DC6A24C55CEC6051D7CB4B70B09196FE4B98A767038FB010580', '00930789865', 0, '6827065082'),
(1013, 'STELLA MARLI DéBORA SILVEIRA', NULL, NULL, NULL, NULL, NULL, 'STELLAMARLIDEBORASILVEIRA@VLCORPORATE.COM', 'CCA82FEA15FED0C69E5EA2B241DE5F6A049EB6A1B5BDA4C894DDE8C58FF6C28A', '04098593890', 0, '17997567073'),
(1014, 'BIANCA JOSEFA JéSSICA FARIAS', NULL, NULL, NULL, NULL, NULL, 'BBIANCAJOSEFAJESSICAFARIAS@SOCIEDADEWEB.COM.BR', '82BF0F6E707BB501280EB0299F5332A14FC7DB4F97E6E4A440F6F9AE247DC60C', '69084786882', 0, '13995630416'),
(1015, 'JOAQUIM JOãO ARAGãO', NULL, NULL, NULL, NULL, NULL, 'JOAQUIMJOAOARAGAO@ANDRITZ.COM', 'F646C795292404B2F70A9CFEB6E2F4F02F82B9CA52B374E33AC3730CE1484DE7', '59677101838', 0, '14989623158'),
(1016, 'BETINA CAROLINE COSTA', NULL, NULL, NULL, NULL, NULL, 'BETINACAROLINECOSTA__BETINACAROLINECOSTA@ELCONSULTORIA.COM.BR', '804E480BF121339703B78B4D78BCA04F22E99714CD1594E6FBF6EBC163EE0C09', '72392242879', 0, '19988512176'),
(1017, 'MALU LORENA ANTôNIA NOVAES', NULL, NULL, NULL, NULL, NULL, 'MALULORENAANTONIANOVAES__MALULORENAANTONIANOVAES@ARBITRAL.COM', '3C31B762B8A6C6D1E9517A7D187CF68752A04E7A0C172E7759986C73F24484DC', '25665979872', 0, '11987583421'),
(1018, 'SIMONE ALANA EVELYN VIANA', NULL, NULL, NULL, NULL, NULL, 'SIMONEALANAEVELYNVIANA-94@APSO.ORG.BR', '816D1B6D54233475A335B9A590C4598E38CF5F811A7DE1B1A2FFBFE783019538', '01433177846', 0, '19999307798'),
(1019, 'MIRELLA FABIANA ISIS SILVA', NULL, NULL, NULL, NULL, NULL, 'MIRELLAFABIANAISISSILVA-74@ELETROTEX.COM.BR', '84744DAF7EB24C4CEC252727A535A56E79E74497C85F40A30F3C0B6671EDFA8F', '95790685773', 0, '27985983491'),
(1020, 'ISABELLY FERNANDA NATáLIA CORTE REAL', NULL, NULL, NULL, NULL, NULL, 'SABELLYFERNANDANATALIACORTEREAL@REDEX.COM.BR', '11CDB9CCC374E53C654C66115ACE001AF865AD50AE0A7C2980E984C1ACF33FA1', '37405670741', 0, '45986619156'),
(1021, 'VICENTE MARTIN RIBEIRO', NULL, NULL, NULL, NULL, NULL, 'VICENTEMARTINRIBEIRO@HOATMAIL.COM', 'FAD3CFF60A6DA540F785869DD0F1D9D9FBB8603E0E1AD7C46EC09EE15763EA23', '98463388990', 0, '92986966343'),
(1022, 'JENNIFER PATRíCIA ARAúJO', NULL, NULL, NULL, NULL, NULL, 'JENNIFERPATRICIAARAUJO_@PARKER.COM', '1711C3CCCD792C973F873545FCCD179C4593C20C211E0663B31194BCFFA75E32', '08498242738', 0, '49995499697'),
(1023, 'JENNIFER PATRíCIA ARAúJO', NULL, NULL, NULL, NULL, NULL, 'YASMINOLIVIAFERNANDES@POLI.UFRJ.BR', '1711C3CCCD792C973F873545FCCD179C4593C20C211E0663B31194BCFFA75E32', '08498242738', 0, '49995499697');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_agendamentousuario` (`idusuario`),
  ADD KEY `FK_agendamentoprocedimento` (`procedimento`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `FK_agendamentoprocedimento` FOREIGN KEY (`procedimento`) REFERENCES `procedimento` (`id`),
  ADD CONSTRAINT `FK_agendamentousuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
