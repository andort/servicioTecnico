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
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Library</a></li>
                  <li class="active">Data</li>
                </ol>
            </div>
            <div class="col-lg-4 text-right">

            </div>
        </div>
    </header>
    <!-- fin de header -->
    


    <!-- INICIO de seccion medio -->
    <section class="row" id="contenido">
    
    <form id="form1" role="form" method="post">
    
    
    <!-- INICIO PANEL DATOS CLIENTES -->
    <div class="panel panel-info">
    <div class="panel-body"> <!--  Inicio BODY -->   
            
        <!--  DATOS CLIENTE -->
            
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <h5><span class="glyphicon glyphicon-user"></span>&nbsp;Datos Cliente</h5>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Nro. Identidad" name="txtId" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Nombres" name="txtName" parsley-required="true">
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Apellidos" name="txtLname" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="email" class="form-control input-sm" placeholder="Email" name="txtEmail" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Telefono" name="txtTel" parsley-required="">
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Celular" name="txtCel" parsley-required="">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Dirección" name="txtDirec" parsley-required="">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <label class="checkbox-inline">
                <input type="checkbox" id="cbox01" onchange="mostrar()" value="option1">Pertenece a Empresa
                </label>
                </div></div>
            </div>
        </div>
        
        <div id="remove" hidden="">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <h5><span class="glyphicon glyphicon-user"></span>&nbsp;Datos Empresa</h5>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="NIT" name="txtEnit" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Nombre Empresa" name="txtEname" parsley-required="true">
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Telefono" name="txtEtel" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Dirección" name="txtEdirec" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Email" name="txtEemail" parsley-required="true">
                </div></div>
            </div>
        </div>
        </div>
        
     
            
     </div>
    </div>
    <!-- FIN PANEL DATOS CLIENTES -->
    
    
    <div class="panel panel-info">
    <div class="panel-body"> <!--  Inicio BODY -->   
            
        <!--  DATOS servicio -->
            
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <h5><span class="glyphicon glyphicon-briefcase"></span>&nbsp;Datos Servicio</h5>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <select  type="text" class="form-control input-sm" placeholder="Ingrese Articulo" name="txtArt" parsley-required="true">
                <option>Seleccionar Articulo...</option>
                <?php echo $combo_art?>
                </select>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <select  type="text" class="form-control input-sm" placeholder="Ingrese Marca" name="txtMarca" parsley-required="true">
                <option>Seleccionar Marca...</option>
                <?php echo $combo_mar?>
                </select>
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Ingrese Serial" name="txtSerial" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="email" class="form-control input-sm" placeholder="Ingrese Nro. Factura" name="txtNfac" parsley-required="true">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Ingrese Fecha de Factura" name="txtFfac" parsley-required="">
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Ingrese Valor Articulo" name="txtVart" parsley-required="">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Ingrese Codigo Proovedor" name="txtCproo" parsley-required="">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Ingrese Fecha Proovedor" name="txtFcproo" parsley-required="">
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <div class="col-lg-12">
                <textarea class="form-control input-sm" rows="6" placeholder="Observaciones del Cliente" name="txtOcliente" style="resize:none;"></textarea>
                </div></div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <div class="col-lg-12">
                <textarea class="form-control input-sm" rows="6" placeholder="Descripcion Articulo" name="txtDart" style="resize:none;"></textarea>
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <!--<input  type="text" class="form-control input-sm" placeholder="Usuario" name="txtUser" parsley-required=""> -->
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <!--<input  type="password" class="form-control input-sm" placeholder="Pass" name="txtPass" parsley-required=""> -->
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <button type="submit" class="btn btn-success btn-block" name="btnEnviar" id="btnEnviar" name="btnEnviar">Guardar</button>
                </div></div>
            </div>
        </div>
            
     </div> 
    </div>
    <!--  Fin servicio --> 
    
    
    </form>
                      
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
    
    $('tr').attr("onclick","alert('hola')");
    $('tr').attr("onmouseover","this.style.cursor='pointer'");
    
	});
	
	
	//valida con parsley
	function Validar_Parsley(div) {

            if ($('#' + div).parsley('validate')) {
                return true;
            } else {
                return false;
            }

        }


	//funcion para mostar o esconder div de formulario
 	function mostrar (){
	 if(($("#remove").css("display")== 'none')){
		 $("#remove").css("display","block");
		 }else{
			 $("#remove").css("display","none");
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
    header('location:../Controller/ctrol_login.php');}
?>






