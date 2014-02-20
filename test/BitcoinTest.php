<?php

use \Mockery as m;
use \Bitcoin as b;

class BitcoinTest extends PHPUnit_Framework_TestCase
{
    private $user = 'bitcoinrpc';
    private $pass = 'asdj4893598gewkh3jherhHJKDH$Hasf83JLFShFJHSKJHJKF53lape';
    private $bitcoind;
    
    function BitcoinTest(){
        $this->bitcoind = $this->setup();
    }

    protected function setup()
    {
        return b\BitcoinFactory::create($this->user, $this->pass);
    }

    function testGetinfo()
    {
        $this->assertTrue(is_array($this->bitcoind->getinfo()));
    }

    function testGethashespersecond()
    {
        $this->assertTrue(is_int($this->bitcoind->gethashespersec()));
    }
    
    function testGetgenerate()
    {
        $this->assertTrue(is_bool($this->bitcoind->getgenerate()));
    }
    
    function testGetdifficulty()
    {
        $this->assertTrue(is_double($this->bitcoind->getdifficulty()));
    }
    
    function testGetconnectioncount()
    {
        $this->assertTrue(is_int($this->bitcoind->getconnectioncount()));
    }
    
    function testGetblocktemplate()
    {
        // TODO: Needs a more advanced test case
        $this->assertTrue(is_array($this->bitcoind->getblocktemplate()));
    }
    
    function testGetnewaddress()
    {
        $this->assertTrue(is_string($this->bitcoind->getnewaddress()));
    }
    
    function testGetaccount()
    {
        $this->assertTrue(is_string($this->bitcoind->getaccount($this->bitcoind->getnewaddress())));
    }
    
    function testGetblockhash()
    {
        $this->assertTrue(is_string($this->bitcoind->getblockhash()));
    }
    
    function testGetblockcount()
    {
        $this->assertTrue(is_int($this->bitcoind->getblockcount()));
    }
    
    function testGetblock()
    {
        $this->assertTrue(is_array($this->bitcoind->getblock($this->bitcoind->getblockhash())));
    }
    
    function testGetbestblockhash()
    {
        //$this->assertTrue(is_string($this->bitcoind->getbestblockhash()));
    }
    
    function testGetbalance()
    {
        $this->assertTrue(is_double($this->bitcoind->getbalance()));
    }
    
    function testGetaddressesbyaccount()
    {
        $this->assertTrue(is_array($this->bitcoind->getaddressesbyaccount()));
    }
    
    function testAddnode()
    {
        $this->bitcoind->addnode('bitcoin.es', 'remove');
        $this->assertTrue(is_null(($this->bitcoind->addnode('bitcoin.es'))));
    }
    
    function testGetaddednodeinfo()
    {
        $this->assertTrue(is_array($this->bitcoind->getaddednodeinfo(true, 'bitcoin.es')));
    }
    
    function testGetaccountaddress()
    {
        $this->assertTrue(is_string($this->bitcoind->getaccountaddress()));
    }
    
    function testDumpprivkey()
    {
        $this->assertTrue(is_string($this->bitcoind->dumpprivkey($this->bitcoind->getnewaddress())));
    }
    
