# FrankenPHP + CakePHP + Worker Mode

Some challenges to get this running

Looks like currently the worker script  (`webroot/index.php`) performs best when `$maxRequests = 2` in other words something about the current set up doesn't like reusing the worker and it benefits from exiting and restarting (in affect bootstrap fresh each time)

Install: https://toggen.com.au/it-tips/frankenphp-caddy-ubuntu-24-04-cakephp/
