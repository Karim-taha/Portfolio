<?php 
session_start();
include_once('lib/portfolio.php');

$res = Delete_Portfolio($_GET['proid']);

if($res == 1){
header("LOCATION:Allportfolios.php");
}else{
    header("LOCATION:Allportfolios.php");}
?>