<?php namespace Defaultview;

use BaseController, View, Session, Auth, Redirect, Hash, Input, \User, JobVacancy, Department, Keluarga, Validator, Cuti, Karyawan, Pelatihan, Notifikasi;

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
      $this->cuti = new Cuti();
      $this->karyawan = new Karyawan();
      $this->pelatihan = new Pelatihan();
      $this->notifikasi = new Notifikasi();

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
      Session::flash('success', 'Berhasil Register');
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
    $input = Input::all();
    $file = Input::file('imagefile');

    $rules = array(
        'image' => 'image|max:3000'
    );

    $inputs = array(
        'image' => Input::file('imagefile')
    );

    $validation = Validator::make($inputs, $rules);

    if (!empty($file)){
      if($validation->fails()){
        return Redirect::back()
                              ->withErrors($validation);
      }elseif($file->getError() !== UPLOAD_ERR_OK){
        return Redirect::back()->withErrors('Data Terlalu Besar');
      }else{
        $extension = $file->getClientOriginalExtension();
          $filename = $input['nama_panggilan'].'_'.Auth::user()->iduser.'.'.$extension;
          $directory = public_path().'/assets/images/user';
            
            $upload_success = Input::file('imagefile')->move($directory, $filename); 
               
            if( $upload_success ) {
                $input['foto'] = $filename;
            } 
      }
      
    }
      
    $input['iduser'] = Auth::user()->iduser;
    $tanggal = date('Y-m-d', strtotime($input['tanggal_lahir']));
    $input['tanggal_lahir'] = $tanggal;
    $apdet = $this->user->apdet($input);
    return Redirect::back()->withErrors('Update Profil Berhasil');  
  }

  public function notification()
  {
    $iduser = Auth::user()->iduser;
    $datauser = $this->user->getDataUser($iduser);
    $nokaryawan = $datauser->karyawan->nokaryawan;

    $data = $this->notifikasi->getNotifikasi();
    $i= 0;
    foreach($data as $dt){
      $input[$i]['nokaryawan'] = $nokaryawan;
      $input[$i]['refid'] = $dt->id;
      $input[$i]['jenis'] = $dt->type;
      $i++;
    }
    $this->notifikasi->simpan($input);
  }
  
}