<?php
require_once("includes/session.php");
?>
<?php
require_once('ayarlar/baglan.php');

$mesajlar=$db->prepare("SELECT * FROM mesajlar ORDER BY mesajlar_id DESC;");
      $mesajlar->execute();

?>
<?php
require_once('includes/header.php')
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
                <div class="container ">
               
                <div class="row">
                <h1 class="h3 mb-4 text-gray-800">Mesajlar</h1>
               
              </div>
           
            
            <table class="table mt-4">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Adı</th>
                    <th scope="col">Konu</th>
                    <th scope="col">Tarihi</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                <?php 

                $no=0;
                
                while ($vericek=$mesajlar->fetch(PDO::FETCH_ASSOC)) { $no++; ?>

                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $vericek["mesajlar_ad"] ?></td>
                        <td><?php echo $vericek["mesajlar_konu"] ?></td>
                        <td><?php echo $vericek["mesajlar_tarih"] ?></td>
                      
                        
                        
                        <td><a href="mesajlar-oku.php?mesajlar_id=<?php echo $vericek["mesajlar_id"] ?>"><button class="btn-sm btn-success">Oku</button></a></td>
                        <td><a href="ayarlar/islem.php?mesajlar_id=<?php echo $vericek["mesajlar_id"] ?>&mesajlarsil=basarili"><button class="btn-sm btn-danger">Sil</button></td>
                    </tr>

                    
                    
                <?php }
                
                ?>
                    
                    
                   
                </tbody>
            </table>
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
               <?php 
            
            if(@$_GET["mesajlarsil"]=="basarili"){
                echo '<div class="alert alert-success solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <strong>Başarılı!</strong> Tebrikler, veri Güncellendi.
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>';
            }elseif(@$_GET["mesajlarsil"]=="basarisiz"){
                echo ' <div class="alert alert-danger solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                <strong>Başarısz!</strong> İşlem başarısız oldu. Lütfen tekrar deneyiniz.
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>';
            }
            
            ?>
</div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
         <?php
require_once('includes/footer.php');
         ?>
            <!-- Footer Bitiş --> 

</body>

</html>