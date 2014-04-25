<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Absensi; // Tanggal;

class AbsensiController extends BaseController {

	public function __construct(){
		$this->menu         = array(
                    			array('menu' => '',
                                      'link' => ''
                                      ),
                    		);
    	$this->tanda     = $this->tanda = array('');
	    $this->title     = 'Absensi';
	    $this->absensi   = new Absensi();
	}

	public function index(){
    	$data['menu']    = $this->menu;
    	$data['tanda']   = $this->tanda;
      $data['title']   = $this->title;
    	$data['absensi'] = $this->absensi->getDataAbsensi();
    	return View::make('hrdstaff.absensi.index')
                  ->with('data', $data);
	}

}