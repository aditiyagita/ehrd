<?php namespace Pelamar;

use BaseController, View, Input, Redirect, KursusPelatihan, User, Auth, JobVacancy, Department; // Tanggal;

class KursusPelatihanController extends BaseController {

	public function __construct(){
    	$this->menu        = array(
                        			array('menu' => 'Home',
                                          'link' => ''
                                          ),
                        			array('menu' => 'Lowongan Kerja',
                                          'link' => 'job-vacancy'
                                          ),
                        		);
    	$this->tanda       = $this->tanda = array('', '');
	    $this->title       = 'JC & K Advertising - Kursus & Pelatihan';
	    $this->kursus      = new KursusPelatihan();
	    $this->user        = new User();
	    $this->jobvacancy  = new JobVacancy();
    	$this->department  = new Department();
	}

	public function index(){
    	$data['menu']      = $this->menu;
    	$data['tanda']     = $this->tanda;
    	$user              = Auth::user()->iduser;
      $data['title']     = $this->title;
      $data['kursus']    = $this->kursus->getDataKursus($user);
      $data['department']= $this->department->getDataDepartment();
      $data['jobwidget'] = $this->jobvacancy->getWidget();
      return View::make('pelamar.kursus.index')
                  ->with('data', $data);
	}

	public function store()
	{
		  $input            = Input::all();
		  $input['iduser']  = Auth::user()->iduser;
		  $this->kursus->simpan($input);
		  return Redirect::back()->withErrors('Update Kursus & Pelatihan Berhasil');	
	}

	public function destroy($id)
	{
		$this->kursus->hapus($id);
        return Redirect::back();
	}

}