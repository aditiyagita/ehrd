<?php 

class Absensi extends Eloquent {

	protected $primaryKey = 'idlistabsensi';
	protected $table = 'vw_listabsensi';
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

	public function getDataAbsensi($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}
}