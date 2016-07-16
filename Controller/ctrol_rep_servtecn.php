<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_tipo_movimiento.php';
	include '../Model/tb_estado_movimiento.php';
	include '../Model/tb_movimiento.php';
	include '../Model/tb_articulo.php';
	include '../Model/tb_art.php';
	include '../Model/tb_marca.php';
	
	
	

	$txtId1 = "";
	$txtFecha1 = "";
	$txtcliente1 = "";
	$txtCCliente1 = "";
	$txtCtecnico1 = "";
	
	$listar= "";

	$fecha = date("d-m-Y H:i:s");
	
	
	
	//hacer el listado de los estados
	$c_Estado = tb_estado_movimiento::all(array('conditions' => 'id_estado_movimiento = "3"'));
	$combo_Estado = "";
	foreach ($c_Estado as $key => $value){
		$combo_Estado .= "<option value='".$value->id_estado_movimiento."'>".$value->descripcion."</option>";
		}

	


	//hacer el listado de los PROVEEDORES CON LA CONDICION DE ESTADO - - -
	$c_Prov = tb_articulo::find_by_sql('SELECT cliente
											FROM tb_movimientos
											GROUP BY cliente');
	$combo_Prov = "";
	foreach ($c_Prov as $key => $value){
		$combo_Prov .= "<option value='".$value->cliente."'>".$value->cliente."</option>";
		}


	



	//MODIFICAR EL ESTADO SIEMPRE Y CUANDO EL ESTADO NO ESTE "ENTREGADO" - - -
	if (isset($_POST['btnEnviar'])){
		if($_POST['txt_estado'] != "Entregado"){
			$serv =	tb_movimiento::find('last',array('conditions' => array('id_movimiento = ?',$_POST['txt_id'])));

			$serv->comentario_solucion = $_POST['txtSolucion'];
			$serv->id_estado_movimiento = $_POST['txtEstado'];
			$serv->fecha_solucion = $fecha;
		
			$serv->save();
			echo "<script>	alert('Se Modifico SERVICIO TÉCNICO con Exito'); </script>";

			
			} else {
				echo "<script>	alert('Lo Sentimos, No se Modifico Servicio Técnico Por Que ya se Entrego'); </script>";
				}
	}
		
		
	//HACER LA BUSQUEDA DE LOS SERVICIOS DEPENDIENDO DE LA SEDE - - -	
	if (isset($_POST['btnBuscar'])){
				
		$desicion = $_POST['txtBuscar'];
		
		if($desicion == "Carrusel del Exito" or $desicion == "Monterrey" or $desicion == "San Jose"){
			$mostrar = tb_movimiento::find_by_sql("SELECT m.id_movimiento, m.fecha_inicio, m.sede, m.cliente, m.create_by, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, p.telefono, p.celular, e.id_estado_movimiento, e.descripcion
											FROM tb_movimientos m
											JOIN tb_personas p 
											ON p.id_persona = m.cliente
											JOIN tb_estado_movimientos e 
											ON e.id_estado_movimiento = m.id_estado_movimiento
											WHERE m.sede = '$desicion' && m.id_tipo_movimiento = 2");
		$listar= "";
		foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_movimiento."</td>";
			$listar .= "<td class='small'>".$var1->fecha_inicio."</td>";
			$listar .= "<td class='small'>".$var1->cliente." - ".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->comentario_cliente."</td>";
			$listar .= "<td class='small'>".$var1->sede."</td>";
			$listar .= "<td class='small'>".$var1->descripcion."</td>";							
			$listar .= '<td class="small"><form method="POST">
							<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_movimiento.'">
							<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal('."'".$var1->id_movimiento."'".','."'"."Creado: ".$var1->fecha_inicio."'".','."'"."Cliente: ".$var1->nombres." ".$var1->apellidos."'".','."'"."tel: ".$var1->telefono." - ".$var1->celular."'".','."'".$var1->descripcion."'".','."'"."Comentario Cliente: ".$var1->comentario_cliente."'".','."'"."Comentario Técnico: ".$var1->comentario_tecnico."'".')">
							<span class="glyphicon glyphicon-search"></span></button>
							</form></td>';	
			$listar .= "</tr>";
			}
	
	
			
		}else if($desicion == "All"){
			$mostrar = tb_movimiento::find_by_sql("SELECT m.id_movimiento, m.fecha_inicio, m.sede, m.create_by, m.cliente, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, p.telefono, p.celular, e.id_estado_movimiento, e.descripcion
											FROM tb_movimientos m
											JOIN tb_personas p 
											ON p.id_persona = m.cliente
											JOIN tb_estado_movimientos e 
											ON e.id_estado_movimiento = m.id_estado_movimiento
											WHERE m.id_tipo_movimiento = 2");
			$listar= "";
			foreach($mostrar as $var1){
				$listar .= "<tr>";
				$listar .= "<td class='small'>".$var1->id_movimiento."</td>";
				$listar .= "<td class='small'>".$var1->fecha_inicio."</td>";
				$listar .= "<td class='small'>".$var1->cliente." - ".$var1->nombres." ".$var1->apellidos."</td>";
				$listar .= "<td class='small'>".$var1->comentario_cliente."</td>";
				$listar .= "<td class='small'>".$var1->sede."</td>";
				$listar .= "<td class='small'>".$var1->descripcion."</td>";							
				$listar .= '<td class="small"><form method="POST">
							<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_movimiento.'">
							<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal('."'".$var1->id_movimiento."'".','."'"."Creado: ".$var1->fecha_inicio."'".','."'"."Cliente: ".$var1->nombres." ".$var1->apellidos."'".','."'"."tel: ".$var1->telefono." - ".$var1->celular."'".','."'".$var1->descripcion."'".','."'"."Comentario Cliente: ".$var1->comentario_cliente."'".','."'"."Comentario Técnico: ".$var1->comentario_tecnico."'".')">
							<span class="glyphicon glyphicon-search"></span></button>
							</form></td>';	
				$listar .= "</tr>";
				}
				
		

		} else {
			$mostrar = tb_movimiento::find_by_sql("SELECT m.id_movimiento, m.fecha_inicio, m.sede, m.create_by, m.cliente, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, p.telefono, p.celular, e.id_estado_movimiento, e.descripcion
											FROM tb_movimientos m
											JOIN tb_personas p 
											ON p.id_persona = m.cliente
											JOIN tb_estado_movimientos e 
											ON e.id_estado_movimiento = m.id_estado_movimiento
											WHERE m.cliente = '$desicion' && m.id_tipo_movimiento = 2");
		$listar= "";
		foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_movimiento."</td>";
			$listar .= "<td class='small'>".$var1->fecha_inicio."</td>";
			$listar .= "<td class='small'>".$var1->cliente." - ".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->comentario_cliente."</td>";
			$listar .= "<td class='small'>".$var1->sede."</td>";
			$listar .= "<td class='small'>".$var1->descripcion."</td>";							
			$listar .= '<td class="small"><form method="POST">
							<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_movimiento.'">
							<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal('."'".$var1->id_movimiento."'".','."'"."Creado: ".$var1->fecha_inicio."'".','."'"."Cliente: ".$var1->nombres." ".$var1->apellidos."'".','."'"."tel: ".$var1->telefono." - ".$var1->celular."'".','."'".$var1->descripcion."'".','."'"."Comentario Cliente: ".$var1->comentario_cliente."'".','."'"."Comentario Técnico: ".$var1->comentario_tecnico."'".')">
							<span class="glyphicon glyphicon-search"></span></button>
							</form></td>';	
			$listar .= "</tr>";
			}
			
			
			
			}
		}



	
	include '../View/rep_servtecn.php';

?>