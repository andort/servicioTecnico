<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Bootstrap core CSS -->
	<link href="../Assets/ico/icop.ico" rel="shortcut icon">
    <link href="../Assets/css/bootstrap.css" rel="stylesheet">
    <!-- Alertas pnotify -->   
    <link href="../Assets/css/pnotify.custom.css" rel="stylesheet">
    <link href="../Assets/css/style.css" rel="stylesheet">
    <link href="../Assets/css/animate.css" rel="stylesheet">
    

    

<title>.: Login :.</title>

</head>

<body>

	<!-- Inicio Contaner -->
    <!-- Inicio Contaner -->
    <div class="container vertical-space">
    
    	
    	<div class="row fadeInRight"><!-- INICIO TODO -->
            <div class="col-lg-3"></div>
            <div class="col-lg-6 login shadow"> <!-- INICIO CAJA QUE CONTIENE TODO -->
            
            	<div class="row"><!-- INICIO IMG -->
                    <div class="col-lg-12 text-center">
                    	<img src="../Assets/img/logo-400.png" class="animated fadeInDown" />
                    </div>
            	</div><!-- FIN IMG -->
                
                <div class="row"><!-- INICIO LINE -->
                	<div class="col-lg-1"></div>
                	<div class="col-lg-10 border_line"></div>
                    <div class="col-lg-1"></div>
            	</div><!-- FIN LINE -->
                
                
                <div class="row"><!-- INICIO FORM -->
                	<div class="col-lg-12"><!-- INICIO coll de 12 -->
                    	<form id="Validar" method="post">
                        
                        <div class="row"><!-- INICIO Imagen y 2 campos -->
                        	<div class="col-lg-1">
                            </div>
                			<div class="col-lg-3 text-center">
                            	<img src="../Assets/img/key.png" class="animated flipInX"  />
                            </div>

                			<div class="col-lg-7">
                            	<div class="form-group">
                                <input type="User" class="form-control input-sm" id="user" name="user" placeholder="Usuario" 
                                required>
                              	</div>
                              	<div class="form-group">
                                <input type="password" class="form-control input-sm" id="pass" name="pass" placeholder=
                                "Password" required>
                              	</div>
                            </div>
                            <div class="col-lg-1">
                            </div>
                        </div><!-- FIN Imagen y 2 campos -->
                        
                        <div class="row"><!-- INICIO Boton y recuerdame -->

                			<div class="col-lg-4"></div>

                			<div class="col-lg-3">
                            	<div class="checkbox">
                                <label>
                                  <input type="checkbox"> <span>Recordarme</span>
                                </label>
                              	</div>
                            </div>
                            
                            <div class="col-lg-4 text-right">
                              	<div class="form-group">
                                
                                  <button type="submit" class="btn btn-primary btn-sm btn-block" name="btnEnviar" />Ingresar</button>
                              </div>
                          </div>                        

                        </div> <!-- FIN Boton y recuerdame -->
                        
                        </form>
                    </div><!-- FIN coll de 12 -->
            	</div><!-- FIN FORM -->
            
            
            </div> <!-- FIN CAJA QUE CONTIENE TODO -->
            <div class="col-lg-3"></div>
    	</div><!-- FIN TODO -->
      

    </div>
    <!-- Fin Contaner -->
    <!-- Fin Contaner -->
    
    
    <!-- Script´s -->
	<script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../Assets/js/scripts.js"></script>

    <!-- Script pnotify -->
    <script type="text/javascript" src="../Assets/js/pnotify.custom.js"></script>
    
    <!-- Script  -->
    <script type="text/javascript" src="../Assets/js/llamar.js"></script>
    

    <!-- Script funciones -->
	<script>


	</script>

	
    

     

</body>

</html>
<?php 
    if (isset($_GET["estado"])){
		session_start();
    	session_destroy();
    	unset($_GET["estado"]);
    }
    
    ?>
