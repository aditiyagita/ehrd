<?php 

class Peserta extends Eloquent {

	protected $primaryKey = 'idpeserta';
	protected $table = 'peserta';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function pelatihan(){
		return $this->belongsTo('Pelatihan', 'idpelatihan');
	}

	public function karyawan(){
		return $this->belongsTo('Karyawan', 'nokaryawan');
	}

	public function getDataPeserta($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getIkut($value)
	{
		return self::where('nokaryawan', $value)->get();
	}

	public function simpan($input){
		$this->nokaryawan = $input['nokaryawan'];
		$this->idpelatihan = $input['idpelatihan'];
		$this->tanggaldaftar = self::getDateFormat();
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($input){
            $idagama = $input['idagama'];
            self::find($idagama)->update($input);
    }
}