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
      

<!-- Estilos para las Select2 -->
    <link type="text/css" rel="stylesheet" href="../Assets/css/select2348/select2.css" rel="stylesheet" />

<title>.: Ledacom - Gtias por pagar por proveedor :.</title>


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
                  <li><a href="#">Inicio</a></li>
                  <li class="active">Proveedor</li>
                   <li class="active">Gestión Gtias por Pagar del Proveedor</li>
                </ol>
            </div>
            <div class="col-lg-4 text-right">

            </div>
        </div>
    </header>
    <!-- fin de header -->
    


    <!-- INICIO de seccion medio -->
    <section class="row" id="contenido">
    
    
    
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-8">
                    <h5><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;Gtias Pendientes por pagar del  Proveedor</h5>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12 class_topborder">
                
                </div></div>
            </div>
            </div>
        </div>
   
    <!--  Fin servicio --> 
    

		<!--  Inicio BODY -->  
        <!--  Inicio BODY -->  
		<div class="panel-body">  
            
            
		<div class="row">
        	<form id="form1" role="form" method="post">
            <div class="col-lg-8">
                <div class="panel panel-info">
                <div class="panel-body class_padding">
                	
                	<div class="col-lg-6">
                    <div class="form-group">
                        <select type="text" class="btn-block" name="txtProv" id="txtProv" parsley-required="true">
                        <option value="">Seleccione Proveedor...</option>
                        <?php echo $combo_Prov?>
                        </select>
                    </div>
                	</div>

                	<div class="col-lg-6">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success input-sm btn-block " id="btnBuscar" name="btnBuscar">Buscar</button>                        
                    </div>
           			</div>
                    
                </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!--<div class="panel panel-primary">
                <div class="panel-body class_padding">
                    <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary input-sm btn-block" id="btnRep" name="btnRep">Generar Reporte</button>                        
                    </div>
                    </div>
                </div>
                </div>-->
            </div>
        </form>
        </div>
        
            
            
    
        <!-- Table -->
        <div class="table-responsive">
          <table id="table_id" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="small">Nro</th>
                <th class="small">Prov y Fecha</th>
                <th class="small">Fecha envio a proveedor</th>
                <th class="small">Artículo</th>
                <th class="small">Marca y Ref.</th>
                <th class="small">Serial</th>
                <!-- <th class="small">Observación Tecnico</th> -->
                <th class="small center">Opcion</th>
              </tr>
            </thead>
            <tbody>
                <?php echo $listar;?>
            </tbody>
          </table>
        </div>
          
        </div>
        </div> 

                      
    </section> <!-- FIN de seccion medio -->
</div> <!-- fin del container -->



<!-- INICIO Modal SOLUCION GARANTIAS RESPUESTAS POR EL PROVEEDOR -->
<!-- INICIO Modal SOLUCION GARANTIAS RESPUESTAS POR EL PROVEEDOR -->
 <div class="modal fade" id="modal_solucionGtiasProv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="form1" role="form" method="post">
      <div class="modal-lg">
        <div class="modal-content">
          <div class="modal-body">

            

            <div class="panel panel-primary"> <!--  Inicio PANEL --> 
            <div class="panel-heading small">
                <div class="row class_topborder">
                <div class="col-lg-4">
                    <h5><span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Garantia pendiente por pagar</h5>
                </div>
                <div class="col-lg-4 text-right">
                    <h5>&nbsp;Numero Articulo.</h5>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <input  type="text" class="form-control input-sm" name="txt_id" id="txt_id" readonly="readonly">
                    </div>
                </div>
                </div>
                
        

                <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    <input  type="text" class="form-control input-sm" name="txt_articulo" id="txt_articulo" readonly="readonly">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <input  type="text" class="form-control input-sm" name="txt_marca_articulo" id="txt_marca_articulo" readonly="readonly">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <input  type="text" class="form-control input-sm" name="txt_serial" id="txt_serial" readonly="readonly">
                    </div>
                </div>
            </div>

            </div> <!--  FIN PANEL HEADER --> 
            
            <div class="panel-body"> <!--  Inicio BODY --> 

                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                        <textarea class="form-control input-sm" rows="7" id="txt_fecha_envio" readonly="readonly" style="resize:none;"></textarea>
                        </div>
                    </div>
    
                    <div class="col-lg-4">
                        <div class="form-group">
                        <textarea class="form-control input-sm" rows="7" id="txt_valor" readonly="readonly" style="resize:none;"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-4">
                    
                    <div class="form-group">
                    <textarea class="form-control input-sm" rows="2" name="txt_solucion"  id="txt_solucion" placeholder="Comentario Solución..." style="resize:none;" parsley-required="true"></textarea>
                    </div>

                    <div class="form-group">
                    <textarea class="form-control input-sm" rows="2" name="txt_problema"  id="txt_problema" placeholder="Comentario Solución..." style="resize:none;" parsley-required="true"></textarea>
                    </div>
                    
                    <div class="form-group">
                    <select  type="text" class="form-control input-sm" placeholder="Seleccionar" name="txtRol" id="txtRol" parsley-required="true">
                            <option value="">Seleccione Nuevo Estado...</option>;
                            <?php echo $combo_Estado ?>
                    </select>
                    </div>                  

                    </div>
                </div>

            </div> <!--  FIN BODY -->
            
            <div class="panel-footer"><!--  INICIO FOOTER -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <button type="button" class="btn btn-danger btn-sm btn-block" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm btn-block" name="btnEnviar" id="btnEnv">Solucion Servicio</button>
                    </div>
                </div>
            </div> 
            
            </div> <!--  FIN FOOTER -->
            </div> <!--  FIN PANEL --> 
                
               

            </div>
        </div>
      </div>
    </form>
