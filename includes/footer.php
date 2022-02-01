<div class="footer mt-5">
    <div class="container">
        <div class="row">
        <div class="d-flex flex-row bd-highlight mb-3">
    
          

            <div class="col-md-4">
              <div class="d-flex flex-column bd-highlight mb-3 mt-4" >
                <div class="footertext">
                    <div class="p-2 bd-highlight"><h5>Sayfalar</h5></div>
                <a target="_blank" href="<?php echo $ayarlarcek['ayarlar_url'] ?>about.php"><div class="p-2 bd-highlight">Hakkımızda</div></a>
                <a target="_blank" href="<?php echo $ayarlarcek['ayarlar_url'] ?>contact.php"><div class="p-2 bd-highlight">İletişim</div></a>
              </div>
            </div>
            </div>

        
            <div class="col-md-4">
              <div class="d-flex flex-column bd-highlight mb-3 mt-4">
                <div class="footertext">
                <div class="p-2 bd-highlight"><h5>Sosyal Medya Hesaplarımız</h5></div>
                <?php 
      while ($accountcek=$account->fetch(PDO::FETCH_ASSOC)) { ?>
                <a target="_blank" href="<?php echo $accountcek['account_link'] ?>"><div class="p-2 bd-highlight"><i class="<?php echo $accountcek['account_icon'] ?>"></i> <?php echo $accountcek['account_platform'] ?></div></a>
                <?php
      }
                ?>
              </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-column bd-highlight mb-3 mt-4">
                    <div class="footertext">
                        <div class="p-2 bd-highlight"><h5>Mail Aboneliği</h5></div>
                        <div class="p-2 bd-highlight"><p>Tamamen ücretsiz bir şekilde mail bültenimize abone olarak bloglarımızdan anında haberdar olabilirsiniz.</p></div>

                        <form action="<?php echo $ayarlarcek['ayarlar_url'] ?>admin/ayarlar/islem.php" method="post">

                  <div class="p-2 bd-highlight"><input class="form-control" type="email" name="abonelik_mail" placeholder="Mail Adresiniz..." ></div>

                  <div class="p-2 bd-highlight"><button name="abonelikekle" type="submit" class="btn btn-primary">Kayıt Ol</button></div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          
    </div>
</div>

    <!-- JavaScript Dosyaları -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/267d24fc8a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  </body>
</html>