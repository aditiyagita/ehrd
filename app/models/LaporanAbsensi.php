<?php 

class LaporanAbsensi extends Eloquent {

	protected $primaryKey = 'idlistabsensi';
	protected $table = 'vw_laporanabsensi';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function karyawan(){
		return $this->belongsTo('Karyawan', 'nokaryawan');
	}

	// public function kelasajar()
	// {
	//     return $this->has_many('Admin\KelasAjar', 'id_kelas');
	// }

	public function getLaporanAbsensi($value){
		return self::select(DB::raw('nokaryawan, sum(hadir) as hadir, sum(terlambat) as terlambat, sum(lembur) as lembur, sum(jamlembur) as jamlembur'))
				->whereRaw('year(tanggal) = ? and month(tanggal) = ?', array($value['tahun'], $value['bulan']))
				->groupBy('nokaryawan')
				->get();
	}

}