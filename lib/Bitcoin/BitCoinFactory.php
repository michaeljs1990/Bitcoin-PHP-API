<?php

namepace Bitcoin;

class BitCoinFactory
{
	public static function create($user, $password, $ip)
	{
		$rpc = new JsonRPCClient("http://{$user}:{$password}@{$ip}/");
		return new Bitcoin($rpc);
	}
}
