
<?php 
	include '../config/config.php';
	include '../Model/tb_persona.php';
	include '../Model/tb_rol.php';
	include '../View/index.php';

	
	
	if (isset($_POST['btnEnviar'])){
		$login=tb_persona::find('all',array('conditions'=>array('user=? AND pass=?' ,$_POST['user'],$_POST['pass'])));
			if (count($login)) {
				
				session_start();
				$_SESSION["login"] = "".$login[0]->nombres." ".$login[0]->apellidos;
				$_SESSION["rol"] = "".$login[0]->rol;
				$_SESSION["correo"] = "".$login[0]->email;
				$_SESSION["cargo"] = "".$login[0]->cargo;
				$_SESSION["sede"] = "".$login[0]->sede;

				if ($_SESSION["rol"] == 'Admin') {
					$_SESSION["adm1"] = "";
					$_SESSION["adm2"] = "";
				} else {
					$_SESSION["adm1"] = "<!--";
					$_SESSION["adm2"] = "-->";
				}
				
				header("location: ctrol_incio.php");
					
			}else{
		
				//echo '<script language="javascript">alert("Combinacion Erronea, Intente de Nuevo");</script>'; 
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
