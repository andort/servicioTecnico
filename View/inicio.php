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
    
<!-- Alertas pnotify -->   
    <link href="../Assets/css/pnotify.custom.css" rel="stylesheet">
    
    
<!-- Estilos para la segunda libreria de datepicker en boostrap -->
      <link type="text/css" rel="stylesheet" href="../Assets/css/bootstrap-datetimepicker.css" media="all" />


<title>.: Ledacom - Servicio :.</title>


</head>

<body>

<!-- Inicio del menu -->
<!-- Inicio del menu -->
<div class="navbar navbar-inverse navbar-fixed-top shadow">
  <?php require_once "../View/m.php"; ?>
</div>
<!-- FIn del menu -->
<!-- FIn del menu -->


<div class="container">


  <!-- Inicio de header -->
    <header class="row">
      <div class="row fadeIn">
            <div class="col-lg-8">
              <ol class="breadcrumb">
                  <li class="active">Inicio</a></li>
                </ol>
            </div>
            <div class="col-lg-4 text-right">

            </div>
        </div>
    </header>
    <!-- fin de header -->
    


    <!-- INICIO de seccion medio -->
    <section class="row" id="contenido">
    
    <div class="row"><!-- inicio tabla -->
    <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-body clsPerPanelBody"> <!-- por defecto - panel contenido -->

    <div class="col-lg-12">
      <p class="font-title-home01"><b>Portal Web Ledacom,</b> Para la gestión de gantías y servicio técnico</p>
    </div><br /><br /><br />

    <form id="" method="post">
    <div class="col-lg-6 top-border">
      <div class="panel panel-default">
        <div class="panel-body">
          <span>Para ingresar una Garantía</span><br /><br />
          <!-- <button type="submit" id="btnGtia" class="btn btn-info btn-block">INGRESAR GARANTÍA</button> -->
          <a class="btn btn-info btn-block" href="ctrol_add_gtia.php">INGRESAR GARANTÍA</a>
          
        </div>
      </div>
    </div>

    <div class="col-lg-6 top-border">
      <div class="panel panel-default">
        <div class="panel-body">
          <span>Para ingresar un servicio técnico</span><br /><br />
          <a class="btn btn-warning btn-block" href="ctrol_add_serv.php">INGRESAR SERVICIO TÉCNICO</a>
        </div>
      </div>
    </div>
    </form>                
                
        
      
         <!--  Fin linea Servicio--> 
     </div>
     </div>
     </div>  
    </div>
                      
    </section>
    <!-- FIN de seccion medio -->



</div><!-- fin del container -->


<!-- Bootstrap scrip -->
  <script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Assets/js/scripts.js"></script> 
    <script language="JavaScript" type="text/javascript" src="../Assets/js/call_section.js"></script>
    
<!-- Script pnotify -->
    <script type="text/javascript" src="../Assets/js/pnotify.custom.js"></script>
     
<!-- Scripts Necesarios para las validaciones con Parsley -->
    <script type="text/javascript" src="../Assets/js/Parsley/language/js/messages.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../Assets/js/Parsley/minificados/js/parsley.min.js" charset="UTF-8"></script>
    
    
    
    <script type="text/javascript">
  
  //funcion para el link de las tablas, luego quitar
  $(document).ready(function(){
  
	
	});
	
	
	//valida con parsley
	function Validar_Parsley(div) {

            if ($('#' + div).parsley('validate')) {
                return true;
            } else {
                return false;
            }

        }


</script>


<!-- Scripts necesarios para la segunda libreria de datepicker -->
	<script type="text/javascript" src="../Assets/js/Moment/js/moment-with-langs.min.js"></script>
    <script type="text/javascript" src="../Assets/js/Bootstrap-DatePicker/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

	<script type="text/javascript">
        $(function () {
    
            $('#txtfecha1').datetimepicker({
    
            pickDate: true,                 //en/disables the date picker
            pickTime: false,                 //en/disables the time picker
            language:'es' ,                 //sets language locale
            useMinutes: true,               //en/disables the minutes picker
            useSeconds: true,               //en/disables the seconds picker
            minuteStepping:1,               //set the minute stepping
            format:'dddd/ MM/ DD'
    
            });
    
        });
    </script>


</body>
</html>	

<?php
}
else{
    header('location:../Controller/ctrol_login.php');
	}
?>






