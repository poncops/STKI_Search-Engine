<?php
function hitungbobot() {
    //berapa jumlah DocId total?, n
include 'koneksi.php';
$resn = mysqli_query($conn,"SELECT DISTINCT DocId FROM tbindex");
$n = mysqli_num_rows($resn);
//ambil setiap record dalam tabel tbindex
//hitung bobot untuk setiap Term dalam setiap DocId
$resBobot = mysqli_query($conn,"SELECT * FROM tbindex ORDER BY Id");
$num_rows = mysqli_num_rows($resBobot);
print("Terdapat " . $num_rows .
" Term yang diberikan bobot. <br />");
while($rowbobot = mysqli_fetch_array($resBobot)) {
//$w = tf * log (n/N)
$term = $rowbobot['Term'];
$tf = $rowbobot['Count'];
$id = $rowbobot['Id'];
//berapa jumlah dokumen yang mengandung term itu?, N
$resNTerm = mysqli_query($conn,"SELECT Count(*) as N
FROM tbindex WHERE Term = '$term'");
$rowNTerm = mysqli_fetch_array($resNTerm);
$NTerm = $rowNTerm['N'];
$w = $tf * log($n/$NTerm);
//update bobot dari term tersebut
$resUpdateBobot = mysqli_query($conn,"UPDATE tbindex
SET Bobot = $w WHERE Id = $id");
} //end while $rowbobot
} //end function hitungbobot
?>