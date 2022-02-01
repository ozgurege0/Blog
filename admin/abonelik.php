<?php
require_once("includes/session.php");
?>
<?php
require_once('ayarlar/baglan.php');

$abonelik=$db->prepare("SELECT * FROM abonelik ORDER BY abonelik_id DESC;");
      $abonelik->execute();

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
                <h1 class="h3 mb-4 text-gray-800">Mail Bültenine Abone Olanlar</h1>
            
           
            
           
<div class="col-md-12">
<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Ad</th>
                <th>Mail</th>
            </tr>
        </thead>
        <tbody>

        <?php 

while ($vericek=$abonelik->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $vericek["abonelik_id"] ?></td>
                <td><?php echo $vericek["abonelik_mail"] ?></td>
            </tr>
            <?php
}
            ?>
        </tbody>
    </table>
                                </div>
               <?php 
            
            if(@$_GET["aboneliksil"]=="basarili"){
                echo '<div class="alert alert-success solid alert-dismissible fade show mt-5">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                <strong>Başarılı!</strong> Tebrikler, veri Güncellendi.
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>';
            }elseif(@$_GET["aboneliksil"]=="basarisiz"){
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
            </div>

       
            <!-- End of Main Content -->

            <!-- Footer -->
         <?php
require_once('includes/footer.php');
         ?>
            <!-- Footer Bitiş --> 


</body>

</html>