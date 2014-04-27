<?php namespace Hrdmanager;

use BaseController, View, Input, Redirect, Cuti, user, Karyawan, Auth, SettingCuti, Session; // Tanggal;

class CutiController extends BaseController {

	public function __construct(){
		$this->menu = array(
          array('menu' => '',
                      'link' => ''
                      )
        );
      	$this->tanda = array('');
	    $this->title = 'HRD Manager JC & K - Cuti';
	    $this->cuti = new Cuti();
	    $this->kary = new Karyawan();
	    $this->user = new user();
	    $this->settingcuti 	= new SettingCuti();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['cuti'] = $this->cuti->getDataCuti();
    	return View::make('hrdmanager.cuti.index')
                  ->with('data', $data);
	}

	public function show($id)
	{
        $data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['cuti']		= $this->cuti->getDataCuti($id);
    	$data['listcuti']	= $this->cuti->getListCuti($data['cuti']->nokaryawan);
    	$data['totalcuti']	= $this->cuti->getTotal($data['cuti']->nokaryawan);
    	$data['settingcuti']= $this->settingcuti->getTotalCuti();
    	return View::make('hrdmanager.cuti.show')
                  ->with('data', $data);

	}

	public function approveCuti($value)
	{
		$input['idcuti'] = $value;
		$input['status'] = 2;
		$this->cuti->approveCuti($input);
		Session::flash('success', 'Not Approve Pengunduran Diri Berhasil');
		return Redirect::back();
	}
	public function unapproveCuti($value)
	{
		$input['idcuti'] = $value;
		$input['status'] = 1;
		$this->cuti->approveCuti($input);
		Session::flash('success', 'Not Approve Pengunduran Diri Berhasil');
		return Redirect::back();
	}

}