<?php
namespace Core;

defined("ROOT") or die("Access Denied");
/**
 * JosephDBX
 */
class Connection
{
    private $_connection;
    private $_query;

    public function __construct()
    {
        $config            = parse_ini_file("../App/Config/Config.ini");
        $dbHost            = $config["host"];
        $dbUser            = $config["user"];
        $dbPassword        = $config["password"];
        $dbName            = $config["database"];
        $this->_connection = new \mysqli($dbHost, $dbUser, $dbPassword, $dbName);
        if ($this->_connection->connect_errno) {
            trigger_error("Error to connect to MySQL: " . $this->_connection->connect_error, E_USER_ERROR);
            return;
        }
        if (!$this->_connection->set_charset("utf8")) {
            return;
        }
    }

    public function prepareQuery($query)
    {
        if (!($this->_query = $this->_connection->prepare($query))) {
            trigger_error("Preparation failed: " . $this->_connection->connect_error, E_USER_ERROR);
            return false;
        }
        return true;
    }

    public function getPrepared()
    {
        //utilizar el método:
        //"getPrepared()->bind_param('type(idsb)', 'value integer', 'value desimal', 'value string', 'value boolean');"
        //construir consulta con "?" y utilizar método detro de un condicional "if"
        //utilizar el método: "execute();"
        //utilizar el método: "getPrepared()->bind_result($var1, $var2, ...);" dentro de un condicional "if"
        return $this->_query;
    }

    public function execute()
    {
        if (!$this->_query->execute()) {
            trigger_error("Execution failed: " . $this->_query->error, E_USER_ERROR);
            return false;
        }
        return true;
    }

    public function getResult()
    {
        return $this->_query->fetch();
    }

    public function closeQuery()
    {
        $this->_query->close();
    }

    public function closeConnection()
    {
        $this->_connection->close();
    }

    public function closeAll()
    {
        $this->closeQuery();
        $this->closeConnection();
    }
}
