Bitcoin-PHP-API
===============

Implementation in PHP for the Bitcoin RPC API.
<br />
You must have bitcoind installed on your server in order to use you can download it here.
http://bitcoin.org/en/download

Getting Started
---------------
+ To get started include the following code in your project.<br />

<pre><code>include '../bitcoin/BitcoinFactory.php';

$connection = Bitcoin\BitcoinFactory::create('bitcoinrpc', 'bitcoinrpcpassword');</code></pre>

+ Now you can start interacting with bitcoind. Test it out with the following line of code.<br />


<pre><code>var_dump($connection->getinfo());</code></pre>

Contributors
------------
 <a href="https://github.com/haveacigaro">haveacigaro</a>