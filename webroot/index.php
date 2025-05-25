<?php

use App\Application;
use App\Http\ServerWorker;
use Cake\Core\PluginApplicationInterface;

ignore_user_abort(true);
	
require  dirname(__DIR__) . '/vendor/autoload.php';
$myApp = new Application( dirname(__DIR__)  . '/config');
$myApp->bootstrap();
$server = new ServerWorker($myApp);

error_log('Worker started');

$handler = static function () use ($server, $myApp)  {
	error_log('Worker handler');
	# DebugKit won't show up with this
	if ($myApp instanceof PluginApplicationInterface) {
		$myApp->pluginBootstrap();
        }

	$server->emit($server->run());
};

$maxRequests = (int)($_SERVER['MAX_REQUESTS'] ?? 2);

for ($nbRequests = 0; !$maxRequests || $nbRequests < $maxRequests; ++$nbRequests) {
    error_log('Worker handling request');
    $keepRunning = \frankenphp_handle_request($handler);

    gc_collect_cycles();

    if (!$keepRunning) break;
}


