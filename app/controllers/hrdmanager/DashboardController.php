<?php namespace Hrdmanager;

use BaseController, View, Session, Auth, Redirect;

class DashboardController extends BaseController {


	public function __construct(){
      $this->menu = array(
          array('menu' => 'Home',
                      'link' => 'admin'
                      ),
          array('menu' => 'Cuti',
                      'link' => 'admin'
                      ),
          array('menu' => 'Pengunduran Diri',
                      'link' => 'admin'
                      ),
          array('menu' => 'Training',
                      'link' => 'admin'
                      ),
        );
      $this->tanda = $this->tanda = array('active', '', '', '');
    }

	public function index(){
		  $data['menu']   = $this->menu;
      $data['tanda']  = $this->tanda;
      $data['title']  = "HRD Manager JC & K";
      return View::make('hrdmanager.index')
 	         ->with('data', $data);
    }
  
}