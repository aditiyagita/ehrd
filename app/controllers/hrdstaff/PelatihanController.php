<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Pelatihan, Department;

class PelatihanController extends BaseController {

	public function __construct(){
		$this->menu 			= array(
					    			array('menu' => '',
					                      'link' => ''
					                      ),
					    		);
    	$this->tanda 			= $this->tanda = array('');
	    $this->title 			= 'HR GA JC & K - Pelatihan';
	    $this->department 		= new Department();
	    $this->pelatihan 		= new Pelatihan();
	}

	public function index(){
    	$data['menu'] 			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$data['title'] 			= $this->title;
	    $data['pelatihan'] 		= $this->pelatihan->getDataPelatihan();
	    return View::make('hrdstaff.pelatihan.index')
                  ->with('data', $data);
	}

	public function create()
	{
		$data['menu'] 			= $this->menu;
    	$data['tanda'] 			= $this->tanda;
    	$data['title'] 			= $this->title;
    	$data['pelatihan'] 		= $this->pelatihan->getDataPelatihan();
		return View::make('hrdstaff.pelatihan.create')
					->with('data', $data);
	}

	public function store()
	{
		$input 					= Input::all();
		$this->pelatihan->simpan($input);
		return Redirect::to('hrdstaff/pelatihan');
	}

	public function show($id)
	{
        $data['menu']  			= $this->menu;
        $data['tanda'] 			= $this->tanda;
        $data['title'] 			= $this->title;
        $data['pelatihan'] = $this->pelatihan->getDataPelatihan($id);
        return View::make('hrdstaff.pelatihan.show')
                      ->with('data', $data);

	}

	public function edit($id)
	{
		$data['menu']  			= $this->menu;
        $data['tanda'] 			= $this->tanda;
        $data['title'] 			= $this->title;
		$data['pelatihan'] 		= $this->pelatihan->getDataPelatihan($id);
        return View::make('hrdstaff.pelatihan.edit')
                    ->with('data', $data);
	}

	public function update($id)
	{
		$input 						= Input::all();
		$input['idpelatihan'] 		= $id;
		$input['tanggalmulai'] 		= date('Y-m-d', strtotime($input['tanggalmulai']));
		$input['tanggalselesai'] 	= date('Y-m-d', strtotime($input['tanggalselesai']));
		$apdet 						= $this->pelatihan->apdet($input);
		return Redirect::back()->withErrors('Update Data Berhasil');	
	}

	public function destroy($id)
	{
		$this->pelatihan->hapus($id);
        return Redirect::back();
	}

}