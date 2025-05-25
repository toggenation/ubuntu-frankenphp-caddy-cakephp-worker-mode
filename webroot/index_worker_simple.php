<?php


while (true) {
    \frankenphp_handle_request(static function(): void {
        echo 'Hello, World! ' . uniqid();
    });
}

