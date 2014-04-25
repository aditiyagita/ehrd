<?php namespace Karyawan;

use BaseController, View;

class DashboardController extends BaseController {


	public function __construct(){
      $this->menu   = array(
                        array('menu' => '',
                                    'link' => ''
                                    )
                      );
      $this->tanda    = array('');
      $this->title    = "Karyawan JC & K";
  }

  public function index(){
  		$data['menu']	  = $this->menu;
  		$data['tanda']	= $this->tanda;
      $data['title']  = $this->title;
		return View::make('karyawan.index')
					->with('data', $data);
  }
  
}