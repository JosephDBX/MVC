<?php
namespace Core;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class SessionManager
{
    private $_cookieManager;

    public function __construct()
    {
        $this->_cookieManager = new \Core\CookieManager();
    }

    public function addSession($name, $value = null)
    {
        if (gettype($name) == "array" && gettype($value) == "array") {
            if (count($name) == count($value)) {
                for ($i = 0; $i < count($name); $i++) {
                    $_SESSION[$name[$i]] = $value[$i];
                }
                return true;
            }
        } elseif (gettype($name) == "array" && gettype($value) == "NULL") {
            foreach ($name as $key => $val) {
                $_SESSION[$key] = $val;
            }
            return true;
        } elseif (gettype($name) == "string" && gettype($value) == "string") {
            $_SESSION[$name] = $value;
            return true;
        }
        return false;
    }

    public function addSessionCookie($name, $value = null)
    {
        $this->_cookieManager->addCookie($name, $value, time() + (365 * 24 * 60 * 60));
    }

    public function getSession($name)
    {
        return (isset($_SESSION[$name]) ? $_SESSION[$name] : null);
    }

    public function isLogin($name = null)
    {
        if (gettype($name) == "NULL") {
            if (count($_SESSION) > 0) {
                return true;
            }
        } elseif (gettype($name) == "array") {
            foreach ($name as $value) {
                if (!isset($_SESSION[$value])) {
                    return false;
                }
            }
            return true;
        } elseif (gettype($name) == "string") {
            if (isset($_SESSION[$name])) {
                return true;
            }
        }
        return false;
    }

    public function isLoginCookie($name)
    {
        if (gettype($name) == "array") {
            $values = [];
            foreach ($name as $value) {
                $tm = $this->_cookieManager->getCookie($value);
                echo $tm;
                if (gettype($tm) == "NULL") {
                    return false;
                }
                array_push($values, $tm);
            }
            $user = new \App\DAO\User;
            $id   = null;
            if (($id = $user->isUser($values[1], $values[2])) == $values[0]) {
                $this->addSession($name, $values);
                return true;
            }
        } elseif (gettype($name) == "string") {
            $tm = $this->_cookieManager->getCookie($name);
            if (gettype($tm) == "NULL") {
                return false;
            }
            $this->addSession($name, $tm);
            return true;
        }
        return false;
    }

    public function logout()
    {
        $this->_cookieManager->logout($_SESSION);
        session_unset();
        session_destroy();
    }

    public function redirect($url = "")
    {
        header("Location: " . $url);
    }
}
