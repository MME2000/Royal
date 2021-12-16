<?php

use App\Http\Controllers\API\V01\Channel\ChannelController;
use Illuminate\Support\Facades\Route;

Route::resource('channel',ChannelController::class);
