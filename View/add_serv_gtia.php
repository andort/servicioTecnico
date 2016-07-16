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
    
<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="../Assets/datatable/css/jquery.dataTables.css">
    
<!-- Alertas pnotify -->   
    <link href="../Assets/css/pnotify.custom.css" rel="stylesheet">
    
<!-- Estilos para la segunda libreria de datepicker en boostrap -->
    <link type="text/css" rel="stylesheet" href="../Assets/css/jquery.datepick.css" media="screen" />


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
                  <li class="active">Ingreso de Servicio</li>
                  <li class="active">Servicio Garantía</li>
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
    <div class="panel panel-info"> <!--  Inicio PANEL -->   
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-8">
                <h5><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Ingreso Garantía</h5>
            </div>

        </div>
    </div>
    
    <div class="panel-body"> <!--  Inicio BODY -->   
            
        <!--  INICIO DATOS CLIENTE -->
        <!--  INICIO DATOS CLIENTE -->
            
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input type="text" name="txtSede" style="display:none" value='<?php echo $_SESSION["sede"] ?>'>
                <input type="text" name="txtTecnico" style="display:none" value='<?php echo $_SESSION["login"] ?>'>
                <select class="btn-block" name="txtId" id="txtId" onchange="DatosClientes()" parsley-required="true">
                <option value="">Seleccione Nro. Identidad Cliente...</option>
                    <?php echo $combo_NroId?>
                </select>
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Nombre y Apellido" name="txtDatoName" id="txtDatoName" readonly="readonly">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Email" name="txtDatoEmail" id="txtDatoEmail" readonly="readonly">
                </div></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Movil y/o Telefono" name="txtDatoTel" id="txtDatoTel" readonly="readonly">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Dirección" name="txtDatoDirec" id="txtDatoDirec" readonly="readonly">
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <label>
                <input type="checkbox" checked="checked" onchange="DatosCliente()"> Servicio hecho por cliente factura
                </label>
                </div></div>
            </div>
        </div>
        
        <!--  FIN DATOS CLIENTE -->
        <!--  FIN DATOS CLIENTE -->
        
        
    
        <!--  INICIO DIV GESTOR DEL SERVICIO -->
        <!--  INICIO DIV GESTOR DEL SERVICIO -->
        <div class="panel panel-danger class_padding" id="Gserv" hidden=""> <!--  Inicio Panel --> 
        <div class="panel-body class_padding"> <!--  Inicio BODY -->
             
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12 class_padding">
                    <input  type="text" class="form-control input-sm" maxlength="30" placeholder="Nombre" name="txtName_otro" id="txtNamegestor">
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="text" class="form-control input-sm" maxlength="15" placeholder="Identificacion" name="txtId_otro" id="txtIdgestor">
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="text" class="form-control input-sm" maxlength="20" placeholder="Movil o Phone" name="txtMovil_otro" id="txtMovilgestor">
                    </div></div>
                </div>
            </div>
        
        </div>
        </div>   
        <!--  FIN DIV GESTOR DEL SERVICIO -->
        <!--  FIN DIV GESTOR DEL SERVICIO -->
        
        
    </div>  <!--  Fin Panel --> 
    </div>  <!--  FIN BODY --> 
    
    
    <div class="panel panel-info class_padding"> <!--  Inicio Panel --> 
    <div class="panel-body class_padding"> <!--  Inicio BODY -->             
        
        
        
        <!--  INCIO GARANTIA servicio -->
        <!--  INCIO GARANTIA servicio -->
        <div class="row" id="garantia">
            <div class="col-lg-2">
                <button type="button" class="btn btn-info btn-sm btn-block" name="btnAdd"  data-toggle="modal" data-target="#modal_AddArt">Agregar Articulo</button>
            </div>
            
            
            <div class="col-lg-10">
                <div class="panel panel-info"><!-- INICIO PANEL DATATA TABLE -->
                <div class="panel-body">
            
                    <!-- Table -->
                    <div class="table-responsive">
                      <table id="table_art" class="display" cellspacing="0" width="100%">
                        <thead class="small">
                          <tr>
                            <th class="small">S/N</th>
                            <th class="small">Artículo</th>
                            <th class="small">Marca</th>
                            <th class="small">Referencia</th>          
                            <th class="small">Problema</th>
                            <th class="small">Opción</th>
                          </tr>
                        </thead>
                        <tbody>
                            <!--<?php echo $art;?> -->
                        </tbody>
                      </table>
                    </div>
                    <!-- Fin Table 01 -->
                </div>
                </div> <!-- FIN PANEL DATATA TABLE -->
            </div>

        </div>
        <!--  FIN GARANTIA servicio -->
        <!--  FIN GARANTIA servicio -->
         <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <div class="col-lg-12">
                <textarea class="form-control input-sm" rows="4" placeholder="Observaciones del Cliente" id="txtObserv_cliente" name="txtObserv_cliente" style="resize:none;"  parsley-required="true"></textarea>
                </div></div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <div class="col-lg-12">
                <textarea class="form-control input-sm" rows="4" placeholder="Observaciones Técnico" id="txtObserv_tecnico" name="txtObserv_tecnico" style="resize:none;"  parsley-required="true"></textarea>
                </div></div>
            </div>
     
     	</div>
         
         
            
     
     </div>
     <div class="panel-footer">
     
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
                
                </div></div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <button type="button" class="btn btn-success input-sm btn-block" id="btnEnviarGtia" name="btnEnviar" onclick="addGtia()">Guardar Garantía</button>
                </div></div>
            </div>
     
     </div>
    </div>
    </form>
    <!--  Fin servicio --> 

    
                      
    </section> <!-- FIN de seccion medio -->

