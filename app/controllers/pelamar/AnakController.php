<?php namespace Pelamar;

use BaseController, View, Input, Redirect, User, Auth, Keluarga, Anak; // Tanggal;

class AnakController extends BaseController {

	public function __construct(){
	    $this->anak 	= new Anak();
	    $this->user 	= new User();
	    $this->keluarga = new Keluarga();
	}

	public function index(){
    	return Redirect::to('keluarga');
	}

	public function destroy($id)
	{
		$this->anak->hapus($id);
        return Redirect::back();
	}

}