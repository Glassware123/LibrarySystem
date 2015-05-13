<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
session_start();
include "dbconnection.php";
if(!empty($_SESSION['id'])) {
$id=$_GET['ref'];
echo "Hoşgeldiniz ".$_SESSION['name']."<br>";
$query=mysql_query("SELECT * FROM kitapbilgisi where kitapNo='".$id."'");
$query2=mysql_query("SELECT * FROM kitaplar where kitapNo='".$id."'");
while ($rows=mysql_fetch_array($query2)){
$stok=$rows['stok'];
}
while ($row=mysql_fetch_array($query)){
	$kno=$row['kitapNo'];
	$name=$row['kitapAdi'];
	$kitaptur=$row['kitapTuru'];
	$aciklama=$row['aciklama'];
	$yayinevi=$row['yayinevi'];
	$yazar=$row['kitapYazar'];
	$gorsel=$row['kitapGorsel'];
	$fiyat=$row['kitapFiyat'];

}
$q1=mysql_query("SELECT * FROM kategoriler");
	?>
		<form action="" method="post" enctype="multipart/form-data" name="upd" id="upd">
  <table width="39%" border="0">
    <tr>
      <td width="15%">Kitap No</td>
      <td width="5%">:</td>
      <td width="80%"><label for="K_No"></label>
      <input type="text" name="K_No" id="K_No" value="<?php echo $kno;?>" /></td>
    </tr>
    <tr>
      <td>Kitap Adı</td>
      <td>:</td>
      <td><label for="k_Ad"></label>
      <input type="text" name="k_Ad" id="k_Ad" value="<?php echo $name; ?>" /></td>
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
      <textarea name="k_Aciklama" id="k_Aciklama" cols="45" rows="5"><?php echo $aciklama;?></textarea></td>
    </tr>
    <tr>
      <td>Yayınevi</td>
      <td>:</td>
      <td><label for="yayin"></label>
      <input type="text" name="yayin" id="yayin" value="<?php echo $yayinevi; ?>"  /></td>
    </tr>
    <tr>
      <td>Yazar</td>
      <td>:</td>
      <td><label for="yazar"></label>
      <input type="text" name="yazar" id="yazar" value="<?php echo $yazar; ?>"/></td>
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
      <input type="text" name="stok" id="stok" value="<?php echo $stok; ?>" /></td>
    </tr>
    <tr>
      <td>Fiyat</td>
      <td>:</td>
      <td><label for="fiyat"></label>
      <input type="text" name="fiyat" id="fiyat" value="<?php echo $fiyat; ?>"/></td>
    </tr>    <tr>
      <td colspan="2"><input type="submit" name="upd" id="upd" value="Güncelle" /></td>
      <td>
        <input type="reset" name="temizle" id="temizle" value="Temizle" />
      </td>
    </tr>
  </table>
</form>
<a href="manage.php">Yönetim Paneline Dön</a></br>
<a href="index.php">Ana Sayfaya Dön</a>
<?php
	if(isset($_POST['upd']))
	{
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
		$file = $_FILES['gorsel'];
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
			if(copy ($file['tmp_name'], $upload_file)){
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
	$qk=mysql_query("UPDATE kitaplar SET stok='".$stok."',kitapNo='".$k_no."',kitapAdi='".$k_ad."' WHERE kitapNo='".$id."'");
	$q2=mysql_query("UPDATE kitapbilgisi SET kitapNo='".$k_no."',kitapAdi='".$k_ad."',kitapTuru='".$k_tur."',aciklama='".$k_aciklama."',yayinevi='".$yayin."',kitapYazar='".$yazar."',kitapGorsel='".$upload_file."',kitapFiyat='".$fiyat."' where kitapNo='".$id."'");
	echo "<script> alert('Kitap Güncellendi.'); </script>";
	}

 } 
 }?>
</body>
</html>