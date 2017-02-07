<?php
namespace Core;

defined('ROOT') or die("Access Denied");
/**
 * JosephDBX
 */
class View
{
    protected $data;

    public function render($controller, $template, $onlyView = false)
    {
        if (!file_exists("../App/View/" . $controller . "/" . $template . ".php")) {
            if ($onlyView) {
                require_once "../App/View/404.php";
            } else {
                require "../App/Prefabs/Basic/Start.php";
                require_once "../App/View/404.php";
                require "../App/Prefabs/Basic/End.php";
            }

            return;
        }
        ob_start();
        extract($this->data);
        include_once "../App/View/" . $controller . "/" . $template . ".php";
        $str = ob_get_contents();
        ob_end_clean();
        if ($onlyView) {
            echo $str;
        } else {
            require "../App/Prefabs/Basic/Start.php";
            echo $str;
            require "../App/Prefabs/Basic/End.php";
        }

    }

    public function renderPrefab($template)
    {
        if (!file_exists("../App/Prefabs/" . $template . ".php")) {
            require_once "../App/View/404.php";

            return;
        }
        ob_start();
        extract($this->data);
        include_once "../App/Prefabs/" . $template . ".php";
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }

    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }
}
