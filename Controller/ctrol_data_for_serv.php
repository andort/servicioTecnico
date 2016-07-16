
<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
		
	
	$model = tb_persona::find($_POST['txtId']);

	$a = array();

		$a[] = array(
			'txtName'=> $model->nombres . ' ' . $model->apellidos,
			'txtEmail'=> $model->email,
			'txtTel'=> $model->telefono . ' - ' . $model->celular,
			'txtMov'=> $model->celular,
			'txtDirec'=>$model->direccion
			);
	
		//var_dump($a);
		$json = json_encode(array("result"=>$a));
		echo $json;
	
	

?>