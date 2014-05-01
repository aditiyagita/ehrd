<?php namespace Hrdmanager;

use BaseController, View, Input, Redirect, Pelatihan, Department,Session;

class PelatihanController extends BaseController {

	public function __construct(){
		$this->menu = array(
    			array('menu' => '',
                      'link' => ''
                      ),
    		);
    	$this->tanda = $this->tanda = array('');
	    $this->title = 'HRD Manager JC & K - Pelatihan';
	    $this->department = new Department();
	    $this->pelatihan = new Pelatihan();
	}

	public function index(){
    	$data['menu'] = $this->menu;
    	$data['tanda'] = $this->tanda;
    	$data['title'] = $this->title;
    	$data['pelatihan'] = $this->pelatihan->getDataPelatihan();
    return View::make('hrdmanager.pelatihan.index')
                  ->with('data', $data);
	}

	public function show($id)
	{
            $data['menu'] = $this->menu;
            $data['tanda'] = $this->tanda;
            $data['title'] = $this->title;
            $data['pelatihan'] = $this->pelatihan->getDataPelatihan($id);
            return View::make('hrdmanager.pelatihan.show')
                        ->with('data', $data);

	}

	public function approve($id)
	{
		$input['idpelatihan'] 	= $id;
		$input['status'] 		= 2;
		$apdet 					= $this->pelatihan->apdet($input);

		Session::flash('success', 'Approve Pelatihan Berhasil');
		return Redirect::to('hrdmanager/pelatihan');	
	}

	public function unapprove($id)
	{
		$input['idpelatihan'] 	= $id;
		$input['status'] 		= 1;
		$apdet 					= $this->pelatihan->apdet($input);

		Session::flash('success', 'Unapprove Pelatihan Berhasil');
		return Redirect::to('hrdmanager/pelatihan');	
	}

	public function notapprove($id)
	{
		$input['idpelatihan'] 	= $id;
		$input['status'] 		= 4;
		$apdet 					= $this->pelatihan->apdet($input);

		Session::flash('success', 'Not Approve Pelatihan Berhasil');
		return Redirect::to('hrdmanager/pelatihan');	
	}

}