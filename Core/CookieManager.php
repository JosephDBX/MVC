<?php
namespace Core;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class CookieManager
{

    public function addCookie($name, $value, $time)
    {
        if (gettype($name) == "array" && gettype($value) == "array" && gettype($time) == "array") {
            if (count($name) == count($value) && count($name) == count($time)) {
                for ($i = 0; $i < count($name); $i++) {
                    setcookie($name[$i], $value[$i], $time[$i]);
                }
                return true;
            }
        } elseif (gettype($name) == "string" && gettype($value) == "string" && gettype($time) == "integer") {
            setcookie($name, $value, $time);
            return true;
        } elseif (gettype($name) == "array" && gettype($value) == "array" && gettype($time) == "integer") {
            for ($i = 0; $i < count($name); $i++) {
                setcookie($name[$i], $value[$i], $time);
            }
            return true;
        } elseif (gettype($name) == "array" && gettype($value) == "NULL" && gettype($time) == "integer") {
            foreach ($name as $key => $val) {
                setcookie($key, $val, $time);
            }
            return true;
        }
        return false;
    }

    public function getCookie($name)
    {
        return (isset($_COOKIE[$name]) ? $_COOKIE[$name] : null);
    }

    public function removeCookie($name, $route)
    {
        if (gettype($name) == "array" && gettype($route) == "array") {
            if (count($name) == count($route)) {
                for ($i = 0; $i < count($name); $i++) {
                    setcookie($name[$i], "", time() - 360, $route[$i]);
                }
                return true;
            }
        } elseif (gettype($name) == "array" && gettype($route) == "string") {
            for ($i = 0; $i < count($name); $i++) {
                setcookie($name[$i], "", time() - 360, $route);
            }
            return true;
        } elseif (gettype($name) == "string" && gettype($route) == "array") {
            for ($i = 0; $i < count($route); $i++) {
                setcookie($name, "", time() - 360, $route[$i]);
            }
            return true;
        } elseif (gettype($name) == "string" && gettype($route) == "string") {
            setcookie($name, "", time() - 360, $route);
            return true;
        }
        return false;
    }

    public function logout($name)
    {
        if (gettype($name) == "array") {
            foreach ($name as $key => $value) {
                setcookie($key, "", time() - 360);
            }
        }
    }
}
