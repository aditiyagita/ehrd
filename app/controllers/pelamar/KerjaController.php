<?php namespace Pelamar;

use BaseController, View, Input, Redirect, PengalamanKerja, User, Auth, JobVacancy, Department; // Tanggal;

class KerjaController extends BaseController {

	public function __construct(){
    	$this->menu          = array(
                          			array('menu' => 'Home',
                                            'link' => ''
                                            ),
                          			array('menu' => 'Lowongan Kerja',
                                            'link' => 'job-vacancy'
                                            ),
                          		);
    	$this->tanda         = $this->tanda = array('', '');
	    $this->title         = 'JC & K Advertising - Pengalaman Kerja';
	    $this->pengalaman    = new PengalamanKerja();
	    $this->user          = new User();
	    $this->jobvacancy    = new JobVacancy();
    	$this->department    = new Department();
	}

	public function index(){
    	$data['menu']        = $this->menu;
    	$data['tanda']       = $this->tanda;
    	$user                = Auth::user()->iduser;
      $data['title']       = $this->title;
      $data['pengalaman']  = $this->pengalaman->getDataPengalaman($user);
      $data['department']  = $this->department->getDataDepartment();
      $data['jobwidget']   = $this->jobvacancy->getWidget();
      return View::make('pelamar.pengalaman.index')
                  ->with('data', $data);
	}

	public function store()
	{
		$input                 = Input::all();
		$input['iduser']       = Auth::user()->iduser;
		$this->pengalaman->simpan($input);
		return Redirect::back()->withErrors('Update Pengalaman Kerja Berhasil');	
	}

	public function destroy($id)
	{
		$this->pengalaman->hapus($id);
        return Redirect::back();
	}

}