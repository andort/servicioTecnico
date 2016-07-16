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

	
	



	//hacer el listado de los estados de los articulos
	$c_Estado_art = tb_estado_articulo_cliente::find_by_sql("SELECT descripcion, id_estado_art
															FROM tb_estado_articulo_clientes
															WHERE id_estado_art > 1 AND id_estado_art < 5");
	$combo_Estado_art = "";
	foreach ($c_Estado_art as $key => $value){
		$combo_Estado_art .= "<option value='".$value->id_estado_art."'>".$value->descripcion."</option>";
		}
		
		
	//hacer el listado de los estados de los servicios
	$c_Estado = tb_estado_movimiento::find_by_sql("SELECT descripcion, id_estado_movimiento
															FROM tb_estado_movimientos
															WHERE id_estado_movimiento > 1 AND id_estado_movimiento < 4");
	$combo_Estado = "";
	foreach ($c_Estado as $key => $value){
		$combo_Estado .= "<option value='".$value->id_estado_movimiento."'>".$value->descripcion."</option>";
		}





	//Hacer cambios en el servicio
	if (isset($_POST['btnEnviarGtia'])){	
		if($_POST['txtEstadoServ'] != ""){
			$serv =	tb_movimiento::find('last',array('conditions' => array('id_movimiento = ?',$_POST['txtId_mov'])));
			$serv->comentario_solucion = $_POST['txtSolucionServ'];
			$serv->id_estado_movimiento = $_POST['txtEstadoServ'];
			$serv->fecha_solucion = $fecha;
			$serv->save();
			header("location: ctrol_solution_gtia.php");
			echo "<script>	alert('Se Modifico SERVICIO TÉCNICO con Exito'); </script>";
			}
		}

	
	//Hacer cambios en el Articulo
	if (isset($_POST['btnEnviar'])){	
		if($_POST['txtRol'] != ""){
			$serv =	tb_articulo::find('last',array('conditions' => array('id_articulo = ?',$_POST['txt_id'])));
			$serv->solucion = $_POST['txtSolucion'];
			$serv->estado = $_POST['txtRol'];
			$serv->fecha_solution = $fecha;
			$serv->save();
			echo "<script>	alert('Se Modifico el Artículo con Exito'); </script>";
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
				$listar .= '<td class="small"><form method="POST">
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
				$listar .= '<td class="small"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_articulo.'">
						<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal('."'".$var1->id_articulo."'".','."'"."serial: ".$var1->serial."'".','."'"."articulo: ".$var1->articulo."'".','."'"."marca - Ref: ".$var1->marca_art." - ".$var1->ref."'".','."'"."Proveedor: ".$var1->proveedor." - ".$var1->fecha_prov."'".','."'"."Estado Actual: ".$var1->descripcion."'".','."'"."Comentario Cliente: ".$var1->problema."'".','."'"."Comentario Técnico: ".$var1->observacion."'".','."'"."Solución: ".$var1->solucion."'".')">
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


	
	include '../View/solution_gtia_detail.php';

?>