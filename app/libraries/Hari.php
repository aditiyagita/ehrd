<?php
/**
* 
*/
class Hari
{
    

    function selisihHari($tglAwal, $tglAkhir)
{
    // list tanggal merah selain hari minggu
    $tglLibur = Array("2013-01-04", "2013-01-05", "2013-01-17");

    // memecah string tanggal awal untuk mendapatkan
    // tanggal, bulan, tahun
    $pecah1 = explode("-", $tglAwal);
    $date1 = $pecah1[2];
    $month1 = $pecah1[1];
    $year1 = $pecah1[0];

    // memecah string tanggal akhir untuk mendapatkan
    // tanggal, bulan, tahun
    $pecah2 = explode("-", $tglAkhir);
    $date2 = $pecah2[2];
    $month2 = $pecah2[1];
    $year2 =  $pecah2[0];

    // mencari total selisih hari dari tanggal awal dan akhir
    $jd1 = GregorianToJD($month1, $date1, $year1);
    $jd2 = GregorianToJD($month2, $date2, $year2);

    $selisih = $jd2 - $jd1;

    // proses menghitung tanggal merah dan hari minggu
    // di antara tanggal awal dan akhir
    $libur1 = 0;
    $libur2 = 0;
    for($i=1; $i<=$selisih; $i++)
    {
        // menentukan tanggal pada hari ke-i dari tanggal awal
        $tanggal = mktime(0, 0, 0, $month1, $date1+$i, $year1);
        $tglstr = date("Y-m-d", $tanggal);

        // menghitung jumlah tanggal pada hari ke-i
        // yang masuk dalam daftar tanggal merah selain minggu
        if (in_array($tglstr, $tglLibur))
        {
           $libur1++;
        }

        // menghitung jumlah tanggal pada hari ke-i
        // yang merupakan hari minggu
        if ((date("N", $tanggal) == 7))
        {
           $libur2++;
        }
    }

    // menghitung selisih hari yang bukan tanggal merah dan hari minggu
    return $selisih-$libur1-$libur2;
}

}

?>