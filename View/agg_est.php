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
      
<!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../Assets/datatable/css/jquery.dataTables.css">      


<title>.: Ledacom - Servicio :.</title>


</head>

<body>

<!-- Inicio del menu -->
<!-- Inicio del menu -->
<div class="navbar navbar-inverse navbar-fixed-top shadow">
    <?php require_once "../View/m.php";?>
</div>
<!-- FIn del menu -->
<!-- FIn del menu -->


<div class="container">


    <!-- Inicio de header -->
    <header class="row">
        <div class="row fadeIn">
            <div class="col-lg-8">
                <ol class="breadcrumb"> 
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Admin</a></li>
                  <li class="active">CRUD Varios</li>
                </ol>
            </div>
            <div class="col-lg-4 text-right">

            </div>
        </div>
    </header>
    <!-- fin de header -->
    


    <!-- INICIO de seccion medio -->
    <section class="row" id="contenido">
    
    
    <!-- INICIO PANEL DATOS CLIENTES -->
    <div class="panel panel-info">
    <div class="panel-heading small">
        <div class="row small">
            <div class="form-group small">
            <div class="col-lg-12 small">
            <h5><span class="glyphicon glyphicon-user"></span>&nbsp;Gestión Estados</h5>
            </div></div>
        </div>
    </div>
    
    <div class="panel-body"> <!--  Inicio BODY -->   
            
        <!--  INGRESO DE ESTADOS PARA LOS SERVICIOS -->
        <div class="row">
        
        <div class="col-lg-4">
        <div class="panel panel-info">
        <div class="panel-body">
            <form id="form1" role="form" method="post" data-parsley-validate>
            <div class="form-group text-center">
            <div class="col-lg-12">
                <span>Ingrese o Modifique Estado de Servicios</span>
            </div></div>
            
            <div class="form-group">
            <div class="col-lg-12">
                <input type="text" name="txtId0" style="display:none" value='<?php echo $txtId0 ?>'>
                <input type="text" class="form-control input-sm" name="txtName0" placeholder="Nombre Estado" parsley-required="true" value='<?php echo $txtName0 ?>' parsley-required="true">
            </div></div>
            
            <div class="form-group">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success btn-sm btn-block" name="btnEnv0" <?php echo $btnEnv0; ?>>Guardar</button>
                <button type="submit" class="btn btn-warning btn-sm btn-block" name="btnMod0" <?php echo $btnMod0; ?>>Modificar</button>
            </div></div>
            </form>
        </div>
        </div>
        </div>
        <!--  FIN DE INGRESO DE ESTADOS PARA LOS SERVICIOS -->
        
        <!--  MUESTRA TABLE CON ESTADOS PARA LOS SERVICIOS -->
        <div class="col-lg-8 table-responsive"> 
        <div class="panel panel-info">
        <div class="panel-body">              
            <table id="table_0" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="small">Id</th>
                <th class="small">Nombre Estado</th>
                <th class="small text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $listar0;?>
            </tbody>
            </table>
        </div>
        </div>
        </div>
        <!--  FIN TABLE CON ESTADOS PARA LOS SERVICIOS -->   
        </div> 
        
         
        
        <!--  INGRESO DE ESTADOS PARA LOS SERVICIOS -->
        <!--  INGRESO DE ESTADOS PARA LOS SERVICIOS -->
        <div class="row">
        <div class="col-lg-4">
        <div class="panel panel-info">
        <div class="panel-body">
            <form id="form2" role="form" method="post" data-parsley-validate>
            <div class="form-group text-center">
            <div class="col-lg-12">
                <span>Ingrese o Modifique Estado de Artículos</span>
            </div></div>
            <div class="form-group">
            <div class="col-lg-12">
                <input type="text" name="txtId" style="display:none" value='<?php echo $txtId1 ?>'>
                <input type="text" class="form-control input-sm" name="txtName" placeholder="Nombre Estado" parsley-required="true" value='<?php echo $txtName1 ?>' parsley-required="true">
            </div></div>
            
            <div class="form-group">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-success btn-sm btn-block" name="btnEnv" <?php echo $btnEnv1; ?>>Guardar</button>
                <button type="submit" class="btn btn-warning btn-sm btn-block" name="btnMod" <?php echo $btnMod1; ?>>Modificar</button>
            </div></div>
            </form>
        </div>
        </div>
        </div>
        <!--  FIN DE INGRESO DE ESTADOS PARA LOS SERVICIOS -->
        
        <!--  MUESTRA TABLE CON ESTADOS PARA LOS SERVICIOS -->
        <div class="col-lg-8 table-responsive"> 
        <div class="panel panel-info">
        <div class="panel-body">              
            <table id="table_1" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="small">Id</th>
                <th class="small">Nombre Estado</th>
                <th class="small text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $listar1;?>
            </tbody>
            </table>
        </div>
        </div>
        </div>
        <!--  FIN TABLE CON ESTADOS PARA LOS SERVICIOS -->
        <!--  FIN TABLE CON ESTADOS PARA LOS SERVICIOS --> 
        </div>    
          
    </div>              
    </div> <!-- Fin menu colapse-->  
    
    
    
              
    </section>
    <!-- FIN de seccion medio -->
    
</div><!-- fin del container -->


<!-- Bootstrap scrip -->
    <script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Assets/js/scripts.js"></script> 
    
<!-- Script pnotify -->
    <script type="text/javascript" src="../Assets/js/pnotify.custom.js"></script>
     
<!-- Scripts Necesarios para las validaciones con Parsley -->
    <script type="text/javascript" src="../Assets/js/Parsley/language/js/messages.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../Assets/js/Parsley/minificados/js/parsley.min.js" charset="UTF-8"></script>
    
<!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="../Assets/datatable/js/jquery.dataTables.js"></script>     
    
<!-- Scripts necesarios para la segunda libreria de datepicker -->
    <script type="text/javascript" src="../Assets/js/Moment/js/moment-with-langs.min.js"></script>
    <script type="text/javascript" src="../Assets/js/Bootstrap-DatePicker/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

<!-- Pnotify scrip -->    
    <script language="JavaScript" type="text/javascript" src="../Assets/css/pnotify/jquery.pnotify.js"></script>
    
    
    
    <script type="text/javascript">

		
	//valida con parsley
	$('#form1').parsley();
	
	$('#form2').parsley();


	//Funcion datateble
	$(document).ready( function () {
    $('#table_0').DataTable({
		paging: false,
		"order": [[ 0, "asc" ]],
		
		});
		
		$('#table_1').DataTable({
		paging: false,
		"order": [[ 0, "asc" ]],
		
		});
	});
	
	
	//Funcion DATAPICKER
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
    header('location:../Controller/ctrol_login.php');}
?>






