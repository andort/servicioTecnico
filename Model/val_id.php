<?php

	
	$b=$_POST["txtId"];
	$conect = mysql_connect('localhost','root','');
	mysql_select_db('mydbleda', $conect);
	
	if (is_numeric($b)){
		$sql = mysql_query("SELECT * FROM tb_personas WHERE id_persona = ".$b."",$conect);
		$contar = mysql_num_rows($sql);
		
		If($contar ==0){
			echo 2;
			//echo "<div class='alert alert-success text-center' role='alert'>continue</div>";
			} else{
				echo 1;
				//echo "<div class='alert alert-danger text-center' role='alert'>Ya existe el Numero de ID</div>";
				}
		
		}else{
			echo 1;
			//echo "<div class='alert alert-danger text-center' role='alert'>Cedula no válida</div>";
			}

/*

	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
		
	
	
	if (is_numeric($_POST['txtId'])){
		$model = tb_persona::find($_POST['txtId']);
		if($model == ""){
			echo "<div class='alert alert-success' role='alert'>No existe el Numero de ID</div>";
			}else{
				echo "<div class='alert alert-danger' role='alert'>Ya existe el Numero de ID</div>";
				}
	}else{
		echo "<div class='alert alert-info' role='alert'>Cedula no válida</div>";
		}
		
		*/
?>