<?php
require_once("../config/config.php");
require_once("../config/setting.php"); 
if($_SERVER['REMOTE_ADDR']=='172.104.161.223'){ 
    $trxid = $_POST['content']['trxid'];
    $trxid = $_POST['content']['code'];
    $trxid = $_POST['content']['phone'];
    $trxid = $_POST['content']['idcust'];
    $trxid = $_POST['content']['sequence'];
    $trxid = $_POST['content']['status'];
    $trxid = $_POST['content']['sn'];
    $trxid = $_POST['content']['note'];
    $price = $_POST['content']['price'];
    $trxid_api = $_POST['content']['trxid_api'];
    $date_insert = $_POST['content']['date_insert'];
    $date_update = $_POST['content']['date_update'];
    $last_balance= $_POST['content']['last_balance'];

file_put_contents('save.txt', $trxid);

}