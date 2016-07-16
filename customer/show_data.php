<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
    session_start();
    if(isset($_SESSION["login"]))
    {
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Bootstrap core CSS -->
    <link href="../Assets/ico/icop.ico" rel="shortcut icon">
    <link href="../Assets/css/bootstrap.css" rel="stylesheet">
    <link href="../Assets/css/style.css" rel="stylesheet">
    <link href="../Assets/css/animate.css" rel="stylesheet">
    
<!-- Estilos para las validaciones con Parsley -->
    <link type="text/css" rel="stylesheet" href="../Assets/css/parsley-custom.css" media="all" />
      
<!-- Estilos para las Select2 -->
    <link type="text/css" rel="stylesheet" href="../Assets/css/select2348/select2.css" rel="stylesheet" />
    
<!-- Alertas pnotify -->   
    <link href="../Assets/css/pnotify.custom.css" rel="stylesheet">
    
    
<!-- Estilos para la segunda libreria de datepicker en boostrap -->
    <link type="text/css" rel="stylesheet" href="../Assets/css/bootstrap-datetimepicker.css" media="all" />

    <link rel="stylesheet" type="text/css" href="../Assets/datatable/css/jquery.dataTables.css">   



<title>.: Ledacom - Servicio :.</title>


</head>

<body>

<!-- Inicio del menu -->
<!-- Inicio del menu -->
<div class="navbar navbar-inverse navbar-fixed-top shadow">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <img src="../Assets/img/logo_nav.png">
    <span style="display:none"><?php echo $_SESSION["login"]; ?></span>
    
    
  </div>
</div>
<!-- FIn del menu -->
<!-- FIn del menu -->


<div class="container">


    <!-- Inicio de header -->
    <header class="row">
        <div class="row fadeIn">
            <div class="col-lg-8">
                <ol class="breadcrumb">

                </ol>
            </div>
            <div class="col-lg-4 text-right">

            </div>
        </div>
    </header>
    <!-- fin de header -->
    


    <!-- INICIO de seccion medio -->
    <section class="row" id="contenido">
    
    
    
    <div class="panel panel-info"> <!--  Inicio PANEL --> 
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-8">
                    <h5><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Orden de Servicios Nro: <?php echo $_SESSION["id"]; ?></h5>
                </div>
            </div>
        </div>
    
		<div class="panel-body"> <!--  Inicio BODY -->
        	<div class="row">
        	<div class="col-lg-4">
            <span class="text-primary">Tipo Servicio: </span><span><?php echo $nro_servicio; ?></span><br>
            <span class="text-primary">Cliente o Empresa: </span><span><?php echo $name; ?></span><br>
            <span class="text-primary">Dirección: </span><span><?php echo $addres; ?></span><br>	
            </div>
            <div class="row col-lg-4">
            <span class="text-primary">Fecha Creación: </span><span><?php echo $date_create; ?></span><br>
            <span class="text-primary">Numero de Id o Nit: </span><span><?php echo $_SESSION["login"]; ?></span><br>
            <span class="text-primary">Tel - Cel: </span><span><?php echo $number; ?></span><br>	
            </div>
            <div class="row col-lg-4">
            <span class="text-primary">Atendido Por: </span><span><?php echo $create_by; ?></span><br>
            <span class="text-primary">Sede: </span><span><?php echo $sede; ?></span><br>
            <span class="text-primary">Email: </span><span><?php echo $email; ?></span><br>	
            </div>
            </div>
            
            <div class="row ">
            	<br>
                <div class="col-lg-12 border_bot">
                </div>
                <br>
            </div>
            
            <div class="row">
        	<div class="col-lg-8">
            <span class="text-primary">Observaciones Cliente: </span><span><?php echo $o_cliente; ?></span><br>
            <span class="text-primary">Observaciones Técnico: </span><span><?php echo $o_tecnico; ?></span><br>
            </div>
            <div class="row col-lg-4">
            <span class="text-primary">Solucion: </span><span><?php echo $o_solucion; ?></span><br>
            <span class="text-primary">Estado: </span><span><?php echo $estado; ?></span><br>
            </div>
            </div>
          
		</div> <!--  Fin BODY -->
        
        <div class="panel-footer">
        	<div class="row">
            <div class="col-lg-8">
                <div class="col-lg-12">
                    
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <a href="ctrol_default.php?estado=1" class="btn btn-danger btn-block btn-sm">Salida Segura</a>
                </div></div>
            </div>
        </div>
        </div>
	</div><!--  FIN PANEL --> 

   


                      
    </section> <!-- FIN de seccion medio -->
</div> <!-- fin del container -->




<!-- Bootstrap scrip -->
    <script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Assets/js/scripts.js"></script> 
    <script language="JavaScript" type="text/javascript" src="../Assets/js/call_section.js"></script>
    
<!-- Script pnotify -->
    <script type="text/javascript" src="../Assets/js/pnotify.custom.js"></script>
    
<!-- Select2 -->
    <script language="JavaScript" type="text/javascript" src="../Assets/css/select2348/select2.js" ></script>
    
<!-- Scripts Necesarios para las validaciones con Parsley -->
    <script type="text/javascript" src="../Assets/js/Parsley/language/js/messages.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../Assets/js/Parsley/minificados/js/parsley.min.js" charset="UTF-8"></script>
    
<!-- Scripts necesarios para la segunda libreria de datepicker -->
    <script type="text/javascript" src="../Assets/js/Moment/js/moment-with-langs.min.js"></script>
    <script type="text/javascript" src="../Assets/js/Bootstrap-DatePicker/js/bootstrap-datetimepicker.min.js" charset="UTF-8">               
    </script>
        
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="../Assets/datatable/js/jquery.dataTables.js"></script>       
    
    <script type="text/javascript">
    

    </script>




</body>
</html> 

<?php
}
else{
    header('location:ctrol_default.php');}
?>






