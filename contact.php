<?php 
require_once('admin/ayarlar/baglan.php');

$info=$db->prepare("SELECT * FROM info where info_id=:id");
      $info->execute(array(
        'id'=>0
      ));
      $infocek=$info->fetch(PDO::FETCH_ASSOC);

require_once('includes/header.php');
?>
  <body>
   <!-- Navbar Başlangıç -->

    <?php 
require_once('includes/navbar.php');
    ?>
      

       <!-- Navbar Bitiş -->


<div class="container">
    <h2 class="text-center hometitle mt-5" >İletişim</h2>
    <p class="text-center">Benimle bu form yada iletişim bilgilerim aracılığıyla iletişime geçebilirsiniz.</p>

    <div class="card">

        <div class="card-body">
         <div class="container">
             <div class="row">
                 <div class="col-md-4">
                    <i class="fas fa-phone"></i> İş Telefonum: <?php echo $infocek['info_tel'] ?>
                 </div>
                 <div class="col-md-4">
                    <i class="fas fa-envelope"></i> İş Mail Adresim: <?php echo $infocek['info_mail'] ?>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-map-marker-alt"></i>  İş Yeri Adresim: <?php echo $infocek['info_adres'] ?>
                </div>
            </div>
         </div>
        </div>
      </div>


<form action="admin/ayarlar/islem.php" method="post">
    <div class="row mt-5">
        <div class="col-md-6">
            <input class="form-control" type="text" placeholder="Adınız..." name="mesajlar_ad">
            </div>
            <div class="col-md-6">
            <input class="form-control" type="text" placeholder="Soyadınız..." name="mesajlar_soyad">
        </div>
        <div class="col-md-6 mt-3">
            <input class="form-control" type="text" placeholder="Mail Adresiniz..." name="mesajlar_mail">
        </div>
        <div class="col-md-6 mt-3">
            <input class="form-control" type="text" placeholder="Telefon Numaranız..." name="mesajlar_tel">
        </div>
        <div class="col-md-12 mt-3">
            <input class="form-control" type="text" placeholder="Konunuz..." name="mesajlar_konu">
        </div>
        <div class="col-md-12 mt-3">
     <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="mesajlar_mesaj"></textarea>
            <label for="floatingTextarea2">Mesajınız...</label>
          </div>
          <button class="btn btn-primary mt-4 btn-lg" name="contact" type="submit">Gönder</button>
          </form>
        </div>
    </div>
    </div>
</div>
<div class="container">
<?php 
            
            if(@$_GET["islem"]=="basarili"){
                echo '<div class="alert alert-success solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <strong>Başarılı!</strong> Tebrikler, mesajınız iletildi.
                <a href="contact.php"><button type="button" class="btn btn-success" data-dismiss="alert" aria-label="Close"><span><i class="fas fa-times"></i></span>
                </button></a>
            </div>';
            }elseif(@$_GET["islem"]=="basarisiz"){
                echo ' <div class="alert alert-danger solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                <strong>Başarısz!</strong> İşlem başarısız oldu. Lütfen tekrar deneyiniz.
                <a href="contact.php"><button type="button" class="btn btn-danger" data-dismiss="alert" aria-label="Close"><span><i class="fas fa-times"></i></span>
                </button></a>
            </div>';
            }
            
            ?>
</div>

  <!-- Footer -->

  <?php
require_once('includes/footer.php');
?>
