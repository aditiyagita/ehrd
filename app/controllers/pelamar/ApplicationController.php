<?php namespace Pelamar;

use BaseController, View, Session, Auth, Redirect, Hash, JobVacancy, Department, Input, Lamaran;

class ApplicationController extends BaseController {


	public function __construct(){
    	$this->menu        = array(
                      			array('menu' => 'Home',
                                        'link' => '/'
                                        ),
                      			array('menu' => 'Lowongan Kerja',
                                        'link' => 'job-vacancy'
                                        ),
                      		);
    	$this->tanda       = $this->tanda = array('', '');
      $this->title       = "JC & K Advertising - Application";
      $this->jobvacancy  = new JobVacancy();
      $this->department  = new Department();
      $this->lamaran     = new Lamaran();

	}

  public function index(){
      $data['menu']       = $this->menu;
      $data['tanda']      = $this->tanda;
      $data['title']      = $this->title;
      $iduser             = Auth::user()->iduser;
      $data['lamaran']    = $this->lamaran->getListLamaran($iduser);
      $data['department'] = $this->department->getDataDepartment();
      $data['jobwidget']  = $this->jobvacancy->getWidget();
      return View::make('pelamar.application.index')
              ->with('data', $data);
  }
  
}