<?php namespace Pelamar;

use BaseController, View, Input, Redirect, Keluarga, User, Auth, JobVacancy, Department, Anak; // Tanggal;

class KeluargaController extends BaseController {

	public function __construct(){
    	$this->menu          = array(
                        			array('menu' => 'Home',
                                          'link' => ''
                                          ),
                        			array('menu' => 'Lowongan Kerja',
                                          'link' => 'job-vacancy'
                                          ),
                        		);
    	$this->tanda         = $this->tanda = array('', '');
	    $this->title         = 'JC & K Advertising - Keterangan Keluarga';
	    $this->keluarga      = new Keluarga();
	    $this->user          = new User();
	    $this->jobvacancy    = new JobVacancy();
    	$this->department    = new Department();
      $this->anak          = new Anak();
	}

	public function index(){
    	$data['menu']        = $this->menu;
    	$data['tanda']       = $this->tanda;
    	$user                = Auth::user()->iduser;
    	$data['title']       = $this->title;
    	$data['keluarga']    = $this->keluarga->getDataKeluarga($user);
    	$data['department']  = $this->department->getDataDepartment();
    	$data['jobwidget']   = $this->jobvacancy->getWidget();
    	return View::make('pelamar.keluarga.index')
    	             ->with('data', $data);
	}

	public function update()
	{
  		$input               = Input::all();
      $kel['suamiistri']   = $input['suamiistri'];
      $kel['umur']         = $input['umur'];
      $kel['pekerjaan']    = $input['pekerjaan'];
      $kel['idkeluarga']   = $input['idkeluarga'];
  		$this->keluarga->apdet($kel);

      if (isset($input['namaanak'])){
          $i = 0;
          foreach($input['namaanak'] as $ak){
            $anak[$i]['nama'] = $ak;
            $anak[$i]['umur'] = $input['umuranak'][$i];
            $anak[$i]['idkeluarga'] = $input['idkeluarga'];
            $i++;
          }
          $this->anak->simpan($anak);
      }
  		return Redirect::back()->withErrors('Update Keluarga Berhasil');  
	}

  public function destroy($id)
  {
    $this->anak->hapus($id);
        return Redirect::back();
  }


}