<?php namespace Karyawan;

use BaseController, View, Input, Redirect, Pelatihan, Peserta, User, Auth; // Tanggal;

class PelatihanController extends BaseController {

	public function __construct(){
		$this->menu 	= array(
					          array('menu' => '',
					                      'link' => ''
					                      )
					      );
      	$this->tanda 		= array('');
      	$this->title 		= 'Karyawan JC & K - Pelatihan';
      	$this->pelatihan 	= new Pelatihan();
      	$this->user 		= new User();
      	$this->daftar 		= new Peserta();

    }

  	public function index(){
  	  	$data['menu']	 	= $this->menu;
      	$data['tanda']	 	= $this->tanda;
  	  	$data['title'] 		= $this->title;
  	  	$data['pelatihan'] 	= $this->pelatihan->getPelatihanKaryawan();
  	  	return View::make('karyawan.pelatihan.index')
					->with('data', $data);
  	}
	
	public function show($id)
	{
        $data['menu'] 		= $this->menu;
        $data['tanda'] 		= $this->tanda;
        $data['title'] 		= $this->title;
        $user 				= $this->user->getDataUser(Auth::user()->iduser);
		$nokaryawan 		= $user->karyawan->nokaryawan;
        $data['cekpeserta'] = $this->pelatihan->cekPeserta($id, $nokaryawan);
        $data['pelatihan'] 	= $this->pelatihan->getDataPelatihan($id);
        return View::make('karyawan.pelatihan.show')
                     ->with('data', $data);
	}

	public function ikut($id)
	{
		$user 					= $this->user->getDataUser(Auth::user()->iduser);
		$input['nokaryawan'] 	= $user->karyawan->nokaryawan;
		$input['idpelatihan'] 	= $id;
		$daftar 				= $this->daftar->simpan($input);
		return Redirect::to('karyawan/pelatihan');
	}

	public function daftarikut()
	{
		$data['menu'] 		= $this->menu;
        $data['tanda'] 		= $this->tanda;
        $data['title'] 		= $this->title;
		$user 				= $this->user->getDataUser(Auth::user()->iduser);
		$nokaryawan 		= $user->karyawan->nokaryawan;
		$data['ikut'] 		= $this->daftar->getIkut($nokaryawan);
		return View::make('karyawan.pelatihan.ikut')
                        ->with('data', $data);

	}

	public function destroypeserta($value)
	{
		$this->daftar->hapus($value);
		return Redirect::back();
	}


}