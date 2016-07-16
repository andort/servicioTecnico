<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	
	include '../Model/tb_rol.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_tipo_movimiento.php';
	
	
	//hacer el listado de las CC de los clientes
	$c_NroId = tb_persona::find('all');
	$combo_NroId = "";
	foreach ($c_NroId as $key => $value){
		$combo_NroId .= "<option value='".$value->id_persona."'>".$value->id_persona."</option>";
		}
		
		
	//hacer el listado de los Movimientos
	$c_serv = tb_tipo_movimiento::find('all');
	$combo_Serv = "";
	foreach ($c_serv as $key => $value){
		$combo_Serv .= "<option value='".$value->id_tipo_movimiento."'>".$value->descripcion_tipo_movimiento."</option>";
		}

	     
	
	include '../View/delivery_gtia.php';

?>