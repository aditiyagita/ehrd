<?php 

class Pelatihan extends Eloquent {

	protected $primaryKey = 'idpelatihan';
	protected $table = 'pelatihan';
	protected $guarded = array();
	protected $fillable = array('tanggalmulai', 'tanggalselesai', 'judul', 'uraian', 'biaya', 'dp', 'pelunasan', 'kuota', 'status', 'tempat', 'norekening', 'atasnama', 'namabank');

	public $timestamps = false;	

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function detailpelatihan()
	{
	    return $this->hasMany('DetailPelatihan', 'idpelatihan');
	}

	public function getDataPelatihan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::whereRaw('status != ? OR (status = ? AND tanggalmulai > ?)', array(1, 1, self::getDateFormat()))->get();
        }
	}

	public function getPelatihanKaryawan(){
		return self::where('status', 3)->paginate(5);
	}

	public function getNotif()
	{
		if(Auth::user()->idjabatan == 5){
			return self::where('status', 2)->where('tanggalmulai', '>', self::getDateFormat())->get();
		}elseif(Auth::user()->idjabatan == 6){	
			return self::whereRaw('status IN (?)', array(3))->where('tanggalmulai', '>', self::getDateFormat())->get();
		}elseif(Auth::user()->idjabatan == 2){
			return self::whereRaw('status = ? AND tanggalmulai > ?', array(1, self::getDateFormat()))->get();	
		}else{
			return self::where('status', 1)->where('tanggalmulai', '>', self::getDateFormat())->get();	
		}
		
	}

	public function simpan($input){
		$this->tanggalmulai = date('Y-m-d', strtotime($input['tanggalmulai']));
		$this->tanggalselesai = date('Y-m-d', strtotime($input['tanggalselesai']));
		$this->judul = $input['judul'];
		$this->tempat = $input['lokasi'];
		$this->uraian = $input['ck'];
		$this->biaya = $input['biaya'];
		$this->norekening = $input['norekening'];
		$this->atasnama = $input['atasnama'];
		$this->namabank = $input['namabank'];
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
    	$isi = DetailPelatihan::where('idpelatihan', $id)->where('nokaryawan', $nokaryawan)->get();
    	if (count($isi) > 0) {
    		$cek = 1;
    	}else{
    		$cek = 0;
    	}
    	return $cek;
    }

    public function updateNotifKaryawan($value)
	{
		$user =  DB::table('pelatihan')
					->where('status', 3)
					->update(array('status' => 5));

	}

}