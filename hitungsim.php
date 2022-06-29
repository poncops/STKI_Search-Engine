<?php
function hitungsim($query) {
    //ambil jumlah total dokumen yang telah diindex
    //(tbindex atau tbvektor), n
    $resn = "SELECT Count(*) as n FROM tbvektor";
    $rown = ($resn);
    $n = $rown['n'];
    //terapkan preprocessing terhadap $query
    $aquery = explode(" ", $query);
    //hitung panjang vektor query
    $panjangQuery = 0;
    $aBobotQuery = array();
    for ($i=0; $i<count($aquery); $i++) {
    //hitung bobot untuk term ke-i pada query, log(n/N);
    //hitung jumlah dokumen yang mengandung term tersebut
    $resNTerm = "SELECT Count(*) as N FROM tbindex
     WHERE Term = '$aquery[$i]'";
    $rowNTerm = ($resNTerm);
    $NTerm = $rowNTerm['N'];
    $idf = log($n/$NTerm);
    //simpan di array
    $aBobotQuery[] = $idf;
    $panjangQuery = $panjangQuery + $idf * $idf;
    }
    $panjangQuery = sqrt($panjangQuery);
    $jumlahmirip = 0;
    //ambil setiap term dari DocId, bandingkan dengan Query
    $resDocId = "SELECT * FROM tbvektor ORDER BY DocId";
    while ($rowDocId = ($resDocId)) {
    $dotproduct = 0;
    $docId = $rowDocId['DocId'];
    $panjangDocId = $rowDocId['Panjang'];
    $resTerm = "SELECT * FROM tbindex
     WHERE DocId = $docId";
    while ($rowTerm = ($resTerm)) {
    for ($i=0; $i<count($aquery); $i++) {
    //jika term sama
    if ($rowTerm['Term'] == $aquery[$i]) {


    $dotproduct = $dotproduct +
     $rowTerm['Bobot'] * $aBobotQuery[$i];
    } //end if
    } //end for $i
    } //end while ($rowTerm)
    if ($dotproduct > 0) {
    $sim = $dotproduct / ($panjangQuery * $panjangDocId);
    //simpan kemiripan > 0 ke dalam tbcache
    $resInsertCache = "INSERT INTO tbcache
    (Query, DocId, Value) VALUES ('$query', $docId, $sim)";
    $jumlahmirip++;
    }
    } //end while $rowDocId
    if ($jumlahmirip == 0) {
    $resInsertCache = "INSERT INTO tbcache
    (Query, DocId, Value) VALUES ('$query', 0, 0)";
    }
    } //end hitungSim()
?>