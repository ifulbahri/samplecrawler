<?php
//Get Raw Page 
//Created by: Sjaiful Bahri
//Last Update: 12 December 2018
//Running Condition: Must be online

include "public.php";
set_time_limit(360000);
$insertdata = mysql_query("insert into urldata (urladdress,urladdressref)
SELECT concat(urladdress,'/info'),urladdressref FROM urldata1 WHERE urladdress like '%m.tokopedia.com/%' and urladdress not like '%m.tokopedia.com/%/%' and concat(urladdress,'/info') not in (SELECT urladdress from urldata)");

$DataRs = mysql_query("SELECT distinct urladdress,id FROM urldata  WHERE urladdress like '%m.tokopedia.com%/info' and status <> 'Y' and urladdress not like '%login?ld%'");
$i=0;

while($FetchDataRs = mysql_fetch_row($DataRs)) {
	$i=$i+1;
	$updateRs = mysql_query("update urldata set status = 'Y' where id = ".$FetchDataRs[1]);	
	$content="";
	$url= $FetchDataRs[0];
	$data = file_get_contents($url);
		
	preg_match_all('/(<html)(.*)/s',$data, $match);
	$list = $match[0]; 
	foreach ($list as $set) {		
		$trash = array("'");
		$set=str_replace($trash,"‘",$set);
                $content = $set;
	}
	echo '<br>'.$i.'-'.$FetchDataRs[0];
	$InsertRs = mysql_query("insert into rawdata (urladdress,content) values('$url','$content')");	
}


$updatedata = mysql_query("update rawdata set sourcetype='/Kecantikan/' where name like '%kosmetik%' or urladdress like '%kosmetik%' or name like '%COSMETIC%' or urladdress like '%COSMETIC%' or name like '%beauty%' or urladdress like '%beauty%' or urladdress like '%lipstik%' or urladdress like '%lipstick%' or urladdressref like '%lipstik%' or urladdressref like '%lipstick%' or urladdress like '%kapas%' or urladdressref like '%kapas%' or urladdressref like '%bedak%' or urladdress like '%bedak%' or urladdress like '%wardah%' or urladdressref like '%wardah%' or urladdress like '%parfum%' or urladdressref like '%parfum%' or name like '%parfum%' or urladdress like '%perfum%' or urladdressref like '%perfum%' or name like '%perfum%' or urladdress like '%kefir%' or urladdressref like '%kefir%' or name like '%kefir%' or urladdressref like '%shampo%' or urladdress like '%shampoo%' or name like '%shampoo%' or name like '%body%shop%' or urladdress like '%body%shop%' or name like '%nuskin%' or urladdress like '%nuskin%' or name like '%kecantikan%' or urladdress like '%kecantikan%' or urladdressref like '%kecantikan%' or urladdressref like '%maybelline%' or urladdressref like '%dermatix%' or urladdressref like '%anti%aging%' or urladdressref like '%vaseline%' or urladdressref like '%cream%olay%' or urladdressref like '%olay%cream%' or urladdressref like '%cream%temulawak%' or urladdressref like '%masker%kulit%' or urladdressref like '%masker%kefir%' or urladdressref like '%biore%' or urladdressref like '%facial%treatment%' or urladdressref like '%ponds%' or urladdressref like '%skin%care%' or urladdressref like '%alat%cukur%' or urladdressref like '%masker%' or urladdressref like '%minyak%kayu%' or urladdressref like '%minyak%bulus%' or urladdressref like '%cloris%soap%' or urladdressref like '%cetaphil%' or urladdressref like '%air%mineral%detox%' or urladdressref like '%pembersih%komedo%' or urladdressref like '%cosmetic%' or urladdressref like '%kosmetik%' or urladdressref like '%dermacol%' or urladdressref like '%catokan%' or urladdressref like '%milani%' or urladdressref like '%mylea%' or urladdressref like '%facial%wash%' or urladdressref like '%aloe%vera%' or urladdressref like '%Clinique%Hydrating%' or urladdressref like '%you%makeup%' or urladdressref like '%sunblock%' or urladdressref like '%april%skin%' or urladdressref like '%juno%co%' or urladdressref like '%lt%pro%' or urladdressref like '%revlon%' or urladdressref like '%skin%aqua%' or urladdressref like '%girlactik%' ");

$updatedata = mysql_query("update rawdata set sourcetype='/Ibu & Bayi/' where urladdressref like '%pigeon%' or urladdress like '%pigeon%' or name like '%pigeon%' or urladdressref like '%ibu%bayi%' or urladdress like '%ibu%bayi%' or name like '%ibu%bayi%' or urladdressref like '%baby%' or urladdress like '%baby%' or name like '%baby%' or urladdress like '%kids%' or name like '%kids%'  or urladdress like '%susu' or name like '%susu' or urladdress like '%mommy%' or name like '%mommy%' or urladdress like '%bayi%' or name like '%bayi%' or urladdress like '%balita%' or name like '%balita%' or urladdressref like '%stroller%' or urladdressref like '%stroler%' or urladdressref like '%nutrilon%' or urladdress like '%nutrilon%' or urladdressref like '%minyak%kemiri%' or urladdressref like '%minyak%telon%' or urladdressref like '%zwitsal%' or urladdressref like '%baby%lotion%' or urladdressref like '%susu%bayi%' or urladdressref like '%tisu%basah%' or urladdressref like '%tissue%basah%' or urladdressref like '%baby%wipes%' or urladdressref like '%prenagen%' or urladdressref like '%sikat%bayi%'  or urladdressref like '%kaos%bayi%'  or urladdressref like '%botol%bayi%' or urladdressref like '%kursi%bayi%' or urladdressref like '%perlengkapan%bayi%' or urladdressref like '%gendongan%bayi%' or urladdressref like '%tas%bayi%' or urladdressref like '%box%bayi%' or urladdressref like '%sepatu%bayi%' or urladdressref like '%biskuit%bayi%' or urladdressref like '%kasur%bayi%' or urladdressref like '%lotion%bayi%' or urladdressref like '%parcel%bayi%' or urladdressref like '%sweater%bayi%' or urladdressref like '%makanan%bayi%' or urladdressref like '%bubur%bayi%' or urladdressref like '%makan%bayi%' or urladdressref like '%topi%bayi%' or urladdressref like '%selimut%bayi%' or urladdressref like '%lemari%bayi%' or urladdressref like '%newborn%bayi%' or urladdressref like '%bayi%newborn%' or urladdressref like '%baju%bayi%' or urladdressref like '%piyama%bayi%' or urladdressref like '%sereal%bayi%' or urladdressref like '%mama%lemon%' or urladdressref like '%/sambal-%' or urladdressref like '%vidoran%'  or urladdressref like '%lactamil%' or urladdressref like '%kantong%asi%' or urladdressref like '%perlengkapan%newborn%' or urladdressref like '%frisian%flag%' or urladdressref like '%/anmum%' or urladdressref like '%/medela%' or urladdressref like '%frisomum%' or urladdressref like '%ice%bag%' or urladdressref like '%sgm%bunda%' or urladdressref like '%ice%bag%' or urladdressref like '%-bayi-%'  or urladdressref like '%baju%menyusui%' or urladdressref like '%baby%bath%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Perawatan Tubuh/' where urladdress like '%soft%lens%' or name like '%soft%lens%' or urladdressref like '%/Perawatan-Tubuh%' or urladdressref like '%deodoran%' or urladdressref like '%hair%lotion%' or urladdressref like '%pembalut%wanita%' or urladdressref like '%dettol%' or urladdressref like '%loreal%' or urladdressref like '%masker%kaki%' or urladdressref like '%pemutih%gigi%' or urladdressref like '%sabun%dove%' or urladdressref like '%cairan%softlen%' or urladdressref like '%sabun%sirih%' or urladdressref like '%minyak%rambut%' or urladdressref like '%body%spa%' or urladdressref like '%body%care%' or urladdressref like '%mouth%wash%' or urladdressref like '%odol%nasa%' or urladdressref like '%creambath%'  or urladdressref like '%lulur-%' or urladdressref like '%nivea%' or urladdressref like '%body%lotion%' or urladdressref like '%coffee%scrub%' or urladdressref like '%oilum%' or urladdressref like '%mirael%' or urladdressref like '%acne%care%' or urladdressref like '%glass%skin%' or urladdressref like '%dental%' or urladdressref like '%body%shop%' or urladdressref like '%pantene%' or urladdressref like '%pembalut%ion%'");


$updatedata = mysql_query("update rawdata set sourcetype='' where sourcetype='https://m.'");


$updatedata = mysql_query("update rawdata set sourcetype='/Mainan & Hobi/' where urladdressref like '%mainan%hobi%' or urladdress like '%mainan%hobi%' or name like '%mainan%hobi%' or urladdressref like '%toys%' or urladdress like '%toys%' or name like '%toys%' or urladdressref like '%mainan%koleksi%' or urladdressref like '%/bonsai-%' or urladdressref like '%gundam%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Makanan & Minuman/' where urladdressref like '%cakes%' or urladdress like '%cakes%' or name like '%cakes%' or urladdressref like '%madu%' or urladdressref like '%black%tea%' or urladdressref like '%teh%hitam%' or urladdressref like '%green%tea%' or urladdressref like '%teh%hijau%'  or urladdressref like '%minyak%goreng%' or urladdressref like '%kayu%manis%' or urladdressref like '%keju%mozza%' or urladdressref like '%keripik%tempe%' or urladdressref like '%beauty%drink%' or urladdressref like '%makan%minum%' or urladdressref like '%ripik%jamur%' or urladdressref like '%bakmi%mewah%' or urladdressref like '%qua%oat%meal%' or urladdressref like '%durian%' or urladdressref like '%kue%nastar%' or urladdressref like '%kaldu%ayam%' or urladdressref like '%/beras%' or urladdressref like '%/nugget%' or urladdressref like '%/kerupuk%' or urladdressref like '%/keripik%' or urladdressref like '%/sirup%' or urladdressref like '%/keripik%' or urladdressref like '%/sosis%' or urladdressref like '%/kue-%' or urladdressref like '%-kopi-%' or urladdressref like '%batagor%' or name like '%batagor%'  or urladdressref like '%bahan%makanan%' or urladdressref like '%knorr%golden%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Handphone & Tablet/' where urladdressref like '%xiaomi%' or urladdress like '%xiaomi%' or name like '%xiaomi%' or urladdressref like '%power%bank%' or urladdress like '%power%bank%' or urladdressref like '%samsung%' or urladdress like '%samsung%' or urladdressref like '%handphone%tablet%' or urladdressref like '%smart%phone%' or urladdressref like '%sony%xperia%' or urladdressref like '%microsd%' ");

$updatedata = mysql_query("update rawdata set sourcetype='/Office & Stationery/' where urladdressref like '%faber%castle%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Fashion Pria/' where urladdressref like '%celana%jeans%' or urladdressref like '%celana%' or urladdressref like '%dompet%kulit%' or urladdressref like '%kemeja%' or urladdressref like '%jam%tangan%' or urladdressref like '%sepatu%converse%' or urladdressref like '%converse%sepatu%' or urladdressref like '%smart%watch%' or urladdressref like '%kaos%raglan%' or urladdressref like '%kaos%pria%' or urladdressref like '%fashion%pria%' or urladdressref like '%jeans%pria%' or urladdressref like '%adidas%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Fashion Wanita/' where urladdressref like '%white%shoes%' or urladdressref like '%pakaian%wanita%' or urladdressref like '%kaos%perempuan%'  or urladdressref like '%fashion%wanita%' or urladdressref like '%sporty%girl%'  or urladdressref like '%dompet%korea%' or urladdressref like '%gantungan%kunci%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Elektronik/' where urladdressref like '%peralatan%elektronik%' or urladdressref like '%harman%kardon%' or urladdressref like '%/elektronik/%' or urladdressref like '%earphone%' or urladdressref like '%headphone%' or urladdressref like '%air%cooler%' or urladdressref like '%/electronic%' or urladdressref like '%tv%audio%' or urladdressref like '%/sony-%'  or urladdressref like '%/ac-%' or urladdressref like '%/lampu-%' or urladdressref like '%/bluetooth%' or urladdressref like '%bohlam%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Kamera/' where urladdressref like '%kamera%amkov%' or urladdressref like '%kamera%dslr%' or urladdressref like '%casing%kamera%' or name like '%kamera%' or name like '%camera%' or urladdressref like '%kamera%aqua%' or urladdressref like '%/kamera/%'  or urladdressref like '%foto%studio%' or urladdressref like '%studio%foto%' or urladdressref like '%action%cam%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Fashion Muslim/' where urladdressref like '%hijab%' or urladdressref like '%baju%koko%' or urladdressref like '%jilbab%instan%' or urladdressref like '%pakaian%muslim%' or urladdressref like '%fashion%muslim%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Fashion Anak/' where urladdressref like '%fashion%anak%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Komputer & Aksesoris/' where urladdressref like '%komputer%akses%' or urladdressref like '%mouse%wireles%' or urladdressref like '%/printer-%' or urladdressref like '%/harddisk-%'  or urladdressref like '%/router-%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Otomotif/' where urladdressref like '%/otomotif/%' or urladdressref like '%minyak%rem%' or urladdressref like '%box%motor%' or urladdressref like '%jas%hujan%'");


$updatedata = mysql_query("update rawdata set sourcetype='/Olahraga/' where urladdressref like '%jersey%' or urladdressref like '%sepatu%gunung%' or urladdressref like '%sepeda%gunung%' or urladdressref like '%helm%sepeda%' or urladdressref like '%sepeda%united%' or urladdressref like '%kaos%kaki%bola%' or urladdressref like '%kaos%kaki%futsal%' or urladdressref like '%kaos%bola%' or urladdressref like '%kaos%futsal%' or urladdressref like '%sport%under%' or urladdressref like '%ankle%support%' or urladdressref like '%baju%renang%' or urladdressref like '%/olahraga/%' or urladdressref like '%tas%pancing%' or urladdressref like '%sarung%tangan%sepeda%' or urladdressref like '%kinesio%tape%' or urladdressref like '%/bola-%' or urladdressref like '%baju%senam%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Kesehatan/' where urladdressref like '%/kesehatan%'");
$updatedata = mysql_query("update rawdata set sourcetype='/Kecantikan/' where urladdressref like '%/kecantikan%'");
$updatedata = mysql_query("update rawdata set sourcetype='/Ibu & Bayi/' where urladdressref like '%/Ibu-Bayi%'");
$updatedata = mysql_query("update rawdata set sourcetype='/Office & Stationery/' where urladdressref like '%/office%stationery/%'");
$updatedata = mysql_query("update rawdata set sourcetype='/Dapur/' where urladdressref like '%/dapur/%' or urladdressref like '%roti%john%' or urladdressref like '%piring%keramik%' or urladdressref like '%gelas%keramik%' or urladdressref like '%blender%' or urladdressref like '%botol%minum%' or urladdressref like '%/toaster-%' ");
$updatedata = mysql_query("update rawdata set sourcetype='/Laptop & Aksesoris/' where urladdressref like '%/laptop-aksesoris/%' or urladdressref like '%adaptor%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Gaming/' where urladdressref like '%playstation%'");





$updatedata = mysql_query("update rawdata set sourcetype='/Kesehatan/' where urladdress like '%obat%' or  urladdressref like '%obat%' or urladdress like '%herbal%' or  urladdressref like '%herbal%' or urladdress like '%sehat%' or  urladdressref like '%sehat%' or urladdress like '%medica%' or  urladdressref like '%medica%' or urladdress like '%medika%' or  urladdressref like '%medika%' or urladdress like '%farma%' or  urladdressref like '%farma%' or name like '%farma%' or name like '%herbal%' or name like '%apotek%' or name like '%apotik%' or urladdress like '%pharmacy%' or  urladdressref like '%pharmacy%' or  urladdress like '%vitamin%' or  urladdress like '%suplemen%' or name like '%vitamin%' or name like '%suplemen%' or name like '%sehat%' or name like '%skin%care%' or name like '%detox%' or urladdress like '%health%' or urladdress like '%alkes%' or name like '%alkes%' or urladdress like '%madu%' or urladdressref like '%madu%' or urladdress like '%diabet%' or urladdressref like '%diabet%' or name like '%toko jamu%' or urladdress like '%sabun%' or urladdressref like '%sabun%' or name like '%sabun%' or urladdress like '%kolesterol%' or urladdressref like '%kolesterol%' or name like '%kolesterol%' or urladdress like '%balsam%' or urladdressref like '%balsam%' or name like '%balsam%' or urladdress like '%apotik%' or urladdress like '%apotek%' or name like '%TOKO%OBAT%' or urladdressref like '%olive%oil%' or urladdress like '%olive%oil%' or urladdressref like '%garlic%' or urladdress like '%garlic%' or urladdressref like '%kencing%manis%' or urladdress like '%kencing%manis%' or urladdress like '%propolis%' or urladdressref like '%propolis%' or name like '%propolis%' or urladdress like '%soloco%' or name like '%soloco%' or urladdress like '%diet' or name like '%diet'  or urladdress like '%medis%' or name like '%medis%' or name like '%medica%' or urladdress like '%medika%' or name like '%herba%' or urladdress like '%herba%' or name like '%dental%' or urladdress like '%dental%' or name like '%health%' or name like '%klinik%' or urladdress like '%klinik%'  or name like '%medic%' or urladdress like '%medic%' or name like '%medik%' or urladdress like '%medik%' or name like '%detox%' or urladdress like '%detox%' or name like '%zaitun%' or urladdress like '%zaitun%' or name like '%herba%' or urladdress like '%herba%' or name like '%madu%' or urladdress like '%behel%' or name like '%behel%' or urladdress like '%terapi%' or name like '%terapi%'  or urladdress like '%pelangsing%' or name like '%pelangsing%' or urladdressref like '%nyeri%sendi%' or urladdressref like '%rematik%' or urladdressref like '%kolesterol%' or urladdressref like '%diabet%' or urladdressref like '%asam%urat%'  or urladdressref like '%alkes%'  or urladdressref like '%alat&kesehatan%'  or urladdressref like '%thermo%meter%'  or urladdressref like '%termo%meter%' or urladdressref like '%purinoir%' or urladdressref like '%vitamin%' or urladdressref like '%zaitun%' or urladdressref like '%gula%darah%' or urladdressref like '%obat%stroke%' or urladdressref like '%obat%jantung%' or urladdressref like '%metformin%' or urladdressref like '%salep%kulit%'  or urladdressref like '%panadol%' or urladdressref like '%minyak%kayu%putih%' or urladdressref like '%kondom%'  or urladdressref like '%kinoki%'  or urladdressref like '%minyak%kutus%' or urladdressref like '%pelangsing%' or urladdressref like '%kianpi%' or urladdressref like '%paracetamol%' or urladdressref like '%detox%tea%' or urladdressref like '%essential%oil%' or urladdressref like '%glucosamine%' or urladdressref like '%omron%' or urladdressref like '%termometer%' or urladdressref like '%alat%terapi%' or urladdressref like '%health%care%' or urladdressref like '%alat%bantu%dengar%' or urladdressref like '%minyak%kayu%putih%' or urladdressref like '%kertas%puyer%' or urladdressref like '%hansaplast%' or urladdressref like '%bawang%putih%' or urladdressref like '%daun%insulin%' or urladdressref like '%magnesium%oil%' or urladdressref like '%/koyo%' or urladdressref like '%tensimeter%' or urladdressref like '%salep%kl%' or urladdressref like '%salonpas%' or urladdressref like '%jamkho%' or urladdressref like '%minyak%angin%' or urladdressref like '%amlodipine%' or urladdressref like '%minyak%lintah%' or urladdressref like '%minyak%oles%' or urladdressref like '%virgin%coconut%' or urladdressref like '%sikat%gigi%' or urladdressref like '%airborne-supplemen%' or urladdressref like '%jamu%tawon%' or urladdressref like '%sidomuncul%' or urladdressref like '%/suplemen%' or urladdressref like '%/jamu-%' or urladdressref like '%bawang%hitam%' or urladdressref like '%habbatussauda%' or urladdressref like '%easytouch%' or urladdressref like '%akupuntur%' or urladdressref like '%alat%gluco%' or urladdressref like '%belerang%'  or urladdressref like '%nourish%skin%' or urladdressref like '%softex%' or urladdressref like '%/salep%' or urladdressref like '%/balsem%' or urladdressref like '%sanmol%' or urladdressref like '%gamat%' or urladdressref like '%astonish%washup%' or urladdressref like '%alat%medis%' or urladdressref like '%bantal%pijat%' or urladdressref like '%bantal%pijit%' or urladdressref like '%starmuno%' or urladdressref like '%onemed%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Buku/' where urladdressref like '%buku%diet%'");
$updatedata = mysql_query("update rawdata set sourcetype='/Rumah Tangga/' where urladdressref like '%Kue%Keranjang%' or urladdressref like '%/rumah-tangga/%' or urladdressref like '%kitchen%' or urladdressref like '%makanan%ikan%' or urladdressref like '%kran%air%' or urladdressref like '%bantal%dacron%'");

$updatedata = mysql_query("update rawdata set sourcetype='/Souvenir & Kado/' where urladdressref like '%souvenir-kado%'");
$updatedata = mysql_query("update rawdata set sourcetype='/Film & Musik/' where urladdressref like '%film-musik%' or urladdressref like '%/gitar-%'");
$updatedata = mysql_query("update rawdata set sourcetype='/Fashion & Aksesoris/' where urladdressref like '%fashion-aksesoris%'");



$updatedata = mysql_query("update rawdata set sourcetype='/Lainnya/' where sourcetype=''");

mysql_close;
echo "<br><br>GetRawPage: Process has been done";
//echo "<br>Jumlah Data: ".$i ;

?>
 