</div> <!-- fin del container -->





    <!-- Modal articulos -->
    <!-- Modal articulos -->
    
    <div class="modal fade" id="modal_AddArt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
      <div class="modal-lg">
        <div class="modal-content">
        <form id="formArt" role="form" method="post" data-parsley-validate>
          <div class="modal-header">
            <h5><span class="glyphicon glyphicon-th-large"></span>&nbsp;Ingreso Articulo</h5>
          </div>
          
          <div class="modal-body">
    
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <select class="btn-block" name="txtArt" id="txtArt" parsley-required="true">
                    <option>Seleccionar Artículo...</option>
                    <?php echo $combo_art?>
                    </select>
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <select class="btn-block" name="txtMarca" id="txtMarca" parsley-required="true">
                    <option>Seleccionar Marca...</option>
                    <?php echo $combo_marca?>
                    </select>
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="text" class="form-control input-sm" maxlength="15" placeholder="Referencia" name="txtRef" id="txtRef" parsley-required="true">
                    </div></div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <select class="btn-block" name="txtProv" id="txtProv" parsley-required="true">
                    <option>Seleccionar Proveedor...</option>
                    <?php echo $combo_prov?>
                    </select>
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="date" class="form-control input-sm" placeholder="Fecha Proveedor" name="txtFprov" id="txtFprov" parsley-required="true">
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="number" class="form-control input-sm" placeholder="Valor Articulo" name="txtValor" id="txtValor" min="0" parsley-required="true">
                    </div></div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="text" class="form-control input-sm" placeholder="Ingrese Serial" name="txtSerial" id="txtSerial" parsley-required="true">
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="text" class="form-control input-sm" placeholder="Ingrese Nro. Factura" name="txtNfac" id="txtNfac" parsley-required="true">
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="date" class="form-control input-sm" placeholder="Fecha de Factura" name="txtFfac" id="txtFfac" parsley-required="true">
                    </div></div>
                </div>
            </div>
            
            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <textarea class="form-control input-sm" rows="3" maxlength="500" placeholder="Problema" name="txtProb" id="txtProb" style="resize:none;" parsley-required="true"></textarea>
                    </div></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <textarea class="form-control input-sm" rows="3" maxlength="500" placeholder="Observaciones del Técnico" name="txtObser" id="txtObser" style="resize:none;"></textarea>
                    </div></div>
                </div>
            </div>

            
          </div>
          <div class="modal-footer">
          <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <button type="button" class="btn btn-danger btn-sm btn-block" data-dismiss="modal">Cerrar</button>
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <button type="button" class="btn btn-info btn-sm btn-block" name="btnEnv" onclick="aggProd1()">Agregar Igual</button>
                    </div></div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <div class="col-lg-12">
                    <button type="button" class="btn btn-success btn-sm btn-block" name="btnEnv" onclick="aggProd()">Agregar</button>
                    </div></div>
                </div>
            </div>
            
            
          </div>
          </form>
        </div>
      </div>    
    </div>




<!-- Bootstrap scrip -->
    <script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Assets/js/scripts.js"></script> 
    <script language="JavaScript" type="text/javascript" src="../Assets/js/call_section.js"></script>
    
    
<!-- Script pnotify -->
    <script type="text/javascript" src="../Assets/js/pnotify.custom.js"></script>
    
<!-- Select2 -->
    <script language="JavaScript" type="text/javascript" src="../Assets/css/select2348/select2.js" ></script>
   
<!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="../Assets/datatable/js/jquery.dataTables.js"></script> 
    
