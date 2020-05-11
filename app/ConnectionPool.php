<?php

namespace App;

use SplObjectStorage;
use React\Socket\ConnectionInterface;

class ConnectionPool
{
    protected $connections;

    public function __construct()
    {
        $this->connections = new SplObjectStorage();
    }

    public function add(ConnectionInterface $connection)
    {
        $connection->write("Welcome\n");
        $connection->write("Enter your name\n");

        $this->setConnectionName($connection, '');

        $this->initEvents($connection);
    }

    public function initEvents($connection)
    {
        $this->connections->attach($connection);

        $connection->on('data', function ($data) use ($connection) {
            $name = $this->getConnectionName($connection);

            if (empty($name)) {
                $this->addNewMember($connection, $data);

                return;
            }
            $this->sendAll($data, $connection);
        });

        $connection->on('close', function () use ($connection) {
            $this->connections->offsetUnset($connection);
            $name = $this->getConnectionName($connection);

            $this->sendAll("user $name left \n", $connection);
        });
    }

    public function getConnectionName($connection)
    {
        return $this->connections->offsetGet($connection);
    }

    public function setConnectionName($connection, $name)
    {
        $this->connections->offsetSet($connection, $name);
    }

    private function sendAll($message, $except)
    {
        foreach ($this->connections as $connection) {
            if ($except !== $connection) {
                $connection->write($message);
            }
        }
    }

    public function addNewMember($connection, $name)
    {
        $name = str_replace(["\n", "\r"], '', $name);
        $this->setConnectionName($connection, $name);
        $this->sendAll("user $name joins \n", $connection);
    }
}
