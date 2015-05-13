<?php
$conn=mysql_connect("localhost","root","")or die ("Veritabanı bağlantı hatası!!!".mysql_error());
$db=mysql_select_db("librarysystem",$conn);
mysql_query("SET NAMES utf8");header("Content-Type: text/html; charset='utf-8'");  
?>