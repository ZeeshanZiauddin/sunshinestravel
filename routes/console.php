<?php

use App\Console\Commands\FetchDestinations;
use App\Console\Commands\FetchMetaData;
use Illuminate\Support\Facades\Artisan;


use Illuminate\Support\Facades\Schedule;

Schedule::command(FetchMetaData::class)->everySecond();
Schedule::command(FetchDestinations::class)->everySecond();
