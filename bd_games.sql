SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de Dados: `bd_games`
--

-- CREATE DATABASE `bd_games`;

CREATE TABLE `usuarios` (
  `usuario` varchar(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`usuario`, `nome`, `senha`, `tipo`) VALUES
('admin', 'Érik DM Costa', '$2y$10$zCe/8vq/WsGdwWsJ1xD6kOnfKtRZ.ZzwBmNNbQMk.9TmMAXQhjFkm', 'admin'),
('pedro', 'Pedro Paulo', '$2y$10$gu5rRp0IWb5ma5PdJ6YtR.yn.GK0eH/P.Th1kXgi/D8mshrZdZ/se', 'editor'),
('teste', 'João da Silva', '$2y$10$6fKOuhIIAoL/jZ/DcpcmEuXS5dIQIZhdCpxeDOJj21EYVZePKt.u.', 'editor');

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
