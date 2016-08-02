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
	
	date_default_timezone_set("America/Bogota");

	$txtId1 = "";
	$txtFecha1 = "";
	$txtcliente1 = "";
	$txtCCliente1 = "";
	$txtCtecnico1 = "";
	$estado = 5;
	$listar= "";
	$fecha = date("d-m-Y H:i:s");
	$proveedor2 = "";
	
	// hacer el listado de los PROVEEDORES CON LA CONDICION DE ESTADO 5 - - -
	// osea los que ya se le enviaron al cliente - - - - - - - - - - - - - -
	$c_Prov = tb_articulo::find_by_sql('SELECT proveedor
											FROM tb_articulos
											WHERE estado = 5
											GROUP BY proveedor');
	$combo_Prov = "";
	foreach ($c_Prov as $key => $value){
		$combo_Prov .= "<option value='".$value->proveedor."'>".$value->proveedor."</option>";
		}



	// Hacer el listado de los estados que son 3
	// articulo pagado, articulo rechazado, nota credito
	$c_Estado = tb_estado_articulo_cliente::all(array('conditions' => 'id_estado_art > "6"'));
	$combo_Estado = "";
	foreach ($c_Estado as $key => $value){
		$combo_Estado .= "<option value='".$value->id_estado_art."'>".$value->descripcion."</option>";
		}




if (isset($_POST['btnEnviar'])){	

	$serv =	tb_movimiento::find('last',array('conditions' => array('id_movimiento = ?',$_POST['txt_id'])));

	$serv->comentario_solucion = $_POST['txtSolucion'];
	$serv->id_estado_movimiento = $_POST['txtRol'];
	$serv->fecha_solucion = $fecha;

	$serv->save();
	echo "<script>	alert('Se Modificó SERVICIO TÉCNICO con éxito'); </script>";

		/*if (@$serv->save()){

			echo "<script>	alert('Se Modifico SERVICIO TÉCNICO con Exito'); </script>";
			//mail($correo->email,$asunto,$comentario,$desde);
			//mail('destinatario','asunto','textodelcorreo','desdedondeseenvia');
		}	*/
	}


	   
	//listo los campos deseasddos en tablas
	//$mostrar = tb_movimiento::all(array('conditions' => 'id_estado_movimiento = "1"'));
	//$mostrar1 = tb_persona::find('all');
/*
	$mostrar = tb_articulo::find_by_sql('SELECT p.articulo, a.id_articulo, a.proveedor, a.fecha_prov, m.marca_art, a.ref, a.problema, a.serial
										FROM tb_articulos a 
										join tb_marca m
										ON m.id = a.marca
										JOIN tb_art p
										ON a.art = p.id  
										WHERE a.estado = 1');
	$listar= "";

	foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_articulo."</td>";
			$listar .= "<td class='small'>".$var1->proveedor." - ".$var1->fecha_prov."</td>";
			$listar .= "<td class='small'>".$var1->articulo."</td>";
			$listar .= "<td class='small'>".$var1->marca_art." - ".$var1->ref."</td>";
			$listar .= "<td class='small'>".$var1->serial."</td>";
			$listar .= "<td class='small'>".$var1->problema."</td>";						
			$listar .= '<td class="small center"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_articulo.'">
						<input type="checkbox" class="text-center" checked="checked">
						</form></td>';	
			$listar .= "</tr>"; 
			
		}
		
*/		

		if (isset($_POST['btnRep'])){	
		$registro1 = $_POST['txtProv'];
			echo "<script> window.open('../View/pdf_rep_carta_prov.php?registro1=$registro1','','width=910, height=580'); </script>";
		}
		
		
		if (isset($_POST['btnBuscar'])){	
		$proveedor = $_POST['txtProv'];
		$proveedor2 = $proveedor;
		
		$mostrar = tb_articulo::find_by_sql("SELECT p.articulo, 
													a.id_articulo, 
													a.proveedor, 
													a.fecha_prov, 
													a.fecha_send_prov, 
													m.marca_art, 
													a.ref, 
													a.problema, 
													a.valor, 
													a.solucion, 
													a.serial
										FROM tb_articulos a 
										join tb_marca m
										ON m.id = a.marca
										JOIN tb_art p
										ON a.art = p.id  
										WHERE a.estado = 5 && a.proveedor = '$proveedor'");
		$listar= "";

		foreach($mostrar as $var1){
				$listar .= "<tr>";
				$listar .= "<td class='small'>".$var1->id_articulo."</td>";
				$listar .= "<td class='small'>".$var1->proveedor." - ".$var1->fecha_prov."</td>";
				$listar .= "<td class='small'>".$var1->fecha_send_prov."</td>";
				$listar .= "<td class='small'>".$var1->articulo."</td>";
				$listar .= "<td class='small'>".$var1->marca_art." - ".$var1->ref."</td>";
				$listar .= "<td class='small'>".$var1->serial."</td>";
				/* $listar .= "<td class='small'>".$var1->problema."</td>";*/					
				$listar .= '<td class="small"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_articulo.'">
						<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_solucionGtiasProv" 
						onclick="llevar_datos_modal('."'".$var1->id_articulo."'".',
													'."'"."Articulo: ".$var1->articulo."'".',
													'."'"."Marca Articulo: ".$var1->marca_art."'".',
													'."'"."Referencia: ".$var1->ref."'".',
													'."'"."Serial: ".$var1->serial."'".',
													'."'"."Fecha envio a proveedor: ".$var1->fecha_send_prov."'".',
													'."'"."valor: ".$var1->valor."'".',
													'."'"."solución: ".$var1->solucion."'".',
													'."'"."problema: ".$var1->problema."'".')">
						<span class="glyphicon glyphicon-search"></span></button>
						</form></td>';
				$listar .= "</tr>"; 
				
			}
		}

	include '../View/gtia_prov_pendientes_por_pagar.php';

?>