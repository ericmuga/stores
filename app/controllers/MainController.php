<?php

class MainController extends BaseController {


    public function index()
    {
        return View::make('layouts.login')->with('title','Login');
    }
    public function dash()
    {
        return View::make('layouts.dashboard')->with('title','Dashboard');
    }

    public function logout()
    {
        Auth::logout();
          return  View::make('layouts.login')->with('title','Login');
          return  View::make('layouts.login')->with('title','Login');
    }

    public function login()
    {
        //authenticate login
        if (Auth::attempt(array('username' => Input::get('username'), 'password' =>Input::get('password'), 'status' => 1)))
        {

            return View::make('layouts.dashboard')->with('title','Dashboard');
//echo 'hello';

         }
        else { return  View::make('layouts.login')->with('title','Login')->with('error','Password/Username incorrect');}
    }




}