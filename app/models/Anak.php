<?php 

class Anak extends Eloquent {

	protected $primaryKey = 'idanak';
	protected $table = 'anak';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function keluarga(){
		return $this->belongsTo('Keluarga', 'idkeluarga');
	}

	public function getDataAnak($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		// $this->idkeluarga = $input['idkeluarga'];
		// $this->nama = $input['nama'];
		// $this->umur = $input['umur'];
		// $this->save();
		$this->insert($input);
	}

	public function hapus($id){
        self::find($id)->delete();
    }

}