<?php 


class Tanggal {

    public static function write($th = 1990) {
    	$tanggal['bulan'] = array(
                    array( 'no' => '01', 'bln' => 'Januari'),
                    array( 'no' => '02', 'bln' => 'Febuari'),
                    array( 'no' => '03', 'bln' => 'Maret'),
                    array( 'no' => '04', 'bln' => 'April'),
                    array( 'no' => '05', 'bln' => 'Mei'),
                    array( 'no' => '06', 'bln' => 'Juni'),
                    array( 'no' => '07', 'bln' => 'Juli'),
                    array( 'no' => '08', 'bln' => 'Agustus'),
                    array( 'no' => '09', 'bln' => 'September'),
                    array( 'no' => '10', 'bln' => 'Oktober'),
                    array( 'no' => '11', 'bln' => 'November'),
                    array( 'no' => '12', 'bln' => 'Desember'),
                );
        $i=0;
        
        while ($th<=((date('Y'))-5)) {
            $tanggal['tahun'][$i] = $th;
            $th++;
            $i++;            
        }

        $hr = 0;
        for($hari=1; $hari<=31; $hari++){
            $tanggal['hari'][$hr] = $hari;
            $hr++;
        }

    	return $tanggal;
    }

    public static function tahunajar(){
        $awal = 2005;
        $i = 0;
        while($awal<((date('Y'))+2)){
            $ss = $awal+1;
            $tahunajar[$i] = $awal.'/'.$ss;
        $awal++;
        $i++;
        }
        return $tahunajar;
    }

    

}