<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Department; // Tanggal;

class DepartmentController extends BaseController {

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
	    $this->title = 'Department';
	    //$this->tahun = Tanggal::tahunajar();
	    $this->department = new Department();
	    //$this->breadcrumbs = 'Home'
	}

	public function index(){
    // $prog = new Program();
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    // $data['tahunajar'] = $this->tahun;
    // $data['title'] = $this->title;
    $data['department'] = $this->department->getDataDepartment();
    return View::make('hrdstaff.department.index')
                  ->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.kelas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$this->department->simpan($input);
		return Redirect::back();
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
            return View::make('hrdstaff.agama.show')
                        ->with('data', $data);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['department'] = $this->department->getDataDepartment($id);
        return View::make('hrdstaff.department.edit')
                    ->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$input['iddepartment'] = $id;
		$apdet = $this->department->apdet($input);

		return Redirect::to('hrdstaff/department');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->department->hapus($id);
        return Redirect::back();
	}

}