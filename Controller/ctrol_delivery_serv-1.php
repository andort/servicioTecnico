<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_tipo_movimiento.php';
	include '../Model/tb_estado_movimiento.php';
	include '../Model/tb_movimiento.php';
	
	
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

	     

	$mostrar = tb_movimiento::find_by_sql('SELECT m.id_movimiento, m.fecha_inicio, p.nombres, p.apellidos, m.comentario_solucion, m.comentario_cliente, m.comentario_tecnico
											FROM tb_movimientos m
											JOIN tb_personas p 
											ON p.id_persona = m.cliente
											WHERE m.id_estado_movimiento > 2 && m.id_tipo_movimiento = 2');
	$listar= "";
	
	
	foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_movimiento."</td>";
			$listar .= "<td class='small'>".$var1->fecha_inicio."</td>";
			$listar .= "<td class='small'>".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->comentario_cliente."</td>";
			$listar .= "<td class='small'>".$var1->comentario_solucion."</td>";							
			$listar .= '<td class="small"><form method="POST">
						<input type="hidden" id="txtDelet" name="txtDelet" value="'.$var1->id_movimiento.'">
						<button type="submit" class="btn btn-success btn-sm" id="Btn_Find" data-toggle="modal" data-target="#modal_AddArt" onclick="llevar_datos_modal('."'".$var1->id_movimiento."'".','."'"."Creado: ".$var1->fecha_inicio."'".','."'"."Cliente: ".$var1->nombres." ".$var1->apellidos."'".','."'"."Comentario Cliente: ".$var1->comentario_cliente."'".','."'"."Comentario Técnico: ".$var1->comentario_tecnico."'".')">
						<span class="glyphicon glyphicon-search"></span></button>
						</form></td>';	
			$listar .= "</tr>";
			
		}





	
	include '../View/delivery_serv.php';

?>