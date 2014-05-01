<?php namespace Hrdmanager;

use BaseController, View, Input, Redirect, Cuti, user, Karyawan, Auth, LaporanAbsensi, ResumeAbsensi, Session; // Tanggal;

class AbsensiController extends BaseController {

	public function __construct(){
		$this->menu = array(
          array('menu' => '',
                      'link' => ''
                      )
        );
      	$this->tanda = array('');
	    $this->title = 'HRD Manager JC & K - Absensi';
	    $this->absensi = new LaporanAbsensi();
	    $this->resume = new ResumeAbsensi();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	return View::make('hrdmanager.absensi.index')
                  ->with('data', $data);
	}

	public function store()
	{
		$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['input'] 		= Input::all();
    	$data['absensi'] 	= $this->absensi->listAcceptAbsensi($data['input']);
    	$resume = $this->resume->getLaporanAbsensi($data['input']);
		//var_dump($data['absensi']);
		if(count($data['absensi']) > 0){
			return View::make('hrdmanager.absensi.summaryabsensi')
                  ->with('data', $data);
		}else{
			if(count($resume) > 0){
				Session::flash('info', 'Data Absensi Sudah Di Accept');
        		return Redirect::back();
			}else{
				Session::flash('warning', 'Data Absensi Masih Kosong');
        		return Redirect::back();
			}
        	
        }
       // return json_encode($data['absensi']);
       // return $data['input'];

	}

	public function approveAbsensi()
	{
		
		$input['bulan'] = Input::get('bulan');
		$input['tahun'] = Input::get('tahun');
		$input['check'] = str_replace(array('[',']'), '', json_encode(Input::get('check')));
		$this->absensi->acceptAbsensi($input);
		Session::flash('success', 'Accept Absensi Berhasil');
		return Redirect::to('hrdmanager/absensi');
	}
}