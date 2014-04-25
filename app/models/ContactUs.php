<?php 

class ContactUs extends Eloquent {

	protected $primaryKey = 'idhalaman';
	protected $table = 'halaman';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	// public function department(){
	// 	return $this->belongsTo('Department', 'department_iddepartment');
	// }

	public function getDataContactUs($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	// public function simpan($input){
	// 	$this->tanggal_akhir = date('Y-m-d', strtotime($input['tanggalakhir']));
	// 	$this->tanggal_post = self::getDateFormat();
	// 	$this->judul = $input['judul'];
	// 	$this->uraian = $input['ck'];
	// 	$this->department_iddepartment = $input['department'];
	// 	$this->save();
	// }

	// public function hapus($id){
 //        self::find($id)->delete();
 //    }

 //    public function apdet($input){
 //            $idjobvacancy = $input['idjobvacancy'];
 //            $updet['idjobvacancy'] = $input['idjobvacancy'];
 //            $updet['tanggal_akhir'] = date('Y-m-d', strtotime($input['tanggalakhir']));
 //            $updet['judul'] = $input['judul'];
 //            $updet['uraian'] = $input['ck'];
 //            self::find($idjobvacancy)->update($updet);
 //    }
}