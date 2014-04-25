<?php 

class Agama extends Eloquent {

	protected $primaryKey = 'idagama';
	protected $table = 'agama';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	// public function program(){
	// 	return $this->belongsTo('Admin\Program', 'id_prog');
	// }

	// public function kelasajar()
	// {
	//     return $this->has_many('Admin\KelasAjar', 'id_kelas');
	// }

	public function getDataAgama($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		$this->agama = $input['agama'];
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