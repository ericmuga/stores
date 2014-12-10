<?php

class Inventory extends \Eloquent {
	protected $guarded = ['id'];
    protected $table= 'Inventories';
    public  static $rules = array('name'=>'required|unique:Inventories',
                        'description'=>'required','initials'=>'required');
    public  static $rulesupdate = array('name'=>'required',
        'description'=>'required','initials'=>'required');

    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }
}