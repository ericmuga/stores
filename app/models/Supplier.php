<?php

class Supplier extends \Eloquent
{
	protected $guarded = ['id'];
    public static $rules=array(
                                'email'=>'required|email|unique:suppliers',
                                'name'=>'required',
                                'phone'=>'required',
                                'bank'=>'required',
                                'account'=>'required'


                              );

    public function Bank()
    {
        return $this->hasOne('Bank','id','bank_id');
    }



}