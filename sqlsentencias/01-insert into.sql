
INSERT INTO `tb_estado_articulo_clientes` (`id_estado_art`, `descripcion`) VALUES
(1, 'Cliente - Recibido'),
(2, 'Cliente - Cambiar'),
(3, 'Cliente - Corregido'),
(4, 'Cliente - Rechazado'),
(5, 'Cliente - Se cambia'),
(6, 'Proveedor - Se EnvÃ­a'),
(7, 'Proveedor - Paga articulo'),
(8, 'Proveedor - Nota credito'),
(9, 'Proveedor - Rechazado');


--


INSERT INTO `tb_roles` (`id_rol`) VALUES
('Admin'),
('Cliente'),
('User');


--


INSERT INTO `tb_estado_movimientos` (`id_estado_movimiento`, `descripcion`) VALUES
(1, 'Recibido'),
(2, 'Entregado'),
(3, 'Entregar');


-- --------------------------------------------------------


INSERT INTO `tb_tipo_movimientos` (`id_tipo_movimiento`, `descripcion_tipo_movimiento`) VALUES
(1, 'GarantÃ­a'),
(2, 'Servicio TÃ©cnico');