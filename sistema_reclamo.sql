-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-08-2020 a las 08:38:11
-- Versión del servidor: 10.0.38-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_reclamo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idnotificaciones` int(11) NOT NULL,
  `ndetalle` varchar(200) DEFAULT NULL,
  `ntipo` int(11) NOT NULL,
  `nusuario_idusuario` int(11) NOT NULL,
  `reclamo_idreclamo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`idnotificaciones`, `ndetalle`, `ntipo`, `nusuario_idusuario`, `reclamo_idreclamo`) VALUES
(3137, 'SE MODIFICO EL PEDIDO', 2, 3, 973),
(3138, 'SE MODIFICO EL PEDIDO', 2, 3, 973),
(3139, 'SE GENERO EL PEDIDO', 1, 3, 1033),
(3140, 'SE GENERO EL PEDIDO', 1, 3, 1034),
(3141, 'SE MODIFICO EL PEDIDO', 2, 3, 1034);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamo`
--

CREATE TABLE `reclamo` (
  `idreclamo` int(11) NOT NULL,
  `rconsorcio` varchar(45) DEFAULT NULL,
  `ruf` varchar(45) DEFAULT NULL,
  `rpiso` varchar(45) DEFAULT NULL,
  `rdepto` varchar(45) DEFAULT NULL,
  `rtitular` varchar(45) DEFAULT NULL,
  `rtelefono` varchar(45) DEFAULT NULL,
  `remail` varchar(45) DEFAULT NULL,
  `rllave` varchar(45) DEFAULT NULL,
  `rreclamo` varchar(1000) DEFAULT NULL,
  `rfecha` date DEFAULT NULL,
  `rproveedor` varchar(145) DEFAULT NULL,
  `rfactura` varchar(145) DEFAULT NULL,
  `rfechapago` date DEFAULT NULL,
  `rcheque` varchar(145) DEFAULT NULL,
  `robservaciones` varchar(1000) DEFAULT NULL,
  `rreclamo_estado` int(11) DEFAULT NULL,
  `restado` int(11) DEFAULT NULL,
  `rfechaalta` datetime DEFAULT NULL,
  `rfechabaja` datetime DEFAULT NULL,
  `rfechamod` datetime DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reclamo`
--

