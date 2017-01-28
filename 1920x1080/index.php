<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-type:image/jpg');
	error_reporting(0);
	ob_end_clean();
	ob_start();
	$OBingJson=file_get_contents('http://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1');
	$BingJson=json_decode($OBingJson,true);

	/*遍历数组*/
	foreach($BingJson as $key=>$val){
		$picUrl='http://www.bing.com'.$BingJson['images'][0]['url'];
		$iurl=readfile($picUrl);
		$in=ob_get_contents($iurl);
		return $in;
		exit();
	};
?>