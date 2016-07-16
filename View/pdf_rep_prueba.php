<?php

/*
$pDate =  $estado_mov;
$id_cliente =  $_POST['txtId'];
$name_cliente =  $_POST['txtDatoName'];
$direc_cliente =  $_POST['txtDatoDirec'];
$tel_cliente =  $_POST['txtDatoTel'];
$o_cliente =  $_POST['txtObserv_cliente'];
$o_tecnico =  $_POST['txtObserv_tecnico'];
*/


$pDate = date("d/m/Y H:i:s");

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
					<span class="font_small2">
						Centro Comercial Carrusel, Cll 48D No. 65A-59<br>
						Centro Comercial Monterrey, Cra. 48 No 10-45, Local 73<br>
						Centro Comercial San José, Cll 45 No. 50-50, Local 108<br>
						Tel: 444 24 06 - Correo: info@ledacom.co<br>
						www.ledacom.co
					</span>
					</td>
					<td width="300" height="100" valign="middle" align="center">
					<span class="font_small3">
						Servicio Tecnico<br>
						Nro. Servicio<br>
						<span class="font_small4"><b></b></span>
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
				  <td width="600" height="44" valign="middle" align="">
				  <span class="font_small3">
					Cliente o Empresa: <br>
					C.C. / Nit: <br>
					Dirección:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tels:  
				  </span>
				  </td>
				  <td width="300" height="44" valign="middle" align="">
				  <span class="font_small3">
					Técnico: <br>
					Sede: <br>
					Fecha:  
				  </span>
				  </td>
				</tr>
			</table>
		</div>
		<!-- FIN DATOS CLIENTE -->
		<!-- FIN DATOS CLIENTE -->
		
		<!-- INICIO RELACION SERVICIO -->
		<!-- INICIO RELACION SERVICIO -->
		<div>
			<table width="900" height="260" class="border_bot">
				<tr>
				  <td height="260" valign="top">
				  <span class="font_small3">
				  	<br>
					Observaciones cliente: <br>
					Observaciones del Técnico: 			
				  </span>
				  </td>
				</tr>
			</table>
		</div>
		<!-- FIN RELACION SERVICIO -->
		<!-- FIN RELACION SERVICIO -->
		
		<!-- INICIO FOOTER -->
		<!-- INICIO FOOTER -->
		<div>
			<table width="900" height="70" align="center">
				<tr>
					<td width="450" height="50" valign="middle" align="center">
					<span class="font_small2">
						Para efectos de garantia se necesita copia de la facturay la mercancia con todos los accesorios y empaques originales. No se dara garantia por daños ocacionados por alto voltaje, golpes, deterioro, desconfiguración del equipoincompatibilidad de Hardware o Software, virus ni por alterar los sellos.
					</span>
					</td>
					<td width="450" height="50" valign="middle" align="center">
					<span class="font_small2">
					<br><br> 
					_____________________________________________________________________<br>
					Firma Conforme Cliente
					</span>
					</td>
				</tr>

			</table>
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