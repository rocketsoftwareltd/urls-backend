<?php 

class Model{
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $created_at;
    private $created_by;
    private $updated_at;
    private $updated_by;

    // public function create($table, $cols, $request){
    //     $sql ="INSERT INTO $table ($cols[first_name], $cols[last_name], $cols[username])"
    // }

    public function showAll($table){
        $sql = "SELECT * FROM $table";
        $result =  mysqli_query($this->connection, $sql);
        if(!$result){
            mysqli_error($this->connection);
        }else{
            return $result;
        }
    }


    public function show($id, $table){
        $sql = "SELECT * FROM $table WHERE id =  $id";
        $result =  mysqli_query($this->connection, $sql);
        if(!$result){
            mysqli_error($this->connection);
        }else{
            return $result;
        }
    }


    public function remove($id, $table){
        $sql = "DELETE FROM $table WHERE id =  $id";
        $result =  mysqli_query($this->connection, $sql);
        if(!$result){
            mysqli_error($this->connection);
        }
    }
}