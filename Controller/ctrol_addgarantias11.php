
<?php 

	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_art.php';
	include '../Model/tb_marca.php';
	include '../Model/tb_articulo.php';
	include '../Model/tb_tipo_movimiento.php';
	include '../Model/tb_proveedor.php';
	include '../Model/tb_otrocontacto.php';
	include '../Model/tb_estado_movimiento.php';
	include '../Model/tb_serv_entrada.php';


	//estado inicial que se le dan a los articulos
	$estado = 1;
	$nro_ref = "";


	//var_dump($_POST['datos_gtia']);

	$serv1 = array(
		'id_tipo_movimiento'=> $estado,
		'id_estado_movimiento'=> $estado,
		'sede'=> $_POST['sede'],
		'create_by'=> $_POST['tecnico'],
		'cliente'=> $_POST['cliente'],
		'comentario_cliente'=> $_POST['c_cliente'],
		'comentario_tecnico'=> $_POST['c_tecnico']);

		$post = new tb_movimiento($serv1);

		if (@$post->save()){

			//traigo el ultimo registro y lo mando a una variable
			$registro = tb_movimiento::find('last');
			$nro_ref = $registro->id_movimiento;			

			if($_POST['otro_name'] != ''){
			 	$serv3 = array(
			 	'id_movimiento'=> $registro->id_movimiento, 
			 	'n_id_entrada'=> $_POST['otro_id'], 
			 	'name_entrada'=> $_POST['otro_name'],
			 	'tel_entrada'=> $_POST['otro_tel']);
			 	$post1 = new tb_serv_entrada($serv3);

			 	@$post1->save();
			 	}

			$cont='';
			foreach ($_POST['datos_gtia'] as $value) {

				$serv2 = array(
				'id_movimiento'=> $registro->id_movimiento, 
				'serial'=> $value['serial'], 
				'art'=> $value['art'],
				'marca'=> $value['marca'],
				'ref'=> $value['ref'],
				'proveedor'=> $value['prov'],
				'fecha_prov'=> $value['fprov'],
				'nro_fac'=> $value['nfactura'],
				'fecha_fac'=> $value['ffactura'],
				'valor'=> $value['valor'],
				'problema'=> $value['problema'],
				'observacion'=> $value['observacion'],
				'estado'=> $estado_gtia);
				$post = new tb_articulo($serv2);

					if (@$post->save()){	
					$cont ++;					
					}
				}
		if ($cont == count($_POST['datos_gtia'])) {
			echo $nro_ref;
			}
		}



?>