INSERT INTO `reclamo` (`idreclamo`, `rconsorcio`, `ruf`, `rpiso`, `rdepto`, `rtitular`, `rtelefono`, `remail`, `rllave`, `rreclamo`, `rfecha`, `rproveedor`, `rfactura`, `rfechapago`, `rcheque`, `robservaciones`, `rreclamo_estado`, `restado`, `rfechaalta`, `rfechabaja`, `rfechamod`, `usuario_idusuario`) VALUES
(26, 'COSTAMAR', '37', '3', '37', 'Alejandro MÃ©ndez', '011-15-62428640', 'alejandromendezmep@yahoo.com.ar', '137', 'Reemplazar el durlock que se estropeÃ³ con la filtraciÃ³n que hubo en el placard y que fue solucionada. ', '2019-01-28', 'Delfin MagallÃ¡n', '', '0000-00-00', '', 'Se puede hacer despuÃ©s del 20/03/2019 porque hasta esa fecha hay gente en el departamento.', 3, 1, '2019-01-28 18:36:53', NULL, '2019-06-21 16:11:34', 3),
(27, 'El LEÃ“N ', '16', '1', '8', 'SCOLA DIANA', '011-15-57942208', 'noeliamazzitelli.94@hotmail.com', '', 'La Propietaria manifiesta que segun lo conversado en la Asamblea ella pide que se le coloque una reja de Hierro como tienen el resto de los dptos en el comedor ya que es mas seguro y comparte medianera con las casa de al lado. ', '2019-01-28', '', '', '0000-00-00', '', 'Este trabajo se hace una vez que haya finalizado la temporada de verano. 13/06/2019 Este trabajo es particular o lo debe reclamar al vendedor', 3, 1, '2019-01-28 19:39:48', NULL, '2019-06-13 18:10:37', 3),
(28, 'COSTAMAR', '5', 'PB', '5', 'Di Marco Elisa', '011-15-50107175', 'elisadimarco_1@hotmail.com', 'No hay', 'Hay filtraciÃ³n desde el departamento 6. En Ã©ste momento, hay inquilinos. 07/02 Me dice el contratista que puede ser la conexiÃ³n para bomberos o que se haya rajado el depÃ³sito del inodoro.', '2019-01-29', 'Ezequiel Cristianzen', '', '0000-00-00', '', 'Este trabajo se puede realizar a partir del mes de Marzo y es necesario que tanto el departamento 5 como el departamento 6, dejen llaves para poder trabajar. Se envÃ­a email a los 2 propietarios informando Ã©sta situaciÃ³n.', 3, 1, '2019-01-29 17:04:48', NULL, '2019-09-10 10:55:31', 3),
(29, 'AVENIDA II', '13', '1', '13', 'Espino Cristhian', '011-1540913374', 'trolli.e@live.com', '214', 'No le funciona el timbre.', '2019-01-29', '', '', '0000-00-00', '', '', 0, 0, '2019-01-29 17:23:23', '2019-05-20 15:55:55', NULL, 3),
(30, 'BC MAR I', '29', '2', 'B', 'MÃ³naco Silvana', '011-45026331 / 011-1544751687', 'monaco_silvana@arnet.com.ar', '32', 'Colocar la red de balcÃ³n como corresponde, la cual fue sacada para pintar los mismos.', '2019-01-29', 'Alberto Lezcano', '', '0000-00-00', '', '', 3, 1, '2019-01-29 17:30:24', NULL, '2019-05-30 19:16:51', 3),
(32, 'BC MAR I', '', '', '', '', '', '', '', 'Reparar las maderas de los balcones que se encuentren podridas. Cambiar las que no se pueden arreglar. Una vez hecho, hay que pintarlas a todas.', '2020-01-18', 'Ruben Barrientos', '', '0000-00-00', '', '05/12 Se posterga para el prÃ³ximo aÃ±o, por falta de dinero. Se hicieron algunos departamentos, los demÃ¡s quedan para el aÃ±o prÃ³ximo.', 0, 1, '2019-01-29 18:04:28', NULL, '2020-01-30 12:29:44', 3),
(33, 'BC MAR I', '', '', '', '', '', '', '', 'Conectar el DVR a internet, para que se pueda ver desde cualquier lugar. ', '2020-01-18', 'Imssar InformÃ¡tica', '', '0000-00-00', '', '', 0, 1, '2019-01-29 18:09:27', NULL, '2020-01-30 12:30:16', 3),
(34, 'UK MAR II', '32', '2', 'A', 'Insua Marcote Juan Antonio', '011-15-42000154', 'pocho551@hotmail.com', 'Encargado', 'Hay humedad seca en el techo del pasillo ante baÃ±o, en el techo del baÃ±o, y en el techo del dormitorio secundario.', '2019-01-29', ' ', '', '0000-00-00', '', '09/12/2019 No hay dinero', 0, 0, '2019-01-29 18:13:20', '2020-03-11 12:45:48', '2020-03-06 18:47:00', 3),
(35, 'BC MAR I', '', '', '', '', '', '', '', 'Cambiar el cable de la montante al diÃ¡metro necesario para tener solo la fuente de energÃ­a elÃ©ctrica. La fecha tope para sacar las garrafas, es el 30 de Noviembre de 2019. La revisiÃ³n del cableado interno de cada departamento y su cambio, en caso de ser necesario, serÃ¡ por exclusiva cuenta de cada propietario. ', '2019-01-29', '', '', '0000-00-00', '', 'Obra aprobada en Asamblea Anual Ordinaria', 3, 1, '2019-01-29 18:19:38', NULL, '2020-01-30 12:27:46', 3),
(36, 'BC MAR I', '', '', '', '', '', '', '', 'Reemplazo de los tanques de agua de mamposterÃ­a por tanques de plÃ¡stico tri capa, los cuales se colocarÃ¡n encima de los tanques hoy existentes, asÃ­, teniendo mÃ¡s altura, dan mejor presiÃ³n de agua a los departamentos del Piso 3. ', '2020-01-18', '', '', '0000-00-00', '', 'Obra aprobada en Asamblea Anual Ordinaria', 0, 1, '2019-01-29 18:23:16', NULL, '2020-01-30 12:29:08', 3),
(37, 'BC MAR I', '', '', '', '', '', '', '', 'Mirando el edificio de frente, la luz de led de la puerta central no funciona y la de la cochera lado Norte, tampoco. Hay que cambiarlas. El 21/01 ocurriÃ³ lo mismo y el electricista, cambiÃ³ la fotocÃ©lula y no se solucionÃ³. 29/01 Aviso al contratista para que haga el trabajo.', '2019-01-28', 'JosÃ© RomÃ¡n', '', '0000-00-00', '', '', 3, 1, '2019-01-29 18:28:09', NULL, '2019-02-12 10:29:00', 3),
(38, 'Boreal III', '9', '1', '13', 'Gutierrez Victor', '0221 4615082 / 0221 4763697', 'lilier1980@hotmail.com', '138', ' Informa el propietario que tiene humedad en el comedor, proveniente de la Unidad Funcional 10, departamento 12. 19/11 Hoy concurro con el contratista y estÃ¡ la hija del dueÃ±o y se queda hasta el viernes 23. Ya vimos el trabajo y lo vamos a comenzar a realizar el lunes 26 de Noviembre. Hay que pedir las llaves del departamento 12, que es desde donde proviene la humedad. 06/12 Hoy lo van a llamar al propietario del departamento 12, Unidad funcional 10, para solicitarle las llaves. En el telÃ©fono fijo, es un local comercial y no conocen al titular del departamento. En el telÃ©fono celular, no da ni siquiera para dejar mensaje. Se le envÃ­a email. 21/12 El hijo del propietario realiza el reclamo nuevamente, informÃ¡ndosele que no podemos ingresar al departamento por carecer de llaves y no tener respuesta de parte del propietario de la unidad funcional 10.\r\n\r\n', '2018-10-29', 'Sergio Santana', '', '0000-00-00', '', '', 3, 1, '2019-01-29 18:34:59', NULL, '2019-02-14 18:38:28', 3),
(39, 'CASAMAR', '', '', '', '', '', '', '', 'La tapa de cÃ¡mara de cloacas, en el patio, frente a la puerta de baÃ±os de hombres, estÃ¡ rota', '2019-01-29', 'Alberto Lezcano', '', '0000-00-00', '', '', 3, 1, '2019-01-29 18:39:30', NULL, '2019-05-20 16:46:11', 3),
(40, 'CASAMAR', '30', '1', '30', 'Palacios NÃ©stor', '02324-15582389', 'nespal@hotmail.com', '', 'La llave de paso del BAÃ‘O, estÃ¡ rota. 30/01/2019 Se le avisa al contratista. 31/01 Trabajo finalizado.', '2019-01-29', 'Ezequiel Cristianzen', '171', '2019-02-08', '', '', 3, 1, '2019-01-29 18:42:37', NULL, '2019-02-08 16:10:33', 3),
(41, 'CASAMAR   ', '26', '1', '26', 'Chiribelo Marcelo', '011-1563984128', 'normadoc_3@hotmail.com', '169', 'La caÃ±erÃ­a del patio estÃ¡ perdiendo agua y no se puede reparar, ya que estÃ¡ toda podrida. La llave de paso pierde y va a mojar los locales de planta baja', '2019-01-29', 'Ezequiel Cristianzen', '', '0000-00-00', '', '', 3, 1, '2019-01-29 18:45:29', NULL, '2019-11-15 15:58:43', 3),
(42, 'COSTAMAR', '29', '2', '29', 'Aguirre MarÃ­a Eugenia', '011-15-44446827', 'roberto-aguirre1@hotmail.com', '133', 'Terminar el trabajo en el departamento, de pintura. Es en el baÃ±o y en el comedor. 23/04 Hoy se comienza la obra.', '2019-01-29', 'Alberto Lezcano', '', '0000-00-00', '', '', 3, 1, '2019-01-29 18:48:55', NULL, '2019-05-04 12:28:24', 3),
(43, 'DEMOR X', '', '', '', 'AdministraciÃ³n', '', '', '', 'Pintar el exterior del edificio, en todas las partes que son de color gris claro. Las partes de color gris oscuro, no se van a pintar, por encontrarse en condiciones, como asÃ­ tampoco los ladrillos a la vista y partes blancas de los balcones. Solo se comprarÃ¡ la cantidad necesaria de pintura para pintar alguna mancha que se pueda producir por el trabajo de pintura general. Se aprueba por unanimidad, que en los prÃ³ximos dÃ­as, se estarÃ¡ averiguando precio de pintura en las distintas pinturerÃ­as de La Costa, teniendo en cuenta la cantidad que se usÃ³ la Ãºltima vez que se pintÃ³ el edificio y el Administrador, acompaÃ±ado por algunos propietarios, procederÃ¡ a hacer la compra, al contado y en efectivo, para conseguir el mejor precio. De esa manera, los materiales, quedaran en stock hasta la efectivizaciÃ³n de la obra. Para la decisiÃ³n de que empresa pintarÃ¡ el edificio, se procederÃ¡ a solicitar presupuestos.', '2019-01-29', 'Marcelo Ayala', '', '0000-00-00', '', 'Trabajo aprobado en la Asamblea Anual Ordinaria. 30/01 Fuimos con Del Campo y BarrigÃ³n y el mejor precio es de PinturerÃ­a Canela. Gasto de materiales $52.964,00. Hoy se comprÃ³.', 3, 1, '2019-01-29 18:52:53', NULL, '2019-12-09 13:32:03', 3),
(44, 'DEMOR X', '', '', '', '', '', '', '', 'ColocaciÃ³n de las barandas de aluminio y vidrio, en la bajada de ingreso al edificio, siguiendo la lÃ­nea ya existente, es decir, aluminio color dorado y vidrios de seguridad color fumme. ', '2019-01-29', 'Cerramientos Martin', '', '0000-00-00', '', 'Trabajo aprobado en Asamblea Anual Ordinaria. 30/01 Fuimos con Del Campo y BarrigÃ³n y nos pasarÃ¡n actualizaciÃ³n de presupuesto por email. 31/01 Hoy se pagÃ³ la obra completa a MartÃ­n $59.000,00. 22/05 EstÃ¡n haciendo la colocaciÃ³n. EnvÃ­o fotos en grupo de wassap', 3, 1, '2019-01-29 18:53:55', NULL, '2019-11-15 16:01:48', 3),
(45, 'DEMOR X', '', '', '', '', '', '', '', 'ColocaciÃ³n de lajas en las paredes del frente del edificio (bajada hacia cocheras), pared frente a la salida de ascensor en planta baja y pared de medianera Oste, al lado del quincho. ', '2019-01-29', 'Alberto Lezcano', '', '0000-00-00', '', '09/08 Alberto Lezcano pasa un presupuesto de $14.000,00 de mano de obra. Se carga en el grupo de wassap del edificio, para que opinen los propietarios', 3, 1, '2019-01-29 18:55:32', NULL, '2019-09-09 18:41:05', 3),
(46, 'EL LEON I', '', '', '', 'AdministraciÃ³n', '', '', '', 'Cambiar la cerradura de entrada al edificio. Se procederÃ¡ a comprar la cerradura, con todas las copias de las llaves y se dejarÃ¡ en la oficina, hasta que se entreguen todas. Una vez que estÃ¡n todas entregadas, se procederÃ¡ al cambio.', '2019-01-29', 'CerrajerÃ­a Castelmari', '', '0000-00-00', '', 'Obra aprobada en Asamblea Anual Ordinaria. El precio estimado de la obra es de $7.000,00 / $8.000,00. 21/11/2019 Se encarga el trabajo por wassap.', 3, 1, '2019-01-29 18:58:16', NULL, '2019-12-23 19:49:41', 3),
(47, 'COMPLEJO EL JARDIN', '', '', '', '', '', '', '', 'Colocar los porteros elÃ©ctricos. Si existe caÃ±erÃ­a interna, se procederÃ¡ a pasar los cables por allÃ­, de lo contrario, colocar inhalÃ¡mbricos. ', '2019-01-29', '', '', '0000-00-00', '', 'Obra aprobada en Asamblea Anual Ordinaria', 3, 1, '2019-01-29 18:59:43', NULL, '2020-03-05 12:15:47', 3),
(48, 'EL LEON I', '', '', '', '', '', '', '', 'Comprar para el patio, 2 mesas y 12 sillas con sus respectivas sombrillas, para uso de los propietarios.', '2020-01-25', 'AdministraciÃ³n', '', '0000-00-00', '', 'Obra aprobada en Asamblea Anual Ordinaria', 0, 1, '2019-01-29 19:01:01', NULL, '2020-01-30 15:18:13', 3),
(49, 'EL LEON I', '', '', '', '', '', '', '', 'La luz del primer piso, lado izquierdo, de la ochava, estÃ¡ quemada.', '2019-01-29', 'JosÃ© RomÃ¡n', '', '0000-00-00', '', '', 3, 1, '2019-01-29 19:19:53', NULL, '2019-05-30 19:27:25', 3),
(50, 'EL LEON I', '', '', '', '', '', '', '', 'En el pasillo, del piso 2, hay un agujero del cambio de un pedazo de caÃ±o y falta tapar.', '2019-01-29', 'Alberto Lezcano', '', '0000-00-00', '', '', 3, 1, '2019-01-29 19:21:01', NULL, '2019-05-30 19:27:47', 3),
(1034, 'EUROPA II', '', '', '', 'AdministraciÃ³n', '', '', '', 'Hay pÃ©rdidas en ambos lados del tanque reservorio de agua. Ya que se desagota, se procede a limpiar y pintar el interior del mismo.', '2020-08-10', 'Eduardo Giachino', '', '0000-00-00', '', '', 2, 1, '2020-08-12 17:25:51', NULL, '2020-08-12 17:26:46', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamo_foto`
--

CREATE TABLE `reclamo_foto` (
  `idreclamo_foto` int(11) NOT NULL,
  `rfnombre` varchar(45) DEFAULT NULL,
  `rffecha` datetime DEFAULT NULL,
  `rfcambio` varchar(45) DEFAULT NULL,
  `rffechaalta` datetime DEFAULT NULL,
  `rffechabaja` datetime DEFAULT NULL,
  `rffechamod` datetime DEFAULT NULL,
  `reclamo_idreclamo` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `uemail` varchar(45) DEFAULT NULL,
  `unombre` varchar(45) DEFAULT NULL,
  `uapellido` varchar(45) DEFAULT NULL,
  `upass` varchar(200) DEFAULT NULL,
  `utelefono` varchar(45) DEFAULT NULL,
  `udireccion` varchar(45) DEFAULT NULL,
  `ufecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `uemail`, `unombre`, `uapellido`, `upass`, `utelefono`, `udireccion`, `ufecha`) VALUES
