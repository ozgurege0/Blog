<?php
require_once("includes/session.php");
?>
<?php
require_once('ayarlar/baglan.php');

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
                    <h1 class="h3 mb-4 text-gray-800">Hesap Ekleme</h1>

                    <form action="ayarlar/islem.php" method="post">

                    <div class="row mt-3">
<div class="col-md-12">
<label>Hesap İkonu:(İkon kullanımı için <a target="blank" href="index.php">buradaki</a> ikon kullanımı yazısına göz atın.)</label>   
<input class="form-control rounded" name="account_icon">
</div>
</div>



<div class="row mt-3">
<div class="col-md-12">
<label>Hesap Linki:</label>   
<input class="form-control rounded" name="account_link">
</div>
</div>

<div class="row mt-3">
<div class="col-md-12">
<label>Platformun Adı:</label>   
<input class="form-control rounded" name="account_platform">
</div>
</div>

            <button name="accountekle" class="btn btn-primary mt-3">EKLE</button>                 
                   

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
</body>

</html>