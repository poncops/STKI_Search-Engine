<!DOCTYPE html>
<html lang="en">
<head>
<title>:: STKI - Indexing & Retrieval ::</title>
</head>
<body>
<h1 align=center>STKI - Proses Indexing & Retrieval</h1>
<hr>
<div align=center>
| <a href="index.php">Beranda</a> |
<a href="index.php?act=corpus">Tampilkan Corpus</a> |
<a href="index.php?act=indexing">Buat Index</a> |
<a href="index.php?act=bobot">Hitung Bobot</a> |
<a href="index.php?act=panjangvektor">Hitung Panjang Vektor</a> |
<a href="index.php?act=showindex">Tampilkan Index</a> |
<a href="index.php?act=showvektor">Tampilkan Panjang Vektor</a> |
<a href="index.php?act=retrieve">Retrieval</a> |
<a href="index.php?act=cache">Tampilkan Cache</a> |
</div>
<hr />
<?php
include "koneksi.php";
include "preproses.php";
include "buatindex.php";
include "hitungbobot.php";
include "panjangvektor.php";
include 'ambilcache.php';

//periksa apa yang diinginkan pengguna (variabel act)
$apa = $_GET["act"] ?? null ;
//jika "corpus"
if ($apa == "corpus") {
$sql = "SELECT * FROM tbberita ORDER BY Id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
echo $row['Id'] . ". <font color =blue>"
. $row['Judul'] . "</font><br />" . $row['Berita'];
echo "<hr />";
}
}
//jika "indexing"
else if ($apa == "indexing") {
    buatindex();
print("<hr />");
}

else if ($apa == "bobot") {
hitungbobot();
print("<hr />");
}
else if ($apa == "panjangvektor") {
panjangvektor();
print("<hr />");
}
else if ($apa == "showvektor") {
print("<table>");
print("<tr><td>Doc-ID</td><td>Panjang Vektor</td></tr>");
$sql = "SELECT * FROM tbvektor";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
print("<tr>");
print("<td>" . $row['DocId'] . "</td><td>"
. $row['Panjang'] . "</td>");
print("</tr>");
}
print("</table><hr />");
}
//jika "showindex"
else if ($apa == "showindex") {
print("<table>");
print("<tr><td>#</td><td>Term</td><td>Doc-ID</td>
<td>Count</td><td>Bobot</td></tr>");
$sql = "SELECT * FROM tbindex ORDER BY Id";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
print("<tr>");
print("<td>" . $row['Id'] . "</td><td>"
. $row['Term'] . "</td><td>" . $row['DocId'] .
"</td><td>" . $row['Count']
. "</td><td>" . $row['Bobot'] . "</td>");
print("</tr>");
}
print("</table><hr />");
}
//jika "retrieve"
else if ($apa == "retrieve") {
print('<center><form action="index.php?act=retrieve" method="post">
Kata kunci: <input type="text" name="keyword" />
<input name = "Cari!" type="submit" />
</form></center><hr />');
$keyword = !empty ($_POST['keyword']) ? $_POST['keyword'] : '';
//$keyword = $_POST["keyword"];
    if ($keyword) {
$keyword = preproses($keyword);
print('Hasil retrieval untuk <font color=blue><b>' .
$_POST['keyword'] . '</b></font> (<font color=blue><b>'
. $keyword . '</b></font>) adalah <hr />');
ambilcache($keyword);
}
} //end retrieve

//jika "cache"
else if ($apa == "cache") {
print("<table>");
print("<tr><td>#</td><td>Query</td><td>Doc-ID</td>
<td>Value</td></tr>");
$sql = "SELECT * FROM tbcache ORDER BY Query ASC";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
    print("<tr>");
    print("<td>" . $row['Id'] . "</td><td>"
    . $row['Query'] . "</td><td>" . $row['DocId'] .
    "</td><td>" . $row['Value'] . "</td>");
    print("</tr>");
}
print("</table><hr />");
}
//jika beranda atau tidak memilih apapun
else {
print("<p align=center>Pilih salah satu link di atas!</p><hr />");
}
?>
<h5 align=center>Dibuat oleh Ponco dan IQBAL, bagian dari matakuliah STkI, Teknik
Informatika</h5>
</body>