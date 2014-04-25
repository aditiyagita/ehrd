<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, ContactUs, Department, Tanggal, Uploadfoto; 

class ContactUsController extends BaseController {

	public function __construct(){
		$this->menu = array(
    			array('menu' => 'Home',
                      'link' => 'hrdstaff'
                      ),
    			array('menu' => 'Employee',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Job Vacancy',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Application',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Cuti',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Training',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Pengunduran Diri',
                      'link' => 'admin'
                      ),
    			array('menu' => 'User',
                      'link' => 'admin'
                      ),
    			array('menu' => 'About Us',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Contact Us',
                      'link' => 'admin'
                      ),
    		);
    	$this->tanda = $this->tanda = array('active', '', '', '', '', '', '', '', '', '');
	    $this->title = 'Contact Us';
	    //$this->tahun = Tanggal::tahunajar();
	    $this->department = new Department();
	    $this->contactus = new ContactUs();
	    $this->tanggal = new Tanggal();
	    $this->foto = new Uploadfoto();
	    //$this->breadcrumbs = 'Home'
	}

	public function index(){
    // $prog = new Program();
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    // $data['tahunajar'] = $this->tahun;
    	$data['title'] = $this->title;
    $data['contactus'] = $this->contactus->getDataContactUs(2);
    return View::make('hrdstaff.contactus.index')
                  ->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['department'] = $this->department->getDataDepartment();
		return View::make('hrdstaff.jobvacancy.create')
					->with('data', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$this->jobvacancy->simpan($input);
		return Redirect::to('hrdstaff/job-vacancy');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            $data['menu'] = $this->menu;
            $data['tanda'] = $this->tanda;
            $data['title'] = $this->title;
            return View::make('hrdstaff.jobvacancy.show')
                        ->with('data', $data);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$input['idhalaman'] = $id;
		$file = Input::file('foto');
		// $apdet = $this->jobvacancy->apdet($input);
		// return Redirect::to('hrdstaff/job-vacancy');	
		var_dump($this->tanggal->write());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->jobvacancy->hapus($id);
        return Redirect::back();
	}

}