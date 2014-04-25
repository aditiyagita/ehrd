<?php namespace Direktur;

use BaseController, View, PDF;

class DashboardController extends BaseController {


  public function __construct(){
      $this->menu    = array(
                        array('menu' => '',
                                    'link' => ''
                                    ),
                      );
      $this->tanda   = $this->tanda = array('active', '');
      $this->title  = "Direktur JC & K";

  }

  public function index(){
      $data['menu']     = $this->menu;
      $data['tanda']    = $this->tanda;
      $data['title']    = $this->title;
      return View::make('direktur.index')
         ->with('data', $data);
    }
  
}