<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Agama, Lamaran, JobVacancy, Keluarga, User, Department, Karyawan; // Tanggal;

class LamaranController extends BaseController {

	public function __construct(){
		$this->menu 		= array(
					    			array('menu' => '',
					                      'link' => ''
					                      ),
					    		);
    	$this->tanda 		= $this->tanda = array('');
	    $this->title 		= 'HR GA JC & K - Lamaran';
	    $this->lamaran 		= new Lamaran();
	    $this->jobvacancy 	= new JobVacancy();
	    $this->keluarga 	= new Keluarga();
	    $this->user 		= new User();
	    $this->department 	= new Department();
	    $this->karyawan 	= new Karyawan();
	}

	public function index(){
    	$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['jobvacancy'] = $this->jobvacancy->getDataJobVacancy();
    	return View::make('hrdstaff.lamaran.index')
                  ->with('data', $data);
	}

	public function edit($id)
	{
		$data['lamaran'] 	= $this->lamaran->getDataLamaran($id);
		$data['nokaryawan'] =  ($this->karyawan->getLastNoKaryawan())+1;
		$data['department'] = $this->department->getDataDepartment();
        return View::make('hrdstaff.lamaran.edit')
                    ->with('data', $data);
	}

	public function listLamaran($value)
	{
		$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['jobvacancy'] = $this->jobvacancy->getDataJobVacancy($value);
    	return View::make('hrdstaff.lamaran.listlamaran')
                  ->with('data', $data);
	}

	public function terimaLamaran()
	{
		$input 					= Input::all();
		$cariid 				= $this->lamaran->getDataLamaran($input['idlamaran']);
		$terima['iduser'] 		= $cariid->iduser;
		$terima['idjabatan'] 	= 6;
		$ter 					= $this->user->apdet($terima);
		$inputlam['idlamaran'] 	= $input['idlamaran'];
		$inputlam['status'] 	= 1;
		$apdet 					= $this->lamaran->apdet($inputlam);
		$inputkar 				= Input::all();
		$inputkar['iduser'] 	= $terima['iduser'];
		$karyawan 				= $this->karyawan->simpan($inputkar);
		return Redirect::back()->withErrors('Update Profil Berhasil');	
	}
	public function tolakLamaran($value)
	{
		$input['idlamaran'] 	= $value;
		$input['status'] 		= 0;
		$apdet 					= $this->lamaran->apdet($input);
		return Redirect::back();
	}

	public function detailLamaran($value)
	{
		$data['menu'] 			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$data['title'] 			= $this->title;
    	$data['agama'] 			= array('Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha');
    	$data['lamaran'] 		= $this->lamaran->getDataLamaran($value);
    	$data['keluarga'] 		= $this->keluarga->getDataKeluarga($data['lamaran']->user->iduser);
    	return View::make('hrdstaff.lamaran.detailpelamar')
                 ->with('data', $data);
	}

}