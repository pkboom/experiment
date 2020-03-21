<?php

namespace App\Console\Commands;

use App\Chat\Chat;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class WebsocketCommand extends Command
{
    protected $signature = 'websocket:run';

    public function handle()
    {
        $server = IoServer::factory(new HttpServer(new WsServer(new Chat())), 8080);

        $server->run();
    }
}
