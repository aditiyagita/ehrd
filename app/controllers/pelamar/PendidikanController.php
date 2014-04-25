<?php namespace Pelamar;

use BaseController, View, Input, Redirect, Pendidikan, User, Auth, JobVacancy, Department; // Tanggal;

class PendidikanController extends BaseController {

	public function __construct(){
    	$this->menu 		= array(
					    			array('menu' => 'Home',
					                      'link' => ''
					                      ),
					    			array('menu' => 'Lowongan Kerja',
					                      'link' => 'job-vacancy'
					                      ),
					    		);
    	$this->tanda 		= $this->tanda = array('', '');
	    $this->title       	= "JC & K Advertising - Pendidikan";
	    $this->pendidikan 	= new Pendidikan();
	    $this->user 		= new User();
	    $this->jobvacancy 	= new JobVacancy();
    	$this->department 	= new Department();
	}

	public function index(){
    	$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$user 				= Auth::user()->iduser;
    	$data['title'] 		= $this->title;
    	$data['pendidikan'] = $this->pendidikan->getDataPendidikan($user);
    	$data['department'] = $this->department->getDataDepartment();
      	$data['jobwidget'] 	= $this->jobvacancy->getWidget();
    	return View::make('pelamar.pendidikan.index')
                    ->with('data', $data);
	}

	public function create()
	{
		return View::make('admin.kelas.create');
	}

	public function store()
	{
		$input 				= Input::all();
		$input['iduser'] 	= Auth::user()->iduser;
		$this->pendidikan->simpan($input);
		return Redirect::back()->withErrors('Input Pendidikan Berhasil');
	}

	public function show($id)
	{
        $data['menu'] 		= $this->menu;
        $data['tanda'] 		= $this->tanda;
        $data['title'] 		= $this->title;
        $data['department'] = $this->department->getDataDepartment();
   		$data['jobwidget'] 	= $this->jobvacancy->getWidget();
        return View::make('hrdstaff.agama.show')
                     ->with('data', $data);
	}

	public function destroy($id)
	{
		$this->pendidikan->hapus($id);
        return Redirect::back();
	}

}