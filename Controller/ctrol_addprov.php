
<?php 
	include '../config/config.php';
	include '../Model/tb_proveedor.php';
	
	
		$txtCod1 = "";
		$txtName1 = "";
		$txtNit1 = "";
		$txtN11 = "";
		$txtN21 = "";
		$txtTel1 = "";
		$txtMovil1 = "";
		$txtEmail1 = "";
		$txtAdd1 = "";
		$txtCiudad1 = "";
		
		$btnModifi1 = 'style="display: none"';
		$btnEnviar1 = '';
	
	
	
	if (isset($_POST['btnEnviar'])){
		
	$Proveedor = array(
		'id_proveedor'=> $_POST['txtCod'],
		'nit'=> $_POST['txtNit'],
		'nombre_emp'=> $_POST['txtName'],
		'email'=> $_POST['txtEmail'],
		'telefono'=> $_POST['txtTel'],
		'movil'=> $_POST['txtMovil'],
		'direccion'=> $_POST['txtAdd'],
		'ciudad'=> $_POST['txtCiudad'],
		'nombre_contac1'=> $_POST['txtN1'],
		'nombre_contac2'=> $_POST['txtN2']);
		$post = new tb_proveedor($Proveedor);
	
		if (@$post->save()){
			echo "<script>	alert('Se Registro con Exito'); </script>";
		}
	}
	
	
	//para eliminar
	if (isset($_POST['Btn_Delet'])){
		$Proveedor = tb_proveedor::find($_POST['txtDelet']);
		try{
			$Proveedor->delete();
			echo "<script>	alert('Se Elemino el Registro Correctamente'); </script>";
		}catch(Exception $x){
			echo "<script>	alert('No Se Elemino el Registro'); </script>";
		}
	}
		
	//condicion para llevar a los textbox los campos deseados
	if (isset($_POST['Btn_Find'])){
		$proList =	tb_proveedor::find($_POST['txtDelet']);
		$txtCod1= $proList->id_proveedor;
		$txtName1= $proList->nombre_emp;
		$txtNit1= $proList->nit;
		$txtN11= $proList->nombre_contac1;
		$txtN21= $proList->nombre_contac2;
		$txtTel1= $proList->telefono;
		$txtMovil1= $proList->movil;
		$txtEmail1= $proList->email;
		$txtAdd1= $proList->direccion;
		$txtCiudad1= $proList->ciudad;
		
		$txtCod1 .="' readonly='readonly";
		$btnEnviar1 = 'style="display: none"';
		$btnModifi1 = ''; 
	}
	
	//condicion para modificar
	if (isset($_POST['btnModifi'])){
		$proUpdate = tb_proveedor::find('last',array('conditions' => array('id_proveedor = ?',$_POST['txtCod'])));
		$proUpdate->id_proveedor = $_POST['txtCod'];
		$proUpdate->nit = $_POST['txtNit'];
		$proUpdate->nombre_emp = $_POST['txtName'];
		$proUpdate->email = $_POST['txtEmail'];
		$proUpdate->telefono = $_POST['txtTel'];
		$proUpdate->movil = $_POST['txtMovil'];
		$proUpdate->direccion = $_POST['txtAdd'];
		$proUpdate->ciudad = $_POST['txtCiudad'];
		$proUpdate->nombre_contac1 = $_POST['txtN1'];
		$proUpdate->nombre_contac2 = $_POST['txtN2'];
		
		$proUpdate->save();
		
			}
	
	
	//crear las tablas y los botones
	$mostrar = tb_proveedor::find('all');
	$listar= "";
	
	foreach($mostrar as $var1){
			$listar .= "<tr>";
			$listar .= "<td>".$var1->id_proveedor."</td>";
			$listar .= "<td>".$var1->nombre_emp."</td>";
			$listar .= "<td>".$var1->nit."</td>";
			$listar .= "<td>".$var1->nombre_contac1." - ".$var1->nombre_contac2."</td>";
			$listar .= "<td>".$var1->telefono."</td>";
			$listar .= "<td>".$var1->movil."</td>";
			$listar .= "<td>".$var1->email."</td>";				
			$listar .= "<td class='small'><form method='POST'>
						<input type='hidden' id='txtDelet' name='txtDelet' value='".$var1->id_proveedor."'>
						<button type='submit' class='btn btn-success btn-sm' id='Btn_Find' name='Btn_Find'>
						<span class='glyphicon glyphicon-search'></span></button>
						</form></td>";	
			$listar .= "</tr>";
		}
	
	
	
	include '../View/add_provee.php';

?>