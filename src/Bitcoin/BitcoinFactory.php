<?php

namespace Bitcoin;

class BitcoinFactory
{
    //Load in required librarys
    public static function static_autoload(){
        include 'Bitcoin.php';
        include 'JsonRPCClient.php';
    }
    
    public static function create($user, $password, $ip = '127.0.0.1:8332')
    {
        BitcoinFactory::static_autoload();
        $rpc = new \JsonRPCClient("http://{$user}:{$password}@{$ip}/");
        return new Bitcoin($rpc);
    }
}
