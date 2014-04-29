<?php namespace Defaultview;

use BaseController, View, Session, Auth, Redirect, Hash;

class DashboardController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => ''
                      ),
    			array('menu' => 'Lowongan Kerja',
                      'link' => 'job-vacancy'
                      ),
    		);
    	$this->tanda = $this->tanda = array('active', '', '', '');
      $this->title = "JC & K Advertising";

	}

  public function index(){
      //if (Session::has('user')) {
      //    Auth::login(Session::get('user'));
      if(Auth::check()){
          if (Auth::user()->idjabatan == '1') {
              return Redirect::intended('hrdstaff');
          } elseif (Auth::user()->idjabatan == '2') {
              return Redirect::intended('hrdmanager');
          } elseif (Auth::user()->idjabatan == '3') {
              return Redirect::intended('direktur');
          } elseif (Auth::user()->idjabatan == '4') {
              return Redirect::intended('hrga');
          } elseif (Auth::user()->idjabatan == '5') {
              return Redirect::intended('keuangan');
          } elseif (Auth::user()->idjabatan == '6') {
              return Redirect::intended('karyawan');
          } else {
              $data['menu']     = $this->menu;
              $data['tanda']    = $this->tanda;
              $data['title']    = $this->title;
              return View::make('pelamar.index')
                    ->with('data', $data);
          }
      }else{
          $data['menu']     = $this->menu;
          $data['tanda']    = $this->tanda;
          $data['title']    = $this->title;
          return View::make('pelamar.index')
                ->with('data', $data);
      }
  }
  
}