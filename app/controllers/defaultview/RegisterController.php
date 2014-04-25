<?php namespace Defaultview;

use BaseController, View, Session, Auth, Redirect, Hash, Input, \User, JobVacancy, Department, Keluarga;

class RegisterController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => '/'
                      ),
    			array('menu' => 'Info Lowongan',
                      'link' => 'job-vacancy'
                      ),
    		);
    	$this->tanda = $this->tanda = array('', '', '', '');
      $this->user = new User();
      $this->jobvacancy = new JobVacancy();
      $this->department = new Department();
      $this->keluarga = new Keluarga();

	}

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']    = $this->tanda;
      $data['title']      = 'JC & K - Register';
      $data['agama'] = array('Islam', 'Kristen Katholik', 'Kristen Protestan', 'Hindu', 'Budha');
      $data['statuskawin'] = array('Belum Kawin', 'Kawin', 'janda', 'Duda');
      $data['department'] = $this->department->getDataDepartment();
      $data['jobwidget'] = $this->jobvacancy->getWidget();
      return View::make('pelamar.register')
              ->with('data', $data);
  }

  public function do_register(){
      $input = Input::all();
      $input['berat_badan'] = '';
      $input['tinggi_badan'] = '';
      $input['jabatan'] = 7;
      $id = $this->user->register($input);
      $input['suamiistri']  = '';
      $input['umur'] = '';
      $input['pekerjaan'] ='';
      $input['iduser'] = $id;
      $this->keluarga->simpan($input);
      return Redirect::back();
  }

  public function register(){
        return View::make('pelamar.register');
  }

  public function updateProfil()
  {
      $data['menu']       = $this->menu;
      $data['tanda']      = $this->tanda;
      $data['title']      = 'JC & K - My Profile';
      $data['bulan']      = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
      $data['statuskawin']= array('Belum Kawin', 'Kawin', 'Janda', 'Duda');
      $data['user']       = $this->user->getDataUser(Auth::user()->iduser);
      $data['agama']      = array('Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha');
      $data['jobwidget']  = $this->jobvacancy->getWidget();
      $data['department'] = $this->department->getDataDepartment();
      return View::make('default.index')
                  ->with('data', $data);
  }

  public function storeUpdate()
  {
    # code...
  }
  
}