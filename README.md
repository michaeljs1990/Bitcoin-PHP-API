Bitcoin-PHP-API
===============

Implementation in PHP for the Bitcoin RPC API.

This is the development version, composer install coming soon. 0.5.0 also available for people who just want the functionality.

You must have bitcoind installed on your server in order to use you can download it here.
http://bitcoin.org/en/download

Getting Started (Branch 0.5.0)
---------------
+ To get started include the following code in your project.<br />

<pre><code>include 'src/bitcoin/BitcoinFactory.php';

$bitcoind = \Bitcoin\BitcoinFactory::create("username", "password");</code></pre>

+ Now you can start interacting with bitcoind. Test it out with the following line of code.<br />


<pre><code>var_dump($connection->getinfo());</code></pre>

Testing
--------
When submitting any changes please ensure all tests are still running properly. This can be done running the code below when in the root directory.

<pre><code>$ vendor/bin/phpunit</code></pre>

Major Contributors
------------
 <a href="https://github.com/haveacigaro">haveacigaro</a>