<?php

class Bank extends \Eloquent {
	//protected $fillable = [];
	protected $guarded = ['id'];

    public function Supplier()
    {
        return $this->belongsTo('Supplier');

    }
}