<?php namespace Karyawan;

use BaseController, View, Input, Redirect, Cuti, user, PengunduranDiri, Karyawan, Auth; // Tanggal;

class PengunduranDiriController extends BaseController {

	public function __construct(){
		$this->menu 			= array(
						    	      array('menu' => '',
						                      'link' => ''
						                      )
						    	   );
      	$this->tanda 			= array('');
	    $this->title 			= 'Karywan JC & K - Pengunduran Diri';
	    $this->cuti 			= new Cuti();
	    $this->kary 			= new Karyawan();
	    $this->user 			= new user();
	    $this->pengunduran 		= new PengunduranDiri();
	}

	public function index(){
    	$data['menu'] 			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$data['title'] 			= $this->title;
    	$user 					= $this->user->getDataUser(Auth::user()->iduser);
    	$nokaryawan 			= $user->karyawan->nokaryawan;
		$data['pengunduran'] 	= $this->pengunduran->getListPengunduranDiri($nokaryawan);
    	return View::make('karyawan.pengundurandiri.show')
                 ->with('data', $data);
	}

	public function create()
	{
		$data['menu'] 			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$data['title'] 			= $this->title;
    	return View::make('karyawan.pengundurandiri.create')
                  ->with('data', $data);
	}

	public function store()
	{
		$input 					= Input::all();
		$user 					= $this->user->getDataUser(Auth::user()->iduser);
		$input['nokaryawan'] 	= $user->karyawan->nokaryawan;
		$this->pengunduran->simpan($input);
		return Redirect::to('karyawan/pengunduran-diri/');
	}
	
	public function destroy($id)
	{
		$this->pengunduran->hapus($id);
        return Redirect::to('karyawan');
	}

}