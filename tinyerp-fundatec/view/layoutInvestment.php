<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        require_once '../../../controller/LayoutController.php';
        ?>
        <title><?php echo $this->title; ?></title>      
        
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../../../css/bootstrap/bootstrap.min.css">
        <link href="../../../css/css.css" rel="stylesheet" type="text/css"/>       
        <link rel="stylesheet" href="../../../css/general.css">
        <link rel="stylesheet" href="../../../css/select2.min.css">
        <link rel="stylesheet" href="../../../css/datepicker.css">
        <link rel="stylesheet" href="../../../css/bootstrap-datetimepicker.min.css">
         <link rel="stylesheet" href="../../../lib/DataTables/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../../../css/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../../../css/default2.css">
        <link rel="stylesheet" href="../../../css/jquery-ui.min.css">
        <link rel="stylesheet" href="../../../lib/alertifyjs/css/alertify.min.css">
        <link rel="stylesheet" href="../../../lib/alertifyjs/css/myalertify.css">
        <link href="../../../css/defaultInvestment.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/menuboostrap.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../../js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/moment.js" type="text/javascript"></script>
        <script src="../../../js/jquery.dataTables.min.js"></script>
        <script src="../../../js/select2.min.js" type="text/javascript"></script>
        <script src="../../../js/MensajeError.js" type="text/javascript"></script>
        <script src="../../../js/Message.js" type="text/javascript"></script>
        <script src="../../../js/inversiones/general.js" type="text/javascript"></script>
        <script src="../../../js/defaultMenu.js" type="text/javascript"></script>        
        
        <script src="../../../lib/Datepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>        
        <script src="../../../lib/Datepicker/daterangepicker.js" type="text/javascript"></script>
        <link href="../../../lib/Datepicker/datepicker3.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../lib/Datepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
        <link href="../../../lib/Datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../lib/alertifyjs/js/alertify.min.js" type="text/javascript"></script>
        <script src="../../../lib/alertifyjs/js/myalertify.js" type="text/javascript"></script>
        <script src="../../../js/index.js" type="text/javascript"></script>
        <script src="../../../lib/Numeral/numeral.min.js" type="text/javascript"></script>
        
        <script src="../../../lib/DataTables/jquery.dataTables.min.js"></script>
        <script src="../../../lib/DataTables/dataTables.bootstrap.min.js"></script>
        <script src="../../../config.js"></script>    
    </head>
    <body>
        <script type="text/javascript">
            $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
            });
        </script>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <div class="content-logo">
                        <img class="logo brand" src="../../../img/logo.png" alt="" onclick="location.href = '../../index/'">
                    </div>
                </div>
                <ul class="list-unstyled components">
                    <!--<p>Sub módulos</p>-->
                    <?php
