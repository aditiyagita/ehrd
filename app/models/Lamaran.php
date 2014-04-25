<?php 

class Lamaran extends Eloquent {

	protected $primaryKey = 'idlamaran';
	protected $table = 'lamaran';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function lowongan(){
		return $this->belongsTo('JobVacancy', 'idlowongan');
	}

	public function user(){
		return $this->belongsTo('User', 'iduser');
	}

	// public function kelasajar()
	// {
	//     return $this->has_many('Admin\KelasAjar', 'id_kelas');
	// }

	public function getDataLamaran($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getListLamaran($id){
		$isi = self::where('iduser', $id)->get();
		return $isi;
	}

	public function getListTerima($id){
		$isi = self::where('iduser', $id)->where('status', 1)->get();
		return count($isi);
	}

	public function simpan($input){
		$this->iduser = Auth::user()->iduser;
		$this->gaji = $input['gaji'];
		$this->idlowongan = $input['id'];
		$this->mulaikerja = $input['tahun'].'-'.$input['bulan'].'-'.$input['tanggal'];
		$this->alasan = $input['alasan'];
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($input){
            self::find($input['idlamaran'])->update($input);
    }

    public function cekLamaran($id){
    	$iduser = Auth::user()->iduser;
    	$isi = self::where('idlowongan', $id)->where('iduser', $iduser)->get();
    	if (count($isi) > 0) {
    		$cek = 1;
    	}else{
    		$cek = 0;
    	}
    	return $cek;
    }

}