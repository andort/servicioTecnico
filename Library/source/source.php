<?php
$user = array(
	array(
    "user" => "andort",
    "pass" => "and1234",
	"name" => "Andres",
	"lname" => "Ortiz",
	"rol" => "1",
	"email" => "afortiz081@misena.edu.co"
		),
	array(
	"user" => "marres",
    "pass" => "mar1234",
	"name" => "Maritza",
	"lname" => "Restrepo",
	"rol" => "2",
	"email" => "myro18@misena.edu.co"
		),
	array(
	"user" => "karper",
    "pass" => "kar1234",
	"name" => "Karen",
	"lname" => "Perez",
	"rol" => "1",
	"email" => "keperez6@misena.edu.co"
		)
	);
	
	$menu = array(
	array("rol" => "1", "url" => "#", "nombre" => "CRUD Clientes"),
	array("rol" => "1", "url" => "#", "nombre" => "CRUD Servicio"),
	array("rol" => "1", "url" => "#", "nombre" => "CRUD Gtia. Proveedor"),
	array("rol" => "1", "url" => "#", "nombre" => "CRUD Usuarios"),	
	);
	

//var_dump($user);
	$login = "";
	
		$res = false;
		foreach($user as $value){
			if($value["user"] == $_POST["user"] && $value["pass"] == $_POST["pass"]){
				$login .= "Bienvenid@: ".$value["name"]." ".$value["lname"];
				
				$menu2 = "";
				$namemenu = "";
				
				foreach($menu as $value2){
					if($value2["rol"] == $value['rol']){
						$menu2 .= "<li><a href='".$value2["url"]."'>".$value2["nombre"]."</a></li>";

					}
				}
				if($menu2 != ""){
					  $namemenu .= '<ul id="m_admin" class="nav navbar-nav navbar-right"><li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
					  <b class="caret"></b></a><ul class="dropdown-menu">'.$menu2."</ul></li></ul>";
				}
				
				$res = true;
				echo "si";
				session_start();
				$_SESSION["menufin"] = $namemenu;
				$_SESSION["login"] = $login;

			}
		} 
		if($res == false){
			echo "no";
		}

?>

