<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, JobVacancy, Department, Validator; 
class JobVacancyController extends BaseController {

	public function __construct(){
		$this->menu 		= array(
					    			array('menu' => '',
					                      'link' => ''
					                      ),

					    		);
    	$this->tanda 		= $this->tanda = array('');
	    $this->title 		= 'HR GA JC & K - Job Vacancy';
	    $this->department 	= new Department();
	    $this->jobvacancy 	= new JobVacancy();
	}

	public function index(){
    	$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['jobvacancy'] = $this->jobvacancy->getDataJobVacancy();
    	return View::make('hrdstaff.jobvacancy.index')
                  	->with('data', $data);
	}

	public function create()
	{
		$data['menu'] 		= $this->menu;
    	$data['tanda'] 		= $this->tanda;
    	$data['title'] 		= $this->title;
    	$data['department'] = $this->department->getDataDepartment();
		return View::make('hrdstaff.jobvacancy.create')
					->with('data', $data);
	}

	public function store()
	{
		$input 				= Input::all();
		$file 				= Input::file('imagefile');
		if (!empty($file)){
			$validation 	= Validator::make($input, JobVacancy::$rules);
         
            if ($validation->fails())
            {
               return Redirect::to('hrdstaff/job-vacancy/create')->withErrors($validation);
            }
            else{
				$extension 		= $file->getClientOriginalExtension();
		    	$filename 		= $input['judul'].'.'.$extension;
		    	$directory 		= public_path().'/assets/images/jobvacancy/';
		        $upload_success = Input::file('imagefile')->move($directory, $filename); 
		           
		        if( $upload_success ) {
		            $input['foto'] 	= $filename;
		        } else{
		        	 $input['foto'] = '';
		        }
	    	}
		}
		$this->jobvacancy->simpan($input);
		return Redirect::to('hrdstaff/job-vacancy');
	}

	public function show($id)
	{
        $data['menu'] 		= $this->menu;
        $data['tanda'] 		= $this->tanda;
        $data['title'] 		= $this->title;
        $data['department'] = $this->department->getDataDepartment();
        $data['jobvacancy'] = $this->jobvacancy->getDataJobVacancy($id);
        return View::make('hrdstaff.jobvacancy.show')
                     ->with('data', $data);

	}

	public function edit($id)
	{
		$data['menu'] 		= $this->menu;
        $data['tanda'] 		= $this->tanda;
        $data['title'] 		= $this->title;
		$data['jobvacancy'] = $this->jobvacancy->getDataJobVacancy($id);
		$data['department'] = $this->department->getDataDepartment();
        return View::make('hrdstaff.jobvacancy.edit')
                    ->with('data', $data);
	}

	public function update($id)
	{
		
		$input 					= Input::all();
		$input['idlowongan'] 	= $id;
		$file 					= Input::file('imagefile');
		if (!empty($file)){
			$extension 			= $file->getClientOriginalExtension();
	    	$filename 			= $input['judul'].'_'.$id.'.'.$extension;
	    	$directory 			= public_path().'/assets/images/jobvacancy/';
	        $upload_success 	= Input::file('imagefile')->move($directory, $filename); 
	           
	        if( $upload_success ) {
	            $updet['foto'] 	= $filename;
	        } 
		}
            $updet['idlowongan'] 	= $id;
            $updet['tanggalakhir'] 	= date('Y-m-d', strtotime($input['tanggalakhir']));
            $updet['iddepartment'] 	= $input['department'];
            $updet['posisi'] 		= $input['posisi'];
            $updet['judul'] 		= $input['judul'];
            $updet['uraian'] 		= $input['ck'];
			$apdet 					= $this->jobvacancy->apdet($updet);

			return Redirect::to('hrdstaff/job-vacancy');	
	}

	public function destroy($id)
	{
		$this->jobvacancy->hapus($id);
        return Redirect::back();
	}

}