$temporal = 0;  
//                            $layout= new LayoutController();                 
//                            $layout->init();
$pruebaMenu = Array ( 
    Array(24,'0001','sale','Facturación','sale','fa fa-book','Factura Electrónica','index',null,'pointOfSale/index?TipoDoc=1&',1),
    Array(24 ,'0001','sale', 'Facturación','sale','img/iconosPOS/Facturacion.png','Factura Electrónica de Exportación','index', null,'pointOfSale/index?TipoDoc=6&',2),
    Array(24 ,'0001','sale', 'Facturación','sale','img/iconosPOS/Facturacion.png','Tiquete Electrónico','index', null,'pointOfSale/index?TipoDoc=4&',4),
    Array(29,'0002', 'Reports','Reportes','reports','fa fa-paste','Reporte de transacciones','index', null,'pointOfSale/transactionReport', 1),
    Array(29, '0002', 'Reports','Reportes','reports','img/iconosPOS/Reportes.png','Reporte de Impuestos','index',null, 'pointOfSale/taxReport',2),
    Array(29, '0002', 'Reports','Reportes','reports','img/iconosPOS/Reportes.png','Reporte de transacciones de contado y crédito', 'index', null, 'cxc/report/index.php?action=view-TransactionQueryReport',2),
    Array(29, '0002', 'Reports','Reportes','reports','img/iconosPOS/Reportes.png', 'Archivo de importación','index',null, 'pointOfSale/importArchive',3),
    Array(23, '0003','maintenance','Mantenimiento','maintenance','fa fa-wrench', 'Clientes','index',null,'pointOfSale/client',1),
    Array(23, '0003','maintenance','Mantenimiento','maintenance','img/iconosPOS/Mantenimiento.png', 'Conceptos de servicio','index', null, 'pointOfSale/saleConcept',2),
    Array(23, '0003','maintenance','Mantenimiento','maintenance','img/iconosPOS/Mantenimiento.png', 'Cajas','index', null, 'pointOfSale/cashRegister',3), 
    Array(23, '0003','maintenance','Mantenimiento','_maintenance','img/iconosPOS/Mantenimiento.png', 'Almacen','index', null, 'pointOfSale/store', 4));
                            /*,

                            */
                            if($pruebaMenu==""){
                                echo 'NO HAY PERMISOS';
                            }else{
                                 foreach ($pruebaMenu as &$valor) {
                                if ($temporal <> $valor[0]) {
                                    $temporal = $valor[0];
                                    ?> 
                                    <li class = "active">
                                        <a href="#<?php echo $valor[2] ?>" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle">
                                            <i class= "<?php echo $valor[5] ?>" alt = "" ></i> <?php echo $valor[3] ?></a>
                                        <ul id="<?php echo $valor[2] ?>"  class="collapse list-unstyled">
                                            <li><a href="../../../module/<?php echo $valor[9] ?>/"><span></span><?php echo $valor[6] ?></a></li>         
                                        </ul>
                                    </li>
                                <?php } else { ?>
                                    <ul id="<?php echo $valor[2] ?>" class="collapse list-unstyled">
                                        <li><a href="../../../module/<?php echo $valor[9] ?>/"><span></span><?php echo $valor[6] ?></a></li>         
                                    </ul> 
                                <?php } ?>                                
                            <?php }     
                            }
                            ?>
           
<!--              
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contratos</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Contratación</a>
                        </li>
                        <li>
                            <a href="#">Aprobación de trámites</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos con nombre bien largo el cabrón</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        <li>
                            <a href="#">Consulta de contratos</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
-->
            </ul>
        </nav>
            <!-- Page Content Holder -->
        <div id="content">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                    </button>
                    <div class="content-right col-xs-12 col-md-10 col-sm-10">
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-8 col-xs-8"></div>
                                <div class="col-md-4 col-xs-4">
                                <div class="headerintem">
                                    <div class="dropdown">
                                        <span data-toggle="dropdown" aria-expanded="true" class="lbusername pointer">
                                            <?php echo Sesion::getAttr("username"); ?>
                                        </span>
                                        <img data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" src="<?php echo Sesion::getAttr("imageProfile"); ?>" alt="usuario" onerror="this.src='../../../img/user(100).png'" class="img40 pointer">
                                        <ul id="menuuser" class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                                            <li class="dropdown-header">
                                                <div class="infouser">
                                                   
                                                    <img src="<?php echo Sesion::getAttr("imageProfile"); ?>" onError="this.src='../../../img/user(100).png'" class="img40 pointer">

                                                    <p><?php echo Sesion::getAttr("username"); ?></p>	
                                                </div>
                                            </li>
                                            <li> <a href="#">Mi cuenta</a></li>
                                            <li role="separator" class="divider"></li>

                                            <li ><a href="../../sesion/">Cerrar sesión</a></li>

                                        </ul>
                                    </div>	  						
                                </div> 					
                            </div>
                        </div>
                    </div>
                        <div class="content-body">
                            <?php require_once $this->include; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
