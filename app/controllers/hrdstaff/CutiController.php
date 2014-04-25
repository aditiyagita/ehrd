<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Cuti, user, Karyawan, Auth, SettingCuti; // Tanggal;

class CutiController extends BaseController {

	public function __construct(){
		$this->menu 		= array(
					          array('menu' => '',
					                      'link' => ''
					                      )
					        );
      	$this->tanda 		= array('');
	    $this->title 		= 'HR GA JC & K - Cuti';
	    $this->cuti 		= new Cuti();
	    $this->kary 		= new Karyawan();
	    $this->user 		= new user();
	    $this->settingcuti 	= new SettingCuti();
	}

	public function index(){
    	$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['cuti'] 		= $this->cuti->getDataCuti();
    	return View::make('hrdstaff.cuti.index')
                  ->with('data', $data);
	}

	public function create()
	{
		$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['karyawan'] 	= $this->kary->getDataKaryawan();
    	return View::make('karyawan.cuti.create')
                  ->with('data', $data);
	}

	public function store()
	{
		$input 					= Input::all();
		$user 					= $this->user->getDataUser(Auth::user()->iduser);
		$input['idkaryawan'] 	= $user->karyawan->idkaryawan;
		$this->cuti->simpan($input);
		return Redirect::to('karyawan/cuti');
	}

	public function show($id)
	{
        $data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['cuti']		= $this->cuti->getDataCuti($id);
    	$data['listcuti']	= $this->cuti->getListCuti($data['cuti']->nokaryawan);
    	$data['totalcuti']	= $this->cuti->getTotal($data['cuti']->nokaryawan);
    	$data['settingcuti']= $this->settingcuti->getDataSettingCuti(1);
    	return View::make('hrdstaff.cuti.show')
                  ->with('data', $data);

	}
	
	public function destroy($id)
	{
		$this->cuti->hapus($id);
        return Redirect::back();
	}

	public function approveCuti($value)
	{
		$input['idcuti'] = $value;
		$input['status'] = 2;
		$this->cuti->approveCuti($input);
		return Redirect::back();
	}
	public function unapproveCuti($value)
	{
		$input['idcuti'] = $value;
		$input['status'] = 1;
		$this->cuti->approveCuti($input);
		return Redirect::back();
	}

}