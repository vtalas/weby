<?php 
$headercs = "<h3>&nbsp;</h3><h3>MĚŠŤANSKÉ DOMY V OLOMOUCI - ul. 8. KVĚTNA, PANSKÁ, DENISOVA, UNIVERZITNÍ, ...</h3>";
		
$textcs = "	<div class='detail'>
	<div>místo stavby <span class='red'>|</span> Olomouc</div>
	<div>investor <span class='red'>|</span> soukromé osoby</div>
	<div>autor <span class='red'>|</span> Polách, Bravenec</div>
	<div>realizace <span class='red'>|</span> 2000-2012</div>
	</div>";

//preg_replace - oddela zbytecne bile znaky (uspora prenesenych dat)
$data["text"]["cs"]= preg_replace('/\s\s+/', '', $textcs);
$data["header"]["cs"]= preg_replace('/\s\s+/', '', $headercs);
?>