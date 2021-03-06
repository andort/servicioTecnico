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
	
	
	
	$nro_servicio = $_GET['referencia'];

	$txtId1 = "";
	$txtFecha1 = "";
	$txtcliente1 = "";
	$txtCCliente1 = "";
	$txtCtecnico1 = "";

	date_default_timezone_set("America/Bogota");
	$fecha = date("d-m-Y H:i:s");
	
	$id_mov = "";
    $name = "";
	$id_persona = "";
    $addres = "";
    $date_create = "";
    $number = "";	
    $create_by = "";
    $sede = "";
    $email = "";	
    $o_cliente = "";
    $o_tecnico = "";
    $o_solucion = "";
    $estado = "";
	
	
	
		
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
	

	
	



	//hacer el listado de los estados de los articulos
	$c_Estado_art = tb_estado_articulo_cliente::find_by_sql("SELECT descripcion, id_estado_art
															FROM tb_estado_articulo_clientes
															WHERE id_estado_art > 2 AND id_estado_art < 6");
	$combo_Estado_art = "";
	foreach ($c_Estado_art as $key => $value){
		$combo_Estado_art .= "<option value='".$value->id_estado_art."'>".$value->descripcion."</option>";
		}
		
		
	//hacer el listado de los estados de los servicios
	$c_Estado = tb_estado_movimiento::find_by_sql("SELECT descripcion, id_estado_movimiento
															FROM tb_estado_movimientos
															WHERE id_estado_movimiento = 2 OR id_estado_movimiento = 4");
	$combo_Estado = "";
	foreach ($c_Estado as $key => $value){
		$combo_Estado .= "<option value='".$value->id_estado_movimiento."'>".$value->descripcion."</option>";
		}





	//Hacer cambios en el servicio
	if (isset($_POST['btnEnviarGtia'])){
		
		if($_POST['txtEstadoServ'] != ""){
			$serv =	tb_movimiento::find('last',array('conditions' => array('id_movimiento = ?',$_POST['txtId_mov'])));
			$registro1 = $_POST['txtId_mov'];
			$serv->id_estado_movimiento = $_POST['txtEstadoServ'];
			$serv->fecha_fin = $fecha;
			$serv->save();
			//echo "<script> window.open('../View/pdf_rep_gtia_entrega.php?registro1=$registro1','','width=910, height=580'); </script>";
			header("location: ctrol_delivery_gtia.php?registro=$registro1");
			
			/*echo "<script>	alert('Se Modifico SERVICIO TÉCNICO con Exito'); </script>";*/
			}
		}

	
	//Hacer cambios en el Articulo
	if (isset($_POST['btnEnviar'])){
		
		$decision = $_POST['txtRol'];
		
		if($decision == 5){
			if($_POST['txtArt'] != "" && $_POST['txtMarca'] != "" && $_POST['txtRef'] != "" && $_POST['txtProv'] != "" && $_POST['txtFprov'] != "" && $_POST['txtSerial'] != ""){
				
			$serv =	tb_articulo::find('last',array('conditions' => array('id_articulo = ?',$_POST['txt_id_hide'])));
			$serv->estado = $_POST['txtRol'];
			$serv->fecha_solution = $fecha;
			$serv->save();
			
			//Ingreso art de cambio en la tabla tb_articulos_cambio
			$ingresar = array(
			'id_art_cambio'=> $_POST['txt_id_hide'],
			'art'=> $_POST['txtArt'],
			'marca'=> $_POST['txtMarca'],
			'ref'=> $_POST['txtRef'],
			'serial'=> $_POST['txtSerial'],
			'proveedor'=> $_POST['txtProv'],
			'fecha_prov'=> $_POST['txtFprov'],
			'fecha'=> $fecha);
			$post = new tb_articulo_cambio($ingresar);
		
			if (@$post->save()){
				echo "<script>	alert('Se Hizo el Cambio Con Exito'); </script>";
			}
			
			
			} else {
				echo "<script>	alert('Llene los Datos Correctamente'); </script>";
				}
		} else {
			$serv =	tb_articulo::find('last',array('conditions' => array('id_articulo = ?',$_POST['txt_id_hide'])));
			$serv->estado = $_POST['txtRol'];
			$serv->fecha_solution = $fecha;
			$serv->save();
			echo "<script>	alert('Se Hizo el Cambio Con Exito'); </script>";
			}
		
		}
	

	   
	//listo los campos deseasddos en tablas
	//$mostrar = tb_movimiento::all(array('conditions' => 'id_estado_movimiento = "1"'));
	//$mostrar1 = tb_persona::find('all');
	
	
	
	//Recorremos el movimiento para traer los datos necesarios
	$mostrar = tb_movimiento::find_by_sql("SELECT m.id_movimiento, m.id_estado_movimiento, m.fecha_inicio, m.sede, m.create_by, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, m.comentario_solucion, p.telefono, p.celular, p.email, p.direccion, p.id_persona, e.Id_estado_movimiento, e.descripcion
											FROM tb_movimientos m
											JOIN tb_personas p 
											JOIN tb_estado_movimientos e
											ON p.id_persona = m.cliente AND e.Id_estado_movimiento = m.id_estado_movimiento
											WHERE m.id_movimiento = '$nro_servicio'");
	$listar= "";
	
	
	
	foreach($mostrar as $var1){
			$id_mov = $var1->id_movimiento;
			$date_create = $var1->fecha_inicio;
			$name = $var1->nombres." ".$var1->apellidos;
			$id_persona = $var1->id_persona;
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
	
	

	
	
	//recorremos la tb_articulos para mostrar los articulos relacionados
	$mostrar = tb_articulo::find_by_sql("SELECT p.articulo, a.id_articulo, a.proveedor, a.fecha_prov, m.marca_art, a.ref, a.problema, a.serial, a.observacion, a.nro_fac, a.id_articulo, a.solucion, a.estado, e.descripcion
									FROM tb_articulos a 
									JOIN tb_marca m
									ON m.id = a.marca
									JOIN tb_art p
									ON a.art = p.id  
									JOIN tb_estado_articulo_clientes e
									ON e.id_estado_art = a.estado  
									WHERE a.id_movimiento = '$nro_servicio'");
		$listar= "";

		foreach($mostrar as $var1){
			$desicion_art = $var1->estado;
			if($desicion_art == 5){
				$listar .= "<tr>";
				$listar .= "<td class='font_small2'>".$var1->serial."</td>";
				$listar .= "<td class='font_small2'>".$var1->articulo."</td>";
				$listar .= "<td class='font_small2'>".$var1->marca_art." - ".$var1->ref."</td>";
				$listar .= "<td class='font_small2'>".$var1->proveedor." - ".$var1->fecha_prov."</td>";			
				$listar .= "<td class='font_small2'>".$var1->problema."</td>";
				$listar .= "<td class='font_small2'>".$var1->descripcion."</td>";
				$listar .= '<td class="small text-center"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_articulo.'">
						<button type="submit" class="btn btn-warning btn-sm" id="Btn_Find" disabled="disabled">
						<span class="glyphicon glyphicon-ok"></span></button>
						</form></td>';						
				$listar .= "</tr>";
			
			}else{
				$listar .= "<tr>";
				$listar .= "<td class='font_small2'>".$var1->serial."</td>";
				$listar .= "<td class='font_small2'>".$var1->articulo."</td>";
				$listar .= "<td class='font_small2'>".$var1->marca_art." - ".$var1->ref."</td>";
				$listar .= "<td class='font_small2'>".$var1->proveedor." - ".$var1->fecha_prov."</td>";			
				$listar .= "<td class='font_small2'>".$var1->problema."</td>";
				$listar .= "<td class='font_small2'>".$var1->descripcion."</td>";
				$listar .= '<td class="small text-center"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_articulo.'">
						<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal(
						'."'".$var1->id_articulo."'".',
						'."'".$var1->id_articulo."'".',
						'."'"."Serial: ".$var1->serial."'".',
						'."'".$var1->articulo." ".$var1->marca_art."'".',
						'."'"."Referencia: ".$var1->ref."'".',
						'."'"."Proveedor: ".$var1->proveedor." - ".$var1->fecha_prov."'".',
						'."'".$var1->descripcion."'".',
						'."'".$var1->problema."'".',
						'."'"."Comentario Técnico: ".$var1->observacion."'".',
						'."'".$var1->solucion."'".')">
						<span class="glyphicon glyphicon-plus-sign"></span></button>
						</form></td>';						
				$listar .= "</tr>";
				
				}

			}
	
	
	
	
	
	
	
	
	/*

	$mostrar = tb_movimiento::find_by_sql('SELECT m.id_movimiento, m.fecha_inicio, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, p.telefono, p.celular
											FROM tb_movimientos m
											JOIN tb_personas p 
											ON p.id_persona = m.cliente
											WHERE m.id_estado_movimiento = 1 && m.id_tipo_movimiento = 2');
	$listar= "";
	
	
	foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_movimiento."</td>";
			$listar .= "<td class='small'>".$var1->fecha_inicio."</td>";
			$listar .= "<td class='small'>".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->comentario_cliente."</td>";
			$listar .= "<td class='small'>".$var1->comentario_tecnico."</td>";							
			$listar .= '<td class="small"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_movimiento.'">
						<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal('."'".$var1->id_movimiento."'".','."'"."Creado: ".$var1->fecha_inicio."'".','."'"."Cliente: ".$var1->nombres." ".$var1->apellidos."'".','."'"."tel: ".$var1->telefono." - ".$var1->celular."'".','."'"."Comentario Cliente: ".$var1->comentario_cliente."'".','."'"."Comentario Técnico: ".$var1->comentario_tecnico."'".')">
						<span class="glyphicon glyphicon-search"></span></button>
						</form></td>';	
			$listar .= "</tr>";
			
		}

*/


	
	include '../View/delivery_gtia_detail.php';

?>