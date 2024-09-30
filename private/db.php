<?php 

 // $host="127.0.0.1:3306";
 // $username="u451265695_roe2";
 // $password="Honda141312";
 // $dbname="u451265695_app2";

 $host="localhost";
 $username="root";
 $password="";
 $dbname="thesis_fyp";

 $db=mysqli_connect($host,$username,$password,$dbname);

if (!$db) {
 echo("Database Connection Failded");	
}

?>