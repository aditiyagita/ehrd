<?php 

class Cuti extends Eloquent {

	protected $primaryKey = 'idcuti';
	protected $table = 'cuti';
	protected $guarded = array();
	protected $fillable  = array('status');

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function karyawan(){
		return $this->belongsTo('Karyawan', 'nokaryawan');
	}

	public function penggantiCuti()
	{
		return $this->belongsTo('Karyawan', 'nokaryawan');
	}

	public function getDataCuti($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getListCuti($value)
	{
		return self::join('karyawan', 'pengganti', '=', 'karyawan.nokaryawan')
				->join('users', 'users.iduser', '=', 'karyawan.iduser')
				->where('cuti.nokaryawan', $value)->get();
	}

	public function getTotal($value)
	{
		return DB::table('cuti')
				->whereRaw('nokaryawan = ? AND status = ? AND alasan = ? or alasan = ?', array($value, 2, 1, 3))
				->groupBy('nokaryawan')
				->sum('range');
	}

	public function cetakLaporan($value)
	{
		return self::whereBetween('tanggalmulai', array($value['tanggaldari'], $value['tanggalsampai']))->get();
	}

	public function simpan($input){
		$this->nokaryawan = $input['nokaryawan'];
		$this->tanggalmulai = date('Y-m-d', strtotime($input['tanggalmulai']));
		$this->tanggalselesai = date('Y-m-d', strtotime($input['tanggalselesai']));
		$this->alasan = $input['alasan'];
		$this->suratdokter = $input['suratdokter'];
		$this->pengganti = $input['pengganti'];
		$this->status = 1;
		$this->range = $input['range'];
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function approveCuti($value)
    {
    	self::find($value['idcuti'])->update($value);
    }
}