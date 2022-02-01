<?php
require_once('ayarlar/baglan.php');

@ob_start();
@session_start();

      $sorgu=$db->prepare("SELECT * FROM user where admin_id=:id and admin_kullanici=:kullanici");
      $sorgu->execute(array(
        'id'=>0,
        'kullanici'=>$_SESSION['admin_kullanici']
      ));
      
      $vericek=$sorgu->fetch(PDO::FETCH_ASSOC);
      $kontrol=$sorgu->rowCount();

      if($kontrol==0){
        header("Location:login.php");
        exit;
      }
?>