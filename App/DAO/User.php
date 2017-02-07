<?php
namespace App\DAO;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class User extends \Core\Connection
{

    public function __construct()
    {
        parent::__construct();
    }

    public function isUser($name, $pass)
    {
        if ($this->prepareQuery("SELECT idUser FROM user WHERE userName LIKE '" . $name . "' AND AES_DECRYPT(userPassword, 'key') LIKE '" . $pass . "'")) {
            if ($this->execute()) {
                $toReturn = null;
                if ($this->getPrepared()->bind_result($toReturn)) {
                    while ($this->getResult()) {
                        $this->closeAll();
                        return $toReturn;
                    }
                }
            }
        }
        $this->closeAll();
        return null;
    }
}
