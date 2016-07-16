
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


	
	
	$sede = '';
	$movimiento = 2;
	$estado_mov = 1;
	$estado_gtia = 1;
	$registro = '';
	$registro1 = '';

	
	
	
	//hacer el listado de las CC de los clientes
	$c_NroId = tb_persona::find('all');
	$combo_NroId = "";
	foreach ($c_NroId as $key => $value){
		$combo_NroId .= "<option value='".$value->id_persona."'>".$value->id_persona."</option>";
		}
		

	
	//Registrar los Servicios Tecnicos
	if (isset($_POST['btnEnviar'])){	

		$sede = $_POST['txtSede'];
		if($_POST['txtId'] != "" && $_POST['txtObserv_cliente'] != "" && $_POST['txtObserv_tecnico'] != ""){
			$serv1 = array(
			'id_tipo_movimiento'=> $movimiento,
			'id_estado_movimiento'=> $estado_mov,
			'cliente'=> $_POST['txtId'],
			'comentario_cliente'=> $_POST['txtObserv_cliente'],
			'comentario_tecnico'=> $_POST['txtObserv_tecnico'],
			'create_by'=> $_POST['txtTecnico'],
			'sede'=> $_POST['txtSede']);

			$post = new tb_movimiento($serv1);


				//condicion para ingresar datos en la tabla tb_otrocontacto
				if (@$post->save()){

					//traigo el ultimo registro y lo mando a una variable
					$registro = tb_movimiento::find('last');
					$registro1 = $registro->id_movimiento;
					
					if($_POST['txtName_otro'] != ''){
						$serv3 = array(
						'id_movimiento'=> $registro->id_movimiento, 
						'n_id_entrada'=> $_POST['txtId_otro'], 
						'name_entrada'=> $_POST['txtName_otro'],
						'tel_entrada'=> $_POST['txtMovil_otro']);

						$post2 = new tb_serv_entrada($serv3);

						if (@$post2->save()){	
							}
					}
					echo "<script> window.open('../View/pdf_rep_serv.php?registro1=$registro1','','width=920, height=600'); </script>";
				
				}
			

			//mail($correo->email,$asunto,$comentario,$desde);
			//mail('destinatario','asunto','textodelcorreo','desdedondeseenvia');

		} else {
			echo "<script>	alert('Faltan Datos, porfavor llenar correctamente'); </script>";
			}
		

	}
	     
	
	
	//vista
	include '../View/add_serv_tec.php';	

//solo sirve en el servidor
//mail($correo->email,$asunto,$comentario,$desde);
//mail('destinatario','asunto','textodelcorreo','desdedondeseenvia');

?>