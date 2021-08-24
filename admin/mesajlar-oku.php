<?php
require_once("includes/session.php");
?>
<?php
require_once('ayarlar/baglan.php');
$sorgu=$db->prepare("SELECT * FROM mesajlar where mesajlar_id=:id");
$sorgu->execute(array(
  'id'=>$_GET['mesajlar_id']
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
                    <h1 class="h3 mb-4 text-gray-800">Mesaj Oku</h1>


                    <div class="row mt-3">
                    <div class="col-md-12">
                    <label>Yazan Kişinin Adı</label>
                    <input type="text" class="form-control" value="<?php echo $vericek['mesajlar_ad'] ?> <?php echo $vericek['mesajlar_soyad'] ?>" disabled>

                    </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-12">
                    <label>Yazan Kişinin Mail Adresi:</label>
                    <input type="text" class="form-control" value="<?php echo $vericek['mesajlar_mail'] ?>" disabled>

                    </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-12">
                    <label>Yazan Kişinin Telefon Numarası:</label>
                    <input type="text" class="form-control" value="<?php echo $vericek['mesajlar_tel'] ?>" disabled>
                    </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-12">
                    <label>Mesaj Konusu:</label>
                    <input type="text" class="form-control" value="<?php echo $vericek['mesajlar_konu'] ?>" disabled>
                    </div>
                    </div>



<div class="row mt-3">
<div class="col-md-12">
<label>Mesajı:</label>   
<div class="form-floating">
  <textarea class="form-control" disabled name="blog_seodescription" id="floatingTextarea2" style="height: 100px"><?php echo $vericek["mesajlar_mesaj"] ?></textarea>
</div>
</div>
</div>


<div class="row mt-3">
                    <div class="col-md-12">
                    <label>Mesaj Tarihi:</label>
                    <input type="text" class="form-control" value="<?php echo $vericek['mesajlar_tarih'] ?>" disabled>
                    </div>
                    </div>



                    </form>

                
                    <div class="d-flex flex-row-reverse">
  <a href="mesajlar.php"><div class="p-1"><button class="btn btn-danger">GERİ</button></div></a>
</div>
               
              
                  
                   
           
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