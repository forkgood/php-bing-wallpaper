<?php
	/*提取Bing网站的信息*/
	$str=file_get_contents('https://www.bing.com/HPImageArchive.aspx?idx=0&n=1');
	/*匹配字符串中的url超链接，成功返回 1 ，否则返回 0 */
	if(preg_match("/<url>(.+?)<\/url>/ies",$str,$matches)){
		$imgurl='http://www.bing.com'.$matches[1];
	}
	if($imgurl){
		/*用于发送原生的 HTTP 头，提示输出图片*/
		header('Content-Type: image/JPEG');
		/*清空（擦除）缓冲区并关闭输出缓冲*/
		@ob_end_clean();
		/*读取文件并写入到输出缓冲 */
		@readfile($imgurl);
		/*该函数将当前为止程序的所有输出发送到用户的浏览器*/
		@flush();
		/*这个函数将送出缓冲区的内容（如果里边有内容的话）*/
		@ob_flush();
		exit();
	}else{
		exit('error');
	}
?>