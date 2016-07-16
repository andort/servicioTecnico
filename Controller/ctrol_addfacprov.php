<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	
	include '../Model/tb_facturas_proveedor.php';
	include '../Model/tb_proveedor.php';
	include '../Model/tb_soporte_fac.php';
	include '../Model/tb_soporte_art.php';
	
	
	$fecha = date("Y-m-d");
	/*declaro variables vacias para devolver datos a los campos
		$txtId1 = "";
		$txtName1 = "";
		$txtLname1 = "";
		$txtTel1 = "";
		$txtCel1 = "";
		$txtEmail1 = "";
		$txtDirec1 = "";
		$txtUser1 = "";
		$txtPass1 = "";
		$btnEnviar1 ="";
		$btnModifi1 = 'style="display: none"';
		$btnEnviar1 = '';
		*/
	
	
	
	
	//hacer el listado de los Proveedores
	$comboprov = tb_proveedor::find('all');
	$c_provo = "";
	foreach ($comboprov as $key => $value){
		$c_provo .= "<option value='".$value->id_proveedor."'>".$value->id_proveedor."</option>";
		}
	
	
	//condicion que se ejecuata cuando presiono el boton de registrar
	if (isset($_POST['btnEnviar'])){
		
		if('txtUser' != ''){ //hacer condicion para la validacion
			$ingreso_fac = array(
				'Fecha_eleboracion'=> $fecha,
				'prov_fact'=> $_POST['txtProv'],
				'numero_fac'=> $_POST['txtNfact'],
				'fecha_fac'=> $_POST['txtDatefac'],
				'fecha_vencimiento'=> $_POST['txtDateven']);
			$post = new tb_facturas_proveedor($ingreso_fac);
			
			$id_consulta = new tb_facturas_proveedor("select id_factura from tb_facturas_proveedores order by asc limit 1");
			$cantidad = $_POST['txtId'];
			
				/*if (@$post->save()){
					foreach(x = 0; x >= $cantidad; x++ ){						
						$support_art = array(
							'id_factura'=> $id_consulta,
							'marca'=> $_POST['txtId'],
							'articulo'=> $_POST['txtId'],
							'cantidad'=> $_POST['txtId'],
							'descripcion' => $_POST['txtRol']);
						$post1 = new tb_soporte_art($support_art);
					}
							if (@$post1->save()){
								$support_art = array(
									'id_factura'=> $_POST['txtId'],
									'detalle'=> $_POST['txtId']);
								$post2 = new tb_soporte_fac($support_art);	
						
									if(@$post2->save()){
										echo "<script>	alert('Se Registro con Exito'); </script>";
									}
							}
					
				}*/
			
			}else{
				echo "<script>	alert('Por Favor Llene los Datos Correctamente'); </script>";
				}
		}
				

	
	//listo los campos deseasddos en tablas
	$mostrar = tb_persona::find('all');
	$mostrar1 = tb_rol::find('all');
	$listar= "";
	
	foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_persona."</td>";
			$listar .= "<td class='small'>".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->telefono."</td>";
			$listar .= "<td class='small'>".$var1->celular."</td>";
			$listar .= "<td class='small'>".$var1->email."</td>";							
			$listar .= "<td class='small'><form method='POST'>
						<input type='hidden' id='txtDelet' name='txtDelet' value='".$var1->id_persona."'>
						<button type='submit' class='btn btn-success btn-sm' id='Btn_Find' name='Btn_Find'>
						<span class='glyphicon glyphicon-search'></span></button>
						<button type='submit' class='btn btn-danger btn-sm' id='Btn_Delet' name='Btn_Delet'>
						<span class='glyphicon glyphicon-floppy-remove'></span></button>
						</form></td>";
			$listar .= "</tr>";
			
		}
	
	
	
	include '../View/agg_facprov.php';

?>