<!-- Scripts Necesarios para las validaciones con Parsley -->
    <script type="text/javascript" src="../Assets/js/Parsley/language/js/messages.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../Assets/js/Parsley/minificados/js/parsley.min.js" charset="UTF-8"></script>
    
<!-- Scripts necesarios para la segunda libreria de datepicker -->
    <script type="text/javascript" src="../Assets/js/datepick/jquery.datepick.js"></script>
    <script type="text/javascript" src="../Assets/js/datepick/jquery.datepick-es.js" charset="UTF-8">               
    </script>
        
    
    <script type="text/javascript">
    
    //funcion para el Select2
    
    //Select Identificacion Cliente
    $(document).ready(function() {
        $("#txtId").select2 ({
        minimumInputLength :  3 });
    });
    
    //Select Servicio
    $(document).ready(function() {
        $("#txtServ").select2 ({
         });
    });
    
    //Select Proveedor
    $(document).ready(function() {
        $("#txtProv").select2 ({
         minimumInputLength :  2 });
    });
    
    
    //Select Artículo
    $(document).ready(function() {
        $("#txtArt").select2 ({
         });
    });
	
	//Select Marca
    $(document).ready(function() {
        $("#txtMarca").select2 ({
         });
    });   
    
    //------------------------------//
    
    
    
    
    //valida con parsley
    $('#formArt').parsley();
	
	$('#form1').parsley();


    //funcion para pedir Datos gestor del servicio
    function DatosCliente(){
     if(($("#Gserv").css("display")== 'none')){
         $("#Gserv").css("display","block");
         }else{
             $("#Gserv").css("display","none");
             }
        }
        


    //Funcion para esconder o mostrar div 
    function mostrar_div(){
      var selection = $('#txtServ').val();
        if(selection == 0){
            $("#desicion").css("display","block");
            $("#servicio").css("display","none");
            $("#garantia").css("display","none");
              }
              
        if(selection == 1){
            $("#garantia").css("display","block");
            $("#servicio").css("display","block");
            $("#desicion").css("display","none");
              }

        if(selection == 2){
            $("#servicio").css("display","block");
            $("#garantia").css("display","none");
            $("#desicion").css("display","none");
              }
      }
        
        


    
    //Funcion datateble
    $(document).ready( function () {

    $('#table_art').DataTable({
        paging: false,
        searching: false,
        ordering:  true,
        "order": [[ 0, "asc" ]],
        
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
            $('#txtDatoName').val(preload_data.result[0].txtName)
            $('#txtDatoEmail').val(preload_data.result[0].txtEmail)
            $('#txtDatoTel').val(preload_data.result[0].txtTel)
            $('#txtDatoMov').val(preload_data.result[0].txtMov)
            $('#txtDatoDirec').val(preload_data.result[0].txtDirec)

          });
    }
  
  
  //Funcion para abrir modal desde el boton 
  function open_modal(){
      var selection = $('#txtServ').val();
      if(selection == 2){
          $('#myModalst').modal({show: 'true'});
          }else{
            $('#myModalg').modal({show: 'true'});
              }
      }



      
     //funcion para LISTAR productos en DataTable
    var count =0;
    
    function aggProd(){
        
        if($('#txtArt').val() == '' || $('#txtMarca').val() == '' || $('#txtRef').val() == '' || $('#txtProv').val() == '' || $('#txtFprov').val() == '' || $('#txtValor').val() == '' || $('#txtSerial').val() == '' || $('#txtNfac').val() == '' || $('#txtFfac').val() == '' || $('#txtProb').val() == '' || $('#txtObser').val() == ''){
                alert('Por favor llene el Campos Correctamente');
            
            } else {
		
				var var1 = "<tr id='t"+count+"'><td class='small'>"+$("#txtSerial").val()+"</td>";
					var1 += "<td class='small'>"+$("#txtArt").val()+"</td>";
					var1 += "<td class='small'>"+$("#txtMarca").val()+"</td>";                 
                    var1 += "<td class='small'>"+$("#txtRef").val()+"</td>";
                    var1 += "<td class='small'>"+$("#txtProb").val()+"</td>";   
				var onc = '$("#table_art tbody tr#t'+count+'").remove()';
					var1 += "<td class='small'><button type='button' class='btn btn-danger btn-sm' onclick='"+onc+"'><span class='glyphicon glyphicon-floppy-remove'></span></button></td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtProv").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtFprov").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtNfac").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtFfac").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtValor").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtObser").val()+"</td></tr>";

			//condicion para quitar aviso de "No data available in table"
			count++;
			$('#table_art').append(var1);
			var cont =  $('#table_art tbody tr.odd').text();
			console.log(cont);
			if(cont == "No data available in table"){
				$('#table_art tbody tr.odd').remove();
			}
			
			//para limpiar los campos de textos	
			$('#txtSerial').val('')
            $('#txtArt option:selected').val('')
			$('#txtMarca').val('')
			$('#txtRef').val('')
			$('#txtProv').val('')
            $('#txtFprov').val('')
			$('#txtNfac').val('')
            $('#txtFfac').val('')
            $('#txtValor').val('')
			$('#txtProb').val('')
			$('#txtObser').val('')
		
			}
		}
		
		



		function aggProd1(){
        
        if($('#txtArt').val() == '' || $('#txtMarca').val() == '' || $('#txtRef').val() == '' || $('#txtProv').val() == '' || $('#txtFprov').val() == '' || $('#txtValor').val() == '' || $('#txtSerial').val() == '' || $('#txtNfac').val() == '' || $('#txtFfac').val() == '' || $('#txtProb').val() == '' || $('#txtObser').val() == ''){
                alert('Por favor llene el Campos Correctamente');
            
            } else {
		
				var var1 = "<tr id='t"+count+"'><td class='small'>"+$("#txtSerial").val()+"</td>";
                    var1 += "<td class='small'>"+$("#txtArt").val()+"</td>";
                    var1 += "<td class='small'>"+$("#txtMarca").val()+"</td>";                 
                    var1 += "<td class='small'>"+$("#txtRef").val()+"</td>";
                    var1 += "<td class='small'>"+$("#txtProb").val()+"</td>"; 
                var onc = '$("#table_art tbody tr#t'+count+'").remove()';
                    var1 += "<td class='small'><button type='button' class='btn btn-danger btn-sm' onclick='"+onc+"'><span class='glyphicon glyphicon-floppy-remove'></span></button></td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtProv").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtFprov").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtNfac").val()+"></td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtFfac").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtValor").val()+"</td>";
                    var1 += "<td class='small' style='display:"+'none'+"'>"+$("#txtObser").val()+"</td></tr>";

            //condicion para quitar aviso de "No data available in table"
			count++;
			$('#table_art').append(var1);
			var cont =  $('#table_art tbody tr.odd').text();
			console.log(cont);
			if(cont == "No data available in table"){
				$('#table_art tbody tr.odd').remove();
			}
			
			//para limpiar los campos de textos	
			$('#txtSerial').val('')
			$('#txtProb').val('')
			$('#txtObser').val('')
		
			}
		}
	

        //para guardar el array de las garantias
        function addGtia(){
			
			if($('#txtId').val() == ''){
                alert('Por favor llene el Campos Marca Correctamente');
            
            } else {

				cliente = $('#txtId').val();
				c_cliente = $('#txtObserv_cliente').val();
				c_tecnico = $('#txtObserv_tecnico').val();
				sede = $('#txtSede').val();
				tecnico = $('#txtTecnico').val();				
				o_name = $('#txtName_otro').val();
				o_id = $('#txtId_otro').val();
				o_movil = $('#txtMovil_otro').val();
				
	
				array = [];
				$('#table_art tbody tr').each(function(obj){
				array.push({
					serial:$($(this).children("td")[0]).html(),
					art:$($(this).children("td")[1]).html(),
					marca:$($(this).children("td")[2]).html(),
					ref:$($(this).children("td")[3]).html(),
					problema:$($(this).children("td")[4]).html(),
					prov:$($(this).children("td")[6]).html(),
					fprov:$($(this).children("td")[7]).html(),
					nfactura:$($(this).children("td")[8]).html(),
					ffactura:$($(this).children("td")[9]).html(),
					valor:$($(this).children("td")[10]).html(),
					observacion:$($(this).children("td")[11]).html()
					});
	
				});
				//alert($('txtCel').val());
				$.ajax({
				type:'post',
				dataType:'html',
				url:'ctrol_addgarantias.php',
				data:{'datos_gtia':array,
				'cliente':cliente,
				'c_cliente':c_cliente,
				'c_tecnico':c_tecnico,
				'sede':sede,
				'tecnico':tecnico,
				'o_name':o_name,
				'o_id':o_id,
				'o_movil':o_movil}
	
				}).done(function(preload_data){
				if (preload_data != 0) {                    
					window.open('../View/pdf_rep_gtia11.php','','width=920, height=600');
					location.href = '../Controller/ctrol_add_gtia.php';
					};
	
				});
			}
        }


	</script>


</body>
</html>	

<?php
}
else{
    header('location:../Controller/ctrol_login.php');}
?>






