<?php 

class Bahasa extends Eloquent {

	protected $primaryKey = 'idbahasa';
	protected $table = 'bahasa';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function user(){
		return $this->belongsTo('User', 'iduser');
	}

	public function getDataBahasa($id){
		return self::where('iduser', $id)->get();
	}

	public function simpan($input){
		$this->bahasa = $input['bahasa'];
		$this->bicara = $input['bicara'];
		$this->menulis = $input['menulis'];
		$this->iduser = Auth::user()->iduser;
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }


}