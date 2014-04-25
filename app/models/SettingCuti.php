<?php 

class SettingCuti extends Eloquent {

	protected $primaryKey = 'idsettingcuti';
	protected $table = 'settingcuti';
	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array();

	protected function getDateFormat()
    {
        return date('Y-m-d');
    }

	public function getDataSettingCuti($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function getTotalCuti()
	{
		return self::where('idsettingcuti', 1)->first();
	}

    public function apdet($input){
            self::find($input['idsettingcuti'])->update($input);
    }
}