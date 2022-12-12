<?php

use Sankokai\Press\Http\Controllers\TestController;

Route::view('blog', 'press::test');

Route::get('controller', [TestController::class, 'index']);