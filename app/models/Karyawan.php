<?php 

class Karyawan extends Eloquent {

	protected $primaryKey = 'nokaryawan';
	protected $table = 'karyawan';
	protected $guarded = array();
	protected $fillable  =array('iduser','iddepartment','norekening','namabank','gaji','tunjanganjabatan', 'tunjangan_harian');

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function user(){
		return $this->belongsTo('User', 'iduser');
	}

	public function department(){
		return $this->belongsTo('Department', 'iddepartment');
	}

	public function cuti()
	{
	    return $this->hasMany('Cuti', 'nokaryawan');
	}

	public function absensi()
	{
	    return $this->hasMany('Absensi', 'nokaryawan');
	}

	public function laporanabsensi()
	{
	    return $this->hasMany('LaporanAbsensi', 'nokaryawan');
	}

	public function penggantiCuti()
	{
		return $this->hasMany('Cuti', 'pengganti');
	}

	public function kepadapimpinan()
	{
		return $this->hasMany('PengunduranDiri', 'kepada');
	}

	public function peserta()
	{
	    return $this->hasMany('Peserta', 'nokaryawan');
	}

	public function pengundurandiri()
	{
	    return $this->hasOne('PengunduranDiri', 'nokaryawan');
	}

	public function getDataKaryawan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getLastNoKaryawan()
	{
		return self::select('nokaryawan')->max('nokaryawan');
	}

	public function simpan($input){
		$this->iduser 			= $input['iduser'];
		$this->iddepartment 	= $input['department'];
		$this->nokaryawan	 	= $input['nokaryawan'];
		$this->norekening 		= $input['norekening'];
		$this->namabank			= $input['namabank'];
		$this->gaji 			= $input['gaji'];
		$this->tunjanganjabatan = $input['tunjanganjabatan'];
		$this->tunjangan_harian = $input['tunjanganharian'];
		$this->status 			= 0;
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($input){
            self::find($input['nokaryawan'])->update($input);
    }
}