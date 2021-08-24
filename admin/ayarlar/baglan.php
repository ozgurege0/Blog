<?php 

error_reporting(0);

try{
    $db=new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","");
   

}catch(PDOEXception $hata){
    echo $hata->getMessage();

}

?>