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

	
	// hacer el listado de los PROVEEDORES CON LA CONDICION DE ESTADO MAYOR A 6 - - -
	// osea los que ya se le enviaron al cliente - - - - - - - - - - - - - -
	$c_Prov = tb_articulo::find_by_sql('SELECT proveedor
											FROM tb_articulos
											WHERE estado > 6
											GROUP BY proveedor');
	$combo_Prov = "";
	foreach ($c_Prov as $key => $value){
		$combo_Prov .= "<option value='".$value->proveedor."'>".$value->proveedor."</option>";
		}




		
	// btnBuscar - -  traigo el detalle de cada articulo para ingresarlo a la tabla
	// siempre y cuando el estado sea -5-
	if (isset($_POST['btnBuscar'])){	
		$proveedor = $_POST['txtProv'];
		$proveedor2 = $proveedor;
		
		$mostrar = tb_articulo::find_by_sql("SELECT p.articulo, 
													a.id_articulo, 
													a.proveedor, 
													a.fecha_prov,
													a.fecha_create,
													a.fecha_pago_prov, 
													a.fecha_send_prov, 
													m.marca_art, 
													a.ref, 
													a.problema, 
													a.valor, 
													a.solucion, 
													a.serial,
													e.descripcion
										FROM tb_articulos a 
										join tb_marca m
										ON m.id = a.marca
										JOIN tb_art p
										ON a.art = p.id  
										JOIN tb_estado_articulo_clientes e
										ON a.estado = e.id_estado_art  
										WHERE a.estado > 6 && a.proveedor = '$proveedor'");

		// haga el recorrido pintando los articulos en la tabla
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
												'."'".$var1->articulo." ".$var1->marca_art."'".',
												'."'".$var1->marca_art."'".',
												'."'".$var1->ref."'".',
												'."'".$var1->serial."'".',
												'."'".$var1->fecha_send_prov."'".',
												'."'".$var1->fecha_create."'".',
												'."'".$var1->fecha_pago_prov."'".',
												'."'".$var1->valor."'".',
												'."'".$var1->descripcion."'".',
												'."'"."Solución: ".$var1->solucion."'".',
												'."'"."Problema: ".$var1->problema."'".')">
					<span class="glyphicon glyphicon-search"></span></button>
					</form></td>';
			$listar .= "</tr>"; 		
		}
	}

	include '../View/gtia_prov_historial.php';

?>