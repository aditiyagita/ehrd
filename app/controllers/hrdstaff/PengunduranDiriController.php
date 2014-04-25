<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Cuti, user, PengunduranDiri, Karyawan, Auth; // Tanggal;

class PengunduranDiriController extends BaseController {

	public function __construct(){
		$this->menu 		= array(
					          array('menu' => '',
					                      'link' => ''
					                      )
					        );
      	$this->tanda 		= array('');
	    $this->title 		= 'HR GA JC & K - Pengunduran Diri';
	    $this->cuti 		= new Cuti();
	    $this->kary 		= new Karyawan();
	    $this->user 		= new user();
	    $this->pengunduran 	= new PengunduranDiri();
	}

	public function index(){
    	$data['menu']  			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$data['title'] 			= $this->title;
		$data['pengunduran'] 	= $this->pengunduran->getDataPengunduranDiri();
    	return View::make('hrdstaff.pengundurandiri.index')
                 ->with('data', $data);
    }

	public function show($value)
	{
		$data['menu']  			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$data['title'] 			= $this->title;
		$data['pengunduran'] 	= $this->pengunduran->getDataPengunduranDiri($value);
    	return View::make('hrdstaff.pengundurandiri.show')
                 ->with('data', $data);
	}
	
	public function destroy($id)
	{
		$this->pengunduran->hapus($id);
        return Redirect::to('karyawan');
	}

	public function approve($value)
	{
		$input['idpengundurandiri'] = $value;
		$input['status'] 			= 2;
		$this->pengunduran->approve($input);
		return Redirect::back();
	}

}