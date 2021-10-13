<?php

namespace App\Core;

use PDO;
use PDOException;


class Database extends Singleton
{


    public function __construct()
    {
        //share connect
        $this->ConnectDB();
    }


    private string $MYSQL_HOST = "mariadb";
    private string $MYSQL_USER = "root";
    private string $MYSQL_PASS = "root";
    private string $MYSQL_DB = "teknonews";
    private ?PDO $pdo = null;

    private function ConnectDB(): void
    {
        //database connection
        $SQL = "mysql:host=" . $this->MYSQL_HOST . ";dbname=" . $this->MYSQL_DB;

        try {
            $this->pdo = new \PDO($SQL, $this->MYSQL_USER, $this->MYSQL_PASS);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Could not connect to database<hr>" . $e->getMessage());
        }
    }


    private function myQuery($query, $params = null)
    {
        if (is_null($params)) {
            $this->stmt = $this->pdo->query($query);
        } else {
            $this->stmt = $this->pdo->prepare($query);
            $this->stmt->execute($params);
        }
        return $this->stmt;
    }


    public function limit($query, $p1 = 1, $p2 = NULL)
    {
        $this->stmt = $this->pdo->prepare($query);
        $this->stmt->bindParam(1, $p1, \PDO::PARAM_INT);
        if (!is_null($p2))
            $this->stmt->bindParam(2, $p2, \PDO::PARAM_INT);


        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }


    public function getRows($query, $params = null)
    {
        try {
            return $this->myQuery($query, $params)->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getRow($query, $params = null)
    {
        try {
            return $this->myQuery($query, $params)->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getColumn($query, $params = null)
    {
        try {

            return $this->myQuery($query, $params)->fetchColumn();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function Insert($query, $params = null)
    {
        try {
            $this->myQuery($query, $params);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function Update($query, $params = null)
    {
        try {
            return $this->myQuery($query, $params)->rowCount();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function Delete($query, $params = null)
    {
        return $this->Update($query, $params);
    }


    //FOR
    public function getRowAssoc($query, $params = null)
    {
        try {

            return $this->myQuery($query, $params)->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function __destruct()
    {
        $this->pdo = null;
    }


    public function Maintance()
    {
        $myTable = $this->pdo->query("SHOW TABLES");
        $myTable->setFetchMode(\PDO::FETCH_NUM);
        if ($myTable) {
            foreach ($myTable as $items) {
                $check = $this->pdo->query("CHECK TABLE" . $items[0]);
                $analyze = $this->pdo->query("ANALYZE TABLE" . $items[0]);
                $repair = $this->pdo->query("REPAIR TABLE" . $items[0]);
                $optimize = $this->pdo->query("OPTIMIZE TABLE" . $items[0]);
                if ($check == true && $analyze == true && $repair == true && $optimize == true) {
                    echo $items[0] . " tables done.<br>";
                } else {
                    echo "Error.<br>";
                }
            }
        }
    }

}
