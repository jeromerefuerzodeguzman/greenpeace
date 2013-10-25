<?php

class MessageController extends BaseController {

	public function home() {
		$list = Message::messages();

		return View::make('home')
				->with('lists', $list);

	}

	public function messages($phonenumber) {
		$list = Message::where('phonenumber', '=', $phonenumber)->get();

		return View::make('messages')
				->with('phonenumber', $phonenumber)
				->with('lists', $list);
	}
}