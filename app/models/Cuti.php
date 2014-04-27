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
            //return self::all();
            return self::whereRaw('status != ? OR (status = ? AND tanggalmulai > ?)', array(0, 0, self::getDateFormat()))->get();
        }
	}

	public function getListCuti($value)
	{
		return self::select(DB::raw('cuti.idcuti, cuti.nokaryawan, cuti.tanggalmulai, cuti.tanggalselesai, cuti.range, cuti.alasan, cuti.suratdokter, cuti.status, users.nama_lengkap'))
				->join('karyawan', 'pengganti', '=', 'karyawan.nokaryawan')
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
		//return self::whereRaw('tanggalmulai => ? AND tanggalmulai =< ?', array($value['tanggaldari'], $value['tanggalsampai']));
		return self::select('*')->whereBetween('tanggalmulai', array($value['tanggaldari'], $value['tanggalsampai']))->where('status', 2)->get();
		//return self::all();
	}

	public function simpan($input){
		$this->nokaryawan = $input['nokaryawan'];
		$this->tanggalmulai = date('Y-m-d', strtotime($input['tanggalmulai']));
		$this->tanggalselesai = date('Y-m-d', strtotime($input['tanggalselesai']));
		$this->alasan = $input['alasan'];
		$this->suratdokter = $input['suratdokter'];
		$this->pengganti = $input['pengganti'];
		$this->status = 0;
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

    public function getNotif()
	{
		return self::where('status', 0)->where('tanggalmulai', '>', self::getDateFormat())->get();
	}

	public function getNotifKaryawan($value)
	{ 
		return self::whereRaw('status IN (?,?) AND nokaryawan = ?', array(2,4,$value))->where('tanggalmulai', '>', self::getDateFormat())->get();
	}

	public function updateNotifKaryawan($value)
	{
		$user =  DB::table('cuti')
					->whereRaw('nokaryawan =  ? AND status IN (?,?)', array($value,2,4))
					->update(array('status' => 3));

	}
}