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
	

	$nro_servicio = $_GET['registro1'];
	
	$date_create = "";
	$name = "";
	$identificacion = "";
	$email = "";
	$addres = "";
	$number = "";
	$sede = "";
	$create_by = "";
	$estado = "";
	$o_cliente = "";
	$o_tecnico = "";
	$o_solucion = "";
	$entrada_name = "";
	$entrada_id = "";
	$entrada_tel = "";
	$cliente_entrada = "";

	$mostrar = tb_movimiento::find_by_sql("SELECT m.id_movimiento, m.id_estado_movimiento, m.fecha_inicio, m.sede, m.create_by, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, m.comentario_solucion, p.telefono, p.celular, p.email, p.direccion, p.id_persona, e.id_estado_movimiento, e.descripcion, s.n_id_entrada, s.name_entrada, s.tel_entrada
										FROM tb_movimientos m
										JOIN tb_personas p  ON p.id_persona = m.cliente
										JOIN tb_estado_movimientos e ON e.id_estado_movimiento = m.id_estado_movimiento
										LEFT JOIN tb_serv_entrada s ON s.id_movimiento = m.id_movimiento
										WHERE m.id_movimiento = '$nro_servicio'");
	$listar= "";
	
	
	foreach($mostrar as $var1){
			$date_create = $var1->fecha_inicio;
			$name = $var1->nombres." ".$var1->apellidos;
			$identificacion = $var1->id_persona;
			$email = $var1->email;
			$addres = $var1->direccion;
			$number = $var1->telefono." - ".$var1->celular;
			$sede = $var1->sede;
			$create_by = $var1->create_by;
			$estado = $var1->descripcion;
			$o_cliente = $var1->comentario_cliente;
			$o_tecnico = $var1->comentario_tecnico;		
			$o_solucion = $var1->comentario_solucion;
			$entrada_name = $var1->name_entrada;
			$entrada_id = $var1->n_id_entrada;
			$entrada_tel = $var1->tel_entrada;
			}
	if($entrada_name != ""){
		$cliente_entrada = "<br>Contácto Adicional, Nombre: ".$entrada_name." - Nro. Identidad: ".$entrada_id." - tel o movil: ".$entrada_tel;
		} else {
			$cliente_entrada = "";
			}




	//recorremos la tb_articulos para mostrar los articulos relacionados
	$mostrar = tb_articulo::find_by_sql("SELECT p.articulo, a.id_articulo, a.proveedor, a.fecha_prov, m.marca_art, a.ref, a.problema, a.serial, a.observacion, a.nro_fac
									FROM tb_articulos a 
									join tb_marca m
									ON m.id = a.marca
									JOIN tb_art p
									ON a.art = p.id  
									WHERE a.id_movimiento = '$nro_servicio'");
		$listar= "";

		foreach($mostrar as $var1){
				$listar .= "<tr>";
				$listar .= "<td class='font_small2'>".$var1->serial."</td>";
				$listar .= "<td class='font_small2'>".$var1->articulo."</td>";
				$listar .= "<td class='font_small2'>".$var1->marca_art." - ".$var1->ref."</td>";
				$listar .= "<td class='font_small2'>".$var1->nro_fac."</td>";
				$listar .= "<td class='font_small2'>".$var1->proveedor." - ".$var1->fecha_prov."</td>";				
				$listar .= "<td class='font_small2'>".$var1->problema."</td>";
				$listar .= "<td class='font_small2'>".$var1->observacion."</td>";						
				$listar .= "</tr>"; 
				
			}

	



$html = '
<div class="">
	
		<!-- INICIO ENCABEZADO -->
		<!-- INICIO ENCABEZADO -->
		<div>
			<table width="900" height="100" align="center" class="border_bot">
				<tr>
					<td width="300" height="100" valign="middle" align="center">
					<img src="../Assets/img/logo-fac.png"/>
					<span class="font_small">
						<br>LEDACOM/Daniel Aristizabal Serna<br>
						Nit 71388800-1
					</span>
					</td>
					<td width="300" height="100" valign="middle" align="center">
					<span class="font_small1">
						Centro Comercial Carrusel, Cll 48D No. 65A-59<br>
						Centro Comercial Monterrey, Cra. 48 No 10-45, Local 73<br>
						Centro Comercial San José, Cll 45 No. 50-50, Local 108<br>
						Tel: 444 24 06 - Correo: info@ledacom.co<br>
						www.ledacom.co
					</span>
					</td>
					<td width="300" height="100" valign="middle" align="center">
					<span class="font_small2">
						<h2>Servicio Garantía</h2>
						Nro. Servicio<br>
						<h2><b>'.$nro_servicio.'</b></h2>
						Fecha: '.$date_create.'
					</span>
					</td>
				</tr>
			</table>
		</div>
		<!-- FIN ENCABEZADO -->
		<!-- FIN ENCABEZADO -->
		
		<!-- INICIO DATOS CLIENTE -->
		<!-- INICIO DATOS CLIENTE -->
		<div>
			<table width="900" height="44" align="center" class="border_bot">
				<tr>
				  <td width="600" height="44" valign="top" align="">
				  <span class="font_small">
					Cliente o Empresa: '.$name.' &nbsp;&nbsp;&nbsp;&nbsp;C.C. / Nit: '.$identificacion.'<br>
					Dirección: '.$addres.'&nbsp;&nbsp;&nbsp;Tels: '.$number.'
					'.$cliente_entrada.' 
				  </span>
				  </td>
					
				  <td width="300" height="44" valign="top" align="">
				  <span class="font_small">
					Técnico: '.$create_by.'<br>
					Sede: '.$sede.'<br> 
				  </span>
				  </td>
				</tr>
			</table>
		</div>
		<!-- FIN DATOS CLIENTE -->
		<!-- FIN DATOS CLIENTE -->
		
		<!-- INICIO RELACION SERVICIO -->
		<!-- INICIO RELACION SERVICIO -->
		<div><br>
			<table width="900" height="260" class="border_bot">
			<thead>
              <tr>
                <th class="font_small3" width="150" align="left">Serial</th>
                <th class="font_small3" width="150" align="left">Artículo</th>
                <th class="font_small3" width="150" align="left">Marca y Ref.</th>
				<th class="font_small3" width="150" align="left">Nro. Fac</th>
                <th class="font_small3" width="150" align="left">Prov y Fecha</th>
				<th class="font_small3" width="150" align="left">Problema</th>
                <th class="font_small3" width="150" align="left">Observación Tecnico</th>             
              </tr>
            </thead>
            <tbody height="260">
                '.$listar.'
            </tbody>
			</table>
		</div>
		<!-- FIN RELACION SERVICIO -->
		<!-- FIN RELACION SERVICIO -->
		
		<!-- INICIO FOOTER -->
		<!-- INICIO FOOTER -->
		<div>
			<div>
				<div>
				<table width="900" height="50" align="left" class="border_bot">
					<tr>
					  <td width="450" height="50" valign="top" class="border_right">
					  <span class="font_small">
						Observaciones Cliente: '.$o_cliente.'<br>
					  </span>
					  </td>
					  <td width="450" height="50" valign="top" align="">
					  <span class="font_small">
						Observaciones Técnico: '.$o_tecnico.'<br>
					  </span>
					  </td>
					</tr>
				</table>
				</div>
			</div>
			
			<div>
			<table width="900" height="70" align="center">
				<tr>
					<td width="450" height="50" valign="middle" align="center">
					<span class="font_small1">
						Para efectos de garantia se necesita copia de la facturay la mercancia con todos los accesorios y empaques originales. No se dara garantia por daños ocacionados por alto voltaje, golpes, deterioro, desconfiguración del equipoincompatibilidad de Hardware o Software, virus ni por alterar los sellos.
					</span>
					</td>
					<td width="450" height="50" valign="middle" align="center">
					<span class="font_small1">
					<br><br> 
					_____________________________________________________________________<br>
					Firma Conforme Cliente
					</span>
					</td>
				</tr>
			</table>
			</div>
		</div>
		<!-- FIN FOOTER -->
		<!-- FIN FOOTER -->
	
	</div>';


//==============================================================
//==============================================================
//==============================================================

include("../Library/mpdf/mpdf.php");

//$mpdf=new mPDF('c'); 
$mpdf=new mPDF('utf-8',array(220,140),'','',5,5,5,5,10,10); 

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('../Assets/css/style.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->Output();

exit;
//==============================================================
//==============================================================
//==============================================================

?>