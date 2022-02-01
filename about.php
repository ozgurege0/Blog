<?php

require_once('admin/ayarlar/baglan.php');

$about=$db->prepare("SELECT * FROM about where about_id=:id");
      $about->execute(array(
        'id'=>0
      ));
      $aboutcek=$about->fetch(PDO::FETCH_ASSOC);

      $sorgu=$db->prepare("SELECT * FROM seoayar where seoayar_id=:id");
      $sorgu->execute(array(
        'id'=>0
      ));
      $seoayarcek=$sorgu->fetch(PDO::FETCH_ASSOC);

      $account=$db->prepare("SELECT * FROM account");
      $account->execute();

      $ayarlar=$db->prepare("SELECT * FROM ayarlar where ayarlar_id=:id");
      $ayarlar->execute(array(
        'id'=>0
      ));
      $ayarlarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="<?php echo $ayarlarcek['ayarlar_url'] ?><?php echo $ayarlarcek['ayarlar_favicon'] ?>" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $ayarlarcek['ayarlar_url'] ?>css/style.css">
    <title>Hakkımda | <?php echo $seoayarcek['seoayar_title'] ?></title>
  </head>
  <body>
   <!-- Navbar Başlangıç -->

    <?php
require_once('includes/navbar.php');
    ?>

       <!-- Navbar Bitiş -->

<!-- Hakkımızda -->

<div class="container">
    <div class="text-center">
        <img src="<?php echo $aboutcek['about_img'] ?>" alt="asd">
        <h2><?php echo $aboutcek['about_ad'] ?></h2>
        <h5><?php echo $aboutcek['about_unvan'] ?></h5>
        <div class="shadow p-3 mb-5 bg-body rounded">

          <h1 class="hometitle" >Hakkımda</h1>

          <h5><?php echo html_entity_decode($aboutcek['about_text']) ?></h5>
       

        </div>
        
    </div>
</div>
<br>
  <!-- Footer -->
  <script src="https://kit.fontawesome.com/267d24fc8a.js" crossorigin="anonymous"></script>

  <?php
require_once('includes/footer.php');
?>