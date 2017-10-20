
CREATE TABLE `tb_proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `direccion_proveedor` varchar(130) NOT NULL,
  `telefono_proveedor` varchar(100) NOT NULL,
  `correo_proveedor` varchar(80) NOT NULL,
  `sector_proveedor` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
