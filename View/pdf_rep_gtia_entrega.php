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

	$mostrar = tb_movimiento::find_by_sql("SELECT m.id_movimiento, m.id_estado_movimiento, m.fecha_inicio, m.fecha_fin, m.sede, m.create_by, p.nombres, p.apellidos, m.comentario_cliente, m.comentario_tecnico, m.comentario_solucion, p.telefono, p.celular, p.email, p.direccion, p.id_persona, e.id_estado_movimiento, e.descripcion, s.n_id_entrada, s.name_entrada, s.tel_entrada
										FROM tb_movimientos m
										JOIN tb_personas p  ON p.id_persona = m.cliente
										JOIN tb_estado_movimientos e ON e.id_estado_movimiento = m.id_estado_movimiento
										LEFT JOIN tb_serv_entrada s ON s.id_movimiento = m.id_movimiento
										WHERE m.id_movimiento = '$nro_servicio'");
	$listar= "";
	
	
	foreach($mostrar as $var1){
			$date_create = $var1->fecha_fin;
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
	$mostrar = tb_articulo::find_by_sql("SELECT p.articulo, a.id_articulo, a.proveedor, a.fecha_prov, m.marca_art, a.ref, a.problema, a.serial, a.observacion, a.nro_fac, a.solucion, est.descripcion, est.id_estado_art, ac.art as cambio_art, ac.marca as cambio_marca, ac.ref as cambio_ref, ac.serial as cambio_serial, ac.proveedor as cambio_proveedor, ac.fecha_prov as cambio_fecha_prov, artcambio.articulo as cambio_articulo, marcacambio.marca_art as cambio_marca_art
									FROM tb_articulos a 
									join tb_marca m
									ON m.id = a.marca
									JOIN tb_art p
									ON a.art = p.id 
									JOIN tb_estado_articulo_clientes est
									ON est.id_estado_art = a.estado 
									LEFT OUTER JOIN tb_articulos_cambio ac
									ON ac.id_art_cambio = a.id_articulo  
									LEFT OUTER JOIN tb_art artcambio
									ON ac.art = artcambio.id
									LEFT OUTER join tb_marca marcacambio
									ON marcacambio.id = ac.marca
									WHERE a.id_movimiento = '$nro_servicio'");
		$listar= "";

		foreach($mostrar as $var1){

			$decision_status = $var1->id_estado_art;
			
			$listar .= "<tr>";
			$listar .= "<td class='font_small2'>".$var1->serial."</td>";
			$listar .= "<td class='font_small2'>".$var1->articulo." ".$var1->marca_art."<br />Ref: ".$var1->ref."</td>";
			$listar .= "<td class='font_small2'>".$var1->proveedor."<br />".$var1->fecha_prov."</td>";				
			$listar .= "<td class='font_small2 border_right'>".$var1->problema."</td>";
			$listar .= "<td class='font_small2'>".$var1->descripcion."</td>";

			if($decision_status == 5){
				$listar .= "<td class='font_small2'>".$var1->cambio_articulo." ".$var1->cambio_marca_art."<br />Ref: ".$var1->cambio_ref."<br />Serial: ".$var1->cambio_serial."<br />Proveedor: ".$var1->cambio_proveedor." - ".$var1->cambio_fecha_prov."</td>";
				$listar .= "</tr>"; 

			}else{

				$listar .= "<td class='font_small2'>".$var1->solucion."</td>";						
				$listar .= "</tr>"; 
			}	
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
						<h2>Servicio Entrega Garantía</h2>
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
                <th class="font_small3" width="100" align="left">Serial</th>
                <th class="font_small3" width="160" align="left">Artículo</th>
                <th class="font_small3" width="120" align="left">Prov y Fecha</th>
				<th class="font_small3" width="230" align="left">Problema</th>
                <th colspan="2" class="font_small3" width="330" align="left">Solución</th>  
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
					  <td width="300" height="50" valign="top" class="border_right">
						  <span class="font_small">
							Observaciones Cliente: '.$o_cliente.'<br>
						  </span>
					  </td>
					  <td width="300" height="50" valign="top" class="border_right">
						  <span class="font_small">
							Observaciones Técnico: '.$o_tecnico.'<br>
						  </span>
					  </td>
					  <td width="300" height="50" valign="top" align="">
						  <span class="font_small">
							Observación Final: '.$o_solucion.'<br>
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