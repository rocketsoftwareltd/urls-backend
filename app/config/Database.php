<?php

class Database {
    // private $host = 
    private $username = "root";
    private $password = "";
    private $db_name = "url_shortener";
    private $connection;


    function __construct()
    {
        $this->connection = new mysqli($_SERVER["SERVER_NAME"], $this->username, $this->password, $this->db_name);
        if(!$this->connection){
            echo "Error in Database connection";
        }
    }

    public function insert($table, $parameters = []){
        if($this->tableExist($table)){

            $array_keys = array_keys($parameters);
            $colums = "`".implode("`, `", $array_keys)."`";
            $values = "'".implode("', '", $parameters)."'";

            $sql = "INSERT INTO $table ($colums) VALUES($values)";
            // echo $sql;
            $result = $this->connection->query($sql);
            if(!$result){
                $this->connection->error;
            }else{
                return true;
            }
        }else{
            echo "Table $table does not exit";
        }
    }

    public function select($table, $rows = "*", $where = null, $order_by = null){

        if($this->tableExist($table)){
            $sql = "SELECT $rows FROM $table";
            if($where != null){
                $sql .= " WHERE $where";
            }

            if($order_by != null){
                $sql .= "WHERE $order_by";
            }

    
            $result = $this->connection->query($sql);
            if(!$result){
                $this->connection->error;
            }else{
                return $result;
            }
        }
    }

    public function update($table, $parameters = [], $where = null){
        if($this->tableExist($table)){
           
            $fields_and_values = [];
            foreach($parameters as $column=>$value){

                $fields_and_values[] = $column."='".$value."'";

            }

            $set_columns = implode(", ", $fields_and_values);

            $sql = "UPDATE $table SET $set_columns WHERE $where";
            $result = $this->connection->query($sql);
            if(!$result){
                $this->connection->error;
            }else{
                return true;
            }
        }
    }

    public function delete($table, $where){
        
    }


    public function redirect($new_location){
        header("Location: ". $new_location);
        exit;
    }

    public function safe_data($data){
        return $this->connection->real_escape_string(trim($data));
    }

    private function tableExist($table){
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $result = $this->connection->query($sql);
        if(!$result){
            $this->connection->error;
        }else{
            if($result->num_rows == 1){
                return true;
            }else{
                return false;
            }
        }
    }

    public function validate($data, $options = []){

        if(empty($data)){
            return "Required field missing";
        }else{

            $sanitized_data = $this->safe_data($data);
            if($options["max"] != null){
                if(strlen($sanitized_data) > $options["max"]){
                    $max_val =  $options["max"];
                    return "Field value cannot be more than $max_val";
                }
            }
        }

    }

}