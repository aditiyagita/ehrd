<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, SettingCuti; 

class SettingCutiController extends BaseController {

	public function __construct(){
		$this->menu 		= array(
				    			array('menu' => '',
				                      'link' => ''
				                      ),
				    		);
    	$this->tanda 		= $this->tanda = array('');
	    $this->title 		= 'HR GA JC & K - Setting Cuti';
	    $this->settingcuti 	= new SettingCuti();
	}

	public function index(){
    	$data['menu'] 		 = $this->menu;
    	$data['tanda'] 		 = $this->tanda;
    	$data['title']		 = $this->title;
    	$data['settingcuti'] = $this->settingcuti->getDataSettingCuti();
	    return View::make('hrdstaff.settingcuti.index')
	                  		->with('data', $data);
	}

	public function store()
	{
		$input = Input::all();
		$i=0;
		foreach ($input['settingid'] as $in) {
			$var['idsettingcuti'] 	= $input['settingid'][$i];
			$var['jumlahhari'] 		= $input['settingvalue'][$i];
			$this->settingcuti->apdet($var);
			$i++;
		}
		return Redirect::back()->withErrors('Update Data Berhasil');
	}


}