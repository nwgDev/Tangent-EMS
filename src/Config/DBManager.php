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

    // prevent external code to create new instance
    private function __construct(){
        $this->createConnection();
    }

    // Prevent users from copying object instances
    public function __clone()
    {
        trigger_error('Clone is not allowed.',E_USER_ERROR);
    }

    //create db connection
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

    /**
     * @return DBManager|null
     */
    public static function getInstance() {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * @param $sql
     * @return bool|\mysqli_result
     */
    public function query($sql){
        return mysqli_query($this->_conn ,$sql);
    }

    /**
     * @param $table
     * @param $array
     * @return int|string
     */
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

    /**
     * @param $table
     * @param $arr
     * @param $where
     * @return bool|\mysqli_result
     */
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

    /**
     * @param $table
     * @param $where
     * @return bool|\mysqli_result
     */
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

    /**
     * @param $table
     * @param $array
     * @return bool
     */
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

    /**
     * close the connection
     */
    function __destruct ()
    {
        mysqli_close($this->_conn);
    }
}