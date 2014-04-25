<?php 

class JobVacancy extends Eloquent {

	protected $primaryKey = 'idlowongan';
	protected $table = 'lowongan';
	protected $guarded = array();
	protected $fillable = array('posisi', 'uraian', 'iddepartment', 'judul', 'foto', 'tanggalakhir', 'tanggalpost');

	public $timestamps = false;

	public static $rules = array(
        'imagefile' => 'image|max:3000|mimes:jpg,jpeg,png'
    );

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function department(){
		return $this->belongsTo('Department', 'iddepartment');
	}

	public function lamaran()
	{
	    return $this->hasMany('Lamaran', 'idlowongan');
	}

	public function getDataJobVacancy($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}


	public function getWidget(){
		$tgl = self::getDateFormat();
		return self::where('tanggalakhir', '>=', $tgl)->limit(5)->orderBy('tanggalpost', 'desc')->get();
	}

	public function simpan($input){
		$this->tanggalakhir = date('Y-m-d', strtotime($input['tanggalakhir']));
		$this->tanggalpost = self::getDateFormat();
		$this->judul = $input['judul'];
		$this->uraian = $input['ck'];
		$this->posisi = $input['posisi'];
		$this->iddepartment = $input['department'];
		$this->foto = $input['foto'];
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($updet){
            self::find($updet['idlowongan'])->update($updet);
    }
}