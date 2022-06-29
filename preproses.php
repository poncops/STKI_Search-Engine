<?php

function preproses($teks) {
    include 'koneksi.php';
    //bersihkan tanda baca, ganti dengan space
   $teks = str_replace("'", " ", $teks);
   $teks = str_replace("-", " ", $teks);
   $teks = str_replace(")", " ", $teks);
   $teks = str_replace("(", " ", $teks);
   $teks = str_replace("\"", " ", $teks);
   $teks = str_replace("/", " ", $teks);
   $teks = str_replace("=", " ", $teks);
   $teks = str_replace(".", " ", $teks);
   $teks = str_replace(",", " ", $teks);
   $teks = str_replace(":", " ", $teks);
   $teks = str_replace(";", " ", $teks);
   $teks = str_replace("!", " ", $teks);
   $teks = str_replace("?", " ", $teks);
   //ubah ke huruf kecil
   $teks = strtolower(trim($teks)); 
    //terapkan stop word removal
$astoplist = array ("yang", "juga", "dari", "dia", "kami",
"kamu", "ini", "itu", "atau", "dan", "tersebut",
"pada", "dengan", "adalah", "yaitu", "ke");
foreach ($astoplist as $i => $value) {
$teks = str_replace($astoplist[$i], "", $teks);
}
//terapkan stemming
//buka tabel tbstem dan bandingkan dengan berita
//terapkan stemming
//buka tabel tbstem dan bandingkan dengan berita
//$restem = mysql_query("SELECT * FROM tbstem ORDER BY Id");
$restem = mysqli_query($conn,"SELECT * FROM tbstem ORDER BY Id");
while($rowstem = mysqli_fetch_array($restem)) {
$teks = str_replace($rowstem['Term'],
$rowstem['Stem'], $teks);
}
//kembalikan teks yang telah dipreproses
$teks = strtolower(trim($teks));
return $teks;
} //end function preproses
?>