<?php

use \Mockery as m;

	class BitcoinTest extends PHPUnit_Framework_TestCase
	{

		function __construct()
		{
			parent::__consruct();
		}

		function testTrueIsTrue()
		{
			$jrc = m::mock('BitCoin\\JsonRPCClient');
			$bitcoin = new \Bitcoin\Bitcoin($jrc);	
		}
	}
