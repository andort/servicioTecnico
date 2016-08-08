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
	

	$txtId1 = "";
	$txtFecha1 = "";
	$txtcliente1 = "";
	$txtCCliente1 = "";
	$txtCtecnico1 = "";
	
	$fecha = date("d-m-Y H:i:s");
	$referencia = "";
	
	//$sede = $_POST["txtSede"];
	


	//hacer el listado de los estados
	$c_Estado = tb_estado_movimiento::all(array('conditions' => 'id_estado_movimiento > "2"'));
	$combo_Estado = "";
	foreach ($c_Estado as $key => $value){
		$combo_Estado .= "<option value='".$value->id_estado_movimiento."'>".$value->descripcion."</option>";
		}






if (isset($_POST['btnEnviar'])){	

	$serv =	tb_movimiento::find('last',array('conditions' => array('id_movimiento = ?',$_POST['txt_id'])));

	$serv->comentario_solucion = $_POST['txtSolucion'];
	$serv->id_estado_movimiento = $_POST['txtRol'];
	$serv->fecha_solucion = $fecha;

	$serv->save();
	echo "<script>	alert('Se Modifico SERVICIO TÉCNICO con Exito'); </script>";

		/*if (@$serv->save()){

			echo "<script>	alert('Se Modifico SERVICIO TÉCNICO con Exito'); </script>";
			//mail($correo->email,$asunto,$comentario,$desde);
			//mail('destinatario','asunto','textodelcorreo','desdedondeseenvia');
		}	*/
	}












	   
	//listo los campos deseasddos en tablas
	//$mostrar = tb_movimiento::all(array('conditions' => 'id_estado_movimiento = "1"'));
	//$mostrar1 = tb_persona::find('all');

	$mostrar = tb_movimiento::find_by_sql('SELECT m.id_movimiento, m.fecha_inicio, p.nombres, p.apellidos, p.id_persona, m.comentario_cliente, m.comentario_tecnico, e.descripcion
											FROM tb_movimientos m
											JOIN tb_personas p 
											ON p.id_persona = m.cliente
											JOIN tb_estado_movimientos e 
											ON e.id_estado_movimiento = m.id_estado_movimiento
											WHERE m.id_estado_movimiento = 1 && m.id_tipo_movimiento = 1');
	$listar= "";
	
	
	foreach($mostrar as $var1){
			$referencia = $var1->id_movimiento;
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_movimiento."</td>";
			$listar .= "<td class='small'>".$var1->fecha_inicio."</td>";
			$listar .= "<td class='small'>".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->id_persona."</td>";
			$listar .= "<td class='small'>".$var1->descripcion."</td>";
			$listar .= "<td class='small'>".$var1->comentario_cliente."</td>";						
			$listar .= '<td class="small">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_movimiento.'">
						<a href="ctrol_solution_gtia_detail.php?referencia='.$referencia.'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
						</td>';	
			$listar .= "</tr>";
			
		}



	
	include '../View/solution_gtia.php';

?>