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
                  <li class="active">Servicio Técnico</li>
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
                <h5><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Ingreso Servicio Técnico</h5>
            </div>

        </div>
    </div>
    
    <div class="panel-body"> <!--  Inicio BODY -->   
            
        <!--  INICIO DATOS CLIENTE -->
        <!--  INICIO DATOS CLIENTE -->
        <form id="form1" role="form" method="post">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <div class="col-lg-12">
                <input type="text" name="txtSede" style="display:none" value='<?php echo $_SESSION["sede"] ?>'>
                <input type="text" name="txtTecnico" style="display:none" value='<?php echo $_SESSION["login"] ?>'>
                <select class="btn-block" name="txtId" id="txtId" onchange="DatosClientes()"  parsley-required="true" >
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
                <input type="checkbox" checked="checked" name="selec" id="selec" onchange="DatosCliente()"> Servicio hecho por cliente factura
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
        
        
        
        <!-- INICIO SERVICIO TECNICO servicio -->
        <!-- INICIO SERVICIO TECNICO servicio -->
        <div class="row" id="servicio">
            <div class="col-lg-6">
                <div class="form-group">
                <div class="col-lg-12">
                <textarea class="form-control input-sm" rows="4" maxlength="500" placeholder="Observaciones del Cliente" id="txtObserv_cliente" name="txtObserv_cliente" style="resize:none;"  parsley-required="true"></textarea>
                </div></div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <div class="col-lg-12">
                <textarea class="form-control input-sm" rows="4" maxlength="500" placeholder="Descripcion Articulo" id="txtObserv_tecnico" name="txtObserv_tecnico" style="resize:none;"  parsley-required="true"></textarea>
                </div></div>
            </div>
        </div>  
     </div> 
     <!-- INICIO SERVICIO TECNICO servicio -->
     <!-- INICIO SERVICIO TECNICO servicio -->
     
     
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
                <button type="submit" class="btn btn-success input-sm btn-block" id="btnEnviar" name="btnEnviar">Guardar</button>
                </div></div>
            </div>
     </form>
     </div>
    </div>
    <!--  Fin servicio --> 
    

    
    
    
    
                      
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
        
        if($('#txtSerial').val() == '' || $('#txtArt').val() == '' || $('#txtProv').val() == '' || $('#txtProb').val() == ''){
                //alert('Por favor llene el Campos Marca Correctamente');
            
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
        
        if($('#txtSerial').val() == '' || $('#txtArt').val() == '' || $('#txtProv').val() == '' || $('#txtProb').val() == ''){
                //alert('Por favor llene el Campos Marca Correctamente');
            
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
        function DatosImp(){

			id_sede = $('#txtSede').val();
			tecnico = $('#txtTecnico').val();
			
            id_cliente = $('#txtId').val();
			c_name = $('#txtDatoName').val();
			c_tel = $('#txtDatoTel').val();
			c_email = $('#txtDatoEmail').val();
			c_direc = $('#txtDatoDirec').val();
            c_cliente = $('#txtObserv_cliente').val();
            c_tecnico = $('#txtObserv_tecnico').val();


            $.ajax({
            type:'post',
            dataType:'html',
            url:'../View/pdf_rep_serv.php',
            data:{'id_sede':id_sede,
			'tecnico':tecnico,
			'id_cliente':id_cliente,
            'c_name':c_name,
			'c_tel':c_tel,
			'c_email':c_email,
            'c_direc':c_direc,
            'c_cliente':c_cliente,
            'c_tecnico':c_tecnico}

            }).done(function(preload_data){
            if (preload_data == 1) {
                //alert('Se Agrego ---Garantia--- con Exito:');
				window.open('../View/pdf_rep_gtia.php?registro1=$registro1','','width=920, height=600');
            };

            });
        }


	</script>




<!-- Modal Fac -->
<div class="modal fade" id="myModalst" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-lg">
    <div class="modal-content">
      <div class="modal-body">
		<div class="row border-01">
            <div class="col-lg-4">
            	<img src="../Assets/img/logo_nav.png"/>
            </div>
            <div class="col-lg-4 text-center">
            	<h2>Orden de Servicio Tecnico</h2>
            </div>
            <div class="col-lg-4 ">
            	<span>Fecha:<br>
                Tipo:<br>
                No.
                </span>
            </div>
        </div>
        <div class="row border-01">
            <div class="col-lg-6">
            	<img src="../Assets/img/logo-300.png"/>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary btn-block">Guardar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Fac -->
<div class="modal fade" id="myModalg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-lg">
    <div class="modal-content">
      <div class="modal-body">
		<div class="row border-01">
            <div class="col-lg-4">
            	<img src="../Assets/img/logo_nav.png"/>
            </div>
            <div class="col-lg-4 text-center">
            	<h2>Orden de Garantia</h2>
            </div>
            <div class="col-lg-4 ">
            	<span>Fecha:<br>
                Tipo:<br>
                No.
                </span>
            </div>
        </div>
        <div class="row border-01">
            <div class="col-lg-6">
            	<img src="../Assets/img/logo-300.png"/>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary btn-block">Guardar</button>
      </div>
    </div>
  </div>
</div>




</body>
</html>	

<?php
}
else{
    header('location:../Controller/ctrol_login.php');}
?>