    function testDecoderawtransaction()
    {
        $this->assertTrue(is_array($this->bitcoind->decoderawtransaction('0100000034f1d0df9678dd37aeb88a11a196caf5d569095fa92c4446bb194f2a80b48d99e90000000000ffffffff410cfe18b7768a03df520e52afc5090901abfb3b46191abf280bf9bf0cb6de9a0100000000ffffffffc02757d88619b0bd1ed0765d10ff5170d39a069cfb443b9193dda8290c745e200000000000ffffffff00d398e169c11143d2c292640e2211b9650a20f2e4889bd934f6f6ee18bc84330000000000ffffffff3fc375488dcc6d14ff321dde45460226f0a6958df565c4901525d599ffe187360a00000000ffffffff62963acf477ba7610c66487fb1cc7aea90a142c2fb5aa966abf09c7113683d371d01000000ffffffff73743d09bb27e1200bce2cf94f43dff13fac3b84fcc1045d6ecb1cb58c6510780300000000ffffffff54354ab6b010f10c6532981b3666c2f8eb42f02369ef77e5d3a2200173e1d0990300000000ffffffffd1fd73e13c2f370eaed38f9b381e2aa1b78bffc94c7bf25e8af689136e4055e00300000000ffffffffb2d13865b7b7366dced2656be6486c020a342ea0a119a7289e760626fd06722c9f00000000ffffffffdc05e77458522cb040a4961fe56f82192f462a0c7a54e3b45a3ee9612f54d1640100000000ffffffff036b05101bd87321df1203a6c038455a7e93d8a8daa0bc2766e47a23dd114d031600000000ffffffff9b10cf8a2723d90d89cb3b4681013bf1d5b21edb703f92d895094c73e433f0940000000000ffffffff2ae2c6607237710d442483d148db7a8533a05c25398466757a75582265608be01200000000ffffffffa9c6f98794cc13f7cee4b067f7e863708a8736f966cd3eba23fc88ca3841fcfd1200000000ffffffff313b9e285dc97925764eb9d7564784157189f93f70ec2bf41fc1abdff9d0242b0d00000000ffffffffe61ae0eca7d43527c79c68e74cab6b078c22c4be6067f921e4ce5190d806b7b53a00000000ffffffff50b28c7df7ebf317cd3625f49c8d145393ec322a47b9e573b195dcd8dab9e83e3100000000ffffffffce861273e777a2ac2f65850d29635bb261f42d36c884670ae55b72b0d340ef892000000000ffffffff89732f476bbb66abca254c667f1dd0865a9bd00932c6180fb335844485027c5c3900000000ffffffff6904dbe2948340b6c79353a2d5aaf8979bc19addad365ab27177b6569fe69832d600000000ffffffff51575910c3b29c9aab055ff63148d0fbcedf67754a65b2bbdd41800f7ad439780200000000ffffffff9739dca64717c7cd0e0d74f793061166a1fe77bc3f28948bc9f91a97030528d13700000000ffffffffa34777ea4f26b731277c46208476f1b01dd8012c3a0e9f09ab5300948d19ff622f00000000ffffffff7609e87b4ed18490f86364e5df54d20afd4ddae838e8df2dc8c163928b00e9683f00000000ffffffff24bbc67d2e298012b32ad74b45005a933b93739500acb1bd3f605cf5b3f2a2a02300000000ffffffff7625ba3f8fe636109f362732c40404e5878880176ef487977022b0c5e4aff1f40000000000ffffffff2a54cb9370f49ef12c5c9c8f1e9868eca8bc83e1deb8ba646356cbcb116de7ae2b00000000ffffffffb1046f57780678a8f58be9cabd9ed44160d08597099788169fc2ad1126590da90000000000ffffffff2d91e966c8c6cd99590bbe4e65da0524e5b4ba7dc341f886ac498911e9f031ef0100000000ffffffffd60029c9624efa381fa035e911627f8bd50d8c9c7598af9569e28f161e1cde021f00000000ffffffff1a4cb8e3e7720cf9a7444ff089e963a37ca81473c41894077f8798ce537b0b370100000000ffffffff16c5c3b820200001698fe0657b62c89ec629eb3d3b313f92626d0a2c3ef827350d00000000ffffffff257b3731c0d50b8635f634a40c62256f01d85561ea2bdaaf32a008686ceda3590200000000ffffffff321fddc11a2011e68c34dc3ae48dd9db8e2b1a3c212bec17b8978fba2210f98f1400000000ffffffffce3458a38708d1f2df32db8d7b3a2c11aec37872e75922964119cb43c640bd9f0100000000ffffffff7cce9846d7c53750ae1018706aa571f1148b8c3a73afa02d1ed2e8144bf391ae0000000000ffffffff3f5ae73df419a8213ffa99095a1ba9a5b570b13f2e64f402c0e3544a9b615cc10a00000000ffffffff702a1678603547ecfda519dfe0ff6848af8dc2f9c4add62789fcdbfd6efbbbd30100000000ffffffff9ebad55feb053d23b17bd5f5d12ac042c8636ae8383bf99623fcc9d601cbe8e01a00000000ffffffff41e94d33fe0062fb26f68ad287010c25e1f46a0d467404cff1d3f3b29f532caa4100000000ffffffff41cda8b0d21299b3ed67f99962652ee1298d6b9b40578e9ac9548f7ef654cd4d3700000000ffffffff8e8f9f98afb05ec9f6c0d7f9a2686b02c1d8459014d9f3b6e3576caae48670771d00000000ffffffff6b42106ee3c628dd735c973807ef91d5099b04e97aec714b6382247552fbf9df0d00000000fffffffff47dfc59fd28f2b1c623a66c441a2c3e28185e144e914b83cec31bdacfbb91ff3d00000000ffffffff3741be932b960c4f35ac555c51b82d53d2f6f715545701cffd65d76f4edab1080200000000ffffffff4c1482b8a9fa94e8d9fd800fe0cf9383024e87cf0fb3fe8bd33898d2312f1a091d00000000ffffffff8283ad41809d32b02d9d619c5531409954a634ef9b15e3d8f2db93d1cd18f3330200000000ffffffff1116de27fdf58a688d36c873cf46b7611ecb37ee00ed4379bead7ded170d2e470300000000ffffffffaf75e091c43461146e61da8fb4e9e3895d487da9af9afa0c4d23778b4ade32540d00000000ffffffff20b8fc32b9c6c858fcd2e82139ca53ce2fd71885af3e836a45b59ea9610fb97d0700000000ffffffff53ff82acb7454f1340de92a8e2a65f525e913e9f0a2c9d1a027afaf7b14918970d00000000ffffffff0192083d8a000000001976a91491371dd0cfe48038e5958e00c604096bff46862588ac00000000')));
    }
    
