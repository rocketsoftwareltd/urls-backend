<?php

// require_once "app/config/Db.php";

// $array = [
//     'username' => "Faith",
//     'password' => "@#$%^",
//     'gender'   => "male"
// ];

// $array = [2, 4, 6, 8, 0];

// $array = "gender => male";

// $new_array = array_push($array, "Pilemon");

// print_r($array);

// echo "<br><br><br>";

// $new_array = [
//     "username = Faith",
//     "password = @#$%^",
//     "gender   = male"
// ];

// print_r($array);

// echo "<br><br><br>";

// $imploded = "'".implode("', '", $array)."'";

// echo $imploded;


// $alphanumeric = md5("faith");


// echo "The hashed version of <strong>faith</strong> is <br>". $alphanumeric;

// $alphanumeric  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
// $char_array = str_split($alphanumeric);
// $random_string = "";
// $lower_limit = rand(1, 57);
// $count = 0;

// for($i = $lower_limit; $i <= strlen($alphanumeric); $i++){
//     $rand = rand(0, 61);
//     $random_string .= $char_array[$rand];
//     $count++;
//     if($count == 5){
//         break;
//     }
// }


// $char_array = str_split(str_shuffle($alphanumeric));
// for($i = 0; $i < 5; $i++){
//     $random_string .= $char_array[$i];
// }


// echo "<br>". $random_string;


// $hashed_password = password_hash("1234", PASSWORD_DEFAULT);

// echo $hashed_password;