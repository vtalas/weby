<?php 
$headercs = "<h3>&nbsp;</h3>
	<h4>POLYFUNKČNÍ DŮM SE ZUBNÍ ORDINACÍ A LABORATOŘÍ V LITOMYŠLI</h4>";
		
$textcs = "	<div class='detail'>
	<div>místo stavby <span class='red'>|</span> Litomyšl</div>
	<div>investor <span class='red'>|</span> soukromá osoba</div>
	<div>autor <span class='red'>|</span> Polách, Bravenec</div>
	<div>realizace <span class='red'>|</span> 2010</div>
	</div>";

//preg_replace - oddela zbytecne bile znaky (uspora prenesenych dat)
$data["text"]["cs"]= preg_replace('/\s\s+/', '', $textcs);
$data["header"]["cs"]= preg_replace('/\s\s+/', '', $headercs);
?>