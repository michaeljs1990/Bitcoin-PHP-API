<?php

use \Mockery as m;
use \Bitcoin as b;

class BitcoinTest extends PHPUnit_Framework_TestCase
{
        function testGetinfo()
        {
            $stdClass = m::mock('stdClass');
            $jrc = m::mock('Bitcoin\JsonRPCClient'); // Mockery can't use shortened namespace
            $jrc->shouldReceive('getinfo')->times(1)->andReturn($stdClass);
            $bitcoin = new b\Bitcoin($jrc);
            $this->assertEquals($bitcoin->getInfo(), $stdClass);
        }
}