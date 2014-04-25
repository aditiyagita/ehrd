<?php namespace Direktur;

use BaseController, View, Input, Redirect, Cuti, SettingCuti, user, Karyawan, Auth, PDF; // Tanggal;

class CutiController extends BaseController {

	public function __construct(){
		$this->menu = array(
          array('menu' => '',
                      'link' => ''
                      )
        );
      	$this->tanda = array('');
	    $this->title = 'Cuti';
	    $this->cuti = new Cuti();
	    $this->settingcuti = new SettingCuti();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['cuti'] = $this->cuti->getDataCuti();
    	return View::make('direktur.cuti.index')
                  ->with('data', $data);
	}

	public function show($id)
	{
            $data['menu'] = $this->menu;
            $data['tanda'] = $this->tanda;
            $data['title'] = $this->title;
            return View::make('hrdstaff.agama.show')
                        ->with('data', $data);

	}

	public function store()
	{
		$input = Input::all();
		$filter['tanggaldari'] = $input['daritahun'].'-'.$input['daribulan'].'-'.$input['darihari'];
		$filter['tanggalsampai'] = $input['sampaitahun'].'-'.$input['sampaibulan'].'-'.$input['sampaihari'];
		$data['cuti'] = $this->cuti->cetakLaporan($filter);
		$data['filter'] = $filter;
		$pdf = PDF::loadView('direktur.pdfreport.laporancuti', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
		return $pdf->stream('suratcuti-'.$filter['tanggaldari'].'-'.$filter['tanggalsampai'].'.pdf');

	}

	public function cetakCuti($value)
	{
		$data['cuti'] = $this->cuti->getDataCuti($value);
		$data['jumlahcuti'] = $this->cuti->getTotal($value);
		$data['settingcuti'] = $this->settingcuti->getTotalCuti();
		$pdf = PDF::loadView('direktur.pdfreport.cuti', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
		return $pdf->stream('laporan-cuti-'.$data['cuti']->karyawan->user->nama_lengkap.'.pdf');
	}

}