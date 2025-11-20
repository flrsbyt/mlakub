<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Jalankan weather notification command
$kernel->call('weather:update');

echo "Weather notification updated at: " . date('Y-m-d H:i:s') . "\n";
