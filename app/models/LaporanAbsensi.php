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

	public function listAcceptAbsensi($value)
	{
		$tahun = $value['tahun'];
		$bulan = $value['bulan'];
		return DB::select("
					select vw_laporanabsensi.nokaryawan, users.nama_lengkap, department.department, sum(hadir) as hadir, sum(terlambat) as terlambat, sum(lembur) as lembur, sum(jamlembur) as jamlembur 
					from vw_laporanabsensi, karyawan, users, department 
					where vw_laporanabsensi.nokaryawan = karyawan.nokaryawan
						and karyawan.iduser = users.iduser 
						and karyawan.iddepartment = department.iddepartment
						and year(tanggal) = '$tahun' and month(tanggal) = '$bulan' 
						and vw_laporanabsensi.nokaryawan not in (select a.nokaryawan from absensi a where year(a.tanggal) = '$tahun' and month(a.tanggal) = '$bulan') group by vw_laporanabsensi.nokaryawan
			");
	}

	public function acceptAbsensi($value)
	{
		DB::statement(DB::raw("
			INSERT INTO absensi (idlistabsensi, tanggal, nokaryawan, hadir, terlambat, lembur, jamlembur) 
				SELECT a.idlistabsensi, a.tanggal, a.nokaryawan, a.hadir, a.terlambat, a.lembur, a.jamlembur FROM `vw_laporanabsensi` a 
				where year(a.tanggal) = '".$value['tahun']."' and month(a.tanggal) = '".$value['bulan']."' and a.nokaryawan in (".$value['check'].")
			"));
	}

}