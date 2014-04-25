<?php 

class Keluarga extends Eloquent {

	protected $primaryKey = 'idkeluarga';
	protected $table = 'keluarga';
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
	public function anak(){
		return $this->hasMany('Anak', 'idkeluarga');
	}

	public function getDataKeluarga($id){
		return self::where('iduser', $id)->first();
	}

	public function simpan($input){
		$this->suamiistri = $input['suamiistri'];
		$this->umur = $input['umur'];
		$this->pekerjaan = $input['pekerjaan'];
		$this->iduser = $input['iduser'];
		$this->save();
	}

	public function apdet($input){
            self::find($input['idkeluarga'])->update($input);
    }

	public function hapus($id){
        self::find($id)->delete();
    }


}