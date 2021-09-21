<?php

namespace Tests\Server;

use ErrorException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\ParallelTesting;

class Server
{
    protected Client $client;

    public function __construct(Client $client = null)
    {
        static::boot();

        $this->client = $client ?? new Client();
    }

    public static function boot2()
    {
        dump(__DIR__);
    }

    public static function boot()
    {
        if (!file_exists(__DIR__.'/vendor')) {
            exec('cd "'.__DIR__.'"; composer install');
        }

        if (static::serverHasBooted()) {
            return;
        }

        $startServerCommand = 'php -S '.rtrim(static::getServerUrl(), '/').' -t ./tests/Server/public > /dev/null 2>&1 & echo $!';

        $pid = exec($startServerCommand);

        while (!static::serverHasBooted()) {
            sleep(1);
        }

        register_shutdown_function(function () use ($pid) {
            @exec("kill {$pid} 2>/dev/null");
        });
    }

    public static function getServerUrl(string $endPoint = ''): string
    {
        return 'localhost:'.getenv('TEST_SERVER_PORT').'/'.$endPoint;
    }

    public static function serverHasBooted(): bool
    {
        $context = stream_context_create(['http' => [
          'timeout' => 1,
        ]]);

        try {
            $result = file_get_contents('http://'.self::getServerUrl('booted'), false, $context) !== false;
        } catch (ErrorException) {
            $result = false;
        }

        return $result;
    }

    public static function activateRoutes(string $routeConfiguration)
    {
        $token = ParallelTesting::token();

        file_put_contents(__DIR__."/public/config-{$token}.json", json_encode(['routes' => $routeConfiguration]));
    }
}
