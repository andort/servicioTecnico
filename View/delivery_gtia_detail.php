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
                  <li><a href="#">Gestion Servicios</a></li>
                  <li><a href="ctrol_delivery_gtia.php">Entregar Garantía</a></li>
                  <li class="active">Entrega Garantía Detalle</li>
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
    <div class="panel panel-info">
    
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-8">
                    <input type="text" name="txtId_mov" id="txtId_mov" style="display:none" value='<?php echo $id_mov ?>'>
                    <h5><span class="glyphicon glyphicon-new-window"></span>&nbsp;&nbsp;&nbsp;&nbsp;Entrega de Garantía</h5>
                </div>
                <div class="col-lg-4 text-center">
                    <h5>Nro: <?php echo $id_mov ?></h5>
                </div>
            </div>
        </div>
   
    <!--  Fin servicio --> 
    


     
		<div class="panel-body"> <!--  Inicio BODY -->

            <div class="row">
                <div class="col-lg-4">
                    <span class=""><b>Cliente o Empresa: </b></span><span><?php echo $name; ?></span><br>
                    <span class=""><b>Dirección: </b></span><span><?php echo $addres; ?></span><br> 
                </div>
                <div class="row col-lg-4">
                    <span class=""><b>Numero de Id o Nit: </b></span><span><?php echo $id_persona; ?></span><br>
                    <span class=""><b>Tel - Cel: </b></span><span><?php echo $number; ?></span><br> 
                </div>
                <div class="row col-lg-4">
                    <span class=""><b>Email: </b></span><span><?php echo $email; ?></span><br>
                    <span class=""><b>Fecha Creación: </b></span><span><?php echo $date_create; ?></span><br>
                </div>
            </div>

            <div class="row ">
                <br>
                <div class="col-lg-12 border_bot">
                </div>
                <br>
            </div>
			
 
            <!-- Table -->
            <div class="table-responsive">
              <table id="table_id" class="display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="small">Serial</th>
                    <th class="small">Articulo</th>
                    <th class="small">Marca - Ref.</th>
                    <th class="small">Proveedor</th>
                    <th class="small">problema o Solución</th>            
                    <th class="small text-center">Opción</th>  
                  </tr>
                </thead>
                <tbody>
                    <?php echo $listar;?>
                </tbody>
              </table>
            </div>
            <!-- Fin Table 01 -->
            
            
            <div class="row"><br>

                <div class="col-lg-8">
                    <span class=""><B>Observaciones Cliente: </B></span><span><?php echo $o_cliente; ?></span><br><br>
                    <span class=""><B>Observaciones Técnico: </B></span><span><?php echo $o_tecnico; ?></span><br><br>
                    <span class=""><B>Solución: </B></span><span><?php echo $o_solucion; ?></span><br>
                </div>

                <div class="row col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                        <span class="text-primary">Estado Actual: </span><span><?php echo $estado; ?></span><br>
                        <select type="text" class="form-control input-sm" name="txtEstadoServ" id="txtEstadoServ" parsley-required="true">
                            <option value="">Seleccione Nuevo Estado...</option>;
                            <?php echo $combo_Estado ?>
                        </select><br />
                        <label>
                            <input type="checkbox" checked="checked" name="selec" id="selec" onchange="DatosCliente()"> Servicio hecho por cliente factura
                        </label>

                    </div>
                    </div>  
                </div>
            </div>


            <!--  INICIO DIV GESTOR DEL SERVICIO -->
            <!--  INICIO DIV GESTOR DEL SERVICIO -->
            <div class="panel panel-danger class_padding" id="Gserv" hidden=""> <!--  Inicio Panel --> 
            <div class="panel-body class_padding"> <!--  Inicio BODY -->
                 
                <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group">
                    <input  type="text" class="form-control input-sm" name="txt_Rname" id="txt_Rname" placeholder="Nombre">
                    </div>
                    </div>
                    
                    <div class="col-lg-4">
                    <div class="form-group">
                    <input  type="text" class="form-control input-sm" name="txt_Rid" id="txt_Rid" placeholder="Nro Id.">
                    </div>
                    </div>
                    
                    <div class="col-lg-4">
                    <div class="form-group">
                    <input  type="text" class="form-control input-sm" name="txt_Rtel" id="txt_Rtel" placeholder="Tel o Cel">
                    </div>
                    </div>
                </div>          
            
            </div>
            </div>   
            <!--  FIN DIV GESTOR DEL SERVICIO -->
            <!--  FIN DIV GESTOR DEL SERVICIO -->
            
		</div> <!--  Fin PANEL BODY --> 
        
		<div class="panel-footer">
     
		<div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">

                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <button type="submit" class="btn btn-primary input-sm btn-block" id="btnEnviarGtia" name="btnEnviarGtia">Guardar Garantía</button>
                </div></div>
            </div>
		</div>
     
     </div><!--aca terminar el PANEL FOOTER-->
     </div><!--aca terminar el PANEL-->
   	</form>


                      
    </section> <!-- FIN de seccion medio -->
</div> <!-- fin del container -->





