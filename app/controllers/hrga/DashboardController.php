<?php namespace Hrga;

use BaseController, View;

class DashboardController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Application',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Training',
                      'link' => 'admin'
                      ),
    		);
    	$this->tanda = $this->tanda = array('active', '', '');
    }

  public function index(){
  		$data['menu'] = $this->menu;
  		$data['tanda'] = $this->tanda;
		return View::make('hrga.index')
					->with('data', $data);
  }
  
}