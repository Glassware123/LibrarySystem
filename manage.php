<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
	  #paneladdbook{
	  	display: none;
	  	background: #E5E5E5;
	  	width: 40%;
	  	right: 15%;
	  	top:0px;
	  	position:absolute;
	  }
	  #paneldelbook{
	  	display: none;
	  	background: #E5E5E5;
	  	width: 40%;
	  	right: 15%;
	  	top:0px;
	  	position:absolute;
	  }
	  #panelupdbook{
	  	display: none;
	  	background: #E5E5E5;
	  	width: 40%;
	  	right: 15%;
	  	top:0px;
	  	position:absolute;
	  }
	  #paneladdcat{
	  	display: none;
	  	background: #E5E5E5;
	  	width: 40%;
	  	right: 15%;
	  	top:0px;
	  	position:absolute;
	  }
	  #panelstorage{
	  	display: none;
	  	background: #E5E5E5;
	  	width: 40%;
	  	right: 15%;
	  	top:0px;
	  	position:absolute;
	  }
	   #panelstorageupd{
	  	display: none;
	  	background: #E5E5E5;
	  	width: 40%;
	  	right: 15%;
	  	top:0px;
	  	position:absolute;
	  }
	  	#upd{
	  	display: none;
	  	background: #E5E5E5;
	  	position:absolute;
}
	</style>
	<script type="text/javascript">
		function show(id){
		document.getElementById("paneladdbook").style.display="none";
		document.getElementById("paneldelbook").style.display="none";
		document.getElementById("panelupdbook").style.display="none";
		document.getElementById("paneladdcat").style.display="none";
		document.getElementById("panelstorage").style.display="none";
		document.getElementById("panelstorageupd").style.display="none";
		var divObject=document.getElementById(id);
		divObject.style.display="block";
		}
		function hide(id){
		var divObject=document.getElementById(id);
		divObject.style.display="none";
		}
		function showupd(id){
		document.getElementById("paneladdbook").style.display="none";
		document.getElementById("paneldelbook").style.display="none";
		document.getElementById("panelupdbook").style.display="block";
		document.getElementById("paneladdcat").style.display="none";
		document.getElementById("panelstorage").style.display="none";
		document.getElementById("panelstorageupd").style.display="none";
		var divObject=document.getElementById(id);
		divObject.style.display="block";
		}
	</script>
</head>
<body>

