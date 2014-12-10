<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    public static $rules=array(
        'name'=>'required',
        'username'=>'required|email|unique:users',
        'password'=>'required|min:8'

    );

    public static $editRules=array(
        'name'=>'required',
        'username'=>'required|email',
        'password'=>'required|min:8'

    );
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    protected $guarded=array('id');

}
