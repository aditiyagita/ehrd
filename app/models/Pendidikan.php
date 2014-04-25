<?php 

class Pendidikan extends Eloquent {

	protected $primaryKey = 'idpendidikan';
	protected $table = 'pendidikan';
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

	public function getDataPendidikan($id){
		return self::where('iduser', $id)->get();
	}

	public function simpan($input){
		$this->iduser = $input['iduser'];
		$this->jenjang = $input['jenjang'];
		$this->namasekolah = $input['nama_sekolah'];
		$this->masapendidikan = $input['tahun'];
		$this->ijazah = $input['ijazah'];
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($input){
            $idagama = $input['pendid'];
            self::find($idagama)->update($input);
    }
}