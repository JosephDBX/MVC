<?php
namespace Core;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class Request
{
    private $_controller;
    private $_method;
    private $_arguments;

    public function __construct()
    {
        if (isset($_GET["url"])) {
            $url               = filter_input(INPUT_GET, "url", FILTER_SANITIZE_URL);
            $url               = explode("/", $url);
            $url               = array_filter($url);
            $this->_controller = strtolower(array_shift($url));
            $this->_method     = strtolower(array_shift($url));
            if (!$this->_method) {
                $this->_method = "index";
            } else {
                $this->_arguments = $url;
            }
        } else {
            $this->_controller = "index";
            $this->_method     = "index";
        }
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function getArguments()
    {
        return $this->_arguments;
    }

}
