
<?php 
require_once('admin/ayarlar/baglan.php');

$sorgu=$db->prepare("SELECT * FROM blog where blog_id=:id");
$sorgu->execute(array(
  'id'=>$_GET['blog_id']
));
$blogcek=$sorgu->fetch(PDO::FETCH_ASSOC);

$account=$db->prepare("SELECT * FROM account");
$account->execute();

$yorumlar=$db->prepare("SELECT * FROM yorumlar WHERE blog_id=:id");
$yorumlar->execute(array(
  'id'=>$_GET['blog_id']
));

$ayarlar=$db->prepare("SELECT * FROM ayarlar where ayarlar_id=:id");
$ayarlar->execute(array(
  'id'=>0
));
$ayarlarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
  
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    
    <link rel="icon" href="<?php echo $ayarlarcek['ayarlar_url'] ?><?php echo $ayarlarcek['ayarlar_favicon'] ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo $ayarlarcek['ayarlar_url'] ?>css/style.css">
    <meta name="description" content="<?php echo $blogcek['blog_seodescription'] ?>">
    <meta name="keywords" content="<?php echo $blogcek['blog_seokeywords'] ?>">
    <meta name="author" content="<?php echo $blogcek['blog_seoauthor'] ?>">
    <title><?php echo $blogcek['blog_title'] ?></title>
  </head>

  <body>
   <!-- Navbar Başlangıç -->

  <?php
require_once('includes/navbar.php');
  ?>
      

       <!-- Navbar Bitiş -->





  <!-- Footer -->

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="text-center">
                <img src="../<?php echo $blogcek['blog_img'] ?>" class="img-fluid rounded" alt="asd">
            </div>
            </div>
            <p class="text-center mt-3"><?php echo html_entity_decode($blogcek['blog_icerik']) ?></p>
            
        </div>
        <div class="col-md-4">
        <h2>Yorumlar;</h2>
    </div>

    <form action="../admin/ayarlar/islem.php" method="post">
    <input type="text" class="form-control rounded" placeholder="Adınız..." name="yorumlar_ad"> 
        <div class="form-floating mt-2">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="yorumlar_icerik"></textarea>
            <label for="floatingTextarea2">Yorumunuz...</label>
          </div>
          <button class="btn btn-primary btn-lg mt-2" name="yorumlarekle" type="submit">Gönder</button>

          <input type="hidden" name="blog_id" value="<?php echo $blogcek['blog_id'] ?>">
          </form>
          
          <?php 
      
      while ($yorumlarcek=$yorumlar->fetch(PDO::FETCH_ASSOC)) { ?>
      
          

  <?php 
if($yorumlarcek["yorumlar_status"]==1){
 echo '<div class="card mt-3">
 <div class="card-body">
 <div class="d-flex flex-column bd-highlight mb-3">
 
 <div class="p-2 bd-highlight"><b>'.  $yorumlarcek['yorumlar_ad'] .'</b></div>
 <div class="p-2 bd-highlight">'.  $yorumlarcek['yorumlar_icerik'] .'  </div>
 <div class="p-2 bd-highlight"><b>Tarih: </b>'.  $yorumlarcek['yorumlar_tarih'] .'  </div>
 
 </div>
  </div>
</div>
 ';
}
else if($yorumlarcek["yorumlar_status"]==0){
 echo '';
}

?>


  
<?php
}
?>


        
              
      
        <?php 
            
            if(@$_GET["islem"]=="basarili"){
                echo '<div class="alert alert-success solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <strong>Başarılı!</strong> Teşekkürler, yorumunuz onaya gönderildi.
                <a href="../../blog/'. seo($blogcek["blog_title"]).'/'.$blogcek["blog_id"] .'" ><button class="btn btn-sucess btn-sm" ><i class="fas fa-times"></i></button></a>
            </div>';
            }elseif(@$_GET["islem"]=="basarisiz"){
                echo ' <div class="alert alert-danger solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                <strong>Başarısz!</strong> İşlem başarısız oldu. Lütfen tekrar deneyiniz.
                <a href="../../blog/'. seo($blogcek["blog_title"]).'/'.$blogcek["blog_id"] .'" ><button class="btn btn-sucess btn-sm" ><i class="fas fa-times"></i></button></a>
            </div>';
            }
            
            ?>   
<?php
function seo($s) {
    $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',','?');
    $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
    $s = str_replace($tr,$eng,$s);
    $s = strtolower($s);
    $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
    $s = preg_replace('/\s+/', '-', $s);
    $s = preg_replace('|-+|', '-', $s);
    $s = preg_replace('/#/', '', $s);
    $s = str_replace('.', '', $s);
    $s = trim($s, '-');
    return $s;
   }
?>
        
        </div>
    </div>

  <?php
require_once('includes/footer.php');
?>

    <!-- JavaScript Dosyaları -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/267d24fc8a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  </body>
</html>