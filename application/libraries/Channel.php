<?php

class Channel
{

    private $host = 'localhost';
    private $port = '4000';
    private $socket;

    private function connect()
    {


        if (($this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP))) {
            return socket_connect($this->socket, $this->host, $this->port);
        }
    }

    public function send($buffer)
    {

        try {

            if ($this->connect()) {
                if (socket_write($this->socket, $buffer, strlen($buffer))) {
                    socket_close($this->socket);
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {

            return false;
        }
    }
}