<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	
	include '../Model/tb_marca.php';

	
	
	//declaro variables vacias para devolver datos a los campos
	$txtName1 = "";
	$txtid1 = "";
	
	
	//cambio de botones	
	$btnMod1 = 'style="display: none"';
	$btnEnv1 = '';
	
		
		
/* --------------------------------------------------------------------------------------------------------------------
   --------------------------------------------------------------------------------------------------------------------
   -------------------------------------------------------------------------------------------------------------------- */	
		
		
	//ingresamos datos a la tb_marca y lo mostramos
	if (isset($_POST['btnEnv'])){
		if ($_POST['txtName'] != ''){
			
			$ingresar = array(
			'marca'=> $_POST['txtName']);
			$post = new tb_marca($ingresar);
		
			if (@$post->save()){
				echo "<script>	alert('Se Agrego con Exito'); </script>";
			}
		}
	}
	
	
	//para eliminar
	if (isset($_POST['Btn_Delet'])){
		$serv_delet = tb_marca::find($_POST['txtDelet']);
		try{
			$serv_delet->delete();
			echo "<script>	alert('Se Elemino la Marca Correctamente'); </script>";
		}catch(Exception $x){
			echo "<script>	alert('No Se Elemino la Marca'); </script>";
		}
	}
	
	
	//condicion para llevar a los textbox los campos deseados
	if (isset($_POST['Btn_Find'])){
		$usuario =	tb_marca::find($_POST['txtDelet']);
		$txtid1= $usuario->id;
		$txtName1= $usuario->marca_art;
		
		$btnEnv1 = 'style="display: none"';
		$btnMod1 = ''; 
	}
	
	//condicion para modificar
	if (isset($_POST['btnMod'])){
		$usuario =	tb_marca::find('last',array('conditions' => array('id = ?',$_POST['txtid'])));
		$usuario -> marca_art = $_POST['txtName'];
		$usuario->save();
		
			}
	
	
	
	
	$mostrar3 = tb_marca::find('all');
	$listar3= "";
	
	foreach($mostrar3 as $var3){
			$listar3 .= "<tr>";
			$listar3 .= "<td>".$var3->marca_art."</td>";
			$listar3 .= "<td class='small text-center'><form method='POST'>
			<input type='hidden' id='txtDelet' name='txtDelet' value='".$var3->id."'>
			<button type='submit' class='btn btn-success btn-sm' id='Btn_Find' name='Btn_Find'>
			<span class='glyphicon glyphicon-search'></span></button>
			<button type='submit' class='btn btn-danger btn-sm' id='Btn_Delet' name='Btn_Delet'>
			<span class='glyphicon glyphicon-floppy-remove'></span></button>
			</form></td>";
			$listar3 .= "</tr>";
		}
	
	
	
	include '../View/agg_marca.php';

?>