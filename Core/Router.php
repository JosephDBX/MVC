<?php
namespace Core;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class Router
{

    public function __construct($request)
    {
        $controller = $request->getController();
        $patch      = "../App/Controller/" . $controller . ".php";
        $method     = $request->getMethod();
        $arguments  = $request->getArguments();
        if (is_readable($patch)) {
            $controller = "App\Controller\\" . $controller;
            $controller = new $controller;
            if (!method_exists($controller, $method)) {
                $this->showError();
                return;
            }
            if (!isset($arguments)) {
                call_user_func(array($controller, $method));
            } else {
                call_user_func_array(array($controller, $method), $arguments);
            }
        } else {
            $this->showError();
        }
    }

    private function showError()
    {
        require "../App/Prefabs/Basic/Start.php";
        include "../App/View/404.php";
        require "../App/Prefabs/Basic/End.php";
    }
}
