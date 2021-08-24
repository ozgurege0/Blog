<?php
require_once("includes/session.php");
?>
<?php
require_once('ayarlar/baglan.php');

$kategoriler=$db->prepare("SELECT * FROM kategoriler");
  $kategoriler->execute();
  
  $sorgu=$db->prepare("SELECT * FROM blog where blog_id=:id");
  $sorgu->execute(array(
    'id'=>$_GET['blog_id']
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
                    <h1 class="h3 mb-4 text-gray-800">Blog Ekleme</h1>

                    <form action="ayarlar/islem.php" enctype="multipart/form-data" method="post">

                    <div class="row">
                    <div class="col-md-12">
                    <label>Blogunuzun Başlığı:</label>
                    <input type="text" class="form-control rounded" name="blog_title">
                    </div>
                    </div>

                    <div class="row mt-5">
                  <div class="col-md-12">
                  <p><label>Blog Açıklaması:</label></p>
                  <textarea id="summernote1" class="form-control" name="blog_description"></textarea>
    <script>
      $('#summernote1').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>

 </div>
 </div>


<div class="row mt-3">
<div class="col-md-12">
<p><label>Blog Resmini Ekle:</label></p>
<input type="file" name="blog_img">
</div>
</div>

<div class="row mt-5">
                  <div class="col-md-12">
                  <p><label>Blog İçeriğiniz:</label></p>
                  <textarea id="summernote" class="form-control" name="blog_icerik"></textarea>
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

 <label>Kategorisi:</label>   
 <div class="form-group">
                <select name="kategoriler_id" class="form-control">

                <?php 
        while ($kategorilercek=$kategoriler->fetch(PDO::FETCH_ASSOC)) { ?>

                <option value="<?php echo $kategorilercek['kategoriler_id'] ?>"><?php echo $kategorilercek['kategoriler_ad'] ?></option>      

                <?php
        }
                ?>
                </select>
              </div>

 </div>
 </div>

 <div class="row mt-3">
 <div class="col-md-12">
 <label>Yayın Durumu:</label>   
 <div class="form-group">
                <select name="blog_status" class="form-control">
                 
                 <option value="0">Pasif</option>
                 <option value="1">Aktif</option>
                  
                </select>
              </div>
 </div>
 </div>

<div class="row mt-3">
<div class="col-md-12">
<label>Seo Dostu Blog Açıklaması:</label>   
<div class="form-floating">
  <textarea class="form-control" name="blog_seodescription" id="floatingTextarea2" style="height: 100px"></textarea>
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<label>Seo Dostu Anahtar Kelimeler:</label>   
<div class="form-floating">
  <textarea class="form-control"  name="blog_seokeywords" id="floatingTextarea2" style="height: 100px"></textarea>
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<label>Blog'un Yazarı:</label>   
<input class="form-control rounded" name="blog_seoauthor">
</div>
</div>

            <button name="blogekle" class="btn btn-primary mt-3">EKLE</button>                 
                   

                    </form>

                </div>
                <!-- /.container-fluid -->

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