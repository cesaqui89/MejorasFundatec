
<!-- Author     : Yendry Arrieta -->

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FundaTEC</title>
        <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/estilos.css" />
        <link rel="stylesheet" href="../../css/perfilUsuario.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src="../../js/index.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-top navbar-expand-md" id="navbar-main">
                <div class="container-fluid">
                    <a href="#">
                        <img src="../../img/menu/LogoFUNDATEC.png" class="logo">
                    </a>
                <!--perfil usuario-->
                <div id="perfilUsuario" class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img src="<?php echo Sesion::getAttr("imageProfile"); ?>" onError="this.src='../../img/user(100).png'">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">
                                        <p style="padding-top: 10px"><?php echo Sesion::getAttr("username"); ?></p>     
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-left">
                           <div class="container">
                           <div class="row">
                                <div class="col-sm-12"> 
                                    <a href="../examples/profile.html" class="dropdown-item">
                                        <i  class="fa fa-bell"></i>
                                        <span>Notificaciones</span>
                                    </a>
                                </div>    
                           </div>
                            <div class="dropdown-divider"></div>
                            
                                <?php 
                                $contador = 0; 
                                $temporal = 0;
                                 foreach ($this->applications as $key => $value) {
                                    if ($contador%3 == 0){ 
                                        $temporal = $temporal +3 -1;
                                ?>
                                  <div class="row">
                                <?php
                                }
                                ?>
                                <div class="col-sm-4"> 
                                    <a href="<?php echo $value->getURL();?>" class="dropdown-item">
            <!--                        <i class="text-left <?php echo $value->getNameIcon();?>"></i>-->
                                        <i class="fa fa-bomb"></i>
                                        <span><?php echo $value->getApplicationName();?></span>
                                    </a>
                                </div>
                                <?php 
                                if (($contador)== $temporal){
                                    ?></div><?php 
                                    }
                                    $contador = $contador + 1;
                                }?> 
                                <?php 
                                if ($contador < $temporal){
                                    ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="http://sistemafundatec.tec.ac.cr:8080/cfmx/" class="dropdown-item col-sm-8">
                                            <i class="fa fa-dashboard"></i>
                                            <span>ERP</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="https://www.facturaelectronica.cr" class="dropdown-item">
                                            <i class="fa fa-tablet"></i>
                                            <span>Factura Electrónica</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="dropdown-item" href="https://www.inscribete.co.cr/fundatec/">
                                            <i class="fa fa-institution"></i>
                                            <span class="gb_3">Inscríbete</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">    
                                        <a class="dropdown-item" href="https://www.tec.ac.cr/fundatec" >
                                                <i class="fa fa-internet-explorer"></i>
                                            <span>Web</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="dropdown-item" href="https://www.outlook.com/owa/itcr.ac.cr">
                                            <i class="fa fa-mail-forward"></i>
                                            <span>Correo</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="../sesion/" class="dropdown-item">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Cerrar sesión</span>
                                </a>
                            </div>    
                        </div>
                    </div>
                </div>
            </nav>
            <div class="account d-flex" style="margin-bottom:10px;">    
            </div>
        </header>

        <div class="encabezado">
            <div class="containerEnc">
                <img class="imgUserenc" src="<?php echo Sesion::getAttr("imageProfile"); ?>" onError="this.src='../../img/user(100).png'" alt="" class="img-circle">
                <h4>Te damos la bienvenida, <?php echo Sesion::getAttr("firstname"); ?> <?php echo Sesion::getAttr("lastname"); ?></h4>
                <h2>Fundación Tecnológica de Costa Rica</h2>
            </div>
        </div>
        <hr style="color: #0056b2;" />
        <section class="main container">
            <div class="container">
                <div class="w3-row w3-center flex-container">
                    <?php foreach ($this->applications as $key => $value) { ?>


                        <div class="col-md-4" id="cajaTexto" value="<?php echo $value->getApplicationId(); ?>" class="card" onclick="javascript: redireccionar('<?php echo $value->getApplicationId(); ?>', '<?php echo $value->getURL(); ?>');">

                            <h2 class="name-page">
                                <div class="icon">
                                    <div class="icon-page">
                                        <i class="material-icons"><?php echo $value->getNameIcon(); ?></i>
                                    </div>
                                </div>
                                <div class="page-name"><a href="<?php echo $value->getURL(); ?>"><?php echo $value->getApplicationName(); ?></a></div>
                                <div class="iconr">
                                    <div class="icon-right ">
                                        <i class="glyphicon glyphicon-menu-right"></i>
                                    </div>
                                </div>
                            </h2>
                            </a>
                            <hr style="color: gray;" />
                            <div class="infopages">
                                <p><?php echo $value->getDescription(); ?></p>
                            </div>
                            <br>
                            <div class="ingresa">
                                <a href="<?php echo $value->getURL(); ?>">Ingresá Aquí... </a>
                            </div>
                        </div>
                    <?php } ?> 


                    <div class="col-md-4" id="cajaTexto" href="http://sistemafundatec.tec.ac.cr:8080/cfmx/">
                        <a  href="http://sistemafundatec.tec.ac.cr:8080/cfmx/">
                            <h2 class="name-page">
                                <div class="icon">
                                    <div class="icon-page">
                                        <i class="material-icons">assessment</i>
                                    </div>
                                </div>
                                <div  class="page-name" id="i3">ERP</div>
                                <div class="iconr">
                                    <div class="icon-right ">
                                        <i class="glyphicon glyphicon-menu-right"></i>
                                    </div>
                                </div>
                            </h2>
                        </a>
                        <hr style="color: gray;" />
                        <div class="infopages">

                            <p>Sistema de planificación de recursos empresariales. 
                                Ejecute procesos de Recursos Humanos, autogestión, evaluaciones. 
                                Lleve el control de la contabilidad, inventarios, cuentas por pagar, cuentas por cobrar, activos fijos, punto de venta…
                            </p>
                        </div>
                        <br>
                        <div class="ingresa">
                            <a href="http://sistemafundatec.tec.ac.cr:8080/cfmx/">Ingresá Aquí... </a>
                        </div>
                    </div>

                    <div class="col-md-4" id="cajaTexto" href="https://www.facturaelectronica.cr">
                        <a href="https://www.facturaelectronica.cr">
                            <h2 class="name-page">
                                <div class="icon">
                                    <div class="icon-page">
                                        <i class="material-icons">laptop_windows</i>
                                    </div>
                                </div>
                                <div itemprop="name headline" class="page-name" id="i3">FACTURA ELECTRÓNICA</div>
                                <div class="iconr">
                                    <div class="icon-right ">
                                        <i class="glyphicon glyphicon-menu-right"></i>
                                    </div>
                                </div>
                            </h2>
                        </a>
                        <hr style="color: gray;" />
                        <div class="infopages">
                            <p>Factura Electrónica GTI es una plataforma Online, de usuario y clave, mediante la cual, cualquier contribuyente puede: generar, emitir y enviar Facturas Electrónicas, entre muchas otras cosas más, desde cualquier lugar donde se encuentre.</p>
                        </div>
                        <br>
                        <div class="ingresa">
                            <a href="https://www.facturaelectronica.cr">Ingresá Aquí... </a>
                        </div>
                    </div>

                    <div class="col-md-4" id="cajaTexto" href="https://www.inscribete.co.cr/fundatec/">
                        <a href="https://www.inscribete.co.cr/fundatec/">
                            <h2 class="name-page">
                                <div class="icon">
                                    <div class="icon-page">
                                        <i class="material-icons">edit</i>
                                    </div>
                                </div>
                                <div itemprop="name headline" class="page-name">INSCRÍBETE</div>
                                <div class="iconr">
                                    <div class="icon-right ">
                                        <i class="glyphicon glyphicon-menu-right"></i>
                                    </div>
                                </div>
                            </h2>
                        </a>
                        <hr style="color: gray;" />
                        <div class="infopages">
                            <p>FUNDATEC es un ente privado de utilidad pública y sin fines de lucro, creada en 1987 por un grupo
                                visionario de funcionarios del Tecnológico de Costa Rica (TEC), liderados por el entonces rector
                                MBA.
                            </p>
                        </div>
                        <br>
                        <div class="ingresa">
                            <a href="https://www.inscribete.co.cr/fundatec/">Ingresá Aquí... </a>
                        </div>
                    </div>

                    <div class="col-md-4" id="cajaTexto" href="https://www.tec.ac.cr/fundatec">
                        <a href="https://www.tec.ac.cr/fundatec">
                            <h2 class="name-page">
                                <div class="icon">
                                    <div class="icon-page">
                                        <i class="material-icons">&#xE80B;</i>
                                    </div>
                                </div>
                                <div itemprop="name headline" class="page-name">WEB</div>
                                <div class="iconr">
                                    <div class="icon-right ">
                                        <i class="glyphicon glyphicon-menu-right"></i>
                                    </div>
                                </div>
                            </h2>
                        </a>
                        <hr style="color: gray;" />
                        <div class="infopages">
                            <a href="https://www.tec.ac.cr/fundatec">
                                <p>
                                    <img style="width: 90%; margin-left: 10%; margin-top: 5%;" src="../../img/menu/LogoFUNDATEC.png">
                                </p>
                            </a>
                        </div>
                        <br>
                        <div class="ingresa">
                            <a href="https://www.tec.ac.cr/fundatec">Ingresá Aquí... </a>
                        </div>
                    </div>
                    <div class="col-md-4" id="cajaTexto" href="https://www.outlook.com/owa/itcr.ac.cr">
                        <a href="https://www.outlook.com/owa/itcr.ac.cr">
                            <h2 class="name-page">
                                <div class="icon">
                                    <div class="icon-page">
                                        <i class="material-icons">&#xE0BE;</i>
                                    </div>
                                </div>
                                <div itemprop="name headline" class="page-name">CORREO</div>
                                <div class="iconr">
                                    <div class="icon-right ">
                                        <i class="glyphicon glyphicon-menu-right"></i>
                                    </div>
                                </div>
                            </h2>
                        </a>
                        <hr style="color: gray;" />
                        <div class="infopages">
                            <p>
                                Correo institucional TEC. Ingrese a sus servicios en la nube de Office365, Outlook, OneDrive, SharePoint, Word, Excel, PowerPoint, OneNote.  
                            </p>

                        </div>
                        <br>
                        <div class="ingresa">
                            <a href="https://www.outlook.com/owa/itcr.ac.cr">Ingresá Aquí... </a>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <div>
            <br>
        </div>
            <footer>
                <div class="container1">
                    <br>
                    <div class="row">
                        <div class="datos-footer">
                            <p>
                            <h6>Contáctenos</h6>
                            Correo:
                            <a href="mailto:fundatec@tec.ac.cr" style="color:#FFF">fundatec@tec.ac.cr</a>
                            <br /> Teléfono: 2550-2628
                            </p>
                        </div>
                        <div class="datos-footer" style="margin-left: 5%">
                            <p>
                            <h6>Síganos en:</h6>
                            <a href="https://www.facebook.com/pages/FundaTEC/173220076069157" target="_blank">
                                <img src="../../img/menu/facebook.png" />
                            </a>
                            <a href="https://twitter.com/FundaTECcr" target="_blank">
                                <img src="../../img/menu/twitter.png" />
                            </a>
                            </p>
                        </div>
                        <div class="datos-footer">
                            <p>
                            <h6>Localizanos en:</h6>
                            <a target="_blank" href="https://www.google.co.cr/maps/place/FUNDATEC/@9.8517829,-83.9140578,17.43z/data=!4m5!3m4!1s0x8fa0dff35fbb9aaf:0xa648570af6c60974!8m2!3d9.852734!4d-83.9121097">
                                <img src="../../img/menu/google.png" />
                            </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        <script type="text/javascript">

    function redireccionar(application, url) {
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {action: 'getAplication', applicationId: application},
            success: function (response) {
                location.href = url;
            },
            error: function (err) {
                console.log(err);
            }
        });
    }



</script>
    </body>
</html>
