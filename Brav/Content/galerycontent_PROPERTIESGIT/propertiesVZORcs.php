<?php 
$headercs = "<h3>AAA</h3><h3>aaa</h3>";
		
$textcs = "	<div class='detail'>
	<div>místo stavby <span class='red'>|</span> xxx</div>
	<div>investor <span class='red'>|</span> xxx</div>
	<div>autor <span class='red'>|</span> xxx</div>
	<div>realizace <span class='red'>|</span> 1999-2005</div>
	</div>";

//preg_replace - oddela zbytecne bile znaky (uspora prenesenych dat)
$data["text"]["cs"]= preg_replace('/\s\s+/', '', $textcs);
$data["header"]["cs"]= preg_replace('/\s\s+/', '', $headercs);
?>