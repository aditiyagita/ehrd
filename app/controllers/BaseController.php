<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
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
        } elseif (Auth::user()->hak_akses == '7') {
            return Redirect::intended('pelamar');
        } else {
            return View::make('home');
        }   
	    }else{
	    	return View::make('home');
	    }
	}

}