</div>
<!-- FIN Modal SOLUCION GARANTIAS RESPUESTAS POR EL PROVEEDOR -->
<!-- FIN Modal SOLUCION GARANTIAS RESPUESTAS POR EL PROVEEDOR -->






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
    
        
<!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="../Assets/datatable/js/jquery.dataTables.js"></script>       
    
    <script type="text/javascript">
	
	
	//valida con parsley
    $('#form1').parsley();
	
	
    
    //funcion para el Select2 -----------------------------------------------
    
    //Select Identificacion Cliente
    $(document).ready(function() {
        $("#txtId").select2 ({
        minimumInputLength :  3 });
        //función del DataTable
        $("#table_id").DataTable({pagign: true, "order":[[0,"asc"]]});


        //con esta opcion pueden habilitar los campos para habilitar segun el combobox seleccionado.
        // $('#txtServ').change(function(){
        //    ' var seleccion =' $('#txtServ').val();
        //     if(seleccion == 4){
        //         $('#txtServ').enabled('false');
                    
        //     }
        // });

        // alert($('#txtServ').val());
    });
    
    //Select Servicio
    $(document).ready(function() {
        $("#txtServ").select2 ({
         });
    });
    
    //Select Proveedor
    $(document).ready(function() {
        $("#txtProv").select2 ({
         });
    });
    
    
    //Select Fecha Proveedor
    $(document).ready(function() {
        $("#txtProv").select2 ({
         });
    });
    
    //Select Artículo
    $(document).ready(function() {
        $("#txtArt").select2 ({
        minimumInputLength :  2 });
    });
    
    //Select Marca
    $(document).ready(function() {
        $("#txtMarca").select2 ({
        minimumInputLength :  2 });
    });
    
    //Select Referencia
    $(document).ready(function() {
        $("#txtRef").select2 ({
        minimumInputLength :  2 });
    });
    
    //---------------------------------------------------------------------//
    


    //funcion para llevar los datos al modal
    function llevar_datos_modal(id, articulo, marca_articulo, referencia, serial, fecha_envio, valor, solucion, problema){
        $("#txt_id").val(id);
        $("#txt_articulo").val(articulo);
        $("#txt_marca_articulo").val(marca_articulo);
        $("#txt_referencia").val(referencia);
        $("#txt_serial").val(serial);
        $("#txt_fecha_envio").val(fecha_envio);
        $("#txt_valor").val(valor);
        $("#txt_solucion").val(solucion);
        $("#txt_problema").val(problema);
    }



    
    //valida con parsley
    function Validar_Parsley(div) {
            if ($('#' + div).parsley('validate')) {
                return true;
            } else {
                return false;
            }
        }



    //funcion para Traer Datos De llos Clientes
    function DatosCliente(){
     if(($("#remove").css("display")== 'none')){
         $("#remove").css("display","block");
         }else{
             $("#remove").css("display","none");
             }
        }

    //funcion para datetimepicker
    $(function () {
    
            $('#txtfecha1').datetimepicker({
    
            pickDate: true,                 //en/disables the date picker
            pickTime: false,                //en/disables the time picker
            language:'es' ,                 //sets language locale
            useMinutes: true,               //en/disables the minutes picker
            useSeconds: true,               //en/disables the seconds picker
            minuteStepping:1,               //set the minute stepping
            format:'dddd/ MM/ DD'
    
            });
    
        });
    
    
    //Funcion para traer los campos de los usuarios
    function DatosClientes(){
        $.ajax({
            type:'post',
            dataType:'json',
            url:'ctrol_data_for_serv.php',
            data:{
              'txtId':$('#txtId option:selected').val()
            }
          }).done(function(preload_data){
            $('#txtName').val(preload_data.result[0].txtName)
            $('#txtEmail').val(preload_data.result[0].txtEmail)
            $('#txtTel').val(preload_data.result[0].txtTel)
            $('#txtMov').val(preload_data.result[0].txtMov)
            $('#txtDirec').val(preload_data.result[0].txtDirec)

          });

    }
    </script>
</body>
</html> 

<?php
}
else{
    header('location:../Controller/ctrol_login.php');}
?>






