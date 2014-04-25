<?php namespace Pelamar;

use BaseController, View, Input, Redirect, Referensi, User, Auth, JobVacancy, Department; // Tanggal;

class ReferensiController extends BaseController {

	public function __construct(){
    	$this->menu 			= array(
						    			array('menu' => 'Home',
						                      'link' => ''
						                      ),
						    			array('menu' => 'Lowongan Kerja',
						                      'link' => 'job-vacancy'
						                      ),
						    		);
    	$this->tanda 			= $this->tanda = array('', '');
	    $this->title 			= 'JC & K Advertising - Referensi';
	    $this->referensi 		= new Referensi();
	    $this->user 			= new User();
	    $this->jobvacancy 		= new JobVacancy();
    	$this->department 		= new Department();
	}

	public function index(){
    	$data['menu'] 			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$user 					= Auth::user()->iduser;
    	$data['title'] 			= $this->title;
    	$data['referensi'] 		= $this->referensi->getDataReferensi($user);
    	$data['department'] 	= $this->department->getDataDepartment();
    	$data['jobwidget'] 		= $this->jobvacancy->getWidget();
    	return View::make('pelamar.referensi.index')
    	              ->with('data', $data);
	}

	public function store()
	{
		$input 					= Input::all();
		$input['iduser'] 		= Auth::user()->iduser;
		$this->referensi->simpan($input);
		return Redirect::back()->withErrors('Update Referensi Berhasil');	
	}
	
	public function destroy($id)
	{
		$this->referensi->hapus($id);
        return Redirect::back();
	}

}