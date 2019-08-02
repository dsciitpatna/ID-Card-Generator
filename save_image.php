<?php

$imagedata = base64_decode($_POST['imgdata']);
$filename = md5(uniqid(rand(), true));
//path where you want to upload image
$file = "ids/".$filename.".png";
$imageurl = "http://localhost:8888/IdCardScript/ids/".$filename.".png";
file_put_contents($file,$imagedata);
echo $imageurl;