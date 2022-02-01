<?php
require_once("includes/session.php");
?>
<?php
require_once('ayarlar/baglan.php');

  $sorgu=$db->prepare("SELECT * FROM kategoriler where kategoriler_id=:id");
  $sorgu->execute(array(
    'id'=>$_GET['kategoriler_id']
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
                    <h1 class="h3 mb-4 text-gray-800">Kategori Ekleme</h1>

                    <form action="ayarlar/islem.php" enctype="multipart/form-data" method="post">

                    <div class="row">
                    <div class="col-md-12">
                    <label>Kategori Adı:</label>
                    <input type="text" class="form-control rounded" value="" name="kategoriler_ad">
                    </div>
                    </div>

                    <div class="row mt-5">
                  <div class="col-md-12">
                  <p><label>Uzun Kategori Açıklaması:</label></p>
                  <textarea id="summernote1" class="form-control" name="kategoriler_description"></textarea>
    <script>
      $('#summernote1').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>

 </div>
 </div>

 <div class="row mt-5">
                  <div class="col-md-12">
                  <p><label>Kısa Kategori Açıklaması:</label></p>
                  <textarea id="summernote" class="form-control" name="kategoriler_shortdesc"></textarea>
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>

 </div>
 </div>

<div class="row mt-3">
<div class="col-md-12">
<p><label>Kategori Resmi:</label></p>
<input type="file" name="kategoriler_img">
</div>
</div>



 <div class="row mt-3">
 <div class="col-md-12">

 <div class="row mt-3">
 <div class="col-md-12">
 <label>Yayın Durumu:</label>   
 <div class="form-group">
                <select name="kategoriler_status" class="form-control">
                 
                 <option value="0">Pasif</option>
                 <option value="1">Aktif</option>
                  
                </select>
              </div>
 </div>
 </div>




<button name="kategorilerekle" class="btn btn-success btn-lg mt-3">Ekle</button>
                    
                   

                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            </div>
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

<script>
    $('#summernote1').summernote({
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