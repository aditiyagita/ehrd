<?php namespace Direktur;

use BaseController, View, Input, Redirect, Pelatihan, Department, PDF;

class PelatihanController extends BaseController {

	public function __construct(){
		$this->menu = array(
    			array('menu' => '',
                      'link' => ''
                      ),
    		);
    	$this->tanda = $this->tanda = array('');
	    $this->title = 'Pelatihan';
	    $this->department = new Department();
	    $this->pelatihan = new Pelatihan();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['pelatihan'] = $this->pelatihan->getDataPelatihan();
    return View::make('direktur.pelatihan.index')
                  ->with('data', $data);
	}

	public function cetakPelatihan($value)
	{
		$data['pelatihan'] = $this->pelatihan->getDataPelatihan($value);
		$pdf = PDF::loadView('direktur.pdfreport.laporanpelatihan', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
		return $pdf->stream('laporan-pelatihan-'.$data['pelatihan']->judul.'.pdf');
	}

}