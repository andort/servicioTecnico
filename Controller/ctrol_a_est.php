<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';

	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_estado_movimiento.php';
	
	
	//declaro variables vacias para devolver datos a los campos
	$txtId0 = "";
	$txtName0 = "";
	
	$txtId1 = "";
	$txtName1 = "";
	$txtRol1 = "";
	
	
	
	//cambio de botones
	$btnMod0 = 'style="display: none"';
	$btnEnv0 = '';
	
	$btnMod1 = 'style="display: none"';
	$btnEnv1 = '';
	
	
	
///////////////////////////////////////////////////////////////////////////////////
////////////////////// INGRESAMOS LOS DATOS A LAS TABLAS //////////////////////////
///////////////////////////////////////////////////////////////////////////////////
	
	
	//ingresamos datos a la tabla tb_estado_movimiento y lo mostramos
	if (isset($_POST['btnEnv0'])){
		if ($_POST['txtName0'] != ''){
			$ingresar0 = array(
			'descripcion'=> $_POST['txtName0']);
			$post0 = new tb_estado_movimiento($ingresar0);
		
			if (@$post0->save()){
				echo "<script>	alert('Se Agrego con Exito'); </script>";
			}
		}
	}
	
	
	//ingresamos datos a la tabla estado_articulo y lo mostramos
	if (isset($_POST['btnEnv'])){
		if ($_POST['txtName'] != ''){
			$ingresar1 = array(
			'descripcion'=> $_POST['txtName']);
			$post1 = new tb_estado_articulo_cliente($ingresar1);
		
			if (@$post1->save()){
				echo "<script>	alert('Se Agrego con Exito'); </script>";
			}
		}
	}
	



///////////////////////////////////////////////////////////////////////////////////
////////////////////// OPCION PARA ELIMINAR LOS ESTADOS ///////////////////////////
///////////////////////////////////////////////////////////////////////////////////
	
	//para eliminar DE LA TABLA tb_estado_articulo_cliente
	if (isset($_POST['Btn_Delet0'])){
		$Estdelet = tb_estado_movimiento::find($_POST['txtDelet0']);
		try{
			$Estdelet->delete();
			echo "<script>	alert('Se Elimino Correctamente'); </script>";
			echo "<script>
					new PNotify({
						title: 'Error',
						text: 'Se Elemino el Registro',
						type: 'error',

					});
			</script>";
		}catch(Exception $x){
			echo "<script>
					new PNotify({
						title: 'Error',
						text: 'No Se Elemino el Registro',
						type: 'error',

					});
			</script>";
		}
	}
	
	
	//para eliminar DE LA TABLA tb_estado_articulo_cliente
	if (isset($_POST['Btn_Delet'])){
		$Estdelet = tb_estado_articulo_cliente::find($_POST['txtDelet']);
		try{
			$Estdelet->delete();
			echo "<script>	alert('Se Elimino Correctamente'); </script>";
			echo "<script>
					new PNotify({
						title: 'Error',
						text: 'Se Elemino el Registro',
						type: 'error',

					});
			</script>";
		}catch(Exception $x){
			echo "<script>
					new PNotify({
						title: 'Error',
						text: 'No Se Elemino el Registro',
						type: 'error',

					});
			</script>";
		}
	}
	
	
	
	
///////////////////////////////////////////////////////////////////////////////////
////////////////////// OPCION PARA LOS LLEVAR DATOS A LOS INPUT ///////////////////////////
///////////////////////////////////////////////////////////////////////////////////
	
	
		
	//condicion para llevar a los textbox los campos deseados ESTADOS SERVICIOS
	if (isset($_POST['Btn_Find0'])){
		$EstadoMovimiento = tb_estado_movimiento::find($_POST['txtDelet0']);
		$txtId0= $EstadoMovimiento->id_estado_movimiento;
		$txtName0= $EstadoMovimiento->descripcion;
		
		$btnEnv0 = 'style="display: none"';
		$btnMod0 = ''; 
	}
	
	
	//condicion para llevar a los textbox los campos deseados ESTADOS ARTICULOS
	if (isset($_POST['Btn_Find'])){
		$EstadoArt = tb_estado_articulo_cliente::find($_POST['txtDelet']);
		$txtId1= $EstadoArt->id_estado_art;
		$txtName1= $EstadoArt->descripcion;
		
		$btnEnv1 = 'style="display: none"';
		$btnMod1 = ''; 
	}
	






///////////////////////////////////////////////////////////////////////////////////
////////////////////////// OPCION PARA MODIFICAR //////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
	
	
	//condicion para modificar ESTADOS SERVICIOS
	if (isset($_POST['btnMod0'])){
		$EstadoMovimientoUpdate = tb_estado_movimiento::find('last',array('conditions' => array('id_estado_movimiento = ?',$_POST['txtId0'])));
		$EstadoMovimientoUpdate->descripcion = $_POST['txtName0'];

		$EstadoMovimientoUpdate->save();
		
			}
			
			
	//condicion para modificar ESTADOS ARTICULOS
	if (isset($_POST['btnMod'])){
		$EstadoArtUpdate = tb_estado_articulo_cliente::find('last',array('conditions' => array('id_estado_art = ?',$_POST['txtId'])));
		$EstadoArtUpdate->descripcion = $_POST['txtName'];

		$EstadoArtUpdate->save();
		
			}
			
	
	
	
	
///////////////////////////////////////////////////////////////////////////////////
////////////////////// OPCION PARA LISTAR EN LAS TABLAS ///////////////////////////
///////////////////////////////////////////////////////////////////////////////////
	
			
	//listado De los estados de los servicios
	$mostrar0 = tb_estado_movimiento::find('all');
	$listar0= "";
	
	foreach($mostrar0 as $var0){
			$listar0 .= "<tr class='small'>";
			$listar0 .= "<td>".$var0->id_estado_movimiento."</td>";
			$listar0 .= "<td>".$var0->descripcion."</td>";
			$listar0 .= "<td class='small text-center'><form method='POST'>
						<input type='hidden' id='txtDelet0' name='txtDelet0' value='".$var0->id_estado_movimiento."'>
						<button type='submit' class='btn btn-success btn-sm' id='Btn_Find0' name='Btn_Find0'>
						<span class='glyphicon glyphicon-search'></span></button>
						<button type='submit' class='btn btn-danger btn-sm' id='Btn_Delet0' name='Btn_Delet0'>
						<span class='glyphicon glyphicon-floppy-remove'></span></button>
						</form></td>";	
			$listar0 .= "</tr>";
		}
		
		
		
	//listo tabla y botones
	$mostrar1 = tb_estado_articulo_cliente::find('all');
	$listar1= "";
	
	foreach($mostrar1 as $var1){
			$listar1 .= "<tr class='small'>";
			$listar1 .= "<td>".$var1->id_estado_art."</td>";
			$listar1 .= "<td>".$var1->descripcion."</td>";
			$listar1 .= "<td class='small text-center'><form method='POST'>
						<input type='hidden' id='txtDelet' name='txtDelet' value='".$var1->id_estado_art."'>
						<button type='submit' class='btn btn-success btn-sm' id='Btn_Find' name='Btn_Find'>
						<span class='glyphicon glyphicon-search'></span></button>
						<button type='submit' class='btn btn-danger btn-sm' id='Btn_Delet' name='Btn_Delet'>
						<span class='glyphicon glyphicon-floppy-remove'></span></button>
						</form></td>";	
			$listar1 .= "</tr>";
		}
	
	include '../View/agg_est.php';

?>