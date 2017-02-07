<?php
namespace Core;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class Autoload
{
    public function __construct()
    {
        spl_autoload_register(function ($class) {
            $filename = ROOT . str_replace("\\", "/", $class . ".php");
            if (is_file($filename)) {
                include_once $filename;
            }
        });
    }
    public function str()
    {
        echo "Hola Mundo";
    }
}
