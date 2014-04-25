<?php namespace Pelamar;

use BaseController, View, Session, Auth, Redirect;

class DashboardController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Lowongan Kerja',
                      'link' => 'admin'
                      ),
    			array('menu' => 'About Us',
                      'link' => 'admin'
                      ),
    			array('menu' => 'Contact Us',
                      'link' => 'admin'
                      ),
    		);
    	$this->tanda = $this->tanda = array('active', '', '', '');

	}

  public function index(){
      if (Session::has('user')) {
          Auth::login(Session::get('user'));
          if (Auth::user()->hak_akses == '1') {
              return Redirect::intended('hrdstaff');
          } elseif (Auth::user()->hak_akses == '2') {
              return Redirect::intended('hrdmanager');
          } elseif (Auth::user()->hak_akses == '3') {
              return Redirect::intended('direktur');
          } elseif (Auth::user()->hak_akses == '4') {
              return Redirect::intended('hrga');
          } elseif (Auth::user()->hak_akses == '5') {
              return Redirect::intended('keuangan');
          } elseif (Auth::user()->hak_akses == '6') {
              return Redirect::intended('karyawan');
          } else {
              $data['menu']   = $this->menu;
              $data['tanda']    = $this->tanda;
              return View::make('pelamar.index')
                    ->with('data', $data);
          }   
      }else{
          $data['menu']   = $this->menu;
          $data['tanda']    = $this->tanda;
          return View::make('pelamar.index')
                ->with('data', $data);
      }
  }
  
}