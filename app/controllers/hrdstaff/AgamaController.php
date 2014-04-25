<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Agama; // Tanggal;

class AgamaController extends BaseController {

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
	    $this->title = 'Agama';
	    //$this->tahun = Tanggal::tahunajar();
	    $this->agama = new Agama();
	    //$this->breadcrumbs = 'Home'
	}

	public function index(){
    // $prog = new Program();
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    // $data['tahunajar'] = $this->tahun;
    // $data['title'] = $this->title;
    $data['agama'] = $this->agama->getDataAgama();
    return View::make('hrdstaff.agama.index')
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
		$this->agama->simpan($input);
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
		$data['agama'] = $this->agama->getDataAgama($id);
        return View::make('hrdstaff.agama.edit')
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
		$input['idagama'] = $id;
		$apdet = $this->agama->apdet($input);

		return Redirect::to('hrdstaff/agama');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->agama->hapus($id);
        return Redirect::back();
	}

}