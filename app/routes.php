<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'MessageController@home');
Route::get('/send', function() {
	$connection = ssh2_connect('191.168.3.212', 22);
	ssh2_auth_password($connection, 'ambet', 'pardonme15');

	$stream = ssh2_exec($connection, '/var/lib/asterisk/agi-bin/sendsms.php +639178839985 "Hello vernon this is the asterisk"');

});
Route::get('/{phonenumber}', 'MessageController@messages');
Route::post('send_sms', function() {
	$dest = Input::get('phonenumber');
	$mess = Input::get('message');
	$message = str_replace(' ', '+', $mess);
	$files = file_get_contents('http://191.168.3.212/pbx/sendsms.php?dest='.$dest.'&message='.$message.'');
	return Redirect::to('/' . $dest . '-8881'); 
});