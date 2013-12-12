<?php

class Message extends Eloquent {

	protected $connection = 'mysql_pbx';
	protected $table = 'sms';
	public $timestamps = false;

	public static function inbox() {
		$results = DB::connection('mysql_pbx')->select('
			SELECT 
			     IF(`src` < `dest`, 
			         CONCAT(`src`, \'-\', `dest`),
			         CONCAT(`dest`, \'-\', `src`)
			     ) as conversation_ids, MAX(`datetime`) as `datetime`, COUNT(*) as `total`, MAX(`readflag`) as `readflag`
			FROM `sms`
			GROUP BY conversation_ids
			ORDER BY `datetime` DESC'
			);
		
		return $results;
	}

	public function mark_as_read() {
		$this->readflag = 1;
		$this->save();

		return $this;
	}

	public static function conversation($phones) {
		$_phones = explode('-', $phones);
		$_from = $_phones['0'];
		$_to = $_phones['1'];


		$conversations = Message::where('src', $_from)
			->where('dest', $_to)
			->orWhere(function($query) use ($_from, $_to) {
				$query->where('src', $_to)
                      ->where('dest',  $_from);
			})->get();

		//mark all as read
		foreach($conversations as $conversation) {
			if($conversation->readflag == 0) {
				$conversation->mark_as_read();
			}
		}

		$conversations->phone = $_from;
		return $conversations;
	}

}