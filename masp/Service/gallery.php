<?php 
require  '../config.php';

if (!function_exists("preprint")) { 
    function preprint($s, $return=false) { 
        $x = "<pre>"; 
        $x .= print_r($s, 1); 
        $x .= "</pre>"; 
        if ($return) return $x; 
        else print $x; 
    } 
} 
?> 


<?php
function isimage($file){
	$p = pathinfo($file);
	if (isset($p['extension']))
	{
		$e = strtolower($p['extension']);
		return 	($e == 'jpg'||$e == 'jpeg' || $e== 'gif' ||	$e == 'png');
	}
	return false;
}
function ishtml($file){
	$p = pathinfo($file);
	if (isset($p['extension']))
	{
		$e = strtolower($p['extension']);
		return ($e == 'html' || $e == "htm");
	}
	return false;
}
function isContent($file,$culture,$filename,$ext){
	$c = substr($file,0, 2);
	if ($c != $culture) return false;
	
	$p = pathinfo($file);
	//preprint($p);
	if (isset($p['extension']))
	{
		$e = strtolower($p['extension']);
		return ($e == $ext && strtolower($p['filename']) == $filename );
	}
	return false;
}
function titlefile($base,$imgfile){
	$p = pathinfo($imgfile);
	return $base.$p['filename'];
}
function curPageURL() {
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"];
 }
 return $pageURL;
}


function getfiles($path, $culture){
	if ($handle = opendir($path)) {
		$arr = null;
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				if(isimage($file)){
					$xxx["name"] =  $file;
					$tit = titlefile($path, $file);
					$xxx["title"] = "";
					if (file_exists($tit.".cz.txt")) $xxx["title"]["cz"] =  file_get_contents($tit.".cz.txt",true);
					if (file_exists($tit.".en.txt")) $xxx["title"]["en"] =  file_get_contents($tit.".en.txt",true);
					$arr["images"][] = $xxx;
				}
				if (isContent($file, $culture,$culture."_figure","txt")){
					$arr["figure"] =  file_get_contents($path.$file,true);
				}
				if (isContent($file, $culture,$culture."_text","html")){
					$arr["text"] =  file_get_contents($path.$file,true);
				}
			}
		}
		closedir($handle);
		sort($arr["images"]);
		return $arr;
	}
}

function vizualizace($path,$location,$baseurl){
	if (!is_dir($path)) return;
	if ($handle = opendir($path)) {
		$arr = null;
		while (false !== ($file = readdir($handle))) {
			if(ishtml($file)){
				$arr[] = curPageURL().$baseurl."/Content/".$location."/3d/".$file;
			}
		}
	}
	return $arr;
}
$location = isset($_POST["location"]) ? $_POST["location"] : "exalt" ;
$culture = isset($_POST["culture"]) ? $_POST["culture"] : "cz" ;


$list = getfiles("../Content/".$location."/slides/",$culture );
$list["vizualizace"] = vizualizace("../Content/".$location."/3d/",$location,$baseurl );
$list["full"] = curPageURL().$baseurl."/Content/".$location."/slides/";
$list["thumb"] = curPageURL().$baseurl."/Content/".$location."/thumbs/";
$list["location"] = $location;

//preprint($list);

echo json_encode($list);

?>