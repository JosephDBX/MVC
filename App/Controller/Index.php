<?php
namespace App\Controller;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class Index
{
    private $_view;
    private $_sm;

    public function __construct()
    {
        $this->_view = new \Core\View();
        $this->_sm   = new \Core\SessionManager();
    }

    public function index()
    {
        if ($this->_sm->isLogin(PARAMS)) {
            $rol = new \App\DAO\Rol();
            $menu = $rol->getRolUser($this->_sm->getSession("idUser"));
            $this->_view->set("title", "Portal MVC");
            $this->_view->set("menu", $menu);
            $this->_view->set("user", $this->_sm->getSession("user"));
            $this->_view->set("password", $this->_sm->getSession("password"));
            $this->_view->set("id", $this->_sm->getSession("idUser"));
            $this->_view->render("index", "index");
        } else {
            $this->_sm->redirect("/login");
        }
    }
}