<?php 
include "dbconnection.php";
$q1=mysql_query("SELECT * FROM kategoriler");
session_start();
if(!empty($_SESSION['id'])) {
echo "Hoşgeldiniz ".$_SESSION['name']."<br>"; ?>
		<div id="container">
			<div id="menu">
				<a href="#" name="addbook" onclick='javascript:show("paneladdbook")'>Kitap Ekle</a></br>
				<a href="#" name="delbook" onclick='javascript:show("paneldelbook")'>Kitap Sil</a></br>
				<a href="#" name="updbook" onclick='javascript:show("panelupdbook")'>Kitap Düzenle</a></br>
				<a href="#" name="addcat"  onclick='javascript:show("paneladdcat")'>Kategori Ekle</a></br>
				<a href="#" name="storage" onclick='javascript:show("panelstorage")'>Stok Kontrol</a></br>
				<a href="#" name="storageupd" onclick='javascript:show("panelstorageupd")'>Stok Verisini Güncelle</a></br>
				<a href="index.php">Ana Sayfaya Dön</a>
			</div>
			<div id="paneladdbook">
			<p>Kitap Ekle</p><br>
			<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="39%" border="0">
    <tr>
      <td width="15%">Kitap No</td>
      <td width="5%">:</td>
      <td width="80%"><label for="K_No"></label>
      <input type="text" name="K_No" id="K_No" /></td>
    </tr>
    <tr>
      <td>Kitap Adı</td>
      <td>:</td>
      <td><label for="k_Ad"></label>
      <input type="text" name="k_Ad" id="k_Ad" /></td>
    </tr>
    <tr>
      <td>Kitap Türü</td>
      <td>:</td>
      <td><label for="k_Tur"></label>
        <select name="k_Tur" id="k_Tur"><?php while ($row=mysql_fetch_array($q1)) { ?><option> <?php
        	echo $row["catName"];
       ?> </option><?php }?>
      </select></td>
    </tr>
    <tr>
      <td>Açıklama</td>
      <td>:</td>
      <td><label for="k_Aciklama"></label>
      <textarea name="k_Aciklama" id="k_Aciklama" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Yayınevi</td>
      <td>:</td>
      <td><label for="yayin"></label>
      <input type="text" name="yayin" id="yayin" /></td>
    </tr>
    <tr>
      <td>Yazar</td>
      <td>:</td>
      <td><label for="yazar"></label>
      <input type="text" name="yazar" id="yazar" /></td>
    </tr>
    <tr>
      <td>Görsel</td>
      <td>:</td>
      <td><label for="gorsel"></label>
      <input type="file" name="gorsel" id="gorsel" /></td>
    </tr>
    <tr>
      <td>Stok</td>
      <td>:</td>
      <td><label for="stok"></label>
      <input type="text" name="stok" id="stok" /></td>
    </tr>
    <tr>
      <td>Fiyat</td>
      <td>:</td>
      <td><label for="fiyat"></label>
      <input type="text" name="fiyat" id="fiyat" /></td>
    </tr>    <tr>
      <td colspan="2"><input type="submit" name="ekle" id="ekle" value="Ekle" /></td>
      <td><label for="fiyat">
        <input type="reset" name="temizle" id="temizle" value="Temizle" />
      </label></td>
    </tr>
  </table>
</form>
<a href="#" onclick='javascript:hide("paneladdbook")'>Gizle</a>
<?php 
if(isset($_POST["ekle"])){
	$k_no=$_POST["K_No"];
	$k_ad=$_POST["k_Ad"];
	$k_tur=$_POST["k_Tur"];
	$k_aciklama=$_POST["k_Aciklama"];
	$yayin=$_POST["yayin"];
	$yazar=$_POST['yazar'];
	$stok=$_POST['stok'];
	$fiyat=$_POST["fiyat"];
	if(empty($k_no)||empty($k_ad)||empty($k_tur)||empty($k_aciklama)||empty($yayin)||empty($yazar)||empty($fiyat)){
		echo "<script> alert('Tüm alanların doldurulması gerekmektedir.'); </script>";
	}else{
$file = $_FILES['gorsel'];  // formdan gelen dosya adını alıyoruz.
        $uzantilar = array("jpg", "png", "images/jpeg", "images/png");
		$dizin = "Images/".$k_tur."/"; 
		$upload_file = $dizin.basename($file['name']); 
		$size = $file['size']; 
		$uzanti = explode(".", $file['name']);
		$uzanti = $uzanti[count($uzanti)-1]; 
		$tip = $file['type'];
		if($file['name'] != ""){ 
	if(in_array($tip, $uzantilar) || in_array($uzanti, $uzantilar)){
		if($size < (1024*1024*3)){
			if(move_uploaded_file($file['tmp_name'], $upload_file)){
				echo "<h3>Resim başarılı bir şekilde Eklendi!..</h3>";
			}else{
				echo "<h3>Yükleme İşlemi Başarısız, Tekrar deneyin!..</h3>";
			}
		}else{
			echo "<h3>Resim boyutu 3M den yüksek olmamalıdır!..</h3>";
		}
	}else{
		echo "<h3>Sadece JPG ve PNG uzantılar kabul edilir!..</h3>";
	}
}
	$qk=mysql_query("INSERT INTO kitaplar (kitapNo,kitapAdi,Stok) VALUES ('".$k_no."','".$k_ad."','".$stok."')");
	$q2=mysql_query('INSERT INTO kitapbilgisi (kitapNo,kitapAdi,kitapTuru,aciklama,yayinevi,kitapYazar,kitapGorsel,kitapFiyat) VALUES ("'.$k_no.'","'.$k_ad.'","'.$k_tur.'","'.$k_aciklama.'","'.$yayin.'","'.$yazar.'","'.$upload_file.'","'.$fiyat.'")');
	$qadd=mysql_query($q2);
	$qkadd=mysql_query($qk);
	echo "<script> alert('Kitap Eklendi.'); </script>";
}
}
?>
			</div>
			<div id="paneldelbook">
			<p>Kitap Sil</p><br>
			<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
				<table width="39%" border="0">
  					<tr>
    					<td width="14%">Kitap Seç</td>
    					<td width="9%">:</td>
    					<td width="77%">
      					<label for="liste"></label>
      					<select name="liste" id="liste">
      					<?php
      					$liste=mysql_query("SELECT * FROM kitapbilgisi");
      						while ($row=mysql_fetch_array($liste)) {
      							?><option><?php echo $row['kitapAdi']; ?></option> <?php
      						}
      					?>
      					</select>
  						</td>
  					</tr>
  					<tr>
    					<td colspan="3"><input type="submit" name="sil" id="sil" value="Sil" /></td>
    				</tr>
				</table>
				</form>
				<a href="#" onclick='javascript:hide("paneldelbook")'>Gizle</a>
				<?php 
				if(isset($_POST["sil"])){
					$kitap=$_POST['liste'];
					$qdk=mysql_query('DELETE FROM kitaplar WHERE kitapAdi="'.$kitap.'"');
					$q3=mysql_query('DELETE FROM kitapbilgisi WHERE kitapAdi="'.$kitap.'"');
					$qkdell=mysql_query($qdk);
					$qdell=mysql_query($q3);
					if($qdell){
					echo "<script> alert('Kitap Silindi '); </script>";}
				}
				?>
			</div>
			<div id="panelupdbook">
			<p>Kitap Düzenle</p><br>
			<form name="sec" method="post" action="">
<table border="0">
<tr>
<td>Kitap Seç</td>
<td>:</td>
<td><select name ="kitap" id="kitap">
<option>Seçiniz...</option>
<?php $liste=mysql_query("SELECT * FROM kitapbilgisi");
      						while ($rows=mysql_fetch_array($liste)) {
      							?><option><?php echo $rows['kitapAdi']; ?></option> <?php
      						}
      						?></select>
</td>
</tr>
<tr>
<td><input type="submit" name="secupd" id="secupd" value="Seç" onclick="javascript:showupd('upd')"></td>
</tr>
</table>
			</form><?php 
			if(isset($_POST['secupd']))
				{
					$selected=$_POST['kitap'];
					$qred=mysql_query("SELECT * FROM kitapbilgisi WHERE kitapAdi='".$selected."'");
					while ($rowred=mysql_fetch_array($qred)) {
						$selectedid=$rowred['kitapNo'];
					}
					header("Location:upd.php?ref=$selectedid");
				}
				?>
			<a href="#" onclick='javascript:hide("panelupdbook")'>Gizle</a></div>
			<div id="paneladdcat">
			<p>Kategori Ekle</p><br>
			<form action="" method="post" enctype="multipart/form-data" name="form3" id="form3">
			<table width="19%" border="0">
 				 <tr>
    				<td width="34%">Kategori</td>
    				<td width="12%">:</td>
    				<td width="54%">
      				<label for="cat"></label>
      				<input type="text" name="cat" id="cat" /></td>
  				</tr>
 				 <tr>
    				<td colspan="3"><input type="submit" name="catekle" id="catekle" value="Ekle" /></td>
    			</tr>
			</table>
			</form>
			<?php 
				if(isset($_POST["catekle"])){
					$cat=$_POST['cat'];
					$q4=mysql_query('INSERT INTO kategoriler (catName) VALUES ("'.$cat.'")');
					$qaddcat=mysql_query($q4);
					if($qaddcat){
					echo "<script> alert('Kategori Eklendi.'); </script>";}
				}
			?>
			<a href="#" onclick='javascript:hide("paneladdcat")'>Gizle</a></div>
			<div id="panelstorage">
			<p>Stok Kontrol</p><br>
			<form id="form5" name="form5" method="post" action="">
			<table width="19%" border="0">
  				<tr>
    				<td width="34%">Kitap</td>
    				<td width="12%">:</td>
    				<td width="54%">
      				<select name="kitap" id="kitap"> <?php 	
      				$listekitap=mysql_query("SELECT * FROM kitaplar");
      						while ($rowkitap=mysql_fetch_array($listekitap)) {
      							?><option><?php echo $rowkitap['kitapAdi']; ?></option> <?php
      						} ?>
      				</select></td>
  				</tr>
  				<tr>
    				<td colspan="3"><input type="submit" name="sorgu" id="sorgu" value="Sorgula" /></td>
    			</tr>
			</table>
 		 </form>
 		 <?php 
if(isset($_POST['sorgu'])){
		$kitap=$_POST['kitap'];
		$q5=mysql_query("SELECT * FROM kitaplar WHERE kitapAdi='".$kitap."'");
		$rowstok=mysql_fetch_array($q5);
		if($rowstok){
		echo "<script> alert('Stokta ".$rowstok['stok']." kitap var.'); </script>" ;}
}

 		 ?>
			<a href="#" onclick='javascript:hide("panelstorage")'>Gizle</a></div>
			<div id="panelstorageupd">
			<p>Stok Verisini Güncelle</p><br>
			<form action="" method="post" enctype="multipart/form-data" name="form6" id="form6">
				<table width="39%" border="0">
  					<tr>
    					<td width="14%">Kitap Seç</td>
    					<td width="9%">:</td>
    					<td width="77%">
      					<label for="liste"></label>
      					<select name="liste" id="liste">
      					<?php
      					$liste=mysql_query("SELECT * FROM kitaplar");
      						while ($row=mysql_fetch_array($liste)) {
      							?><option><?php echo $row['kitapAdi']; ?></option> <?php
      						}
      					?>
      					</select>
  						</td>
  					</tr>
  					<tr>
  						<td>Stok</td>
  						<td>:</td>
  						<td><input type="text" name="stok" /></td>
  					</tr>
  					<tr>
    					<td colspan="3"><input type="submit" name="updt" id="updt" value="Güncelle" /></td>
    				</tr>
				</table>
				</form>
				<?php 
					if(isset($_POST['updt'])){
						$kitapup=$_POST['liste'];
						$stok=$_POST['stok'];
						$qstupd=mysql_query("UPDATE kitaplar SET stok='".$stok."' WHERE kitapAdi='".$kitapup."'");
						if($qstupd){
							echo "<script> alert(' ".$kitapup." Kitabının stoğu ".$stok." olarak güncellenmiştir.'); </script>" ;}
						}
					
				?>
			<a href="#" onclick='javascript:hide("panelstorageupd")'>Gizle</a></div>
		</div>
					<div id="logout">
				<form name="form1" action="" method="post">
				<input type="submit" Value="Çıkış" name="cikis" />
				</form>
			</div>
	<?php 
	if(isset($_POST['addbook'])){
		echo "kitapekle";
	}
	if(isset($_POST['cikis'])){
		session_destroy();
		header("Location:admin.php");
	}
	}else{echo "Yetkisiz erişim!Lütfen oturum açarak tekrar deneyiniz!"; } ?>

</body>
</html>