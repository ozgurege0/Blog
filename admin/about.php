<?php
require_once("includes/session.php");
?>
<?php

require_once("ayarlar/baglan.php");

$about=$db->prepare("SELECT * FROM about where about_id=:id");
$about->execute(array(
        'id'=>0
      ));
$vericek=$about->fetch(PDO::FETCH_ASSOC);

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
                    <h1 class="h3 mb-4 text-gray-800">Hakkımızda Düzenle</h1>

                    <form action="ayarlar/islem.php" enctype="multipart/form-data" method="post">

                    <div class="row mt-3">
<div class="col-md-12">
<p><label>Mevcut Resim: <img src="../<?php echo $vericek["about_img"] ?>" alt="" class="img-fluid rounded" width="250px"></label></p>
<input type="file" name="about_img">
</div>
</div>

                    <div class="row mt-3">
                    <div class="col-md-6">
                    <label>Adınız Soyadınız:</label>
                    <input type="text" class="form-control rounded" value="<?php echo $vericek['about_ad'] ?>" name="about_ad">
                    </div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6">
                    <label>Ünvanınız:</label>
                    <input type="text" class="form-control rounded" value="<?php echo $vericek['about_unvan'] ?>" name="about_unvan">
                    </div>
                    </div>

                    <div class="row mt-5">
                  <div class="col-md-12">
                  <p><label>Hakkımızda Yazısı:</label></p>
                  <textarea id="summernote" class="form-control" name="about_text"><?php echo$vericek['about_text']  ?></textarea>
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>

                   

                   

 

            <button name="aboutkaydet" class="btn btn-primary mt-5">KAYDET</button>                 
                   

                    </form>

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

            </div>  </div>  </div>
            <!-- End of Main Content -->

            <!-- Footer -->
         <?php
require_once('includes/footer.php');
         ?>
            <!-- Footer Bitiş --> 
 <script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
</body>

</html>