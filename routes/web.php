<?php

use App\Models\User;
use App\Models\Order;
use App\Events\OrderPayment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('order/create', function(){
    $order = new Order;
    $order->amount = 12000;
    $order->note = 'Gọi điện giờ hành chính';
    $order->save();

    // Dispatch Event
    // OrderPayment::dispatch($order);
    // event(new OrderPayment($order));
    Event::dispatch(new OrderPayment($order));
});

Route::get('users/create', function(){
    // $user = new User();
    $user = User::find(8);
    $user->name = 'Nguyễn Anh Tuấn';
    $user->email = 'kairu2607@gmail.com';
    $user->password = Hash::make('123456');
    $user->save();
});