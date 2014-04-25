<?php namespace Keuangan;

use BaseController, View, Input, Redirect, Pelatihan, Department, LaporanAbsensi, PDF;

class PenggajianController extends BaseController {

	public function __construct(){
		$this->menu = array(
    			array('menu' => '',
                      'link' => ''
                      ),
    		);
    	$this->tanda = $this->tanda = array('');
	    $this->title = 'Keuangan JC & K - Penggajian';
	    $this->department = new Department();
	    $this->pelatihan = new Pelatihan();
	    $this->absensi = new LaporanAbsensi();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['pelatihan'] = $this->pelatihan->getDataPelatihan();
    	return View::make('keuangan.penggajian.index')
                  ->with('data', $data);
	}
	public function store()
	{
		$input = Input::all();
		$data['penggajian'] = $this->absensi->getLaporanAbsensi($input);
		$bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		$i = 1;
		foreach ($bulan as $value) {
			if ($i == $input['bulan']) {
				$data['bulan'] = $value;
			}
			$i++;
		}
		$data['tahun'] = $input['tahun'];
		$pdf = PDF::loadView('keuangan.penggajian.laporanpenggajian', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
		return $pdf->stream('penggajian-'.$data['bulan'].'/'.$input['tahun'].'.pdf');

	}

}