<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $quote = Inspiring::quote();

    $this->info("🌟 Here's your inspiration: \n\"$quote\"");

    Log::info('The inspire command was executed.');
})->purpose('Display an inspiring quote and log the usage');
