<html>
	<head>
		<title> Kütüphane Sistemi'ne Hoşgeldiniz </title>
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
    <body>
    <?php 
	error_reporting(E_ALL & ~E_NOTICE); 
	$cat=$_GET["cat"]; 
	$kitapdetay=$_GET["kitapdetay"];
	include "dbconnection.php";
	header('Content-Type: text/html; charset=utf8');?>
    <div id="header"></div>
    <div id="menu" style="background-image: url(images/menubg.jpg);">
    <ul>
    	<li><a href="index.php">Ana Sayfa</a></li>
        <li><a href="admin.php">Yönetim Paneli</a></li>
    </ul>
    </div>
    <div id="container">
    <div id="categories" style="background-image: url(images/catbg.jpg);">
    <h1>Kategoriler</h1>
   <?php 
		$catquery=mysql_query("Select * From kategoriler");
		while($row=mysql_fetch_array($catquery)){
			echo "<a href='index.php?cat=".$row['catName']."'>".$row['catName']."<a/><br>";
			}
		?>
    </div>
    <div id="content"><?php if(!empty($cat)){
		echo $cat." Kategorisindeki Kitaplar <br>";
		$query=mysql_query("select * from kitapbilgisi where kitapTuru='".$cat."'");
		?><table><?php
		while($data=mysql_fetch_array($query)){
			echo "<table><tr><td><a href='index.php?kitapdetay=".$data['kitapNo']."'><img src='".$data['kitapGorsel']."'></a></td></tr></table>";
			echo "<table><tr><td><a href='index.php?kitapdetay=".$data['kitapNo']."'>".$data['kitapAdi']."</a></td></tr></table>";
			echo "<table><tr><td>".$data['kitapFiyat']." TL </a></td></tr></table>";
			}
			?></table><?php
		}
		else
		{if(empty($kitapdetay)){echo "En Son Eklenenler <br>";
		$query=mysql_query("select * from kitapbilgisi order by id DESC limit 0,5");
		?><table><?php
		while($data=mysql_fetch_array($query)){
			echo "<td><a href='index.php?kitapdetay=".$data['kitapNo']."'><img src='".$data['kitapGorsel']."'></td>";
			echo "<tr><td><a href='index.php?kitapdetay=".$data['kitapNo']."'>".$data['kitapAdi']."</td></tr>";
			echo "<tr><td>".$data['kitapFiyat']." TL </td></tr>";
			}
		}else{
			$detay=mysql_query("Select * from kitapbilgisi where kitapNo='".$kitapdetay."'");
			?><table><?php
			while($detailloop=mysql_fetch_array($detay)){
			echo "<tr><td rowspan='6'><img src='".$detailloop['kitapGorsel']."'></td><td>Kitap Adı:".$detailloop['kitapAdi']."</td></tr>";
			echo"<tr><td>Kitap Türü:".$detailloop['kitapTuru']."</td></tr>";
			echo"<tr><td>Yazar:".$detailloop['kitapYazar']."</td></tr>";
			echo"<tr><td>Yayınevi:".$detailloop['yayinevi']."</td></tr>";
			echo"<tr><td>Fiyat:".$detailloop['kitapFiyat']."  TL </td></tr>";
			echo"<tr><td>Açıklama:".$detailloop['aciklama']."</td></tr>";
			}}
		}?></table></table></div>
    </div>
    <div id="footer"></div>
    </body>
</html>