(3, 'mininipropiedades@hotmail.com', 'RomÃ¡n', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, '2019-01-28 10:49:59'),
(5, 'arielarce2@gmail.com', 'Ariel', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, '2019-02-01 23:26:46'),
(7, 'roman197014@gmail.com', 'Roman', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, '2019-11-21 08:33:45'),
(8, 'mediapila@adasystemas.com.ar', 'test', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, '2020-01-28 15:42:17'),
(9, 'zonaliberadavideogames@hotmail.com', 'Martinnieves', NULL, 'b0d27a0b383b1769e10772068ca3b948', NULL, NULL, '2020-01-28 16:14:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idnotificaciones`),
  ADD KEY `fk_notificaciones_usuario1_idx` (`nusuario_idusuario`),
  ADD KEY `fk_notificaciones_reclamo1_idx` (`reclamo_idreclamo`);

--
-- Indices de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  ADD PRIMARY KEY (`idreclamo`),
  ADD KEY `fk_reclamo_usuario1_idx` (`usuario_idusuario`);

--
-- Indices de la tabla `reclamo_foto`
--
ALTER TABLE `reclamo_foto`
  ADD PRIMARY KEY (`idreclamo_foto`),
  ADD KEY `fk_reclamo_foto_reclamo_idx` (`reclamo_idreclamo`),
  ADD KEY `fk_reclamo_foto_usuario1_idx` (`usuario_idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idnotificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3142;

--
-- AUTO_INCREMENT de la tabla `reclamo`
--
ALTER TABLE `reclamo`
  MODIFY `idreclamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1035;

--
-- AUTO_INCREMENT de la tabla `reclamo_foto`
--
ALTER TABLE `reclamo_foto`
  MODIFY `idreclamo_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_notificaciones_reclamo1` FOREIGN KEY (`reclamo_idreclamo`) REFERENCES `reclamo` (`idreclamo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_notificaciones_usuario1` FOREIGN KEY (`nusuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reclamo`
--
ALTER TABLE `reclamo`
  ADD CONSTRAINT `fk_reclamo_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reclamo_foto`
--
ALTER TABLE `reclamo_foto`
  ADD CONSTRAINT `fk_reclamo_foto_reclamo` FOREIGN KEY (`reclamo_idreclamo`) REFERENCES `reclamo` (`idreclamo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reclamo_foto_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
