<?php 

class Pertanyaan extends Eloquent {

	protected $primaryKey = 'idpertanyaan';
	protected $table = 'pertanyaan';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }
    
	public function jawaban()
	{
	    return $this->hasMany('Jawaban', 'idpertanyaan');
	}

	public function getDataPertanyaan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}
}