<?php namespace Karyawan;

use BaseController, View, Input, Redirect, Cuti, SettingCuti, user, Karyawan, Auth, Hari; // Tanggal;

class CutiController extends BaseController {

	public function __construct(){
		$this->menu 		= array(
						          array('menu' => '',
						                      'link' => ''
						                      )
					           );
      	$this->tanda 		= array('');
	    $this->title 		= 'Karyawan JC & K - Cuti';
	    $this->cuti 		= new Cuti();
	    $this->settingcuti 	= new SettingCuti();
	    $this->hari 		= new Hari();
	    $this->kary 		= new Karyawan();
	    $this->user 		= new user();
	}

	public function index(){
    	$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$user 				= $this->user->getDataUser(Auth::user()->iduser);
		$nokaryawan 		= $user->karyawan->nokaryawan;
    	$data['cuti'] 		= $this->cuti->getListCuti($nokaryawan);
    	return View::make('karyawan.cuti.index')
                  ->with('data', $data);
	}

	public function create()
	{
		$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['karyawan'] 	= $this->kary->getDataKaryawan();
    	return View::make('karyawan.cuti.create')
                  ->with('data', $data);
	}

	public function store()
	{
		$input 					= Input::all();
		$user 					= $this->user->getDataUser(Auth::user()->iduser);
		$input['nokaryawan'] 	= $user->karyawan->nokaryawan;
		$input['range'] 		= $this->hari->selisihHari(date("Y-m-d", strtotime($input['tanggalmulai'])),date("Y-m-d", strtotime($input['tanggalselesai'])));
		
		if($input['alasan']  == 1){
			$caricuti = $this->settingcuti->getDataSettingCuti(1);
		}elseif($input['alasan']  == 2){
			$caricuti = $this->settingcuti->getDataSettingCuti(3);
		}elseif($input['alasan']  == 3){
			$caricuti = $this->settingcuti->getDataSettingCuti(1);
		}elseif($input['alasan']  == 4){
			$caricuti = $this->settingcuti->getDataSettingCuti(4);
		}elseif($input['alasan']  == 5){
			$caricuti = $this->settingcuti->getDataSettingCuti(2);
		}elseif($input['alasan']  == 6){
			$caricuti = $this->settingcuti->getDataSettingCuti(2);
		}else{
			$caricuti = $this->settingcuti->getDataSettingCuti(1);
		}
		
		$setting 	= $this->settingcuti->getDataSettingCuti(1);
		$maxsetting = $setting->jumlahhari;
		$maxcuti 	= $caricuti->jumlahhari;

		if($maxcuti < $input['range']){
			return Redirect::back()->withErrors('Jumlah Hari Harus '.$maxcuti); 
		}else{
			if( $input['alasan']  == 1 OR $input['alasan']  == 3){
				$totalcuti = $this->cuti->getTotal($input['nokaryawan']);
				$hasil = $maxsetting - $totalcuti - $input['range'];
				if($hasil > 0){
					$this->cuti->simpan($input);
				}else{
					return Redirect::back()->withErrors('Jumlah Sisa Cuti  '.($maxsetting - $totalcuti)); 
				}
			}else{
				$this->cuti->simpan($input);
			}
		}

		return Redirect::to('karyawan/cuti');
	}

	public function show($id)
	{
            $data['menu'] 		= $this->menu;
            $data['tanda'] 		= $this->tanda;
            $data['title'] 		= $this->title;
            return View::make('hrdstaff.agama.show')
                        ->with('data', $data);
	}
	
	public function destroy($id)
	{
		$this->cuti->hapus($id);
        return Redirect::back();
	}

}