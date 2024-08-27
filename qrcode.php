<?php
require_once 'connection.php';
require_once  '/phpqrcode/qrlib';
$path = 'images/';
$qrcode = $path.time(). ".png";
$qrimage = time(). ".png";


if(isset($_REQUEST['sbt-btn'])){
    $qrtext = $_REQUEST['qrtext'];
    $query = mysqli_query($connection, "insert into qrcode set qrtext= 'qrtext', qrimage= $qrimage'")
}


QRcode :: png("Tech Area", $qrcode, 'H', 4, 4);

echo "<img src ='".$qrcode."'>";



?>