<?php

namespace Bitcoin;

class BitcoinFactory
{
    public static function create($user, $password, $ip = '127.0.0.1:8332')
    {
        $rpc = new JsonRPCClient("http://{$user}:{$password}@{$ip}/");
        return new Bitcoin($rpc);
    }
}
