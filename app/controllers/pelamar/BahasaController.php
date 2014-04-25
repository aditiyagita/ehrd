<?php namespace Pelamar;

use BaseController, View, Input, Redirect, Bahasa, User, Auth, JobVacancy, Department; // Tanggal;

class BahasaController extends BaseController {

	public function __construct(){
        $this->menu        = array(
                        			array('menu' => 'Home',
                                          'link' => 'admin'
                                          ),
                        			array('menu' => 'Lowongan Kerja',
                                          'link' => 'job-vacancy'
                                          ),
                        		);
    	$this->tanda       = $this->tanda = array('', '');
	    $this->title       = "JC & K Advertising - Bahasa";
	    $this->bahasa      = new Bahasa();
	    $this->user        = new User();
	    $this->jobvacancy  = new JobVacancy();
    	$this->department  = new Department();
	}

	public function index(){
    	$data['menu']          = $this->menu;
    	$data['tanda']         = $this->tanda;
        $data['title']         = $this->title;
    	$user                  = Auth::user()->iduser;
    	$data['title']         = $this->title;
    	$data['ketbhs']        = array('baik', 'cukup', 'kurang');
    	$data['bahasa']        = $this->bahasa->getDataBahasa($user);
    	$data['department']    = $this->department->getDataDepartment();
    	$data['jobwidget']     = $this->jobvacancy->getWidget();
    	return View::make('pelamar.bahasa.index')
    	              ->with('data', $data);
	}

	public function store()
	{
		$input                = Input::all();
		$input['iduser']      = Auth::user()->iduser;
		$this->bahasa->simpan($input);
		return Redirect::back()->withErrors('Update Bahasa Berhasil');    
	}
	
	public function destroy($id)
	{
		$this->bahasa->hapus($id);
        return Redirect::back();
	}

}