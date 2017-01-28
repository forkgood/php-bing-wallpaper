<?php
    error_reporting(0);
    $OBingJson=file_get_contents('http://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1');
    $BingJson=json_decode($OBingJson,true);
    $picUrl="http://cn.bing.com".$BingJson['images'][0]['url'];
    header("Location:".$picUrl);
?>