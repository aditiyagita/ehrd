<?php 

class Notifikasi extends Eloquent {

	protected $primaryKey = 'idnotifikasi';
	protected $table = 'notifikasi';
	protected $guarded = array();
	protected $fillable = array();

	public $timestamps = false;

	public static $rules = array();

	public function getData($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		
		$this->insert($input);
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($input){
            self::find($input['id'])->update();
    }

    public function getNotifikasi()
    {
    	$iduser 			= Auth::user()->iduser;
		$user				= new User();
		$getData			= $user->getDataUser($iduser);
		$noKaryawan			= $getData->karyawan->nokaryawan;
		return DB::select("SELECT idcuti as id, 'Cuti' as type, 'Approval Cuti' as uraian FROM `cuti` where status = 2 and nokaryawan = '$noKaryawan' and idcuti not in (select refid from notifikasi where jenis = 'cuti' and nokaryawan = '$noKaryawan')
							union all
							SELECT idpelatihan as id, 'Pelatihan' as type, judul as uraian FROM `pelatihan` where status = 3 and idpelatihan not in (select refid from notifikasi where jenis = 'pelatihan' and nokaryawan = '$noKaryawan')");
    }
}