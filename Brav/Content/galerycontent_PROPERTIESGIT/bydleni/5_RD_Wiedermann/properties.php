<?php 

$headercs = "<h3>&nbsp;</h3><h3>REKONSTRUKCE RODINNÉ VILY V OLOMOUCI</h3><br />";
		
$textcs = "
	<div class='detail'>
	<div>místo stavby <span class='red'>|</span> Olomouc, Helceletova ul.</div>
	<div>investor <span class='red'>|</span> soukromá osoba</div>
	<div>autor <span class='red'>|</span> Polách, Bravenec</div>
	<div>projekt <span class='red'>|</span> Atelier Polách & Bravenec s.r.o. 2010-12</div>
	<div>realizace <span class='red'>|</span> v realizaci</div>
	</div>";

//preg_replace - oddela zbytecne bile znaky (uspora prenesenych dat)
$data["text"]["cs"]= preg_replace('/\s\s+/', '', $textcs);
$data["header"]["cs"]= preg_replace('/\s\s+/', '', $headercs);



?>