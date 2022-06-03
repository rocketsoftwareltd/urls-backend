<?php
// require_once realpath(__DIR__.'/../app/config/config.php');
require_once "../app/config/Database.php";

class Admin extends Database{
    private $table = "admin";
    // private $parameters;
    public $isset = null;

    function __construct(){
        parent::__construct();

        if(isset($_POST["submit"])){
            $this->isset == true;
        }
    }

    // public function register(){ 
    //     if($this->isset != null){
           
    //         // check for short email duplicate
    //         $user_email =  $_SESSION["email"];
    //         $result = Database::select($this->table,  "email", "email=$user_email");
            
    //         if($result->num_rows > 0){
    //             Database::redirect("../../registration.php?error=duplicate&email=$user_email");
    //         }else{
    //             $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //             $parameters = [
    //                 "email"      => $_SESSION["email"],
    //                 "password"   => $hashed_password,
    //                 "group"      => 1
    //             ];
                
                
    //             // $parameters = 
    //             $response = Database::insert($this->table,  $parameters);
    //             if(!$response){
    //                echo $response;
    //             }else{
    //                 Database::redirect("../../dashboard.php?registration=success");
    //             }
    //         }

    //     }
    // }

    public function login($adminID, $password){
        $result = Database::select($this->table,  "*", "email=$adminID OR username=$adminID");
        if($result->num_rows < 1){
            return "User '$adminID' does not exist";
        }else{
            $row = $result->fetch_assoc();
            $password_verified =  password_verify($password, $row["password"]);
            if(!$password_verified){
                return "Incorrect Password";
            }else{
                // create sessions
                session_start();

                $_SESSION["admin_id"] = $adminID;
                $_SESSION["adminIsLoggedIn"] = true;

                $duration = time(60 * 60 * 24 * 365);
                setcookie("admin_id",  $adminID, $duration);
                setcookie("password", $row["password"], $duration);

                Database::redirect("index.php?login=success");
            }
        }
    }

    public function forgot_password($email){
        $base_url = BASE_URL;
        $link = "$base_url/resetpassword.php";
        $from = "rocketsoftwareltd@gmail.com";
        $to = $email;
        $subject = "Password Reset Link";
        $message = "Hello, Click the following link to reset your password: $link <br> kindly ignore this message if you didnt request to reset your password";
        // mail();
    }

    public function logout(){
        if(isset($_SESSION["isLoggedIn"])){
            if($_SESSION["isLoggedIn"] == true){
                $_SESSION["isLoggedIn"] = false;
                session_destroy();
                $this->redirect(BASE_URL."/login.php?logout=success");
            }else{
                $this->redirect(BASE_URL."/index.php");
            }
        }
    }

}