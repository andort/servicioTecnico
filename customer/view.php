<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Bootstrap core CSS -->
	<link href="../Assets/ico/icop.ico" rel="shortcut icon">
    <link href="../Assets/css/bootstrap.css" rel="stylesheet">
    
<!-- Estilos para las validaciones con Parsley -->
      <link type="text/css" rel="stylesheet" href="../Assets/css/parsley-custom.css" media="all" />
    
<!-- Alertas pnotify -->   
    <link href="../Assets/css/pnotify.custom.css" rel="stylesheet">
    <link href="../Assets/css/style.css" rel="stylesheet">
    <link href="../Assets/css/animate.css" rel="stylesheet">
    

    

<title>.: Ledacon Distribuidor :.</title>

</head>

<body>

	<!-- Inicio Contaner -->
    <!-- Inicio Contaner -->
    <div class="container vertical-space">
    
    	
    	<div class="row"><!-- INICIO TODO -->
            <div class="col-lg-2"></div>
            <div class="col-lg-8"> <!-- INICIO CAJA QUE CONTIENE TODO -->
            
            	<div class="row"><!-- INICIO TODO LO GRAFICO -->
                    <div class="col-lg-12 text-center">
                    	<img src="../Assets/img/logo-400.png" class="animated fadeInDown" />
                    </div>
            	</div><!-- FIN IMG -->
                
                <div class="row"><br><br></div><!-- FIN LINE -->
                
				<div class="row"><!-- INICIO FORM -->

                    <div class="col-lg-6 text-center login shadow">
                        <img src="../Assets/img/key.png" class="animated flipInX"  />
                    </div>

                    <div class="col-lg-6">
                    <form id="form1" role="form" method="post">                    
                        <div class="form-group">
                        <div class="col-lg-12">
                        <input type="text" class="form-control input-sm" id="txtNro" name="txtNro" placeholder="Numero de Servicio" parsley-required="true">
                        </div></div>
                        
                        <div class="form-group">
                        <div class="col-lg-12">
                        <input type="text" class="form-control input-sm" id="txtId" name="txtId" placeholder="Numero Id o Nit" parsley-required="true">
                        </div></div>
                        
                        <div class="form-group">
                        <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-sm btn-block" name="btnEnviar">Ingresar</button>
                        </div></div>
                    </form>
                    </div><!-- FIN coll de 12 -->

				</div> <!-- FIN FORM -->
            
            
    		</div><!-- INICIO TODO LO GRAFICO -->
      		<div class="col-lg-2"></div>
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

<!-- Scripts Necesarios para las validaciones con Parsley -->
    <script type="text/javascript" src="../Assets/js/Parsley/language/js/messages.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../Assets/js/Parsley/minificados/js/parsley.min.js" charset="UTF-8"></script>
    
    <!-- Script  -->
    <script type="text/javascript" src="../Assets/js/llamar.js"></script>
    

    <!-- Script funciones -->
	<script>
	
	//valida con parsley
    $('#form1').parsley();

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