    function testCreaterawtransaction()
    {
        // TODO impliment further testing
    }
    
    function testCreatemultisig()
    {
        // TODO impliment testing
    }
    
    function testEncryptwallet()
    {
        // TODO impliment testing
    }
    
    function testBackupwallet()
    {
        // TODO impliment testing
    }
    
    function testAddmultisigaddress()
    {
        // TODO impliment testing
    }
    
    function testGetmininginfo()
    {
        $this->assertTrue(is_array($this->bitcoind->getmininginfo()));
    }
    
    function testGetpeerinfo()
    {
        $this->assertTrue(is_array($this->bitcoind->getpeerinfo()));
    }
    
    function testGetrawchangeaddress()
    {
        //$this->assertTrue(is_string($this->bitcoind->getrawchangeaddress()));
    }
    
    function testGetrawmempool()
    {
        $this->assertTrue(is_array($this->bitcoind->getrawmempool()));
    }
    
    function testGetrawtransaction()
    {
        $this->assertTrue(is_string($this->bitcoind->getrawtransaction('8463624e11404454e81bf7f5657f48ade9ef0040643b5e89b2ca79c6114926b6')));
    }
    
    function testGetreceivedbyaccount()
    {
        $this->assertTrue(is_double($this->bitcoind->getreceivedbyaccount()));
    }
    
    function testGetreveivedbyaddress()
    {
        $this->assertTrue(is_double($this->bitcoind->getreceivedbyaddress('1SN9RrYpwEVTUdAMody7MYER7fAcuAEjj')));
    }
    
    function testGettransaction()
    {
        //$this->assertTrue(is_array($this->bitcoind->gettransaction('8463624e11404454e81bf7f5657f48ade9ef0040643b5e89b2ca79c6114926b6')));
    }
    
    function testGettxout()
    {
        $this->assertTrue(is_array($this->bitcoind->gettxout('8463624e11404454e81bf7f5657f48ade9ef0040643b5e89b2ca79c6114926b6', 0)));
    }
    
    function testGettxoutsetinfo()
    {
        // TODO impliment
    }
    
    function testGetwork()
    {
        $this->assertTrue(is_array($this->bitcoind->getwork()));
    }
    
    function testHelp()
    {
        $this->assertTrue(is_string($this->bitcoind->help('help')));
    }
    
    function testImportprivkey()
    {
        // TODO impliment 
    }
    
    function testKeypoolrefill()
    {
        // TODO impliment
    }
    
    function testListaccounts()
    {
        $this->assertTrue(is_array($this->bitcoind->listaccounts()));
    }
    
    function testListaddressgroupings()
    {
        $this->assertTrue(is_array($this->bitcoind->listaddressgroupings()));
    }
    
    function testListreceivedbyaccount()
    {
        $this->assertTrue(is_array($this->bitcoind->listreceivedbyaccount()));
    }
    
    function testListreceivedbyaddress()
    {
        $this->assertTrue(is_array($this->bitcoind->listreceivedbyaddress()));
    }
    
    function testListsinceblock()
    {
        $this->assertTrue(is_array($this->bitcoind->listsinceblock()));
    }
    
    function testListtransactions()
    {
        $this->assertTrue(is_array($this->bitcoind->listtransactions()));
    }
    
    function testListunspent()
    {
        $this->assertTrue(is_array($this->bitcoind->listunspent()));
    }
    
    function testListlockunspent()
    {
        $this->assertTrue(is_array($this->bitcoind->listlockunspent()));
    }
    
    function testLockunspent()
    {
        // TODO
    }
    
    function testMove()
    {
        // TODO
    }
    
    function testSendfrom()
    {
        // TODO
    }
    
    function testSendmany()
    {
        // TODO
    }
    
    function testSendrawtransactions()
    {
        // TODO
    }
    
    function testSendtoaddress()
    {
        // TODO
    }
    
    function testSetaccount()
    {
        // TODO
    }
    
    function testSetgenerate()
    {
        // TODO
    }
    
    function testSettxfee()
    {
        
    }
    
    function testSignmessage()
    {
        // TODO
    }
    
    function testSignrawtransaction()
    {
        // TODO
    }
    
    function testStop()
    {
        
    }
    
    function testSubmitblock()
    {
        // TODO
    }
    
    function testValidateaddress()
    {
        $this->assertTrue(is_array($this->bitcoind->validateaddress('1SN9RrYpwEVTUdAMody7MYER7fAcuAEjj')));
    }
    
    function testVerifymessage()
    {
        // TODO
    }
    
    function testWalletlock()
    {
        // TODO
    }

    function testWallerpassphrase()
    {
        // TODO
    }
    
    function testWalletpassphrasechange()
    {
        // TODO
    }
}