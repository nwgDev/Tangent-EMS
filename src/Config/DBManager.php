<?php
namespace TANGENT\Config;

include_once 'config.php';

class DBManager
{
    private static $_instance = null;
    private $_username = DB_USERNAME;
    private $_password = DB_PASSWORD;
    private $_db_name = DB_NAME;
    private $_host = DB_HOST;
    private $_conn;

    private function __construct(){
        $this->createConnection();
    }

    public function __clone()
    {
        trigger_error('Clone is not allowed.',E_USER_ERROR);
    }

    private function createConnection()
    {
        $this->_conn = mysqli_connect(
            $this->_host,
            $this->_username,
            $this->_password)
        or die("DBManager connection Error:".mysqli_connect_error());

        mysqli_select_db($this->_conn ,$this->_db_name) or die("Specified database open failed");
        mysqli_set_charset($this->_conn,'utf-8');
    }

    public static function getInstance() {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function query($sql){
        return mysqli_query($this->_conn ,$sql);
    }

    public function create($table ,$array)
    {
        if ( is_array($array) )
        {
            $columns = '';
            $values = '';

            foreach ( $array as $column_key => $column_value)
            {
                $columns .= $column_key.',';
                $values .= "'".$column_value."'".',';
            }

            $columns = trim($columns ,',');
            $values = trim($values ,',');

            $sql= "INSERT INTO $table ($columns) VALUES ($values)";

            return $this->query($sql);;
        }
        return false;
    }

    public function update($table ,$arr, $where)
    {
        if ( is_array($arr) )
        {
            $data = '';
            foreach ($arr as $column => $value) {
                $data .= "`".$column."`='".$value."',";
            }

            $data = trim($data ,',');

            $sql = "UPDATE $table SET $data WHERE $where";

            return $this->query($sql);
        }
        return false;
    }

    public function delete($table ,$where )
    {
        // Disable foreign key checks to allow deletion without constraints
        $this->query("SET FOREIGN_KEY_CHECKS=0");

        $sql_response = "DELETE FROM $table WHERE $where";

        if ( $this->query($sql_response) )
        {
            $this->query("SET FOREIGN_KEY_CHECKS=1");
            return $this->query($sql_response);
        }

        // Enable foreign key checks
        $this->query("SET FOREIGN_KEY_CHECKS=1");

        return $this->query($sql_response);
    }

    public function exists($table, $array){
        if ( is_array($array) )
        {
            $column = '';
            $value = '';

            foreach ( $array as $column_key => $column_value)
            {
                $column .= $column_key;
                $value .= "'".$column_value."'";
            }

            $exists = $this->query("SELECT $column FROM $table WHERE $column=$value");

            if(!$exists){
                return false;
            }

            if(mysqli_num_rows($exists) > 0){
                return true;
            }
        }
        return false;
    }

    function __destruct ()
    {
        mysqli_close($this->_conn);
    }
}