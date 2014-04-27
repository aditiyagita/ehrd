<?php namespace Hrdmanager;

use BaseController, View, Input, Redirect, Cuti, user, Karyawan, Auth, Absensi; // Tanggal;

class AbsensiController extends BaseController {

	public function __construct(){
		$this->menu = array(
          array('menu' => '',
                      'link' => ''
                      )
        );
      	$this->tanda = array('');
	    $this->title = 'HRD Manager JC & K - Absensi';
	    $this->absensi = new Absensi();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['absensi'] = $this->absensi->getDataAbsensi();
    	return View::make('hrdmanager.absensi.index')
                  ->with('data', $data);
	}

	public function show($id)
	{
        $data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['cuti']		= $this->cuti->getDataCuti($id);
    	$data['listcuti']	= $this->cuti->getListCuti($data['cuti']->idkaryawan);
    	$data['totalcuti']	= $this->cuti->getTotal($data['cuti']->idkaryawan);
    	$data['settingcuti']= $this->settingcuti->getTotalCuti();
    	return View::make('hrdstaff.cuti.show')
                  ->with('data', $data);

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