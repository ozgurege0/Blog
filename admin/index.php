<?php
require_once('admin/ayarlar/baglan.php');
 


$kategoriler=$db->prepare("SELECT * FROM kategoriler WHERE kategoriler_status=1 ORDER BY kategoriler_id DESC;");
$kategoriler->execute();

$ayarlar=$db->prepare("SELECT * FROM ayarlar where ayarlar_id=:id");
      $ayarlar->execute(array(
        'id'=>0
      ));
      $ayarlarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);

      $sayfa = intval($_GET["sayfa"]);
      if(!$sayfa) {
        $sayfa = 1;
      }
      $v = $db->prepare("SELECT * FROM blog");
      $v->execute(array());
      $toplam = $v->rowCount();
      $limit = 2;
      $goster = $sayfa*$limit-$limit;
      $sayfa_sayisi = ceil($toplam/$limit);
      $forlimit = 5;

      $blog=$db->prepare("SELECT * FROM blog WHERE blog_status=1 ORDER BY blog_id DESC limit $goster,$limit");
$blog->execute();
?>
<?php 
require_once('includes/header.php');
?>

  <body>
   <!-- Navbar Başlangıç -->

    <?php 
require_once('includes/navbar.php');
    ?>
      
    
       <!-- Navbar Bitiş -->

       <!-- Blog -->

       <div class="container">
           <div class="hometitle">
           <h2 class="text-center mt-5" >En Sevilen Bloglarımız!</h2>
        </div>
           <div class="row">
<!-- Bloglar -->

<?php 
      while ($blogcek=$blog->fetch(PDO::FETCH_ASSOC)) { ?>
          
       
           <div class="mt-3 "></div>
           <div class="card">
            <div class="card-body ">
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="col-md-4">
            <div class="p-2 bd-highlight"><img src="<?php echo $blogcek['blog_img'] ?>" class="img-fluid rounded" alt=""></div>
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


</div>
        <!-- Blog Bölüm 4 -->

               </div>
<!-- Blog -->
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
<!-- Kategoriler -->



<div class="container">
    <div class="hometitle">
        <h2 class="text-center mt-3">Blog Kategorilerimiz</h2>
    </div>
    <div class="mt-3"></div>
  
    <div class="row">

    <?php 
      while ($kategorilercek=$kategoriler->fetch(PDO::FETCH_ASSOC)) { ?>
         
        <div class="col-md-3">
            <div class="card mt-2" style="width: 18rem;">
                <img src="<?php echo $kategorilercek['kategoriler_img'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $kategorilercek['kategoriler_ad'] ?></h5>
                  <p class="card-text"><?php echo html_entity_decode($kategorilercek['kategoriler_shortdesc']) ?>.</p>
                  <a href="<?php echo $ayarlarcek['ayarlar_url'] ?>kategoriler/<?=seo($kategorilercek['kategoriler_ad']).'/'.$kategorilercek["kategoriler_id"]?>" class="btn btn-primary">Tüm Bloglar</a>
                </div>
              </div>
        </div>
<?php
}
?>

      
        
    </div>
  </div>

  <!-- Kategoriler -->

  <!-- Footer -->

<?php
require_once('includes/footer.php');
?>


    <!-- Footer -->
