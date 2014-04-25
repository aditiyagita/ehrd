<?php 

class PengunduranDiri extends Eloquent {

	protected $primaryKey = 'idpengundurandiri';
	protected $table = 'pengundurandiri';
	protected $guarded = array();
	protected $fillable = array('status');

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function karyawan(){
		return $this->belongsTo('Karyawan', 'nokaryawan');
	}

	public function kepadapimpinan(){
		return $this->belongsTo('Karyawan', 'nokaryawan');
	}

	public function getDataPengunduranDiri($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function cetakLaporan($value)
	{
		return self::whereBetween('tanggalsurat', array($value['tanggaldari'], $value['tanggalsampai']))->get();
	}

	public function getListPengunduranDiri($value)
	{
		return self::where('nokaryawan', $value)->first();
	}

	public function simpan($input){
		$this->nokaryawan = $input['nokaryawan'];
		$this->kepada = $input['kepada'];
		$this->tanggalsurat = date('Y-m-d', strtotime($input['tanggalsurat']));
		$this->isi = $input['ck'];
		$this->status = 1;
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function approve($value)
    {
    	self::find($value['idpengundurandiri'])->update($value);
    }
}