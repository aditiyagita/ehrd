<?php namespace Hrdmanager;

use BaseController, View, Input, Redirect, Cuti, user, PengunduranDiri, Karyawan, Auth, Session, Hash; // Tanggal;

class PengunduranDiriController extends BaseController {

	public function __construct(){
		$this->menu = array(
          array('menu' => '',
                      'link' => ''
                      )
        );
      	$this->tanda = array('');
	    $this->title = 'HRD Manager JC & K - Pengunduran Diri';
	    $this->cuti = new Cuti();
	    $this->kary = new Karyawan();
	    $this->user = new user();
	    $this->pengunduran = new PengunduranDiri();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
		$data['pengunduran'] = $this->pengunduran->getDataPengunduranDiri();
    	return View::make('hrdmanager.pengundurandiri.index')
                 ->with('data', $data);
		//return $data['pengundurandiri'];
	}

	public function show($value)
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
		$data['pengunduran'] = $this->pengunduran->getDataPengunduranDiri($value);
    	return View::make('hrdmanager.pengundurandiri.show')
                 ->with('data', $data);
	}

	public function approve($value)
	{
		$input['idpengundurandiri'] = $value;
		$input['status'] = 2;
		$getDataPengunduranDiri		= $this->pengunduran->getDataPengunduranDiri($value);
		$karyawan['nokaryawan']		= $getDataPengunduranDiri->nokaryawan;
		$karyawan['status']			= 1;
		$getKaryawan				= $this->kary->getDataKaryawan($karyawan['nokaryawan']);
		$user['iduser']				= $getKaryawan->iduser;
		$user['password']			= Hash::make('123456');

		$updatePengunduran			= $this->pengunduran->approve($input);
		$updateKaryawan				= $this->kary->apdet($karyawan);
		$updateUser					= $this->user->apdet($user);

		Session::flash('success', 'Approve Pengunduran Diri Berhasil');
		return Redirect::back();
	}

	public function unapprove($value)
	{
		$input['idpengundurandiri'] = $value;
		$input['status'] 			= 1;
		$getDataPengunduranDiri		= $this->pengunduran->getDataPengunduranDiri($value);
		$karyawan['nokaryawan']		= $getDataPengunduranDiri->nokaryawan;
		$karyawan['status']			= 0;
		$updatePengunduran			= $this->pengunduran->approve($input);
		$updateKaryawan				= $this->kary->apdet($karyawan);

		Session::flash('success','Unapprove Pengunduran Diri Berhasil');
		return Redirect::back();
	}

}