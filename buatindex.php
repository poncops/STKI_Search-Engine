<?php
function buatindex() {
    include 'koneksi.php';
    //hapus index sebelumnya
mysqli_query($conn,"TRUNCATE TABLE tbindex");
//ambil semua berita (teks)
$resBerita = mysqli_query($conn,"SELECT * FROM tbberita ORDER BY Id");
$num_rows = mysqli_num_rows($resBerita);
print("Mengindeks sebanyak " . $num_rows . " berita. <br />");
while($row = mysqli_fetch_array($resBerita)) {
$docId = $row['Id'];
$berita = $row['Berita'];
//terapkan preprocessing
$berita = preproses($berita);
//simpan ke inverted index (tbindex)
$aberita = explode(" ", trim($berita));
foreach ($aberita as $j => $value) {
//hanya jika Term tidak null, tidak kosong
if ($aberita[$j] != "") {
//berapa baris hasil yang dikembalikan
//query tersebut?
$rescount = mysqli_query($conn,"SELECT Count FROM tbindex
WHERE Term = '$aberita[$j]' AND DocId = $docId");
$num_rows = mysqli_num_rows($rescount);
//jika sudah ada DocId dan Term tersebut ,
//naikkan Count (+1)
if ($num_rows > 0) {
$rowcount = mysqli_fetch_array($rescount);
$count = $rowcount['Count'];
$count++;
mysqli_query($conn,"UPDATE tbindex SET Count = $count
WHERE Term = '$aberita[$j]'
AND DocId = $docId");
}
//jika belum ada, langsung simpan ke tbindex
else {
mysqli_query($conn,"INSERT INTO tbindex (Term, DocId,
Count) VALUES ('$aberita[$j]',
$docId, 1)");
}
} //end if
} //end foreach
} //end while
} //end function buatindex()

?>