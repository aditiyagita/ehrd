<?php 

class Department extends Eloquent {

	protected $primaryKey = 'iddepartment';
	protected $table = 'department';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

    public function jobVacancy(){
		return $this->hasMany('JobVacancy', 'iddepartment');
	}

	public function karyawan(){
		return $this->hasMany('Karyawan', 'iddepartment');
	}

	public function getDataDepartment($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		$this->department = $input['department'];
		$this->save();
	}

	public function hapus($id){
        self::find($id)->delete();
    }

    public function apdet($input){
            $iddepartment = $input['iddepartment'];
            self::find($iddepartment)->update($input);
    }
}