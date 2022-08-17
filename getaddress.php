<?php
include "public.php";
set_time_limit(3600000);

$DataRs = mysql_query("select distinct urladdress from urldata where urladdress like '%m.tokopedia.com/p/kecantikan%' order by id desc");


while($FetchDataRs = mysql_fetch_row($DataRs)) {
	$url= $FetchDataRs[0];	
	$website = file_get_contents($url); 
	
	//preg_match_all("<a href=\x22(.+?)\x22>", $website, $matches); 
	preg_match_all("< href=\x22(.+?)\x22>", $website, $matches); 

	//$matches = str_replace('a href=', '', $matches); 
	$matches = str_replace('href=', '', $matches); 
	
	$matches = str_replace('"', '', $matches); 
	$list = $matches[1]; 
	foreach ($list as $set) {		
			//if (substr($set,0,4)=='http') {
				$insertdata = "INSERT INTO urldata (urladdress,urladdressref) VALUES ('".substr($set,0,100)."','".$FetchDataRs[0]."')";
				$adddata = mysql_query($insertdata);
				echo '<br>'.$insertdata;
			//}
	}
}
$updatedata = mysql_query("update urldata set urladdress = concat('https://m.tokopedia.com',urladdress) where urladdressref like 'https://m.tokopedia.com%' and urladdress like '/%'");

?>
