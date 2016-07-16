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



  <div class="panel-group" id="accordion"><!-- inicio menu colapse-->
  <div class="panel panel-default">
      
          <div class="panel-heading bg-03"> <!-- inicio Menu 02-->
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  <h5>&nbsp;Garantías Próximas a Vencer</h5>
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                  <!-- Table -->
                  <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Nro. Orden</th>
                            <th>F. Vencimiento</th>
                            <th>F. Recibo</th>
                            <th>Artículo</th>
                            <th>Nombre Cliente</th>
                            <th>Proovedor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="tr1" onmouseover="this.style.cursor='pointer';" class="warning">
                            <td>10000001</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Mouse Inalambrico</td>
                            <td>Daneisy Echavarria</td>
                            <td>117</td>
                            
                          </tr>
                          <tr>
                            <td>10000002</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Teclado</td>
                            <td>Predro Infantes</td>
                            <td>45</td>
                          </tr>
                          <tr class="warning">
                            <td>10000003</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Monitor</td>
                            <td>Alberto Style</td>
                            <td>45</td>
                          </tr>
                          <tr>
                            <td>10000004</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Portatil</td>
                            <td>Pablo Angel</td>
                            <td>112</td>
                          </tr>
                          <tr class="warning">
                            <td>10000005</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>T. Red Inalambrica</td>
                            <td>Carlos Valderrama</td>
                            <td>98</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <!-- Fin Table 01 -->
              </div>
            </div>
          </div><!-- FIN Menu 01-->
          
          
          <div class="panel panel-default"> <!-- inicio Menu 02 -->
            <div class="panel-heading bg-02">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  <h5>&nbsp;Servicios Próximos a Vencer</h5>
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
                <!-- Table -->
                  <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Nro. Orden</th>
                            <th>F. Vencimiento</th>
                            <th>F. Recibo</th>
                            <th>Artículo</th>
                            <th>Nombre Cliente</th>
                            <th>Proovedor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="danger">
                            <td>10000001</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Mouse Inalambrico</td>
                            <td>Daneisy Echavarria</td>
                            <td>117</td>
                          </tr>
                          <tr>
                            <td>10000002</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Teclado</td>
                            <td>Predro Infantes</td>
                            <td>45</td>
                          </tr>
                          <tr class="danger">
                            <td>10000003</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Monitor</td>
                            <td>Alberto Style</td>
                            <td>45</td>
                          </tr>
                          <tr>
                            <td>10000004</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Portatil</td>
                            <td>Pablo Angel</td>
                            <td>112</td>
                          </tr>
                          <tr class="danger">
                            <td>10000005</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>T. Red Inalambrica</td>
                            <td>Carlos Valderrama</td>
                            <td>98</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <!-- Fin Table 02 -->
              </div>
            </div>
          </div><!-- FIN Menu 02-->
          
          
          <div class="panel panel-default"> <!-- inicio Menu 03 -->
            <div class="panel-heading bg-03">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  <h5>&nbsp;Garantías Proovedor Próximas a Vencer</h5>
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
                <!-- Table -->
                  <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Nro. Orden</th>
                            <th>F. Vencimiento</th>
                            <th>F. Recibo</th>
                            <th>Artículo</th>
                            <th>Nombre Cliente</th>
                            <th>Proovedor</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="warning">
                            <td>10000001</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Mouse Inalambrico</td>
                            <td>Daneisy Echavarria</td>
                            <td>117</td>
                          </tr>
                          <tr>
                            <td>10000002</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Teclado</td>
                            <td>Predro Infantes</td>
                            <td>45</td>
                          </tr>
                          <tr class="warning">
                            <td>10000003</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Monitor</td>
                            <td>Alberto Style</td>
                            <td>45</td>
                          </tr>
                          <tr>
                            <td>10000004</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>Portatil</td>
                            <td>Pablo Angel</td>
                            <td>112</td>
                          </tr>
                          <tr class="warning">
                            <td>10000005</td>
                            <td>24 /11 /2014</td>
                            <td>Table cell</td>
                            <td>T. Red Inalambrica</td>
                            <td>Carlos Valderrama</td>
                            <td>98</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <!-- Fin Table 03 -->
              </div>
            </div>
          </div><!-- FIN Menu 03-->
    
               
  </div>              
    </div> <!-- Fin menu colapse-->  
               
                
        
      
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
  
  $('tr').attr("onclick","alert('hola')");
  $('tr').attr("onmouseover","this.style.cursor='pointer'");


  $.PNotify({
    title: "Over Here",
    text: "Check me out. I'm in a different stack.",
    addclass: "stack-custom",
   });
	
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
    header('location:../Controller/ctrol_login.php');
	}
?>






