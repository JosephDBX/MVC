<?php
namespace App\Controller;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class Login
{
    private $view;
    private $sManager;

    public function __construct()
    {
        $this->view     = new \Core\View;
        $this->sManager = new \Core\SessionManager;
    }

    public function index()
    {
        if ($this->sManager->isLogin(PARAMS) || $this->sManager->isLoginCookie(PARAMS)) {
            $this->sManager->redirect("/");
        }
        $this->view->set("title", "Login");
        $this->view->render("login", "index");
    }

    public function loginAutoUser()
    {

    }

    public function submit()
    {
        if ($_POST) {
            if ($_POST["user"]) {
                if ($_POST["password"]) {
                    $remind = false;
                    if (isset($_POST["remind"])) {
                        $remind = true;
                    }
                    $user = new \App\DAO\User;
                    $id   = null;
                    if (($id = $user->isUser($_POST["user"], $_POST["password"])) > 0) {
                        $values = [$id, $_POST["user"], $_POST["password"]];
                        $this->sManager->addSession(PARAMS, $values);
                        if ($remind) {
                            $this->sManager->addSessionCookie(PARAMS, $values);
                        }
                        $toReturn         = new \stdClass();
                        $toReturn->ok     = true;
                        $toReturn->toMove = "/";
                        echo json_encode($toReturn);
                    } else {
                        trigger_error("Usuario o contraseña incorrecta", E_USER_NOTICE);
                    }
                } else {
                    trigger_error("Contraseña requerida", E_USER_NOTICE);
                }

            } else {
                trigger_error("Nombre de usuario requerido", E_USER_NOTICE);
            }
        } else {
            $this->sManager->redirect();
        }
    }

    public function logout()
    {
        $this->sManager->logout();
        $toReturn         = new \stdClass();
        $toReturn->ok     = true;
        $toReturn->toMove = "/index/";
        echo json_encode($toReturn);
    }
}
