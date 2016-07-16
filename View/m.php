
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <img src="../Assets/img/logo_nav.png"></a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">


    <ul class="nav navbar-nav navbar-right">
      <li class=""><a href="ctrol_incio.php"><span class="glyphicon glyphicon-home"></span></a></li>
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingreso de Servicios<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="ctrol_add_serv.php">Servicio Técnico</a></li>
            <li><a href="ctrol_add_gtia.php">Servicio Garantía</a></li>
          </ul>
        </li>
        
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestión Servicios <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="ctrol_solution_serv.php">Solucionar Servicios</a></li>
            <li><a href="ctrol_delivery_serv.php">Entrega Servicios</a></li>
            <li class="divider"></li>
            <li><a href="ctrol_solution_gtia.php">Solucionar Garantía</a></li>
            <li><a href="ctrol_delivery_gtia.php">Entrega Garantía</a></li>
            <li class="divider"></li>
            <li><a href="ctrol_rep_servtecn.php">Reporte Servicios</a></li>
            <li><a href="ctrol_rep_servgtia.php">Reporte Garantía</a></li>
          </ul>
      </li>
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestión Cliente <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="ctrol_addcustomer.php">Ingresar o Modificar Cliente</a></li>
            <li><a href="#">Reporte Cliente</a></li>
          </ul>
        </li>
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proveedor <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="ctrol_addprov.php">Ingresar o Modificar Proveedor</a></li>
            <li><a href="ctrol_gtia_prov.php">Gestión Gtias Proveedor</a></li>
            <li><a href="#">Listar Gtias Enviadas</a></li>
            <li><a href="#">Historia Gtias Proveedor</a></li>
          </ul>
        </li>
        

        <?php echo $_SESSION["adm1"]; ?>
        <?php require_once '../View/m_a.php' ?>
        <?php echo $_SESSION["adm2"]; ?>


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user text-warning"></span> 
                <span class="text-warning"><?php echo $_SESSION["login"]; ?></span>
                <!--<span class="glyphicon glyphicon-circle-arrow-down text-warning"></span> -->
            </a>
            <ul class="dropdown-menu">
                <li>
                    <div class="navbar-login">
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="text-center">
                                    <span class="glyphicon glyphicon-user icon-size"></span>
                                </p>
                            </div>
                            <div class="col-lg-8">
                            	<p class="text-left small">Bienvenid@</p>
                                <p class="text-left"><?php echo $_SESSION["login"]; ?></p>
                                <p class="text-left small"><?php echo $_SESSION["cargo"]; ?> de Ledacom</p>
                                <p class="text-left small"><?php echo $_SESSION["correo"]; ?></p>
                                <!-- <p class="text-left">
                                    <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                </p> -->
                            </div>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="navbar-login navbar-login-session">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>
                                    <a href="ctrol_login.php?estado=1" class="btn btn-warning btn-block btn-sm">Cerrar Sesión</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
      
      
      <li></li>
      </li>
    </ul>
  </div>
<!-- FIn del menu -->
<!-- FIn del menu -->

