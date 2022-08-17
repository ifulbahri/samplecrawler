<?php
/*Parsing Raw Data on Local Database
Created by: Sjaiful Bahri
Last Update:  1 Jan 2019
Running Condition: Prefer to be offline
This function is used to identify words such as address, store name, latitude, longitude and others.
*/
include "public.php";
set_time_limit(360000);

$UpdateRs = mysql_query("update rawdata set email='' where email ='0'");

$DataRs = mysql_query("SELECT distinct urladdress,content,id FROM rawdata where urladdress like 'https://m.tokopedia.com/%/info' and status<>'Y' and id > 27866 order by id desc");


$i=0;
while($FetchDataRs = mysql_fetch_row($DataRs)) {
	$i=$i+1;
	$url= $FetchDataRs[0];
	$data = $FetchDataRs[1];
	$id = $FetchDataRs[2];	
	
	$dataremark="";
	preg_match_all('/(district_id)(.*)/i',$data, $match);
	
	$list = $match[0]; 
	foreach ($list as $set) {
		$city=$set;                  
	}
	$city=trim(str_replace('"','',$city));
	$city=trim(str_replace('<','',$city));
	$city=trim(str_replace('>','',$city));

	
	$city=trim(str_replace('location','',$city));
	$city=trim(str_replace('[nl\]','',$city));
	$city=trim(str_replace('[nl]','',$city));	
	$city=trim(str_replace('u002F','/',$city));
	$city=trim(str_replace('_','',$city));
	$city=trim(str_replace('{','',$city));
	$city=trim(str_replace('}','',$city));
	$city=trim(str_replace('$ROOTQUERY','',$city));
	$city=trim(str_replace('[','<br>',$city));
	$city=trim(str_replace(']','<br>',$city));
	$city=trim(str_replace('data.shipments','',$city));
	$city=trim(str_replace('shipprods','',$city));
	$city=trim(str_replace('shipprodname:','',$city));
	$city=trim(str_replace('shipprodid:','',$city));
	$city=trim(str_replace('ShopLocation','',$city));
	$city=trim(str_replace('shopInfo','',$city));

	$city=trim(str_replace('districtid:',"districtid='",$city));
	$city=trim(str_replace('districtname:',"districtname='",$city));

	$city=substr($city,0,5000);
	
	preg_match_all('/(postal_code)(.*)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$postalcode=$set;                  
	}
	$postalcode=trim(str_replace('"','',$postalcode));
	$postalcode=trim(str_replace('postal_code:','',$postalcode));
	$postalcode=substr($postalcode,0,5);

	preg_match_all('/(addr_street).+?(latitude)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$address=$set;                  
	}
	$address=trim(str_replace('"','',$address));
	$address=trim(str_replace('addr_street:','',$address));
	$address=trim(str_replace('[nl\]','',$address));
	$address=trim(str_replace('[nl]','',$address));	
	$address=trim(str_replace('latitude','',$address));
	$address=trim(str_replace('u002F','',$address));
	

	preg_match_all('/(latitude).+?(longitude)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$latitude=$set;                  
	}
	$latitude=trim(str_replace('"','',$latitude));
	$latitude=trim(str_replace('longitude','',$latitude));
	$latitude=trim(str_replace('latitude:','',$latitude));
	$latitude=trim(str_replace(',','',$latitude));
	
	preg_match_all('/(longitude).+?(province_id)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$longitude=$set;                  
	}
	$longitude=trim(str_replace('"','',$longitude));
	$longitude=trim(str_replace('province_id','',$longitude));
	$longitude=trim(str_replace('longitude:','',$longitude));
	$longitude=trim(str_replace(',','',$longitude));
	
	preg_match_all('/(location_email).+?(location_address_name)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$email=$set;                  
	}
	$email=trim(str_replace('"','',$email));
	$email=trim(str_replace('location_address_name','',$email));
	$email=trim(str_replace('location_email:','',$email));
	$email=trim(str_replace(',','',$email));
	
	preg_match_all('/(location_address_name).+?(location_postal_code)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$name=$set;                  
	}
	$name=trim(str_replace('"','',$name));
	$name=trim(str_replace('location_postal_code','',$name));
	$name=trim(str_replace('location_address_name:','',$name));
	$name=trim(str_replace(',','',$name));
	echo '<br>'.$i.'-'.$url;		

	preg_match_all('/(location_phone).+?(location_area)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$phone=$set;                  
	}
	$phone=trim(str_replace('"','',$phone));
	$phone=trim(str_replace('location_area','',$phone));
	$phone=trim(str_replace('location_phone:','',$phone));
	$phone=trim(str_replace(',','',$phone));

	preg_match_all('/(location_area).+?(location_district_id)/i',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {
		$area=$set;                  
	}
	$area=trim(str_replace('"','',$area));
	$area=trim(str_replace('location_district_id','',$area));
	$area=trim(str_replace('location_area:','',$area));
	$area=trim(str_replace(',','',$area));

	$UpdateRs = mysql_query("update rawdata set remark='".$city."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set address='".$address."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set postalcode='".$postalcode."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set address='".$address."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set email='".$email."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set name='".$name."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set latitude='".$latitude."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set longitude='".$longitude."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set status='Y' where id=".$id);	
	$UpdateRs = mysql_query("update rawdata set phone='".$phone."' where id=".$id);
	$UpdateRs = mysql_query("update rawdata set area='".$area."' where id=".$id);
		
}

$UpdateRs = mysql_query("update rawdata set name='NONAME' where name=''");
$UpdateRs = mysql_query("update rawdata set postalcode='' where postalcode like '%r%'");
$UpdateRs = mysql_query("update rawdata set phone='' where phone='0'");
$UpdateRs = mysql_query("update rawdata set address='' where address=','");
$UpdateRs = mysql_query("update rawdata set latitude='' where latitude='-999'");
$UpdateRs = mysql_query("update rawdata set longitude='' where longitude='-999'");
	
mysql_close;
echo '<br><br>doparsing has been done';
?> 
