<?php

use App\Core\Core;
use App\Http\Route;

require_once '../vendor/autoload.php';
require_once '../src/routes/routes.php';

Core::dispatch(Route::routes());
