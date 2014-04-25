<?php namespace Pelamar;

use BaseController, View, Input, Redirect, User, Auth, JobVacancy, Pertanyaan, Department, Jawaban; // Tanggal;

class PertanyaanController extends BaseController {

	public function __construct(){
    	$this->menu            = array(
                        			array('menu' => 'Home',
                                          'link' => ''
                                          ),
                        			array('menu' => 'Lowongan Kerja',
                                          'link' => 'job-vacancy'
                                          ),
                        		);
    	$this->tanda           = $this->tanda = array('', '');
	    $this->title           = 'JC & K Advertising - Pertanyaan';
	    $this->user            = new User();
	    $this->jobvacancy      = new JobVacancy();
    	$this->department      = new Department();
        $this->pertanyaan      = new Pertanyaan();
        $this->jawaban         = new Jawaban();
	}

	public function index(){
    	$data['menu']          = $this->menu;
    	$data['tanda']         = $this->tanda;
    	$user                  = Auth::user()->iduser;
    	$data['title']         = $this->title;
    	$data['department']    = $this->department->getDataDepartment();
    	$data['jobwidget']     = $this->jobvacancy->getWidget();
        $data['pertanyaan']    = $this->pertanyaan->getDataPertanyaan();
        $data['jawaban']       = $this->jawaban->listJawaban($user);
    	return View::make('pelamar.pertanyaan.index')
    	              ->with('data', $data);
	}

	public function store()
	{
		
        $input                 = Input::all();
        $input['jawab'][4]     = "";
        $input['jawab'][5]     = "";
        $input['jawab'][6]     = "";
        
        $i=0;
        foreach ($input['idpertanyaan'] as $key) {
            $in[$i]['idpertanyaan'] =$input['idpertanyaan'][$i];
            $in[$i]['iduser'] = Auth::user()->iduser;
            $in[$i]['jawab'] =$input['jawab'][$i];
            $in[$i]['uraian'] =$input['uraian'][$i];
            $i++;
        }

		$this->jawaban->simpan($in);
		return Redirect::back();
        return $input;
	}
	
	public function destroy($id)
	{
		$this->bahasa->hapus($id);
        return Redirect::back();
	}

}