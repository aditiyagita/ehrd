<?php namespace Hrdstaff;

use BaseController, View, Input, Redirect, Pelatihan, Department;

class PesertaPelatihanController extends BaseController {

    public function __construct(){
        $this->menu         = array(
                                    array('menu' => '',
                                          'link' => ''
                                          ),
                                );
        $this->tanda        = $this->tanda = array('');
        $this->title        = 'HR GA JC & K - Peserta Pelatihan';
        $this->department   = new Department();
        $this->pelatihan    = new Pelatihan();
    }

    public function index(){
        $data['menu']       = $this->menu;
        $data['tanda']      = $this->tanda;
        $data['title']      = $this->title;
        $data['pelatihan']  = $this->pelatihan->getPelatihanKaryawan();
        return View::make('hrdstaff.pesertapelatihan.index')
                  ->with('data', $data);
    }

	public function show($id)
	{
        $data['menu']       = $this->menu;
        $data['tanda']      = $this->tanda;
        $data['title']      = $this->title;
        $data['pelatihan']  = $this->pelatihan->getDataPelatihan($id);
        return View::make('hrdstaff.pesertapelatihan.show')
                    ->with('data', $data);

	}
}