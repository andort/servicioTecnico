<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
	if(isset($_SESSION["login"]))
{
?>

<html xmlns="http://www.w3.org/1999/xhtml"><head>
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
      
<!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="../Assets/datatable/css/jquery.dataTables.css">
  
<!-- dropzone CSS -->
    <link rel="stylesheet" type="text/css" href="../Assets/css/dropzone/dropzone.css" />
    
      
      
      


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
                  <li><a href="ctrol_inicio.php">Home</a></li>
                  <li><a href="#">Proveedor</a></li>
                  <li class="active">Ingreso Facturas Proveedor</li>
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
    
    <div class="panel panel-info"><!-- INICIO PANEL DATOS Proveedor -->
    <div class="panel-heading"> <!--  Inicio HEAD -->
    
        <div class="row">
            <div class="col-lg-8">
                <h5><span class="glyphicon glyphicon-list"></span>&nbsp;Ingreso Datos Factura</h5>
            </div>
        </div>
    </div> <!--  Fin HEAD -->
  
    <div class="panel-body"> <!--  Inicio BODY -->   
            
        <!--  DATOS PROVEEDOR -->  
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                <div class="col-lg-12">
                <select class="btn-block" name="txtProv" id="txtProv">
                <option>Seleccionar Proveedor...</option>
                <?php echo $c_provo?>
                </select>
                </div></div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="text" class="form-control input-sm" placeholder="Nro. Factura" name="txtNfact">
                </div></div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="date" class="form-control input-sm" placeholder="Fecha Factura" name="txtDatefac">
                </div></div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <div class="col-lg-12">
                <input  type="date" class="form-control input-sm" placeholder="Fecha Vencimiento" name="txtDateven">
                </div></div>
            </div>
            
        </div>   
        
    

        
        <!--  Escaner Factura -->
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-info">
                <div class="panel-body">
                    
                    <div class="form-group">
                    <div class="col-lg-6">
                    <h5><span class="glyphicon glyphicon-th-large"></span>&nbsp;Ingreso Articulo</h5>
                    </div><div class="col-lg-6">
                    <input  type="text" class="form-control input-sm" placeholder="Marca" name="txtMarca" id="txtMarca">
                    </div></div>
                    
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="text" class="form-control input-sm" placeholder="Articulo" name="txtArt" id="txtArt">
                    </div></div>
                    
                    <div class="form-group">
                    <div class="col-lg-12">
                    <input  type="text" class="form-control input-sm" placeholder="Referencia" name="txtRef" id="txtRef">
                    </div></div>
                    
                    <div class="form-group">
                    <div class="col-lg-6">
                    <input  type="number" class="form-control input-sm" placeholder="Cantidad" name="txtCantidad" id="txtCant" min="0">
                    </div><div class="col-lg-6">
                    <button type="button" class="btn btn-success btn-sm btn-block" name="btnEnv" onclick="aggProd()">Agregar</button>
                    </div></div>
                </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-info"><!-- INICIO PANEL DATATA TABLE -->
                <div class="panel-body">
            
                    <!-- Table -->
                    <div class="table-responsive">
                      <table id="table_art" class="display" cellspacing="0" width="100%">
                        <thead class="small">
                          <tr>
                            <th class="small">Marca</th>
                            <th class="small">Artículo</th>
                            <th class="small">Referencia</th>                  
                            <th class="small">Cantidad</th>
                            <th class="small">Retirar</th>
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

        
    </div> <!--  Fin BODY --> 
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
                <button type="submit" class="btn btn-info btn-sm btn-block" name="btnEnv" data-toggle="modal" data-target="#myModal">Aceptar</button>
                </div></div>
            </div>
        </div>
    </div> <!--  Fin FOOTER --> 
    </div> <!-- FIN PANEL DATOS CLIENTES -->
    
    </form>
    

              
    </section>
    <!-- FIN de seccion medio -->



</div><!-- fin del container -->


<!-- Bootstrap scrip -->
    <script type="text/javascript" src="../Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Assets/js/scripts.js"></script> 
    
<!-- Script pnotify -->
    <script type="text/javascript" src="../Assets/js/pnotify.custom.js"></script>
      
<!-- Select2 -->
    <script language="JavaScript" type="text/javascript" src="../Assets/css/select2348/select2.js" ></script>   
     
<!-- Parsley -->
    <script type="text/javascript" src="../Assets/js/Parsley/language/js/messages.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../Assets/js/Parsley/minificados/js/parsley.min.js" charset="UTF-8"></script>
    
<!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="../Assets/datatable/js/jquery.dataTables.js"></script> 
    
<!-- libreria de dropzone -->
    <script type="text/javascript" src="../Assets/css/dropzone/js/dropzone.js"></script>
      
<!-- libreria de datepicker -->
    <script type="text/javascript" src="../Assets/js/Moment/js/moment-with-langs.min.js"></script>
    <script type="text/javascript" src="../Assets/js/Bootstrap-DatePicker/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    
<!-- libreria de datepicker -->    
    <script type="text/javascript" src="../Assets/css/dropzone/dropzone.js"></script>


    <script type="text/javascript">
    
    
    //funcion para el Select2
    //Select Proveedor
    $(document).ready(function() {
        $("#txtProv").select2 ({
        minimumInputLength :  2 });
    });
    
    
    //valida con parsley
    function Validar_Parsley(div) {

            if ($('#' + div).parsley('validate')) {
                return true;
            } else {
                return false;
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


    $('#table_fac').DataTable({
        paging: false,
        searching: false,
        ordering:  true,
        "order": [[ 0, "asc" ]],
        
        });
    });
    
    
    //funcion para LISTAR productos en DataTable
    var count =0;
    
    function aggProd(){
        
        if($('#txtMarca').val() == ''){
                alert('Por favor llene el Campos Marca Correctamente');
                
            } else if($('#txtArt').val() == ''){
                alert('Por favor llene el Campos Artículo Correctamente');
                
            } else if($('#txtRef').val() == ''){
                alert('Por favor llene el Campos Referencia Correctamente');
                
            } else if($('#txtCant').val() == ''){
                alert('Por favor llene el Campos Cantidad Correctamente');
            
            } else {
        
                var var1 = '<tr id="t'+count+'"><td class="small"><input type="text" class="nostyle" value="'+$('#txtMarca').val()+'" name="marca[]"                disabled></td>';
                    var1 += '<td class="small"><input type="text" class="nostyle" value="'+$('#txtArt').val()+'" name="articulo[]" disabled></td>';
                    var1 += '<td class="small"><input type="text" class="nostyle" value="'+$('#txtRef').val()+'" name="referencia[]" disabled></td>';                 
                    var1 += '<td class="small"><input type="text" class="nostyle" value="'+$('#txtCant').val()+'" name="cantidad[]" disabled></td>';
                var onc = "$('#table_art tbody tr#t"+count+"').remove()";
                    var1 += '<td class="small"><button type="button" class="btn btn-danger btn-sm" onclick="'+onc+'"><span class="glyphicon glyphicon-floppy-remove"></span></button></td></tr>';
            
            //condicion para quitar aviso de "No data available in table"
			count++;
			$('#table_art').append(var1);
			var cont =  $('#table_art tbody tr.odd').text();
			console.log(cont);
			if(cont == "No data available in table"){
				$('#table_art tbody tr.odd').remove();
			}
			
			//para limpiar los campos de textos	
			$('#txtCant').val('')
			$('#txtRef').val('')
			$('#txtArt').val('')
			$('#txtMarca').val('')
		
			}
		}
		

</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ingrese Soporte de las Facturas</h4>
      </div>
      <div class="modal-body">
        <form action="upload.php"
      		class="dropzone"
      		id="my-awesome-dropzone"></form>
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




