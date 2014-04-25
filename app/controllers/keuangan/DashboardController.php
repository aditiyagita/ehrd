<?php namespace Keuangan;

use BaseController, View;

class DashboardController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Pembayaran',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Penggajian',
                      'link' => 'admin'
                      ),
    		);
    	$this->tanda = $this->tanda = array('active', '', '');
      $this->title = "Keuangan JC & K";
    }

  public function index(){
  		$data['menu'] = $this->menu;
  		$data['tanda'] = $this->tanda;
      $data['title'] = $this->title;
		return View::make('keuangan.index')
					->with('data', $data);
  }
  
}