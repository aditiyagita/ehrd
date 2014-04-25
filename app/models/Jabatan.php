<?php 

class Jabatan extends Eloquent {

	protected $primaryKey = 'idjabatan';
	protected $table = 'jabatan';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	// public function program(){
	// 	return $this->belongsTo('Admin\Program', 'id_prog');
	// }

	public function user()
	{
	    return $this->hasMany('User', 'idjabatan');
	}

	public function getDataJabatan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

}