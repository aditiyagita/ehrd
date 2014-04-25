<?php 

class KursusPelatihan extends Eloquent {

	protected $primaryKey = 'idkursuspelatihan';
	protected $table = 'kursuspelatihan';
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

	// public function kelasajar()
	// {
	//     return $this->has_many('Admin\KelasAjar', 'id_kelas');
	// }

	public function getDataKursus($id){
		return self::where('iduser', $id)->get();
	}

	public function simpan($input){
		$this->iduser = $input['iduser'];
		$this->tahun = $input['tahun'];
		$this->lokasi = $input['lokasi'];
		$this->subjek = $input['subjek'];
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

}