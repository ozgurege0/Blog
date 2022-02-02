<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
          <a class="navbar-brand" href="<?php echo $ayarlarcek['ayarlar_url'] ?>"><img src="<?php echo $ayarlarcek['ayarlar_url'] ?><?php echo $ayarlarcek['ayarlar_logo'] ?>" alt="Logo" width="150px" ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo $ayarlarcek['ayarlar_url'] ?>">Ana Sayfa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $ayarlarcek['ayarlar_url'] ?>about.php">Hakkımızda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $ayarlarcek['ayarlar_url'] ?>contact.php">İletişim</a>
              </li>
              
            </ul>
            <form action="<?php echo $ayarlarcek['ayarlar_url'] ?>sonuc.php" method="GET" class="d-flex" >
              <input class="form-control me-2" type="search" placeholder="Bloglar'da Ara!" aria-label="Search" name="kelime">
              <button class="btn btn-outline-success" type="submit">Ara</button>
            </form>
          
          </div>
        </div>
      </nav>
