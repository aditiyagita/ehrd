<?php 

class Jawaban extends Eloquent {

	protected $primaryKey = 'idjawaban';
	protected $table = 'jawaban';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

    public function pertanyaan(){
		return $this->belongsTo('Pertanyaan', 'idpertanyaan');
	}

	public function user()
	{
	    return $this->belongsTo('User', 'iduser');
	}

	public function getDataPertanyaan($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function simpan($input){
		$this->insert($input);
	}

	public function listJawaban($value)
	{
		return self::where('iduser', $value)->get();
	}
}