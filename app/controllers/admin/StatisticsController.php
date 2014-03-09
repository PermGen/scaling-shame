<?php namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use View;
use Input;
use Setting;
use Notification;

 class StatisticsController extends BaseController
 {
 	
 	public function index(){
 		return View::make('backend.statistics.statistics');
 	}
 	
 }

 ?>