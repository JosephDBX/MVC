<?php
namespace App\DAO;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class Rol extends \Core\Connection
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getRolUser($idUser)
    {
        if ($this->prepareQuery("SELECT r.idRol, r.rolName, r.idRolParent, r.rolIsParent FROM rol AS r INNER JOIN user_has_rol AS ur ON r.idRol = ur.rol_idRol WHERE r.rolState = 1 AND ur.user_idUser = " . $idUser)) {
            if ($this->execute()) {
                $id;
                $name;
                $parent;
                $isParent;
                if ($this->getPrepared()->bind_result($id, $name, $parent, $isParent)) {
                    $toReturn = [];
                    while ($this->getResult()) {
                        array_push($toReturn, [$id, $name, $parent, $isParent]);
                    }
                    $this->closeAll();
                    return $toReturn;
                }
            }
        }
        $this->closeAll();
        return null;
    }
}
