<?php

use \Mockery as m;

	class BitcoinTest extends PHPUnit_Framework_TestCase
	{

		function testGetInfoReturnsStdClass()
		{
            $stdClass = m::mock('stdClass');
			$jrc = m::mock('BitCoin\\JsonRPCClient');
            $jrc->shouldReceive('getinfo')->times(1)->andReturn($stdClass);
			$bitcoin = new \Bitcoin\Bitcoin($jrc);
            $this->assertEquals($bitcoin->getInfo(), $stdClass);
		}
	}
