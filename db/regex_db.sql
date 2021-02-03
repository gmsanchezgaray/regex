-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2021 a las 13:07:17
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `regex_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Celulares'),
(2, 'Consolas'),
(3, 'Lavarropas'),
(4, 'Lavasecarropas'),
(5, 'Secarropas'),
(6, 'Televisores'),
(9, 'Herramientas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `sitio_web` varchar(150) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `sitio_web`, `telefono`, `observaciones`) VALUES
(1, 'Samsung', 'https://www.samsung.com/ar/', '0114-109-4000', NULL),
(2, 'Drean', 'https://www.drean.com.ar', ' 0800-888-37326', NULL),
(3, 'LG', 'https://www.lg.com/ar', '011 5352-5400', NULL),
(4, 'Philips', 'https://www.philips.com.ar', '0800-888-7532', NULL),
(5, 'Sony', 'https://www.sony.com.ar', '011-6770-7669', NULL),
(9, 'Bosch', 'https://www.bosch.com.ar', '0800-4444-26724', '  ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `precio` double(8,2) UNSIGNED NOT NULL,
  `stock` mediumint(9) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `id_marca` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `garantia` tinyint(3) UNSIGNED NOT NULL,
  `envio_sin_cargo` tinyint(3) UNSIGNED NOT NULL,
  `fecha_de_alta` datetime NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `stock`, `id_categoria`, `id_marca`, `imagen`, `garantia`, `envio_sin_cargo`, `fecha_de_alta`, `descripcion`, `observaciones`, `status`) VALUES
(1, 'Smart TV LG AI ThinQ LED 4K 50&#34;', 64999.99, 134, 6, 3, 'upload/956589.png', 24, 1, '2021-01-22 15:40:57', 'Con el Smart TV 50UM7360 vas a acceder a las aplicaciones en las que se encuentran tus contenidos favoritos. Además, podés navegar por Internet, interactuar en redes sociales y divertirte con videojuegos.', '', 1),
(2, 'Smart TV Philips 5000 LED Full HD 43&#34;', 36800.00, 23, 6, 4, 'upload/708884.png', 12, 1, '2021-01-22 15:43:43', 'El compromiso de Philips es brindar nuevas e innovadoras tecnologías a sus usuarios. Es por esa razón que se centra en los detalles para poder ofrecer productos que marcan la diferencia y crean una experiencia visual más increíble y auténtica.', '', 1),
(4, 'Smart TV Samsung LED 4K 50&#34;', 74990.00, 69, 6, 1, 'upload/364567.png', 24, 1, '2021-01-22 15:47:36', 'Con el Smart TV UN50RU7100 vas a acceder a las aplicaciones en las que se encuentran tus contenidos favoritos. Además, podés navegar por Internet, interactuar en redes sociales y divertirte con videojuegos.', '', 1),
(5, 'Smart TV Philips LED 4K 50&#34;', 53990.99, 28, 6, 4, 'upload/333209.png', 6, 1, '2021-01-23 14:45:13', 'El compromiso de Philips es brindar nuevas e innovadoras tecnologías a sus usuarios. Es por esa razón que se centra en los detalles para poder ofrecer productos que marcan la diferencia y crean una experiencia visual más increíble y auténtica.', '', 1),
(6, 'Smart TV Samsung LED curvo 4K 49&#34;', 58899.00, 20, 6, 1, 'upload/161123.png', 24, 1, '2021-01-23 14:47:10', 'Con el Smart TV UN49RU7300 vas a acceder a las aplicaciones en las que se encuentran tus contenidos favoritos. Además, podés navegar por Internet, interactuar en redes sociales y divertirte con videojuegos.', '', 1),
(7, 'Smart TV LG AI ThinQ LED 4K 43&#34;', 54999.00, 28, 6, 3, 'upload/512512.png', 12, 0, '2021-01-23 14:48:36', 'Con el Smart TV 43UM7360 vas a acceder a las aplicaciones en las que se encuentran tus contenidos favoritos. Además, podés navegar por Internet, interactuar en redes sociales y divertirte con videojuegos.', '', 1),
(8, 'Smart TV Samsung QLED 4K 65&#34;', 134999.00, 20, 6, 1, 'upload/896949.png', 36, 1, '2021-01-23 14:50:10', 'Con el Smart TV QN65Q70T vas a acceder a las aplicaciones en las que se encuentran tus contenidos favoritos. Además, podés navegar por Internet, interactuar en redes sociales y divertirte con videojuegos.', '', 1),
(9, 'Smart TV Samsung LED 4K 65&#34;', 114999.00, 17, 6, 1, 'upload/842529.png', 24, 0, '2021-01-23 14:51:53', 'Con el Smart TV UN65TU7000 vas a acceder a las aplicaciones en las que se encuentran tus contenidos favoritos. Además, podés navegar por Internet, interactuar en redes sociales y divertirte con videojuegos.', '', 1),
(10, 'Consola Playstation 4 Pro 1 Tb', 65999.00, 17, 2, 5, 'upload/505165.png', 12, 1, '2021-01-23 14:55:02', 'Incluido en la caja:\\r\\n1TB PlayStation®4 Pro system\\r\\n1 DUALSHOCK®4 Wireless Controller\\r\\n1 Mono headset\\r\\n1 Cable HDMI®\\r\\n1 Cable de Alimentación\\r\\n1 Cable USB cable', '', 1),
(11, 'Playstation 3 320gb', 33999.00, 91, 2, 5, 'upload/75714.png', 6, 0, '2021-01-23 14:56:10', 'Viene incluido con: 20 JUEGOS y 2 JOYSTICK , DISCO RIGIDO NUEVO, PLACA NUEVA , LENTE NUEVA, FACTURA Y GARANTIA 6 MESES', '', 1),
(12, 'Ps2 Slim 32gb  (Reacondicionado)', 10999.00, 73, 2, 5, 'upload/13096.png', 6, 0, '2021-01-23 14:57:11', 'Se entrega joystick con cable marca del mismo segun disponibilidad\\r\\nLas consolas no poseen unidad de dvd ya que al No fabricarse más laser originales conviene jugar x usb, sin ningún tipo de desgaste ni manipuleo de discos\\r\\nJugá ilimitado sin preocupaciones de desgaste ni sobrecalentamiento alguno.', '', 1),
(13, 'Playstation 5 -Standard Edition (con Lectora)', 299999.00, 1, 2, 5, 'upload/474463.png', 24, 1, '2021-01-23 14:58:37', 'La integración personalizada de los sistemas de la consola PS5 les permite a los creadores obtener datos desde la SSD tan rápido que pueden diseñar juegos de maneras que antes no eran posibles.', '', 1),
(14, 'Playstation 1', 8990.00, 1, 2, 5, 'upload/580156.png', 6, 0, '2021-01-23 15:00:05', 'laystation 1 Modelo One/Slim. Funcionando Perfecto. Incluye:\\r\\n-Consola Playstation One\\r\\n-Joystick PSOne Dualshock Sony Original\\r\\n-Cable de A/V Sony Original\\r\\n-Fuente de Alimentación Sony Original.', '', 1),
(15, 'Samsung Galaxy A51 128 GB White', 39999.00, 63, 1, 1, 'upload/798067.png', 12, 1, '2021-01-23 15:01:02', 'El Samsung A51 posee el novedoso sistema operativo Android 10 que incorpora respuestas inteligentes y acciones sugeridas para todas tus aplicaciones. Entre sus diversas funcionalidades encontrarás el tema oscuro, navegación por gestos y modo sin distracciones, para que completes tus tareas mientras disfrutás al máximo tu dispositivo.', '', 1),
(16, 'LG K50 32 GB Aurora Black', 20999.00, 240, 1, 3, 'upload/793809.png', 12, 0, '2021-01-23 15:03:24', 'El LG K50 cuenta con el sistema operativo avanzado Android 9.0 Pie que aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Esta tecnología vuelve a tu dispositivo tan autónomo que podrá reducir el consumo energético, ajustar automáticamente el brillo y gestionar la batería de manera inteligente.', '', 1),
(17, 'LG K50S 32 GB Aurora Black', 19999.00, 22, 1, 3, 'upload/448341.png', 6, 1, '2021-01-23 15:04:22', 'El LG K50S cuenta con el sistema operativo avanzado Android 9.0 Pie que aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Esta tecnología vuelve a tu dispositivo tan autónomo que podrá reducir el consumo energético, ajustar automáticamente el brillo y gestionar la batería de manera inteligente.', '', 1),
(18, 'Samsung Galaxy S20 FE Cloud Navy', 74999.00, 86, 1, 1, 'upload/332704.png', 24, 1, '2021-01-23 15:05:23', 'El Samsung S20 FE posee el novedoso sistema operativo Android 10 que incorpora respuestas inteligentes y acciones sugeridas para todas tus aplicaciones. Entre sus diversas funcionalidades encontrarás el tema oscuro, navegación por gestos y modo sin distracciones, para que completes tus tareas mientras disfrutás al máximo tu dispositivo.', '', 1),
(19, 'Samsung Galaxy A11 Azul', 24399.00, 76, 1, 1, 'upload/389714.png', 12, 0, '2021-01-23 15:06:21', 'El Samsung A11 posee el novedoso sistema operativo Android 10 que incorpora respuestas inteligentes y acciones sugeridas para todas tus aplicaciones. Entre sus diversas funcionalidades encontrarás el tema oscuro, navegación por gestos y modo sin distracciones, para que completes tus tareas mientras disfrutás al máximo tu dispositivo.', '', 1),
(20, 'Samsung Galaxy A01 Negro', 17499.00, 10, 1, 1, 'upload/932970.png', 12, 0, '2021-01-23 15:07:17', 'El Samsung A01 posee el novedoso sistema operativo Android 10 que incorpora respuestas inteligentes y acciones sugeridas para todas tus aplicaciones. Entre sus diversas funcionalidades encontrarás el tema oscuro, navegación por gestos y modo sin distracciones, para que completes tus tareas mientras disfrutás al máximo tu dispositivo.', '', 1),
(21, 'LG K40S Aurora Black', 17999.00, 54, 1, 3, 'upload/523591.png', 12, 1, '2021-01-23 15:08:03', 'El LG K40S cuenta con el sistema operativo avanzado Android 9.0 Pie que aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Esta tecnología vuelve a tu dispositivo tan autónomo que podrá reducir el consumo energético, ajustar automáticamente el brillo y gestionar la batería de manera inteligente.', '', 1),
(22, 'LG Q60 Aurora Black', 31999.00, 47, 1, 3, 'upload/690258.png', 12, 0, '2021-01-23 15:09:07', 'El LG Q60 cuenta con el sistema operativo avanzado Android 9.0 Pie que aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Esta tecnología vuelve a tu dispositivo tan autónomo que podrá reducir el consumo energético, ajustar automáticamente el brillo y gestionar la batería de manera inteligente.', '', 1),
(23, 'LG K20 Aurora Black', 14999.00, 47, 1, 3, 'upload/850770.png', 12, 1, '2021-01-23 15:09:51', 'El LG K20 cuenta con el sistema operativo avanzado Android 9.0 Pie que aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Esta tecnología vuelve a tu dispositivo tan autónomo que podrá reducir el consumo energético, ajustar automáticamente el brillo y gestionar la batería de manera inteligente.', '', 1),
(24, 'Lavarropas Drean Family 096 A blanco 5.5kg', 16890.00, 42, 3, 2, 'upload/194050.png', 12, 1, '2021-01-23 15:15:14', 'Desde su lanzamiento al mercado en la década del 40, Drean permanece en la memoria de los argentinos como una marca de electrodomésticos confiables, modernos y accesibles. Su gama de productos confirma su compromiso de brindarte más tiempo libre y de contribuir a lograr un planeta más limpio.', '', 1),
(25, 'Lavarropas Drean Next 6.06 Blanco 6kg', 40999.00, 57, 3, 2, 'upload/190097.png', 24, 1, '2021-01-23 15:16:16', 'Únicamente necesita que se introduzcan los productos de limpieza y se elija el programa deseado. A diferencia de los semiautomáticos, no requiere que estés presente en todas las etapas del proceso, por lo que vas a tener prendas limpias y perfumadas sin esfuerzo.', '', 1),
(26, 'Lavarropas Drean Concept 5.05 Blanco 5kg', 27548.00, 9, 3, 2, 'upload/767967.png', 6, 0, '2021-01-23 15:16:57', 'esde su lanzamiento al mercado en la década del 40, Drean permanece en la memoria de los argentinos como una marca de electrodomésticos confiables, modernos y accesibles. Su gama de productos confirma su compromiso de brindarte más tiempo libre y de contribuir a lograr un planeta más limpio.', '', 1),
(27, 'Lavarropas Samsung Inverter Plata 7kg', 53499.00, 13, 3, 1, 'upload/590432.png', 12, 0, '2021-01-23 15:17:41', 'Tecnología inverter\\r\\nReduce el ruido y las vibraciones, aún en velocidad máxima de centrifugado. A su vez, requiere un menor consumo de agua y electricidad.', '', 1),
(28, 'Lavarropas Samsung Inverter Plata 9kg', 63999.00, 23, 3, 1, 'upload/509172.png', 12, 1, '2021-01-23 15:18:29', 'Samsung apuesta por la innovación y el diseño de vanguardia en los productos de su línea blanca. Ofrece soluciones para el lavado que priorizan la eficiencia de cada uno de sus programas y con ello, el cuidado de tus prendas más delicadas.', '', 1),
(29, 'Lavarropas Drean (C.F.L.T.) V1 Blanco 5kg', 26590.99, 10, 3, 2, 'upload/742548.png', 12, 0, '2021-01-23 15:19:49', 'Concept Fuzzy Logic Tech- Desde su lanzamiento al mercado en la década del 40, Drean permanece en la memoria de los argentinos como una marca de electrodomésticos confiables, modernos y accesibles. Su gama de productos confirma su compromiso de brindarte más tiempo libre y de contribuir a lograr un planeta más limpio.', '', 1),
(30, 'Secarropas Drean Qv6.5 6,5 Kg', 9199.00, 44, 5, 2, 'upload/426610.png', 6, 1, '2021-01-23 15:20:49', '- Tambor de acero inoxidable, los procesos y material empleados en la fabricación del tambor lo convierte en una pieza inoxidable.\\r\\n- Capacidad: 6,5 Kg\\r\\n- Velocidad: 2800 rpm\\r\\n- Salida de agua: Exterior\\r\\n- Manijas de translado: Si\\r\\n- Tambor : Acero Inoxidable', '', 1),
(31, 'Secarropa Drean Qv 5.5 Kg Plastico', 11999.00, 29, 5, 2, 'upload/422891.png', 6, 0, '2021-01-23 15:21:31', 'Alto: 61 cm\\r\\n- Diámetro: 34 cm\\r\\n- Capacidad: 5,5 Kg\\r\\n- Velocidad: 2800 RPM', '', 1),
(32, 'Lavarropas LG 8,5 Kg Smart Plata', 68999.00, 63, 3, 3, 'upload/198347.png', 12, 0, '2021-01-23 15:22:20', '• Capacidad lavado: 8,5 kg.\\r\\n• Velocidad de centrifugado: 1400 RPM.\\r\\n• Motor Direct Drive (10 años de garantía en el motor).\\r\\n• Panel Touch.\\r\\n• 6 Motion DD.\\r\\n• Smart Diagnosis.', '', 1),
(33, 'Lavarropas LG Blue White 8.5kg', 55999.00, 3, 3, 3, 'upload/332480.png', 12, 1, '2021-01-23 15:23:12', 'Tipo Carga FrontalCapacidad de Lavado 8.5kg\\r\\nTamaño 24\\\"Color Blue White\\r\\nEficiencia Energética ARPM 1200\\r\\nMotor Inverter Direct DriveTambor Stainless Steel\\r\\nDimensiones (An x Al x Pr) 600 x 850 x 550Peso 60kg', '', 1),
(34, 'Lavasecarropas Samsung 16 Kg. Silver', 299999.00, 1, 4, 1, 'upload/854215.png', 24, 1, '2021-01-23 15:24:08', 'Capacidad: 16 kg\\r\\nTipos de alimentación: Eléctrica\\r\\nMaterial del tambor: Acero inoxidable\\r\\nTipos de secado: Condensación\\r\\nCarga: Frontal\\r\\nCantidad de programas: 14\\r\\nVelocidad de centrifugado: 1400 rpm', '', 1),
(35, 'Lavasecarropas LG  Stone Silver 15kg', 139999.00, 28, 4, 3, 'upload/309709.png', 12, 1, '2021-01-23 15:24:57', 'El lavasecarropas LG WD15E ofrece gran comodidad y un uso eficaz para el lavado de tu ropa. Su doble función hará que ahorres tiempo y espacio.Trabaja solo, tiene Tecnología inverter y Control inteligente.', '', 1),
(36, 'Lavasecarropas LG  Deluxe Steel 20kg', 214999.00, 32, 4, 3, 'upload/437937.png', 24, 1, '2021-01-23 15:25:41', 'El lavasecarropas LG WD22VVS6 ofrece gran comodidad y un uso eficaz para el lavado de tu ropa. Su doble función hará que ahorres tiempo y espacio. Trabaja solo, con Tecnología inverter y es Eco-Friendly.', '', 1),
(37, 'Lavasecarropas LG TWINWash 22kg', 469999.00, 10, 4, 3, 'upload/867043.png', 24, 1, '2021-01-23 15:26:28', 'Con el LG TWINWash podrás lavar dos cargas al mismo tiempo y por separado. Además, está diseñado ergonómicamente con la puerta elevada para proteger tu espalda y tus rodillas de cargas adicionales y movimientos innecesarios.', '', 1),
(38, 'Lavasecarropas Samsung 10.2kg', 148599.00, 11, 4, 1, 'upload/323094.png', 36, 0, '2021-01-23 15:27:10', 'Samsung apuesta por la innovación y el diseño de vanguardia en los productos de su línea blanca. Ofrece soluciones para el lavado que priorizan la eficiencia de cada uno de sus programas y con ello, el cuidado de tus prendas más delicadas. Trabaja solo, con Tecnología inverter y es Eco-Friendly.', '', 1),
(39, 'Lavasecarropas Samsung Black Caviar 22kg', 394999.00, 2, 4, 1, 'upload/659959.png', 36, 0, '2021-01-25 10:33:00', 'Samsung apuesta por la innovación y el diseño de vanguardia en los productos de su línea blanca. Ofrece soluciones para el lavado que priorizan la eficiencia de cada uno de sus programas y con ello, el cuidado de tus prendas más delicadas.', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(14) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `usuario`, `contrasena`, `rol`) VALUES
(1, 'Gonzalo Sánchez', 'gmsanchezg17@regex.com', 'gsanchez', 'abc123', 1),
(2, 'Victoria Torres', 'vivitorres@regex.com', 'vtorres', 'victoriasecret', 2),
(3, 'Adelaida Llanos', 'adelai@regex.com', 'allos', 'allanos333', 3),
(4, 'Samira Arce', 'samira@regex.com', 'samia', 'sami222', 2),
(5, 'Marcelo Tortosa', 'marcet@gmail.com', 'marceloT', 'marcelot', 3),
(6, 'Amador Uriarte', 'amador@gmail.com', 'amarte', 'amorxarte', 4),
(7, 'Alfredo García', 'agarcia@gmail.com', 'fredyg', 'fgarcia444', 4),
(9, 'María Tapia', 'mtapia@gmail.com', 'mtapia', 'marti444', 4),
(10, 'Homero Simpson', 'homers@regex.com', 'homerjay', 'homero111', 1),
(13, 'Jackie Chan', 'jackie@regex.com', 'jchan', 'chan123', 1),
(14, 'Santiago Marquez', 'santim@regex.com', 'santim', 'santim123', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
