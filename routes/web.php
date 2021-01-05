<?php

use App\Models\User;
use App\Notifications\GenericNotification;
use App\Notifications\GenericQueueNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::post('/', function (Request $request) {
	$email = $request->input('email');

	$queue = $request->boolean('should_queue');

	$user = User::firstWhere('email', $email);

	if (!$user) {
		$user = User::create([
			'email' => $email
		]);
	}

	if ($queue)
		$user->notify(new GenericQueueNotification());
	else
		$user->notify(new GenericNotification());

	return view('welcome', compact('email'));
});
