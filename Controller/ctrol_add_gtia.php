
<?php 
	include '../config/config.php';
	
	include '../Model/tb_art.php';
	include '../Model/tb_articulo.php';
	include '../Model/tb_articulo_cambio.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_estado_movimiento.php';
	include '../Model/tb_marca.php';
	include '../Model/tb_movimiento.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_proveedor.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_serv_entrada.php';
	include '../Model/tb_serv_salida.php';
	include '../Model/tb_tipo_movimiento.php';


	
	
	$sede = 'confirmar';
	$estado_mov = 1;
	$estado_gtia = 1;
	$registro = '';
	
	
	
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
		
		
	//hacer el listado de los Proveedores
	$c_prov = tb_proveedor::find('all');
	$combo_prov = "";
	foreach ($c_prov as $key => $value){
		$combo_prov .= "<option value='".$value->id_proveedor."'>".$value->id_proveedor."</option>";
		}
	
	
	//hacer el listado de los Marcas
	$c_marca = tb_marca::find_by_sql('SELECT * FROM tb_marca ORDER BY marca_art asc');
	$combo_marca = "";
	foreach ($c_marca as $key => $value){
		$combo_marca .= "<option value='".$value->id."'>".$value->marca_art."</option>";
		}
	
	
	//hacer el listado de los Articulos
	$c_art = tb_art::find_by_sql('SELECT * FROM tb_art ORDER BY articulo asc');
	$combo_art = "";
	foreach ($c_art as $key => $value){
		$combo_art .= "<option value='".$value->id."'>".$value->articulo."</option>";
		}
	
	//vista
	include '../View/add_serv_gtia.php';	
	    
	
	
	

//solo sirve en el servidor
//mail($correo->email,$asunto,$comentario,$desde);
//mail('destinatario','asunto','textodelcorreo','desdedondeseenvia');

?>