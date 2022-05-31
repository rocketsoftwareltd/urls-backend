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
            $parameters = $_POST['submit'];
            $short_url = $this->short_url();
            // $parameters = 
            $response = Database::insert($this->table, $_POST['submit']);
            if(!$response){
               echo $response;
            }else{
                Database::redirect("../../links.php?create=success");
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