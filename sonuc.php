<?php
require_once('admin/ayarlar/baglan.php');
$ayarlar=$db->prepare("SELECT * FROM ayarlar where ayarlar_id=:id");
$ayarlar->execute(array(
  'id'=>0
));
$ayarlarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);
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
           <h2 class="text-center mt-5" >Aramanıza Dair Sonuçlar;</h2>
        </div>
           <div class="row">
       
<!-- Bloglar -->


<?php

if($_GET){
    $kelime = $_GET['kelime'];
    if(!$kelime){
        echo "Arama yapabilmek için bir kelime yazmanız gereklidir.";
    }else{
        $blog=$db->prepare("SELECT * FROM blog WHERE blog_title LIKE :blog_title");
        $blog->execute(array(':blog_title' => '%'.$kelime.'%'));

        if($blog->rowCount()){
            foreach($blog as $row){
                
                echo '<br> ';

              
                if($row["blog_status"]==1){
                 echo '<div class="mt-3 "></div>
                 <div class="card">
                  <div class="card-body ">
                <div class="d-flex flex-row bd-highlight mb-3">
                  <div class="col-md-4">
                  <div class="p-2 bd-highlight"><img src="' . $row['blog_img'] . '" class="img-fluid rounded" alt=""></div>
                  <div class="p-2 bd-highlight"><p><b>Yayınlanma Tarihi: </b>' . $row['blog_tarih'] . '</p></div>
                  <p><b>Blog Yazarı: ' . $row['blog_seoauthor'] . '</b></p>
                  </div>
                  <div class="col-md-8">
                  <div class="p-4 bd-highlight"><h3> <a href=" ' . seo($row["blog_title"]).'/'.$row["blog_id"] . ' " > ' . $row['blog_title'] . ' </a> </h3>' . html_entity_decode($row['blog_description']) . '<div class="p-2 bd-highlight"><a href="' . seo($row["blog_title"]).'/'.$row["blog_id"] . '"><button class="btn btn-primary homebtn">Daha Fazla</button></a></div></div>
                </div>    
                </div>
                </div>
                </div>';
                }
                
            }
        }
       


    }
}

?>

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



  <!-- Kategoriler -->

  <!-- Footer -->


<?php
require_once('includes/footer.php');
?>


    <!-- Footer -->




   