<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	
	
		//declaro variables rol cliente, para que solo se ingresen clientes
		$rolcliente = "Cliente";
		$fecha = date("Y-m-d");

		
		
		//declaro variables vacias para devolver datos a los campos
		$txtId1 = "";
		$txtName1 = "";
		$txtLname1 = "";
		$txtTel1 = "";
		$txtCel1 = "";
		$txtEmail1 = "";
		$txtDirec1 = "";
		$txtUser1 = "";
		$txtPass1 = "";
		$txtCargo1 = "";
		$txtSede1 = "";
		$txtRol1 = "";
		$btnEnviar1 ="";
		$btnModifi1 = 'style="display: none"';
		$btnEnviar1 = '';
	
	
	//hacer el listado de los rolles
	//$comborol = tb_rol::all(array('conditions' => 'rol != "Cliente"'));
	$comborol = tb_rol::find_by_sql('SELECT * FROM tb_roles WHERE id_rol != "Cliente"');
	$combo = "";
	foreach ($comborol as $key => $value){
		$combo .= "<option value='".$value->id_rol."'>".$value->id_rol."</option>";
		}
	
	
	//condicion que se ejecuata cuando presiono el boton de registrar
	if (isset($_POST['btnEnviar'])){
		if($_POST['txtId'] != '' && $_POST['txtName'] != '' && $_POST['txtUser'] != '' && $_POST['txtPass'] != ''){
			$usuario = array(
				
				'id_persona'=> $_POST['txtId'],
				'nombres'=> $_POST['txtName'],
				'apellidos'=> $_POST['txtLname'],
				'email'=> $_POST['txtEmail'],
				'telefono'=> $_POST['txtTel'],
				'celular'=> $_POST['txtCel'],
				'direccion'=> $_POST['txtDirec'],
				'cargo'=> $_POST['txtCargo'],
				'sede'=> $_POST['txtSede'],
				'rol'=> $_POST['txtRol'],
				'user'=> $_POST['txtUser'],
				'pass'=> $_POST['txtPass']);
			$post = new tb_persona($usuario);
				
				if (@$post->save()){
					echo "<script>	alert('Se Registro con Exito Señ@r ".$_POST['txtName']." ".$_POST['txtLname']."'); </script>";
				}
		}else{
			echo "<script>	alert('Porfavor llene los datos Correctamente'); </script>";
			}
			
		}
	
	
	//para eliminar
	if (isset($_POST['Btn_Delet'])){
		$usuario2 = tb_persona::find($_POST['txtDelet']);
		try{
			$usuario2->delete();
			echo "<script>	alert('Se Elemino el Registro Correctamente'); </script>";
		}catch(Exception $x){
			echo "<script>	alert('No Se Elemino el Registro Correctamente '.$x); </script>";
		}
		
	}
	
	//condicion para llevar a los textbox los campos deseados
	if (isset($_POST['Btn_Find'])){
		$usuario =	tb_persona::find($_POST['txtDelet']);
		$txtId1= $usuario->id_persona;
		$txtName1= $usuario->nombres;
		$txtLname1= $usuario->apellidos;
		$txtTel1= $usuario->telefono;
		$txtCel1= $usuario->celular;
		$txtEmail1= $usuario->email;
		$txtDirec1= $usuario->direccion;
		$txtSede1= $usuario->sede;
		$txtCargo1= $usuario->cargo;
		$txtUser1= $usuario->user;
		$txtPass1= $usuario->pass;
		
		$txtId1 .="' readonly='readonly";
		$btnEnviar1 = 'style="display: none"';
		$btnModifi1 = ''; 
	}
	
	//condicion para modificar
	if (isset($_POST['btnModifi'])){
		$usuario =	tb_persona::find('last',array('conditions' => array('id_persona = ?',$_POST['txtId'])));
		$usuario->nombres = $_POST['txtName'];
		$usuario->apellidos = $_POST['txtLname'];
		$usuario->direccion = $_POST['txtDirec'];
		$usuario->telefono = $_POST['txtTel'];
		$usuario->celular = $_POST['txtCel'];
		$usuario->email = $_POST['txtEmail'];
		$usuario->direccion = $_POST['txtDirec'];
		$usuario->cargo = $_POST['txtCargo'];
		$usuario->sede = $_POST['txtSede'];
		$usuario->user = $_POST['txtUser'];
		$usuario->pass = $_POST['txtPass'];

		$usuario->save();
		
			}
	
	
	//listo los campos deseasddos en tablas
	$mostrar = tb_persona::all(array('conditions' => 'rol != "Cliente"'));
	$mostrar1 = tb_rol::find('all');
	$listar= "";
	
	//select * from tb_persona where rol=3
	
	foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td class='small'>".$var1->id_persona."</td>";
			$listar .= "<td class='small'>".$var1->nombres." ".$var1->apellidos."</td>";
			$listar .= "<td class='small'>".$var1->telefono." - ".$var1->celular."</td>";
			$listar .= "<td class='small'>".$var1->cargo."</td>";
			$listar .= "<td class='small'>".$var1->sede."</td>";
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
	
	
	
	include '../View/agg_user.php';

?>