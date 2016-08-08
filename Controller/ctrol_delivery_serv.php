<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_tipo_movimiento.php';
	include '../Model/tb_estado_movimiento.php';
	include '../Model/tb_movimiento.php';
	include '../Model/tb_serv_salida.php';
	include '../Model/tb_serv_entrada.php';
	

	$txtId1 = "";
	$txtFecha1 = "";
	$txtcliente1 = "";
	$txtCCliente1 = "";
	$txtCtecnico1 = "";
	$registro1 = "";

	date_default_timezone_set("America/Bogota");
	$fecha = date("d-m-Y H:i:s");

	


	//hacer el listado de los estados
	$c_Estado = tb_estado_movimiento::all(array('conditions' => 'id_estado_movimiento = "2"'));
	$combo_Estado = "";
	foreach ($c_Estado as $key => $value){
		$combo_Estado .= "<option value='".$value->id_estado_movimiento."'>".$value->descripcion."</option>";
		}






if (isset($_POST['btnEnviar'])){	

	if($_POST['txtRol'] != ""){

		$serv =	tb_movimiento::find('last',array('conditions' => array('id_movimiento = ?',$_POST['txt_id'])));

		$serv->id_estado_movimiento = $_POST['txtRol'];
		$serv->fecha_fin = $fecha;

		$serv->save();
		
			if($_POST['txt_Rname'] != ""){
				
				$ingresar = array(
					'id_movimiento'=> $_POST['txt_id'],
					'n_id_salida'=> $_POST['txt_Rid'],
					'name_salida'=> $_POST['txt_Rname'],
					'tel_salida'=> $_POST['txt_Rtel']);
					$post = new tb_serv_salida($ingresar);
			
					if (@$post->save()){
					}
				
				}
		$registro1 = $_POST['txt_id'];
		echo "<script> window.open('../View/pdf_rep_serv_entrega.php?registro1=$registro1','','width=920, height=600'); </script>";
	}

		/*if (@$serv->save()){

			echo "<script>	alert('Se Modifico SERVICIO TÉCNICO con Exito'); </script>";
			//mail($correo->email,$asunto,$comentario,$desde);
			//mail('destinatario','asunto','textodelcorreo','desdedondeseenvia');
		}	*/
	}



	   
	//listo los campos deseasddos en tablas
	//$mostrar = tb_movimiento::all(array('conditions' => 'id_estado_movimiento = "1"'));
	//$mostrar1 = tb_persona::find('all');

	$mostrar = tb_movimiento::find_by_sql('SELECT m.id_movimiento, m.fecha_inicio, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, m.comentario_solucion, p.telefono, p.celular
											FROM tb_movimientos m
											JOIN tb_personas p 
											ON p.id_persona = m.cliente
											WHERE m.id_estado_movimiento = 3 && m.id_tipo_movimiento = 2');
	$listar= "";
	
	
	foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_movimiento."</td>";
			$listar .= "<td class='small'>".$var1->fecha_inicio."</td>";
			$listar .= "<td class='small'>".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->comentario_cliente."</td>";
			$listar .= "<td class='small'>".$var1->comentario_tecnico."</td>";
			$listar .= "<td class='small'>".$var1->comentario_solucion."</td>";							
			$listar .= '<td class="small text-center"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_movimiento.'">
						<button type="submit" class="btn btn-primary btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal('."'".$var1->id_movimiento."'".','."'"."Creado: ".$var1->fecha_inicio."'".','."'"."Cliente: ".$var1->nombres." ".$var1->apellidos."'".','."'"."tel: ".$var1->telefono." - ".$var1->celular."'".','."'"."Comentario Cliente: ".$var1->comentario_cliente."'".','."'"."Comentario Técnico: ".$var1->comentario_tecnico."'".','."'"."Solución: ".$var1->comentario_solucion."'".')">
						<span class="glyphicon glyphicon-search"></span></button>
						</form></td>';	
			$listar .= "</tr>";
			
		}




	
	include '../View/delivery_serv.php';

?>