<?php 

class Pelatihan extends Eloquent {

	protected $primaryKey = 'idpelatihan';
	protected $table = 'pelatihan';
	protected $guarded = array();
	protected $fillable = array('tanggalmulai', 'tanggalselesai', 'judul', 'uraian', 'biaya', 'dp', 'pelunasan', 'kuota', 'status', 'tempat');

	public $timestamps = false;	

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function peserta()
	{
	    return $this->hasMany('Peserta', 'idpeserta');
	}

	public function getDataPelatihan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getPelatihanKaryawan(){
		return self::where('status', 3)->get();
	}

	public function simpan($input){
		$this->tanggalmulai = date('Y-m-d', strtotime($input['tanggalmulai']));
		$this->tanggalselesai = date('Y-m-d', strtotime($input['tanggalselesai']));
		$this->judul = $input['judul'];
		$this->tempat = $input['lokasi'];
		$this->uraian = $input['ck'];
		$this->biaya = $input['biaya'];
		$this->dp = $input['dp'];
		$this->pelunasan = $input['pelunasan'];
		$this->kuota = $input['kuota'];
		$this->status = 1;
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($updet){
            self::find($updet['idpelatihan'])->update($updet);
    }

    public function cekPeserta($id, $nokaryawan){
    	$isi = Peserta::where('idpelatihan', $id)->where('nokaryawan', $nokaryawan)->get();
    	if (count($isi) > 0) {
    		$cek = 1;
    	}else{
    		$cek = 0;
    	}
    	return $cek;
    }

}