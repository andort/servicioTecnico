<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_tipo_movimiento.php';
	include '../Model/tb_estado_movimiento.php';
	include '../Model/tb_movimiento.php';
	

	$nro_servicio = $_GET['nro_ref'];
	$t_serv = "";
	$sede = "";
	$name = "";
	$addres = "";
	$number = "";
	$email = "";
	$o_cliente = "";
	$o_tecnico = "";
	$solucion = "";
	$estado1 = "";
	$estado = "";
	$date_create = "";
	$create_by = "";



	$mostrar = tb_movimiento::find_by_sql("SELECT m.id_movimiento, m.id_estado_movimiento, m.fecha_inicio, m.sede, m.create_by, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, m.comentario_solucion, p.telefono, p.celular, p.email, p.direccion, e.Id_estado_movimiento, e.descripcion
											FROM tb_movimientos m
											JOIN tb_personas p 
											JOIN tb_estado_movimientos e
											ON p.id_persona = m.cliente AND e.Id_estado_movimiento = m.id_estado_movimiento
											WHERE m.id_movimiento = '$nro_servicio'");
	$listar= "";
	
	
	foreach($mostrar as $var1){
			$date_create = $var1->fecha_inicio;
			$name = $var1->nombres." ".$var1->apellidos;
			$email = $var1->email;
			$addres = $var1->direccion;
			$number = $var1->telefono." - ".$var1->celular;
			$sede = $var1->sede;
			$create_by = $var1->create_by;
			$estado = $var1->descripcion;
			$o_cliente = $var1->comentario_cliente;
			$o_tecnico = $var1->comentario_tecnico;		
			$o_solucion = $var1->comentario_solucion;

		}
		




	
	include 'show_data.php';

?>