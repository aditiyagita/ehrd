<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Karyawan, Department, User, Jabatan, Cuti, DetailPelatihan; // Tanggal;

class KaryawanController extends BaseController {

	public function __construct(){
		$this->menu 		= array(
				    			array('menu' => '',
				                      'link' => ''
				                      ),
				    		);
    	$this->tanda 		= $this->tanda = array('');
	    $this->title 		= 'HR GA JC & K - Karyawan';
	    $this->karyawan 	= new Karyawan();
	    $this->department 	= new Department();
	    $this->jabatan 		= new Jabatan();
	    $this->user 		= new User();
	    $this->cuti 		= new Cuti();
	    $this->peserta		= new DetailPelatihan();
	}

	public function index(){
    	$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['karyawan']	= $this->karyawan->getDataKaryawan();
    	return View::make('hrdstaff.karyawan.index')
                  			->with('data', $data);
	}

	public function create()
	{
		$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['department'] = $this->department->getDataDepartment();
    	$data['jabatan'] 	= $this->jabatan->getDataJabatan();
    	$data['nokaryawan'] =  ($this->karyawan->getLastNoKaryawan())+1;
		$data['statuskawin']= array('Belum Kawin', 'Kawin', 'Janda', 'Duda');
      	$data['agama'] 		= array('Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha');
		return View::make('hrdstaff.karyawan.create')
							->with('data', $data);
	}

	public function store()
	{
		$input 				= Input::all();
		$input['jabatan']	= 6;
		$input['iduser'] 	= $this->user->register($input);
		$this->karyawan->simpan($input);
		return Redirect::to('hrdstaff/karyawan');
	}

	public function show($id)
	{
        $data['menu'] 		= $this->menu;
        $data['tanda'] 		= $this->tanda;
        $data['title'] 		= $this->title;
        return View::make('hrdstaff.agama.show')
                        ->with('data', $data);

	}

	public function edit($id)
	{
		$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['department'] = $this->department->getDataDepartment();
    	$data['jabatan'] 	= $this->jabatan->getDataJabatan();
		$data['statuskawin']= array('Belum Kawin', 'Kawin', 'Janda', 'Duda');
      	$data['agama'] 		= array('Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha');
		$data['karyawan'] = $this->karyawan->getDataKaryawan($id);
        return View::make('hrdstaff.karyawan.edit')
                    ->with('data', $data);
	}

	public function update($id)
	{	

		$input 					= Input::all();
		$input['idagama'] 		= $input['agama'];
		$user['iduser']			= $id;
		$user['nama_lengkap']	= $input['nama_lengkap'];
		$user['nama_panggilan']	= $input['nama_panggilan'];
		$user['alamat']			= $input['alamat'];
		$user['kode_pos']		= $input['kode_pos'];
		$user['no_telp']		= $input['no_telp'];
		$user['no_hp']			= $input['no_hp'];
		$user['tempat_lahir']	= $input['tempat_lahir'];
		$user['tanggal_lahir']	= $input['tanggal_lahir'];
		if($input['warga_negara'] == "Indonesia"){
			$user['no_passport']	= "";
			$user['no_ktp']			= $input['no_ktp'];
		}else{
			$user['no_passport']	= $input['no_passport'];
			$user['no_ktp']			= "";
		}
		$user['warga_negara']	= $input['warga_negara'];
		$user['jenis_kelamin']	= $input['jenis_kelamin'];
		$user['berat_badan']	= $input['berat_badan'];
		$user['tinggi_badan']	= $input['tinggi_badan'];
		$user['status_kawin']	= $input['status_kawin'];
		$user['agama']			= $input['agama'];
		//$user['idjabatan']		= $input['jabatan'];
		$user['kacamata']		= $input['kacamata'];

		//$karyawan['idkaryawan']			= $id;
		$karyawan['iddepartmenddt']		= $input['department'];
		$karyawan['nokaryawan']			= $input['nokaryawan'];
		$karyawan['norekening']			= $input['norekening'];
		$karyawan['namabank']			= $input['namabank'];
		$karyawan['gaji']				= $input['gaji'];
		$karyawan['tunjanganjabatan']	= $input['tunjanganjabatan'];
		$karyawan['tunjangan_harian']	= $input['tunjangan_harian'];
		$updateuser						= $this->user->apdet($user);
		$updatekaryawan					= $this->karyawan->apdet($karyawan);

		return Redirect::back()->withErrors('Data Berhasil Diupdate');	
	}

	public function destroy($id)
	{
		$getUser = $this->karyawan->getDataKaryawan($id);
		$iduser = $getUser->iduser;

		if(count($this->cuti->getListCuti($id)) > 0) {
			$this->cuti->hapus($id);
		}
		if(count($this->peserta->getIkut($id)) > 0) {
			$this->peserta->hapus($id);
		}
		$this->user->hapus($iduser);
		$this->karyawan->hapus($id);
		 

        return Redirect::back();
	}

}