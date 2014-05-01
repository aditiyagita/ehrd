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
    	if(Auth::user()->idjabatan == 1){
    		return DB::select("SELECT idcuti as id, 'Cuti' as type, 'Approval Cuti' as uraian FROM `cuti` where status = 2 and nokaryawan = '$noKaryawan' and idcuti not in (select refid from notifikasi where jenis = 'cuti' and nokaryawan = '$noKaryawan')
								union all
								SELECT idpelatihan as id, 'Approve Pelatihan' as type, judul as uraian FROM `pelatihan` where status = 3 and idpelatihan not in (select refid from notifikasi where jenis = 'Approve Pelatihan' and nokaryawan = '$noKaryawan')
                                                                union all
								SELECT idpelatihan as id, 'Unapprove Pelatihan' as type, judul as uraian FROM `pelatihan` where status = 4 and idpelatihan not in (select refid from notifikasi where jenis = 'Unapprove Pelatihan' and nokaryawan = '$noKaryawan')");
    	}elseif(Auth::user()->idjabatan == 2){
    		return DB::select("SELECT idcuti as id, 'Cuti' as type, 'Request Cuti' as uraian FROM `cuti` where status = 0 and idcuti not in (select refid from notifikasi where jenis = 'Cuti' and nokaryawan = '$noKaryawan')
								union all
								SELECT idpelatihan as id, 'Request Pelatihan' as type, judul as uraian FROM `pelatihan` where status = 1 and idpelatihan not in (select refid from notifikasi where jenis = 'Request Pelatihan' and nokaryawan = '$noKaryawan')
                                union all
                                SELECT idpelatihan as id, 'Konfirmasi Pelatihan' as type, judul as uraian FROM `pelatihan` where status = 3 and idpelatihan not in (select refid from notifikasi where jenis = 'Konfirmasi Pelatihan' and nokaryawan = '$noKaryawan')
                                union all
								SELECT idpengundurandiri as id, 'Request Pengunduran Diri' as type, users.nama_lengkap as uraian FROM `pengundurandiri`, karyawan, users where pengundurandiri.nokaryawan = karyawan.nokaryawan and karyawan.iduser = users.iduser and
								pengundurandiri.status = 0 and idpengundurandiri not in (select refid from notifikasi where jenis = 'Request Pengunduran Diri' and nokaryawan = '$noKaryawan')");
    	}elseif(Auth::user()->idjabatan == 5){
    		return DB::select("SELECT idpelatihan as id, 'Approve Pelatihan' as type, judul as uraian FROM `pelatihan` where status = 2 and idpelatihan not in (select refid from notifikasi where jenis = 'Approve Pelatihan' and nokaryawan = '$noKaryawan')
    							union all
								SELECT DISTINCT CONCAT(year(tanggal), '-',month(tanggal)) as id, 'Absensi' as type, 'Accept Absensi' as uraian FROM absensi where year(tanggal) not in (select distinct left(s.refid, 4) from notifikasi s where jenis='Absensi' and nokaryawan = '$noKaryawan') and month(tanggal) not in (select distinct substring(s.refid, 6,8) from notifikasi s where jenis='Absensi' and nokaryawan = '$noKaryawan') and month(tanggal)
								");
    	}else{
			return DB::select("SELECT idcuti as id, 'Cuti' as type, 'Approval Cuti' as uraian FROM `cuti` where status = 2 and nokaryawan = '$noKaryawan' and idcuti not in (select refid from notifikasi where jenis = 'cuti' and nokaryawan = '$noKaryawan')
								union all
								SELECT idpelatihan as id, 'Pelatihan' as type, judul as uraian FROM `pelatihan` where status = 3 and idpelatihan not in (select refid from notifikasi where jenis = 'pelatihan' and nokaryawan = '$noKaryawan')
								");
								
		}
    	
    }

    public function cekAddNotif($value)
    {
    	return DB::select("select * from notifikasi where nokaryawan = '".$value['nokaryawan']."' and jenis = '".$value['jenis']."' and refid = '".$value['refid']."'");
    }
}