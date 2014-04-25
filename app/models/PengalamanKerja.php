<?php 

class PengalamanKerja extends Eloquent {

	protected $primaryKey = 'idpengalamankerja';
	protected $table = 'pengalamankerja';
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

	public function getDataPengalaman($id){
		return self::where('iduser', $id)->get();
	}

	public function simpan($input){
		$this->iduser = $input['iduser'];
		$this->namaperusahaan = $input['namaperusahaan'];
		$this->bidang = $input['bidang'];
		$this->jabatan = $input['jabatan'];
		$this->gaji = $input['gaji'];
		$this->tunjangan = $input['tunjangan'];
		$this->namaatasan = $input['namaatasan'];
		$this->masakerja = $input['darikerja'].' - '.$input['sampaikerja'];
		$this->alasankeluar = $input['alasankeluar'];
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