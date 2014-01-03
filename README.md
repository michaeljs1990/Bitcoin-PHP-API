Bitcoin-PHP-API
===============

Implementation in PHP for the Bitcoin RPC API.
<br />
You must have bitcoind installed on your server in order to use you can download it here.
http://bitcoin.org/en/download

<ol>
    <li>To get started include the following code in your project.<br />
        '''
            include '../bitcoin/BitcoinFactory.php';
            
            $connection = Bitcoin\BitcoinFactory::create('bitcoinrpc', 'bitcoinrpcpassword');
        '''
    </li>
    <li>Now you can start interacting with bitcoind. Test it out with the folling line of code.<br />
        '''
            var_dump($connection->getinfo());
        '''
    </li>
</ol>
