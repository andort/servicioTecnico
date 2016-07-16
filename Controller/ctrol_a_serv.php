
<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol_persona.php';
	include '../Model/tb_rol.php';
	include '../Model/tb_marca.php';
	include '../Model/tb_estado_articulo_cliente.php';
	include '../Model/tb_tipo_articulo.php';
	
	
	
	//hacer el listado de las marcas
	$c_marca = tb_marca::find('all');
	$combo_mar = "";
	foreach ($c_marca as $key => $value){
		$combo_mar .= "<option value='".$value->id_marca."'>".$value->descripcion_marca."</option>";
		}
		
	//hacer el listado de los articulos
	$c_articulo = tb_tipo_articulo::find('all');
	$combo_art = "";
	foreach ($c_articulo as $key => $value){
		$combo_art .= "<option value='".$value->id_tipo_articulo."'>".$value->descripcion_tipo."</option>";
		}
	
	
	
	if (isset($_POST['btnEnviar'])){		
		$usuario = tb_persona::create(array(
		'Id_persona'=> $_POST['txtId'], 
		'Nombres'=> $_POST['txtName'],
		'Apellidos'=> $_POST['txtLname'],
		'Email'=> $_POST['txtEmail'],
		'Telefono'=> $_POST['txtTel'],
		'Celular'=> $_POST['txtCel'],
		'Direccion'=> $_POST['txtDirec'],
		'User'=> $_POST['txtUser'],
		'Pass'=> $_POST['txtPass']));
		
		
		$rolper = tb_rol_persona::create(array(
		'Id_persona_x_persona'=> $_POST['txtId'],
		'Id_rol_x_rol' => $_POST['txtRol']));

		}
	     
	
	
	include '../View/agg_serv.php';

?>