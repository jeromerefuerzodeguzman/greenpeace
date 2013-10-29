<?php

class MessageController extends BaseController {

	public function home() {
		$list = Message::messages();

		return View::make('home')
				->with('lists', $list);

	}

	public function messages($phones) {
		$_phones = explode('-', $phones);
		$_from = $_phones['0'];
		$_to = $_phones['1'];


		$list = Message::where('from', $_from)
			->where('to', $_to)
			->orWhere(function($query) use ($_from, $_to) {
				$query->where('from', $_to)
                      ->where('to',  $_from);
			})->get();

		return View::make('messages')
				->with('phonenumber', $_from)
				->with('lists', $list);
	}
}