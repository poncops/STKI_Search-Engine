<?php
function ambilcache($keyword) {
    include 'koneksi.php';
    $resCache = mysqli_query($conn,"SELECT * FROM tbcache
                WHERE Query = '$keyword' ORDER BY Value DESC");
                $num_rows = mysqli_num_rows($resCache);
    if ($num_rows >0) {
//tampilkan semua berita yang telah terurut
        while ($rowCache = mysqli_fetch_array($resCache)) {
        $docId = $rowCache['DocId'];
        $sim = $rowCache['Value'];
    if ($docId != 0) {
//ambil berita dari tabel tbberita, tampilkan
$resBerita = mysqli_query($conn,"SELECT * FROM tbberita WHERE Id = $docId");
$rowBerita = mysqli_fetch_array($resBerita);
$judul = $rowBerita['Judul'];
$berita = $rowBerita['Berita'];
print($docId . ". (" . $sim .
") <font color=blue><b>"
. $judul . "</b></font><br />");
print($berita . "<hr />");
} else {
print("<b>Tidak ada... </b><hr />");
}
}//end while (rowCache = mysql_fetch_array($resCache))
}//end if $num_rows>0
else {
hitungsim($keyword);
//pasti telah ada dalam tbcache
$resCache = mysqli_query($conn,"SELECT * FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
$num_rows = mysqli_num_rows($resCache);
while ($rowCache = mysqli_fetch_array($resCache)) {
$docId = $rowCache['DocId'];
$sim = $rowCache['Value'];
if ($docId != 0) {
//ambil berita dari tabel tbberita, tampilkan
$resBerita = mysqli_query($conn,"SELECT * FROM tbberita WHERE Id = $docId");
$rowBerita = mysqli_fetch_array($resBerita);
$judul = $rowBerita['Judul'];
$berita = $rowBerita['Berita'];
print($docId . ". (" . $sim .") <font color=blue><b>"
. $judul . "</b></font><br />");
print($berita . "<hr />");
} else {

print("<b>Tidak ada... </b><hr />");
}
} //end while
}
    } //end function ambilcache 
?>