<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 27/11/14
 * Time: 21:46
 */

class DBHandler {

    public function __construct()
    {
        //Db connect
        $this->old_pdo = new PDO(
            'mysql:host=localhost;dbname=vyper_old', 'root', 'vagrant',
            array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8')
        );
        $this->old_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=vyper', 'root', 'vagrant',
            array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8')
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function selectOLD($params = array()){

        $columns = (isset($params['columns']))?$params['columns']:'*';
        $table   = (isset($params['table']))?$params['table']:strtolower(get_class($this)).'s';
        $orderBy = (isset($params['orderBy']))?"ORDER BY " . $params['orderBy']:'';

        //set fetch mode
        $fetchMode = (isset($params['fetchMode'])) ? $params['fetchMode'] : PDO::FETCH_OBJ ;

        $where = "";

        // prepare query fields requested
        if (is_array($columns)){
            $columns = implode(', ', $columns);
        }

        // prepare where clause
        if (isset($params['where'])){
            if (sizeof($params['where']) > 1) {
                $where = "WHERE 1 = 1 ";
                foreach ($params['where'] as $col => $val){
                    $where .= "AND `$col` = $val ";
                }
            }else{
                $where = "WHERE `" . key($params['where']) ."` = '". current($params['where']) . "'";
            }
        }

        // prepare request
        $query = $this->old_pdo->prepare("SELECT {$columns} FROM `{$table}` {$where} {$orderBy} ");

        if (isset($params['where'])){
            foreach ($params['where'] as $col => &$val){
                $query->bindParam(":{$col}", $val);
            }
        }

        $query->execute();

        if ($query->rowcount() > 1) {
            $results = array();
            while($fetch = $query->fetch($fetchMode)){
                $results[] = $fetch;
            };

            return $results;
        }else{
            $fetch = $query->fetch($fetchMode);
            $result = array($fetch);

            return $result;
        }
    }

    public function select($params = array()){

        $columns = (isset($params['columns']))?$params['columns']:'*';
        $table   = (isset($params['table']))?$params['table']:strtolower(get_class($this)).'s';
        $orderBy = (isset($params['orderBy']))?"ORDER BY " . $params['orderBy']:'';

        //set fetch mode
        $fetchMode = (isset($params['fetchMode'])) ? $params['fetchMode'] : PDO::FETCH_OBJ ;

        $where = "";

        // prepare query fields requested
        if (is_array($columns)){
            $columns = implode(', ', $columns);
        }

        // prepare where clause
        if (isset($params['where'])){
            if (sizeof($params['where']) > 1) {
                $where = "WHERE 1 = 1 ";
                foreach ($params['where'] as $col => $val){
                    $where .= "AND `$col` = $val ";
                }
            }else{
                $where = "WHERE `" . key($params['where']) ."` = '". current($params['where']) . "'";
            }
        }

        // prepare request
        $query = $this->pdo->prepare("SELECT {$columns} FROM `{$table}` {$where} {$orderBy} ");

        if (isset($params['where'])){
            foreach ($params['where'] as $col => &$val){
                $query->bindParam(":{$col}", $val);
            }
        }

        $query->execute();

        if ($query->rowcount() > 1) {
            $results = array();
            while($fetch = $query->fetch($fetchMode)){
                $results[] = $fetch;
            };

            return $results;
        }else{
            $fetch = $query->fetch($fetchMode);
            $result = array($fetch);

            return $result;
        }
    }
} 