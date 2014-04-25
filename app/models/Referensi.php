<?php 

class Referensi extends Eloquent {

	protected $primaryKey = 'idreferensi';
	protected $table = 'referensi';
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

	public function getDataReferensi($id){
		return self::where('iduser', $id)->get();
	}

	public function simpan($input){
		$this->nama = $input['nama'];
		$this->jabatan = $input['jabatan'];
		$this->hubungan = $input['hubungan'];
		$this->iduser = Auth::user()->iduser;
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }


}