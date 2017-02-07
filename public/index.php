<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(__DIR__) . "/");
define("APP", ROOT . "App/");
define("PRE", APP . "Prefabs/");
define("PARAMS", ["idUser", "user", "password"]);
session_start();
include_once "../Core/Autoload.php";
new Core\Autoload();
new Core\ErrorUser();
//Utilizar en fase de desarrollo
//new Core\ErrorDeveloper();
new Core\Router(new Core\Request());
/*trigger_error("TEXTO", E_USER_NOTICE);
//trigger_error("TEXTO", E_USER_WARNING);
//trigger_error("TEXTO", E_USER_ERROR);
//$db = new App\DAO\Rol();
//$date = null;
//if ($db->prepareQuery("SELECT CURTIME()")) {
//    if ($db->execute()) {
//        if ($db->getPrepared()->bind_result($date)) {
//            while ($db->getResult()) {
//                echo $date;
//            }
//        }
//    }
//}*/
