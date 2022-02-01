<?php
require_once("includes/session.php");
?>
<?php
require_once('ayarlar/baglan.php');
$sorgu=$db->prepare("SELECT * FROM account where account_id=:id");
$sorgu->execute(array(
  'id'=>$_GET['account_id']
));
$vericek=$sorgu->fetch(PDO::FETCH_ASSOC);

  

require_once('includes/header.php');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
require_once('includes/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require_once('includes/navbar.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Hesap Düzenle</h1>

                    <form action="ayarlar/islem.php" method="post">

<div class="row mt-3">
<div class="col-md-12">
<label>Hesap İkonu:(İkon kullanımı için <a target="blank" href="index.php">buradaki</a> ikon kullanımı yazısına göz atın.)</label>   
<input class="form-control rounded" name="account_icon" value="<?php echo  $vericek['account_icon'] ?>">
</div>
</div>



<div class="row mt-3">
<div class="col-md-12">
<label>Hesap Linki:</label>   
<input class="form-control rounded" name="account_link" value="<?php echo $vericek['account_link'] ?>">
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<label>Platformun Adı:</label>   
<input class="form-control rounded" name="account_platform" value="<?php echo $vericek['account_platform'] ?>">
</div>
</div>

<button name="accountduzenle" class="btn btn-primary mt-3">Düzenle</button>                 

<input type="hidden" name="account_id" value="<?php echo $vericek['account_id'] ?>">
</form>
               
            
                    </form>

                
                    <div class="d-flex flex-row-reverse">
  <a href="account.php"><div class="p-1"><button class="btn btn-danger">GERİ</button></div></a>
</div>
               
              
                  
                    <?php 
            
            if(@$_GET["islem"]=="basarili"){
                echo '<div class="alert alert-success solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <strong>Başarılı!</strong> Tebrikler, veri Güncellendi.
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>';
            }elseif(@$_GET["islem"]=="basarisiz"){
                echo ' <div class="alert alert-danger solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                <strong>Başarısz!</strong> İşlem başarısız oldu. Lütfen tekrar deneyiniz.
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>';
            }
            
            ?>
           
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

                 <!-- Footer -->
                 <?php
require_once('includes/footer.php');
         ?>
            <!-- Footer Bitiş --> 
          
</body>

</html>