<?php namespace Direktur;

use BaseController, View, Input, Redirect, Cuti, user, PengunduranDiri, Karyawan, Auth, PDF, Session; // Tanggal;

class PengunduranDiriController extends BaseController {

	public function __construct(){
		$this->menu = array(
          array('menu' => '',
                      'link' => ''
                      )
        );
      	$this->tanda = array('');
	    $this->title = 'Direktur JC & K - Pengunduran Diri';
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
    	return View::make('direktur.pengundurandiri.index')
                 ->with('data', $data);
	}

	public function store()
	{
		$input = Input::all();
		$filter['tanggaldari'] = $input['daritahun'].'-'.$input['daribulan'].'-'.$input['darihari'];
		$filter['tanggalsampai'] = $input['sampaitahun'].'-'.$input['sampaibulan'].'-'.$input['sampaihari'];
		$data['pengundurandiri'] = $this->pengunduran->cetakLaporan($filter);
		$data['filter'] = $filter;
		if(count($data['pengundurandiri']) > 0){
			$pdf = PDF::loadView('direktur.pdfreport.laporanpengundurandiri', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
			return $pdf->stream('laporan-pengunduran-diri-'.$filter['tanggaldari'].'-'.$filter['tanggalsampai'].'.pdf');
		}else{
			Session::flash('warning', 'Data Pengunduran Diri Kosong');
        		return Redirect::back();
		}
	}

	public function cetakPengunduranDiri($value)
	{
		$data['pengundurandiri'] = $this->pengunduran->getDataPengunduranDiri($value);
		$pdf = PDF::loadView('direktur.pdfreport.pengundurandiri', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
		return $pdf->stream('Surat Pengunduran Diri - '.$data['pengundurandiri']->karyawan->user->nama_lengkap.'.pdf');
	}

}