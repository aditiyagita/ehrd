<?php namespace Defaultview;

use BaseController, View, Session, Auth, Redirect, Hash, ContactUs;

class AboutController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => '/'
                      ),
    			array('menu' => 'Job Vacancy',
                      'link' => 'job-vacancy'
                      ),
    		);
    	$this->tanda = $this->tanda = array('', '', 'active', '');
      $this->contactus = new ContactUs();

	}

  public function index(){
      $data['menu']   = $this->menu;
      $data['tanda']    = $this->tanda;
      $data['contactus'] = $this->contactus->getDataContactUs(1);
      return View::make('default.about')
              ->with('data', $data);
  }
  
}