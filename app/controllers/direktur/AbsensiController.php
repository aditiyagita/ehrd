<?php namespace Direktur;

use BaseController, View, Input, Redirect, ResumeAbsensi, user, Karyawan, Auth, PDF, Session; // Tanggal;

class AbsensiController extends BaseController {

	public function __construct(){
		$this->menu = array(
          array('menu' => '',
                      'link' => ''
                      )
        );
      	$this->tanda = array('');
	    $this->title = 'Direktur JC & K - Absensi';
	    $this->absensi = new ResumeAbsensi();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	return View::make('direktur.absensi.index')
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
		$data['absensi'] = $this->absensi->getLaporanAbsensi($input);
		$bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		if(count($data['absensi']) > 0){
			$i = 1;
			foreach ($bulan as $value) {
				if ($i == $input['bulan']) {
					$data['bulan'] = $value;
				}
				$i++;
			}
			$data['tahun'] = $input['tahun'];
			$pdf = PDF::loadView('direktur.pdfreport.laporanabsensi', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
			return $pdf->stream('absensi-'.$data['bulan'].'/'.$input['tahun'].'.pdf');
		}else{
			Session::flash('warning', 'Data Absensi Belum Disetujui Manager HRD');
        		return Redirect::back();
		}

	}

	public function cetakCuti($value)
	{
		$data['cuti'] = $this->cuti->getDataCuti($value);
		$pdf = PDF::loadView('direktur.pdfreport.cuti', array('data' => $data))->setPaper('a4')->setOrientation('portrait');
		return $pdf->stream('laporan-cuti-'.$data['cuti']->karyawan->user->nama_lengkap.'.pdf');
	}

}