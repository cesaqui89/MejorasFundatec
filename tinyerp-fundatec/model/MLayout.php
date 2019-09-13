<?php

/**
 * Description of MLogin
 *
 */
require_once '../../../utilities/utilities.php';
class MenuItem {

    //propiedades
    public $ProcessId;
    public $Code;
    public $NameMainProcess;
    public $DescriptionMainProcess;
    public $urlItem;
    public $ImageIcon;
    public $NameDetailProcess;
    public $View;
    public $Controler;
    public $RawUrl;
    public $CodeDetail;
    
};
class MLayout {
      public function getMenu() {    
        $utilitiesAux = new Utilities();
        $_SESSION['menuModulo'] ="";
//        $menuPadre = new MenuItem();
//        $menuPadre->ProcessId =1;
//        $menuPadre->Code =1;
//        $menuPadre->NameMainProcess="PADRE NAME";
//        $menuPadre->DescriptionMainProcess="PADRE DESCRIPTION";
//        $menuPadre->urlItem="/modules/index";
//        $menuPadre->ImageIcon="fa fa-plus";
//        $menuPadre->NameDetailProcess="HIJO NAME";
//        $menuPadre->View="index.php";
//        $menuPadre->Controler="Assets";
//        $menuPadre->RawUrl="http:www.google.com";
//        $menuPadre->CodeDetail=2;
//        
//        $menuHijo = new MenuItem();
//        $menuHijo->ProcessId =2;
//        $menuHijo->Code =2;
//        $menuHijo->NameMainProcess="HIJO NAME";
//        $menuHijo->DescriptionMainProcess="HIJO DESCRIPTION";
//        $menuHijo->urlItem="/modules/hijo/index";
//        $menuHijo->ImageIcon="fa fa-minus";
//        $menuHijo->NameDetailProcess="HIJO NAME";
//        $menuHijo->View="index.php";
//        $menuHijo->Controler="Assets";
//        $menuHijo->RawUrl="http:www.google.com";
//        $menuHijo->CodeDetail=2;
        
        $_SESSION['menuModulo']=array(
            array(1,
                1,
                "PADRE",
                "PADRE DESCRIPTION",
                "/modules/index",
                "fa fa-plus",
                "HIJO NAME",
                'index.php',
                'Controller',
                null,
                2
                ),
             array(2,
                2,
                "HIJO NAME",
                null,
                "/modules/index",
                "fa fa-plus",
                null,
                'index.php',
                'Controller',
                'assets/index/',
                null
                ),
            );
        
//        $datos = array($menuPadre,$menuHijo);
        //DATOS INVENTADOS
//        try {
//            $client = new SoapClient($utilitiesAux->getWSDLLogIn());
//            $parametros = array('userName' => $_SESSION['username'], 'applicationID' => (string)$_SESSION['applicationGlobal']);
//            $result = $client->GetMenu($parametros);
//
//            if (empty($result->GetMenuResult->WCFDetailProcess)) {
//                $_SESSION['menuModulo'] = "";
//            } else {                
//                if(count($result->GetMenuResult->WCFDetailProcess) == 1 ){
//                    $arrayAux = $result->GetMenuResult;
//                }else{
//                    $arrayAux = $result->GetMenuResult->WCFDetailProcess;
//                }
//                foreach ($datos as $key => $value) {
//                    $_SESSION['menuModulo'][] = array(
//                        $value->ProcessId,
//                        $value->Code,
//                        $value->NameMainProcess,
//                        $value->DescriptionMainProcess,
//                        $value->urlItem,
//                        $value->ImageIcon,
//                        $value->NameDetailProcess,
//                        $value->View,
//                        $value->Controler,
//                        $value->RawUrl,
//                        $value->CodeDetail);
//                }
//            }
//        } catch (Exception $e) {
//             $_SESSION['menuModulo']= "";
//            print "Caught exception: " . $e->getMessage() . "\n";
//        }
    }
}

//fin del class
