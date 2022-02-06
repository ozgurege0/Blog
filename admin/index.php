<?php
require_once("includes/session.php");
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Panel Kullanımı Hakkında</h6>
                        </div>
                        <div class="card-body">
                            <p>Admin panelde ikon eklemek yada düzenlemek için <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2">buradaki</a> adrese gidiyorsunuz, ardından istediğiniz ikonu aratıp seçiyorsunuz. Son olarak seçtiğiniz ikonun class'ını yazıyorsunuz. Örneğin; seçtiğiniz ikonun kodu i class="fas fa-ad">i bu durumda admin paneldeki girişe fas fa-ad yazmanız yeterlidir.</p>
                        </div>
                    </div>

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
