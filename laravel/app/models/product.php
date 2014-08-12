<?php

class Product extends Eloquent {
	public static $table = 'products';
/*	public static $accessible = array('name', 'bio');

	public static $rules = array(
		'name'=>'required|min:2',
		'bio'=>'required|min:10'
	);

	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}*/
}