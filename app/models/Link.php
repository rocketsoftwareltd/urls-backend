<?php
require_once "../config/Database.php";

class Link extends Database{
    private $table = "links";
    // private $parameters;
    public $isset = null;

    function __construct(){
        parent::__construct();

        if(isset($_POST["submit"])){
            $this->isset == true;
        }
    }

    public function create(){ 
        if($this->isset != null){
            $short_url = $this->short_url();

            // check for short url duplicate
            $result = Database::select($this->table,  "short_url", "short_url=$short_url");
            
            if($result->num_rows > 0){
                $short_url = $this->short_url();
            }else{
                $parameters = [
                    "user_id"   => $_SESSION["user_id"],
                    "url"       => $_POST['submit'],
                    "short_url" => $short_url,
                    "created_by"=> $_SESSION["user_id"]
                ];
                
                
                // $parameters = 
                $response = Database::insert($this->table,  $parameters);
                if(!$response){
                   echo $response;
                }else{
                    Database::redirect("../../links.php?create=success");
                }
            }

        }
    }


    public function short_url(){
        $random_string = "";
        $alphanumeric  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $char_array = str_split(str_shuffle($alphanumeric));
        for($i = 0; $i < 5; $i++){
            $random_string .= $char_array[$i];
        }

        return $random_string;
    }

}