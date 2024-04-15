<?php

use App\Core\Core;
use App\Http\Route;

require_once '../vendor/autoload.php';

Core::dispatch(Route::routes());
