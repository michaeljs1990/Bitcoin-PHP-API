<?php

namepace Bitcoin;

class BitcoinFactory
{
	public static function create($user, $password, $ip)
	{
		$rpc = new JsonRPCClient("http://{$user}:{$password}@{$ip}/");
		return new Bitcoin($rpc);
	}
}
