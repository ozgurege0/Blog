<?php
 @ob_start();
 @session_start();

require_once('baglan.php');

if(isset($_POST['admingiris'])){

	$admin_kullanici=$_POST['admin_kullanici'];
	$admin_parola=md5($_POST['admin_parola']);

	$sorgu=$db->prepare("SELECT * FROM user where admin_id=:id and admin_kullanici=:kullanici and admin_parola=:parola");
    $sorgu->execute(array(
		'id'=>0,
		'kullanici'=>$admin_kullanici,
		'parola'=>$admin_parola
	  ));
	  
	  echo $kontrol=$sorgu->rowCount();

	  if($kontrol==1){

		$_SESSION['admin_kullanici']=$admin_kullanici;
		session_regenerate_id();
		
		header("Location:../index.php");
		exit;

	  }else{
		  header("Location:../login.php?durum=basarisiz");
		  exit;
	  }
	  
	  

}

if(isset($_POST['seoayarkaydet'])){

    $seoayarkaydet=$db->prepare("UPDATE seoayar SET 
    
    seoayar_title=:seoayar_title,
    seoayar_description=:seoayar_description,
    seoayar_keywords=:seoayar_keywords,
    seoayar_author=:seoayar_author
    ");

    $guncelle=$seoayarkaydet->execute(array(
        'seoayar_title' => htmlspecialchars($_POST["seoayar_title"],ENT_QUOTES,'UTF-8'),
        'seoayar_description' => htmlspecialchars($_POST["seoayar_description"],ENT_QUOTES,'UTF-8'),
        'seoayar_keywords' => htmlspecialchars($_POST["seoayar_keywords"],ENT_QUOTES,'UTF-8'),
        'seoayar_author' => htmlspecialchars($_POST["seoayar_author"],ENT_QUOTES,'UTF-8'),
    ));

    if($guncelle){
        header("Location:../seoayar.php?islem=basarili");
    }else{
        header("Location:../seoayar.php?islem=basarisiz");
    }

}

if(isset($_POST["blogekle"])){ //blog ekle

	$uploads_dir = '../../img/uploads';
		@$tmp_name = $_FILES['blog_img']["tmp_name"];
		@$name = $_FILES['blog_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	
		
	
		$kaydet=$db->prepare("INSERT INTO blog SET
			blog_title=:title,
			blog_description=:description,
			blog_img=:resimyol,
			blog_icerik=:icerik,
			blog_status=:status,
			blog_seodescription=:seodescription,
			blog_seokeywords=:seokeywords,
            blog_seoauthor=:seoauthor,
			kategoriler_id=:id
			");
		$insert=$kaydet->execute(array(
			'title' => htmlspecialchars($_POST['blog_title'],ENT_QUOTES,'UTF-8'),
			'description' => htmlspecialchars($_POST['blog_description'],ENT_QUOTES,'UTF-8'),
			'icerik' => htmlspecialchars($_POST['blog_icerik'],ENT_QUOTES,'UTF-8'),
            'status' => htmlspecialchars($_POST['blog_status'],ENT_QUOTES,'UTF-8'),
			'seodescription' => htmlspecialchars($_POST['blog_seodescription'],ENT_QUOTES,'UTF-8'),
			'seokeywords' => htmlspecialchars($_POST['blog_seokeywords'],ENT_QUOTES,'UTF-8'),
            'seoauthor' => htmlspecialchars($_POST['blog_seoauthor'],ENT_QUOTES,'UTF-8'),
			'id' => htmlspecialchars($_POST['kategoriler_id'],ENT_QUOTES,'UTF-8'),
			'resimyol' => $refimgyol
			));
	
			if($insert){
				Header("Location:../blog.php?islem=basarili");
			}else{
				Header("Location:../blog.php?islem=basarisiz");
			}
	
	
}

if($_GET['blogsil']=="basarili"){ 

	$sil=$db->prepare("DELETE FROM blog WHERE blog_id=:blog_id");
    $kontrol=$sil->execute(array(
        'blog_id' => $_GET["blog_id"]
    ));

    if($kontrol){

        Header("Location:../blog.php?blogsil=basarili");
    }else{
        Header("Location:../blog.php?blogsil=basarisiz");
    }

}

if (isset($_POST['blogduzenle'])) { //blog düzenleme işlemi

	
	if($_FILES['blog_img']["size"] > 0)  { 


		$uploads_dir = '../../img/uploads';
		@$tmp_name = $_FILES['blog_img']["tmp_name"];
		@$name = $_FILES['blog_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE blog SET
			blog_title=:title,
			blog_description=:description,
			blog_img=:resimyol,
			blog_icerik=:icerik,
			blog_status=:status,
			blog_seodescription=:seodescription,
			blog_seokeywords=:seokeywords,
            blog_seoauthor=:seoauthor,
			kategoriler_id=:id
			WHERE blog_id={$_POST['blog_id']}");
		$update=$duzenle->execute(array(
			'title' => htmlspecialchars($_POST['blog_title'],ENT_QUOTES,'UTF-8'),
			'description' =>  htmlspecialchars($_POST['blog_description'],ENT_QUOTES,'UTF-8'),
			'icerik' =>  htmlspecialchars($_POST['blog_icerik'],ENT_QUOTES,'UTF-8'),
            'status' =>  htmlspecialchars($_POST['blog_status'],ENT_QUOTES,'UTF-8'),
			'seodescription' =>  htmlspecialchars($_POST['blog_seodescription'],ENT_QUOTES,'UTF-8'),
			'seokeywords' =>  htmlspecialchars($_POST['blog_seokeywords'],ENT_QUOTES,'UTF-8'),
            'seoauthor' =>  htmlspecialchars($_POST['blog_seoauthor'],ENT_QUOTES,'UTF-8'),
			'id' =>  htmlspecialchars($_POST['kategoriler_id'],ENT_QUOTES,'UTF-8'),
			'resimyol' => $refimgyol
			));
		

		$blog_id=$_POST['blog_id'];

		if ($update) {

			$resimsilunlink=$_POST['blog_img'];
			unlink("../../$resimsilunlink");

			Header("Location:../blog-duzenle.php?blog_id=$blog_id&islem=basarili");

		} else {

			Header("Location:../blog-duzenle.php?islem=basarisiz");
		}



	} else {

		$duzenle=$db->prepare("UPDATE blog SET
			blog_title=:title,
			blog_description=:description,
			blog_icerik=:icerik,
			blog_status=:status,
			blog_seodescription=:seodescription,
			blog_seokeywords=:seokeywords,
            blog_seoauthor=:seoauthor,
			kategoriler_id=:id
			WHERE blog_id={$_POST['blog_id']}");
		$update=$duzenle->execute(array(
			'title' => htmlspecialchars($_POST['blog_title'],ENT_QUOTES,'UTF-8'),
			'description' => htmlspecialchars($_POST['blog_description'],ENT_QUOTES,'UTF-8'),
			'icerik' => htmlspecialchars($_POST['blog_icerik'],ENT_QUOTES,'UTF-8'),
            'status' => htmlspecialchars($_POST['blog_status'],ENT_QUOTES,'UTF-8'),
			'seodescription' => htmlspecialchars($_POST['blog_seodescription'],ENT_QUOTES,'UTF-8'),
			'seokeywords' => htmlspecialchars($_POST['blog_seokeywords'],ENT_QUOTES,'UTF-8'),
            'seoauthor' => htmlspecialchars($_POST['blog_seoauthor'],ENT_QUOTES,'UTF-8'),
			'id' => htmlspecialchars($_POST['kategoriler_id'],ENT_QUOTES,'UTF-8'),
			));

		$blog_id=$_POST['blog_id'];

		if ($update) {

			Header("Location:../blog-duzenle.php?blog_id=$blog_id&islem=basarili");

		} else {

			Header("Location:../blog-duzenle.php?islem=basarisiz");
		}
	}

}

if($_GET['yorumlarsil']=="basarili"){  //Yorum silme işlemi

	$sil=$db->prepare("DELETE FROM yorumlar WHERE yorumlar_id=:yorumlar_id");
    $kontrol=$sil->execute(array(
        'yorumlar_id' => $_GET["yorumlar_id"]
    ));

    if($kontrol){

        Header("Location:../yorumlar.php?yorumlarsil=basarili");
    }else{
        Header("Location:../yorumlar.php?yorumlarsil=basarisiz");
    }

}

if(isset($_POST['yorumlarduzenle'])){ //hizmet düzenle
	
	$id=$_POST["yorumlar_id"];
	$duzenle=$db->prepare("UPDATE yorumlar SET
			yorumlar_status=:status
			WHERE yorumlar_id={$_POST['yorumlar_id']}");
		$update=$duzenle->execute(array(
			'status' => htmlspecialchars($_POST['yorumlar_status'],ENT_QUOTES,'UTF-8'),
			
			));

			if($update){
				Header("Location:../yorumlar-duzenle.php?yorumlar_id=$id&islem=basarili");
			}else{
				Header("Location:../yorumlar-duzenle.php?&islem=basarisiz");
			}

}
              
if(isset($_POST["yorumlarekle"])){

	$kaydet=$db->prepare("INSERT INTO yorumlar SET
			yorumlar_ad=:ad,
			yorumlar_icerik=:icerik,
			blog_id=:id
			");
		$insert=$kaydet->execute(array(
			'ad' => htmlspecialchars($_POST['yorumlar_ad'],ENT_QUOTES,'UTF-8'),
			'icerik' => htmlspecialchars($_POST['yorumlar_icerik'],ENT_QUOTES,'UTF-8'),
			'id' => htmlspecialchars($_POST['blog_id'],ENT_QUOTES,'UTF-8'),
			
			));

			if($insert) {
                header("Location:".$_SERVER['HTTP_REFERER']."?islem=basarili");
            } else {
                header("Location:".$_SERVER['HTTP_REFERER']."?islem=basarisiz");
            }

			
}

if(isset($_POST["kategorilerekle"])){ //kategori ekle

	$uploads_dir = '../../img/uploads';
		@$tmp_name = $_FILES['kategoriler_img']["tmp_name"];
		@$name = $_FILES['kategoriler_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	
		
	
		$kaydet=$db->prepare("INSERT INTO kategoriler SET
			kategoriler_ad=:ad,
			kategoriler_description=:description,
			kategoriler_img=:resimyol,
			kategoriler_status=:status,
			kategoriler_shortdesc=:shortdesc
			
			");
		$insert=$kaydet->execute(array(
			'ad' => htmlspecialchars($_POST['kategoriler_ad'],ENT_QUOTES,'UTF-8'),
			'description' => htmlspecialchars($_POST['kategoriler_description'],ENT_QUOTES,'UTF-8'),
            'status' => htmlspecialchars($_POST['kategoriler_status'],ENT_QUOTES,'UTF-8'),
			'shortdesc' => htmlspecialchars($_POST['kategoriler_shortdesc'],ENT_QUOTES,'UTF-8'),
			'resimyol' => $refimgyol
			));
	
			if($insert){
				Header("Location:../kategoriler.php?islem=basarili");
			}else{
				Header("Location:../kategoriler.php?islem=basarisiz");
			}
	
	
}

if (isset($_POST['kategorilerduzenle'])) { //kategoriler düzenleme işlemi

	
	if($_FILES['kategoriler_img']["size"] > 0)  { 


		$uploads_dir = '../../img/uploads';
		@$tmp_name = $_FILES['kategoriler_img']["tmp_name"];
		@$name = $_FILES['kategoriler_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE kategoriler SET
			kategoriler_ad=:ad,
			kategoriler_description=:description,
			kategoriler_img=:resimyol,
			kategoriler_status=:status,
			kategoriler_shortdesc=:shortdesc
			WHERE kategoriler_id={$_POST['kategoriler_id']}");
		$update=$duzenle->execute(array(
			'ad' => htmlspecialchars($_POST['kategoriler_ad'],ENT_QUOTES,'UTF-8'),
			'description' => htmlspecialchars($_POST['kategoriler_description'],ENT_QUOTES,'UTF-8'),
            'status' => htmlspecialchars($_POST['kategoriler_status'],ENT_QUOTES,'UTF-8'),
			'shortdesc' => htmlspecialchars($_POST['kategoriler_shortdesc'],ENT_QUOTES,'UTF-8'),
			'resimyol' => $refimgyol
			));
		

		$kategoriler_id=$_POST['kategoriler_id'];

		if ($update) {

			$resimsilunlink=$_POST['kategoriler_img'];
			unlink("../../$resimsilunlink");

			Header("Location:../kategoriler-duzenle.php?kategoriler_id=$kategoriler_id&islem=basarili");

		} else {

			Header("Location:../kategoriler-duzenle.php?islem=basarisiz");
		}



	} else {

		$duzenle=$db->prepare("UPDATE kategoriler SET
			kategoriler_ad=:ad,
			kategoriler_description=:description,
			kategoriler_status=:status,
			kategoriler_shortdesc=:shortdesc
			WHERE kategoriler_id={$_POST['kategoriler_id']}");
		$update=$duzenle->execute(array(
			'ad' => htmlspecialchars($_POST['kategoriler_ad'],ENT_QUOTES,'UTF-8'),
			'description' => htmlspecialchars($_POST['kategoriler_description'],ENT_QUOTES,'UTF-8'),
            'status' => htmlspecialchars($_POST['kategoriler_status'],ENT_QUOTES,'UTF-8'),
			'shortdesc' => htmlspecialchars($_POST['kategoriler_shortdesc'],ENT_QUOTES,'UTF-8'),
			));

		$kategoriler_id=$_POST['kategoriler_id'];

		if ($update) {

			Header("Location:../kategoriler-duzenle.php?kategoriler_id=$kategoriler_id&islem=basarili");

		} else {

			Header("Location:../kategoriler-duzenle.php?islem=basarisiz");
		}
	}

}


if($_GET['kategorilersil']=="basarili"){ 

	$sil=$db->prepare("DELETE FROM kategoriler WHERE kategoriler_id=:kategoriler_id");
    $kontrol=$sil->execute(array(
        'kategoriler_id' => $_GET["kategoriler_id"]
    ));

    if($kontrol){

        Header("Location:../kategoriler.php?kategorilersil=basarili");
    }else{
        Header("Location:../kategoriler.php?kategorilersil=basarisiz");
    }

}

if(isset($_POST["contact"])){

	$kaydet=$db->prepare("INSERT INTO mesajlar SET
			mesajlar_ad=:ad,
			mesajlar_soyad=:soyad,
			mesajlar_mail=:mail,
			mesajlar_tel=:tel,
			mesajlar_konu=:konu,
			mesajlar_mesaj=:mesaj
			");
		$insert=$kaydet->execute(array(
			'ad' => htmlspecialchars($_POST['mesajlar_ad'],ENT_QUOTES,'UTF-8'),
			'soyad' => htmlspecialchars($_POST['mesajlar_soyad'],ENT_QUOTES,'UTF-8'),
			'mail' => htmlspecialchars($_POST['mesajlar_mail'],ENT_QUOTES,'UTF-8'),
			'tel' => htmlspecialchars($_POST['mesajlar_tel'],ENT_QUOTES,'UTF-8'),
			'konu' => htmlspecialchars($_POST['mesajlar_konu'],ENT_QUOTES,'UTF-8'),
			'mesaj' => htmlspecialchars($_POST['mesajlar_mesaj'],ENT_QUOTES,'UTF-8'),
			
			));

			if($insert){
				Header("Location:../../contact.php?islem=basarili");
			}else{
				Header("Location:../../contact.php?islem=basarisiz");
			}


}

if($_GET['mesajlarsil']=="basarili"){ 

	$sil=$db->prepare("DELETE FROM mesajlar WHERE mesajlar_id=:mesajlar_id");
    $kontrol=$sil->execute(array(
        'mesajlar_id' => $_GET["mesajlar_id"]
    ));

    if($kontrol){

        Header("Location:../mesajlar.php?mesajlarsil=basarili");
    }else{
        Header("Location:../mesajlar.php?mesajlarsil=basarisiz");
    }

}

if (isset($_POST['aboutkaydet'])) { //hakkımızda düzenleme işlemi

	
	if($_FILES['about_img']["size"] > 0)  { 


		$uploads_dir = '../../img';
		@$tmp_name = $_FILES['about_img']["tmp_name"];
		@$name = $_FILES['about_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE about SET
			about_ad=:ad,
			about_unvan=:unvan,
			about_text=:text,
			about_img=:resimyol
			WHERE about_id=0");
		$update=$duzenle->execute(array(
			'ad' => htmlspecialchars($_POST['about_ad'],ENT_QUOTES,'UTF-8'),
			'unvan' => htmlspecialchars($_POST['about_unvan'],ENT_QUOTES,'UTF-8'),
			'text' => htmlspecialchars($_POST['about_text'],ENT_QUOTES,'UTF-8'),
			'resimyol' => $refimgyol
			));
		


		if ($update) {

			$resimsilunlink=$_POST['about_img'];
			unlink("../../$resimsilunlink");

			Header("Location:../about.php?islem=basarili");

		} else {

			Header("Location:../about.php?islem=basarisiz");
		}



	} else {

		$duzenle=$db->prepare("UPDATE about SET
			about_ad=:ad,
			about_unvan=:unvan,
			about_text=:text
			WHERE about_id=0");
		$update=$duzenle->execute(array(
			'ad' => htmlspecialchars($_POST['about_ad'],ENT_QUOTES,'UTF-8'),
			'unvan' => htmlspecialchars($_POST['about_unvan'],ENT_QUOTES,'UTF-8'),
			'text' => htmlspecialchars($_POST['about_text'],ENT_QUOTES,'UTF-8'),
			));



		if ($update) {

			Header("Location:../about.php?islem=basarili");

		} else {

			Header("Location:../about.php?islem=basarisiz");
		}
	}

}



if(isset($_POST["accountekle"])){

	$kaydet=$db->prepare("INSERT INTO account SET
			account_icon=:icon,
			account_link=:link,
			account_platform=:platform
			");
		$insert=$kaydet->execute(array(
			'icon' => htmlspecialchars($_POST['account_icon'],ENT_QUOTES,'UTF-8'),
			'link' => htmlspecialchars($_POST['account_link'],ENT_QUOTES,'UTF-8'),
			'platform' => htmlspecialchars($_POST['account_platform'],ENT_QUOTES,'UTF-8'),
			
			));

			if($insert){
				Header("Location:../account.php?islem=basarili");
			}else{
				Header("Location:../account.php?islem=basarisiz");
			}


}

if(isset($_POST['accountduzenle'])){ //hizmet düzenle
	
	$id=$_POST["account_id"];
	$duzenle=$db->prepare("UPDATE account SET
			account_icon=:icon,
			account_link=:link,
			account_platform=:platform
			WHERE account_id={$_POST['account_id']}");
		$update=$duzenle->execute(array(
			'icon' => htmlspecialchars($_POST['account_icon'],ENT_QUOTES,'UTF-8'),
			'link' => htmlspecialchars($_POST['account_link'],ENT_QUOTES,'UTF-8'),
			'platform' => htmlspecialchars($_POST['account_platform'],ENT_QUOTES,'UTF-8'),
			
			));

			if($update){
				Header("Location:../account-duzenle.php?account_id=$id&islem=basarili");
			}else{
				Header("Location:../account-duzenle.php?&islem=basarisiz");
			}

}

if($_GET['accountsil']=="basarili"){ //hizmet sil

	$sil=$db->prepare("DELETE FROM account WHERE account_id=:account_id");
    $kontrol=$sil->execute(array(
        'account_id' => $_GET["account_id"]
    ));

    if($kontrol){

        Header("Location:../account.php?accountsil=basarili");
    }else{
        Header("Location:../account.php?accountsil=basarisiz");
    }

}

if(isset($_POST["abonelikekle"])){

	$kaydet=$db->prepare("INSERT INTO abonelik SET
			abonelik_mail=:mail
			");
		$insert=$kaydet->execute(array(
			'mail' => htmlspecialchars($_POST['abonelik_mail'],ENT_QUOTES,'UTF-8'),
			
			));

			if($insert) {
                header("Location:".$_SERVER['HTTP_REFERER']."");
            } else {
                header("Location:".$_SERVER['HTTP_REFERER']."");
            }


}

if($_GET['aboneliksil']=="basarili"){ //abonelik sil

	$sil=$db->prepare("DELETE FROM abonelik WHERE abonelik_id=:abonelik_id");
    $kontrol=$sil->execute(array(
        'abonelik_id' => $_GET["abonelik_id"]
    ));

    if($kontrol){

        Header("Location:../abonelik.php?aboneliksil=basarili");
    }else{
        Header("Location:../abonelik.php?aboneliksil=basarisiz");
    }

}


if(isset($_POST['infokaydet'])){

    $infokaydet=$db->prepare("UPDATE info SET 
    
    info_tel=:info_tel,
    info_mail=:info_mail,
    info_adres=:info_adres
    ");

    $guncelle=$infokaydet->execute(array(
        'info_tel' => htmlspecialchars($_POST["info_tel"],ENT_QUOTES,'UTF-8'),
        'info_mail' => htmlspecialchars($_POST["info_mail"],ENT_QUOTES,'UTF-8'),
        'info_adres' => htmlspecialchars($_POST["info_adres"],ENT_QUOTES,'UTF-8'),
    ));

    if($guncelle){
        header("Location:../info.php?islem=basarili");
    }else{
        header("Location:../info.php?islem=basarisiz");
    }

}


if(isset($_POST['ayarlarkaydet'])) { //ayarlar düzenleme işlemi

	if($_FILES['ayarlar_logo']["size"] > 0)  { 

		$uploads_dir = '../../img/uploads';
		@$tmp_name = $_FILES['ayarlar_logo']["tmp_name"];
		@$name = $_FILES['ayarlar_logo']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE ayarlar SET

			ayarlar_logo=:resimyol	
			WHERE ayarlar_id=0");
		$update=$duzenle->execute(array(
			'resimyol' => $refimgyol
			));
		


		if ($update) {

			$resimsilunlink=$_POST['ayarlar_logo'];
			unlink("../../$resimsilunlink");

			Header("Location:../ayarlar.php?islem=basarili");

		} else {

			Header("Location:../ayarlar.php?islem=basarisiz");
		}



	}

	if($_FILES['ayarlar_favicon']["size"] > 0)  { 


		$uploads_dir = '../../img/uploads';
		@$tmp_name = $_FILES['ayarlar_favicon']["tmp_name"];
		@$name = $_FILES['ayarlar_favicon']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	
		$duzenle=$db->prepare("UPDATE ayarlar SET
			ayarlar_favicon=:resimyol	
			WHERE ayarlar_id=0");
		$update=$duzenle->execute(array(
			'resimyol' => $refimgyol
			));
		
	
	
		if ($update) {
	
			$resimsilunlink=$_POST['ayarlar_favicon'];
			unlink("../../$resimsilunlink");
	
			Header("Location:../ayarlar.php?islem=basarili");
	
		} else {
	
			Header("Location:../ayarlar.php?islem=basarisiz");
		}
	
	
	
	}
	else {

		$duzenle=$db->prepare("UPDATE ayarlar SET
			ayarlar_url=:ayarlar_url
			WHERE ayarlar_id=0");
		$update=$duzenle->execute(array(
			'ayarlar_url' => htmlspecialchars($_POST['ayarlar_url'],ENT_QUOTES,'UTF-8'),
			));



		if ($update) {

			Header("Location:../ayarlar.php?islem=basarili");

		} else {

			Header("Location:../ayarlar.php?islem=basarisiz");
		}
		
	}
}


	
	
if(isset($_POST['userkaydet'])){

    $userkaydet=$db->prepare("UPDATE user SET 
    
    admin_kullanici=:admin_kullanici,
	admin_parola=:admin_parola
    ");

    $guncelle=$userkaydet->execute(array(
        'admin_kullanici' => htmlspecialchars($_POST["admin_kullanici"],ENT_QUOTES,'UTF-8'),
        'admin_parola' => md5($_POST["admin_parola"])
    ));

    if($guncelle){
        header("Location:../user.php?islem=basarili");
    }else{
        header("Location:../user.php?islem=basarisiz");
    }

}


?>