<!-- INICIO Modal SOLUCION SERVICIO -->
<!-- INICIO Modal SOLUCION SERVICIO -->
  <div class="modal fade" id="modal_AddArt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="form2" role="form" method="post">
      <div class="modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title">Solucion Articulo</h4>
          </div>
          <div class="modal-body">

            <!-- articulo malo que trajo el cliente -->
            <div class="col-lg-6">
              <div class="panel panel-default">
                <div class="panel-heading">Articulo en garantía</div>
                <div class="panel-body">
                    <div class="col-lg-4">
                      <div class="form-group text-center">
                        <small>No. Articulo</small>
                        <B><span id="txt_id" class=""></span></B>
                      </div>
                    </div>
                    <div class="col-lg-8">
                        <span id="txt_art"></span><br />
                        <span id="txt_marca"></span> <br />
                        <span id="txt_serial"></span> <br />
                        <span id="txt_prov"></span><br /><br />
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Comentario cliente</label>
                        <textarea class="form-control input-sm" rows="4" id="txt_c1" readonly="readonly" style="resize:none;"></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">                 
                      <div class="form-group">
                        <label>Solución</label>
                        <textarea class="form-control input-sm" rows="4" id="txt_c3" readonly="readonly" style="resize:none;"></textarea>
                      </div>
                    </div>        
                </div>
              </div>

            </div>

            <!-- articulo malo que trajo el cliente -->
            <div class="col-lg-6">
              <div class="panel panel-danger">
                <div class="panel-heading">Articulo cambio</div>
                <div class="panel-body">
                    <div class="col-lg-12">
                      <div class="form-group">
                      <select class="btn-block" name="txtArt" id="txtArt">
                      <option>Seleccionar Artículo...</option>
                      <?php echo $combo_art?>
                      </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <select class="btn-block" name="txtMarca" id="txtMarca">
                        <option>Seleccionar Marca...</option>
                        <?php echo $combo_marca?>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <input  type="text" class="form-control input-sm" placeholder="Referencia" name="txtRef" id="txtRef">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <select class="btn-block" name="txtProv" id="txtProv">
                        <option>Seleccionar Proveedor...</option>
                        <?php echo $combo_prov?>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <input  type="date" class="form-control input-sm" placeholder="Fecha Proveedor" name="txtFprov" id="txtFprov">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <input  type="text" class="form-control input-sm" placeholder="Ingrese Serial" name="txtSerial" id="txtSerial">
                        </div>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <span><b>Estado actial:&nbsp;</b></span><span id="txt_est"></span>
                </div><br />

                <div class="col-lg-12">
                  <select type="text" class="form-control input-sm" name="txtRol" id="txtRol" parsley-required="true">
                    <option value="">Seleccione Nuevo Estado...</option>;
                    <?php echo $combo_Estado_art ?>
                  </select>
                </div>

              </div>
            </div>
              

          </div>
          <div class="modal-footer">
            <div class="col-lg-4 col-md-offset-8">
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="btnEnviar" id="btnEnviar">Solucion Servicio</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
<!-- FIN Modal SOLUCION SERVICIO -->
<!-- FIN Modal SOLUCION SERVICIO -->





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
	
	
	//validar con parsley
    $('#form1').parsley();
	
	//validar con parsley
    $('#form2').parsley();
	
	
    
    //funcion para el Select2 -----------------------------------------------
    
    //Select Identificacion Cliente
    $(document).ready(function() {
        $("#txtId").select2 ({
        minimumInputLength :  1 });
		
		
        //función del DataTable
        $("#table_id").DataTable({
			paging: false,
			searching: false,
        	ordering:  true,
			responsive: true,
			info: false,
			scrollY: "210px",
  			scrollCollapse: true,
			"order":[[0,"asc"]]});


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
         minimumInputLength :  1 });
    });
    
    
    //Select Fecha Proveedor
    $(document).ready(function() {
        $("#txtFechaprov").select2 ({
        minimumInputLength :  2 });
    });
    
    //Select Artículo
    $(document).ready(function() {
        $("#txtArt").select2 ({
        minimumInputLength :  1 });
    });
    
    //Select Marca
    $(document).ready(function() {
        $("#txtMarca").select2 ({
        minimumInputLength :  1 });
    });
    
    //Select Referencia
    $(document).ready(function() {
        $("#txtRef").select2 ({
        minimumInputLength :  1 });
    });
    
    //---------------------------------------------------------------------//
    


    //funcion para llevar los datos al modal
    function llevar_datos_modal(id, serial, articulo, marca, proveedor, estado, coment1, coment2, coment3){
        $("#txt_id").html(id);
        $("#txt_serial").html(serial);
        $("#txt_art").html(articulo);
		$("#txt_marca").html(marca);
        $("#txt_prov").html(proveedor);
		$("#txt_est").html(estado);
        $("#txt_c1").val(coment1);
		$("#txt_c2").val(coment2);
		$("#txt_c3").val(coment3);
    }


    //funcion para pedir Datos gestor del servicio
    function DatosCliente(){
     if(($("#Gserv").css("display")== 'none')){
         $("#Gserv").css("display","block");
         }else{
             $("#Gserv").css("display","none");
             }
        }
    
    
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






