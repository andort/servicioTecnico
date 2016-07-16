
<?php 
	include '../config/config.php';
	
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_tipo_movimiento.php';
	include '../Model/tb_estado_movimiento.php';
	include '../Model/tb_movimiento.php';
	
	include 'view.php';
	
	$nro_ref = "";
	
	
	if (isset($_POST['btnEnviar'])){
		$login=tb_movimiento::find('all',array('conditions'=>array('id_movimiento=? AND cliente=?' ,$_POST['txtNro'],$_POST['txtId'])));
			$nro_ref = $_POST['txtNro'];
			if (count($login)) {
				
				session_start();
				$_SESSION["login"] = "".$login[0]->cliente;
				$_SESSION["id"] = "".$login[0]->id_movimiento;

				
				header("location: ctrol_data.php?nro_ref=".$nro_ref);
					
			}else{
		
				echo "<script>
						new PNotify({
								title: 'Combinacion Erronea',
								text: 'Datos Incorrectos por favor Digitelos nuevamente',
								type: 'error',
								shadow: false
					});</script>"; 
				
			}
		}


?>
