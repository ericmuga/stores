<?php

class HomeController extends BaseController {


	public function index()
	{
		return View::make('layouts.login')->with('title','title');
	}


}
