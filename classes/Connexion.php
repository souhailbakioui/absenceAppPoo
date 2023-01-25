<?php

class Connexion{

static $link=mysqli_connect("localhost","root","","'tp_3'");
static function Connexion($dbname,$server="localhost",$user="root",$password="")
{
return mysqli_connect($server,$user,$password,$dbname);		
}
static function login($myusername,$mypassword)
{
    $sql = "SELECT id FROM prof WHERE name = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query(Connexion::Connexion('tp_3'),$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    var_dump($row);
}

public function getPath()
{
    $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    return $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);
}
}
