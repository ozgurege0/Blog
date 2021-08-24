<?php 

require_once('admin/ayarlar/baglan.php');

$kategoriler=$db->prepare("SELECT * FROM kategoriler where kategoriler_id=:id");
$kategoriler->execute(array(
  'id'=>$_GET['kategoriler_id']
));
$kategorilercek=$kategoriler->fetch(PDO::FETCH_ASSOC);

$sayfa = intval($_GET["sayfa"]);
if(!$sayfa) {
  $sayfa = 1;
}
$v = $db->prepare("SELECT * FROM blog WHERE kategoriler_id=:id");
$v->execute(array(
  'id'=>$_GET['kategoriler_id']
));
$toplam = $v->rowCount();
$limit = 2;
$goster = $sayfa*$limit-$limit;
$sayfa_sayisi = ceil($toplam/$limit);
$forlimit = 2;

$blog=$db->prepare("SELECT * FROM blog WHERE kategoriler_id=:id");
$blog->execute(array(
  'id'=>$_GET['kategoriler_id']
));


$seoayar=$db->prepare("SELECT * FROM seoayar where seoayar_id=:id");
      $seoayar->execute(array(
        'id'=>0
      ));
      $seoayarcek=$seoayar->fetch(PDO::FETCH_ASSOC);

     
      $ayarlar=$db->prepare("SELECT * FROM ayarlar where ayarlar_id=:id");
      $ayarlar->execute(array(
        'id'=>0
      ));
      $ayarlarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);
      
      $account=$db->prepare("SELECT * FROM account");
      $account->execute();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="<?php echo $ayarlarcek['ayarlar_url'] ?><?php echo $ayarlarcek['ayarlar_favicon'] ?>" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $ayarlarcek['ayarlar_url'] ?>css/style.css">
    <meta name="description" content="<?php echo $seoayarcek['seoayar_description'] ?>">
    <meta name="keywords" content="<?php echo $seoayarcek['seoayar_keywords'] ?>">
    <meta name="author" content="<?php echo $seoayarcek['seoayar_author'] ?>">
    <title><?php echo $seoayarcek['seoayar_title'] ?></title>
  </head>

  <body>
   <!-- Navbar Başlangıç -->
<?php
   require_once('includes/navbar.php');
  ?>
      

       <!-- Navbar Bitiş -->

       <!-- Blog -->

       <div class="container">
           <h2 class="text-center mt-5 hometitle" ><?php echo $kategorilercek['kategoriler_ad'] ?> Kategorisindeki Bloglarımız!</h2>
        <p class="text-center mt-2" ><?php echo html_entity_decode($kategorilercek['kategoriler_description']) ?></p>
           <div class="row">
<!-- Blog Bölüm 1 -->

<?php 
      while ($blogcek=$blog->fetch(PDO::FETCH_ASSOC)) { ?>
          
       
          <div class="mt-3 "></div>
           <div class="card">
            <div class="card-body ">
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="col-md-4">
            <div class="p-2 bd-highlight"><img src="../../<?php echo $blogcek['blog_img'] ?>" class="img-fluid rounded" alt=""></div>
            <div class="p-2 bd-highlight"><p><b>Yayınlanma Tarihi: </b><?php echo $blogcek['blog_tarih'] ?></p></div>
            <p><b>Blog Yazarı: </b><?php echo $blogcek['blog_seoauthor'] ?></p>
        </div>
        <div class="col-md-8">
            <div class="p-4 bd-highlight"><h3><a href="<?php echo $ayarlarcek['ayarlar_url'] ?><?=seo($blogcek["blog_title"]).'/'.$blogcek["blog_id"]?>"><?php echo $blogcek['blog_title'] ?></a></h3><?php echo html_entity_decode($blogcek['blog_description']) ?><div class="p-2 bd-highlight"><a href="<?php echo $ayarlarcek['ayarlar_url'] ?><?=seo($blogcek["blog_title"]).'/'.$blogcek["blog_id"]?>"><button class="btn btn-primary homebtn">Daha Fazla</button></a></div></div>
        </div>    
        </div>
        </div>
        </div>
        
        <?php }
 ?>

<nav aria-label="...">
  <ul class="pagination mt-5">
  <?php 

if($sayfa < 2){
  echo "";
}else{
  echo "<li class='page-item'>
  <a class='page-link' href='index.php?sayfa=".($sayfa - 1)."'>Önceki</a>
</li>"; 
}

?>
    

      <?php
for($i = $sayfa - $forlimit; $i<$sayfa + $forlimit +1; $i++){
  if($i>0 && $i<= $sayfa_sayisi){
      if($i == $sayfa){
        echo "<li class='page-item active' aria-current='page'>
        <a class='page-link'>".$i."</a>
      </li>";
      }else{
        echo "<li class='page-item'><a class='page-link' href='?sayfa=".$i."'>".$i."</a></li>";
      }
  }
}

?>

<?php 

if($sayfa == $sayfa_sayisi){
  echo "";
}else{
  echo "<li class='page-item'>
  <a class='page-link' href='?sayfa=".($sayfa +1)."'>Sonraki</a>
</li>";
}
?>
  
  </ul>
</nav>
<!-- Blog Bölüm 1 -->

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
        <!-- Blog Bölüm 3 -->

        <!-- Blog Bölüm 4 -->
      
        </div>
</div>
      
               </div>
<!-- Blog -->

  <!-- Footer -->

<?php
require_once('includes/footer.php');
?>
 