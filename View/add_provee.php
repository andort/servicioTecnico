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
    <?php 
        require_once "../View/m.php";
    ?>
</div>
<!-- FIn del menu -->
<!-- FIn del menu -->


<div class="container">


    <!-- Inicio de header -->
    <header class="row">
        <div class="row fadeIn">
            <div class="col-lg-8">
                <ol class="breadcrumb">
                  <li><a href="ctrol_incio.php">Home</a></li>
                  <li><a href="#">Proveedor</a></li>
                  <li class="active">Ingresar o Modificar Proveedor</li>
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
    
    <div class="panel-heading small">
        <div class="row small">
            <div class="form-group small">
            <div class="col-lg-12 small">
            <h5><span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;Ingreso de Proveedores</h5>
            </div></div>
        </div>
    </div>
    
    <div class="panel-body"> <!--  Inicio BODY -->   
            
        <!--  DATOS CLIENTE -->
            
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="15" placeholder="Codigo" parsley-required="true" name="txtCod" id="txtCod" value='<?php echo $txtCod1 ?>'>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="15" placeholder="Nit" name="txtNit" parsley-required="true" value='<?php echo $txtNit1 ?>'>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="30" placeholder="Nombre Empresa" name="txtName" parsley-required="true" value='<?php echo $txtName1 ?>'>
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="15" placeholder="Telefono" name="txtTel" parsley-required="true" value='<?php echo $txtTel1 ?>'>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="10" placeholder="Movil" name="txtMovil"  parsley-required="true" value='<?php echo $txtMovil1 ?>'>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Email" name="txtEmail" parsley-required="true" value='<?php echo $txtEmail1 ?>'>
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="30" placeholder="Nombre Contácto 1" name="txtN1" parsley-required="true" value='<?php echo $txtN11 ?>'>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="30" placeholder="Nombre Contácto 2" name="txtN2" parsley-required="true" value='<?php echo $txtN21 ?>'>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" maxlength="15" placeholder="Ciudad" name="txtCiudad" parsley-required="true" value='<?php echo $txtCiudad1 ?>'>
                </div></div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Dirección" name="txtAdd" parsley-required="true" value='<?php echo $txtAdd1 ?>'>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                
                </div></div>
            </div>

        </div>
            
    </div> <!--  Fin BODY -->  <!--  Fin BODY -->
    
    <div class="panel-footer">

        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                <div class="col-lg-12">
                    <div id="resultado"></div>
                </div></div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <button type="submit" class="btn btn-success btn-sm btn-block" name="btnEnviar" id="btnEnviar" <?php echo $btnEnviar1; ?>>Guardar</button>
                <button type="submit" class="btn btn-warning btn-sm btn-block" name="btnModifi" <?php echo $btnModifi1; ?>>Modificar</button>
                </div></div>
            </div>
        </div>


    </div>
    
    </div>
    <!-- FIN PANEL DATOS CLIENTES -->
    </form>
    
    
    <div class="panel panel-info">
    <div class="panel-body"> <!--  Inicio BODY -->   
            
                 
            <!-- Table -->
            <div class="table-responsive">
              <table id="table_id" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="small">Código</th>
                    <th class="small">Nombre Empresa</th>
                    <th class="small">Nit</th>
                    <th class="small">Nombres Conctacto</th>            
                    <th class="small">Telefono</th>
                    <th class="small">Movil</th>
                    <th class="small">Email</th>
                    <th class="small">Opción</th>               
                  </tr>
                </thead>
                <tbody>
                    <?php echo $listar;?>
                </tbody>
              </table>
            </div>
            <!-- Fin Table 01 -->
            
     </div> <!--  Fin BODY --> 
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
    
<!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="../Assets/datatable/js/jquery.dataTables.js"></script>       
    
    <script type="text/javascript">
    
    //validar con parsley
    $('#form1').parsley();
	
	
	
	//para validar que la id no exista
    $(document).ready(function() {
        $('#txtCod').focusout(function(){
            if($('#txtCod').val() != ""){
				$.ajax({
					type:"POST",
					url:"../Model/val_prov.php",
					data: 'txtCod='+$('#txtCod').val(),
					success: function(data){
						//$("#resultado").html(data);
                        if (data == 2) {
                            //$("#resultado").html("<div class='alert alert-success text-center' role='alert'>continue</div>");
                            $("#btnEnviar").removeAttr("disabled");
                            new PNotify({
                                title: 'Dato Correcto',
                                text: 'Dato Correcto, Continue',
                                type: 'info',
                                shadow: false});
                        };
                        if (data == 1) {
                            //$("#resultado").html("<div class='alert alert-danger text-center' role='alert'>Numero ID Invalido</div>");
                            $("#btnEnviar").attr("disabled",true);
                            new PNotify({
                                title: 'Error',
                                text: 'Datos Incorrectos o ya Existe en el Sistema',
                                type: 'error',
                                shadow: false});

                        };
						}
					});
				}
			});
    });
	
	
	
	


    //funcion para mostar o esconder div de formulario
    function mostrar (){
     if(($("#remove").css("display")== 'none')){
         $("#remove").css("display","block");
         }else{
             $("#remove").css("display","none");
             }
        }

    //Funcion datateble
    $(document).ready( function () {
    $('#table_id').DataTable({
        paging: true,
        "order": [[ 0, "asc" ]],
        "language": {

            "info": "Mostrando Página _PAGE_ de _PAGES_",

        }
		
		});
	});

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




