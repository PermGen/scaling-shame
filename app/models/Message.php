<?php

class Message extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	public $table= "messages_table";
}
